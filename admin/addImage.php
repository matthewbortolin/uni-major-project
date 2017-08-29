<?php
	$galleryId = $_SESSION['temp']['galleryId'];
	$galleryName = $_SESSION['temp']['galleryName'];
	$userId = $_SESSION['temp']['userId'];
	$image = ($_FILES['image']['name']);
	$error = "";
	
	//if the file is not empty include file to validate the image
	if($image != ""){
		include "admin/checkImage.php";
	}
	else{
		$error = "No file selected";
	}
	
	//If no errors
	if($error == ""){
		
		//connect to database
		include_once 'include/connectdb.php';
		
		//Query to add photo to database
		$query = "INSERT INTO photo (gallery_id,photo_name)
			VALUES ('".$galleryId."','".addslashes($_FILES['image']['name'])."')";
		$result = mysql_query($query);
		
		//If query fails 
		if($result === false){
			$error = mysql_error();
		}
		//Close connection
		mysql_close($db);
		
		//Add image to folder
		$success = move_uploaded_file($_FILES['image']['tmp_name'],$file);
		
		//If image uploaded and database successful
		if($success && $error == ""){
			print ("<h3>".$image." has been added</h3>");
			include 'admin/editGallery.php';
		}
		else{
			$error = "File could not upload";
		}
		
		//If upload or database fails
		if($error != ""){
			print("<h3 class='error'>".$error."</h3>");
			include 'admin/editGallery.php';
		}
	}
	else{
		print("<h3 class='error'>".$error."</h3>");
	    include 'admin/editGallery.php';
	}
	
	
?>