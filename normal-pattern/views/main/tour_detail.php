<?php

// Required Config / Include Database, Auth
include "../../config/database.php";
include "../../classes/AuthClass.php";
// Include Tour / Location / Booking
include "../../classes/TourClass.php";
include "../../classes/ScheduleClass.php";
include "../../classes/LocationClass.php";
include "../../classes/BookingClass.php";

session_start();

if (isset($_GET["v"])) {
    $v = $_GET["v"];

    $find_tour = TourClass::FindById($v);

    $find_location = LocationClass::FindById($find_tour["location_id"]);

    $find_schedule = ScheduleClass::FindByTourId($v);

    if ($v != $find_tour["id"] || empty($v)) {
        return header("Location: ../../views/main/tour.php");
    } else {
        // $limit_tour = TourClass::ReadByLimit();
    }

} else {
    return header("Location: ../../views/main/tour.php");
}


?>

<?php include "../../views/includes/doctype.php"; ?>

<head>
    <title>php-travelvn | trang sản phẩm chi tiết | v1.0</title>
    <?php include "../../views/includes/head-user.php"; ?>
    <style>
        body[page="tour-detail"] .section.section-tour-detail .content-table-price .tr-total td {
            font-size: 1rem !important;
            font-weight: bold !important;
            color: #d93025 !important;
        }
    </style>
</head>

<body page="tour-detail" id="bd-main-tour-detail">
    <?php include "../../views/includes/load.php"; ?>

    <article class="article" article-type="tour-detail">
        <?php include "../../views/includes/user/navbar.php"; ?>

        <section class="section section-tour-detail">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-5 col-md-12 col-sm-12 pb-4">
                        <div class="content">
                            <div class="content-thumbnail">
                                <span>
                                    <img src="../../upload/thumbnail/<?php echo $find_tour["thumbnail"]; ?>" alt="">
                                </span>
                            </div>
                            <div class="row">
                                <div class="col-4 p-0 pt-2">
                                    <div class="small-grid">
                                        <span>
                                            <img src="../../upload/images/<?php echo $find_tour["images"]; ?>" alt="">
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-7 col-md-12 col-sm-12 pb-4">
                        <div class="content">
                            <div class="content-title">
                                <span>
                                    <?php echo $find_tour["title"]; ?>
                                </span>
                            </div>
                            <hr class="hr-line">
                            <div class="content-create-at">
                                <span>
                                    <?php echo $find_tour["create_at"]; ?>
                                </span>
                            </div>
                            <div class="content-days">
                                <i class="bx bx-calendar-week"></i>
                                <span>
                                    <?php echo "Số Ngày: " . $find_tour["days"]; ?>
                                </span>
                            </div>
                            <div class="content-nos">
                                <i class="bx bx-run"></i>
                                <span>
                                    <?php echo "Số Chỗ: " . $find_tour["number_of_seat"]; ?>
                                </span>
                            </div>
                            <div class="content-location-id">
                                <i class="bx bx-globe"></i>
                                <span>
                                    <?php echo "Khu Vực: " . $find_location["city"]; ?>
                                </span>
                            </div>
                            <div class="content-schedule-status">

                                <?php

                                if (empty($find_schedule)) {
                                    ?>
                                    <div>
                                        <i class="bx bx-calendar-alt"></i> Trạng Thái Lịch Trình:
                                        <span class="badge badge-danger">Không Thể Đặt</span>
                                    </div>
                                    <?php
                                } else {
                                    ?>
                                    <div>
                                        <i class="bx bx-calendar-alt"></i> Trạng Thái Lịch Trình:
                                        <span class="badge badge-success">Có Thể Đặt</span>
                                    </div>
                                    <?php
                                }

                                ?>
                            </div>
                            <div class="content-table-price table-responsive pt-2 pb-2">
                                <table class="table table-striped table-bordered table-sm">
                                    <tr>
                                        <th style="width: 50%">Loại</th>
                                        <th>Giá Tiền</th>
                                    </tr>
                                    <tr>
                                        <td>Người Lớn</td>
                                        <td>
                                            <?php echo number_format($find_tour["price_person"], 0, '', ',') . " VNĐ"; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Trẻ Em</td>
                                        <td>
                                            <?php echo number_format($find_tour["price_children"], 0, '', ',') . " VNĐ"; ?>
                                        </td>
                                    </tr>
                                    <tr class="tr-total">
                                        <td>Tổng Giá</td>
                                        <td>
                                            <?php echo number_format($find_tour["price_total"], 0, '', ',') . " VNĐ"; ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </article>

    <?php include "../../views/includes/footer-user.php"; ?>
</body>

</html>