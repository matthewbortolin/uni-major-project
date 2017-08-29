
<!-- Change password Form-->
<form method="post" action="userGallery.php" onsubmit="return validatePassword();" >
	
	<input type="password" id="oldPassword" name="oldPassword" placeholder=" Old Password" required/><br><br>
	
	<input type="password" id="newPassword" name="newPassword" placeholder="New Password" required/><br><br>
	
	<input type="password" id="confirmNewPassword" name="confirmNewPassword" placeholder="Confirm New Password" required/><br><br>
		
	<button type="submit" name="confirmPassword">Change</button>
</form>