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
<div class="page_title">New leaves applications</div>

<div class="content_wrapping_small">

<?php

$leave_ref = $_REQUEST['leave_ref'];
$number_days = $_REQUEST['number_days'];
$leave_credit=$_REQUEST['leave_credit'];
$applicants_id=$_REQUEST['applicants_id'];
$leave_type=$_REQUEST['leave_type'];
$string_leave_type=$leave_type.'_'.'leave_credit';


$result2=mysqli_query("SELECT * FROM `leave` WHERE `reference_no` = '$leave_ref'") or die ("An error occurd. We are trying our best to fix this as soon as possible. Sorry for any inconvenience");


	$get_user=mysqli_query("SELECT * FROM `users` WHERE `id`='$applicants_id'") or die ("An error occurd. We are trying our best to fix this as soon as possible. Sorry for any inconvenience");
	$get_user_info=mysqli_fetch_array($get_user);	
	//$department=$get_user_info['department'];
	$delivery_email=$get_user_info['e_mail'];



$result=mysqli_query("UPDATE `leave` SET `application_status` = 'approved' WHERE `leave`.`reference_no` =$leave_ref;") or die ("An error occurd. We are trying our best to fix this as soon as possible. Sorry for any inconvenience"); //or die ("ERROR");

$zero=mysqli_query("UPDATE `users` SET `$string_leave_type` = '0' WHERE `users`.`id` =$applicants_id;") or die ("An error occurd. We are trying our best to fix this as soon as possible. Sorry for any inconvenience");

$result2=mysqli_query("SELECT * FROM `leave` WHERE `reference_no` = '$leave_ref'") or die ("An error occurd. We are trying our best to fix this as soon as possible. Sorry for any inconvenience");
$row = mysqli_fetch_array($result2);


if ($result)
{

$approved_by=$_SESSION['username'];
$by=mysqli_query("UPDATE `leave` SET `approved_by` = '$approved_by' WHERE `leave`.`reference_no` =$leave_ref;") or die ("An error occurd. We are trying our best to fix this as soon as possible. Sorry for any inconvenience"); //or die ("ERROR");

echo "<div class=icon_lists><img src=images/approved.png width=16 height=16 alt=good_to_go_icon /></div>";		
echo "<div class=floataftericon_green>Leave successfully approved</div>";
echo "<div class=clearall></div>";
echo "<p>Leave with reference number $leave_ref was successfully approved.<br><br>The applicant was sent an automatic E-mail notification regarding the approval of the leave. </p>";


}

if ($result2)
{
	
	//$row = mysqli_fetch_array($result2);
	$result4=mysqli_query("SELECT * FROM `users` WHERE `username` = '$approved_by'") or die ("An error occurd. We are trying our best to fix this as soon as possible. Sorry for any inconvenience");
	$row4 = mysqli_fetch_array($result4);
		//retrieve emails and admin username using this row4
	$admin_mail=$row4['e_mail'];
	$by_whom=$row4['first_name'].' '.$row4['last_name'];
	$name=$row['applicant_name'];
	$type=$row['type'];
	$start=$row['start_date'];
	$end=$row['end_date'];
	$duration=$row['no_of_days'];
	$status=$row['application_status'];
	$status2=ucfirst($status);
	$message="Dear $name:<br><br>Your Leave with the reference number $leave_ref was $status. The details of your leaves are as follows:<br><br>- Leave Type: $type<br>- Start Date: $start<br>- End Date: $end<br>- Duration: $duration day(s)<br>- $status2 by: $by_whom<br><br>Please do not reply to this E-mail as this is a system generated message.";
	
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= "From: admin@eleaves.org\r\n";
	//$headers = "From: myplace@here.com\r\n";
	//$headers .= "Reply-To: $admin_mail\r\n";
	//$headers .= "Return-Path: myplace@here.com\r\n";
	//$headers .= "CC: sombodyelse@noplace.com\r\n";
	//$headers .= "BCC: hidden@special.com\r\n";
    @mail($delivery_email,"Response for Leave Application $leave_ref",$message,$headers);
}


?>



   </div>
</div><!--content ends here for center column-->


<div class="footer">E-Leave Application System. Copyright (C) 2016. Portal One Sdn Bhd</div>

</body>
</html>