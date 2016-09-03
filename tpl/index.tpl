<?php
    if($isadd)
    {
        if($err_empty_msg) echo '<div class="msg">Message is empty!</div>';
    }
?>


<form action="?" method="POST">
	<textarea name="message" cols="23" rows="2" maxlength="45" placeholder="Type your message here"><?php echo $msg_after_refresh; ?></textarea>
	<br/>
	(max: 45) <input type="submit" name="add" value="Add"/>
        <input type="submit" name="refresh" value="Refresh"/>

</form>

<div class="msg">Message 1</div>

<?php

while ($row = $rows->fetch())
{
    echo '<div class="msg">'.$row['id'].'. '.$row['msg'].'</div>';
}

?>
