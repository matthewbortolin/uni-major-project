<?php
	//connect to database
	include_once 'include/connectdb.php';
	
	//Query to get all names for drop down box
	$query = "SELECT user_id, full_name, email FROM users WHERE user_id NOT IN (SELECT user_id from gallery)";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
	$num_rows = mysql_num_rows($result);
?>

<h1>SELECT CUSTOMER</h1>

<form method="post" action="admin.php">
	
	<select id="gallery" name="gallery">
		<?php
	//Fill dropdown box with names from database 'users'
	for($i=0; $i<$num_rows; $i++){
			print("<option value='".$row[0].",".stripslashes($row[1])."'>".stripslashes($row[1]).", ".stripslashes($row[2])."</option>");
			$row = mysql_fetch_array($result);
		}
	?>
	</select>
	
	<button type="submit" name="addGallery">addGallery</button>
</form>

<?php mysql_close($db); ?>