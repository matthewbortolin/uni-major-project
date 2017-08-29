<?php
	$photo = $_POST['photoSearch'];
	
	//if photoname is not empty search database and display any photos
	if($photo != ""){
		//connect to database
		include 'include/connectdb.php';
	
		//Query to search photo
		$query = "SELECT user_id FROM gallery INNER JOIN photo
		ON photo.gallery_id = gallery.gallery_id WHERE photo_name = '".addslashes($photo)."'";
		$result = mysql_query($query);
		$row = mysql_fetch_array($result);
		$num_rows = mysql_num_rows($result);
		
		//display photo from database
		for($i=0; $i<$num_rows; $i++){
		
		print("<span class='gallery'>
				<img class='thumbnail' src='galleries/".$row[0]."/".$photo."' 
				style='cursor:pointer;' onclick=\"window.open(this.src,'popUpWindow',
			'height=800, width=800,left=10,top=10,,scrollbars=yes,menubar=no');
			return false;\"/>
			</span>");
			$row = mysql_fetch_array($result);
		}
		
		//If query fails 
		if($result === false){
			print("<h3 class='error'>Image doesn't exist</h3>");
		}
		
		mysql_close($db);
	}
	
?>