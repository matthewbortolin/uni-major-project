<!--
function validatePassword(){
	
	var password = document.getElementById("password");
	
	var regex = password.value.search(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).{4,8}$/);
}
function validateUser(){
	var error = "";
	var phone = document.getElementById("phone");
	var name = document.getElementById("name");
	var email = document.getElementById("email");
	
	//check if name is empty or greater than 75 chars
	if(!nameValue){
		error = error + "Name can't be empty\n";
	}
	else if(name.length > 75){
		error = error + "Name can't be longer than 75 characters\n";
	}
	
	//regular expression for mobile
	var regex = phone.value.search(
			/^0[4-5]{1}\d{2}\d{3}\d{3}$/);
			
	//regular expression for landline	
	var regex2 = phone.value.search(
			/^\(0[2-36-9]{1}\) \d{8}$/);
	
	//validate phone not in correct format
	else if(regex != 0){
		if(regex2 !=0){
			error = error + "Phone must be in the format 0(4-5)XXXXXXXX for mobiles\n"+
			"or (0X) XXXXXXXX for landlines\n";
		}
	}
	
	//check if email is empty
	if(email.length < 1){
		error = error + "Email can't be empty\n";
	}
	//if there are errors display in alert box
	if(error != ""){
		if(event.preventDefault){
            event.preventDefault();
        }else{
            event.returnValue = false; // for IE as dont support preventDefault;
        }
		alert(error);
	}
	else{
		return true;
	}
	
}

function validateContact(){
	var phone = document.getElementById("contact_name");
	var name = document.getElementById("contact_email");
	var email = document.getElementById("message");
	
	//check if name is empty or greater than 75 chars
	if(!nameValue){
		error = error + "Name can't be empty\n";
	}
	else if(name.length > 75){
		error = error + "Name can't be longer than 75 characters\n";
	}
	
	//check if email is empty
	if(email.length < 1){
		error = error + "Email can't be empty\n";
	}
	
}
-->