<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Search Results || Mi Rosha Fashion</title>
	<!-- All css Files Here -->
	<!-- fonts -->
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,500' rel='stylesheet' type='text/css'>
	<!-- bootstrap css -->
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<!-- fontawesome css -->
	<link rel="stylesheet" href="css/font-awesome.min.css" />
	<!-- revolution banner css settings -->
	<link rel="stylesheet" type="text/css" href="lib/rs-plugin/css/settings.css" media="screen" />
	<!-- style css -->
    <link rel="stylesheet" href="style.css">
	<!-- mobilemenu css -->
    <link rel="stylesheet" href="css/meanmenu.min.css"/>
	<!-- responsive css -->
    <link rel="stylesheet" href="css/responsive.css"/>
	<!-- favicon -->
    <link rel="shortcut icon" href="images/favicon.png" />
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	<!-- Header-Section-Strat  -->
	<header>
		<div class="container">
			<div class="header_top">
				<div class="row">
					<div class="col-md-6">
						<div class="header_top_left float-left">
							<ul class="social_icon">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
							<ul class="social_others">
								<li><a><i class="fa fa-phone"></i>+8801711223344</a></li>
								<li><a href="#"><i class="fa fa-envelope-o"></i>support@mirosha.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-6">
						<div class="header_top_right text-right">
							<ul>
								<li><a href="#">Account</a></li>
								<li><a href="#">Wishlist</a></li>
								<li><a href="#">Register / Login</a></li>
								<li class="searchbox">
								<form>
									<input type="search" placeholder="Search......" name="search" class="searchbox-input" onkeyup="buttonUp();" required>
									<input type="submit" class="searchbox-submit" value="">
								</form>
									<span class="searchbox-icon"><i class="fa fa-search"></i></span>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
			<div class="container">
				<div class="row mega_relative">
					<div class="col-xs-12 col-sm-2">
						<div class="logo head_lo">
							<a href="index.html"><img src="images/logo.png" alt="Logo" /></a>
						</div>
					</div>
					<div class="col-sm-10">
						<div class="mainmenu float-right">
							<nav>
								<ul>
									<li><a href="index.html">HOME</a></li>
									<li><a href="employees_page.php">OUR EMPLOYEES</a></li>
									<li><a href="customer_page.php">Our CUSTOMERS</a></li>
									<li><a href="contact.html">CONTACT</a></li>
									<li class="shop_icon">
										<a href="cart.html"><img src="images/menu_icon_img.png" alt="" /></a>
										<span>10</span>
									</li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</div>
	</header>
	<!-- mobile-menu-area start -->
	<div class="mobile-menu-area">
		<div class="container">
			<div class="mobile-menu">
				<nav id="dropdown">
					<ul>
						<li><a href="index.html">HOME</a></li>
						<li><a href="contact.html">CONTACT</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
	<!-- mobile-menu-area end -->
	<!-- Header-Section-End  -->
	<!-- Cart-Page-Content-Start -->
	<div class="cart-page-content page-section-padding">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="cart_title">
						<h4>Search Results</h4>
					</div>
					<div class="table-responsive">
						<table class="cart-table text-center">
							<thead>
								<tr id="cart_th">
									<th>#</th>
									<th>Image</th>
									<th>Product name</th>
									<th>QUANTITY</th>
									<th>Price</th>
									<th>Total</th>
									<th>Remove</th>
								</tr>
							</thead>
							<tbody>
								<tr>


<?php

									include_once "parts.php";
	$parts = new parts();


	$pno = "";
	$pname="";
	$qoh="";
	$price="";
	$olevel="";
	
	//2) Call the object's getParts method and check for error
	if (!$parts->getParts()){
		echo "error getting Items";
	}
	//check if there is any thing in the textbox
	else if(isset($_REQUEST['search'])){
		//call the database and check if the patient exists
		$search = $_REQUEST['search'];
		$result=$parts->searchParts($search);
	}
	
	// create an increment to change the value of modal and button each time the table loops				
	$I=0;
	// else if the search textbox is empty dispay all Parts in a table form
	while($row=$parts->fetch()){
          //$pno,$pname,$qoh,$price,$olevel,$nationality,$insurance_type,
          //$dob,$group,$phone_number,$email, update button
	$I=$I+1;
		echo"<tr><td style = 'background-color: white '>{$row["pno"]}</td>
				<td style = 'background-color: white '></td>
				<td style = 'background-color: white '>{$row["pname"]}</td>
				<td style = 'background-color: white '>{$row["qoh"]}</td>
				<td style = 'background-color: white '>{$row["price"]}</td>
			   	<td style = 'background-color: white '>{$row["olevel"]}</td>
				<td style = 'background-color: white '><a class='checkPageBtn' href='cart.html'>Add</a>
									</td>" ;
			}
