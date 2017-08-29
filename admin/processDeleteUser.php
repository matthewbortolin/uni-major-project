<?php
//if nothing selected print error message
if(!isset($_POST['deleteUsername'])){
	print("<h3 class='error'>No user selected</h3>");
}
else{
	//user email posted from deleteUser.php
	$username = $_POST['deleteUsername'];
    
	//connect to database
	include_once 'include/connectdb.php';
	
	//Select all name, email, phone, password,for selected user
	$query = "SELECT full_name, phone, address FROM users
		WHERE email = '".$username."'";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);

print("<h3>Are you sure you want to delete?</h3>");
print("<h3>Name: ".stripslashes($row[0])."</h3>");
print("<h3>Email: ".stripslashes($username)."</h3>");
print("<h3>Phone: ".$row[1]."</h3>");
print("<h3>Address: ".stripslashes($row[2])."</h3>");

	//close database connection
	mysql_close($db);
?>
<form method="post" action="admin.php">
	<input type="hidden" name="email" <?php print("value='".$username."'"); ?> />
	<button type="submit" name="confirmDeleteUser">Confirm</button>
	<button type="submit" name="cancel">Cancel</button>
</form>

<?php } //end else?>