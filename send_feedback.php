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
		<link rel="stylesheet" type="text/css" href="css/stylesheet.css" />
		<script src="scripts/jquery.min.js" type="text/javascript"></script>
		<script src="scripts/jquery.textareaCounter.plugin.js" type="text/javascript"></script>
		<script src="scripts/textarea.js" type="text/javascript"></script>
</head>
<body>

<?php
include 'base.php';
include 'functions.php';
include 'secureme.php';
$username=$_SESSION['username'];
  $result2=mysql_query("SELECT * FROM `users` WHERE `username` = '$username'") or die ("An error occurd. We are trying our best to fix this as soon as possible. Sorry for any inconvenience");
  $r = mysql_fetch_array($result2);
  $applicants_id=$r['id']; 
  $username=$r['first_name'].' '.$r['last_name'];
  $sender_email=$r['e_mail'];
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
<div class="page_title">Thank You</div>

<div class="content_wrapping_small">

<?php

		$feed_back=$_POST['feed_back'];
        
		$sql="INSERT INTO `feedback` 
		
		(
		id,
		feed_back
		)

		VALUES
		
        (
		'$applicants_id',
		'$feed_back')";
        
        if (!mysql_query($sql,$con))
		{
			die('Error: ' . mysql_error());
		}
		
		else 
		{
			echo "<div class=icon_lists><img src=images/approved.png width=16 height=16 alt=good_to_go_icon /></div>";		
			echo "<div class=floataftericon_green>Your feedback was sent successfully</div>";
			echo "<div class=clearall></div>";
			echo "<div class=lists><br><br>Administration officers will view your feedback and get back to you as soon as possible.<br><br></div>";
			echo "<div class=clearall></div>";
            
            $get_admin=mysql_query("SELECT * FROM `users` WHERE `access_level` = 'admin'") or die ("An error occurd. We are trying our best to fix this as soon as possible. Sorry for any inconvenience");
			$get_admin_result=mysql_fetch_array($get_admin);
			$admin_email=$get_admin_result['e_mail'];
			
			
	


		$message="Feedback from"." ".$r['first_name']." ".$r['last_name'].":<br><br>"."$feed_back.";
	
   		$headers = 'MIME-Version: 1.0' . "\r\n";
   		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    	$headers .= "From: $sender_email" . "\r\n";
		$headers .= "Reply-To: $sender_email\r\n";
	
    	@mail($admin_email,"Feedback from E-Leave Application System",$message,$headers);
			
			
			
			
            
         }
        
        
        

?>
    
    
</div>
</div><!--content ends here for center column-->


<div class="footer">E-Leave Application System. Copyright (C) 2016. Portal One Sdn Bhd</div>

</body>
</html>