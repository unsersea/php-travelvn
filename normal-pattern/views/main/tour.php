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
                                </div>
                                <!-- <div class="field-modal">
                                    <label class="form-label">Theo Giá Tiền</label>
                                    <div class="form-check">
                                        <label class="form-check-label" for="check-price1">
                                            <input type="checkbox" class="form-check-input filter-price"
                                                name="option-price1" id="check-price1" value="price1">
                                            <span>0 - 1.000.000</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label" for="check-price2">
                                            <input type="checkbox" class="form-check-input filter-price"
                                                name="option-price2" id="check-price2" value="price2">
                                            <span>1.000.000 - 3.000.000</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label" for="check-price3">
                                            <input type="checkbox" class="form-check-input filter-price"
                                                name="option-price3" id="check-price3" value="price3">
                                            <span>3.000.000 - 5.000.000</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label" for="check-price4">
                                            <input type="checkbox" class="form-check-input filter-price"
                                                name="option-price4" id="check-price4" value="price4">
                                            <span>5.000.000 - 10.000.000</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label" for="check-price5">
                                            <input type="checkbox" class="form-check-input filter-price"
                                                name="option-price5" id="check-price5" value="price5">
                                            <span>
                                                > 10.000.000</span>
                                        </label>
                                    </div>
                                </div> -->
                                <div class="field-modal">
                                    <label class="form-label">Theo Tên</label>
                                    <input type="text" name="title" class="form-control" placeholder="Tìm Kiếm"
                                        id="search-title-ajax">
                                </div>
                            </form>
                        </div>
                        <hr class="hr-line pt-2 pb-2">
                    </div>
                    <div class="col-12 col-lg-9 col-md-12 col-sm-12 p-0">
                        <!-- <div class="row row-filter-data">

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
                        </div> -->
                        <!-- <div class="row row-pagination">
                            <div class="col-pagination col-12">
                                <nav aria-label="page pagination">
                                    <ul class="pagination">

                                        <?php

                                        if ($page > 1) {
                                            ?>
                                            <li class="page-item">
                                                <a class="page-link" href="../main/tour.php?page=<?php echo $page - 1; ?>"
                                                    tabindex="-1">
                                                    <i class="bx bx-chevron-left"></i>
                                                </a>
                                            </li>
                                            <?php
                                        } else {
                                            ?>
                                            <li class="page-item disabled">
                                                <a class="page-link" href="#" tabindex="-1">
                                                    <i class="bx bx-chevron-left"></i>
                                                </a>
                                            </li>
                                            <?php
                                        }

                                        ?>
                                        <?php
                                        $show = 0;

                                        for ($i = 1; $i <= $page_tour; $i++) { ?>

                                            <?php $show++; ?>
                                            <?php

                                            if ($page == $i) {
                                                ?>
                                                <li class="page-item active">
                                                    <a class="page-link">
                                                        <?php echo $i; ?>
                                                    </a>
                                                </li>
                                                <?php
                                            } else {
                                                ?>
                                                <li class="page-item">
                                                    <a class="page-link" href="../main/tour.php?page=<?php echo $i; ?>">
                                                        <?php echo $i; ?>
                                                    </a>
                                                </li>
                                                <?php
                                            } ?>
                                        <?php } ?>

                                        <?php

                                        if ($page_tour > $page) {
                                            ?>
                                            <li class="page-item">
                                                <a class="page-link" href="../main/tour.php?page=<?php echo $page + 1; ?>"
                                                    tabindex="-1">
                                                    <i class="bx bx-chevron-right"></i>
                                                </a>
                                            </li>
                                            <?php
                                        } else {
                                            ?>
                                            <li class="page-item disabled">
                                                <a class="page-link" href="#" tabindex="-1">
                                                    <i class="bx bx-chevron-right"></i>
                                                </a>
                                            </li>
                                            <?php
                                        }

                                        ?>
                                    </ul>
                                </nav>
                            </div>
                        </div> -->
                        <div class="row row-filter-data">
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </article>

    <?php include "../../views/includes/footer-user.php"; ?>

    <script type="text/javascript">
        (function () {
            filter_data();

            function filter_data() {
                var action = "fetch_data_tour";
                var search_title = $("#search-title-ajax").val();
                // var filter_price = get_filter('filter-price');
                $.ajax({
                    url: "../includes/ajax/ajax_tour.php",
                    method: "POST",
                    data: {
                        action: action,
                        search_title: search_title,
                        // filter_price: filter_price
                    },
                    success: function (data) {
                        $(".row-filter-data").html(data);
                    }
                });
            }

            // function get_filter(class_name) {
            //     var filter = [];
            //     $('.' + class_name + ':checked').each(function () {
            //         filter.push($(this).val());
            //     });

            //     return filter;
            // }

            // $(".form-check-input.filter-price").click(function () {
            //     filter_data();
            // });

            $("#search-title-ajax").keyup(function () {
                filter_data();
            })
        })(jQuery);
    </script>
</body>

</html>