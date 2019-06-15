<?php
require_once('config.php');
$category=$_POST['category'];
$insert='INSERT INTO `categories` (`category`) VALUES("'.$category.'")';
$run= mysqli_query($conn,$insert);
// if ($run == 1) {
	 // echo "Category Added";
 // }
 // else {
	 // echo "DB Error!";
 // }
header('Location:view_category.php?success_msg=1');
?>
