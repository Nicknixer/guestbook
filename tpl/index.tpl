<?php
    if($isadd)
    {
        if($err_empty_msg) echo '<div class="msg">Message is empty!</div>';
    }
?>


<form action="?" method="POST">
	<textarea name="message" cols="50" rows="4" maxlength="450" placeholder="Type your message here"><?php echo $msg_after_refresh; ?></textarea>
	<br/>
	<input type="submit" name="add" value="Add"/>
    <input type="submit" name="refresh" value="Refresh"/>
		

</form>

<?php
while ($row = $rows->fetch())
{
    echo '<div class="msg"><b>Guest</b>. Date: '.$row['date'].' ID: <b>'.$row['id'].'</b> ';
	if($is_admin)
	{
		echo '<a href="admin/delete.php?id='.$row['id'].'"><img src="img/delete.png" width="12" height="12" alt="x"/></a>';
	}
	echo '<br/>Message: '.$row['msg'].'</div>';
}
?>
