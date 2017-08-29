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
<?php
if(!(isset($_SESSION['user']))){?>

<!--Display Splash/Intoduction Page-->
<div id="splashPage">
	<section id="splashMain">
	<center><img src="images/logo.png" /></center>
 	<h1>PHOTOGRAPHY</h1>
 	<center><a href="index.php" id="enter" style="text-align:center;"><button>Enter</button></a></center>
	</section>
</div>

<?php
	//start session for website so splash doesn't reappear
	$_SESSION['user'] = true;
}
else{ 
	//include header
	include 'include/header.php'; ?>
	
	<section>
	<!--Main title-->
		<h1>PHOTOGRAPHY</h1>
		<section id="indexImage">
		<img id="mainImage" src="images/indexImage.png"/>
		</section>
		<!--Information on client-->
		<section id="indexMain">
		<h3><i>Specialists in themed photographic shoots</i></h3>
		<p>Gold Coast based photographer
		combine their love of photography, history and all things quirky, 		
		to create a fun and truly unique photographic experience for their 			
		clients.
		</p>
		</section>
	</section>
	
	<!-- include footer -->
<?php include 'include/footer.php'; 
	}
?>

</body>

</html>
