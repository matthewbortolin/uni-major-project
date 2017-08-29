<section>
	<?php
	
	if(isset($_POST['gallery'])){
		
		$gallery = explode(',',$_POST['gallery']);
		$galleryId = filter_var($gallery[0],FILTER_SANITIZE_SPECIAL_CHARS);
		$userId = $gallery[1];
		$galleryName = $gallery[2];
		
		//Assign variables to session
		$_SESSION['temp'] = array('galleryId' => $galleryId,
								'galleryName' => $galleryName,
								'userId' => $userId);
	}
	else{
		$galleryId = $_SESSION['temp']['galleryId'];
		$galleryName = $_SESSION['temp']['galleryName'];
	}
	
	//connect to database
	include 'include/connectdb.php';
	
	//Query to get all photo names for drop down box
	$query = "SELECT photo_id, photo_name FROM photo WHERE gallery_id = '".$galleryId."'";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
	$num_rows = mysql_num_rows($result);
	
	print("<h1>".$_SESSION['temp']['galleryName']."</h1>");
	?>
	
	<form method='post' action='admin.php' enctype='multipart/form-data'>
	<!-- File upload-->
	<input type="file" id="image" name="image" />
	<button type="submit" name="addImage">Add Photo</button>
	
	<br><br>
	
	<select id="selectImage" name="selectImage">
	<?php
	//Fill dropdown box with photo names from database
	for($i=0; $i<$num_rows; $i++){
			print("<option value='".$row[0].",".stripslashes($row[1])."'>".stripslashes($row[1])."</option>");
			$row = mysql_fetch_array($result);
		}
	?>
	</select>
	<button type="submit" name="deleteImage">Delete Photo</button>
	<br><br>
	</form>
	<?php
	
	//Query to get all photo names for drop down box
	$query = "SELECT photo_id, photo_name FROM photo WHERE gallery_id = '".$galleryId."'";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
	$num_rows = mysql_num_rows($result);
	
	//display all photos from database
	for($i=0; $i<$num_rows; $i++){
		print("<span class='userGallery'>
				<img class='thumbnail' src='galleries/".$userId."/".stripslashes($row[1])."' style=\"cursor:pointer;\"
			onclick=\"window.open(this.src,'popUpWindow',
			'height=800, width=800,left=10,top=10,,scrollbars=yes,menubar=no');
			return false;\"/>
				".stripslashes($row[1])."<br/>
			</span>");
			$row = mysql_fetch_array($result);
		}
		
	mysql_close($db);
	?>
</section>