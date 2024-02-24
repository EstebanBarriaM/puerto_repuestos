<?= $this->extend('front/layout/main') ?>

<?= $this->section('content') ?>

		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumb-tree">
							<li><a href="<?= base_url(route_to('homePage')) ?>">Inicio</a></li>
							<li><a href="#"><?= $category[0]->name ?></a></li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<!-- Section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- ASIDE -->
					<div id="aside" class="col-md-3">
						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">AUTOS</h3>
							<div class="checkbox-filter">

								<div class="input-checkbox">
									<input type="checkbox" id="category-1">
									<label for="category-1">
										<span></span>
										TERCEL
									</label>
								</div>
								<div class="input-checkbox">
									<input type="checkbox" id="category-1">
									<label for="category-1">
										<span></span>
										RIO JB
									</label>
								</div>

							</div>
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Precio</h3>
							<div class="price-filter">
								<div id="price-slider"></div>
								<div class="input-number price-min" value="10">
									<input id="price-min" type="number">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
								<span>-</span>
								<div class="input-number price-max">
									<input id="price-max" type="number">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
							</div>
						</div>
						<!-- /aside Widget -->

						<!-- /aside Widget -->
					</div>
					<!-- /ASIDE -->

					<!-- STORE -->
					<div id="store" class="col-md-9">
						<!-- store top filter -->
						<div class="store-filter clearfix">
							<div class="store-sort">
								<label>
									Ordenar por:
									<select class="input-select">
										<option value="0">Menor a Mayor</option>
										<option value="1">Mayor a Menor</option>
									</select>
								</label>
							</div>
						</div>
						<!-- /store top filter -->

						<!-- store products -->
						<div class="row">

						<?php foreach ($products as $key) : ?>
							<!-- product -->
							<div class="col-md-4 col-xs-6" style="margin-bottom: 60px;">
								<div class="product">
									<div class="product-img">
										<img src="<?= base_url('uploads/products/' . $key->image) ?>" alt="<?= $key->name ?>" style="height: 250px;">
									</div>
									<div class="product-body">
										<h3 class="product-name"><a href="#"> <?= $key->name ?> </a></h3>
										<h4 class="product-price">$ <?= number_format($key->price, 0, '', '.') ?> </h4>
										<div>
											<a class="btn btn-default" href="<?= base_url(route_to('productPage', $key->id)) ?>">Detalles</a>
										</div>
									</div>
									<div class="add-to-cart">
										<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Agregar al carro</button>
									</div>
								</div>
							</div>
							<!-- /product -->
						<?php endforeach; ?>
						</div>
						<!-- /store products -->

					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /Section -->

<?= $this->endSection() ?>