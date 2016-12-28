<?php
$files = @$_FILES["files"];
$info = new SplFileInfo($files["name"]);
$extension=($info->getExtension());
if ($files["name"] != '' && $extension != "php" && $extension != "php3" && $extension != "jpeg" && $extension != "png" && $extension != "gif") {
	$uploaddir = 'uploads/';
    $fullpath = $uploaddir . $files["name"];
    if (move_uploaded_file($files['tmp_name'], $fullpath)) {
        echo "<h2><a href='$fullpath' target='_blank'>OK-Click here!</a></h2>";
    }
}

?>
<h3>Lab 3 (Something Unrestricted)</h3>
<form action="index.php" enctype="multipart/form-data" method="POST">
Choose a file to upload: <input type="file" name="files">
<input type="submit" value="Up">
</form>
