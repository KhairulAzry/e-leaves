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
        <link rel="stylesheet" type="text/css" href="jquery-ui/jquery-ui-1.8.10.custom.css" />
		<script src="scripts/datecheck.js" type="text/javascript"></script>
		<script src="scripts/jquery.min.js" type="text/javascript"></script>
		<script src="scripts/jquery.textareaCounter.plugin.js" type="text/javascript"></script>
		<script src="scripts/textarea.js" type="text/javascript"></script>
        <script src="scripts/validate.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui.min.js" type="text/javascript"></script>
        <script src="jquery-ui/jquery-ui-1.8.10.custom.min.js" type="text/javascript"></script>

</head>

<body>

<?php
include 'base.php';
include 'functions.php';
$username=$_SESSION['username'];
  $result2=mysqli_query("SELECT * FROM `users` WHERE `username` = '$username'") or die ("An error occurd. We are trying our best to fix this as soon as possible. Sorry for any inconvenience");
  $r = mysqli_fetch_array($result2);
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
<div class="page_title">Public Holidays List</div>

<div class="content_wrapping_small">
    



<?php


$result=mysqli_query("SELECT * FROM `holidays` ORDER BY `holiday_date` ASC");

if(mysqli_num_rows($result)>0)
	{
echo "
	<div class=table_list_holidays>Date</div>
	<div class=table_list_holidays_des>Public Holiday Title</div>
	<div class=table_list_holidays>Action</div>	
	";
	echo "<div style=clear:both;></div>";	
	while ($row = mysqli_fetch_array($result))
	{
	echo "<div class=clearall></div>";	
	$holiday_date=$row['holiday_date'];
	$holiday_des= $row['holiday_des'];
	$number=$row['number'];
	
echo "
	<div class=table_list_holidays_content>$holiday_date</div>

	<div class=table_list_holidays_content_des>$holiday_des</div>
	
	<div class=table_list_holidays_content>
	<div class=small_vertical_space></div>
	<div class=small_vertical_space></div>
	<div class=small_vertical_space></div>
	<div class=icon_lists_holiday><img src=images/rejected.png width=16 height=16 alt=delete_icon /></div>
	<div class=links_float_left_holiday><a href=delete_holiday_process.php?number=$number>Delete</a></div></div>

	
	";
echo "<div class=clearall></div>";

}	
}

echo "<div class=clearall></div>";

if (mysqli_num_rows($result) == 0)
{
echo "<div class=icon_lists><img src=images/warning.png width=16 height=16 alt=warning_icon /></div>";
echo "<div class=floataftericon_red>";
echo "No records found<br></div>";
echo "<div class=clearall></div>";
echo "<p>There are no public holidays in the system.</p>";
echo "<div class=clearall></all>";
}	


?>    




   </div>
</div><!--content ends here for center column-->


<div class="footer">E-Leave Application System. Copyright (C) 2016. Portal One Sdn Bhd</div>

</body>
</html>