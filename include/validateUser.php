<?php
	
	//Check name is not empty, no longer than 125 chars and 
	if($name == ""){
		$error = $error." Name cannot be Empty\r\n";
	}
	else if(strlen($name) > 75){
		$error = $error." Name cannot be longer than 75 characters\r\n";
	}
	else if(!preg_match("/[A-Za-z\']/",$name)){
		$error = $error." Name must be letters only\r\n";
	}
	
	//Check password 1 upper, lower, digit, no spaces
	if(!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).{4,8}$/",$password)){
		$error = $error." Password must be between 6-13 characters, \r\n
			contain one digit, uppercase and lowercase and no whitespaces";
	}
	
	//Check if address is less than 150
	if(strlen($address) > 150){
		$error = $error." Address must be less than 150 characters\r\n";
	}
	
	//include function to validate email
	include 'include/validEmail.php';
	
	//Check email is valid
	if(validEmail($email)===false){
		$error = $error." Email is not valid\r\n";
	}
	
	//include function to validate phone
	include 'include/validPhone.php';
	
	//Check phone is in correct format
	if(validPhone($phone)===false){
		$error = $error." Phone number must be in the format\r\n
					04XXXXXXXX for mobiles and (0X) XXXXXXXX for landlines";
	}

?>
