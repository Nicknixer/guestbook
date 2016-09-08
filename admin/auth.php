<?php 

session_start();

$is_admin = false;
if(isset($_COOKIE["pass"]))
{
	if($_COOKIE["pass"] == $hash_pass)
	{
		$is_admin = true;
	}
}

?>