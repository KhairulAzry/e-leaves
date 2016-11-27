<?php
session_start();

header ( "Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0");
header ("Pragma: no-cache");
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
<div class="page_title">View leaves by department</div>

<div class="content_wrapping_small">


<?php

if($_SESSION["access_level"] < 2  )
{
header("location:index.php");
exit;
}


if (!$_POST['leave_dept'] and  !$date1=$_POST['date1'] and !$date2=$_POST['date2'] )
{
$leave_dept=$_REQUEST['department'];
$date1=$_REQUEST['date1'];
$date2=$_REQUEST['date2'];
}
else
{
$leave_dept=$_POST['leave_dept'];

$date1=$_POST['date1'];
$date2=$_POST['date2'];
}

if (empty($_REQUEST['page']))
{
$current_page=1;
}
else
{
$current_page=$_REQUEST['page'];
}



	
	$check_leaves=mysql_query("SELECT * FROM `leave` WHERE `start_date` >= '$date1' and `start_date` <= '$date2' and `end_date` <= '$date2' and `applicant_department` = '$leave_dept'") or die ("An error occurd. We are trying our best to fix this as soon as possible. Sorry for any inconvenience");
	
	$count2 = 0;
	
	if(mysql_num_rows($check_leaves)>0)
	{
	
	if ($manager_dept == $leave_dept OR $access_level == 'admin')
		{
	
	
	while ($check_leaves_count = mysql_fetch_array($check_leaves))
		{
		
		$count2++;
		
		}
	
		}
	else
		{
		echo "<div class=icon_lists><img src=images/warning.png width=16 height=16 alt=warning_icon /></div>";		
echo "<div class=floataftericon_red>An error has occurd</div>";
echo "<div class=clearall></div>";
echo "<p>An error has occurd. It looks like you have no permission to access leaves records in this department. If you think this is an error, please contact the adminstration staff.</p>";
		}
	
	}
	
	


//echo $count1;
//echo $count2;




