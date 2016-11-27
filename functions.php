<?php
   

   
      //Define out start and end dates
   
      function countdays ($start,$end)
	  {
		
		$start = new DateTime($start);
   
		$end = new DateTime($end);
   

$sql=mysql_query("SELECT * FROM `holidays`");

$i=0;

while ($r=mysql_fetch_array($sql))
{
	$holidays[$i]=$r['holiday_date'];
	$i++;
}       
   
      //Define our holidays
   
      //New Years Day
   
      //Martin Luther King Day
/*  
      $holidays = array(
  
      '2011-02-03',
  
      '2011-02-04',
  
      );
  */       
  
        
      //Create a period array instead of using a DatePeriod/DateInterval combination
   
      $period = array();
          
   
      //Use the start and end date to fill the period array with DateTime objects increments by 1 day
   
      while ( $start <= $end ) {
   
      //We have to clone the start DateTime object
         //or as we increment it, every instance of it will increment
         $period[] = clone $start;
   
      $start->modify( '+1 day' );
        }
  
       
  
      //Holds valid DateTime objects of valid dates
  
      $days = array();
  
       
  
      //iterate over the period by day
  
      foreach( $period as $day )
  
      {
        //If the day of the week is not a weekend
  
      $dayOfWeek = $day->format( 'N' );
  
      if( $dayOfWeek < 6 ){
  
      //If the day of the week is not a pre-defined holiday
  
      $format = $day->format( 'Y-m-d' );
  
      if( false === in_array( $format, $holidays ) ){
  
      //Add the valid day to our days array
  
      //This could also just be a counter if that is all that is necessary
        $days[] = $day;
  
      }
  
      }
  
      }
  
       
  
     
	  return  count( $days ) ;
	  }
	  
	  
	  
	  
		function find_field($field_name,$id)
		{
	  
		//check for specific field :)
			$column=$field_name;
			$columns = mysql_query("SHOW COLUMNS FROM `users`") or die("error");

			while($c = mysql_fetch_assoc($columns))
			{
				if($c['Field'] == $column)
				{	
					
					$field_name2 = substr($field_name, 0, -13);
					$field_name2=ucfirst($field_name2);
					echo "<div class=icon_lists><img src=images/leave_list.png width=16 height=16 alt=leave_list_icon /></div>";
					echo "<div class=leave_credit_type>$field_name2:</div>";
					$sql=mysql_query("SELECT * FROM `users` WHERE `id`='$id'") or die("error");
					$result=mysql_fetch_array($sql);
					$number_of_days=$result[$field_name];
					echo "<div class=floatmeright>$number_of_days</div>";
				
					break;
				}
				
				echo "<div class=clearall></div>";
			}
			
			echo "<div class=clearall></div>";
			//return $number_of_days;
			
		}

			function get_leaves($status,$id)
			{
			$status2=ucfirst($status);
			echo "<div class=icon_lists><img src=images/$status.png width=16 height=16 alt=leave_list_icon /></div>";
			echo "<div class=leave_credit_type>$status2:</div> ";
			$result3=mysql_query("SELECT * FROM `leave` WHERE `applicants_id`='$id' 
			and `application_status`='$status'");
			echo "<div class=floatmeright>"; 
			echo mysql_num_rows($result3);
			echo "</div>";
			echo "<div style=clear:both;></div>";
			
			}
?>