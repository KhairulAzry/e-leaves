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
        <script src="scripts/jquery-ui.min.js" type="text/javascript"></script>
        <script src="jquery-ui/jquery-ui-1.8.10.custom.min.js" type="text/javascript"></script>
        <script src="scripts/jquery.validate.js" type="text/javascript"></script>
          <script>
  $(document).ready(function(){
    $("#search-for-leave").validate({
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
<div class="page_title">Cancel Leave Application</div>

<div class="content_wrapping_small">
    
<?php

$reference=$_POST['reference_no'];

$sql1=mysqli_query("SELECT * FROM `leave` WHERE `reference_no` = '$reference' AND `applicants_id` = '$applicants_id'") or die ("An error occurd. We are trying our best to fix this as soon as possible. Sorry for any inconvenience"); //or die ("ERROR");
$result1=mysqli_num_rows($sql1);

if ($result1 > 0)
{

$data=mysqli_fetch_array($sql1);
$start_date=$data['start_date'];
$status=$data['application_status'];
$no_of_days=$data['no_of_days'];
$type=$data=$data['type'];
$today=date("Y-m-j");

if ($status == 'rejected')
{
echo "<div class=icon_lists><img src=images/rejected.png width=16 height=16 alt=warning_icon /></div>";
echo "<div class=floataftericon_red>";
echo "Leave could not be cancelled<br></div>";
echo "<div class=clearall></div>";
echo "<p>Leave with Reference Number $reference has been rejected. Rejected applications are automatically cancelled.</p>";
}


if ($status == 'approved' and $start_date <= $today)
{
echo "<div class=icon_lists><img src=images/rejected.png width=16 height=16 alt=warning_icon /></div>";
echo "<div class=floataftericon_red>";
echo "Leave could not be cancelled<br></div>";
echo "<div class=clearall></div>";
echo "<p>Leave with Reference Number $reference has been approved and its starting date has already passed.</p>";
}


if ($status == 'pending' and $start_date <= $today)
{
echo "<div class=icon_lists><img src=images/rejected.png width=16 height=16 alt=warning_icon /></div>";
echo "<div class=floataftericon_red>";
echo "Leave could not be cancelled<br></div>";
echo "<div class=clearall></div>";
echo "<p>Leave with Reference Number $reference is still pending and its starting date has already passed.</p>";
}


if ($status == 'pending' and $start_date > $today)
{

$sql2=mysqli_query("DELETE FROM `leave` WHERE `reference_no` = '$reference'") or die ("An error occurd. We are trying our best to fix this as soon as possible. Sorry for any inconvenience"); //or die ("ERROR");

echo "<div class=icon_lists><img src=images/rejected.png width=16 height=16 alt=warning_icon /></div>";
echo "<div class=floataftericon_red>";
echo "Leave was successfully cancelled<br></div>";
echo "<div class=clearall></div>";
echo "<p>Leave with Reference Number $reference was successfully deleted from the system.</p>";
}

if ($status == 'approved' and $start_date > $today)
{

$sql2=mysqli_query("DELETE FROM `leave` WHERE `reference_no` = '$reference'") or die ("An error occurd. We are trying our best to fix this as soon as possible. Sorry for any inconvenience"); //or die ("ERROR");

$type=lcfirst($type);
$type=$type.'_leave_credit';

$sql3=mysqli_query("SELECT * FROM `users` WHERE `id` = '$applicants_id'");
$get_credit=mysqli_fetch_array($sql3);
$current_credit=$get_credit[$type];

$new_balance=$current_credit+$no_of_days;


$sql3=mysqli_query("UPDATE `users` SET `$type` = '$new_balance' WHERE `id` = '$applicants_id'") or die ("An error occurd. We are trying our best to fix this as soon as possible. Sorry for any inconvenience");


echo "<div class=icon_lists><img src=images/rejected.png width=16 height=16 alt=warning_icon /></div>";
echo "<div class=floataftericon_red>";
echo "Leave was successfully cancelled<br></div>";
echo "<div class=clearall></div>";
echo "<p>Leave with Reference Number $reference was successfully deleted from the system. Leave credits were adjusted accordingly.</p>";
}

//echo $start_date;
//echo $today;
}
else
{
echo "<div class=icon_lists><img src=images/rejected.png width=16 height=16 alt=warning_icon /></div>";
echo "<div class=floataftericon_red>";
echo "Leave could not be cancelled<br></div>";
echo "<div class=clearall></div>";
echo "<p>No leave with this reference in your records</p>";
echo "<div class=clearall></all>";
}




?>
    
   </div>
</div><!--content ends here for center column-->


<div class="footer">E-Leave Application System. Copyright (C) 2016. Portal One Sdn Bhd</div>

</body>
</html>