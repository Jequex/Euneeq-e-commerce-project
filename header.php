<?php require_once "classes.php";
if(!isset($_SESSION)){
	session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Euneeq | Quality Assured</title>
	<meta charset="UTF-8">
	<meta name="description" content=" Divisima | eCommerce Template">
	<meta name="keywords" content="divisima, eCommerce, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">


	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/flaticon.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css"/>
	<link rel="stylesheet" href="css/jquery-ui.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/animate.css"/>
	<link rel="stylesheet" href="css/style.css"/>


	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section -->
	<header class="header-section">
		<div class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 text-center text-lg-left">
						<!-- logo -->
						<a href="index.php" class="site-logo">
							<img src="img/logo1.png" alt="">
						</a>
					</div>
					<div class="col-xl-6 col-lg-5">
						<form class="header-search-form">
							<input type="text" placeholder="Search on euneeq ....">
							<button><i class="flaticon-search"></i></button>
						</form>
					</div>
					<div class="col-xl-4 col-lg-5">
						<div class="user-panel">
						<?php
								if(isset($_SESSION["Username"]) && $_SESSION["Username"] != ""){
									// die($_SESSION["Username"]);
									echo <<<o
									<div class="up-item">
									<i class="flaticon-profile"></i>
									<a href="Sign_in_page.php?sign_out=1">sign out</a>
								</div>
o
?>
<?php
								}
								else{
									echo "
								<div class=\"up-item\">
									<i class=\"flaticon-profile\"></i>
									<a href=\"Sign_in_page.php\">Sign In</a> or <a href=\"sign_up_page.php\">Create Account</a>
								</div>";
								}
						?>
							<div class="up-item">
								<div class="shopping-card">
									<i class="flaticon-bag"></i>
									<span><?php #code goes here for cart ?>0</span>
								</div>
								<a href="cart">Shopping Cart</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<nav class="main-navbar">
			<div class="container">
				<!-- menu -->
				<ul class="main-menu">
					<li><a href="index">Home</a></li>
					<li><a href="about">About Us</a></li>
					<li><a href="FAQs">FAQs</a></li>
					<li><a href="new">Arrivals
						<span class="new">New</span>
					</a></li>
					<li><a href="category">Categories</a>
						<ul class="sub-menu">
						<?php
								$query = "SELECT * FROM categories";
								$connect = new Connection;
								@$con = $connect->connection();
								@$reos = $con->query($query);
								while(@$row = $reos->fetch_assoc()){
									echo <<<_e
										<li><a href="category?$row[Categories_ID]">$row[Category_Name]</a></li>
_e;
								}
								?>
						</ul>
					</li>
					<?php

					if(isset($_SESSION["Username"])){
						if($_SESSION["Account_type"] == 'Admin'){
						echo "
							<li><a href=\"#\">Admin</a>
								<ul class=\"sub-menu\">
									<li><a href=\"products\">Add/Edit Products</a></li>
									<li><a href=\"category\">Delivered</a></li>
									<li><a href=\"cart\">Purchased</a></li>
									<li><a href=\"categories\">Add/Edit categories</a></li>
									<li><a href=\"admins\">Edit Admin List</a></li>
								</ul>
							</li>
							<li><a href=\"contact\">Messages</a></li>";
						}else{echo "
							<li><a href=\"contact\">Contact Us</a></li>";}
				}else{echo "
					<li><a href=\"contact\">Contact Us</a></li>";}
					?>
					<li><a href="#">Success Stories</a></li>
				</ul>
			</div>
		</nav>
	</header>
	<!-- Header section end -->
