<?php ob_start(); ?>
<?php
session_start();
include 'base.php';
include 'secureme.php';
include 'functions.php';
if($_SESSION['username'])
{
header("location:index.php");
exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="css/stylesheet.css" />
		<script src="scripts/jquery.min.js" type="text/javascript"></script>
		<script src="scripts/jquery.textareaCounter.plugin.js" type="text/javascript"></script>
		<script src="scripts/textarea.js" type="text/javascript"></script>
		<script src="scripts/validate.js" type="text/javascript"></script>
<title>E-Leave Application System</title>
</head>
<body>


<a class="no_style" href="index.php"><div class="header">&nbsp;</div></a>
<div class="spacer">&nbsp;</div>
<div class="login_box">
<?php
$username_check=$_POST['username'];
$password_check= $_POST['password'];
//$password_check = $password_check.'***&$$$#!!!!$$$##$##$$#VNBMCNDJ~~~+_';
$password_check = base64_encode($password_check);
/*
// To protect MySQL injection (more detail about MySQL injection)
$username_check = stripslashes($username_check);
$password_check = stripslashes($password_check);
$username_check = mysql_real_escape_string($username_check);
$password_check = mysql_real_escape_string($password_check);
*/
$result=mysql_query("SELECT * FROM users WHERE username='$username_check' and password='$password_check'") or die ("An error occurd. We are trying our best to fix this as soon as possible. Sorry for any inconvenience");
//$result = ($query);
//$result=mysql_fetch_array($result);
if(mysql_num_rows($result)>0)
	{
			$row = mysql_fetch_array($result);
			$_SESSION['registration_status'] = $row['registration_status'];
			$_SESSION['username'] = $row['username'];
			//$_SESSION['password'] = $row['password'];
			
			//echo $_SESSION['username'] ;
			//echo $row['username'];
			
			$_SESSION['first_name'] = $row['first_name'];
			$_SESSION['last_name'] = $row['last_name'];
			$_SESSION['applicants_id'] = $row['id'];
			$_SESSION['applicant_email'] = $row['e_mail'];
			//$_SESSION['access_level'] = $row['access_level'];
			
			if ($row['access_level'] == 'admin')
			{
			$_SESSION["access_level"]=3;
			}
			
			if ($row['access_level'] == 'manager')
			{
			$_SESSION["access_level"]=2;
			}
			
			if ($row['access_level'] == 'user')
			{
			$_SESSION["access_level"]=1;
			}
			include 'check_level.php';
	}		
else 
	{
		$result2=mysql_query("SELECT * FROM users WHERE username='$username_check'") or die ("An error occurd. We are trying our best to fix this as soon as possible. Sorry for any inconvenience");
		
		if(!mysql_num_rows($result2))
		{
				echo "<div class=icon_lists><img src=images/warning.png width=16 height=16 alt=warning_icon /></div>";
				echo "<div class=floataftericon_red>";
				echo "No record was found<br><br></div>";
				echo "<div class=clearall></div>";
				echo "If you are not a registered user, please go to the registration page. <br><br>If you have entered a wrong username, please go back to the login page and try again.<br><br>";
				echo "<div class=clearall></div>";
				echo "<div class=icon_lists><img src=images/register_page.png width=16 height=16 alt=register_icon /></div>";
				echo "<div class=links_float_left><a href=register.php>Registration Page</a></div>";
				echo "<div class=clearall></div>";
				echo "<div class=icon_lists><img src=images/login.png width=16 height=16 alt=login_icon /></div>";
				echo "<div class=links_float_left><a href=login.php>Login Page</a></div>";
				echo "<div class=clearall></div>";
		}
		
		else
		{
				echo "<div class=icon_lists><img src=images/warning.png width=16 height=16 alt=warning_icon /></div>";
				echo "<div class=floataftericon_red>";
				echo "Wrong password<br><br></div>";
				echo "<div class=clearall></div>";
				echo "Please go back to the login page and make sure all fields are correct.<br><br>";
				echo "<div class=clearall></div>";
				echo "<div class=icon_lists><img src=images/login.png width=16 height=16 alt=login_icon /></div>";
				echo "<div class=links_float_left><a href=login.php>Login Page</a></div>";
				echo "<div class=clearall></div>";
		}
			
    }
?>
</div>
<div class="spacer">&nbsp;</div>
<div class="footer">E-Leave Application System. Copyright (C) 2016. Portal One Sdn Bhd</div>
</body>
</html>
<?php ob_flush(); ?> 