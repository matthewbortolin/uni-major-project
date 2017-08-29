<?php 

//if photo id is null, print error
if(!isset($_POST['selectImage'])){
	print("<h3 class='error'>No Image Selected</h3>");
}

//otherwise ask to confirm to delete
else{
	print("<h3>Are you sure you want to delete");
	
	//recieve photo id, name from post. store in array
	$photo = explode(',',$_POST['selectImage']);	
	
	$_SESSION['image'] = array('photoId'=>$photo[0],'photoName'=>$photo[1]);

	print(" ".$_SESSION['image']['photoName']."?</h3>");
?>
	<form method="post" action="admin.php">
		<button type="submit" name="confirmDeleteImage">Confirm</button>
		<button type="submit" name="cancel">Cancel</button>
	</form>

<?php } ?>