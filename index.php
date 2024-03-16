<?php
ob_start();
session_start();
include("./back/includes/config.php");

$medicines = $db->prepare("SELECT * FROM medicines");
$medicines->execute();

$pharmesys = $db->prepare("SELECT id, username FROM users WHERE user_type='owner'");
$pharmesys->execute();

$medicine_types = $db->prepare("SELECT * FROM medicine_types WHERE status=1");
$medicine_types->execute();
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<?php
	include("./includes/css.php");
	?>

</head>

<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section -->
	<?php
	include("./includes/header.php");
	?>
	<!-- Header section end -->



	<!-- Hero section -->
	<section class="hero-section">
		<div class="hero-slider owl-carousel">
			<div class="hs-item set-bg" data-setbg="./img/slide1.jpg">
				<div class="container">
					<div class="row">
						<div class="col-xl-6 col-lg-7 text-white">
							<span>New Arrivals</span>
							<h2>E-Medicine</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
								ut labore et dolore magna aliqua. Quis ipsum sus-pendisse ultrices gravida. Risus
								commodo viverra maecenas accumsan lacus vel facilisis. </p>
							<a href="#" class="site-btn sb-line">DISCOVER</a>
							<a href="#" class="site-btn sb-white">ADD TO CART</a>
						</div>
					</div>
					<div class="offer-card text-white">
						<span>from</span>
						<h2>$29</h2>
						<p>SHOP NOW</p>
					</div>
				</div>
			</div>
			<div class="hs-item set-bg" data-setbg="./img/slide2.jpg">
				<div class="container">
					<div class="row">
						<div class="col-xl-6 col-lg-7 text-white">
							<span>New Arrivals</span>
							<h2>E-Medicine</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
								ut labore et dolore magna aliqua. Quis ipsum sus-pendisse ultrices gravida. Risus
								commodo viverra maecenas accumsan lacus vel facilisis. </p>
							<a href="#" class="site-btn sb-line">DISCOVER</a>
							<a href="#" class="site-btn sb-white">ADD TO CART</a>
						</div>
					</div>
					<div class="offer-card text-white">
						<span>from</span>
						<h2>$29</h2>
						<p>SHOP NOW</p>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="slide-num-holder" id="snh-1"></div>
		</div>
	</section>
	<!-- Hero section end -->

	<!-- Product filter section -->
	<section class="product-filter-section pt-5">
		<div class="container">
			<div class="section-title">
				<h2>LIST OF ALL PHARMACY</h2>
			</div>
			<ul class="product-filter-menu">
				<?php
				while($pharmesy = $pharmesys->fetchObject()){
					?>
					<li><a href="./medicines.php?phar=<?= $pharmesy->id ?>"><?= $pharmesy->username ?></a></li>
					<?php
				}
				?>
			</ul>


			<div class="section-title">
				<h2>BROWSE TOP SELLING MEDICINE</h2>
			</div>
			<ul class="product-filter-menu">
				<?php
				while($m_type = $medicine_types->fetchObject()){
					?>
					<li><a href="./medicines.php?type=<?= $m_type->id ?>"><?= $m_type->type ?></a></li>
					<?php
				}
				?>
			</ul>
			<div class="row justify-content-center">
				<?php
				if($medicines->rowCount() > 0){
					while($medicine = $medicines->fetchObject()){
						?>
						<div class="col-lg-3 col-sm-6">
							<div class="product-item">
								<div class="pi-pic">
									<a href="./medicine.php?id=<?= $medicine->id ?>">
										<img src="./back/uploads/<?= $medicine->img ?>" alt="">
									</a>
									<div class="pi-links">
										<?php
										if($medicine->quantity > 0){
											?>
											<a href="./act/cart.php?add=&medicine=<?= $medicine->id ?>" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
											<?php
										} else{
											?>
											<a href="#" class="add-card"><i class="flaticon-bag"></i><span>Not Availabele</span></a>
											<?php
										}
										?>
									</div>
								</div>
								<div class="pi-text">
									<h6>BDT <?= $medicine->price ?></h6>
									<p><?= $medicine->name ?></p>
								</div>
							</div>
						</div>
						<?php
					}
				} else{
					?>
						<div class="col-lg-3 col-sm-6">
							<div class="product-item">
								<div class="pi-pic">
									<img src="https://kristianjaker.files.wordpress.com/2014/08/barcode-item-not-found.jpg" alt="">
									<div class="pi-links">

									</div>
								</div>
							</div>
						</div>
					<?php
				}
				?>
			</div>
		</div>
	</section>
	<!-- Product filter section end -->

	<!-- Footer section -->
	<?php
	include("./includes/footer.php");
	?>
	<!-- Footer section end -->



	<!--====== Javascripts & Jquery ======-->
	<?php
	include("./includes/js.php");
	?>

</body>

</html>
