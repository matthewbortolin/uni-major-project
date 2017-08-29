<?php
	$dir = "galleries/".$userId."/";
	$file = $dir.$image;	
	$fileType = pathinfo($file,PATHINFO_EXTENSION);
	
	//Check if it is real or fake
	$check = getimagesize($_FILES['image']['tmp_name']);
	if($check === false){
		$error = $error."File is not an image<br>";
	}
	
	//Check if already exists
	if(file_exists($file)){
		$error = $error."Image already exists<br>";
	}
	
	//check file size
	if($_FILES['image']['size']>500000){
		$error = $error."Image is too large<br>";
	}
	
	//check formats
	if($fileType != "jpg" && $fileType != "jpeg" && $fileType != "png" && $fileType != "gif"){
		$error = $error."Only JPG, JPEG, PNG & GIF Files are allowed<br>";
	}
?>