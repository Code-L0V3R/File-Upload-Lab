<?php

if(isset($_FILES['uploadedfile'])) {
	if($_FILES['uploadedfile']['type'] != "image/gif") {
	echo "Sorry, we only allow uploading GIF images";
	exit;
	}
	
	$uploaddir = 'uploads/';
	$fullpath = $uploaddir . basename($_FILES['uploadedfile']['name']);
	if (move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $fullpath)) {
	echo "File is valid, and was successfully uploaded.\n";
	echo "<h2><a href='$fullpath' target='_blank'>OK-Click here!</a></h2>";

	} else {
	echo "File uploading failed.\n";
	}
}
?>
<h3>Lab 4 (Only GIF)</h3>
<form enctype="multipart/form-data" action="index.php" method="POST">
<input type="hidden" name="MAX_FILE_SIZE" value="100000" />
Choose a file to upload: <input name="uploadedfile" type="file" />
<input type="submit" value="Upload File" />
</form>