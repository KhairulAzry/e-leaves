<?php
session_start();

if($_SESSION["access_level"] < 3  )
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
<div class="page_title">Records updates</div>

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



$result=mysqli_query("SELECT * FROM `users` WHERE `yearly_adjust` = '1'") or die ("An error occurd. We are trying our best to fix this as soon as possible. Sorry for any inconvenience");
$total_results=mysqli_num_rows($result);
$results_per_page=10;
$number_of_pages=ceil($total_results/$results_per_page);
$start=10;

if(mysqli_num_rows($result)>0)
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


echo "<p class=only_bold>The Following records need to be edited because users have been registered for more than a year:</p>";
echo "
	<div class=table_list_user_id>User ID</div>
	<div class=table_list>First Name</div>
	<div class=table_list>Last Name</div>
	<div class=table_list>Username</div>
	<div class=table_list_user_email>Email Address</div>
	<div class=table_list>Date Joined</div>
	<div class=table_list>Edit User</div>
	";

	
	$result3=mysqli_query("SELECT * 
	FROM `users` 
	WHERE `yearly_adjust` = '1'
	ORDER BY `id` ASC
	LIMIT $start,10
	") or die ("An error occurd. We are trying our best to fix this as soon as possible. Sorry for any inconvenience");
	
	while ($r = mysqli_fetch_array($result3)) 
	{ // Begin while
	echo "<div class=clearall></div>";
	$user_id=$r["id"];
	$username = $r["username"];
	$first_name = $r["first_name"];
	$last_name = $r["last_name"];
	$e_mail = $r["e_mail"];
	$registration_status = $r["registration_status"];
	$user_id = $r["id"];
	$date_joined=$r['date_joined'];
	$checkme='true';
	echo "
	<div class=table_results_user_id>$user_id</div>
	<div class=table_results>$first_name</div>
	<div class=table_results>$last_name</div>
	<div class=table_results>$username</div>
	<div class=table_results_user_email>$e_mail</div>
	<div class=table_results>$date_joined</div>
	<div class=icon_lists><img src=images/update_user.png width=16 height=16 alt=update_icon /></div>
	<div class=links_float_left><a href=edit_user.php?user_id=$user_id&checkme=$checkme>Edit User </a></div>
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
			echo "<a href=edit_records.php?page=$i>
			Previous</a>";
			echo "</div>";
			echo "<div class=dots-paginate>..</div>";
		
		
		
		
		}
	
		if ($current_page==1 and $number_of_pages > $range)
		{
			for ($i=1; $i<=$range; $i++)
			{
			echo "<div class=number-paginate>";
			echo "<a href=edit_records.php?page=$i>
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
			echo "<a href=edit_records.php?page=$i>
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
			echo "<a href=edit_records.php?page=$i>
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
			echo "<a href=edit_records.php?page=$i>
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
			echo "<a href=edit_records.php?page=$i>
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
			echo "<a href=edit_records.php?page=$i>
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
			echo "<a href=edit_records.php?page=$i>
			Next</a>";
			echo "</div>";
		
		
		
		
		}
		
		if ($current_page<$number_of_pages)
		{
		
		
			echo "<div class=previous-next-paginate>";
			$i=$number_of_pages;
			echo "<a href=edit_records.php?page=$i>
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