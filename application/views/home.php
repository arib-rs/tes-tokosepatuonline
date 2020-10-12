<!-- Categories Section Begin -->
<section class="categories">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6 p-0">
				<div class="categories__item categories__large__item set-bg" data-setbg="<?= base_url() ?>assets/img/categories/category-1.jpg">
					<div class="categories__text " style="padding:20px 100px 20px 0px;background: rgb(255,255,255);background: radial-gradient(circle, rgba(255,255,255,1) 0%, rgba(2,0,36,0) 80%);">
						<h1>Hi, our Solemate</h1>
						<p>Get your stylish shoes, get watched and be trendsetter.</p>
						<a href="<?= base_url() ?>Catalog">Get now</a>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 p-0">
						<div class="categories__item set-bg" style="box-shadow : #fff inset 200px 0px 70px " data-setbg="<?= base_url() ?>assets/img/categories/category-2.jpg">
							<div class="categories__text">
								<h4>Men’s</h4>
								<p><?= $men ?> items</p>
								<a href="<?= base_url() ?>Catalog?gender=male">Shop now</a>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 p-0">
						<div class="categories__item set-bg" style="box-shadow : #fff inset 200px 0px 70px " data-setbg="<?= base_url() ?>assets/img/categories/category-3.jpg">
							<div class="categories__text">
								<h4>Sandals</h4>
								<p><?= $sandals ?> items</p>
								<a href="<?= base_url() ?>Catalog?category=Sandals">Shop now</a>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 p-0">
						<div class="categories__item set-bg" style="box-shadow : #fff inset 200px 0px 70px " data-setbg="<?= base_url() ?>assets/img/categories/category-4.jpg">
							<div class="categories__text">
								<h4>Women’s</h4>
								<p><?= $women ?> items</p>
								<a href="<?= base_url() ?>Catalog?gender=female">Shop now</a>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 p-0">
						<div class="categories__item set-bg" style="box-shadow : #fff inset 200px 0px 70px " data-setbg="<?= base_url() ?>assets/img/categories/category-5.jpg">
							<div class="categories__text">
								<h4>Sneakers</h4>
								<p><?= $sneakers ?> items</p>
								<a href="<?= base_url() ?>Catalog?category=Sneakers">Shop now</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Categories Section End -->

<!-- Product Section Begin -->
<section class="product spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-4">
				<div class="section-title">
					<h4>New product</h4>
				</div>
			</div>
			<div class="col-lg-8 col-md-8">
				<ul class="filter__controls">
					<li class="active" data-filter="*">All</li>
					<?php
					foreach ($kategori as $d) {
						?>
						<li data-filter=".<?= $d ?>"><?= $d ?></li>
					<?php
					}
					?>
				</ul>
			</div>
		</div>
		<div class="row property__gallery">
			<?php
			$tempkat = '';
			foreach ($newproduct as $d) {
				foreach ($d['categories'] as $k => $c) {
					$tempkat = $c;
				}
				?>

				<div class="col-lg-3 col-md-4 col-sm-6 mix <?= $tempkat ?>">
					<div class="product__item">
						<div class="product__item__pic set-bg" data-setbg="<?= $d['image_url'] ?>">

							<div style="float:right; margin:10px 15px;">
								<?php
									foreach ($d['variants'] as $vari => $var) {
										?>
									<a class="change-color" data-bg="<?= $var['thumbnail_urls'][0] ?>" style="cursor:pointer; background: <?= $var['color']['rgb'] ?>; border: 1px solid #444444; border-radius: 5px; width:15px;height:15px;display:inline-block"></a>
								<?php
									}
									?>
							</div>
							<?php
								if ($d['created_at'] == $newproduct[0]['created_at']) {
									?>
								<div class="label new">New</div>
							<?php
								}
								if ($d['total_stock'] == 0) {
									?>
								<div class="label stockout">out of stock</div>
							<?php
								}
								?>



							<ul class="product__hover">
								<li><a href="<?= $d['image_url'] ?>" class="image-popup"><span class="arrow_expand"></span></a></li>
								<li><a href="#"><span class="icon_heart_alt"></span></a></li>
								<?= ($d['total_stock'] == 0) ? '' : "<li><a href='#'><span class='icon_bag_alt'></span></a></li>" ?>
							</ul>
						</div>
						<div class="product__item__text">
							<h5><a href="#"><?= $d['name'] ?></a></h5>
							<h6><a href="#"><?= $d['brand_name'] ?></a></h6>

							<!-- <h6><a href="#"><?= $d['created_at'] ?></a></h6> -->
							<!-- <div class="rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
							</div> -->

							<?php
								if (strtotime($now) >= strtotime($d['start_promo']) && strtotime($now) <= strtotime($d['end_promo'])) {
									?>
								<div class="product__price">Rp <?= number_format($d['promo_price'], 0, ".", ",") ?> <span>Rp <?= number_format($d['price'], 0, ".", ",") ?></span></div>
							<?php
								} else {
									?>
								<div class="product__price">Rp <?= number_format($d['price'], 0, ".", ",") ?></div>
							<?php
								}
								?>
						</div>
					</div>
				</div>
			<?php
			}
			?>

		</div>
	</div>
