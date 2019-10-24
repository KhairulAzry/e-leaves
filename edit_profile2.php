<?php
session_start();
if(!isset($_SESSION['username']))
{
header("location:login.php");
exit;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>E-Leave Application System</title>
		<link rel="stylesheet" type="text/css" href="css/calendar.css"/>
		<link rel="stylesheet" type="text/css" href="css/stylesheet.css" />
		<script src="scripts/jquery.min.js" type="text/javascript"></script>
		<script src="scripts/jquery.textareaCounter.plugin.js" type="text/javascript"></script>
		<script src="scripts/textarea.js" type="text/javascript"></script>
        <script src="scripts/validate.js" type="text/javascript"></script>
</head>
<body>

<?php

include 'base.php';
include 'secureme.php';

?>


<a class="no_style" href="index.php"><div class="header">&nbsp;</div></a>

<?php include 'left_col.php'; ?>


<div class="centercol">
<div class="menu-welcome-back">
  <div class="position-nav-item">
    <div id="left-welcome">
      <?php
echo "Welcome back " .$username;
$username=$_SESSION['username'];
?>
    </div>
    <div id="right_date"> <?php echo date("D j-m-Y"); ?> </div>
</div>  </div>

<!--Content for center column-->
<div class="page_title">Edit Account</div>

<div class="content_wrapping_small">


<?php

if	(
		
	$_POST['first_name'] and
	$_POST['last_name'] and
	$_POST['password'] and
	$_POST['e_mail'] and
	$_POST['handphone']	
	) 
	
{	
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$password = $_POST['password'];
		$password = base64_encode($password);
		$handphone = $_POST['handphone'];
		$e_mail = $_POST['e_mail'];	
		
	
	$sql = mysqli_query("UPDATE `users` SET 
			`first_name` = '$first_name',
			`last_name` = '$last_name',
			`password` = '$password',
			`handphone` = '$handphone',
			`e_mail` = '$e_mail'
			WHERE `users`.`username`='$username';") or die ("An error occurd. We are trying our best to fix this as soon as possible. Sorry for any inconvenience");	
			
		echo "<div class=icon_lists><img src=images/approved.png width=16 height=16 alt=good_to_go_icon /></div>";		
		echo "<div class=floataftericon_green>Your account was successfully updated</div>";
		echo "<div class=clearall></div>";
	

}

else 
{
				echo "<div class=icon_lists><img src=images/warning.png width=16 height=16 alt=warning_icon /></div>";
				echo "<div class=floataftericon_red>";
				echo "An Error has occurd, you might have left some fields empty. Please go back and correct the erros<br><br></div>";
				echo "<div class=clearall></div>";

}

?>
    
    
</div>
</div><!--content ends here for center column-->


<div class="footer">E-Leave Application System. Copyright (C) 2016. Portal One Sdn Bhd</div>

</body>
</html>