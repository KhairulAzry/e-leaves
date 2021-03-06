<?php
session_start();

if($_SESSION["access_level"] < 2  )
{
header("location:index.php");
exit;
}

?>

<?php include 'check_records_updates.php'; ?>


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
  $manager_dept=$r['department'];
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
<div class="page_title">Admin Panel</div>

<div class="content_wrapping_small">

<div class="admin_wrapper">


<?php

$result=mysqli_query("SELECT * FROM `users` WHERE `registration_status` = '0' AND `department` = '$manager_dept'") or die ("An error occurd. We are trying our best to fix this as soon as possible. Sorry for any inconvenience");



if(mysqli_num_rows($result)>0)
{


	while ($r = mysqli_fetch_array($result)) 
	{ // Begin while

		$count1++;

	} // end while
echo "<div class=admin_panel_options_box>";	
echo "<div class=admin_panel_icons><img src=images/user_activation.png width=64 height=64 alt=New_users_activation_icon /></div>";
echo "<a href=check_users_manager.php>";
echo "New users";	
echo " ($count1)";
echo "</a>";
echo "</div>";
}

else 
{ 
echo "<div class=admin_panel_options_box>";	
echo "<div class=admin_panel_icons><img src=images/user_activation.png width=64 height=64 alt=New_users_activation_icon /></div>";
echo "New users";	
echo " (0)";
echo "</div>";
; }

?>


<?php

$result2=mysqli_query("SELECT * FROM `leave` WHERE `application_status` = 'pending' AND `applicant_department` = '$manager_dept'") or die ("An error occurd. We are trying our best to fix this as soon as possible. Sorry for any inconvenience");

if(mysqli_num_rows($result2)>0)
{



	while ($r = mysqli_fetch_array($result2)) 
	{ // Begin while
		$count2++;
	} // end while
echo "<div class=admin_panel_options_box>";	
echo "<div class=admin_panel_icons><img src=images/new_leaves.png width=64 height=64 alt=New_leaves_icon /></div>";
echo "<a href=check_leaves_applications_manager.php>";
echo "New leaves applications";	
echo " ($count2)";
echo "</a>";
echo "</div>";

}

else 
{ 
echo "<div class=admin_panel_options_box>";	
echo "<div class=admin_panel_icons><img src=images/new_leaves.png width=64 height=64 alt=New_leaves_icon /></div>";
echo "New leaves applications";	
echo " (0)";
echo "</div>";
}

?>





<!--part for notifying a user has passed one year interval-->

<?php


$result3=mysqli_query("SELECT * FROM `users` WHERE `yearly_adjust` = '1' AND `department` = '$manager_dept'") or die ("An error occurd. We are trying our best to fix this as soon as possible. Sorry for any inconvenience");



if(mysqli_num_rows($result3)>0)
{


	while ($r3 = mysqli_fetch_array($result3)) 
	{ // Begin while

		$count4++;

	} // end while

echo "<div class=admin_panel_options_box>";	
echo "<div class=admin_panel_icons><img src=images/records_update.png width=64 height=64 alt=records_update_icon /></div>";
echo "<a href=edit_records_manager.php>";
echo "Records updates";	
echo " ($count4)";
echo "</a>";
echo "</div>";
echo "<div class=clearall></div>";

}

else 
{ 
echo "<div class=admin_panel_options_box>";	
echo "<div class=admin_panel_icons><img src=images/records_update.png width=64 height=64 alt=records_update_icon /></div>";
echo "Records updates";	
echo " (0)";
echo "</div>";
echo "<div class=clearall></div>";
}



?>



<!--end of notifying of one year interval-->

<div class="admin_panel_options_box">
<div class="admin_panel_icons"><img src="images/edit_users.png" width="64" height="64" alt="edit_users_icon" /></div>
<a href="search_for_user.php">Edit users</a>
</div>



<div class="admin_panel_options_box">
<div class="admin_panel_icons"><img src="images/view_leaves_dept.png" width="64" height="64" alt="view_leaves_dept_icon" /></div>
<a href="view_leaves_manager.php">View leaves by departments</a>
</div>







<div class="admin_panel_options_box">
<div class="admin_panel_icons"><img src="images/leaves_by_user.png" width="64" height="64" alt="leaves_by_user_icon" /></div>
<a href="search_user_leaves.php">View leaves by users</a>
</div>
<div class="clearall"></div>


<div class="admin_panel_options_box">
<div class="admin_panel_icons"><img src="images/folders.png" width="64" height="64" alt="view_users_by_department_icon" /></div>
<a href="view_users_manager.php">View users by department</a>
</div>




<div class="admin_panel_options_box">
<div class="admin_panel_icons"><img src="images/chart.png" width="64" height="64" alt="statistics_icon" /></div>
<a href="check_statistics_manager.php">Leaves statistics</a>
</div>


<div class="admin_panel_options_box">
<div class="admin_panel_icons"><img src="images/delete_user.png" width="64" height="64" alt="delete_user_icon" /></div>
<a href="delete_user_records.php">Delete user</a>
</div>


<div class="clearall"></div>


</div>

   </div>
</div><!--content ends here for center column-->


<div class="footer">E-Leave Application System. Copyright (C) 2016. Portal One Sdn Bhd</div>

</body>
</html>