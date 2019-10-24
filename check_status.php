<?php
session_start();
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
        <link rel="stylesheet" type="text/css" href="jquery-ui/jquery-ui-1.8.10.custom.css" />
		<script src="scripts/datecheck.js" type="text/javascript"></script>
		<script src="scripts/jquery.min.js" type="text/javascript"></script>
		<script src="scripts/jquery.textareaCounter.plugin.js" type="text/javascript"></script>
		<script src="scripts/textarea.js" type="text/javascript"></script>
        <script src="scripts/validate.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui.min.js" type="text/javascript"></script>
        <script src="jquery-ui/jquery-ui-1.8.10.custom.min.js" type="text/javascript"></script>

</head>

<body>

<?php
include 'base.php';
include 'functions.php';
include 'secureme.php';
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
<div class="page_title">Leaves History</div>

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




$username = $_SESSION['username'];



$result1=mysqli_query("SELECT * FROM `users` WHERE `username` = '$username'");
$row1 = mysqli_fetch_array($result1);

$applicants_id=$row1['id'];
$department=$row1['department'];
$result2=mysqli_query("SELECT * FROM `leave` WHERE `applicants_id` = '$applicants_id'");

$total_results=mysqli_num_rows($result2);
$results_per_page=10;
$number_of_pages=ceil($total_results/$results_per_page);
$start=0;

if ($total_results>0)
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
	WHERE `applicants_id` = '$applicants_id'
	ORDER BY `reference_no` DESC
	LIMIT $start,10
	") or die ("An error occurd. We are trying our best to fix this as soon as possible. Sorry for any inconvenience");
	
	if(mysqli_num_rows($result3)>0)
	{
echo "
	<div class=table_list>Reference no.</div>
	<div class=table_list>Starts</div>
	<div class=table_list>Ends</div>
	<div class=table_list>Type</div>
	<div class=table_list>Duration</div>
	<div class=table_list>Status</div>
	<div class=table_list>Attachements</div>
	";
	echo "<div style=clear:both;></div>";	
	while ($row = mysqli_fetch_array($result3))
	{
	echo "<div style=clear:both;></div>";	
	//$leave_ref = $row["reference_no"];
	$applicants_id=$row['applicants_id'];
	$applicant_name= $row["applicant_name"];
	$start_date = $row["start_date"];
	$end_date = $row["end_date"];
	$number_days = $row["no_of_days"];
	$type = $row["type"];
	$new_type=strtolower($type);
	$reference_no=$row["reference_no"];
	
	$reason=$row['reason'];
	$status=$row['application_status'];
	$pathtofile=$row['pathtofile'];
	
	$retrieve_user=mysqli_query("SELECT * FROM `users` WHERE `id` = '$applicants_id'");
	$user = mysqli_fetch_array($retrieve_user);
	
	$department=$user['department'];
	$leave_credit=$user["$new_type".'_'.'leave_credit'];


	
echo "
	<div class=table_results>$reference_no</div>
	<div class=table_results>$start_date</div>
	<div class=table_results>$end_date</div>
	<div class=table_results>$type</div>
	<div class=table_results>$number_days</div>
	<div class=table_results>$status</div>
	";
if ($pathtofile)
{
	echo "<div class=icon_lists><img src=images/attach.png width=16 height=16 alt=attach_icon /></div>";
	echo "<div class=links_float_left><a href=$pathtofile>View file</a></div>";	
	echo "<div class=clearall></div>";
}

else
{

	echo "<div class=icon_lists><img src=images/none.png width=16 height=16 alt=none_icon /></div>";
	echo "<div class=bold_black_table_list>NA</div>";	
	echo "<div class=clearall></div>";


}
}	
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
			echo "<a href=check_status.php?page=$i>
			Previous</a>";
			echo "</div>";
			echo "<div class=dots-paginate>..</div>";
		
		
		
		
		}
	
		if ($current_page==1 and $number_of_pages > $range)
		{
			for ($i=1; $i<=$range; $i++)
			{
			echo "<div class=number-paginate>";
			echo "<a href=check_status.php?page=$i>
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
			echo "<a href=check_status.php?page=$i>
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
			echo "<a href=check_status.php?page=$i>
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
			echo "<a href=check_status.php?page=$i>
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
			echo "<a href=check_status.php?page=$i>
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
			echo "<a href=check_status.php?page=$i>
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
			echo "<a href=check_status.php?page=$i>
			Next</a>";
			echo "</div>";
		
		
		
		
		}
		
		if ($current_page<$number_of_pages)
		{
		
		
			echo "<div class=previous-next-paginate>";
			$i=$number_of_pages;
			echo "<a href=check_status.php?page=$i>
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
	
else {echo "No records found!";}	
	

	



?>    

   </div>
</div><!--content ends here for center column-->


<div class="footer">E-Leave Application System. Copyright (C) 2016. Portal One Sdn Bhd</div>

</body>
</html>