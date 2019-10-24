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
  <script>
	$(function() {
		var dates = $( "#date_start, #date_end" ).datepicker({
			altFormat: 'yy-mm-dd',
			defaultDate: new Date(),
			changeMonth: true,
			//minDate: new Date(),
			//showOn: 'both',
			//altField: '#date1',
			//altField: '#date2',
			//showOn: 'button',
			//buttonText: 'Click to show the calendar',
			//buttonImageOnly: true, 
			//buttonImage: 'images/cal2.png',
			onSelect: function( selectedDate ) {
				var option = this.id == "date_start" ? "minDate" : "maxDate",
					instance = $( this ).data( "datepicker" ),
					date = $.datepicker.parseDate(
						instance.settings.dateFormat ||
						$.datepicker._defaults.dateFormat,
						selectedDate, instance.settings );
				dates.not( this ).datepicker( "option", option, date);
			}
			
			
		});
		$( "#date_start" ).datepicker( "option", "altField", '#date1' );
		$( "#date_end" ).datepicker( "option", "altField", '#date2' );
	});
	</script>
	
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
<div class="page_title">View leaves by department</div>

<div class="content_wrapping_small">


<form name="leave_dept" action="leave_dept.php" method="post">
<p class="only_bold">Choose the department and the date range that you wish to check.</p>
      <div class="small_spacer"></div>

    <div class="form_label_float">Department:</div>
   <div class="form_field_float">
   <select name="leave_dept">
						<option selected="selected" value="<?php echo $manager_dept;?>"><?php echo $manager_dept;?></option>

        <!-- add or delete here for more departments-->
      </select>
      </div>
      <div class="clearall"></div>
 
       <div class="only_bold">Leave Period:
             <div class="small_spacer"></div>
      <div class="red_text">Selected dates will turn orange. Today's date is always highlighted and is selected by default.</div></div>
	 
      <div class="small_spacer"></div>
    
    <DIV class="clearall"></DIV>

<div class="fromto_leave_apply">From:</div>
<div class="cal_leave_apply" id="date_start"></div>

<input type="hidden" id="date1" name="date1"  />

<div class="fromto_leave_apply">To:</div>
<div class="cal_leave_apply" id="date_end"></div>
<input type="hidden" id="date2" name="date2"  />
      <div class="small_spacer"></div>

<div class="clearall"></div>

<div class="view_leaves_button"><input class="form_button_style" type="submit" name="View Leaves" id="View Leaves" value="View Leaves" /></div>
   
</form>

<div class="clearall"></div>
</div>
</div><!--content ends here for center column-->


<div class="footer">E-Leave Application System. Copyright (C) 2016. Portal One Sdn Bhd</div>

</body>
</html>