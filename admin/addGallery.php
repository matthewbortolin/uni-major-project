<?php
	//if nothing selected
	if(!isset($_POST['gallery'])){
		print("<h3 class='error'>Add a user to create a gallery</h3>");
	}
	else{
	$gallery = explode(',',$_POST['gallery']);
	
	
	//connect to database
	include 'include/connectdb.php';
	
	//Insert user id and gallery name into database
	$query = "INSERT INTO gallery (user_id, gallery_name)
				VALUES (".$gallery[0].",'".addslashes($gallery[1])."')";
				
	$result = mysql_query($query) or die (
			"<h3 class='error'>Error - the INSERT could not be executed</h3>".mysql_error());
	
	//Make folder for gallery
	if(!is_dir("galleries/".$gallery[0])){
		mkdir("galleries/".$gallery[0]);
	}
	
	print("<h3>Gallery was created</h3>");
	
	//close database connection
	mysql_close($db);
	}
?>