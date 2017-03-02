<!--<html>
 <head> 
 <link rel ="stylesheet" href ="css/bootstrap.mim.css">
 <link rel="stylesheet" href="css/font-awesome.min.css">
 <link rel="stylesheet" href="css/meanmenu.min.css"> 
 <link rel="stylesheet" href="css/responsive.css">
 <link rel="stylesheet" href="css/settings.css">
 <link rel="stylesheet" href="styles.css">

 <title> Customers </title> </head>

 <body>

 </body>
 <form>
       <input name ='cus_name' type ='text'>
       
       <input  type= 'submit' value = 'Search'>
</form>

</html>  -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home || Mi Rosha Fashion</title>
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
								<li><a><i class="fa fa-phone"></i>+2330244567890</a></li>
								<li><a href="#"><i class="fa fa-envelope-o"></i>support@mirosha.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-6">
						<div class="header_top_right text-right">
							<ul>
                                <li><a href="customer_page.php">Customers</a></li>
								<li><a href="#">Account</a></li>
								<li><a href="#">Wishlist</a></li>
								<li><a href="#">Register / Login</a></li>
								<li class="searchbox">
                                    <form>
									<input type="search" placeholder="Search..." name="search" class="searchbox-input" onkeyup="buttonUp();" required>
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

<form>
       <input font-color='black' name ='cus_name' type ='text'>
       
       <input  type= 'submit' value = 'Search'>
</form>

<?php

include_once("customers.php");
$obj = new customers();
echo "<table style='border:1px solid,padding:25px'> <tr>
<th> Name </th>
<th> Adress </th>
<th> Phone </th>
</tr>";
if (!isset($_REQUEST['search'])) {
    echo $_REQUEST['search'];
$list = $obj->getCustomers();
}
else {
    $name = $_REQUEST['search'];
    $list = $obj->getCustomer($name);
}
if (!$list) {
    echo "Could not get customers' data";
    exit();
}



 while (($data=$obj->fetch())!=false) {
  echo "<tr>
  <td> {$data['cname']} </td>
  <td> {$data['street']} </td>
  <td> {$data['phone']} </td>
  </tr>";
 }

 echo "</table>";
?>


	<!-- Compare-Ection-End  -->
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
							<p>MI ROSHA</p>
							<ul>
								<li><span>Addresss: </span>ipsum 125 Pall Mall, London, England</li>
								<li><span>Phone: </span>(0123) 345 6789</li>
								<li><span>Email: </span>info@mirosha.com</li>
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