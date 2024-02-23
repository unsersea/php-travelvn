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

        label:not(.form-check-label):not(.custom-file-label) {
            font-weight: 700 !important;
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
                                        <td>Chuyến Du Lịch</td>
                                        <td>
                                            <?php echo number_format($find_tour["price_total"], 0, '', ',') . " VNĐ"; ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="button-modal-booking">
                                <?php

                                if (!empty($find_schedule)) {
                                    ?>
                                    <a href="#" data-id="" data-toggle="modal" data-target="#modal-create-booking"
                                        class="btn btn-primary">
                                        <i class="bx bx-notepad"></i>
                                        Đặt Tour
                                    </a>
                                    <?php
                                } else {

                                }
                                ?>
                                <a href="../main/tour.php" class="btn btn-danger">
                                    <i class="bx bx-arrow-back"></i>
                                    Quay Lại
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-12 col-lg-12 col-md-12 col-sm-12 pb-4">
                        <div class="content">
                            <div class="content-detail">
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </section>

    </article>

    <!-- Modal -->
    <div class="modal fade" id="modal-create-booking" tabindex="-1" aria-labelledby="ex-modal-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="../../views/main/tour_detail.php" id="form-create-booking" class="form form-modal"
                    enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ex-modal-label">Đặt Tour</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">
                                <i class="bx bx-x"></i>
                            </span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="field-modal">
                            <label class="form-label">Tựa Đề</label>
                            <input type="text" name="title" class="form-control"
                                value="<?php echo $find_tour["title"]; ?>" readonly="true">
                        </div>
                        <div class="field-modal">
                            <label class="form-label">Giá Người Lớn</label>
                            <input type="text" name="price_person" id="price_person_booking_create" class="form-control"
                                value="<?php echo number_format($find_tour["price_person"], 0, '', ',') . " VNĐ"; ?>"
                                readonly="true">
                        </div>
                        <div class="field-modal">
                            <label class="form-label">Giá Trẻ Em</label>
                            <input type="text" name="price_children" id="price_children_booking_create" class="form-control"
                                value="<?php echo number_format($find_tour["price_children"], 0, '', ',') . " VNĐ"; ?>"
                                readonly="true">
                        </div>
                        <div class="field-modal">
                            <label class="form-label">Số Lượng Người Lớn</label>
                            <input type="number" name="amount_person" id="amount_person" class="form-control" min="1"
                                value="1">
                        </div>
                        <div class="field-modal">
                            <label class="form-label">Số Lượng Trẻ Em</label>
                            <input type="number" name="amount_children" id="amount_children" class="form-control"
                                min="1" value="1">
                        </div>
                        <div class="field-modal">
                            <label class="form-label">Lịch Trình</label>
                            <select name="schedule_id" id="select2-schedule-booking-create"
                                class="form-control select2bs4-schedule-booking-create">
                                <option value=""></option>
                                <?php

                                foreach ($find_schedule as $row_schedule) {
                                    ?>
                                    <option data-select-id="<?php echo $row_schedule["schedule_id"]; ?>"
                                        value="<?php echo $row_schedule["schedule_id"]; ?>">
                                        <?php echo $row_schedule["start_datetime"]; ?>
                                    </option>
                                    <?php
                                }

                                ?>
                            </select>
                        </div>
                        <hr class="hr-line">
                        <div class="field-modal field-total">
                            <div class="cal-total-price-person" id="cal-total-price-person"></div>
                            <div class="cal-total-price-children" id="cal-total-price-children"></div>
                            <div class="cal-total-price" id="cal-total-price"></div>
                            <div class="cal-total-all" id="cal-total-all"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary" value="submit_booking_create" name="action">Xác
                            Nhận</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include "../../views/includes/footer-user.php"; ?>
</body>

</html>