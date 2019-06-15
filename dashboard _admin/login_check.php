<?php
	// require_once('common.php');
	require_once('config.php');
	$email=$_POST['email'];
	$password=$_POST['password']; 
	$select="SELECT * FROM `admin` where `e_mail`='".$email."' AND `password`='".base64_encode($password)."'";
	//$select="SELECT * FROM `users` where `e_mail`='".$email."' AND `password`='".base64_encode($password)."'";
	$query=mysqli_query($conn,$select);////`password`='".base64_encode($password)."'
	//echo mysqli_num_rows($query);
	if(mysqli_num_rows($query)>0){
		while($res=mysqli_fetch_assoc($query)){
			session_start();
			$_SESSION['user_id']=$res['user_id'];
			$_SESSION['email']=$res['e_mail'];
			//print_r($_SESSION);
			header("Location:add_category.php");
		}
	}else{
		header("Location:login.php?login_error=1");
	}
?>
<?php require_once('footer.php'); ?>