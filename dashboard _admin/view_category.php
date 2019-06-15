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
		 $select="SELECT * FROM `categories`";
		 $query=mysqli_query($conn,$select);
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
	                        <th>Category_Name</th>
	                        <th "column"="2"> Action</th>
                      </tr>
                    </thead>
                <tbody>
                    <?php
						$i=1;
						while($res=mysqli_fetch_assoc($query)){ ?>
						<tr>
							<td><?php  echo $i++ ;?></td>
							<td><?php  echo ucwords($res['category']); ?></td>
							<td><a href="delete.php?user_id=<?php echo $res['id'];?>" class="btn btn-primary mx-2">Delete</a>
<!--"javascript:;"><button type="submit" onclick="edit_category(<?php echo $res['id'] ?>)" class="btn btn-primary mx-2" data-toggle="modal" data-target="#edit_category">Edit</button></a>-->
								<a href="edit.php?user_id=<?php echo $res['id'];?>" class="btn btn-primary mx-2">Edit</a>
<!--delete_category.php?<?php echo 'id='.$res['id'] ;?>" onclick="return confirm('Do you want to delete <?php echo ucwords($res['category']) ?> ?')"><button type="submit" class="btn btn-primary ">Delete</button></a></td>-->
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