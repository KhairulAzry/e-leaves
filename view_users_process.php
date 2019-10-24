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
<div class="page_title">View users by department</div>

<div class="content_wrapping_small">


<?php



if (empty($_REQUEST['page']))
{
$current_page=1;
$department=$_POST["users_dept"];
}
else
{
$current_page=$_REQUEST['page'];
$department=$_REQUEST["users_dept"];

}



if ($department == "All departments")
{

if ($access_level == 'admin')
{

$result2=mysqli_query("SELECT * FROM `users`") or die ("An error occurd. We are trying our best to fix this as soon as possible. Sorry for any inconvenience");
}
else
{
echo "<div class=icon_lists><img src=images/warning.png width=16 height=16 alt=warning_icon /></div>";		
echo "<div class=floataftericon_red>An error has occurd</div>";
echo "<div class=clearall></div>";
echo "<p>An error has occurd. It looks like you have no permission to view records of the department you have selected. If you think this is an error, please contact the adminstration staff.</p>";
}
}

else
{

$result2=mysqli_query("SELECT * FROM `users` WHERE `department` = '$department'") or die ("An error occurd. We are trying our best to fix this as soon as possible. Sorry for any inconvenience");

}

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


if ($department == "All departments")
{
$result3=mysqli_query("SELECT * FROM `users` ORDER BY `id` ASC LIMIT $start,10") or die ("An error occurd. We are trying our best to fix this as soon as possible. Sorry for any inconvenience");
}

else
{
$result3=mysqli_query("SELECT * FROM `users` WHERE `department` = '$department' ORDER BY `id` ASC LIMIT $start,10") or die ("An error occurd. We are trying our best to fix this as soon as possible. Sorry for any inconvenience");
}


	if(mysqli_num_rows($result3)>0)
	{
	
	echo "
	
	<div class=table_list_check_leaves>User ID</div>
	<div class=table_list_check_leaves>Name</div>
	<div class=table_list_user_dept2>Department</div>
	<div class=table_list_user_email2>Email</div>
	<div class=table_list_check_leaves>Phone</div>
	<div class=table_list_check_leaves>Registered</div>
	";
		
	while ($r = mysqli_fetch_array($result3))
	{	



	
	$user_id=$r['id'];
	$name= $r["first_name"].' '.$r["last_name"];
	$dept = $r["department"];
	$email = $r["e_mail"];
	$phone = $r["handphone"];
	$reg = $r["date_joined"];

echo "<div class=clearall></div>";

	echo "
	<div class=table_results_check_leaves>$user_id</div>
	<div class=table_results_check_leaves>$name</div>
	<div class=table_results_user_dept2>$dept</div>
	<div class=table_results_user_email2>$email</div>
	<div class=table_results_check_leaves>$phone</div>
	<div class=table_results_check_leaves>$reg</div>
	";
	echo "<div class=clearall></div>";
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
			echo "<a href=view_users_process.php?page=$i&users_dept="; echo urlencode("$department"); echo ">
			Previous</a>";
			echo "</div>";
			echo "<div class=dots-paginate>..</div>";
		
		
		
		
		}
	
		if ($current_page==1 and $number_of_pages > $range)
		{
			for ($i=1; $i<=$range; $i++)
			{
			echo "<div class=number-paginate>";
			echo "<a href=view_users_process.php?page=$i&users_dept="; echo urlencode("$department"); echo ">$i</a>";
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
			echo "<a href=view_users_process.php?page=$i&users_dept="; echo urlencode("$department"); echo ">
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
			echo "<a href=view_users_process.php?page=$i&users_dept="; echo urlencode("$department"); echo ">
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
			echo "<a href=view_users_process.php?page=$i&users_dept="; echo urlencode("$department"); echo ">
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
			echo "<a href=view_users_process.php?page=$i&users_dept="; echo urlencode("$department"); echo ">
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
			echo "<a href=view_users_process.php?page=$i&users_dept="; echo urlencode("$department"); echo ">
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
			echo "<a href=view_users_process.php?page=$i&users_dept="; echo urlencode("$department"); echo ">
			Next</a>";
			echo "</div>";
		
		
		
		
		}
		
		if ($current_page<$number_of_pages)
		{
		
		
			echo "<div class=previous-next-paginate>";
			$i=$number_of_pages;
			echo "<a href=view_users_process.php?page=$i&users_dept="; echo urlencode("$department"); echo ">
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
<div class="clearall"></div>

<div class="footer">E-Leave Application System. Copyright (C) 2016. Portal One Sdn Bhd</div>

</body>
</html>