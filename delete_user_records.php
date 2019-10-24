<?php
session_start();

if($_SESSION["access_level"] < 2  )
{
header("location:index.php");
exit;
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>E-Leave Application System</title>
		<link rel="stylesheet" type="text/css" href="css/stylesheet.css" />
        <link rel="stylesheet" type="text/css" href="jquery-ui/jquery-ui-1.8.10.custom.css" />        
		<script src="scripts/jquery.min.js" type="text/javascript"></script>
		<script src="scripts/jquery.textareaCounter.plugin.js" type="text/javascript"></script>
		<script src="scripts/textarea.js" type="text/javascript"></script>
        <script src="jquery-ui/jquery-ui-1.8.10.custom.min.js" type="text/javascript"></script>
		<script src="scripts/jquery.validate.js" type="text/javascript"></script>
    <script>
  $(document).ready(function(){
    $("#delete_user").validate({
					errorElement: "div"
									 });
  });
  </script>		
</head>

<body>
<?php

include 'base.php';
include 'secureme.php';
include 'functions.php';
$username=$_SESSION['username'];
  $result2=mysqli_query("SELECT * FROM `users` WHERE `username` = '$username'") or die ("An error occurd. We are trying our best to fix this as soon as possible. Sorry for any inconvenience");
  $r = mysqli_fetch_array($result2);
  $applicants_id=$r['id']; 
  $manager_dept=$r['department'];
  $access_level=$r['access_level'];
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
<div class="page_title">Delete User</div>

<div class="content_wrapping_small">


<form action="delete_user_records2.php" method="post" name="delete_user" id="delete_user">




<div>
<p class="only_bold">Enter the username or the ID of the employee you wish to delete from the system</p>
<p class="red_text"><span class="only_bold">Deleted records will be deleted permenantly. This operation cannot be reversed. Please do not hit delete unless you are sure the ID / username you have entered is correct.</span></p>
</div>
<div>
<input class="required" type="text" name="user" id="user"/></div>
<div><input class="form_button_style" type="submit" name="button2" id="button2"  value="Delete user"  /></div>
</div>



</form>


   </div>
</div><!--content ends here for center column-->


<div class="footer">E-Leave Application System. Copyright (C) 2016. Portal One Sdn Bhd</div>

</body>
</html>