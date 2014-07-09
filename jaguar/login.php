<?php
require('encrypt.php');
require('Token.php');
include "conection.php";
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
$access_code = 'Credenciales no validas';

//save new password
$data->pswd = $upswd;

$SQL = $conection->query("SELECT * FROM user") or die ("Error al realizar el query");

//initialize status array
$status = array('value' => '3', 'access_code' => 'Credenciales incorrectas');
$i=0;

while($ROW = $SQL->fetch_assoc())
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
			$status['value'] = 2;
			break;
		}
		else
		{
			//all wrong
			$status['value'] = '3';
		}
	$i++;
}

mysqli_close($conection);

print json_encode($status);
?>