if ($count2>0)
{

echo "<div class=clearall></div>";
echo "<p class=only_bold>Leaves From <span class=underlined_text>$leave_dept</span> Department from <span class=underlined_text>$date1</span> to <span class=underlined_text>$date2</span></p>";

echo "<div class=clearall></div>";


echo "
	<div class=table_list_check_leaves_id>Applicant</div>
	<div class=table_list>Starts</div>
	<div class=table_list>Ends</div>
	<div class=table_list_check_leaves_credit>Duration</div>
	<div class=table_list>Type</div>
	<div class=table_list>Status</div>
	<div class=table_list>Action</div>
	";

echo "<div class=clearall></div>";
		



$get_leaves=mysql_query("SELECT * FROM `leave` WHERE `start_date` between '$date1' and '$date2' and `applicant_department` = '$leave_dept'") or die ("An error occurd. We are trying our best to fix this as soon as possible. Sorry for any inconvenience");

$total_results=mysql_num_rows($get_leaves);
$results_per_page=10;
$number_of_pages=ceil($total_results/$results_per_page);
$start=0;

//echo $total_results;



if(mysql_num_rows($get_leaves)>0)
{
		
	//$limit=5;
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
	
	//echo $new_start;
	//echo $start;
}
	
	
	
	$result2=mysql_query("SELECT * 
	FROM `leave` 
	WHERE `start_date` between '$date1' and '$date2'
	AND `applicant_department` = '$leave_dept'
	ORDER BY `reference_no` DESC
	LIMIT $start,10
	") or die ("An error occurd. We are trying our best to fix this as soon as possible. Sorry for any inconvenience");
	
	if(mysql_num_rows($result2)>0)
	{
	

		
		
	while ($q = mysql_fetch_array($result2))
		{
	$applicant_name= $q["applicant_name"];
	$leave_ref = $q["reference_no"];
	$start_date = $q["start_date"];
	$end_date = $q["end_date"];
	$type = $q["type"];
	$new_type=strtolower($type);
	//$leave_type=$new_type.'';
	$number_days = $q["no_of_days"];
	$status=$q['application_status'];
	$applicants_id=$q['applicants_id'];
	
	
	
	$for_days=mysql_query("SELECT * FROM `users` WHERE `id` = '$applicants_id'") or die ("An error occurd. We are trying our best to fix this as soon as possible. Sorry for any inconvenience");
	$days = mysql_fetch_array($for_days);
	
	$leave_credit=$days["$new_type".'_'.'leave_credit'];
	
	
	echo "<div class=clearall></div>";

	echo "
	<div class=table_results_check_leaves_id>$applicant_name</div>
	<div class=table_results>$start_date</div>
	<div class=table_results>$end_date</div>
	<div class=table_results_check_leaves_credit>$number_days day(s)</div>
	<div class=table_results>$type</div>
	<div class=table_results>$status</div>
	<div class=icon_lists><img src=images/view.png width=16 height=16 alt=view_icon /></div>
	<div class=links_float_left><a href=view_leave_details.php?leave_ref=$leave_ref&leave_credit=$leave_credit&department=$leave_dept>View Details</a></div>
	
	";
	echo "<div class=clearall></div>";
	} //end while
	
	
	}//end if
	

echo "<div class=clearall></div>";
echo "<div class=paginate>";

	
	
	//put the code for pagination here.. please work this time :)
if ($number_of_pages > 0)
{
		$range=3;
	
		if ($current_page>1)
		{
		
		
			
			$i=$current_page-1;
			echo "<div class=previous-next-paginate>";
			echo "<a href=leave_dept.php?page=$i&department="; echo urlencode("$leave_dept"); echo "&date1=$date1&date2=$date2>
			Previous</a>";
			echo "</div>";
			echo "<div class=dots-paginate>..</div>";
		
		
		
		
		}
	
		if ($current_page==1 and $number_of_pages > $range)
		{
			for ($i=1; $i<=$range; $i++)
			{
			echo "<div class=number-paginate>";
			echo "<a href=leave_dept.php?page=$i&department="; echo urlencode("$leave_dept"); echo "&date1=$date1&date2=$date2>
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
			echo "<a href=leave_dept.php?page=$i&department="; echo urlencode("$leave_dept"); echo "&date1=$date1&date2=$date2>
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
			echo "<a href=leave_dept.php?page=$i&department="; echo urlencode("$leave_dept"); echo "&date1=$date1&date2=$date2>
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
			echo "<a href=leave_dept.php?page=$i&department="; echo urlencode("$leave_dept"); echo "&date1=$date1&date2=$date2>
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
			echo "<a href=leave_dept.php?page=$i&department="; echo urlencode("$leave_dept"); echo "&date1=$date1&date2=$date2>
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
			echo "<a href=leave_dept.php?page=$i&department="; echo urlencode("$leave_dept"); echo "&date1=$date1&date2=$date2>
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
			echo "<a href=leave_dept.php?page=$i&department="; echo urlencode("$leave_dept"); echo "&date1=$date1&date2=$date2>
			Next</a>";
			echo "</div>";
		
		
		
		
		}
		
		if ($current_page<$number_of_pages)
		{
		
		
			echo "<div class=previous-next-paginate>";
			$i=$number_of_pages;
			echo "<a href=leave_dept.php?page=$i&department="; echo urlencode("$leave_dept"); echo "&date1=$date1&date2=$date2>
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
}
	
//end if





if ($count2==0)
{
if ($manager_dept == $leave_dept OR $access_level == 'admin')
		{
	
	
	echo "<div class=clearall></div>";
	echo "<div class=icon_lists><img src=images/warning.png width=16 height=16 alt=warning_icon /></div>";
	echo "<div class=floataftericon_red>";
	echo "No records found<br><br></div>";
	echo "<div class=clearall></div>";
	echo "No records found for the selected department over the selected period.<br><br>";
	echo "<div class=clearall></div>";
		}
else
		{
		
		echo "<div class=icon_lists><img src=images/warning.png width=16 height=16 alt=warning_icon /></div>";		
echo "<div class=floataftericon_red>An error has occurd</div>";
echo "<div class=clearall></div>";
echo "<p>An error has occurd. It looks like you have no permission to access leaves in this department. If you think this is an error, please contact the adminstration staff.</p>";
		
		}
}





?>



</div>
</div><!--content ends here for center column-->


<div class="footer">E-Leave Application System. Copyright (C) 2016. Portal One Sdn Bhd</div>

</body>
</html>