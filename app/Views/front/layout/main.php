<?php
	use App\Models\CategoriesModel;
		$category = new CategoriesModel();
		$categories = $category->getCategories()	
?>
<?php
	use App\Models\UsersModel;
		$user = new UsersModel();
		$users = $user->findAll();
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>PuertoRepuesto</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="<?= base_url('assets/frontend/css/bootstrap.min.css'); ?>"/>

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="<?= base_url('assets/frontend/css/slick.css'); ?>"/>
		<link type="text/css" rel="stylesheet" href="<?= base_url('assets/frontend/css/slick-theme.css'); ?>"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="<?= base_url('assets/frontend/css/nouislider.min.css'); ?>"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="<?= base_url('assets/frontend/css/font-awesome.min.css'); ?>">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="<?= base_url('assets/frontend/css/style.css'); ?>"/>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
	<body>
		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a><i class="fa fa-phone"></i>+569 12345678</a></li>
						<li><a><i class="fa fa-envelope-o"></i>correodelatienda@contacto.cl</a></li>
						<li><a><i class="fa fa-map-marker"></i>Direccion fisica de la tienda</a></li>
					</ul>

					<?php if (session()->get('is_logged')): ?>
						<ul class="header-links pull-right">
							<li><a href="<?= base_url(route_to('signout')); ?>"><i class="fa fa-close"></i> Cerrar sesion</a></li>
						</ul>
					<?php endif; ?>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="<?= base_url(route_to('homePage')) ?>" class="logo">
									<img src="<?= base_url('assets/frontend/img/logo1.png'); ?>" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form>
									<select class="input-select">
										<option value="" selected>Todo</option>
										<?php foreach ($categories as $key) : ?>				
											<option value="<?= $key->id ?>">
												<a href="<?= base_url(route_to('categoryPage', $key->id)) ?>"> <?= $key->name ?></a>
											</option>
										<?php endforeach; ?>	
									</select>
									<input class="input" placeholder="Busqueda...">
									<button class="search-btn">Buscar</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->
						
						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								<!-- Wishlist -->
								<?php
									$myAccountUrl = base_url(route_to('register'));
									$isLogged = session()->get('is_logged');

									if ($isLogged) {
										if (session()->get('role') == 'Customer') {
											$myAccountUrl = 'cliente';
										} else {
											$myAccountUrl = base_url(route_to('homeAdmin'));
										}
									}
								?>

								<div>
								<?php if (session()->get('is_logged')): ?>
									<a href="">
										<i class="fa fa-user"></i>
										<span> Esteban Barria </span>
									</a>
								<?php else: ?>
									<a href="<?= $myAccountUrl ?>">
										<i class="fa fa-user"></i>
										<span>Mi cuenta</span>
									</a>
								<?php endif; ?>

								</div>
								<!-- /Wishlist -->

								<!-- Cart -->
								<div class="dropdown">
									<a href="<?= base_url(route_to('cart')) ?>">
										<i class="fa fa-shopping-cart"></i>
										<span>Carrito</span>
									</a>
								</div>
								<!-- /Cart -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li><a href="<?= base_url(route_to('homePage')) ?>">Inicio</a></li>
						<?php foreach ($categories as $key) : ?>											
							<li><a href="<?= base_url(route_to('categoryPage', $key->id)) ?>"><?= $key->name ?></a></li>
						<?php endforeach; ?>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->

		<!-- SECTION -->
		<?= $this->renderSection('content') ?>

							</div>
						</div>
					</div>

				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- FOOTER -->
		<footer id="footer">
			<!-- top footer -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">

					<div class="col-md-4 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Categories</h3>
								<ul class="footer-links">
									<li><a href="#">Repuestos</a></li>
									<li><a href="#">Neumaticos</a></li>
									<li><a href="#">Baterías</a></li>
									<li><a href="#">Aceites</a></li>
									<li><a href="#">Iluminacion</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-4 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Nosotros</h3>
								<p>Breve palabras a cerca de la empresa</p>
								<ul class="footer-links">
									<li><a href="#"><i class="fa fa-map-marker"></i>Direccion fisica de la tienda</a></li>
									<li><a href="#"><i class="fa fa-phone"></i>+569 12345678</a></li>
									<li><a href="#"><i class="fa fa-envelope-o"></i>correodelatienda@contacto.cl</a></li>
								</ul>
							</div>
						</div>

						<div class="clearfix visible-xs"></div>

						<div class="col-md-4 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Informacion</h3>
								<ul class="footer-links">
									<li><a href="#">Acerca de</a></li>
									<li><a href="#">Contactanos</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /top footer -->

			<!-- bottom footer -->
			<div id="bottom-footer" class="section">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-12 text-center">
							<ul class="footer-payments">
								<li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
								<li><a href="#"><i class="fa fa-credit-card"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
							</ul>
							<span class="copyright">
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								PuertoRepuesto &copy;<script>document.write(new Date().getFullYear());</script>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</span>
						</div>
					</div>
						<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /bottom footer -->
		</footer>
		<!-- /FOOTER -->

		<!-- jQuery Plugins -->
		<script src="<?= base_url('assets/frontend/js/jquery.min.js'); ?>"></script>
		<script src="<?= base_url('assets/frontend/js/bootstrap.min.js'); ?>"></script>
		<script src="<?= base_url('assets/frontend/js/slick.min.js'); ?>"></script>
		<script src="<?= base_url('assets/frontend/js/nouislider.min.js'); ?>"></script>
		<script src="<?= base_url('assets/frontend/js/jquery.zoom.min.js'); ?>"></script>
		<script src="<?= base_url('assets/frontend/js/main.js'); ?>"></script>

	</body>
</html>
