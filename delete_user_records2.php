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
  $manager_dept=$r['department'];
  $access_level=$r['access_level'];
  $user_name_original=$r['username'];
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


<?php

$key = $_POST['user'];

$sql=mysqli_query("SELECT * FROM `users` WHERE `id` ='$key' OR `username` ='$key'") or die ("An error occurd. We are trying our best to fix this as soon as possible. Sorry for any inconvenience"); //or die ("ERROR");;
$get_dept=mysqli_fetch_array($sql);
$user_dept=$get_dept['department'];
$user_name=$get_dept['username'];
$user_id=$get_dept['id'];

$manager_username=$_SESSION['username'];


if (mysqli_num_rows($sql) > 0)
{

if (($manager_dept == $user_dept OR $access_level == 'admin') and ($manager_username != $user_name))
{
$result=mysqli_query("DELETE FROM `users` WHERE `username` = '$user_name'") or die ("An error occurd. We are trying our best to fix this as soon as possible. Sorry for any inconvenience"); //or die ("ERROR");

$leaves=mysqli_query("SELECT * FROM `leave` WHERE `applicants_id` = '$user_id'");
if (mysqli_num_rows($leaves) > 0)
{

$result2=mysqli_query("DELETE FROM `leave` WHERE `applicants_id` IN ('$user_id')") or die ("An error occurd. We are trying our best to fix this as soon as possible. Sorry for any inconvenience"); //or die ("ERROR");

echo "<div class=clearall></div>";
echo "<div class=icon_lists><img src=images/rejected.png width=16 height=16 alt=rejected_icon /></div>";		
echo "<div class=floataftericon_red>Leaves records deleted</div>";
echo "<div class=clearall></div>";



}

echo "<div class=icon_lists><img src=images/rejected.png width=16 height=16 alt=rejected_icon /></div>";		
echo "<div class=floataftericon_red>User successfully deleted</div>";
echo "<div class=clearall></div>";
echo "<p>User has been deleted from the system. All records associated with this user has been erased from the database.</p>";
}

else
{

echo "<div class=icon_lists><img src=images/warning.png width=16 height=16 alt=warning_icon /></div>";		
echo "<div class=floataftericon_red>An error has occurd</div>";
echo "<div class=clearall></div>";
echo "<p>An error has occurd. It looks like the user you have tried to delete does not belong in your department or you have tried to delete your own account. If you think this is an error, please contact the adminstration staff.</p>";

}

}
else
{
echo "<div class=icon_lists><img src=images/warning.png width=16 height=16 alt=warning_icon /></div>";		
echo "<div class=floataftericon_red>An error has occurd</div>";
echo "<div class=clearall></div>";
echo "<p>An error has occurd. It looks like the user you have tried to delete does not exist in the database. Please try again. If the error persist, please contact the admin staff.</p>";


}
?>


   </div>
</div><!--content ends here for center column-->


<div class="footer">E-Leave Application System. Copyright (C) 2016. Portal One Sdn Bhd</div>

</body>
</html>