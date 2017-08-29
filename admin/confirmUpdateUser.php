<?php 

	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$userId = $_POST['userId'];
	
	$error = "";
	
	//include updateUser.php to validate details
	include 'include/updateUser.php';
	
	if($error != ""){
		print("<h3 class='error'>".$error."</h3>");
	}
	else{
		//connect to database
		include 'include/connectdb.php';
	
		//Update details
		$query = "UPDATE users SET full_name = '".addslashes($name)."', email = '".addslashes($email)."', phone = '".$phone."', address = '".addslashes($address)."' 
					WHERE user_id ='".$userId."'"; 
		$result = mysql_query($query) or die ("Error - the Update could not be executed\n");
		
		
		//If name is changed gallery name is changed
		$query = "UPDATE gallery SET gallery_name = '".addslashes($name)."' WHERE user_id ='".$userId."'"; 
		$result = mysql_query($query) or die ("Error - the Update could not be executed\n");
		
		
		print("<h3>Details Updated</h3>");
		
		mysql_close($db);
	}
?>