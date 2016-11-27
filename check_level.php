<?php
	if ($_SESSION['registration_status'] == "1")
		{
			if ($_SESSION['access_level'] >= 1)
			{
			header("location:index.php");
			exit;
			}
		}
		else
		{
			echo "<div class=icon_lists><img src=images/warning.png width=16 height=16 alt=warning_icon /></div>";
			echo "<div class=floataftericon_red>";
			echo "Your account is not activated yet<br><br></div>";
			echo "<div class=clearall></div>";
			echo "Please wait for administration officers to activate your account.<br><br>";
			echo "<div class=clearall></div>";
			echo "<div class=icon_lists><img src=images/home.png width=16 height=16 alt=home_icon /></div>";
			echo "<div class=links_float_left><a href=index.php>Home Page</a></div>";
			echo "<div class=clearall></div>";
			session_destroy();			
		}		
?>