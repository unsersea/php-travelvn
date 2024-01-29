<?php

// Required Config / Include Database, Auth
include "../../config/database.php";
include "../../classes/AuthClass.php";
// Include Tour / Location
include "../../classes/TourClass.php";
include "../../classes/LocationClass.php";

session_start();

?>

<?php include "../../views/includes/doctype.php"; ?>

<head>
    <title>php-travelvn | trang sản phẩm người dùng | v1.0</title>
    <?php include "../../views/includes/head-user.php"; ?>
</head>

<body page="tour" id="bd-main-tour">
    <?php include "../../views/includes/load.php"; ?>

    <article class="article" article-type="tour">
        <?php include "../../views/includes/user/navbar.php"; ?>

        <section class="section section-tour">
            <div class="container">
                <div class="row row-padding">
                    <div class="col-12 col-lg-4 col-md-12 col-sm-12">
                        <h5 class="title-search">Tìm Kiếm</h5>
                        <hr class="hr-line">
                        <div class="div-form">
                            <form method="POST" class="form-multiple-search-tour" enctype="multipart/form-data">
                                <div class="field-modal">
                                    <label class="form-label">Theo Giá Tiền</label>
                                    <div class="form-check">
                                        <label class="form-check-label" for="check-price1">
                                            <input type="checkbox" class="form-check-input" name="option-price1" id="check-price1">
                                            <span>0 - 1.000.000</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label" for="check-price2">
                                            <input type="checkbox" class="form-check-input" name="option-price2" id="check-price2">
                                            <span>1.000.000 - 3.000.000</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label" for="check-price3">
                                            <input type="checkbox" class="form-check-input" name="option-price3" id="check-price3">
                                            <span>3.000.000 - 5.000.000</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label" for="check-price4">
                                            <input type="checkbox" class="form-check-input" name="option-price4" id="check-price4">
                                            <span>5.000.000 - 10.000.000</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label" for="check-price5">
                                            <input type="checkbox" class="form-check-input" name="option-price5" id="check-price5">
                                            <span>< 10.000.000</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="field-modal">
                                    <label class="form-label">Theo Tên</label>
                                    <input type="text" name="title" class="form-control" placeholder="Tìm Kiếm">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-12 col-lg-8 col-md-12 col-sm-12">
                        
                    </div>
                </div>
            </div>
        </section>
    </article>

    <?php include "../../views/includes/footer-user.php"; ?>
</body>

</html>