<?php require_once "header.php"; ?>
<?php require_once "classes.php"; ?>
<?php require_once "functions.php";
if((!isset($_SESSION["Username"])) || ($_SESSION["Account_type"] != 'Admin')){
	die(header("location:index.php"));
}else{

?>

<?php
//adding a new category
if(isset($_POST['cat1'])){
	@$cat1 = sanitizeString($_POST['cat1']);
	$query = "SELECT * FROM categories WHERE Category_Name = '$cat1'";
	$connect = new Connection;
	@$con = $connect->connection();
	@$reos = $con->query($query);
	if($reos->num_rows >=1){echo "You cannot add a category twice";}
	else{
	$query = "INSERT INTO categories (Category_Name) values ('$cat1')";
	@$reos = $con->query($query);
	}
}
?>

<?php
//updating an old category
if(isset($_POST['update']) && isset($_POST['value1']) && isset($_POST['id'])){
	$string1 = sanitizeString($_POST['value1']);
	$string2 = $_POST['id'];
	$query = "UPDATE categories SET Category_Name='$string1' WHERE Categories_ID=$string2";
	$connect = new Connection;
	@$con = $connect->connection();
	@$reos = $con->query($query);
}

//deleting an old category
elseif(isset($_POST['delete']) && isset($_POST['value1']) && isset($_POST['id'])){
	@$string1 = sanitizeString($_POST['value1']);
	$string2 = $_POST['id'];
	$query = "DELETE FROM categories WHERE Categories_ID=$string2";
	$connect = new Connection;
	@$con = $connect->connection();
	@$reos = $con->query($query);
	if(!$reos){die("ERROR");}
}
?>

	<!-- cart section end -->
	<section class="cart-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="cart-table">
						<h3>Your Categories</h3>
						<div class="cart-table-warp">
							<table class="table-striped">
							<thead>
								<tr>
									<th class="quy-th"><h5>Category Name</h5></th>
									<th class="size-th"><!--<h5>Save</h5>--></th>
									<th class="total-th">
                                        <form action="" method="post">
											<input type="hidden" name="new_row" value="1">
                                            <button type="submit" class="site-btn submit-order-btn">Add Category</button>
                                        </form>
                                    </th>
								</tr>
							</thead>
							<tbody>
								<?php
								//viewing existing categories
								$query = "SELECT * FROM categories";
								$connect = new Connection;
								@$con = $connect->connection();
								@$reos = $con->query($query);
								while(@$row = $reos->fetch_assoc()){
									echo <<<_e
										<tr>
										<form action="" method="post">
											<input type="hidden" name="id" value="$row[Categories_ID]">
											<td class="quy-col">
													<div class="quantity">
															<input type="text" name="value1" value="$row[Category_Name]">
													</div>
											</td>
											<td class="size-col">
												<h4>
														<button type="submit" name="update" class="site-btn">Update</button>
												</h4>
											</td>
											<td class="size-col">
												<h4>
														<button type="submit" name="delete" class="site-btn">Delete</button>
												</h4>
											</td>
											</form>
										</tr>
_e;
								}
								?>
								<?php
								//creating a new category
									if(isset($_POST['new_row'])){
										echo<<< o
											<tr>
												<td class="quy-col">
													<form action="" method="post">
														<div class="quantity">
																<input type="text" name="cat1">
														</div>
												</td>
												<td class="size-col">
													<h4>
															<button type="submit" class="site-btn">Submit</button>
														</form>
													</h4>
												</td>
												<td></td>
											</tr>;
o;
										}
?>
							</tbody>
						</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- cart section end -->


<?php require_once "footer.php"; 
}
?>