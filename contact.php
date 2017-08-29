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
		$message = $_POST['message'];
		
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
		
		//Check message is not empty and no longer than 250 chars
		if($message == ""){
			$error = $error." Message cannot be Empty\r\n";
		}
		else if(strlen($message) > 250){
			$error = $error." Message cannot be exceed 250 characters\r\n";
		}
		
		//if no errors email enquiry
		if($error==""){
			$msg = $name."\n\n".$email."\n\n".$message;
			$msg = wordwrap($msg,70);
			
			$headers =  'MIME-Version: 1.0' . "\r\n"; 
			$headers .= 'From: Photography<admin@email.com>' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
			
			mail("admin@email.com","Enquiry",$msg,$headers);
		
			print("<h3>Enquiry Submitted</h3>");
		}
		else{
			print("<h3 class='error'>".$error."</h3>");
		}
		
	}
	//if nothing posted display contact form
	else
	{
	print("<section>
		<h1>CONTACT</h1>
		<!-- Contact Form-->
		<form method='post' action='contact.php'>
		
		   <input type='text' id='contact_name' name='contact_name' placeholder='Name' required /><br/><br/>
		
		   <input type='email' id='contact_email' name='contact_email' placeholder='Email' required  /><br/><br/>
		   
		   <textarea id='message' name='message' placeholder='Message' required ></textarea>
			
		
		   </br></br><button type='submit' name='enquiry'>Submit</button>
		</form>
	</section>");
	}
	//include footer
	include 'include/footer.php'; 
	
	?>
	
</body>

</html>
