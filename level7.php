<h3> Lab 7 (You need Commands)</h3>
<form action="ch7.php" method="POST">
<p>Command Here</p><input type="text" name="command">
<input type="submit" value=">>">
</form>
<?php 
echo "<p>".shell_exec($_POST['command'])."</p>";
?>
</div>
<a href="/fileupload">Home</a>
