<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Shoesmart">
    <meta name="keywords" content="shoesmart, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shoesmart</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__close">+</div>
        <ul class="offcanvas__widget">
            <li><span class="icon_search search-switch"></span></li>
            <li><a href="#"><span class="icon_heart_alt"></span>
                    <div class="tip">2</div>
                </a></li>
            <li><a href="#"><span class="icon_bag_alt"></span>
                    <div class="tip">2</div>
                </a></li>
        </ul>
        <div class="offcanvas__logo">
            <a href="./index.html"><img src="<?= base_url() ?>assets/img/logo.png" alt=""></a>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__auth">
            <a href="#">Login</a>
            <a href="#">Register</a>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-2">
                    <div class="header__logo" style="padding:10px 0">
                        <a href="./index.html" style="font-family:cookie;color:#666666;font-size:40px;margin:0;">FootwearSh</a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-7">
                    <nav class="header__menu" style="text-align:center;">
                        <ul>
                            <?php
                            $hal = $this->uri->segment(1);
                            ?>
                            <li <?= ($hal == '' || $hal == '#') ? "class='active'" : "" ?>><a style="text-transform:capitalize;" href="<?= base_url() ?>">Home</a></li>
                            <li <?= ($hal == 'Catalog' || $hal == 'Product') ? "class='active'" : "" ?>><a style="text-transform:capitalize;" href="<?= base_url() ?>Catalog">Catalog</a></li>
                            <li><a style="text-transform:capitalize;" href="<?= base_url() ?>Catalog?gender=female">Women's</a></li>
                            <li><a style="text-transform:capitalize;" href="<?= base_url() ?>Catalog?gender=male">Men's</a></li>
                            <!-- <li><a href="./shop.html">Kid's</a></li> -->
                            <!-- <li><a href="#">Pages</a>
                                <ul class="dropdown">
                                    <li><a href="./product-details.html">Product Details</a></li>
                                    <li><a href="./shop-cart.html">Shop Cart</a></li>
                                    <li><a href="./checkout.html">Checkout</a></li>
                                    <li><a href="./blog-details.html">Blog Details</a></li>
                                </ul>
                            </li> -->
                            <!-- <li><a href="./blog.html">Blog</a></li> -->
                            <li><a style="text-transform:capitalize;" href="./contact.html">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__right" style="padding-right:20px">
                        <div class="header__right__auth">
                            <a href="#">Login</a>
                            <a href="#">Register</a>
                        </div>
                        <ul class="header__right__widget">
                            <li><span class="icon_search search-switch"></span></li>
                            <li><a href="#"><span class="icon_heart_alt"></span>
                                    <div class="tip">2</div>
                                </a></li>
                            <li><a href="#"><span class="icon_bag_alt"></span>
                                    <div class="tip">2</div>
                                </a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="canvas__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->