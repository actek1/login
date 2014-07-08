<?php
define('USER', 'sexy');
define('PASS', 'qwerty');

//$user = trim($_POST['user']);
//$pass = trim($_POST['pass']);
header('Content-type: application/json');

$data = json_decode(file_get_contents("php://input"));
$user = $data->user;
$pass = $data->pass;

$error = array();
$error['code'] = 404;
$error['msg'] = 'Error';
if ($user != USER){
	die(json_encode($error));
}

if ($pass != PASS){
	die(json_encode($error));	
}


$act = generate_access_token(json_encode($user));
echo json_encode($act);

function generate_access_token($str_user){
	//Get from database
	$user = array();
	$user[] = $str_user;
	$user[] = 3;
	$user[] = 'beerday@mail.com';
	$user[] = time() + 3600;
	$user[] = md5(implode('',$user));
	return array('res' => implode('|', $user));
}