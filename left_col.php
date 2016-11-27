<div class="leftcol">
  <div class="icon">
  <img src="images/home.png" width="16" height="16" alt="icon-home" /> 
  </div>
    
  <div class="menu_links">
  <a href="index.php">Home</a>
  </div>
  
    <div class="clearall"></div>

    <div class="icon"><img src="images/edit_account.png" width="16" height="16" alt="edit_account_icon" /></div>  
    <div class="menu_links">
    <a href="edit_profile.php">Edit account</a>
	</div>
    <div class="clearall"></div>
    
  <div class="vertical_divider">
    </div>
    <div class="small_spacer"></div>
    
	<div class="icon"><img src="images/new_application.png" width="16" height="16" alt="new_leave_application" /></div>
    
    <div class="menu_links">
  <a href="leave_apply.php">Apply for leave</a>
  </div>
  
  <div class="clearall"></div>
    

  <div class="icon"><img src="images/check_status.png" width="16" height="16" alt="check_application_status" /></div>
  <div class="menu_links">
  <a href="search_for_leave_ref.php">Application status</a>
 </div>
 
  <div class="clearall"></div>
  
   <div class="icon"><img src="images/cancel.png" width="16" height="16" alt="cancel_application" /></div>
  <div class="menu_links">
  <a href="cancel_leave.php">Cancel application</a>
 </div>
 
  <div class="clearall"></div>
 
 <div class="icon"><img src="images/history.png" width="16" height="16" alt="leaves_history" /></div>
  <div class="menu_links">
  <a href="check_status.php">Leaves history</a>
  </div>
  
   <div class="clearall"></div>

<div class="icon"><img src="images/public_holiday.png" width="16" height="16" alt="public_holiday" /></div>
  <div class="menu_links">
  <a href="public_holidays_list.php">Public Holidays</a>
  </div>
   <div class="clearall"></div>

<div class="vertical_divider">
  </div>
  <div class="small_spacer"></div>

<?php 
if($_SESSION["access_level"] == 3  )
{
	echo "<div class=icon><img src=images/admin_panel.png width=16 height=16 alt=admin_panel /></div>";
	echo "<div class=menu_links>";
	echo "<a href=admin.php>Admin Panel</a>";
	echo "</div>";
	echo "<div class=clearall></div>
";
}
?>

<?php 
if($_SESSION["access_level"] == 2  )
{
	echo "<div class=icon><img src=images/admin_panel.png width=16 height=16 alt=admin_panel /></div>";
	echo "<div class=menu_links>";
	echo "<a href=manager.php>Admin Panel</a>";
	echo "</div>";
	echo "<div class=clearall></div>
";
}
?>


  	<div class="icon"><img src="images/feedback.png" width="16" height="16" alt="feedback_icon" /></div>
    
    <div class="menu_links">
    <a href="feedback_page.php">Feedback</a>
  	</div>
    
       <div class="clearall"></div>

   <div class="icon"><img src="images/logout.png" width="16" height="16" alt="logout_icon" /></div> 
    
    <div class="menu_links">
    <a href="logout.php">Logout</a>
    </div>
    
    <div class="clearall"></div>
    
    
</div>