<?php
require_once('config.php');
$category=$_POST['category'];
$product_name=$_POST['product_name'];
$price=$_POST['price'];
$description=$_POST['description'];

$file=$_FILES['image']['name'];
$array_ext=explode(".",$file);
//print_r($array_ext);
$ext=$array_ext[count($array_ext)-1];
$fname=Date('Ymdhis');
$file_name=$fname.".".$ext;
$source=$_FILES['image']['tmp_name'];
$destination="uploads/".$file_name;
move_uploaded_file($source,$destination);

 //echo 
 $insert="INSERT INTO `products` (`cat_id`,`product`,`price`,`description`,`image`)VALUES('".$category."','".$product_name."','".$price."','".$description."','".$file_name."')";
//die;
 mysqli_query($conn,$insert);
header('Location:view_product.php?success_msg=1');
?>