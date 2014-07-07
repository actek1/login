<?php
require('encrypt.php');
include "conection.php";
header('Content-type: application/json');

//Password ans Username received
$data = json_decode(file_get_contents("php://input"));
$usrname = mysql_real_escape_string($data->uname);
$upswd = mysql_real_escape_string($data->pswd);

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

//echo $db_data[1]['uname'].'  ';
//echo $db_data[1]['pswd'].'  ';


//$mysqli->query("INSERT INTO tabla VALUES(".json_encode($array).")";
//return json string
print json_encode($status);

mysqli_close($conection);	
?>