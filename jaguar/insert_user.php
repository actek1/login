<?php
require('encrypt.php');
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
//white space content data validation
if( trim($data->uname) == '' || trim($data->pswd == '')) die('Error al recivir los datos');
$upswd = mysql_real_escape_string($data->pswd);
$email = mysql_real_escape_string($data->email);

//create new connection
$connection = new mySql();
$connection->connect();

//encrypt password
$upswd = Encrypter::encrypt($upswd);
//save new password
$data->pswd = $upswd;
//convert data to jason string
$json = json_encode($data);

//Insert in DB
$query = "INSERT INTO user (username, pass, email, json) VALUES('$usrname','$upswd','$email', '$json')";
$connection->query($query);

$connection->close();
?>