<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb__links">
					<a href="<?= base_url() ?>"><i class="fa fa-home"></i> Home</a>
					<a href="<?= base_url() ?>Catalog">Catalog </a>
					<span><?= $produk['name'] ?></span>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Breadcrumb End -->

<!-- Product Details Section Begin -->
<section class="product-details spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="product__details__pic">
					<div class="product__details__pic__left product__thumb nice-scroll">
						<?php
						$count = 0;
						foreach ($produk['variants'] as $vari => $var) {

							foreach ($var['thumbnail_urls'] as $thmb) {
								$count++;
								?>

								<a class="pt <?= $count == 1 ? 'active' : '' ?>" href="#product-<?= $count ?>">
									<img src="<?= $thmb ?>" alt="">
								</a>
						<?php
							}
						}
						?>

					</div>
					<div class="product__details__slider__content">
						<div class="product__details__pic__slider owl-carousel">
							<?php
							$count = 0;
							foreach ($produk['variants'] as $vari => $var) {

								foreach ($var['image_urls'] as $imghd) {
									$count++;
									?>
									<img data-hash="product-<?= $count ?>" class="product__big__img" src="<?= $imghd ?>" alt="">
							<?php
								}
							}
							?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="product__details__text">
					<h3><?= $produk['name'] ?> <span><?= $produk['brand_name'] ?></span></h3>
					<div class="rating">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<span>( 138 reviews )</span>
					</div>
					<?php
					if (strtotime($now) >= strtotime($produk['start_promo']) && strtotime($now) <= strtotime($produk['end_promo'])) {
						?>
						<div class="product__details__price">Rp <?= number_format($produk['promo_price'], 0, ".", ",") ?> <span> Rp <?= number_format($produk['price'], 0, ".", ",") ?></span></div>
					<?php
					} else {
						?>
						<div class="product__details__price">Rp <?= number_format($produk['price'], 0, ".", ",") ?></div>
					<?php
					}
					?>
					<!-- <div class="product__details__price">$ 75.0 <span>$ 83.0</span></div> -->

					<div class="row">
						<div class="col-lg-12">
							<h6 style="color: #666666;font-weight: 600;margin-bottom: 24px;">Details</h6>
						</div>
						<div class="col-lg-12">
							<div class="row" style="font-size: 14px;font-family:'Montserrat', sans-serif; color: #666666; font-weight: 400; line-height: 20px;margin-bottom:30px">
								<div class="col-lg-2" style="margin-bottom:15px">
									SKU
								</div>
								<div class="col-lg-1"> : </div>
								<div class="col-lg-3">
									<?= $produk['sku'] ?>
								</div>
								<div class="col-lg-2" style="margin-bottom:15px">
									Category
								</div>
								<div class="col-lg-1"> : </div>
								<div class="col-lg-3">
									<?php
									foreach ($produk['categories'] as $c) {
										echo $c;
									}
									?>
								</div>
								<div class="col-lg-2" style="margin-bottom:15px">
									Gender
								</div>
								<div class="col-lg-1"> : </div>
								<div class="col-lg-3" style="text-transform:capitalize;">
									<?= $produk['gender'] ?>
								</div>
								<div class="col-lg-2" style="margin-bottom:15px">
									Stok
								</div>
								<div class="col-lg-1"> : </div>
								<div class="col-lg-3">
									<?= $produk['total_stock'] ?>
								</div>
								<div class="col-lg-2" style="margin-bottom:15px">
									Material
								</div>
								<div class="col-lg-1"> : </div>
								<div class="col-lg-3" style="text-transform:capitalize;">
									<?= $produk['material_upper'] ?>
								</div>
								<div class="col-lg-2" style="margin-bottom:15px">
									Sole
								</div>
								<div class="col-lg-1"> : </div>
								<div class="col-lg-3" style="text-transform:capitalize;">
									<?= $produk['material_outer_sole'] ?>
								</div>
							</div>
						</div>
					</div>
					<div class="product__details__button">
						<div class="quantity">
							<span>Quantity:</span>
							<div class="pro-qty">
								<input type="text" value="1">
							</div>
						</div>
						<a href="#" class="cart-btn"><span class="icon_bag_alt"></span> Add to cart</a>
						<ul>
							<li><a href="#"><span class="icon_heart_alt"></span></a></li>
							<!-- <li><a href="#"><span class="icon_adjust-horiz"></span></a></li> -->
						</ul>
					</div>
					<input type='hidden' id="jsonstok" data-stok='<?= $produkjson ?>''>
					<div class="product__details__widget">
						<ul>
							<!-- <li>
								<span>Available stock :</span>
								<p id="stokcolor">4</p>
							</li> -->

							<li>
								<span>Available color :</span>
								<div class="color__checkbox">

									<?php
									$count = 0;
									foreach ($produk['variants'] as $vari => $var) {
										$count++;
										?>
										<label for=<?= $var['color']['name'] ?>>
											<input class="change-color-stock" type="radio" name="color__radio" id=<?= $var['color']['name'] ?> <?= $count == 1 ? 'checked' : '' ?>>
											<span class="checkmark" style="background:<?= $var['color']['rgb'] ?>"></span>
										</label>
									<?php
									}
									?>
								</div>
							</li>
							<li>
								<span>Available size :</span>
								<div class="size__btn">
									<?php
									$count = 0;
									foreach ($size as $s) {

										?>
										<label for="<?= $s ?>-btn" class="<?= $count == 1 ? 'active' : '' ?>">
											<input type="radio" id="<?= $s ?>-btn">
											<?= $s ?>
										</label>

									<?php

									}
									?>
								</div>
							</li>
							<li>
								<span>Promotions :</span>
								<p>Free shipping</p>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="product__details__tab">
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Description</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Reviews</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tabs-1" role="tabpanel">
							<h6>Description</h6>
							<p><?= $produk['description'] ?></p>
							
						</div>
						<div class="tab-pane" id="tabs-2" role="tabpanel">
							<h6>Reviews</h6>
							<span style="font-size:14px;font-weight:500">yip@gmail.com</span>
								<div class="rating" style="color:gold;">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
										
								</div>		
										
							<p>Top Markotop.</p>
							<span style="font-size:14px;font-weight:500">yip2@gmail.com</span>
								<div class="rating" style="color:gold;">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
										
								</div>		
										
							<p>Top Markotop.</p>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</section>
