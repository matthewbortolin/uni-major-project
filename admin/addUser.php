<?php
	$email = $_POST['email'];
	$password = $_POST['newPassword'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$name = $_POST['name'];
	
	$usergroup = (isset($_POST['isAdmin']) ? isset($_POST['isAdmin']) : null);
	
	$error = "";
	
	include 'include/validateUser.php';
	
	if($error != ""){
		print("<h3 class='error'>".$error."</h3>");
	}
	else{
		//connect to database
		include_once 'include/connectdb.php';
		
		$query = "INSERT INTO users (full_name,address,phone,email,user_group,password) 
			VALUES ('".addslashes($name)."','".addslashes($address)."','".$phone."','".addslashes($email)."','"
									.$usergroup."','".password_hash($password,PASSWORD_DEFAULT)."')";
		$result = mysql_query($query) or die (
			"<h3 class='error'>Error - the INSERT could not be executed</h3>".mysql_error());
			
		print("<h3>".$name." was added to the database</h3>");
		
		mysql_close($db);
	}
	
	
?>