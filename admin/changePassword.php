<!-- Change password Form-->
<form method="post" action="admin.php">

<?php
	print("<h3>For ".$_POST['name']."</h3>");
	print("<input type='hidden' name='email' value='".$_POST['email']."'/>");
?>
	<input type="password" id="newPassword" name="newPassword" placeholder="New Password" required/><br><br>
	
	<input type="password" id="confirmNewPassword" name="confirmNewPassword" placeholder="Confirm New Password" required/><br><br>
		
	<input type="submit" name="confirmPassword" value="Change Password"/>
</form>