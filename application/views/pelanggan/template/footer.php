<footer class="footer spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="footer__about">
                    <div class="footer__about__logo">
                        <a href="./index.html"><img src="<?= base_url('assets/produk/') ?>img/logo1.png" alt=""></a>
                    </div>
                    <ul>
                        <li>Address: Purwodadi, Kec. Trimurjo, Kabupaten Lampung Tengah, Lampung</li>
                        <li>Phone: +62 856-6993-2030</li>
                        <li>Email: sipppk@gmail.com</li>
                    </ul>
                </div>
            </div>
            <!-- <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                <div class="footer__widget">
                    <h6>Useful Links</h6>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">About Our Shop</a></li>
                        <li><a href="#">Secure Shopping</a></li>
                        <li><a href="#">Delivery infomation</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Our Sitemap</a></li>
                    </ul>
                    <ul>
                        <li><a href="#">Who We Are</a></li>
                        <li><a href="#">Our Services</a></li>
                        <li><a href="#">Projects</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Innovation</a></li>
                        <li><a href="#">Testimonials</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="footer__widget">
                    <h6>Join Our Newsletter Now</h6>
                    <p>Get E-mail updates about our latest shop and special offers.</p>
                    <form action="#">
                        <input type="text" placeholder="Enter your mail">
                        <button type="submit" class="site-btn">Subscribe</button>
                    </form>
                    <div class="footer__widget__social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</footer>
<!-- Footer Section End -->
<!-- Js Plugins -->
<script src="<?= base_url('assets/produk/') ?>js/jquery-3.3.1.min.js"></script>
<script src="<?= base_url('assets/produk/') ?>js/bootstrap.min.js"></script>
<script src="<?= base_url('assets/produk/') ?>js/jquery.nice-select.min.js"></script>
<script src="<?= base_url('assets/produk/') ?>js/jquery-ui.min.js"></script>
<script src="<?= base_url('assets/produk/') ?>js/jquery.slicknav.js"></script>
<script src="<?= base_url('assets/produk/') ?>js/mixitup.min.js"></script>
<script src="<?= base_url('assets/produk/') ?>js/owl.carousel.min.js"></script>
<script src="<?= base_url('assets/produk/') ?>js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $('.form-cart').on('click', function() {
        const cartId = $(this).data('cart');
        $.ajax({
            url: "<?= base_url('pelanggan/updatecart'); ?>",
            type: 'post',
            data: {
                cartId: cartId
            },
            success: function() {
                document.location.href = "<?= base_url('pelanggan/cart'); ?>";
            }
        });
    });
</script>
<script>
    function myFunction(el) {
        if (Number(el.value) > 3)
            document.getElementById('bttnsubmit').disabled = true,
            document.getElementById('demo').innerHTML = "";
        else
            document.getElementById('bttnsubmit').disabled = false,
            document.getElementById('demo').innerHTML = "Hello World";

    }
</script>
</body>

</html>