<!-- Product Details Section End -->

<!-- Instagram Begin -->
<div class="instagram">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-2 col-md-4 col-sm-4 p-0">
				<div class="instagram__item set-bg" data-setbg="<?= base_url() ?>assets/img/instagram/insta-1.jpg">
					<div class="instagram__text">
						<i class="fa fa-instagram"></i>
						<a href="#">@ footwearsh.id</a>
					</div>
				</div>
			</div>
			<div class="col-lg-2 col-md-4 col-sm-4 p-0">
				<div class="instagram__item set-bg" data-setbg="<?= base_url() ?>assets/img/instagram/insta-2.jpg">
					<div class="instagram__text">
						<i class="fa fa-instagram"></i>
						<a href="#">@ footwearsh.id</a>
					</div>
				</div>
			</div>
			<div class="col-lg-2 col-md-4 col-sm-4 p-0">
				<div class="instagram__item set-bg" data-setbg="<?= base_url() ?>assets/img/instagram/insta-3.jpg">
					<div class="instagram__text">
						<i class="fa fa-instagram"></i>
						<a href="#">@ footwearsh.id</a>
					</div>
				</div>
			</div>
			<div class="col-lg-2 col-md-4 col-sm-4 p-0">
				<div class="instagram__item set-bg" data-setbg="<?= base_url() ?>assets/img/instagram/insta-4.jpg">
					<div class="instagram__text">
						<i class="fa fa-instagram"></i>
						<a href="#">@ footwearsh.id</a>
					</div>
				</div>
			</div>
			<div class="col-lg-2 col-md-4 col-sm-4 p-0">
				<div class="instagram__item set-bg" data-setbg="<?= base_url() ?>assets/img/instagram/insta-5.jpg">
					<div class="instagram__text">
						<i class="fa fa-instagram"></i>
						<a href="#">@ footwearsh.id</a>
					</div>
				</div>
			</div>
			<div class="col-lg-2 col-md-4 col-sm-4 p-0">
				<div class="instagram__item set-bg" data-setbg="<?= base_url() ?>assets/img/instagram/insta-6.jpg">
					<div class="instagram__text">
						<i class="fa fa-instagram"></i>
						<a href="#">@ footwearsh.id</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Instagram End -->