</section>
<!-- Product Section End -->

<!-- Banner Section Begin -->
<section class="banner set-bg" data-setbg="<?= base_url() ?>assets/img/banner/banner-1.jpg">
	<div class="container">
		<div class="row">
			<div class="col-xl-7 col-lg-8 m-auto">
				<div class="banner__slider owl-carousel">
					<?php
					foreach ($kategorifull as $d) {
						?>
						<div class="banner__item">
							<div class="banner__text">
								<span>Our Footwear Categories</span>
								<h1><?= $d ?></h1>
								<a href="<?= base_url() ?>Catalog?category[]=<?= $d ?>">Shop now</a>
							</div>
						</div>
					<?php
					}
					?>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Banner Section End -->

<!-- Trend Section Begin -->
<section class="trend spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="trend__content">
					<div class="section-title">
						<h4>Best Seller</h4>
					</div>
					<div class="row">
						<?php
						foreach ($bestseller as $d) {
							?>
							<div class="trend__item col-lg-4">
								<div class="trend__item__pic">
									<img height='200px' src="<?= $d['image_url'] ?>" alt="">
								</div>
								<div class="trend__item__text">
									<h5><?= $d['name'] ?></h5>
									<?=
											($d['total_stock'] == 0) ? "<h6 class='badge badge-warning'>Out of Stock</h6>" : '';
										?>

									<!-- <h5><?= $d['total_stock'] ?></h5> -->
									<!-- <div class="rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div> -->
									<?php
										if (strtotime($now) >= strtotime($d['start_promo']) && strtotime($now) <= strtotime($d['end_promo'])) {
											?>
										<div class="product__price">Rp <?= number_format($d['promo_price'], 0, ".", ",") ?> <span>Rp <?= number_format($d['price'], 0, ".", ",") ?></span></div>
									<?php
										} else {
											?>
										<div class="product__price">Rp <?= number_format($d['price'], 0, ".", ",") ?></div>
									<?php
										}
										?>
								</div>
							</div>
						<?php
						}
						?>
					</div>
				</div>
			</div>

		</div>
	</div>
</section>
<!-- Trend Section End -->

<!-- Discount Section Begin -->
<!-- <section class="discount">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 p-0">
				<div class="discount__pic">
					<img src="<?= base_url() ?>assets/img/discount.jpg" alt="">
				</div>
			</div>
			<div class="col-lg-6 p-0">
				<div class="discount__text">
					<div class="discount__text__title">
						<span>Discount</span>
						<h2>Summer 2019</h2>
						<h5><span>Sale</span> 50%</h5>
					</div>
					<div class="discount__countdown" id="countdown-time">
						<div class="countdown__item">
							<span>22</span>
							<p>Days</p>
						</div>
						<div class="countdown__item">
							<span>18</span>
							<p>Hour</p>
						</div>
						<div class="countdown__item">
							<span>46</span>
							<p>Min</p>
						</div>
						<div class="countdown__item">
							<span>05</span>
							<p>Sec</p>
						</div>
					</div>
					<a href="#">Shop now</a>
				</div>
			</div>
		</div>
	</div>
</section> -->
<!-- Discount Section End -->

<!-- Services Section Begin -->
<!-- <section class="services spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-4 col-sm-6">
				<div class="services__item">
					<i class="fa fa-car"></i>
					<h6>Free Shipping</h6>
					<p>For all oder over $99</p>
				</div>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-6">
				<div class="services__item">
					<i class="fa fa-money"></i>
					<h6>Money Back Guarantee</h6>
					<p>If good have Problems</p>
				</div>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-6">
				<div class="services__item">
					<i class="fa fa-support"></i>
					<h6>Online Support 24/7</h6>
					<p>Dedicated support</p>
				</div>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-6">
				<div class="services__item">
					<i class="fa fa-headphones"></i>
					<h6>Payment Secure</h6>
					<p>100% secure payment</p>
				</div>
			</div>
		</div>
	</div>
</section> -->
<!-- Services Section End -->

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