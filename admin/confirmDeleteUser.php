<?php
	//user email posted from processDeleteUser.php
	$username = $_POST['email'];
    
	//connect to database
	include_once 'include/connectdb.php';
	
	//Select all usernames, passwords, user_groups
	$query = "DELETE FROM users
		WHERE email = '".$username."'";
	$result = mysql_query($query);
	
	if($result === false){
		die(mysql_error());
	}
	else{
		print("<h3>Deletion Successful</h3>");
	}
	
	mysql_close($db);
?>
