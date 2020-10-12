    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-12">
    				<div class="breadcrumb__links">
    					<a href="<?= base_url() ?>"><i class="fa fa-home"></i> Home</a>
    					<span>Catalog</span>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-3 col-md-3">
    				<div class="shop__sidebar">
    					<form method="GET" action="Catalog">
    						<div class="sidebar__color">
    							<div class="section-title">
    								<h4>Gender</h4>
    							</div>

    							<div class="size__list color__list">
    								<label for="all">
    									All
    									<input class="radio-checklist" type="checkbox" name="gender" id="all" value='' <?= !isset($_GET['gender']) || !in_array($_GET['gender'], array('male', 'female'))  ? 'checked' : '' ?>>
    									<span class="checkmark"></span>

    								</label>

    								<label for="male">
    									Men
    									<input class="radio-checklist" type="checkbox" name="gender" id="male" value='male' <?= isset($_GET['gender']) && $_GET['gender'] == 'male'  ? 'checked' : '' ?>>
    									<span class="checkmark"></span>
    								</label>
    								<label for="female">
    									Women
    									<input class="radio-checklist" type="checkbox" name="gender" id="female" value='female' <?= isset($_GET['gender']) && $_GET['gender'] == 'female' ? 'checked' : '' ?>>
    									<span class="checkmark"></span>
    								</label>


    							</div>
    						</div>
    						<div class="sidebar__color">
    							<div class="section-title">
    								<h4>Categories</h4>
    							</div>
    							<div class="size__list color__list">

    								<?php
									foreach ($kategori as $k) {
										?>
    									<label for="<?= $k ?>">
    										<?= $k ?>
    										<input type="checkbox" name="category[]" id="<?= $k ?>" value='<?= $k ?>' <?= in_array($k, $fkategori) ? "checked" : '' ?>>
    										<span class="checkmark"></span>
    									</label>
    								<?php
									}
									?>

    							</div>
    						</div>
    						<div class="sidebar__filter">
    							<div class="section-title">
    								<h4>Price</h4>
    							</div>
    							<div class="filter-range-wrap">
    								<div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-min="0" data-max="10000000"></div>
    								<div class="range-slider">
    									<!-- <div class="price-input"> -->
    									Rp
    									<input type="text" name="min" id="minamount" value=<?= isset($fmin) ? $fmin : 0 ?> style="max-width:32%; margin-right:0px;border:none;"> ~
    									Rp
    									<input type="text" name="max" id="maxamount" value=<?= isset($fmax) ? $fmax : 0 ?> style="max-width:32%;border:none;">
    									<!-- </div> -->
    								</div>
    							</div>

    						</div>

    						<div class="sidebar__sizes">
    							<div class="section-title">
    								<h4>Size</h4>
    							</div>
    							<div class="size__list">
    								<div class="row" style="margin:0">

    									<?php
										foreach ($size as $k) {
											?>
    										<label class="col-lg-4 col-md-4 col-sm-4" for="<?= $k ?>">
    											<?= $k ?> <input type="checkbox" name="size[]" value="<?= $k ?>" id="<?= $k ?>" <?= in_array($k, $fsize) ? "checked" : '' ?>>
    											<span class="checkmark"></span>
    										</label>
    									<?php
										}
										?>

    								</div>
    							</div>
    						</div>
    						<div class="sidebar__color">
    							<div class="section-title">
    								<h4>Color</h4>
    							</div>
    							<div class="size__list color__list">
    								<?php
									$limitwarna = count($warna['name']);
									for ($i = 0; $i < $limitwarna; $i++) {
										?>
    									<label for="<?= $warna['name'][$i] ?>">

    										<span style=" background: <?= $warna['rgb'][$i] ?>; border: 1px solid #444444; border-radius: 10px; width:10px;height:10px;display:inline-block"></span>
    										<?= $warna['name'][$i] ?>

    										<input type="checkbox" name="color[]" value="<?= $warna['name'][$i] ?>" id="<?= $warna['name'][$i] ?>" <?= in_array($warna['name'][$i], $fwarna) ? "checked" : '' ?>>
    										<span class=" checkmark"></span>
    									</label>
    								<?php
									}
									?>
    							</div>
    						</div>
    						<input type="hidden" name="keyword" value="<?= !isset($keyword) ?: $keyword ?>">
    						<div style="">
    							<a href="<?= base_url() ?>Catalog" class="btn btn-secondary" style="font-size:14px;" style="position:relative;margin-top:10px;">Clear Filter</a>
    							<button class="btn btn-danger" style="font-size:14px;" type="submit" href="#" style="position:relative;margin-top:10px;">Show Result</button>
    						</div>
    					</form>
    				</div>
    			</div>
    			<div class="col-lg-9 col-md-9">
    				<div class="row">
    					<?php


						foreach ($sepatubytgl as $d) {
							$filter = 1;
							$temp = 0;
							if ($d['final_price'] > $fmin && $d['final_price'] < $fmax) {
								$temp++;
							}
							if (!empty($fgender)) {
								$filter++;
								if ($d['gender'] == $fgender) {
									$temp++;
								}
							}
							if (!empty($fkategori)) {
								$filter++;
								foreach ($d['categories'] as $k => $c) {
									if (in_array($c, $fkategori)) {
										$temp++;
									}
								}
							}
							if (!empty($fsize)) {
								$filter++;
								$tempsize = 0;
								foreach ($d['variants'] as $vari => $var) {
									foreach ($var['sizes'] as $size => $siz) {
										if (in_array($siz['size'], $fsize)) {
											$tempsize++;
										}
									}
								}
								$temp = ($tempsize > 1) ? $temp + 1 : $temp;
							}
							if (!empty($fwarna)) {
								$tempcolor = 0;
								$filter++;
								foreach ($d['colors'] as $col => $co) {
									if (in_array($co['name'], $fwarna)) {
										$tempcolor++;
									}
								}
								$temp = ($tempcolor > 0) ? $temp + 1 : $temp;
							}
							if (!empty($keyword)) {
								$tempkeyword = 0;
								$filter++;
								foreach ($arrkeyword as $kw) {
									if (strpos(strtolower($d['name']), strtolower($kw)) !== false) {
										$tempkeyword++;
									}
								}

								foreach ($d['colors'] as $col => $co) {
									if (in_array(strtolower($co['name']), $arrkeyword)) {
										$tempkeyword++;
									}
								}
								// print_r($tempkeyword);
								$temp = ($tempkeyword > 0) ? $temp + 1 : $temp;
							}

							// print_r($temp . '-' . $filter);

							if ($temp == $filter) {
								?>
    							<div class="col-lg-4 col-md-6">
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
													if ($d['created_at'] == $sepatubytgl[0]['created_at']) {
														?>
    											<div class=" label new">New</div>
    										<?php
													}
													if ($d['total_stock'] == 0) {
														?>
    											<div class="label stockout">out of stock
    											</div>
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
    										<h6><a href="<?= base_url() ?>Product?id=<?= $d['id'] ?>"><?= $d['name'] ?></a></h6>
    										<div class="rating">
    											<i class="fa fa-star"></i>
    											<i class="fa fa-star"></i>
    											<i class="fa fa-star"></i>
    											<i class="fa fa-star"></i>
    											<i class="fa fa-star"></i>
    										</div>
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
						}
						?>

    					<!-- <div class="col-lg-12 text-center">
    						<div class="pagination__option">
    							<a href="#">1</a>
    							<a href="#">2</a>
    							<a href="#">3</a>
    							<a href="#"><i class="fa fa-angle-right"></i></a>
    						</div>
    					</div> -->
    				</div>
    			</div>
    		</div>
    	</div>
    </section>
    <!-- Shop Section End -->

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