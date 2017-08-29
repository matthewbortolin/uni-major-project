<?php
	//If admin gallery selected will not delete, error message displayed
	if($_SESSION['temp']['userId']== 1 || $_SESSION['temp']['userId'] == 2){
		print("<h3 class='error'>Cannot delete admin galleries</h3>");
	}
	else{
		
	//connect to database
	include 'include/connectdb.php';
	
	//Delete gallery from table
	$query = "DELETE FROM gallery WHERE user_id = '".$_SESSION['temp']['userId']."'";
	$result = mysql_query($query);
	
	//Get all photo names from the galleries
	$query1 = "SELECT photo_name from photo WHERE gallery_id = '".$_SESSION['temp']['galleryId']."'";
	$result1 = mysql_query($query1);
	$row = mysql_fetch_array($result1);
	$num_rows = mysql_num_rows($result1);
	
	//Delete all photos from server folder
	for($i=0; $i<$num_rows; $i++){
		
		//Delete from gallery folder
		unlink("galleries/".$_SESSION['temp']['userId']."/".$row[0]);
		
		$row = mysql_fetch_array($result1);
	}
	
	//Delete all photos linked to gallery
	$query2 = "DELETE FROM photo WHERE gallery_id = '".$_SESSION['temp']['galleryId']."'";
	$result2 = mysql_query($query2);
	
	//If query fails print error
	if($result === false){
		print(mysql_error());
		mysql_close($db);
	}
	//If query fails print error
	else if($result1 === false){
		print(mysql_error());
		mysql_close($db);
	}
	//If query fails print error
	else if($result2 === false){
		print(mysql_error());
		mysql_close($db);
	}
	else{
		mysql_close($db);
		
		//Delete gallery folder
		rmdir("galleries/".$_SESSION['temp']['userId']);
	
		print("<h3>".$_SESSION['temp']['galleryName']." has been deleted</h3>");
		include 'admin/selectGallery.php';
	}
	
	}//end else statement
	
?>