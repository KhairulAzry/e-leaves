<?php

//session_start();

if(!isset($_SESSION['username']))
{
header("location:login.php");
exit;
}

?>


<?php

$checkme=$_REQUEST['checkme'];

$key = $_SESSION['key'];

$result=mysql_query("SELECT * FROM `users` WHERE `id` = '$key' or `id` = '$key'") or die ("An error occurd. We are trying our best to fix this as soon as possible. Sorry for any inconvenience");
//$result2=mysql_query("SELECT * FROM `users` WHERE `username` = '$key'");

if((mysql_num_rows($result)>0) )

	{

			$r = mysql_fetch_array($result);
			$first_name = $r['first_name'];
			$last_name = $r['last_name'];
			$username = $r['username'];
			$password = $r['password'];
			$password=base64_decode($password);
			$handphone = $r['handphone'];
			//$registration_status = $r['registration_status'];
			$access_level = $r['access_level'];
			$department = $r['department'];
			$annual_leave_credit = $r['annual_leave_credit'];
			$medical_leave_credit = $r['medical_leave_credit'];
			$maternity_leave_credit = $r['maternity_leave_credit'];
			$paternity_leave_credit = $r['paternity_leave_credit'];
			$emergency_leave_credit = $r['emergency_leave_credit'];
			$unpaid_leave_credit = $r['unpaid_leave_credit'];
			$compassionate_leave_credit = $r['compassionate_leave_credit'];
			$e_mail = $r['e_mail'];
			
			

	}


?>

<form action=<?php echo "edit_user2.php?checkme=$checkme"?> method="post" name="edit_user" id="edit_user_admin">

						<div class="form_label_float_profile">First Name:</div>
						<div class="form_field_float"><input class="required" name="first_name" type="text" id="first_name" value="<?php echo $first_name; ?>" /></div>
						 <div class="clearall"></div>
				
						<div class="form_label_float_profile">Last Name:</div>
						<div class="form_field_float"><input class="required" name="last_name" type="text" id="last_name" value="<?php echo $last_name; ?>" /></div>
						 <div class="clearall"></div>
					
						<div class="form_label_float_profile">Username:</div>
						<div class="form_field_float"><input class="required" name="username" type="text" id="username" value="<?php echo $username; ?>" /></div>
						 <div class="clearall"></div>
					
						<div class="form_label_float_profile">Change Password:</div>
						<div class="form_field_float"><input class="required" name="password" type="password" id="password" value="<?php echo $password; ?>" /></div>
						 <div class="clearall"></div>
					
						<div class="form_label_float_profile">Handphone:</div>
						<div class="form_field_float"><input class="required digits" name="handphone" type="text" id="handphone" value="<?php echo $handphone; ?>" /></div>
						 <div class="clearall"></div>
					
						<div class="form_label_float_profile">Access Level:</div>
						<div class="form_field_float">
						<select name="access_level" selected="<?php echo $access_level; ?>">
						<option selected="selected"><?php echo $access_level; ?></option>
						<option>user</option>
						<option>manager</option>
						<option>admin</option>
						<!-- add or delete here for more departments-->
						</select>
						</div>
						 <div class="clearall"></div>
					
						<div class="form_label_float_profile">Department:</div>
						<div class="form_field_float">
						<select name="department" selected="<?php echo $department; ?>">
						<option selected="selected"><?php echo $department; ?></option>
						<option>Management</option>
						<option>Marketing</option>
						<option>HR</option>
						<option>PR</option>
						<option>Security</option>
						<option>Admin</option>
						<option>Secertary</option>
						<option>IT</option>
						<option>Sales</option>
						<option>Accounting</option>
                        
						<!-- add or delete here for more departments-->
						</select>
						</div>
						 <div class="clearall"></div>
						 
				
						<div class="form_label_float_profile">Annual Leave Credit:</div>
						<div class="form_field_float"><input class="required digits" name="annual_leave_credit" type="text" id="annual_leave_credit" value="<?php echo $annual_leave_credit; ?>"  /></div>
						 <div class="clearall"></div>
			
			<div class="form_label_float_profile">Medical Leave Credit:</div>
						<div class="form_field_float"><input class="required digits" name="medical_leave_credit" type="text" id="medical_leave_credit" value="<?php echo $medical_leave_credit; ?>"  /></div>
						 <div class="clearall"></div>
					
					<div class="form_label_float_profile">Maternity Leave Credit:</div>
						<div class="form_field_float"><input class="required digits" name="maternity_leave_credit" type="text" id="maternity_leave_credit" value="<?php echo $maternity_leave_credit; ?>"  /></div>
						 <div class="clearall"></div>
						
						<div class="form_label_float_profile">Paternity Leave Credit:</div>
						<div class="form_field_float"><input class="required digits" name="paternity_leave_credit" type="text" id="paternity_leave_credit" value="<?php echo $paternity_leave_credit; ?>"  /></div>
						 <div class="clearall"></div>
						
						<div class="form_label_float_profile">Emergency Leave Credit:</div>
						<div class="form_field_float"><input class="required digits" name="emergency_leave_credit" type="text" id="emergency_leave_credit" value="<?php echo $emergency_leave_credit; ?>"  /></div>
						 <div class="clearall"></div>
						 
						<div class="form_label_float_profile">Unpaid Leave Credit:</div>
						<div class="form_field_float"><input class="required digits" name="unpaid_leave_credit" type="text" id="unpaid_leave_credit" value="<?php echo $unpaid_leave_credit; ?>"  /></div>
						 <div class="clearall"></div>
					
					
					<div class="form_label_float_profile">Compassionate Leave Credit:</div>
						<div class="form_field_float"><input class="required digits" name="compassionate_leave_credit" type="text" id="compassionate_leave_credit" value="<?php echo $compassionate_leave_credit; ?>"  /></div>
						 <div class="clearall"></div>
						
						<div class="form_label_float_profile">Email:</div>
						<div class="form_field_float"><input class="required email" name="e_mail" type="text" id="e_mail" value="<?php echo $e_mail; ?>" /></div>
						 <div class="clearall"></div>
					
						                      
                        <div class="form_field_float">
                        <input class="form_button_style" type="submit" name="submit" value="Update" />
                        </div>
						<div class="clearall"></div>
						<p></p>
			

</form>