<?php 

if($is_admin)
{

	if($is_edit)
	{
	
		echo '<div class="msg">Message is edited.</div>';
	
	}
	else
	{
	
	?>

		<div class="msg">Message id: <?php echo $id_to_edit; ?></div>
		<form action="?id=<?php echo $id_to_edit; ?>" method="POST">
		<textarea name="message" cols="50" rows="4" maxlength="450" placeholder="Type your message here"><?php echo $message; ?></textarea>
		<input type = "submit" name = "ok" value = "Save"/>
		</form>
		
	<?php
	}
}
else
{
?>
<div class="msg">Access denied!</div>
<?php
}
?>
<div class = "msg"><a href = "/">Home</div>