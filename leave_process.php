<?php


session_start();

header ( "Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0");
header ("Pragma: no-cache");

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
<title>E-Leave Application System</title>
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
  $sender_email=$r['e_mail'];
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
<div class="page_title">New Leave Application</div>

<div class="content_wrapping_small">

<?php
$file_temp_name=$_FILES['doc']['tmp_name'];
		$file_temp_name = stripslashes($file_temp_name);
		$file_temp_name = mysql_real_escape_string($file_temp_name);

//part for uploaded file
if(!empty($file_temp_name))
{

	if ($_FILES['doc']['name'])
	{

   // Configuration - Your Options
      $allowed_filetypes = array('.jpg','.gif','.bmp','.png','.doc','.docx','.txt','.pdf', '.zip','.rar','.JPG','.GIF','.BMP','.PNG','.DOC','.DOCX','.TXT','.PDF','.ZIP', '.RAR', '.jpeg','.JPEG', '.ODF', '.odf'); // These will be the types of file that will pass the validation.
      $max_filesize = 2100000; // Maximum filesize in BYTES (currently 2.0MB).
      $upload_path = 'uploads/'; // The place the files will be uploaded to (currently a 'files' directory).
 
   $filename = $_FILES['doc']['name']; // Get the name of the file (including file extension).
   		$filename = stripslashes($filename);
		$filename = mysql_real_escape_string($filename);
   $ext = substr($filename, strpos($filename,'.'), strlen($filename)-1); // Get the extension from the filename.
 
   // Check if the filetype is allowed, if not DIE and inform the user.
   if(!in_array($ext,$allowed_filetypes)){
   				echo "<div class=icon_lists><img src=images/warning.png width=16 height=16 alt=warning_icon /></div>";
				echo "<div class=floataftericon_red>";
				echo "The file you attempted to upload is not allowed<br><br></div>";
				echo "<div class=clearall></div>";
				echo "It looks like the file you tried to upload has a non-supported file format. Please go back and try again.<br><br>";
				echo "<div class=clearall></div>";
	
				echo "
				</div>
				<div class=spacer>&nbsp;</div>
				<div class=footer>E-Leave Application System. Copyright (C) 2016. Portal One Sdn Bhd</div>";
				exit;
				}
 
   // Now check the filesize, if it is too large then DIE and inform the user.
   if(filesize($_FILES['doc']['tmp_name']) > $max_filesize){
       			echo "<div class=icon_lists><img src=images/warning.png width=16 height=16 alt=warning_icon /></div>";
				echo "<div class=floataftericon_red>";
				echo "The file you attempted to upload is too large<br><br></div>";
				echo "<div class=clearall></div>";
				echo "It looks like the file you attempted to upload is too large. Maximum file size is 2MB. Please go back and try again.<br><br>";
				echo "<div class=clearall></div>";
			
				echo "
				</div>
				<div class=spacer>&nbsp;</div>
				<div class=footer>E-Leave Application System. Copyright (C) 2016. Portal One Sdn Bhd</div>";
				exit;
				}
 
   // Check if we can upload to the specified path, if not DIE and inform the user.
   if(!is_writable($upload_path)){
	        	echo "<div class=icon_lists><img src=images/warning.png width=16 height=16 alt=warning_icon /></div>";
				echo "<div class=floataftericon_red>";
				echo "An error has occurd<br><br></div>";
				echo "<div class=clearall></div>";
				echo "It looks like an error has occurd. Please go back and try again. If the error persists, please contact the admin staff<br><br>";
				echo "<div class=clearall></div>";
			
				echo "
				</div>
				<div class=spacer>&nbsp;</div>
				<div class=footer>E-Leave Application System. Copyright (C) 2016. Portal One Sdn Bhd</div>";
				exit;
				} 
 
   // Upload the file to your specified path.
   
   //change name of file uploaded
   
   $filename=md5(uniqid(mt_rand(),TRUE));;
   $filename="$filename".$ext;
   
   $pathtofile=$upload_path . $filename;
 
   //echo "<a href='$pathtofile'>check it here</a>";
   
   if(move_uploaded_file($_FILES['doc']['tmp_name'],$upload_path . $filename))
    {     
	
/*
			//echo "<BR>";
		echo "<div class=icon_lists><img src=images/approved.png width=16 height=16 alt=good_to_go_icon /></div>";		
		echo "<div class=floataftericon_green>File(s) uploaded</div>";
		echo "<div class=clearall></div>";
		*/
			
	}



	}	 
	else
         {
	        	echo "<div class=icon_lists><img src=images/warning.png width=16 height=16 alt=warning_icon /></div>";
				echo "<div class=floataftericon_red>";
				echo "An error has occurd<br><br></div>";
				echo "<div class=clearall></div>";
		 exit;
		 }	 
	
      
 
}


// end of uploaded file	



//end of file upload







