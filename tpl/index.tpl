<form action="?" method="POST">
	<textarea name="message" cols="23" rows="2" maxlength="45" placeholder="Type your message here"></textarea>
	<br/>
	(max: 45) <input type="submit" name="Add" value="Add"/>
</form>
<div class="msg">Message 1</div>

<?php
/*
$stmt = $pdo->query('SELECT msg FROM book');
while ($row = $stmt->fetch())
{
    echo $row['msg'] . "\n";
}
*/
?>
<div class="msg">Message 2</div>
