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
    $("#edit_user_admin").validate({
					errorElement: "div"									 });
  });
  </script>	
 
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
<div class="page_title">Leaves Statistics</div>

<div class="content_wrapping_small">


<?php
function max_key($counter) 
{
foreach ($counter as $key => $val) 
{
if ($val == max($counter)) return $key;
}
} 


$dept=$_POST['dept'];


$sql=mysql_query("SELECT * FROM `users` ORDER BY `id` DESC LIMIT 0, 1");
$limits=mysql_fetch_array($sql);
$count=$limits['id'];
//correct here!!!

$no_of_leaves_dept=mysql_query("SELECT * FROM `leave` WHERE `applicant_department` = '$dept'");
$no_of_leaves_dept=mysql_num_rows($no_of_leaves_dept);

$no_of_leaves_all=mysql_query("SELECT * FROM `leave`");
$no_of_leaves_all=mysql_num_rows($no_of_leaves_all);

if ($dept == 'All departments')
{

for ($i=1; $i<=$count; $i++)
{
$sql2=mysql_query("SELECT * FROM `leave` WHERE `applicants_id`='$i'");
$counter[$i]=mysql_num_rows($sql2);
}

$highest_user=max_key($counter);
$highest_value=$counter[$highest_user];

for ($i=1; $i<=$count; $i++)
{
	if ($counter[$i]==$highest_value)
	{
	$user=$i;
	$sql=mysql_query("SELECT * FROM `leave` WHERE `applicants_id`='$user'");
	$get_info=mysql_fetch_array($sql);

	if (mysql_num_rows($sql) > 0)
	{
	$id=$get_info['applicants_id'];
	$name=$get_info['applicant_name'];
	$dept=$get_info['applicant_department'];
	$number=max($counter);
	
	echo "<p class=only_bold><span class=underlined_text>Total Number of leaves applications in all departments is: $no_of_leaves_all</span></p>";

	echo "<p class=only_bold><span class=underlined_text>User with the highest leave application(s) is:</span></p>";
	
	echo "<div class=check_leaves_info>User ID:</div>";
	echo "<div class=float_leave_info>$id</div>";
	echo "<div class=clearall></div>";
	
	echo "<div class=check_leaves_info>Name:</div>";
	echo "<div class=float_leave_info>$name</div>";
	echo "<div class=clearall></div>";

	echo "<div class=check_leaves_info>Department:</div>";
	echo "<div class=float_leave_info>$dept</div>";
	echo "<div class=clearall></div>";

	echo "<div class=check_leaves_info>Leaves:</div>";
	echo "<div class=float_leave_info>$number application(s)</div>";
	echo "<div class=clearall></div>";
	echo "<br>";

	}

}

}
}

else
{

for ($i=1; $i<=$count; $i++)
{
$sql2=mysql_query("SELECT * FROM `leave` WHERE `applicants_id`='$i' AND `applicant_department`='$dept'");
$counter[$i]=mysql_num_rows($sql2);
}

$highest_user=max_key($counter);
$highest_value=$counter[$highest_user];

for ($i=1; $i<=$count; $i++)
{
	if ($counter[$i]==$highest_value)
	{
	$user=$i;

$sql=mysql_query("SELECT * FROM `leave` WHERE `applicants_id`='$user' and `applicant_department` = '$dept'");

$get_info=mysql_fetch_array($sql);

if (mysql_num_rows($sql) > 0)
{

$id=$get_info['applicants_id'];
$name=$get_info['applicant_name'];
$dept=$get_info['applicant_department'];
$number=max($counter);

	echo "<p class=only_bold><span class=underlined_text>Total Number of leaves applications in this department is: $no_of_leaves_dept</span></p>";
	
	echo "<p class=only_bold><span class=underlined_text>User with the highest leave application(s) is:</span></p>";
	
	echo "<div class=check_leaves_info>User ID:</div>";
	echo "<div class=float_leave_info>$id</div>";
	echo "<div class=clearall></div>";
	
	echo "<div class=check_leaves_info>Name:</div>";
	echo "<div class=float_leave_info>$name</div>";
	echo "<div class=clearall></div>";

	echo "<div class=check_leaves_info>Department:</div>";
	echo "<div class=float_leave_info>$dept</div>";
	echo "<div class=clearall></div>";

	echo "<div class=check_leaves_info>Leaves:</div>";
	echo "<div class=float_leave_info>$number application(s)</div>";
	echo "<div class=clearall></div>";
	echo "<br>";
}

}
}
}

if (mysql_num_rows($sql) == 0)
{
	echo "<div class=icon_lists><img src=images/warning.png width=16 height=16 alt=warning_icon /></div>";
	echo "<div class=floataftericon_red>";
	echo "An error has occurd<br><br></div>";
	echo "<div class=clearall></div>";
	echo "It looks like the department you have chosen has no leave application(s) yet. Please try again. If the problem persists, please contact the admin staff.";
	echo "<div class=clearall></div>";
}

?>

   </div>
</div><!--content ends here for center column-->


<div class="footer">E-Leave Application System. Copyright (C) 2016. Portal One Sdn Bhd</div>

</body>
</html>