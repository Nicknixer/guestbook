<?php
include 'db_config.php';
$title = "Guest Book";

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
        $msg_to_save = trim(htmlspecialchars($_POST['message']));

//smiles
        $msg_to_save = str_replace(':)','<img src="img/smile.png" width="20" height="20"/>',$msg_to_save);
        $msg_to_save = str_replace(':-)','<img src="img/smile.png" width="20" height="20"/>',$msg_to_save);
//endsmiles
        $STH = $pdo->prepare("INSERT INTO book (msg,date) VALUES (:msg,now());");
        $STH->bindParam(':msg',$msg_to_save);
        $STH->execute();
    }
    $isadd = true;
}
//////////////////////////

//After click on "Refresh"
$msg_after_refresh = "";
if(isset($_POST['refresh']))
{
    $msg_after_refresh = $_POST['message'];
}
//////////////////////////

$rows = $pdo->query('SELECT * FROM book');

include 'tpl/header.tpl';
include 'tpl/index.tpl';
include 'tpl/footer.tpl';
?>
