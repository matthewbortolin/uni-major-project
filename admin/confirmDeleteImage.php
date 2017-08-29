<?php
	$userId = $_SESSION['temp']['userId'];

	//Delete from server
	unlink("galleries/".$userId."/".$_SESSION['image']['photoName']);
	
	//connect to database
	include 'include/connectdb.php';
	
	//Delete photo from table
	$query = "DELETE FROM photo WHERE photo_id = '".$_SESSION['image']['photoId']."'";
	$result = mysql_query($query);
	
	mysql_close($db);
	
	//If query fails 
	if($result === false){
		print(mysql_error());
	}
	else{
		print("<h3>".$_SESSION['image']['photoName']." has been deleted</h3>");
		include 'admin/editGallery.php';
	}	
	
?>