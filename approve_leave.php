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
  $result2=mysql_query("SELECT * FROM `users` WHERE `username` = '$username'") or die ("An error occurd. We are trying our best to fix this as soon as possible. Sorry for any inconvenience");
  $r = mysql_fetch_array($result2);
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
<div class="page_title">New leaves applications</div>

<div class="content_wrapping_small">

<?php

$leave_ref = $_REQUEST['leave_ref'];
$number_days = $_REQUEST['number_days'];
$leave_credit=$_REQUEST['leave_credit'];
$applicants_id=$_REQUEST['applicants_id'];
$leave_type=$_REQUEST['leave_type'];
$string_leave_type=$leave_type.'_'.'leave_credit';

$result2=mysql_query("SELECT * FROM `leave` WHERE `reference_no` = '$leave_ref'") or die ("An error occurd. We are trying our best to fix this as soon as possible. Sorry for any inconvenience");
$row = mysql_fetch_array($result2);


	$get_user=mysql_query("SELECT * FROM `users` WHERE `id`='$applicants_id'") or die ("An error occurd. We are trying our best to fix this as soon as possible. Sorry for any inconvenience");
	$get_user_info=mysql_fetch_array($get_user);	
	//$department=$get_user_info['department'];
	$delivery_email=$get_user_info['e_mail'];
	$user_dept=$get_user_info['department'];


if ($leave_credit >= $number_days)
{
$no_off_days=$row['no_of_days'];
$new_balance= $leave_credit - $no_off_days;

if ($manager_dept == $user_dept OR $access_level == 'admin')
{

$deduct=mysql_query("UPDATE `users` SET `$string_leave_type` = '$new_balance' WHERE `users`.`id` =$applicants_id;") or die ("An error occurd. We are trying our best to fix this as soon as possible. Sorry for any inconvenience");

$result=mysql_query("UPDATE `leave` SET `application_status` = 'approved' WHERE `leave`.`reference_no` =$leave_ref;") or die ("An error occurd. We are trying our best to fix this as soon as possible. Sorry for any inconvenience"); //or die ("ERROR");

$result2=mysql_query("SELECT * FROM `leave` WHERE `reference_no` = '$leave_ref'") or die ("An error occurd. We are trying our best to fix this as soon as possible. Sorry for any inconvenience");
$row = mysql_fetch_array($result2);
}
else
{
echo "<div class=icon_lists><img src=images/warning.png width=16 height=16 alt=warning_icon /></div>";		
echo "<div class=floataftericon_red>An error has occurd</div>";
echo "<div class=clearall></div>";
echo "<p>An error has occurd. It looks like the application you have tried to approve does not belong in your department. If you think this is an error, please contact the adminstration staff.</p>";
}

}


else
{

echo "<div class=icon_lists><img src=images/warning.png width=16 height=16 alt=warning_icon /></div>";
echo "<div class=floataftericon_red>";
echo "The applicant has no sufficient credit<br><br></div>";
echo "<div class=clearall></div>";


echo "<p>The applicant has no remaining leaves or no sufficient leaves credit for the applied leave type. Please choose an action:</p>";

echo "<div class=clearall></div>";


echo "<div class=icon_lists><img src=images/approved.png width=16 height=16 alt=good_to_go_icon /></div>";
echo "<div class=links_float_left><a href=approve_leave_forced.php?leave_ref=$leave_ref&leave_credit=$leave_credit&applicants_id=$applicants_id&leave_type=$leave_type&number_days=$number_days>Approve Leave Anyway</a></div>";

echo "<div class=clearall></div>";



echo "<div class=icon_lists><img src=images/rejected.png width=16 height=16 alt=rejected_icon /></div>";
echo "<div class=links_float_left><a href=reject_leave.php?leave_ref=$leave_ref>Reject Leave</a></div>";

echo "<div class=clearall></div>";

echo "

  </div>
</div>


<div class=footer>E-Leave Application System. Copyright (C) 2016. Portal One Sdn Bhd</div>

</body>
</html>

";

exit;

}

//$_SESSION['leave_credit']
/*
$deduct=mysql_query("UPDATE `app1`.`users` SET `leave_credit` = '$new_balance' WHERE `users`.`id` =$applicants_id;");*/



if ($result)
{
$approved_by=$_SESSION['username'];
$by=mysql_query("UPDATE `leave` SET `approved_by` = '$approved_by' WHERE `leave`.`reference_no` =$leave_ref;") or die ("An error occurd. We are trying our best to fix this as soon as possible. Sorry for any inconvenience"); //or die ("ERROR");


echo "<div class=icon_lists><img src=images/approved.png width=16 height=16 alt=good_to_go_icon /></div>";		
echo "<div class=floataftericon_green>Leave successfully approved</div>";
echo "<div class=clearall></div>";
echo "<p>Leave with $leave_ref was successfully approved.<br><br>The applicant was sent an automatic E-mail notification regarding the approval of the leave. </p>";


}

if ($result2)
{
	//$row = mysql_fetch_array($result2);
	
	$result4=mysql_query("SELECT * FROM `users` WHERE `username` = '$approved_by'") or die ("An error occurd. We are trying our best to fix this as soon as possible. Sorry for any inconvenience");
	$row4 = mysql_fetch_array($result4);
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
	//$headers .= "Return-Path: $admin_mail\r\n";
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