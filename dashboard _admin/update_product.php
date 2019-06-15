<?php
	require_once('config.php');
	///$id=$_POST['user_id'];
	$file=$_FILES['image']['name'];
	if($file.strlen()>0){
	$array_ext=explode(".",$file);
	//print_r($array_ext);
	$ext=$array_ext[count($array_ext)-1];
	$fname=Date('Ymdhis');
	$file_name=$fname.".".$ext;
	$source=$_FILES['image']['tmp_name'];
	$destination="uploads/".$file_name;
	move_uploaded_file($source,$destination);
}
	else{
	$file_name=$_POST['old_img'];
}
	$category=$_POST['category'];
	$product_name=$_POST['product_name'];
	$price=$_POST['price'];
	$description=$_POST['description'];
	$file=$_FILES['image']['name'];

	$id=$_POST['user_id'];
	$update="UPDATE `products` set `cat_id`='".$category."',`product`='".$product_name."',`price`='".$price."',`description`='".$description."',`image`='".$file_name."' where product_id=$id";
	mysqli_query($conn, $update);
	header('Location:view_product.php?success_msg=3');
?>