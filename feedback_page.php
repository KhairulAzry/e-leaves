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
        <script src="scripts/jquery.validate.js" type="text/javascript"></script>
          <script>
  $(document).ready(function(){
    $("#feedback").validate({
					errorElement: "div"
									 });
  });
  </script>
</head>
<body>

<?php
include 'base.php';
include 'functions.php';
$username=$_SESSION['username'];
  $result2=mysql_query("SELECT * FROM `users` WHERE `username` = '$username'") or die ("An error occurd. We are trying our best to fix this as soon as possible. Sorry for any inconvenience");
  $r = mysql_fetch_array($result2);
  $applicants_id=$r['id']; 
  $username=$r['first_name'].' '.$r['last_name'];
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
<div class="page_title">Feedback</div>

<div class="content_wrapping_small">



		<form action="send_feedback.php" name="feedback" id="feedback" method="post">
      <div class="form_label">If you have any comments,suggestions, or compliants, Please fill the form below and send it.<br />We will get back to you as soon as possible.<br />
      </div>
      <div>
	  <textarea class="text_area_feedback required" name="feed_back" id="feed_back" cols="30" rows="5" ></textarea></div>
      
        <div style="margin-top:15px;">
        <input class="form_button_style" type="submit" name="Submit" id="Submit" value="Send Feedback" /></div>
      
	</form>
    
    
</div>
</div><!--content ends here for center column-->


<div class="footer">E-Leave Application System. Copyright (C) 2016. Portal One Sdn Bhd</div>

</body>
</html>