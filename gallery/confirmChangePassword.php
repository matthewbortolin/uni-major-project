<?php

$oldPassword = $_POST['oldPassword'];
$password = $_POST['newPassword'];
$confirmPassword = $_POST['confirmNewPassword'];

//connect to database
include_once 'include/connectdb.php';
	
//Query check old Password
$query = "SELECT password FROM users WHERE email = '".$_SESSION['user']['username']."'";
$result = mysql_query($query);
$row = mysql_fetch_array($result);

//if old password matches database	
if(password_verify($oldPassword,$row[0])){
	
	mysql_close($db);
	
    //If new password and confirm passwords match	
	if(strcmp($password,$confirmPassword)===0){
		
		//Check password has 1 upper, lower, digit, no spaces
		if(!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).{4,8}$/",$password)){
			print("<h3 class='error'>Password must be between 6-13 characters, \r\n
			contain one digit, uppercase and lowercase and no whitespaces</h3>");
		}
		else{
			//Query to change password
			$query = "UPDATE users SET password = '".password_hash($password,PASSWORD_DEFAULT)."' WHERE email = '".$_SESSION['user']['username']."'";
			$result = mysql_query($query);
	
			//If query fails 
			if($result === false){
				print(mysql_error());
			}
			else{
				print("<h3>Password has been updated</h3>");
				//redisplay gallery
				include 'gallery/userGall.php';
			}
			
			mysql_close($db);
		}
	}
	else{
		print("<h3 class='error'>New Passwords are not the same, Go Back and try again</h3>");
	}
}
else{
	print("<h3 class='error'>Old Password is invalid, Go Back and try again</h3>");
}



?>