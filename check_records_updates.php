<?php

include 'base.php';
include 'secureme.php';

session_start();

if($_SESSION["access_level"] < 2 )
{
header("location:index.php");
exit;
}

?>


<?php

$check_time=mysql_query("SELECT * FROM `time_control` WHERE `time_control`.`time_yearly_adjust`") or die ("An error occurd. We are trying our best to fix this as soon as possible. Sorry for any inconvenience");
$check_results = mysql_fetch_assoc($check_time);
$timeDiff = time() - $check_results['time_yearly_adjust'];


if ($timeDiff > 86400)
{

$notify=mysql_query("SELECT * FROM `users`") or die ("An error occurd. We are trying our best to fix this as soon as possible. Sorry for any inconvenience");

if(mysql_num_rows($notify)>0)
{
	while ($r = mysql_fetch_array($notify)) 
	{ // Begin while
	
	$date_joined=$r['date_joined'];
	//$date_joined=date ( 'Y-m-j' , $date_joined );
	$username = $r["username"];
	$id=$r['id'];
	
	//echo $date_joined;
	$datetoday=date("Y-m-d");
	
	//echo $datetoday;
	$newdateplusyear = strtotime ('+1 year', strtotime ( $date_joined ) ) ;
	$newdate = date ( "Y-m-d" , $newdateplusyear );
	
	//echo $newdate;
	
	if ($newdate == $datetoday)
	{
	
	//echo "<BR>";
	#echo "$username with ID Number $id has been registered for a year now. Please look into the records for any intended updates!";
	
$adjust=mysql_query("UPDATE `users` SET `yearly_adjust` = '1' WHERE `users`.`id` =$id;") or die ("An error occurd. We are trying our best to fix this as soon as possible. Sorry for any inconvenience"); //or die ("ERROR");	
#$count3++;

$time_now=time();

$adjust_time_stamp=mysql_query("UPDATE `time_control` SET `time_yearly_adjust` = '$time_now'") or die ("An error occurd. We are trying our best to fix this as soon as possible. Sorry for any inconvenience");
	
	}
	
	} // end while
	

	
}
}




?>
