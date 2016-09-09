<?php

$title = "Editing";

include '../config.php';
include '../db_config.php';
include '../admin/auth.php';

include '../tpl/header.tpl';

if($is_admin)
{
	$id_to_edit = trim($_GET['id']);
	if(isset($_POST['ok']))
	{			
		$message_to_save = trim(htmlspecialchars($_POST['message']));
		$rows = $pdo->prepare('UPDATE book SET msg=:message WHERE id=:id;');
		$rows->bindParam(':id',$id_to_edit);
		$rows->bindParam(':message',$message_to_save);
		$rows->execute();
		$is_edit = true;
	}
	else
	{
		$rows = $pdo->prepare('SELECT msg FROM book WHERE id=:id');
		$rows->bindParam(':id',$id_to_edit);
		$rows->execute();
		$row = $rows->fetch();
		$message = $row['msg'];
		$is_edit = false;
	}
}

include '../tpl/edit.tpl';


include '../tpl/footer.tpl';


?>