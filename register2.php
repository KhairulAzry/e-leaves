<?php

include 'base.php';
include 'secureme.php';
include 'functions.php';


session_start();
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
<LINK href="css/stylesheet.css" rel="stylesheet" type="text/css">

<title>E-Leave Application System</title>
</head>
<body>


<a class="no_style" href="index.php"><div class="header">&nbsp;</div></a>
<div class="spacer">&nbsp;</div>
<div class="login_box">
        
<?php
if	(
		$_POST['first_name'] and
		$_POST['last_name'] and
		$_POST['username'] and
		$_POST['password'] and
		$_POST['e_mail'] and
		$_POST['handphone']	and
		$_POST['department'] 
		
	) 
	{ 
		$first_name = $_POST['first_name'];
		//$first_name = stripslashes($first_name);
		//$first_name = mysql_real_escape_string($first_name);
		$last_name = $_POST['last_name'];
		//$last_name = stripslashes($last_name);
		//$last_name = mysql_real_escape_string($last_name);
		$username = $_POST['username'];
		//$username = stripslashes($username);
		//$username = mysql_real_escape_string($username);
		$password =$_POST['password'];
		//$password = stripslashes($password);
		//$password = mysql_real_escape_string($password);
		$e_mail = $_POST['e_mail'];
		//$e_mail = stripslashes($e_mail);
		//$e_mail = mysql_real_escape_string($e_mail);
		$handphone = $_POST['handphone'];
		//$handphone = stripslashes($handphone);
		//$handphone = mysql_real_escape_string($handphone);
		$registration_status = $_POST['registration_status'];
		$access_level = $_POST['access_level'];
		$department = $_POST['department'];
		$date_joined = date("Y-m-d");
		
		//$password = $password.'***&$$$#!!!!$$$##$##$$#VNBMCNDJ~~~+_';
		$password = base64_encode($password);
		
		$test_user = mysql_query("SELECT * FROM users WHERE username = '". $username ."'") or die ("An error occurd. We are trying our best to fix this as soon as possible. Sorry for any inconvenience");
		$test_email = mysql_query("SELECT * FROM users WHERE e_mail = '". $e_mail ."'") or die ("An error occurd. We are trying our best to fix this as soon as possible. Sorry for any inconvenience");	
		
		if ((mysql_num_rows($test_user) || mysql_num_rows($test_email))  > 0)
			{
				echo "<div class=icon_lists><img src=images/warning.png width=16 height=16 alt=warning_icon /></div>";
				echo "<div class=floataftericon_red>";
				echo "We have detected the following errors:<br><br></div>";
				echo "<div class=clearall></div>";
				if (mysql_num_rows($test_user) > 0)
				{
					echo "Username already in use. Please go back and choose a different username.<br><br>";
				}
				if (mysql_num_rows($test_email) > 0)
				{
				echo "Email already in use. Please go back and choose a different email.<br>";
				}	
				
				echo "<div class=icon_lists><img src=images/register_page.png width=16 height=16 alt=register_icon /></div>";
				echo "<div class=links_float_left><a href=register.php>Registration Page</a></div>";
		
				echo "<div class=clearall></div>";
			}
		
		
		else
		{
		$sql="INSERT INTO users 
		
		(
		first_name,
		last_name,
		username,
		password,
		e_mail,
		handphone,
		registration_status,
		access_level,
		department,
		date_joined
		)
		
		VALUES
		(
		'$first_name',
		'$last_name',
		'$username',
		'$password',
		'$e_mail',
		'$handphone',
		'$registration_status',
		'$access_level',
		'$department',
		'$date_joined')";
		
		echo "<div class=icon_lists><img src=images/approved.png width=16 height=16 alt=good_to_go_icon /></div>";		
		echo "<div class=floataftericon_green>Registration was successful</div>";
		echo "<div class=clearall></div>";
		echo "<div class=lists><br><br>Please wait for your account to be activated by the adminstrator.<br><br></div>";
		echo "<div class=clearall></div>";
		echo "<div class=icon_lists><img src=images/home.png width=16 height=16 alt=home_icon /></div>";
		echo "<div class=links_float_left><a href=index.php>Home Page</a></div>";
		
		echo "<div class=clearall></div>";


		if (!mysql_query($sql,$con))
			{
				die('Error: ' . mysql_error());
			}

		
		}
	
	
	}	

else
	{
				echo "<div class=icon_lists><img src=images/warning.png width=16 height=16 alt=warning_icon /></div>";
				echo "<div class=floataftericon_red>";
				echo "We have detected the following errors:<br><br></div>";
				echo "<div class=clearall></div>";
				echo "It looks like you have left some empty fileds. Please go back to the registration page and try again.<br><br>";
				echo "<div class=clearall></div>";
				echo "<div class=icon_lists><img src=images/register_page.png width=16 height=16 alt=register_icon /></div>";
				echo "<div class=links_float_left><a href=register.php>Registration Page</a></div>";
				echo "<div class=clearall></div>";
	}   



    
//Now display $error_message and give the user another chance  
		
		
		
		

	

?>



</div>
<div class="spacer">&nbsp;</div>
<div class="footer">E-Leave Application System. Copyright (C) 2016. Portal One Sdn Bhd</div>
</body>
</html>
