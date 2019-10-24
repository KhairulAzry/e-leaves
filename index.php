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
<LINK href="css/stylesheet.css" rel="stylesheet" type="text/css">

<title>Portal One E-Leave Application System</title>
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
    <div id="right_date"><?php echo date("D j-m-Y"); ?></div>
</div>  </div>

<!--Content for center column-->
<div class="page_title">Account Overview</div>
<div>
  <div class="overview-leaves">  

  <div class="menu_links">Leaves credits:</div>
  <div class="leaves_credits_box">
    <?php find_field('annual_leave_credit',$applicants_id) ?>  
    <?php find_field('medical_leave_credit',$applicants_id) ?>
    <?php find_field('emergency_leave_credit',$applicants_id) ?>
    <?php find_field('compassionate_leave_credit',$applicants_id) ?>
	<?php find_field('unpaid_leave_credit',$applicants_id) ?>   
    <?php find_field('maternity_leave_credit',$applicants_id) ?>  
    <?php find_field('paternity_leave_credit',$applicants_id) ?>   
	</div>

  </div>
  

<div class="overview-leaves-statistics">  

  <div class="menu_links">Leaves statistics:</div>
  <div class="leaves_credits_box2">
   	<?php	get_leaves('pending',$applicants_id);		?>
    <?php	get_leaves('approved',$applicants_id);		?>
    <?php	get_leaves('rejected',$applicants_id);		?>
	</div>

  </div>


</div>
</div><!--content ends here for center column-->


<div class="footer">E-Leave Application System. Copyright (C) 2016. Portal One Sdn Bhd</div>

</body>
</html>