?>
						<!--			<td>1</td>
									<td>
										<a href="#"><img alt="" class="img-responsive" src="images/cartpage/cart-product-1.png"></a>
									</td>
									<td>
										<h6><a href="#">Lorem ipsum dolor sit amet,</a></h6>
									</td>
									<td>
										<form id="qua_in" action="action_page.php">
											<input type="number" value="1" name="quantity" min="1" max="5">
										</form>
									</td>
									<td>
										<div class="cart-price">$104.99</div>
									</td>
									<td>
										<div class="cart-subtotal">$104.99</div>
									</td>
									<td><i class="fa fa-trash"></i></td>
								</tr>
								<tr>
									<td>2</td>
									<td>
										<a href="#"><img alt="" class="img-responsive" src="images/cartpage/cart-product-2.png"></a>
									</td>
									<td>
										<h6><a href="#">Lorem ipsum dolor sit amet,</a></h6>
									</td>
									<td>
										<form id="qua_in_2" action="action_page.php">
											<input type="number" value="1" name="quantity" min="1" max="10">
										</form>
									</td>
									<td>
										<div class="cart-price">$85.99</div>
									</td>
									<td>
										<div class="cart-subtotal">$85.99</div>
									</td>
									<td><i class="fa fa-trash"></i></td>
								</tr>
								<tr id="total_colspan">
									<td colspan="3" class="text-left">total</td>
									<td>
										2
									</td>
									<td>
										190.98$
									</td>
								-->
									<!-- <td colspan="2">
										<a class="checkPageBtn" href="cart.html">Add</a>
									</td -->>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div> 
	<!-- Cart-Page-Content-End -->
	<!-- Footer-Section-Start -->
	<footer>
		<div class="footer_top footer-padding">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-sm-6">
						<div class="newsletter">
							<h4>Sign up for newSletter</h4>
						</div>
					</div>
					<div class="col-sm-12 col-sm-6">
						<div class="newsletter text-right">
							<input class="news_input" type="text" value="" placeholder="Email Address"/>
							<input class="subscribe_btn" type="button" value="subscribe"/>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer_middel footer-padding">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-md-3">
						<div class="footer_link address">
							<p>Elixir fashion</p>
							<ul>
								<li><span>Addresss: </span>ipsum 125 Pall Mall, London, England</li>
								<li><span>Phone: </span>(0123) 345 6789</li>
								<li><span>Email: </span>info@domain.com</li>
							</ul>
						</div>
						<div class="footer_icon">
							<ul>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="footer_link">
							<p>My account</p>
							<ul>
								<li><a href="#">My Account</a></li>
								<li><a href="cart.html">Shopping Cart</a></li>
								<li><a href="#">My Wishlist</a></li>
								<li><a href="#">My Credit Slip</a></li>
								<li><a href="#">Account Information</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="footer_link res_mar">
							<p>customer support</p>
							<ul>
								<li><a href="#">7/24 Hour Support</a></li>
								<li><a href="#">Refound Policy</a></li>
								<li><a href="#">Shipping Guide</a></li>
								<li><a href="#">International Shipping</a></li>
								<li><a href="#">Career</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="footer_link res_mar">
							<p>information</p>
							<ul>
								<li><a href="#">About Our Shop</a></li>
								<li><a href="#">Secure Shopping</a></li>
								<li><a href="#">Delivery Information</a></li>
								<li><a href="#">Company Site Map</a></li>
								<li><a href="#">Privecy Policy</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer_bottom footer-padding">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-xs-12">
						<div class="copyright">
							<p>Copyright 2015 <a href="http://designscrazed.org/">Allie</a> All rights reserved</p>
						</div>
					</div>
					<div class="col-sm-6 col-xs-12">
						<div class="copyright_icon text-right">
							<a href="#"><img src="images/footer/paypal-1.png" alt="" /></a>
							<a href="#"><img src="images/footer/paypal-2.png" alt="" /></a>
							<a href="#"><img src="images/footer/paypal-3.png" alt="" /></a>
							<a href="#"><img src="images/footer/paypal-4.png" alt="" /></a>
							<a href="#"><img src="images/footer/paypal-5.png" alt="" /></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- Footer-Section-End -->
	<!-- All js Files Here -->
	<!-- jquery-1.11.3 -->
    <script src="js/jquery-1.11.3.min.js"></script>
	<!-- bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
	<!-- revolution js -->
	<script type="text/javascript" src="lib/rs-plugin/js/jquery.themepunch.tools.min.js"></script>   
	<script type="text/javascript" src="lib/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<script src="lib/rs-plugin/rs.home.js"></script>
	<!-- search-box js -->
    <script src="js/search-box.js"></script>
	<!-- scrollUp js -->
    <script src="js/jquery.scrollUp.js"></script>
	<!-- mobilemenu js -->
    <script src="js/jquery.meanmenu.js"></script>
	<!-- main js -->
    <script src="js/main.js"></script>
  </body>
</html>