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
<div class="page_title">Delete public holidays</div>

<div class="content_wrapping_small">

<?php

$number = $_REQUEST['number'];

$sql=mysql_query("SELECT * FROM `holidays` WHERE `number` = '$number'") or die ("An error occurd. We are trying our best to fix this as soon as possible. Sorry for any inconvenience");
$result=mysql_num_rows($sql);


if ($result != 0)
{

$delete=mysql_query("DELETE FROM `holidays` WHERE `number` = '$number'") or die ("An error occurd. We are trying our best to fix this as soon as possible. Sorry for any inconvenience");;


echo "<div class=icon_lists><img src=images/rejected.png width=16 height=16 alt=rejected_icon /></div>";
echo "<div class=floataftericon_red>";
echo "Holiday deleted<br><br></div>";
echo "<div class=clearall></div>";
echo "<p>Holiday was successfully deleted from the system. It will not be included in future applications.</p>";



}


else
{
	
echo "<div class=icon_lists><img src=images/warning.png width=16 height=16 alt=warning_icon /></div>";
echo "<div class=floataftericon_red>";
echo "An error occurd<br><br></div>";
echo "<div class=clearall></div>";
echo "<p>Holiday does not exist in the system. Please try again.</p>";	
	
}


?>


</div>
</div><!--content ends here for center column-->


<div class="footer">E-Leave Application System. Copyright (C) 2016. Portal One Sdn Bhd</div>

</body>
</html>