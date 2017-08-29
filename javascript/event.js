<!--
	//Event function for landline
	function checkPhone(){
		var phone= document.getElementById("phone");
		
		var regex = phone.value.search(
			/^\(0[2-36-9]{1}\)\d{8}$/);
			
		var regex1 = phone.value.search(
			/^0[4-5]{1}\d{2}\d{3}\d{3}$/);
		
		if(regex != 0 || regex1 != 0){
			alert("The phone number is in the wrong format/n"
			+" Mobiles: 0(4-5)XXXXXXXX /n"
			+ "Landlines: 0(X) XXXXXXXX");
			return false;
		}
		else{
			return true;
		}
	}
	
	document.getElementById("phone").onchange = checkPhone;

-->