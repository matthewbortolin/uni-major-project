<?php 
	//Variables posted from updateUser.php
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	
	
	$error = "";
	
	//validate user details
	include 'include/updateUser.php';
	
	if($error != ""){
		print("<h3 class='error'>".$error."</h3>");
	}
	else{
		//connect to database
		include 'include/connectdb.php';
		
		//Save updated details
		$query = "UPDATE users SET full_name = '".addslashes($name)."', email = '".addslashes($email)."', phone = '".$phone."', address = '".addslashes($address)."' 
					WHERE user_id ='".$_SESSION['user']['userId']."'"; 
		$result = mysql_query($query) or die ("Error - the Update could not be executed\n");
		
		//If name is changed gallery name is changed
		$query1 = "UPDATE gallery SET gallery_name = '".addslashes($name)."' WHERE user_id ='".$_SESSION['user']['userId']."'"; 			
		$result1 = mysql_query($query) or die ("Error - the Update could not be executed\n");
		
		mysql_close($db);
		
		//update session variable for user
		$_SESSION['user']['name'] = $name;
		
		//print confirmation
		print("<h3>Details Updated</h3>");
		
		//Redisplay gallery
		include 'gallery/userGall.php';
		
	}
?>