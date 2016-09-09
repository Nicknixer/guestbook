<?php

$title = "Admin access";
$wrong_password = false;
$empty_password = false;
include '/config.php';
include '/tpl/header.tpl';


if(empty($_POST['ok']))
{
	include '/tpl/login.tpl';
}
else
{
	if($_POST['password'] != '')
	{
		if($hash_pass == hash("sha256",$_POST['password'],false))
		{
			echo '<div class="msg">Success<br/>';
			setcookie("pass",$hash_pass);
			echo '<a href="/">Home</a></div>';
		}
		else
		{
			$wrong_password = true;
			include '/tpl/login.tpl';
		}
	}
	else
	{
		$empty_password = true;
		include '/tpl/login.tpl';
	}
}

include '/tpl/footer.tpl';

?>