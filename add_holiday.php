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
 
       <script> 
	   var counter=0;
	   
	   function function1()
	   {
		   
		counter++; 
		var date='date'+counter;
		var des='des'+counter;
	   $('#holidays').append($('<input class="bg_cal_form_field" type="text" readonly="readonly" />').attr('id', date).attr('name', date).datepicker(
			{
			changeMonth: true,	
			minDate: new Date(),
			showOn: 'both'
			//showOn: 'both',
			//altField: '#date1',
			//altField: '#date2',
			

																									   
																									  } ));
	   $('#holidays').append($('<input class="des_form_field" type="text" />').attr('id', des).attr('name', des));
	   

// Create and then set any other attributes
	  document.getElementById("here").value = counter+1;

	   }
	      function function2()
	   {	
	   	if (counter!=0)
		{
	   		counternow=counter;
		   $("#date"+counternow).remove();
		   $("#des"+counternow).remove();
		   document.getElementById("here").value = counter;
		   counter--;
		}
		 
		 }
	   
	   
       </script>
		<script>
	 $(document).ready(function() {
			 $( "#date0" ).datepicker({ altFormat: 'yy-mm-dd' , minDate: new Date(), changeMonth: true});
								});
         </script>
        
   		
</head>

<body>
<?php

if($_SESSION["access_level"] < 2  )
{
echo "<h2>You have no permission to access this page</h2>";
exit;
}


include 'base.php';
include 'secureme.php';
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
    <div id="right_date"> <?php echo date("D j-m-Y"); ?> </div>
</div>  </div>

<!--Content for center column-->
<div class="page_title">Add Public Holidays</div>

<div class="content_wrapping_small">
    
<p class="only_bold">
Click on the date field or the calendar icon to add holidays to the system. Add the holiday title in the occasion / event field. If you wish to add more fields, just click on "Add field". Click "Done" when you have finished adding holidays.
</p>

<p class="red_bold">
Only add field when you need them. Empty fields will return an error.
</p>


<form  method="post" action="add_holiday2.php" id="holidays_form">
<div class="date_holiday_header">Date:</div>
<div class="date_holiday_header">Occasion / Event:</div>
<div class="clearall"></div>
<input class="bg_cal_form_field" type="text"  id="date0" name="date0" readonly="readonly"/><input class="des_form_field" type="text"  id="des0" name="des0"/>
<div id="holidays">
</div>

<div>
<input class="form_button_style" type="submit" value="Done" id="submit" name="submit" />
<input class="form_button_style" type="button" value="Add field" onclick="function1();" />
<input class="form_button_style" type="button" value="Remove field" onclick="function2();" />

</div>



<input type="hidden" id="here" name="here"  value="1"/>

</form>

   </div>
</div><!--content ends here for center column-->


<div class="footer">E-Leave Application System. Copyright (C) 2016. Portal One Sdn Bhd</div>

</body>
</html>