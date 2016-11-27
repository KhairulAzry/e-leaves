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
<div class="page_title">Edit users</div>

<div class="content_wrapping_small">

<?php

$checkme=$_REQUEST['checkme'];

$key = $_SESSION['key'];

//$key2 = $_SESSION['key2'];

if	(
		
	$_POST['first_name'] and
	$_POST['last_name'] and
	$_POST['username'] and
	$_POST['password'] and
	$_POST['e_mail'] and
	$_POST['handphone']	and
	$_POST['department'] and
	$_POST['access_level'] 
	//$_POST['annual_leave_credit'] and
	//$_POST['medical_leave_credit'] and
	//$_POST['maternity_leave_credit'] and 
	//$_POST['paternity_leave_credit'] and
	//$_POST['emergency_leave_credit'] and
	//$_POST['unpaid_leave_credit'] and
	//$_POST['compassionate_leave_credit']
	//$_POST['leave_credit']
		
		
	) 
	
{	
		$first_name = $_POST['first_name'];
		//$first_name = stripslashes($first_name);
		//$first_name = mysql_real_escape_string($first_name);
		$last_name = $_POST['last_name'];
		//$last_name = stripslashes($last_name);
		//$last_name = mysql_real_escape_string($last_name);
		$username = $_POST['username'];
		//$username = stripslashes($username);
		//$username = mysql_real_escape_string($username);
		$password = $_POST['password'];
		//$password = stripslashes($password);
		//$password = mysql_real_escape_string($password);		
		//$password = $password.'***&$$$#!!!!$$$##$##$$#VNBMCNDJ~~~+_';
		$password = base64_encode($password);
		$handphone = $_POST['handphone'];
		//$handphone = stripslashes($handphone);
		//$handphone = mysql_real_escape_string($handphone);		
		//$registration_status = $_POST['registration_status'];
		$access_level = $_POST['access_level'];
		$department = $_POST['department'];
		//$leave_credit = $_POST['leave_credit'];
		
			$annual_leave_credit = $_POST['annual_leave_credit'];
			//$annual_leave_credit = stripslashes($annual_leave_credit);
			//$annual_leave_credit = mysql_real_escape_string($annual_leave_credit);
			$medical_leave_credit = $_POST['medical_leave_credit'];
			//$medical_leave_credit = stripslashes($medical_leave_credit);
			//$medical_leave_credit = mysql_real_escape_string($medical_leave_credit);
			$maternity_leave_credit = $_POST['maternity_leave_credit'];
			//$maternity_leave_credit = stripslashes($maternity_leave_credit);
			//$maternity_leave_credit = mysql_real_escape_string($maternity_leave_credit);
			$paternity_leave_credit = $_POST['paternity_leave_credit'];
			//$paternity_leave_credit = stripslashes($paternity_leave_credit);
			//$paternity_leave_credit = mysql_real_escape_string($paternity_leave_credit);
			$emergency_leave_credit = $_POST['emergency_leave_credit'];
			//$emergency_leave_credit = stripslashes($emergency_leave_credit);
			//$emergency_leave_credit = mysql_real_escape_string($emergency_leave_credit);
			$unpaid_leave_credit = $_POST['unpaid_leave_credit'];
			//$unpaid_leave_credit = stripslashes($unpaid_leave_credit);
			//$unpaid_leave_credit = mysql_real_escape_string($unpaid_leave_credit);
			$compassionate_leave_credit = $_POST['compassionate_leave_credit'];
			//$compassionate_leave_credit = stripslashes($compassionate_leave_credit);
			//$compassionate_leave_credit = mysql_real_escape_string($compassionate_leave_credit);
		
		
		$e_mail = $_POST['e_mail'];	
		//$e_mail = stripslashes($e_mail);
		//$e_mail = mysql_real_escape_string($e_mail);
		
	
	$sql = mysql_query("UPDATE `users` SET 
			`first_name` = '$first_name',
			`last_name` = '$last_name',
			`username` = '$username',
			`password` = '$password',
			`e_mail` = '$e_mail',
			`handphone` = '$handphone',
			`department` = '$department',
			`access_level` = '$access_level',
			`annual_leave_credit` = '$annual_leave_credit',
			`medical_leave_credit` = '$medical_leave_credit',
			`maternity_leave_credit` = '$maternity_leave_credit',
			`paternity_leave_credit` = '$paternity_leave_credit',
			`emergency_leave_credit` = '$emergency_leave_credit',
			`unpaid_leave_credit` = '$unpaid_leave_credit',
			`compassionate_leave_credit` = '$compassionate_leave_credit'
			WHERE `users`.`id` ='$key' or `username`='$key';") or die ("An error occurd. We are trying our best to fix this as soon as possible. Sorry for any inconvenience");	
	
		echo "<div class=icon_lists><img src=images/approved.png width=16 height=16 alt=good_to_go_icon /></div>";		
		echo "<div class=floataftericon_green>User successfuly updated<br><br></div>";
		echo "<div class=clearall></div>";
		echo "Records has been updated. Thank you so much.<br><br>";
				echo "<div class=clearall></div>";
	
	if ($checkme == 'true')
	{
	
	$update_user=mysql_query("UPDATE `users` SET `yearly_adjust` = '0' WHERE `users`.`id` ='$key'") or die ("An error occurd. We are trying our best to fix this as soon as possible. Sorry for any inconvenience");
	
	}
}

else 
{

echo "An Error has occurd, you might have left some fields empty. Please go back and correct the erros";

}

?>


</div>
</div><!--content ends here for center column-->


<div class="footer">E-Leave Application System. Copyright (C) 2016. Portal One Sdn Bhd</div>

</body>
</html>