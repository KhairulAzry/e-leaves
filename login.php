<?php

include 'base.php';
include 'secureme.php';
include 'functions.php';


session_start();
if(isset($_SESSION['username']))
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
    $("#loginform").validate({
					errorElement: "div"									 });
  });
  </script>
<title>E-Leave Application System</title>
</head>
<body>

<a class="no_style" href="index.php"><div class="header">&nbsp;</div></a>
<div class="spacer">&nbsp;</div>
<div class="login_box">
  <?php
include 'login_form.php';
?>
  <div class="not_reg">Not registerd? <a href="register.php"> Register here</a></div>


</div>
<div class="spacer">&nbsp;</div>
<div class="footer">E-Leave Application System. Copyright (C) 2016. Portal One Sdn Bhd</div>
</body>
</html>
