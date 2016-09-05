<?php

include 'config.php';

if(empty($_POST['ok']))
{
	include 'tpl/login.tpl';
}
else
{
	if($hash_pass == hash("sha256",$_POST['password'],false))
	{
		echo 'Success<br/>';
		setcookie("pass",$hash_pass);
		echo '<a href="./">Home</a>';
	}
	else
	{
		echo 'Failed<br/>';
		include 'tpl/login.tpl';
	}
}


?>