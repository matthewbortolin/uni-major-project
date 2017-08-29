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
	
	<section>
		<h1>LOGIN</h1>
		<?php
			if(isset($_POST['login'])){
				include 'include/validateLogin.php';
			}
		?>
		<!-- Login Form-->
		<form method="post" action="login.php">
		   <input type="text" id="username" name="username" placeholder="Username" required /><br><br>
		
		   <input type="password" id="password" name="password" placeholder="Password" required/><br><br>
		
		   <input type="submit" name="login" value="Login"/>
		</form>
	</section>
	<!-- include footer -->
	<?php include 'include/footer.php'; ?>
</body>

</html>
