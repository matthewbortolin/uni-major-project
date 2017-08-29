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
</head>

<body>
	<!-- include header -->
	<?php include 'include/header.php'; ?>
	
	<!-- Admin menu -->
	<section id="adminMenu">
		<form method="post" action="admin.php">
		<ul>
			<li>
			<strong>Admin</strong>
			</li>
			<li style="display:block;">
				<input type="submit" name="registerUser" value="Register User"/>
			</li>
			<li style="display:block;">
				<input type="submit" name="selectEditUser" value="Edit User"/>
			</li>
			<li style="display:block;">
				<input type="submit" name="delete" value="Delete User"/>
			</li>
			<li style="display:block;">
				<input type="submit" name="editDeleteGallery" value="Edit/Delete Gallery"/>
			</li>
			<li>
				<input type="submit" name="createGallery" value="Create Gallery"/>
			</li>
			<li style="display:block;">
				<input type="submit" name="logout" value="Logout"/>
			</li>
		</ul>
	</form>
	</section>
	
	<!-- Admin main  -->
	<section id="adminMain">
	<?php
		//If admin session is active
		if(isset($_SESSION['adminUsername'])){
			//print username to screen
			print("<strong>User: ".$_SESSION['adminUsername']."</strong>");
			//Search box
			print("<form method='post' action='admin.php' style='text-align:right;'>
				<input type='text' name='photoSearch' placeholder='Photo Name' /><input type='submit' name='search' value='Search'/>
			</form>");
			//if register user is selected from menu
			if(isset($_POST["search"])){
				include 'admin/searchPhoto.php';
			}
			//if register user is selected from menu
			else if(isset($_POST["registerUser"])){
				print("<h1>REGISTER USER</h1>");
				include 'admin/registerUser.php';
			}
			//if addUser button selected on register form
			else if(isset($_POST["addUser"])){
				include 'admin/addUser.php';
			}
			//if edit user is selected from menu
			else if(isset($_POST["selectEditUser"])){
				print("<h1>SELECT USER</h1>");
				include 'admin/selectEditUser.php';
			}
			//if edit user is selected from menu
			else if(isset($_POST["editUser"])){
				print("<h1>EDIT USER</h1>");
				include 'admin/editUser.php';
			}
			//if updateUser button selected on edit form
			else if(isset($_POST["updateUser"])){
				include 'admin/confirmUpdateUser.php';
			}
			//when user is selected display password form
			else if(isset($_POST["changePassword"])){
				print("<h1>CHANGE PASSWORD</h1>");
				include 'admin/changePassword.php';
			}
			//if Change password is confirmed
			else if(isset($_POST["confirmPassword"])){
				include 'admin/confirmChangePassword.php';
			}
			//If delete user is selected from the menu
			else if(isset($_POST["delete"])){
				include 'admin/deleteUser.php';
			}
			//if delete user button is selected from delete form 
			else if(isset($_POST["deleteUser"])){
				include 'admin/processDeleteUser.php';
			}
			//if deletion is confirmed
			else if(isset($_POST["confirmDeleteUser"])){
				include 'admin/confirmDeleteUser.php';
			}
			//if edit gallery is selected from the menu
			else if(isset($_POST["editDeleteGallery"])){
				include 'admin/selectGallery.php';
			}
			//once a gallery is selected
			else if(isset($_POST["editGallery"])){
				include 'admin/editGallery.php';
			}
			//If add button is selected from editGallery.php
			else if(isset($_POST["addImage"])){
				include 'admin/addImage.php';
			}
			//If delete button is selected from editGallery.php
			else if(isset($_POST["deleteImage"])){
				include 'admin/deleteImage.php';
			}
			//If deletion is confirmed
			else if(isset($_POST["confirmDeleteImage"])){
				include 'admin/confirmDeleteImage.php';
			}
			//If create gallery is selected from menu
			else if(isset($_POST["createGallery"])){
				include 'admin/createGallery.php';
			}
			//if button selected to create gallery
			else if(isset($_POST["addGallery"])){
				include 'admin/addGallery.php';
			}
			//if delete gallery is selected
			else if(isset($_POST["deleteGallery"])){
				include 'admin/deleteGallery.php';
			}
			//if delete gallery is confirmed
			else if(isset($_POST["confirmDeleteGallery"])){
				include 'admin/confirmDeleteGallery.php';
			}
			//log out user
			else if(isset($_POST["logout"])){
				session_unset();
				session_destroy();
				header ('Location: index.php');
			}
			//if no buttons selected default display
			else{
				print("<h3>SELECT AN OPTION FROM THE MENU</h3>");
			}
		}
		//if admin session not active returns to index page
		else{
			header ('Location: index.php');
		}
	?>	
	</section>
	<!-- include footer -->
	<?php include 'include/footer.php'; ?>
</body>

</html>
