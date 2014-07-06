<?php
require('encrypt.php');

//Password ans Username received
$data = json_decode(file_get_contents("php://input"));
$usrname = mysql_real_escape_string($data->uname);
$upswd = mysql_real_escape_string($data->pswd);

//encrypt password
$upswd = Encrypter::encrypt($upswd);
//save new password
$data->pswd = $upswd;

header('Content-type: application/json');
print json_encode($data);
?>