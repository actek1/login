<?php
require('encrypt.php');
include "conection.php";
header('Content-type: application/json');

//Password ans Username received
$data = json_decode(file_get_contents("php://input"));
$usrname = mysql_real_escape_string($data->uname);
$upswd = mysql_real_escape_string($data->pswd);
$access_code = 'Credenciales no validas';

//encrypt password
//$upswd = Encrypter::encrypt($upswd);
//save new password
$data->pswd = $upswd;

$SQL = $conection->query("SELECT * FROM user");

$status = array();
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
			$access_code = generate_access_token($ROW);
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

function generate_access_token($data_user){
	//Get from database
	$user = array();
	$user[] = $data_user['id_user'];
	$user[] = $data_user['username'];
	$user[] = $data_user['email'];
	$user[] = $data_user['created'];
	$user[] = time() + 3600;
	$user[] = md5(implode('',$user));
	return array('res' => implode('|', $user));
}

print json_encode($access_code);

//print json_encode($status);

mysqli_close($conection);	
?>