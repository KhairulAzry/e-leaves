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
<div class="page_title">Edit users</div>

<div class="content_wrapping_small">

<?php

		if (!empty($_POST['search1'])){
			$key = $_POST['search1'];
		}
		//$key = stripslashes($key);
		//$key = mysql_real_escape_string($key);
		
		$key2=$_REQUEST['user_id'];
		
		$checkme=$_REQUEST['checkme'];

		$result=mysql_query("SELECT * FROM `users` WHERE `id` = '$key' or `username` = '$key' or `id` = '$key2' ") or die ("An error occurd. We are trying our best to fix this as soon as possible. Sorry for any inconvenience");
		//$result2=mysql_query("SELECT * FROM `users` WHERE `username` = '$key'");
		

		if(mysql_num_rows($result)>0)
		{
			
		
			$r = mysql_fetch_array($result);
			$_SESSION['key'] = $r['id'];
			$user_dept=$r['department'];
			//$_SESSION['key2']=$key2;
			if ($manager_dept == $user_dept OR $access_level == 'admin')
			{

			include 'edit_user_form.php';
			}
			else
			{
			echo "<div class=icon_lists><img src=images/warning.png width=16 height=16 alt=warning_icon /></div>";		
echo "<div class=floataftericon_red>An error has occurd</div>";
echo "<div class=clearall></div>";
echo "<p>An error has occurd. It looks like the user you have tried to edit does not belong in your department. If you think this is an error, please contact the adminstration staff.</p>";
			}
		
		}
		
		
		
		if (!mysql_num_rows($result))
		{
					echo "<div class=icon_lists><img src=images/warning.png width=16 height=16 alt=warning_icon /></div>";
				echo "<div class=floataftericon_red>";
				echo "Your search returned zero results<br><br></div>";
				echo "<div class=clearall></div>";
				echo "It looks like you have entered an invalid user ID. Please go back and try again.";
				echo "<div class=clearall></div>";
		}


?>


</div>
</div><!--content ends here for center column-->


<div class="footer">E-Leave Application System. Copyright (C) 2016. Portal One Sdn Bhd</div>

</body>
</html>