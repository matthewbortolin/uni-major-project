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
	<title>PHOTOGRAHY</title>
</head>

<body>
	<!-- include header -->
	<?php include 'include/header.php'; ?>
	
	<section>
		<h1>PHOTOGRAPHY</h1>
		
	<?php 
	//Display all images from David Arnold 
	
	//connect to database
	include 'include/connectdb.php';
	
	//Query to get all photo names for drop down box
	$query = "SELECT photo_name FROM photo INNER JOIN gallery
	ON photo.gallery_id = gallery.gallery_id WHERE user_id = '1'";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
	$num_rows = mysql_num_rows($result);
	
	//display all photos from database with price and link to paypal
	for($i=0; $i<$num_rows; $i++){
		
		print("<span class='gallery'>
				<img class='thumbnail' src='galleries/1/".stripslashes($row[0])."' 
				style='cursor:pointer;' onclick=\"window.open(this.src,'popUpWindow',
			'height=800, width=800,left=10,top=10,,scrollbars=yes,menubar=no');
			return false;\"/>
			".stripslashes($row[0])."<br/>
			<input style='margin-top: 5px;' type='text' name='price' size='5' value='$10.95' readonly>		
			<form target='paypal' action='https://www.paypal.com/cgi-bin/webscr' method='post'>
			<input type='hidden' name='cmd' value='_s-xclick'>
			<input type='hidden' name='hosted_button_id'value=''>
			<table>
			<tr><td><input type='hidden' name='on0' value='".stripslashes($row[0])."'></td></tr><tr><td><input type='hidden' name='os0' size='5' value='$19.95'></td></tr>
			</table>
			<input type='image' src='https://www.paypalobjects.com/en_AU/i/btn/btn_cart_SM.gif' border='0' name='submit' alt='PayPal – The safer, easier way to pay online!'>
			<img alt='' border='0' src='https://www.paypalobjects.com/en_AU/i/scr/pixel.gif' width='1' height='1'>
			</form>
			</span>");
			$row = mysql_fetch_array($result);
		}
	//close database connection
	mysql_close($db);?>
		
	</section>
	<!-- include footer -->
	<?php include 'include/footer.php'; ?>
</body>

</html>
