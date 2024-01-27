<?php

// Required Config / Include Database, Auth
include "../../config/database.php";
include "../../classes/AuthClass.php";

session_start();

?>

<?php include "../../views/includes/doctype.php"; ?>

<head>
    <title>php-travelvn | trang chủ người dùng | v1.0</title>
    <?php include "../../views/includes/head-user.php"; ?>
</head>

<body page="index" id="bd-main-index">
    <?php include "../../views/includes/load.php"; ?>

    <article class="article" article-type="index">
        <?php include "../../views/includes/user/navbar.php"; ?>

        <!-- Section First Why TravelVN? -->
        <section class="section section-fr-why">
            <div class="container">
                <div class="row row-padding row-center">
                    <div class="col-element col-12 col-lg-3 col-md-6 col-sm-6">
                        <i class="bx bx-purchase-tag-alt"></i>
                        <p>Giá tốt với nhiều ưu đãi</p>
                    </div>
                    <div class="col-element col-12 col-lg-3 col-md-6 col-sm-6">
                        <i class="bx bxs-key"></i>
                        <p>Thanh toán an toàn</p>
                    </div>
                    <div class="col-element col-12 col-lg-3 col-md-6 col-sm-6">
                        <i class="bx bx-globe"></i>
                        <p>Luôn hoạt động 24/7</p>
                    </div>
                    <div class="col-element col-12 col-lg-3 col-md-6 col-sm-6">
                        <i class="bx bx-shield-quarter"></i>
                        <p>Thương hiệu uy tín</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section Promo -->
        <section class="section section-promo">
            <div class="container bg-light">
                <div class="row">
                    <div class="col-element col-12 col-lg-6 col-md-6 col-sm-6">
                        <div class="promo-content">
                            <h2>Về Chúng Tôi</h2>
                            <p class="text-block">Chúng tôi luôn mong muốn mang đến cho mọi người trải nghiệm tại Việt
                                Nam một khung cảnh đẹp và phong cách sống nơi đây.</p>
                        </div>
                    </div>
                    <div class="col-element col-12 col-lg-6 col-md-6 col-sm-6">
                        <img src="../../assets/img/promo-index.jpg" alt="img-promo" class="img-promo">
                    </div>
                </div>
            </div>
        </section>
    </article>

    <?php include "../../views/includes/footer-user.php"; ?>
</body>

</html>