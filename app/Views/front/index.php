<?= $this->extend('front/layout/main') ?>

<?= $this->section('content') ?>

<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="<?= base_url('assets/frontend/img/luces.png'); ?>" alt="">
							</div>
							<div class="shop-body">
								<h3>Luces</h3>
								<a href="#" class="cta-btn">Ver más  <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="<?= base_url('assets/frontend/img/aceites.png'); ?>" alt="">
							</div>
							<div class="shop-body">
								<h3>Aceites</h3>
								<a href="#" class="cta-btn">Ver más  <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="<?= base_url('assets/frontend/img/neumaticos.png'); ?>" alt="">
							</div>
							<div class="shop-body">
								<h3>Neumaticos</h3>
								<a href="#" class="cta-btn">Ver más  <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Nuevos Productos</h3>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12" style="margin-bottom: 60px;">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										<!-- product -->
										<?php foreach ($lastProducts as $key) : ?>
											<div class="product">
												<div class="product-img">
													<img src="<?= base_url('uploads/products/' . $key->image) ?>" alt="<?= $key->name ?>" style="height: 250px;">
												</div>
												<div class="product-body">
													<p class="product-category"><?= $key->category_name ?></p>
													<h3 class="product-name"><a href="<?= base_url(route_to('productPage', $key->id)) ?>"><?= $key->name ?></a></h3>
													<h4 class="product-price">$ <?= number_format($key->price, 0, '', '.') ?> </h4>
													
												</div>
												<div class="add-to-cart">
													<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Agregar al carro</button>
												</div>
											</div>
										<?php endforeach; ?>
										<!-- /product -->
									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<div class="section">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
					<img class="img-responsive" src="<?= base_url('assets/frontend/img/puerto-repuesto-home.jpg') ?>" alt="">
					</div>
				</div>
			</div>
		</div>

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title text-center">
							<h3 class="title">Top Ventas</h3>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12" style="margin-bottom: 60px;">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab2" class="tab-pane fade in active">
									<div class="products-slick" data-nav="#slick-nav-2">
										<!-- product -->
										<?php foreach ($bestSellerProducts as $key) : ?>
											<div class="product">
												<div class="product-img">
													<img src="<?= base_url('uploads/products/' . $key->image) ?>" alt="<?= $key->name ?>" style="height: 250px;">
												</div>
												<div class="product-body">
													<p class="product-category"><?= $key->category_name ?></p>
													<h3 class="product-name"><a href="<?= base_url(route_to('productPage', $key->id)) ?>"><?= $key->name ?></a></h3>
													<h4 class="product-price">$ <?= number_format($key->price, 0, '', '.') ?> </h4>
													
												</div>
												<div class="add-to-cart">
													<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Agregar al carro</button>
												</div>
											</div>
										<?php endforeach; ?>
										<!-- /product -->
									</div>
									<div id="slick-nav-2" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- /Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- SECTION -->



								<!-- /product widget -->

								<!-- product widget -->


								<!-- product widget -->

<?= $this->endSection() ?>