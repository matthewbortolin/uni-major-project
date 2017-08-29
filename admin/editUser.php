<?php
	$username = $_POST['customer'];
    
	//connect to database
	include_once 'include/connectdb.php';
	
	//Select all usernames, passwords, user_groups
	$query = "SELECT user_id, full_name, email, phone, address FROM users
		WHERE email = '".addslashes($username)."'";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
?>

<!-- Update User Form-->
<form method="post" action="admin.php">
	
    <input type="text" id="name" name="name" <?php print("value= '".stripslashes($row[1])."'"); ?> /><br><br>
	
	<input type="text" id="email" name="email" <?php print("value= '".stripslashes($row[2])."'"); ?> /><br><br>
		  
	<input type="text" id="phone" name="phone" <?php print("value= '".$row[3]."'"); ?> /><br><br>
		   
	<input type="text" id="address" name="address" 
		<?php if($row[4]==null){print("placeholder='Address'");} else{ print("value= '".stripslashes($row[4])."'"); }?> /><br><br>
	
	<input type="hidden" id="userId" name="userId" <?php print("value= '".$row[0]."'"); ?> />
	
	<button type="submit" name="updateUser" >Update</button>
	<input type="submit" name="changePassword" value="Change Password"/>

</form>

<script type="text/javascript" src="javascript/event.js">
</script>
<?php mysql_close($db); ?>