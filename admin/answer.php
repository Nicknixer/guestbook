<?php

$title = "Answering";

include '../config.php';
include '../db_config.php';
include '../admin/auth.php';

include '../tpl/header.tpl';

if($is_admin)
{
	$id_to_answer = trim($_GET['id']);
	if(isset($_POST['ok']))
	{			
		$answer = trim(htmlspecialchars($_POST['answer']));
		$rows = $pdo->prepare('UPDATE book SET answer=:answer WHERE id=:id;');
		$rows->bindParam(':id',$id_to_answer);
		$rows->bindParam(':answer',$answer);
		$rows->execute();
		$is_answered = true;
	}
	else
	{
		$rows = $pdo->prepare('SELECT answer,msg FROM book WHERE id=:id');
		$rows->bindParam(':id',$id_to_answer);
		$rows->execute();
		$row = $rows->fetch();
		$message = $row['msg'];
		$answer = $row['answer'];
		$is_answered = false;
	}
}

include '../tpl/answer.tpl';


include '../tpl/footer.tpl';


?>