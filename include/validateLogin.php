<?php

	$username = $_POST['username'];
	$password = $_POST['password'];
	
	//connect to database
	include_once 'include/connectdb.php';
   
   //Select all usernames, passwords, user_groups
	$query = "SELECT user_id, email, user_group, password, full_name FROM users";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
	$num_rows = mysql_num_rows($result);
	
	$exists = false;
	$passwordMatch = false;
	
	//Loop, checks if username exists, if so checks if passwords match,
	//If passwords match, checks for usergroup, if admin goes to admin area
	//otherwise goes to private gallery
	for($i=0; $i<$num_rows; $i++){
		
		//Check if usernames match
		if(strcmp($username,stripslashes($row[1]))==0){
			$exists=true;
			
			//Check if passwords match
			if(password_verify($password,$row[3])){
				$passwordMatch = true;
				
				//If usergroup is admin close db connection,
				//creates a session and goes to admin area
				if($row[2] == 1){
					mysql_close($db);
					$_SESSION['adminUsername'] = $username;
					header ('Location: admin.php');
				}
				
				//otherwise close db connection,
				//creates a session and goes to private gallery
				else if($row[2] == 0){
					mysql_close($db);
					$_SESSION['user'] = array('username' => $username,
												'userId' => $row[0],
												'name' => $row[4]);
					header ('Location: userGallery.php');
				}
			}
		}
		$row = mysql_fetch_array($result);		
	}
	//otherwise print error redisplay login form
	if($exists==false || $passwordMatch==false){
		print("<h3 class='error'>Invalid username or password</h3>");
	}
	
?>
