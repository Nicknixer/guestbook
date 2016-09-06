<div class="msg">Authorization</div>
<?php
if($wrong_password)
{
	echo '<div class="error">Wrong password!</div>';
}
if($empty_password)
{
	echo '<div class="error">Empty password!</div>';
}
?>
<form action="?" method="POST">
	<input type="text" name="password" placeholder="Type your password"/>
	<input type="submit" name="ok" value="Enter"/>
</form>
<div class="msg"><a href="./">Home</a></div>