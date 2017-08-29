<h1>SELECT GALLERY</h1>
<?php
//connect to database
	include 'include/connectdb.php';
	
	//Query to get all gallery names for drop down box
	$query = "SELECT gallery_id, user_id, gallery_name FROM gallery";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
	$num_rows = mysql_num_rows($result);
?>
<form method="post" action="admin.php">
	
	<select id="gallery" name="gallery">
	<?php
	//Fill dropdown box with names from database 'users'
	for($i=0; $i<$num_rows; $i++){
			print("<option value='".$row[0].",".$row[1].",".stripslashes($row[2])."'>".stripslashes($row[2])."</option>");
			$row = mysql_fetch_array($result);
		}
	?>
	</select>
	
	<button type="submit" name="editGallery">Edit Gallery</button>
	<button type="submit" name="deleteGallery">Delete Gallery</button>
</form>

<?php mysql_close($db); ?>