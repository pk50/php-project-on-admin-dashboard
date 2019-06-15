<?php 
	$id=$_GET['user'];
	$image=$_GET['image'];
	require_once("config.php");
	unlink('uploads/'.$image);
	//echo
	$delete="DELETE FROM `products` where `product_id`=$id";
	//die;
	mysqli_query($conn,$delete);
	header("Location:view_product.php?success_msg=2");
?>