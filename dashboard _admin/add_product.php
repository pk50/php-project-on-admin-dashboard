<?php
	session_start();
	if(isset($_SESSION['user_id']) && $_SESSION['user_id']!=""){
	require_once('common.php'); ?>
	<p align="center" class="m-2">Welcome <?php echo $_SESSION['email'];?></p>
	<?php require_once('config.php');
	$select="SELECT * FROM `categories`";
	$query=mysqli_query($conn,$select);
 ?>
	<form action="insert_product.php" method="post" id="submit" enctype="multipart/form-data">
	<div class="col-12 mt-5">
			<div class="card-body">
				<div class="form-group">
					<label class="col-form-label">Select category</label>
					<select class="form-control" name="category">
					<?php while ($res=mysqli_fetch_assoc($query)){ ?>
					<option value="<?php echo $res['id'];?>"><?php echo $res['category'];?></option>
					<?php } ?>
					</select>
				</div>
					<div class="form-group">
						<label for="example-text-input" class="col-form-label">Product name</label>
						<input class="form-control" type="text" id="input_product" name="product_name" required>
						<p id="error_msg" class="text-danger"></p>
					</div>
					<div class="form-group">
						<label for="example-text-input" class="col-form-label">Price (in ₹ ) </label>
						<input class="form-control col-md-2" type="number" name="price" required>
					</div>
						<div class="form-group">
							<label for="example-text-input" class="col-form-label">Description </label
							<div class="input-group mb-3">
								<textarea class="form-control" name="description" aria-label="With textarea" Placeholder="Content..(Max 255 words)" required></textarea>
							</div>
						</div>	
						<div class="form-group mx-4">
						<label>File:</label>
						<input type="file" name="image" required>
						</div>  
						<div class="text-right">
							<button type="submit"  value="register"	class="btn btn-primary btn-lg mb-3">SUBMIT</button>
						</div>
			</div>		
	</div>
<script src="assets/js/jquery.min"></script>
<script>
	$(document).ready(function(){
		$("#submit").submit(function(){
			var name=$("#input_product").val();
			var flag=true;
			//alert(name);
			$.ajax({
				url:"search_product.php",
				data:"name="+name,/// "key"=+value, pair
				method:"post",
				datatype:"json",
				async:false,
				success:function(response){
					if (response == true) {
						//alert(13);
						$('#error_msg').text("product name exist! Try another");
						$('#input_product').val("");
						flag=false;
						//alert(flag);
					} 
				}
			});
			//alert(flag);
			return flag;
		});
	});
</script>
	</form>
<?php
	require_once('footer.php');
 ?>
 <?php }else{?>
	<h3><a href="login.php">Please Login To Access This Page</a></h3>
<?php } ?>