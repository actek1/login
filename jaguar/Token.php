<?php
class Token
{
	//encrypt blowfish method
    public static function generate_access_token ($data_user) 
	{
		//Get from database
		$user = array();
		$user[] = $data_user['id_user'];
		$user[] = $data_user['username'];
		$user[] = $data_user['email'];
		//$user[] = $data_user['created'];
		$user[] = date("H:i:s");
		$user[] = date("H:i:s", strtotime('+30 minutes'));
		$user[] = md5(implode('',$user));
		//return array('res' => implode('|', $user));
		return implode('|', $user);
	}
}
?>  