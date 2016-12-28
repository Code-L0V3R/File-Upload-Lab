<?php 
session_start();
if (isset($_POST['try'])) {
	$level = $_POST['level'];

	if ($_SESSION['lfiprotect']==True) {
		switch ($_POST['level']) {
			case 'level2.php':
				$level = "level2.php";			
				break;
			case 'level3.php':
				$level = "level3.php";
				break;
			case 'level4.php':
				$level = "level4.php";
				break;
			case 'level5.php':
				$level = "level5.php";
				break;
			case 'level6.php':
				$level = "level6.php";
				break;
			default:
				$level = "level1.php";
				break;
		}
	}
	$_SESSION['level']=$level;

}else{
	if (empty($_SESSION['level'])) {	
		$_SESSION['level'] = "level1.php";
	} 
	if (empty($_SESSION['lfiprotect'])) {
		$_SESSION['lfiprotect'] = 0;
	}
}
if(isset($_GET['lfi'])) {
		if ($_GET['lfi']==1) {
			$_SESSION['lfiprotect'] = 1;
			header("Location:index.php");
			
		} elseif($_GET['lfi']==0){
			$_SESSION['lfiprotect'] = 0;
			header("Location:index.php");

		}
}

function selected($level){
	if ($level == $_SESSION['level'][5]) {
		echo "selected";
	}
}
?>

<html>
<head>
<title>
Monkey Vulnerable Web Application
</title>
<style>
body{background-color:black;}
a{
	color:white;
}
h1{color:white;text-align:center;font-size:80}
h3{color:white;font-size: 25px;}
p{color:white;text-align:right}
img{width:100;height:100;}
.lessons{text-align:center;}
*{color: green}
.home{text-align: left;padding-left: 10px;}
.level{text-align: right}
</style>
</head>
<body>
<h1><a href="index.php" style="text-decoration: none">Luna's <img src="image.png"> File Upload Lab</a>
</h1>
<div class="home"><a href="index.php">Home</a> || 
<?php echo $_SESSION['lfiprotect']==1 ? "<a href=\"?lfi=0\">LFI Protected</a>" : "<a href=\"?lfi=1\">LFI Protect</a>"; ?>
</div>
<div class="level">
<form action="" method="POST">
<select name="level">
	<option value="level1.php" <?php echo selected('1'); ?> >Level 1 ( Very Simple )</option>
	<option value="level2.php" <?php echo selected('2'); ?> >Level 2 ( No PHP )</option>
	<option value="level3.php" <?php echo selected('3'); ?> >Level 3 ( Something Unrestricted )</option>
	<option value="level4.php" <?php echo selected('4'); ?> >Level 4 ( Only GIF )</option>
	<option value="level5.php" <?php echo selected('5'); ?> >Level 5 ( No PHP extensions )</option>
	<option value="level6.php" <?php echo selected('6'); ?> >Level 6 ( getimagesize() )</option>
</select>
<input type="submit" name="try" value="Let Try!">
</form>
</div>
<div class="lessons">
<h3>Playgrounds</h3>
<?php 
if (isset($_SESSION['level'])) {
 	$level = $_SESSION['level'];
	// include("level1.php");
	include($level); # This is LFI/RFI Vuln point :)

}
?>
</div>
</body>
</html>
