<?php
// Session
session_Start();

include "../../config/database.php";
include "../../classes/AuthClass.php";
include "../../classes/LocationClass.php";
include "../../classes/BookingClass.php";
include "../../classes/TourClass.php";
include "../../classes/ScheduleClass.php";

$list_booking = BookingClass::Read();

?>
<?php include "../../views/includes/doctype.php"; ?>

<head>
    <title>php-travelvn | trang đặt sản phẩm | v1.0</title>
    <?php include "../../views/includes/head-admin.php"; ?>
</head>

<body page="ad-booking" id="bd-main-ad-booking">
    <?php include "../../views/includes/load.php"; ?>

    <div class="wrapper">
        <?php include "../../views/includes/admin/sidebar.php"; ?>

        <div class="content-wrapper">
            <!-- Title -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h2>Đặt Sản Phẩm</h2>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">
                                    <a href="#">Trang Chủ</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    Đặt Sản Phẩm
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Main Content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <!-- <div class="card-header">
                                    <div class="btn-link-create-booking">
                                        <a href="#" data-id="" data-toggle="modal" data-target="#modal-create-tour"
                                            class="btn btn-success text-white">
                                            <i class="bx bx-plus"></i>
                                            <span>Tạo Mới</span>
                                        </a>
                                    </div>
                                </div> -->
                                <div class="card-body">
                                    <table id="datatables-booking-list"
                                        class="display table table-bordered table-hover nowrap datatables">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Phương Thức</th>
                                                <th>Tổng Giá</th>
                                                <th>Trạng Thái</th>
                                                <th>Ghi Chú</th>
                                                <th>Thao Tác</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php include "../../views/includes/footer-admin.php"; ?>
    </div>

    <!-- Modal -->
    <?php include "../../views/includes/modal/modal_tour.php"; ?>

    <!-- Script -->
    <?php include "../../views/includes/admin/script.php"; ?>
</body>

</html>