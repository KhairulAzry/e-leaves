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
<div class="page_title">View leaves Details</div>

<div class="content_wrapping_small">

<?php

$leave_ref = $_REQUEST['leave_ref'];
$leave_credit=$_REQUEST['leave_credit'];
$department = $_REQUEST['department'];

$result2=mysql_query("SELECT * FROM `leave` WHERE `reference_no` = '$leave_ref'") or die ("An error occurd. We are trying our best to fix this as soon as possible. Sorry for any inconvenience");


if ($result2)
{
	$row = mysql_fetch_array($result2);
	
	//$leave_ref = $row["reference_no"];
	$applicants_id=$row['applicants_id'];
	$applicant_name= $row["applicant_name"];
	$start_date = $row["start_date"];
	$end_date = $row["end_date"];
	$number_days = $row["no_of_days"];
	$type = $row["type"];
	$reason=$row['reason'];
	$status=$row['application_status'];
	$pathtofile=$row['pathtofile'];
	
	echo "<p class=only_bold>Details for leave with Reference Number: <span class=underlined_text>$leave_ref</span></p>";
	
		if ($status == 'approved')
	{
	echo "<div class=check_leaves_info>Status:</div>";
	echo "<div class=icon_lists><img src=images/approved.png width=16 height=16 alt=good_to_go_icon /></div>";		
	echo "<div class=floataftericon_green>Approved</div>";
	echo "<div class=clearall></div>";
	}

	if ($status == 'rejected')
	{
	echo "<div class=check_leaves_info>Status:</div>";
	echo "<div class=icon_lists><img src=images/rejected.png width=16 height=16 alt=rejected_icon /></div>";		
	echo "<div class=floataftericon_red>Rejected</div>";
	echo "<div class=clearall></div>";
	}
	
	if ($status == 'pending')
	{
	echo "<div class=check_leaves_info>Status:</div>";
	echo "<div class=icon_lists><img src=images/pending.png width=16 height=16 alt=pending_icon /></div>";		
	echo "<div class=floataftericon_blue>Pending</div>";
	echo "<div class=clearall></div>";
	}	


		echo "<div class=check_leaves_info>Start Date:</div>";
	echo "<div class=float_leave_info>$start_date</div>";
	echo "<div class=clearall></div>";
	
	echo "<div class=check_leaves_info>End Date:</div>";
	echo "<div class=float_leave_info>$end_date</div>";
	echo "<div class=clearall></div>";

	echo "<div class=check_leaves_info>Duration:</div>";
	echo "<div class=float_leave_info>$number_days day(s)</div>";
	echo "<div class=clearall></div>";

	echo "<div class=check_leaves_info>Type:</div>";
	echo "<div class=float_leave_info>$type</div>";
	echo "<div class=clearall></div>";
	

	echo "<div class=check_leaves_info>Credit:</div>";
	echo "<div class=float_leave_info>$leave_credit day(s)</div>";
	echo "<div class=clearall></div>";


	echo "<div class=check_leaves_info>Reason:</div>";
	echo "<div class=float_leave_info>$reason</div>";
	echo "<div class=clearall></div>";
	
if ($pathtofile)
{
	echo "<div class=check_leaves_info>Attachement:</div>";
	echo "<div class=icon_lists><img src=images/attach.png width=16 height=16 alt=attach_icon /></div>";
	echo "<div class=links_float_left><a href=$pathtofile>View file</a></div>";	
	echo "<div class=clearall></div>";

}

else
{

echo "";

}
	
	
if ($status == 'pending')
{
	echo "<br>";
	echo "<div class=icon_lists><img src=images/approved.png width=16 height=16 alt=good_to_go_icon /></div>";
	echo "
		<div class=links_float_left><a href=approve_leave.php?leave_ref=$leave_ref&leave_credit=$leave_credit&applicants_id=$applicants_id&leave_type=$type&number_days=$number_days>Approve Leave </a></div>";
		echo "<div class=small_vertical_space></div>";
echo "<div class=icon_lists><img src=images/rejected.png width=16 height=16 alt=rejected_icon /></div>
<div class=links_float_left><a href=reject_leave.php?leave_ref=$leave_ref>Reject Leave</a></div>
<div class=clearall></div>
<br>
	";
}

else{}	
	
	

	
}


?>


   </div>
</div><!--content ends here for center column-->


<div class="footer">E-Leave Application System. Copyright (C) 2016. Portal One Sdn Bhd</div>

</body>
</html>