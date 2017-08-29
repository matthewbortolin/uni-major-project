<h3>Are you sure you want to delete</h3>
<?php 

$gallery = explode(',',$_POST['gallery']);

$_SESSION['temp'] = array('galleryId' => $gallery[0], 'userId'=>$gallery[1], 'galleryName'=>$gallery[2]);

print("<h3>".$_SESSION['temp']['galleryName']."?</h3>");
?>
<form method="post" action="admin.php">
	<button type="submit" name="confirmDeleteGallery">Confirm</button>
	<button type="submit" name="cancel">Cancel</button>
</form>
