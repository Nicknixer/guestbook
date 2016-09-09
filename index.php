<?php

$title = "Guest Book";

include '/config.php';
include '/db_config.php';
include '/admin/auth.php';

//Init variable
$captcha_error = false;
$msg_after_refresh = "";

//After click on "Add"
$isadd = false;
if(isset($_POST['add']))
{
    $err_empty_msg = false;
    if(empty(trim($_POST['message'])))
    {
        $err_empty_msg = true; 
    }
    else
    {
		if($_SESSION['captcha'] == $_POST['captcha'])
		{
			$msg_to_save = trim(htmlspecialchars($_POST['message']));

			//smiles
			$msg_to_save = str_replace(':)','<img src="/img/smile.png" width="20" height="20"/>',$msg_to_save);
			$msg_to_save = str_replace(':-)','<img src="/img/smile.png" width="20" height="20"/>',$msg_to_save);
			//////////////////////////

			//Save message
			$STH = $pdo->prepare("INSERT INTO book (msg,date) VALUES (:msg,now());");
			$STH->bindParam(':msg',$msg_to_save);
			$STH->execute();
			//////////
		}
		else
		{
			$captcha_error = true;
			$msg_after_refresh = $_POST['message'];
		}
    }
    $isadd = true;
}
//////////////////////////

//After click on "Refresh"
if(isset($_POST['refresh']))
{
    $msg_after_refresh = $_POST['message'];
}
//////////////////////////

//Page navigation
if(isset($_GET['p']))
{
	$page = $_GET['p'];
	if($page < 1 && $page > 10000)
	{
		$page = 1;
	}
}
else
{
	$page = 1;
}

$page_at = $page * 10 - 10;

$rows = $pdo->prepare('SELECT * FROM book ORDER BY id DESC LIMIT :pageat,10 ;');
$rows->bindParam(':pageat',$page_at,PDO::PARAM_INT);
$rows->execute();

$pg = $pdo->query('SELECT id FROM book;');
while($post_array[] = $pg->fetch())
$posts = count($post_array);
$pages = intval($posts/10)+1;



if($page > 1)
{
	$prev = '<a href="/?p='.($page-1).'">Prev.</a>';
}
else
{
	$prev = 'Prev.';
}

if($page < $pages)
{
	$post = '<a href="/?p='.($page+1).'">Post.</a>';
}
else
{
	$post = 'Post.';
}

$navi_links = $prev.'|'.$post.' (Page: '.$page.')';

//////////////////////////

//Generate cpatcha

$_SESSION['captcha'] = rand(1000,9999);
$captcha = $_SESSION['captcha'];

//////////////////////////
include '/tpl/header.tpl';
include '/tpl/index.tpl';
include '/tpl/footer.tpl';
?>
