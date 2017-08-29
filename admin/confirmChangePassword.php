<?php

$email = $_POST['email'];
$password = $_POST['newPassword'];
$confirmPassword = $_POST['confirmNewPassword'];

//Check if both passwords match
if(strcmp($password,$confirmPassword)===0){
	
	//Check password has 1 upper, lower, digit, no spaces
	if(!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).{4,8}$/",$password)){
		print("<h3 class='error'>Password must be between 6-13 characters, \r\n
		contain one digit, uppercase and lowercase and no whitespaces</h3>");
	}
	else{
		//connect to database
		include 'include/connectdb.php';
	
		//Query to change password
		$query = "UPDATE users SET password = '".password_hash($password,PASSWORD_DEFAULT)."' WHERE email = '".$email."'";
		$result = mysql_query($query);
	
		//If query fails 
		if($result === false){
			print(mysql_error());
		}
		else{
			print("<h3>Password has been updated</h3>");
		}
		
		mysql_close($db);
	}
}
else{
	print("<h3 class='error'>Passwords are not the same</h3>");
	
}
?>