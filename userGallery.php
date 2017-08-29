<?php
	session_cache_limiter('private_no_cache');
	session_start();
?>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<!--CSS link-->
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<!--Font link-->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
	<!--Site title-->
	<title>Photography</title>
	<!-- Javascript link -->
	<script src="javascript/formValidation.js">
	//Function to check user password client side
	function validatePassword(){
	
	var password = document.getElementById("newPassword");
	
	var regex = password.value.search(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).{4,8}$/);
	
	if(regex !=0){
			if(event.preventDefault){
				event.preventDefault();
			}else{
            event.returnValue = false; // for IE as dont support preventDefault;
			}
			alert("Password must be 6-13 characters and contain one upper + lowercase letter, \n"+
			"one digit and no whitespaces\n";
		}
}
	</script>
</head>

<body>
	<!-- include header -->
	<?php include 'include/header.php'; ?>
	
	<!-- Gallery menu -->
	<section id="userGalleryMenu">
		<form method="post" action="userGallery.php">
		<ul>
			<li>
			<strong>Menu</strong>
			</li>
			<li style="display:block;">
				<input type="submit" name="updateDetails" value="Update Details"/>
			</li>
			<li style="display:block;">
				<input type="submit" name="changePassword" value="Change Password"/>
			</li>
			<li style="display:block;">
				<input type="submit" name="logout" value="Logout"/>
			</li>
		</ul>
	</form>
	</section>
	
	<!-- Gallery main  -->
	<section id="userGalleryMain">
	<?php
	//If user session is active
		if(isset($_SESSION['user'])){
			
			//if update details is selected from menu
			if(isset($_POST["updateDetails"])){
				print("<h1>UPDATE DETAILS</h1>");
				include 'gallery/updateUser.php';
			}
			//if addUser button selected on register form
			else if(isset($_POST["updateUser"])){
				include 'gallery/confirmUpdateUser.php';
			}
			//if change password button selected on menu
			else if(isset($_POST["changePassword"])){
				print("<h1>CHANGE PASSWORD</h1>");
				include 'gallery/changePassword.php';
			}
			//if paswsword confirmed
			else if(isset($_POST["confirmPassword"])){
				include 'gallery/confirmChangePassword.php';
			}
			//log out user
			else if(isset($_POST["logout"])){
				session_unset();
				session_destroy();
				header ('Location: index.php');
			}
			//if no buttons selected default display
			else{
				include 'gallery/userGall.php';
			}
		}
		//if user session not active returns to index page
		else{
			header ('Location: index.php');
		}
	?>
	</section>
	<!-- include footer -->
	<?php include 'include/footer.php'; ?>
</body>

</html>
