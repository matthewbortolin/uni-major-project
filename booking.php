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
	<?php include 'include/header.php'; 
		
	if(isset($_POST['enquiry'])){
		$name = $_POST['contact_name'];
		$email = $_POST['contact_email'];
		$session = $_POST['session'];
		$comments = $_POST['comments'];
		$day = $_POST['day'];
		$month = $_POST['month'];
		$year = $_POST['year'];
		$time = $_POST['time'];
		
		$error = "";
		
		//Check name is not empty and no longer than 75 chars
		if($name == ""){
			$error = $error." Name cannot be Empty\r\n";
		}
		else if(strlen($name) > 75){
			$error = $error." Name cannot be longer than 75 characters\r\n";
		}
		
		//include function to validate email
		include 'include/validEmail.php';
	
		//Check email is valid
		if(validEmail($email)===false){
			$error = $error." Email is not valid\r\n";
		}
		
		//Check comments is not empty and no longer than 250 chars
		if($comments == ""){
			$error = $error." Comments cannot be Empty\r\n";
		}
		else if(strlen($comments) > 250){
			$error = $error." Comments cannot be exceed 250 characters\r\n";
		}
		
		//if no errors email enquiry
		if($error==""){
			$msg = $name."\n\n".$email."\n\nSession: ".$session."\n\n".$comments."\n\nPreffered Date/Time: ".$day." ".$month." ".$year." ".$time;
			$msg = wordwrap($msg,70);
			
			$headers =  'MIME-Version: 1.0' . "\r\n"; 
			$headers .= 'From: Photography<admin@email.com>' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
			
			mail("admin@email.com","Enquiry",$msg,$headers);
		
			print("<h3>Booking Requested</h3>");
	
		}
		else{
			print("<h3 class='error'>".$error."</h3>");
		}
		
	}
	else
	{
		//booking form, name, email and preferred date
	print("<section>
		<h1>BOOKING</h1>
		<center><p><i>*Prices start from $50 per hour, please submit the following form for a full quote</i></p></center><br/>
		<!-- Contact Form-->
		<form method='post' action='booking.php'>
		
		   <input type='text' id='contact_name' name='contact_name' placeholder='Name' required /><br/><br/>
		
		   <input type='email' id='contact_email' name='contact_email' placeholder='Email' required />
		   
		   <h3>SESSION TYPE</h3>
		   <select name='session'>
				<option value='Shoot David'>Photo Shoot - David</option>
				<option value='Shoot Tammy'>Photo Shoot - Tammy</option>
				<option value='Event David'>Event - David</option>
				<option value='Event Tammy'>Event - Tammy</option>
			</select>
		   <br/><br/>
			<textarea id='comments' name='comments' placeholder='Comments' required ></textarea>
			
			<h3>PREFFERED DATE/TIME</h3>
			<select name='day'>
			<option value=''>Day</option>");
			for($i=1; $i<=31; $i++){
				print("<option value='".$i."'>".$i."</option>");
			}	
	//dropdown menu to select month, year, time			
	print("</select>
			<select name='month'>
				<option value=''>Month</option>
				<option value='JAN'>JAN</option>
				<option value='FEB'>FEB</option>
				<option value='MAR'>MAR</option>
				<option value='APR'>APR</option>
				<option value='MAY'>MAY</option>
				<option value='JUN'>JUN</option>
				<option value='JUL'>JUL</option>
				<option value='AUG'>AUG</option>
				<option value='SEP'>SEP</option>
				<option value='OCT'>OCT</option>
				<option value='NOV'>NOV</option>
				<option value='DEC'>DEC</option>
			</select>
			
			<select name='year'>
				<option value=''>Year</option>
				<option value='2016'>2016</option>
				<option value='2017'>2017</option>
				<option value='2018'>2018</option>
			</select>
			
			<select name='time'>
			<option value=''>Time</option>");
			for($i=9; $i<=17; $i++){
				print("<option value='".$i.":00'>".$i.":00</option>");
			}	
				
	print("</select>
		
		   </br></br><button type='submit' name='enquiry'>Submit</button><br/><br/>
		</form>
	</section>");
	}
	//include footer
	include 'include/footer.php'; 
	
	?>
	
</body>

</html>
