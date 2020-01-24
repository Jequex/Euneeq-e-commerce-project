<?php require_once "header.php"; ?>
<?php require_once "classes.php"; ?>
<?php require_once "functions.php" ?>

<?php
//adding a new product

if(isset($_SESSION["Username"]->Username)){
	if($_SESSION["Username"]->Account_type == 'Admin'){

if(isset($_POST['name']) && isset($_POST['description']) && isset($_FILES['image'])
    && isset($_POST['OldPrice']) && isset($_POST['NewPrice']) && isset($_POST['Category'])){
    $broom1 = sanitizeString($_POST['name']);
    $broom2 = sanitizeString($_POST['description']);
    $broom3 = sanitizeString($_FILES['image']['name']);
    $broom4 = sanitizeString($_POST['OldPrice']);
    $broom5 = sanitizeString($_POST['NewPrice']);
    $broom6 = sanitizeString($_POST['Category']);
    $broom7 = sanitizeString($_POST['Types']);

        $query = "SELECT * FROM products WHERE ProductName = '$broom1'";
        $connect = new Connection;
        @$con = $connect->connection();
        @$reos = $con->query($query);
    if($reos->num_rows >=1){
        echo "You cannot add the same product twice";}
	else{
	    $query = "INSERT INTO products (ProductName, ProductImage, ProductDetails, NewPrice, OldPrice, CategoryId, Types) values 
			('$broom1', '$broom3', '$broom2', '$broom5', '$broom4', '$broom6', '$broom7')";
	$connect = new Connection;
    @$con = $connect->connection();
	@$reos = $con->query($query);
	if(!move_uploaded_file($_FILES['image']['tmp_name'],"img/product/".$_FILES['image']['name'])){die("Unsuccessful");}
    if(!$reos){die("ERROR".mysqli_error($con));}
	}
}



//updating an old category to be worked on
if(isset($_POST['update']) && isset($_POST['value1']) && isset($_POST['id'])){
	$string1 = sanitizeString($_POST['value1']);
	$string2 = $_POST['id'];
	$query = "UPDATE products SET Category_Name='$string1' WHERE Categories_ID=$string2";
	$connect = new Connection;
	@$con = $connect->connection();
	@$reos = $con->query($query);
}

//deleting an old product
elseif(isset($_POST['delete']) && isset($_POST['value1']) && isset($_POST['id'])){
	@$string1 = sanitizeString($_POST['value1']);
	$string2 = $_POST['id'];
	$query = "DELETE FROM products WHERE ProductId=$string2";
	$connect = new Connection;
	@$con = $connect->connection();
	@$reos = $con->query($query);
	if(!$reos){die("ERROR");}
}
	
echo <<<y

	<!-- cart section end -->
	<section class="cart-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="cart-table">
						<h3>Your Products</h3>
						<div>
							<table>
							<thead>
								<tr>
									<th class="quy-th"><h5>Products Name</h5></th>
									<th class="size-th"><h5>Product Description</h5></th>
                                    <th class="size-th"><h5>Product Image & Link</h5></th>
                                    <th class="size-th"><h5>Old Price</h5></th>
                                    <th class="size-th"><h5>New Price</h5></th>
                                    <th class="size-th"><h5>Category</h5></th>
                                    <th class="size-th"><h5>Type</h5></th>
									<th class="total-th">
                                        <form action="" method="post">
											<input type="hidden" name="new_row" value="1">
                                            <button type="submit" class="site-btn">Add New Product</button>
                                        </form>
                                    </th>
								</tr>
							</thead>
							<tbody>
y;
								
								$query = "SELECT * FROM products";
								$connect = new Connection;
								@$con = $connect->connection();
								@$reos = $con->query($query);
								while(@$row = $reos->fetch_assoc()){
									echo <<<_e
										<tr>
										<form action="" enctype="multipart/form-data" method="post">
											<input type="hidden" name="id" value="$row[ProductId]">
											<td class="quy-col">
													<div class="quantity">
															<input type="text" name="value1" value="$row[ProductName]">
													</div>
											</td>
											<td class="quy-col">
													<div class="quantity">
                                                        <textarea name="description" cols="20" rows="3">$row[ProductDetails]</textarea>
													</div>
											</td>
											<td class="quy-col">
													<div class="quantity">
														<img src="img/product/$row[ProductImage]" width="90" height="90">
                                                        <input type="file" name="image"></input>
													</div>
											</td>
											<td class="quy-col">
													<div class="quantity">
															<input type="text" name="value1" value="$row[OldPrice]">
													</div>
											</td>
											<td class="quy-col">
													<div class="quantity">
															<input type="text" name="value1" value="$row[NewPrice]">
													</div>
											</td>
											<td class="quy-col">
													<div class="quantity">
                                                    <select name="Category">
_e;
                                                            $query = "SELECT * FROM categories";
                                                            $connect = new Connection;
                                                            @$con = $connect->connection();
                                                            @$reos = $con->query($query);
                                                            while(@$row1 = $reos->fetch_assoc()){
																if($row['CategoryId']==$row1['Categories_ID']){
																	echo "<option value=\"$row[CategoryId]\" selected=\"selected\">$row1[Category_Name]</option>";
																}else{
                                                                echo "
																	<option value=\"$row1[Categories_ID]\">$row1[Category_Name]</option>";
																}
															}
															
                                                echo <<<_e
                                                    </select>
													</div>
											</td>
											<td class="quy-col">
													<div class="quantity"><select name="Types">
_e;
                                                        $query = "SELECT * FROM types";
                                                        $connect = new Connection;
                                                        @$con = $connect->connection();
                                                        @$reos = $con->query($query);
                                                        while(@$row3 = $reos->fetch_assoc()){
															if($row['Types']==$row3['Type_ID']){
																echo "<option value=\"$row3[Type_ID]\" selected=\"selected\">$row3[TypeName]</option>";
															}else{
                                                            echo "
                                                                <option value=\"$row3[Type_ID]\">$row3[TypeName]</option>";
														}
													}
                                                    echo <<<_e
                                                        </select>
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
								
									if(isset($_POST['new_row'])){
										echo<<< o
											<tr>
												<td class="quy-col">
													<form enctype="multipart/form-data" action="" method="post">
														<div class="quantity">
																<input type="text" name="name">
														</div>
												</td>
												<td class="quy-col">
													<form action="" method="post">
														<div class="quantity">
																<textarea name="description" cols="20" rows="3"></textarea>
														</div>
												</td>
												<td class="quy-col">
													<form action="" method="post">
														<div class="quantity">
																<input type="file" name="image">
														</div>
												</td>
												<td class="quy-col">
													<form action="" method="post">
														<div class="quantity">
																<input type="text" name="OldPrice">
														</div>
												</td>
												<td class="quy-col">
													<form action="" method="post">
														<div class="quantity">
																<input type="text" name="NewPrice">
														</div>
												</td>
												<td class="quy-col">
													<form action="" method="post">
														<div class="quantity">
                                                                <select name="Category">
o;
                                                                        $query = "SELECT * FROM categories";
                                                                        $connect = new Connection;
                                                                        @$con = $connect->connection();
                                                                        @$reos = $con->query($query);
                                                                        while(@$row = $reos->fetch_assoc()){
                                                                            echo "
                                                                                <option value=\"$row[Categories_ID]\">$row[Category_Name]</option>";
                                                                        }
echo <<<o
                                                                </select>
														</div>
												</td>
												<td class="quy-col">
													<form action="" method="post">
														<div class="quantity">
                                                                <select name="Types">
o;
                                                                        $query = "SELECT * FROM types";
                                                                        $connect = new Connection;
                                                                        @$con = $connect->connection();
                                                                        @$reos = $con->query($query);
                                                                        while(@$row = $reos->fetch_assoc()){
                                                                            echo "
                                                                                <option value=\"$row[Type_ID]\">$row[TypeName]</option>";
                                                                        }
echo <<<o
                                                                </select>
														</div>
												</td>
												<td class="size-col">
													<h4>
															<button type="submit" class="site-btn name="submit">Submit</button>
														</form>
													</h4>
												</td>
											</tr>;
o;
										}
										echo <<<o
							</tbody>
						</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- cart section end -->
o;
								}else{die(header("location:index.php"));}
}
								?>

<?php require_once "footer.php"; ?>