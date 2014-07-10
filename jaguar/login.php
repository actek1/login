<?php
require('encrypt.php');
require('Token.php');
require_once('connect.php');
header('Content-type: application/json');

//Content-Type Validation
$contentType = isset($_SERVER["CONTENT_TYPE"]) ? $_SERVER["CONTENT_TYPE"] : null;
if($contentType !== 'application/json;charset=utf-8' && $contentType !== 'application/json')
{
	header("HTTP/1.1 404 Not Found");
	die('{"error":"Error de Header"}');
}

//Password and Username received
$data = json_decode(file_get_contents("php://input"));
$usrname = mysql_real_escape_string($data->uname);
$upswd = mysql_real_escape_string($data->pswd);
//vars declared
$access_code = 'Credenciales no validas';
$status = array('value' => '3', 'access_code' => 'Credenciales incorrectas');
$i=0;

//create new connection
$connection = new mySql();
$connection->connect();

//query
$result = $connection->query("SELECT id_user, username, pass, email, json, created FROM user");

while($ROW = $connection->fetch($result))
{
	$db_data[$i] = json_decode($ROW['json'],true);
	//Check username and password
	if($usrname == $db_data[$i]['uname'])
	{
		if(crypt($upswd, $db_data[$i]['pswd']) == $db_data[$i]['pswd'])
		{
			//all correct
			$status['value'] = '0';
			$status['access_code'] = Token::generate_access_token($ROW);
			break;
		}
		else
		{
			//wrong pass
			$status['value'] = '1';
			break;
		}
	}
	else
		if(crypt($upswd, $db_data[$i]['pswd']) == $db_data[$i]['pswd'])
		{
			//wrong username
			$status['value'] = '2';
			break;
		}
		else
		{
			//all wrong
			$status['value'] = '3';
		}
	$i++;
}

//close
$connection->close();
print json_encode($status);
?>