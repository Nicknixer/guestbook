<?php

$title = "Guest Book";

include '/config.php';
include '/db_config.php';
include '/admin/auth.php';

//Init variable
$errors = '';
$msg_after_refresh = isset($_POST['message']) ? $_POST['message'] : '';
$posts = 0;
$isadd = (isset($_POST['add']))? true : false;
////

//After click on "Add"
if($isadd)
{
    if(empty(trim($_POST['message'])))
    {
		$errors = "Enter message!";
    }
    else
    {
		if($_SESSION['captcha'] == $_POST['captcha'])
		{
			//Prepare input data
			$msg_to_save = trim(htmlspecialchars($_POST['message']));
			
			if($is_admin)
			{
				$name_to_save = "Admin";
			}
			else
			{
				$name_to_save = "Guest";
			}
			////
			
			//Smiles
			$msg_to_save = str_replace(':)','<img src="/img/smile.png" width="20" height="20"/>',$msg_to_save);
			$msg_to_save = str_replace(':-)','<img src="/img/smile.png" width="20" height="20"/>',$msg_to_save);
			////
			
			//Save message
			$STH = $pdo->prepare("INSERT INTO book (msg,date,name) VALUES (:msg,now(),:name);");
			$STH->bindParam(':msg',$msg_to_save);
			$STH->bindParam(':name',$name_to_save);
			$STH->execute();
			//////////
			$msg_after_refresh = '';
		}
		else
		{
			$errors = "Wrong captcha!";
		}
    }
}
////

//After click on "Refresh"
if(isset($_POST['refresh']))
{
    $msg_after_refresh = $_POST['message'];
}
////


// Count posts, calc  amount pages
$pg = $pdo->query('SELECT COUNT(id) AS total FROM book;');
$posts = $pg->fetch()['total'];
$pages = intval(($posts-1)/10)+1; 
////

//Receive messages from DB
if(isset($_GET['p']))
{
	$page = $_GET['p'];
	if($page < 1 || $page > $pages)
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

$messages = $rows->fetchAll();
////

//Page navigation
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
////

//Generate catcha
$_SESSION['captcha'] = rand(1000,9999);
$captcha = $_SESSION['captcha'];
////

include '/tpl/header.tpl';
include '/tpl/index.tpl';
include '/tpl/footer.tpl';
?>