if	(
		$_POST['leave_type'] and
		$_POST['date1'] and
		$_POST['date2'] and
		$_POST['reason']
		
	) 
	{
		$date1=$_POST['date1'];
		$date2=$_POST['date2'];
		$date1=date('Y-m-d', strtotime($date1));
		$date2=date('Y-m-d', strtotime($date2));

		$start_date=$date1;
		$end_date=$date2;
		$type=$_POST['leave_type'];
		$applicant_name =$_SESSION['first_name'] . ' ' . $_SESSION['last_name'] ;
		$applicants_id = $_SESSION['applicants_id'];
		//$applicant_email=$_SESSION['applicant_email'];
		$application_status=$_POST['application_status'];
		$number_days=countdays($_POST['date1'],$_POST['date2']);
		$reason = $_POST['reason'];
		//$reason = stripslashes($reason);
		//$reason = mysql_real_escape_string($reason);
		
		$get_user=mysql_query("SELECT * FROM `users` WHERE `id`='$applicants_id'") or die ("An error occurd. We are trying our best to fix this as soon as possible. Sorry for any inconvenience");
		$get_user_info=mysql_fetch_array($get_user);
		
		$department=$get_user_info['department'];
		$delivery_email=$get_user_info['e_mail'];
		
		$check_leaves=mysql_query("SELECT * FROM `leave` WHERE `applicants_id` = '$applicants_id' AND `start_date` = '$start_date'") or die ("An error occurd. We are trying our best to fix this as soon as possible. Sorry for any inconvenience");;
		
		
		if (mysql_num_rows($check_leaves) > 0)
		{
		$get_number=mysql_fetch_array($check_leaves);
		$ref=$get_number['reference_no'];
		echo "<div class=icon_lists><img src=images/warning.png width=16 height=16 alt=warning_icon /></div>";
		echo "<div class=floataftericon_red>";
		echo "An error has occurd<br></div>";
		echo "<div class=clearall></div>";
		echo "<div class=clearall></div>";
		echo "<p>There exists a leave application in your records that has the same start date selected in your new leave application. The Reference Number for that leave is <span class=underlined_text><span class=only_bold>$ref.</span></span> ";
		echo "If you would like to apply for a different leave on the same date, please cancel this leave first.</p>";
		echo "<div class=clearall></div>";
		echo "</div></div>";
		echo "<div class=footer>E-Leave Application System. Copyright (C) 2016. Portal One Sdn Bhd</div>
			</body>
			</html>";
		
		exit;
		}
		
		
		
		$sql="INSERT INTO `leave` 
		
		(
		start_date,
		end_date,
		applicant_name,
		applicants_id,
		application_status,
		type,
		no_of_days,
		reason,
		pathtofile,
		applicant_department
		)
		VALUES
		(
		'$start_date',
		'$end_date',
		'$applicant_name',
		'$applicants_id',
		'$application_status',
		'$type',
		'$number_days',
		'$reason',
		'$pathtofile',
		'$department')";
		
	
	
			if (!mysql_query($sql,$con))
			{
				die('Error: ' . mysql_error());
			}
		
			else 
			{
		$latest_ref=mysql_query("SELECT * FROM `leave` 
								WHERE `applicants_id` = '$applicants_id' 
								ORDER BY `reference_no` DESC LIMIT 0, 1 ");
		$get_ref=mysql_fetch_array($latest_ref);
		$ref_num=$get_ref['reference_no'];
		
		$get_manager=mysql_query("SELECT * FROM `users` WHERE `department` = '$department' AND `access_level` = 'manager'");
		$data=mysql_fetch_array($get_manager);
		$manager_email=$data['e_mail'];
		
		
			$message="There is a new leave application in your department. The details are as follows:<br><br>
			Leave Reference Number: $ref_num<br>
			Start Date: $start_date<br>
			End Date: $end_date<br>
			Duration: $number_days day(s)<br>
			Type: $type<br>
			Reason: $reason<br><br>
			Please Login to your account to either approve or reject this application.
			";
	
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= "From: admin@eleaves.org\r\n";

    @mail($manager_email,"New Leave Application $ref_num",$message,$headers);
		
		
		
		echo "<div class=icon_lists><img src=images/approved.png width=16 height=16 alt=good_to_go_icon /></div>";		
		echo "<div class=floataftericon_green>Application was successful</div>";
		echo "<div class=clearall></div>";
		echo "<div class=icon_lists><img src=images/approved.png width=16 height=16 alt=good_to_go_icon /></div>";		
		echo "<div class=floataftericon_green>Leave Reference Number: $ref_num</div>";
		echo "<div class=clearall></div>";
		echo "<div class=lists><br><br>Thank you. Your application will be reviewed by the management. You will receive an E-mail notification regarding the status of your application when an action is taken by the management. You can also check the status of your application here using your leave reference number.<br><br></div>";
		echo "<div class=clearall></div>";
		
			
			
			
			}
	

		
		
	
	
	
	}

else
{
        	echo "<div class=icon_lists><img src=images/warning.png width=16 height=16 alt=warning_icon /></div>";
				echo "<div class=floataftericon_red>";
				echo "An error has occurd<br><br></div>";
						echo "<div class=clearall></div>";
				echo "Please go back and complete all fields.";
				echo "<div class=clearall></div>";
			
				}	

?>

</div>
</div><!--content ends here for center column-->


<div class="footer">E-Leave Application System. Copyright (C) 2016. Portal One Sdn Bhd</div>

</body>
</html>