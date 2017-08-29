<?php
	$username = $_SESSION['user']['username'];
    
	//connect to database
	include 'include/connectdb.php';
	
	//Select all usernames, passwords, user_groups
	$query = "SELECT full_name, email, phone, address FROM users
		WHERE email = '".addslashes($username)."'";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
?>
<!-- Update User Form-->
<form method="post" action="userGallery.php">

    <input type="text" id="name" name="name" <?php print("value= '".stripslashes($row[0])."'"); ?> /><br><br>
	
	<input type="text" id="email" name="email" <?php print("value= '".stripslashes($row[1])."'"); ?> /><br><br>
		  
	<input type="text" id="phone" name="phone" <?php print("value= '".$row[2]."'"); ?> /><br><br>
		   
	<input type="text" id="address" name="address" 
		<?php if(stripslashes($row[3])==null){print("placeholder='Address'");} else{ print("value= '".stripslashes($row[3])."'"); }?> /><br><br>
		
	<button type="submit" name="updateUser">Update</button>
</form>

<?php mysql_close($db); ?>