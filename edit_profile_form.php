<?php

//session_start();

if(!isset($_SESSION['username']))
{
header("location:login.php");
exit;
}

?>



<?php

$result=mysqli_query("SELECT * FROM `users` WHERE `id` = '$applicants_id'") or die ("An error occurd. We are trying our best to fix this as soon as possible. Sorry for any inconvenience");

if((mysqli_num_rows($result)>0) )

	{
			$r = mysqli_fetch_array($result);
			$first_name = $r['first_name'];
			$last_name = $r['last_name'];
			$password = $r['password'];
			$password=base64_decode($password);
			$handphone = $r['handphone'];
			$e_mail = $r['e_mail'];
	}


?>

<form action="edit_profile2.php" method="post" name="edit_user" id="edit_user">

						<div class="form_label_float_profile">First Name:</div>
						<div class="form_field_float"><input class="required" name="first_name" type="text" id="first_name" value="<?php echo $first_name; ?>" /></div>
<div class="clearall"></div>

						<div class="form_label_float_profile">Last Name:</div>
						<div class="form_field_float"><input class="required" name="last_name" type="text" id="last_name" value="<?php echo $last_name; ?>" /></div>
                        <div class="clearall"></div>


						<div class="form_label_float_profile">Change Password:</div>
						<div class="form_field_float"><input class="required" name="password" type="password" id="password" value="<?php echo $password; ?>" /></div>
                        <div class="clearall"></div>

					
						<div class="form_label_float_profile">Handphone:</div>
						<div class="form_field_float"><input class="required digits" name="handphone" type="text" id="handphone" value="<?php echo $handphone; ?>" /></div>
                        <div class="clearall"></div>


						<div class="form_label_float_profile">Email:</div>
						<div class="form_field_float"><input class="required email" name="e_mail" type="text" id="e_mail" value="<?php echo $e_mail; ?>" /></div>

					<div class="clearall"></div>

						<div class="form_label_float_profile">
                        &nbsp;
                        </div>
                        
                        <div class="form_field_float">
                        <input class="form_button_style" type="submit" name="submit" value="Update" />
                        </div>
					
			

</form>