<!-- Footer Section Begin -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-7">
                <div class="footer__about">
                    <div class="footer__logo">
                        <a href="./index.html" style="font-family:cookie;color:#666666;font-size:40px;margin:0;">FootwearSh</a>
                    </div>
                    <p></p>
                    <div class="footer__payment">
                        <a href="#"><img src="<?= base_url() ?>assets/img/payment/payment-1.png" alt=""></a>
                        <a href="#"><img src="<?= base_url() ?>assets/img/payment/payment-2.png" alt=""></a>
                        <a href="#"><img src="<?= base_url() ?>assets/img/payment/payment-3.png" alt=""></a>
                        <a href="#"><img src="<?= base_url() ?>assets/img/payment/payment-4.png" alt=""></a>
                        <a href="#"><img src="<?= base_url() ?>assets/img/payment/payment-5.png" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-5">
                <div class="footer__widget">
                    <h6>Quick links</h6>
                    <ul>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Blogs</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4">
                <div class="footer__widget">
                    <h6>Account</h6>
                    <ul>
                        <li><a href="#">My Account</a></li>
                        <li><a href="#">Orders Tracking</a></li>
                        <li><a href="#">Checkout</a></li>
                        <li><a href="#">Wishlist</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-8 col-sm-8">
                <div class="footer__newslatter">
                    <h6>NEWSLETTER</h6>
                    <form action="#">
                        <input type="text" placeholder="Email">
                        <button type="submit" class="site-btn">Subscribe</button>
                    </form>
                    <div class="footer__social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-youtube-play"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                <div class="footer__copyright__text">
                    <p>Copyright &copy; <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved</p>
                </div>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Search Begin -->
<div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch">+</div>
        <form class="search-model-form" method="GET" action="Catalog">
            <input type="text" id="search-input" name=keyword placeholder="Search here.....">
        </form>
    </div>
</div>
<!-- Search End -->

<!-- Js Plugins -->
<script src="<?= base_url() ?>assets/js/jquery-3.3.1.min.js"></script>
<script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.magnific-popup.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery-ui.min.js"></script>
<script src="<?= base_url() ?>assets/js/mixitup.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.countdown.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.slicknav.js"></script>
<script src="<?= base_url() ?>assets/js/owl.carousel.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.nicescroll.min.js"></script>
<script src="<?= base_url() ?>assets/js/main.js"></script>
<script type="text/javascript">
    $(".radio-checklist").on('click', function() {
        // in the handler, 'this' refers to the box clicked on
        var $box = $(this);
        if ($box.is(":checked")) {
            // the name of the box is retrieved using the .attr() method
            // as it is assumed and expected to be immutable
            var group = "input:checkbox[name='" + $box.attr("name") + "']";
            // the checked state of the group/box on the other hand will change
            // and the current value is retrieved using .prop() method
            $(group).prop("checked", false);
            $box.prop("checked", true);
        } else {
            $box.prop("checked", false);
        }

    });
</script>
</body>

</html>