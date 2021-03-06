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
<div class="page_title">New leaves applications</div>

<div class="content_wrapping_small">


<?php



if (empty($_REQUEST['page']))
{
$current_page=1;
}
else
{
$current_page=$_REQUEST['page'];
}




$result2=mysqli_query("SELECT * FROM `leave` WHERE `application_status` = 'pending' AND `applicant_department` = '$manager_dept'") or die ("An error occurd. We are trying our best to fix this as soon as possible. Sorry for any inconvenience");

$total_results=mysqli_num_rows($result2);
$results_per_page=10;
$number_of_pages=ceil($total_results/$results_per_page);
$start=0;




if(mysqli_num_rows($result2)>0)
{


	if (!$current_page)
	{
	$start=0;
	$new_start=10;
	}
	else
	{
	$new_start=$current_page*10;
	$start=$new_start-10;
	//$new_start=$current_page*5;
	$new_start=(int)$new_start;
	$start=(int)$start;
	}
}	
	

	$result3=mysqli_query("SELECT * 
	FROM `leave` 
	WHERE `application_status` = 'pending'
	AND `applicant_department` = '$manager_dept'
	ORDER BY `reference_no` DESC
	LIMIT $start,10
	") or die ("An error occurd. We are trying our best to fix this as soon as possible. Sorry for any inconvenience");	

	if(mysqli_num_rows($result3)>0)
	{
	
	echo "<p class=only_bold>The Following leaves are waiting for action:</p>";
	echo "
	
	<div class=table_list_check_leaves_id>Applicant</div>
	<div class=table_list_check_leaves>Starts</div>
	<div class=table_list_check_leaves_credit>Duration</div>
	<div class=table_list_check_leaves>Department</div>
	<div class=table_list_check_leaves_credit>Credit</div>
	<div class=table_list_check_leaves_act>Action</div>
	";
		
	while ($r = mysqli_fetch_array($result3))
	{	



	
	$applicants_id=$r['applicants_id'];
	$applicant_name= $r["applicant_name"];
	$leave_ref = $r["reference_no"];
	$start_date = $r["start_date"];
	$end_date = $r["end_date"];
	$type = $r["type"];
	$new_type=strtolower($type);
	//$leave_type=$new_type.'';
	$number_days = $r["no_of_days"];
	
	
	$retrieve_user=mysqli_query("SELECT * FROM `users` WHERE `id` = '$applicants_id'") or die ("An error occurd. We are trying our best to fix this as soon as possible. Sorry for any inconvenience");
	$user = mysqli_fetch_array($retrieve_user);
	
	$department=$user['department'];
	$leave_credit=$user["$new_type".'_'.'leave_credit'];
	
	$_SESSION['leave_credit']=$leave_credit;
	echo "<div class=clearall></div>";

	echo "
	<div class=table_results_check_leaves_id>$applicant_name</div>
	<div class=table_results_check_leaves>$start_date</div>
	<div class=table_results_check_leaves_credit>$number_days day(s)</div>
	<div class=table_results_check_leaves>$department</div>
	<div class=table_results_check_leaves_credit>$leave_credit day(s)</div>
	<div class=icon_lists><img src=images/approved.png width=16 height=16 alt=approve_icon /></div>
	<div class=links_float_left><a href=approve_leave.php?leave_ref=$leave_ref&leave_credit=$leave_credit&applicants_id=$applicants_id&leave_type=$type&number_days=$number_days>Approve</a></div>
	<div class=small_vertical_space></div>
	<div class=icon_lists><img src=images/rejected.png width=16 height=16 alt=delete_icon /></div>
	<div class=links_float_left><a href=reject_leave.php?leave_ref=$leave_ref>Reject</a></div>
	<div class=small_vertical_space></div>
	<div class=icon_lists><img src=images/view.png width=16 height=16 alt=view_icon /></div>
	<div class=links_float_left><a href=view_leave_details.php?leave_ref=$leave_ref&leave_credit=$leave_credit&department=$department>Details</a></div>
	";

	} // end while


}

echo "<div style=clear:both;></div>";
echo "<div class=paginate>";
if ($number_of_pages > 0)
{
		$range=3;
	
		if ($current_page>1)
		{
		
		
			
			$i=$current_page-1;
			echo "<div class=previous-next-paginate>";
			echo "<a href=check_leaves_applications_manager.php?page=$i>
			Previous</a>";
			echo "</div>";
			echo "<div class=dots-paginate>..</div>";
		
		
		
		
		}
	
		if ($current_page==1 and $number_of_pages > $range)
		{
			for ($i=1; $i<=$range; $i++)
			{
			echo "<div class=number-paginate>";
			echo "<a href=check_leaves_applications_manager.php?page=$i>
			$i</a>";
			echo "</div>";
			//echo " ";
			}
			//echo "..";
	
		}
	
		if ($current_page==1 and $number_of_pages <= $range)
		{
			if ($number_of_pages==1)
			{
			echo "";
			}
			else
			{
			for ($i=1; $i<=$number_of_pages; $i++)
			{
			echo "<div class=number-paginate>";
			echo "<a href=check_leaves_applications_manager.php?page=$i>
			$i</a>";
			echo "</div>";
			//echo " ";
			}
			}
			//echo "..";
		}
	
		if ($current_page > 1 and $number_of_pages <= $range)
		{
			for ($i=1; $i<=$number_of_pages; $i++)
			{
			echo "<div class=number-paginate>";
			echo "<a href=check_leaves_applications_manager.php?page=$i>
			$i</a>";
			echo "</div>";
			//echo " ";
			}
			//echo "..";
		}	
		
		//$new_range=

		if ($current_page-2 >= 1 and $current_page+2<=$number_of_pages)
		{
			for ($i=$current_page-2; $i<=$current_page+2; $i++)
			{
			echo "<div class=number-paginate>";
			echo "<a href=check_leaves_applications_manager.php?page=$i>
			$i</a>";
			echo "</div>";
			//echo " ";
			}
		}
		
		if ($current_page-2 == 0 and $current_page+2<=$number_of_pages)
		{
			for ($i=1; $i<=$current_page+2; $i++)
			{
			echo "<div class=number-paginate>";
			echo "<a href=check_leaves_applications_manager.php?page=$i>
			$i</a>";
			echo "</div>";
			//echo " ";
			}
		}

		if ($current_page+2>$number_of_pages and $number_of_pages>$range)
		{
			for ($i=$current_page-2; $i<=$number_of_pages; $i++)
			{
			echo "<div class=number-paginate>";
			echo "<a href=check_leaves_applications_manager.php?page=$i>
			$i</a>";
			echo "</div>";
			//echo " ";
			}
		}		

	if ($current_page+2 < $number_of_pages and $number_of_pages > $range)
		{
		
		
			echo "<div class=dots-paginate>..</div>";
			$i=$current_page+1;
			echo "<div class=previous-next-paginate>";
			echo "<a href=check_leaves_applications_manager.php?page=$i>
			Next</a>";
			echo "</div>";
		
		
		
		
		}
		
		if ($current_page<$number_of_pages)
		{
		
		
			echo "<div class=previous-next-paginate>";
			$i=$number_of_pages;
			echo "<a href=check_leaves_applications_manager.php?page=$i>
			Last</a>";
			echo "</div>";
		
		
		
		
		}
	
		echo "<div style=clear:both;>&nbsp;</div>";
		echo "<div style=float:left;>Page</div>";
		echo "<div class=pageof-paginate>";
		echo $current_page." "."|"." ".$number_of_pages;
		echo "</div>";
	//}
	echo "</div>";

}
	
else 
{
	echo "<div class=icon_lists><img src=images/warning.png width=16 height=16 alt=warning_icon /></div>";
	echo "<div class=floataftericon_red>";
	echo "No records found<br><br></div>";
	echo "<div class=clearall></div>";
	echo "There are no new applications at the time being.<br><br>";
	echo "<div class=clearall></div>";
}	
	

	



?>    





   </div>
</div><!--content ends here for center column-->


<div class="footer">E-Leave Application System. Copyright (C) 2016. Portal One Sdn Bhd</div>

</body>
</html>