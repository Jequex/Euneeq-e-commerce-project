<?php require_once "header.php";
require_once "classes.php";
require_once "functions.php";
global $PHP_SELF;
$connect = new Connection;
@$con = $connect->connection(); ?>
					<?php
					//if you choose a particular category
						if(isset($_GET['category'])){
							echo<<<o

							<!-- Category section -->
							<section class="category-section spad">
								<div class="container">
									<div class="row">
										<div class="col-lg-3 order-2 order-lg-1">
											<div class="filter-widget">
												<h2 class="fw-title">Categories</h2>
												<ul class="category-menu">
o;
$query = "SELECT * FROM categories";
								@$reos = $con->query($query);
								while(@$row = $reos->fetch_assoc()){
									echo <<<_e
										<li><a href="category.php?category=$row[Categories_ID]">$row[Category_Name]</a></li>
_e;
								}
								echo<<<o

								</ul>
								</div>
								<div class="filter-widget mb-0">
								</div>
							</div>
							<div class="col-lg-9  order-1 order-lg-2 mb-5 mb-lg-0">
								<div class="row">
o;
						@$row = $reos->fetch_assoc();
						@$Category = (int)sanitizeString($_GET['category']);
						$query1 = "SELECT * FROM products WHERE CategoryId = $Category ORDER BY ProductId ASC LIMIT 0,9";
						@$reos1 = $con->query($query1);
						while(@$row1 = $reos1->fetch_assoc()){
							$id = $row1['ProductId'];
							$Name = $row1['ProductName'];
							$product_details = $row1['ProductDetails'];
							$image = $row1['ProductImage'];
							$old_price = $row1['OldPrice'];
							$new_price = $row1['NewPrice'];
							$category = $row1['CategoryId'];
							$type = $row1['Types'];
							@$id = new product($id, $Name, $product_details, $image, $old_price, $new_price, $category, $type);
							@$id->display();
						}
						$querye = "SELECT * FROM categories";
						$reos3 = @$con->query($querye);
						$total_rows = $reos->num_rows;

						//if you want to access an undefined category
							if($_GET['category'] > $total_rows){header("location:category.php");}
							//if no catgory was selected
						}else{$query1 = "SELECT * FROM products ORDER BY ProductId ASC LIMIT 0,9";
							@$reos1 = $con->query($query1);
							while(@$row1 = $reos1->fetch_assoc()){
								$id = $row1['ProductId'];
								$Name = $row1['ProductName'];
								$product_details = $row1['ProductDetails'];
								$image = $row1['ProductImage'];
								$old_price = $row1['OldPrice'];
								$new_price = $row1['NewPrice'];
								$category = $row1['CategoryId'];
								$type = $row1['Types'];
								@$id = new product($id, $Name, $product_details, $image, $old_price, $new_price, $category, $type);
								if(isset($_GET['id'])){if(@$id->id = $_GET['id']){$id->display_all();}
							}else{
								echo<<<o
	
								<!-- Category section -->
								<section class="category-section spad">
									<div class="container">
										<div class="row">
											<div class="col-lg-3 order-2 order-lg-1">
												<div class="filter-widget">
													<h2 class="fw-title">Categories</h2>
													<ul class="category-menu">
o;
									$query = "SELECT * FROM categories";
									@$reos = $con->query($query);
									while(@$row = $reos->fetch_assoc()){
										echo <<<_e
											<li><a href="category.php?category=$row[Categories_ID]">$row[Category_Name]</a></li>
_e;
									}
									echo<<<o
	
									</ul>
									</div>
									<div class="filter-widget mb-0">
									</div>
								</div>
								<div class="col-lg-9  order-1 order-lg-2 mb-5 mb-lg-0">
									<div class="row">
o;
								@$id->display();}}
							}
					?>
					
	<?php
	?>
						

<?php  require_once "footer.php" ?>