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
							<li><a href="#"><?= $product[0]->category_name ?></a></li>
							<li><a href="#"><?= $product[0]->name ?></a></li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->


		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Product main img -->
					<div class="col-md-5 col-md-push-2">
						<div id="product-main-img">
							<?php for($i = 0; $i < count($images); $i++) :?>
								<div class="product-preview">
									<img src="<?= base_url('uploads/products/' . $images[$i]->name); ?>" alt="">
								</div>
							<?php endfor; ?>
						</div>
					</div>
					<!-- /Product main img -->

					<!-- Product thumb imgs -->
					<div class="col-md-2  col-md-pull-5">
						<div id="product-imgs">
							<?php for($i = 0; $i < count($images); $i++) :?>
								<div class="product-preview">
									<img src="<?= base_url('uploads/products/' . $images[$i]->name); ?>" alt="">
								</div>
							<?php endfor; ?>
						</div>
					</div>
					<!-- /Product thumb imgs -->

					<!-- Product details -->
					<div class="col-md-5">
						<div class="product-details">
							<h2 class="product-name"><?= $product[0]->name ?></h2>
							<div>
								<h3 class="product-price">$ <?= number_format($product[0]->price, 0, '', '.') ?></h3>
								
							</div>
			

							<div class="add-to-cart">
								<div class="qty-label">
									Cantidad
									<div class="input-number">
										<input type="number" name="quantity" value="1">
										<span class="qty-up">+</span>
										<span class="qty-down">-</span>
									</div>
								</div>
								<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Agregar al carro</button>
							</div>
							<div>

								<h4 class="product-stock">Stock: <?= $product[0]->stock ?></h4>
								
							</div>

							<ul class="product-links">
								<li>Categoria:</li>
								<li><span class="badge badge-primary"><?= $product[0]->category_name ?></span></li>
							</ul>

							<ul class="product-links">
								<li>Compartir:</li>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram"></i></a></li>
	
							</ul>

						</div>
					</div>
					<!-- /Product details -->

					<!-- Product tab -->
					<div class="col-md-12">
						<div id="product-tab">
							<!-- product tab nav -->
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Descripcion</a></li>							
							</ul>
							<!-- /product tab nav -->

							<!-- product tab content -->
							<div class="tab-content">
								<!-- tab1  -->
								<div id="tab1" class="tab-pane fade in active">
									<div class="row">
										<div class="col-md-12">
											<p><?= $product[0]->description ?></p>
										</div>
									</div>
								</div>
								<!-- /tab1  -->

								<!-- tab2  -->
								<!-- /tab2  -->
							</div>
							<!-- /product tab content  -->
						</div>
					</div>
					<!-- /product tab -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->


		<!-- /Section -->

<?= $this->endSection() ?>