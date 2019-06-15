<?php 
	 session_start(); 
	 if(isset($_SESSION['user_id']) && $_SESSION['user_id']!=""){
	require_once('common.php');
	require_once("config.php");
	$id=$_GET['user_id'];
	$select="SELECT * FROM `products` where product_id=$id";
	$query=mysqli_query($conn,$select);
	$res=mysqli_fetch_object($query);
	// this query is for select category only//
	$select1="SELECT * FROM `categories`";
	$query_one=mysqli_query($conn,$select1);
?>
<p align="center" class="m-2">Welcome <?php echo $_SESSION['email'];?></p>
<form action="update_product.php" method="post" enctype="multipart/form-data">
	<div class="col-12 mt-5">
			<div class="card-body">
				<div class="form-group">
					<label class="col-form-label">Select category</label>
					<select class="form-control" name="category" selected>
					<?php while ($res_one=mysqli_fetch_object($query_one)){ ?>
					<option <?php if($res_one->id==$res->cat_id){echo "selected ";} ?> value="<?php echo $res_one->id;?>"><?php echo $res_one->category;?></option>
					<?php } ?>
					</select>
				</div>
					<div class="form-group">
						<label for="example-text-input" class="col-form-label">Product name</label>
						<input class="form-control" type="text" name="product_name" value="<?php echo $res->product;?>">
					</div>
					<div class="form-group">
						<label for="example-text-input" class="col-form-label">Price (in ₹ ) </label>
						<input class="form-control col-md-2" type="text" name="price" value="<?php echo $res->price;?>">
					</div>
						<div class="form-group">
							<label for="example-text-input" class="col-form-label">Description </label
							<div class="input-group mb-3">
								<textarea class="form-control" name="description"  aria-label="With textarea" Placeholder="Content..(Max 255 words)"><?php echo $res->description;?></textarea>
							</div>
						</div>	
						<div class="form-group mx-4">
						<label>File:</label>
						<input type="file" name="image">
						</div> 
						<div class="text-right">
							<input type="hidden"  value="<?php echo $res->image;?>" name="old_img">
							<input  type="hidden" name="user_id" value="<?php echo $res->product_id; ?>"><br><br>
							<button type="submit"  value="register"	class="btn btn-primary btn-lg mb-3">SUBMIT</button>
						</div>
			</div>		
	</div>
	</form>
<?php
	require_once('footer.php');
 ?>
 <?php }else{?>
	<h3><a href="login.php">Please Login To Access This Page</a></h3>
<?php } ?>	
	