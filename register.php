<?php

include 'base.php';
include 'secureme.php';
include 'functions.php';


session_start();
if($_SESSION['username'])
{
header("location:index.php");
exit;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="css/stylesheet.css" />
		<script src="scripts/jquery.min.js" type="text/javascript"></script>
		<script src="scripts/jquery.textareaCounter.plugin.js" type="text/javascript"></script>
		<script src="scripts/textarea.js" type="text/javascript"></script>
        <script src="scripts/jquery.validate.js" type="text/javascript"></script>
          <script>
  $(document).ready(function(){
    $("#registration_form").validate({
					errorElement: "div"									 });
  });
  </script>

<title>E-Leave Application System</title>
</head>
<body>


<a class="no_style" href="index.php"><div class="header">&nbsp;</div></a>
<div class="spacer">&nbsp;</div>
<div class="register_box">
  	<form action="register2.php" method="post" name="register_form" id="registration_form">
			
					
						<div class="form_label_float">First Name:</div>
						<div class="form_field_float"><input class="required" name="first_name" type="text" id="first_name" /></div>
					
                    <div class="clearall"></div>
                    
						<div class="form_label_float">Last Name:</div>
						<div class="form_field_float"><input class="required" name="last_name" type="text" id="last_name" /></div>
					
                    <div class="clearall"></div>
                    
                    	<div class="form_label_float">Username:</div>
						<div class="form_field_float"><input class="required" name="username" type="text" id="username" /></div>
					
                    <div class="clearall"></div>
                    
                    	<div class="form_label_float">Password:</div>
						<div class="form_field_float"><input class="required" name="password" type="password" id="password" /></div>
					
                    <div class="clearall"></div>
                    
                    	<div class="form_label_float">Email:</div>
						<div class="form_field_float"><input class="required email" name="e_mail" type="text" id="e_mail" /></div>
					
                    <div class="clearall"></div>
                    
                    	<div class="form_label_float">Handphone:</div>
						<div class="form_field_float"><input class="required digits" name="handphone" type="text" id="handphone" /></div>
					
                    <div class="clearall"></div>
                    
                    	<div class="form_label_float">Department:</div>
						<div class="form_field_float">
						<select name="department">
						<option>Management</option>
						<option>Marketing</option>
						<option>HR</option>
						<option>Production</option>
						<option>ELV</option>
						<option>Sales</option>
						<option>Accounting</option>
						<option>Trainee</option>
						<!-- add or delete here for more departments-->
						</select>
						</div>
					
                    <div class="clearall"></div>
                    
					<input type="hidden" name="registration_status" value="0" />
					<input type="hidden" name="access_level" value="user" />
					
                    
                    <div class="button_center"><input class="form_button_style" type="submit" name="submit" value="Register" /><input class="form_button_style2" type="reset" name="Reset" value="Reset" /></div>
													
					
					<!--<div>
						<td align="center" colspan="2"><a href="register.php">Register</a> | <a href="forgot.php">Forgot Pass</a></div>
					</div>-->
			
		</form>
        



</div>
<div class="spacer">&nbsp;</div>
<div class="footer">E-Leave Application System. Copyright (C) 2016. www.portalone.com.my</div>
</body>
</html>