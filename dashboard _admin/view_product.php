<style>
	.success{
		color:blue;
	}
</style>
<?php  session_start(); ?>
<?php
		if(isset($_SESSION['user_id']) && $_SESSION['user_id']!=""){
		 require_once('common.php');
		 require_once('config.php');
		// $select="SELECT * FROM `products` ";
		$select="SELECT products.*,categories.category FROM products JOIN categories ON categories.id=products.cat_id";
		 $query=mysqli_query($conn,$select);
		// print_r($query);
		// $select="SELECT * FROM `categories`";
		 //$data=mysqli_query($conn,$select);
		 if(isset($_GET['success_msg']) && $_GET['success_msg']==2 ){?>
		<p class="success">User Deleted Successfully!!</p>
		<?php }
		if(isset($_GET['success_msg']) && $_GET['success_msg']==1 ){?>
		<p class="success">User Inserted Successfully!!</p>
		<?php }
		if(isset($_GET['success_msg']) && $_GET['success_msg']==3 ){?>
		<p class="success">User Updated Successfully!!</p>
		<?php }
		
    ?>
	<p align="center" class="m-2">Welcome <?php echo $_SESSION['email'];?></p>
     <div class="card">
            <div class="card-body">
                <table id="bootstrap-data-table" class="table table-bordered">
                	<thead class="thead-dark">
                    	<tr>
	                        <th>ID</th>
	                        <th>Category</th>
							<th>Product</th>
							<th>Price</th>
							<th>Description</th>
							<th>Image</th>
	                        <th colspan="2"> Action</th>
                      </tr>
                    </thead>
                <tbody>
					<?php
						$i=1;
						while($res=mysqli_fetch_assoc($query)){ ?>
						<tr>
							<td><?php  echo $i++ ;?></td>
							<td><?php  echo $res['category']; ?></td>
							<td><?php  echo $res['product'];?></td>
							<td><?php  echo $res['price'];?></td>
							<td><?php  echo $res['description'];?> </td>
							<td><img src="uploads/<?php echo $res['image'];?>" height="200" width="200"></td>
							<td>
							<a href="delete_product.php?user=<?php echo $res['product_id'];?>&&image=<?php echo $res['image'];?>" class="btn btn-danger mx-2">Delete</a>
							<a href="edit_product.php?user_id=<?php echo $res['product_id'];?>" class="btn btn-success mx-2">Edit</a>
							<a href="add_product.php" class="btn btn-primary mx-2">Add</a>
							</td>
						</tr>
						<?php }
					?> 
				</tbody>
                </table>
            </div>
        </div>
	</div>
</div>
<?php
	require_once('footer.php');
	?>
<?php }else{?>
	<h3><a href="login.php">Please Login To Access This Page</a></h3>
<?php } ?>	
				