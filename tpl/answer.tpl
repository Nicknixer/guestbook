<?php 

if($is_admin)
{

	if($is_answered)
	{
	
		echo '<div class="msg">Answer is added.</div>';
	
	}
	else
	{
	
	?>

		<div class="msg">Message id: <?php echo $id_to_answer; ?></div>
		<div class="msg">Message text: <?php echo $message; ?></div>
		<form action="?id=<?php echo $id_to_answer; ?>" method="POST">
		<textarea name="answer" cols="50" rows="4" maxlength="450" placeholder="Type your answer here"><?php echo $answer; ?></textarea>
		<input type = "submit" name = "ok" value = "Answer"/>
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