<?php
class Encrypter
{
	//encrypt blowfish method
    public static function encrypt ($password, $digit = 5) 
	{
		$set_salt = './1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
		$salt = sprintf('$2a$%02d$', $digit);
		for($i = 0; $i < 22; $i++)
		{
			$salt .= $set_salt[mt_rand(0, 63)];
		}
		return crypt($password, $salt);
	}
}
?>  