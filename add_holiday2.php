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
		<link rel="stylesheet" type="text/css" href="css/calendar.css"/>
		<link rel="stylesheet" type="text/css" href="css/stylesheet.css" />
		<script src="scripts/jquery.min.js" type="text/javascript"></script>
		<script src="scripts/jquery.textareaCounter.plugin.js" type="text/javascript"></script>
		<script src="scripts/textarea.js" type="text/javascript"></script>
</head>
<body>

<?php
include 'base.php';
include 'functions.php';
include 'secureme.php';
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
<div class="page_title">Add Public Holidays</div>

<div class="content_wrapping_small">




<?php


$count=$_POST['here'];
//echo "$count";

for ($i=0; $i<=$count; $i++)
{
	if ($_POST['date'.$i] != '' and $_POST['des'.$i] != '')
	{
		$holiday_date[$i]=date('Y-m-d', strtotime($_POST['date'.$i]));
		$holiday_des[$i]=$_POST['des'.$i];
		
		//echo $holiday_date[$i];
		//echo "<br>";
		//echo $holiday_des[$i];
		//echo "<br>";
		
		//$sql = ;
		$sql=mysql_query("INSERT INTO `holidays` (`holiday_date`, `holiday_des`) VALUES ('$holiday_date[$i]', '$holiday_des[$i]')"); 
	}
}
			if ($sql)
			{
			echo "<div class=icon_lists><img src=images/approved.png width=16 height=16 alt=good_to_go_icon /></div>";		
			echo "<div class=floataftericon_green>Holidays were added successfully</div>";
			echo "<div class=clearall></div>";
			echo "<div><br>All holidays were added to the system successfully. These days will be excluded from any new leave applications.</div>";
			}
			
			else
			{
			echo "<div class=icon_lists><img src=images/warning.png width=16 height=16 alt=warning_icon /></div>";		
			echo "<div class=floataftericon_red>An Error has Occurd</div>";
			echo "<div class=clearall></div>";
			echo "<div><br>An error has occurd. It might be that you have left the form empty. If the error persist, please contact the admin staff.</div>";	
			}


?>

</div>
</div><!--content ends here for center column-->


<div class="footer">E-Leave Application System. Copyright (C) 2016. Portal One Sdn Bhd</div>

</body>
</html>