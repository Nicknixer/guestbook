<?php

if($isadd)
{
	if($err_empty_msg) echo '<div class="error">Message is empty!</div>';
	if($captcha_error) echo '<div class="error">Wrong captcha!</div>';
}

?>

<form action="?p=<?php echo $page;?>" method="POST">
	<textarea name="message" cols="50" rows="4" maxlength="450" placeholder="Type your message here"><?php echo $msg_after_refresh; ?></textarea>
	<br/>
	<?php echo $captcha; ?> <input type="text" name="captcha" placeholder="Enter digits"/>
	<input type="submit" name="add" value="Add"/>
    <input type="submit" name="refresh" value="Refresh"/>
		

</form>

<?php
while ($row = $rows->fetch())
{
    echo '<div class="msg"><img src="/img/guest.png" width="15" height="12" alt="guest"/><b>'.$row['name'].'</b>. Date: '.$row['date'].' ID: <b>'.$row['id'].'</b> ';
	if($is_admin)
	{
		echo '<a href="/admin/edit.php?id='.$row['id'].'"><img src="/img/edit.png" width="12" height="12" alt="e"/></a>';
		echo '<a href="/admin/delete.php?id='.$row['id'].'"><img src="/img/delete.png" width="12" height="12" alt="x"/></a>';
	}
	echo '<br/><b>Message</b>: '.$row['msg'];
	if($row['answer'] != '') echo '<br/><b>Answer</b>: '.$row['answer'];
	if($is_admin) echo '<a href="admin/answer.php?id='.$row['id'].'"><img src="img/answer.png" alt="answer" width="12" height="12"/></a>';
	echo '</div>';
}
if($posts == 0)
{
	echo '<div class="msg">No messages, be the first!</div>';
}
?>
<div class="msg">
<?php echo $navi_links; /* Links of navi */ ?>
</div>
<div class="msg">Pages: <?php echo $pages; ?><br/>Posts: <?php echo $posts; ?></div>
<?php
if($is_admin) 
{
	echo '<div class="msg"><a href="/logout.php">Logout</a></div>';
}
else
{
	echo '<div class="msg"><a href="/login.php">Sign in</a></div>';
}
?>



