<?php
require('encrypt.php');
include "conection.php";
header('Content-type: application/json');

//Password ans Username received
$data = json_decode(file_get_contents("php://input"));
$usrname = mysql_real_escape_string($data->uname);
$upswd = mysql_real_escape_string($data->pswd);
$email = mysql_real_escape_string($data->email);

//encrypt password
$upswd = Encrypter::encrypt($upswd);
//save new password
$data->pswd = $upswd;
//convert data to jason string
$json = json_encode($data);

//Insert in DB
$conection->query("INSERT INTO user (username, pass, email, json) VALUES('$usrname','$upswd','$email', '$json')");

mysqli_close($conection);
?>