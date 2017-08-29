<?php
	
	print("<h1>".$_SESSION['user']['name']."</h1>");
	
	$userId = $_SESSION['user']['userId'];

	//connect to database
	include 'include/connectdb.php';

	//query to get gallery ID
	$query = "SELECT gallery_id FROM gallery WHERE user_id = '".$userId."'";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
	
	$galleryId = $row[0];
	
	//query for all photos
	$query = "SELECT photo_name FROM photo WHERE gallery_id = '".$galleryId."'";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
	$num_rows = mysql_num_rows($result);
	
	//display all photos from database
	for($i=0; $i<$num_rows; $i++){
			
			print("</br></br>
			<span class='userGallery'>
			<img class='thumbnail' src='galleries/".$userId."/".$row[0]."' style=\"cursor:pointer;\"
			onclick=\"window.open(this.src,'popUpWindow',
			'height=800, width=800,left=10,top=10,,scrollbars=yes,menubar=no');
			return false;\"/>
			".$row[0]."<br/>
			</span>");
			
			$row = mysql_fetch_array($result);
		}
		
	mysql_close($db);
?>