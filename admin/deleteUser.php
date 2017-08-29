<h1>DELETE USER</h1>
<?php
	//connect to database
	include_once 'include/connectdb.php';
	
	//Query to get all names for drop down box
	$query = "SELECT full_name, email FROM users WHERE user_id NOT IN (1,2)";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
	$num_rows = mysql_num_rows($result);
	
	if($result === false){
		die(mysql_error());
	}
?>
<form method="post" action="admin.php">
	
	<select name="deleteUsername" id="deleteUsername">
		<?php
		//Fill dropdown box with names from database 'users'
		for($i=0; $i<$num_rows; $i++){
			print("<option value='".$row[1]."'>".stripslashes($row[0]).", ".stripslashes($row[1])."</option>");
			$row = mysql_fetch_array($result);
		}
		?>
	</select>
	
	<button type="submit" name="deleteUser">Delete</button>
</form>

<?php mysql_close($db); ?>