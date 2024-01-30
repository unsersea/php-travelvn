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
                    <div class="col-12 col-lg-3 col-md-12 col-sm-12">
                        <h5 class="title-search">Tìm Kiếm</h5>
                        <hr class="hr-line">
                        <div class="div-form">
                            <form method="POST" class="form-multiple-search-tour" enctype="multipart/form-data">
                                <div class="field-modal">
                                    <label class="form-label">Theo Giá Tiền</label>
                                    <div class="form-check">
                                        <label class="form-check-label" for="check-price1">
                                            <input type="checkbox" class="form-check-input" name="option-price1"
                                                id="check-price1">
                                            <span>0 - 1.000.000</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label" for="check-price2">
                                            <input type="checkbox" class="form-check-input" name="option-price2"
                                                id="check-price2">
                                            <span>1.000.000 - 3.000.000</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label" for="check-price3">
                                            <input type="checkbox" class="form-check-input" name="option-price3"
                                                id="check-price3">
                                            <span>3.000.000 - 5.000.000</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label" for="check-price4">
                                            <input type="checkbox" class="form-check-input" name="option-price4"
                                                id="check-price4">
                                            <span>5.000.000 - 10.000.000</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label" for="check-price5">
                                            <input type="checkbox" class="form-check-input" name="option-price5"
                                                id="check-price5">
                                            <span>
                                                < 10.000.000</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="field-modal">
                                    <label class="form-label">Theo Tên</label>
                                    <input type="text" name="title" class="form-control" placeholder="Tìm Kiếm">
                                </div>
                            </form>
                        </div>
                        <hr class="hr-line pt-2 pb-2">
                    </div>
                    <div class="col-12 col-lg-9 col-md-12 col-sm-12 p-0">
                        <div class="row">

                            <?php

                            $page = ((isset($_GET['page'])) && ($_GET['page'] != '')) ? $_GET['page'] : 1;

                            $list_tour = TourClass::ReadByPagination();
                            $list_tour_ = TourClass::Read();

                            $sum_tour = count($list_tour_);
                            $page_tour = ceil((int) $sum_tour / (int) TourClass::RowTour());

                            foreach ($list_tour as $row) {
                                ?>

                                <div class="col-element col-12 col-xl-4 col-lg-6 col-md-6 col-sm-12 pb-4">
                                    <div class="card card-element" type="tour" card-id="<?php echo $row["id"]; ?>">
                                        <img src="../../upload/thumbnail/<?php echo $row["thumbnail"]; ?>" alt=""
                                            class="card-img-top">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <?php echo $row["title"]; ?>
                                            </h5>
                                            <hr class="hr-line">
                                            <p class="card-text card-days">
                                                <i class="bx bx-calendar-week"></i>
                                                <span>
                                                    <?php echo "Số Ngày: " . $row["days"]; ?>
                                                </span>
                                            </p>
                                            <p class="card-text card-nos">
                                                <i class="bx bx-run"></i>
                                                <span>
                                                    <?php echo "Số Chỗ: " . $row["number_of_seat"]; ?>
                                                </span>
                                            </p>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="div-price-total">
                                                    <p class="card-text card-price-total">
                                                        <?php echo number_format($row["price_total"], 0, ',', ',') . " VNĐ "; ?>
                                                    </p>
                                                </div>
                                                <div class="div-link">
                                                    <a class="link-tour-detail btn btn-primary btn-sm"
                                                        link-id="<?php echo $row["id"]; ?>" href="#">Xem Chi Tiết</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </article>

    <?php include "../../views/includes/footer-user.php"; ?>
</body>

</html>