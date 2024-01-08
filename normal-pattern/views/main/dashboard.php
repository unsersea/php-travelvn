<?php 

// Session
session_Start();

include "../../config/database.php";
include "../../classes/AuthClass.php";

?>
<?php include "../../views/includes/doctype.php"; ?>
<head>
    <title>php-travelvn | trang chủ quản trị viên | v1.0</title>
    <?php include "../../views/includes/head-admin.php"; ?>
</head>
<body page="dashboard" id="bd-main-dashboard">
    <?php include "../../views/includes/load.php"; ?>

    <div class="wrapper">
        <?php include "../../views/includes/admin/sidebar.php"; ?>

        <div class="content-wrapper">
            <!-- Title -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h2>Trang Chủ</h2>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Main Content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>150</h3>
                                    <p>Đơn Đặt Hàng</p>
                                </div>
                                <div class="icon">
                                    <i class="bx bx-shopping-bag"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    Xem Chi Tiết
                                    <i class="bx bx-right-arrow-circle"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>15</h3>
                                    <p>Đã Thanh Toán</p>
                                </div>
                                <div class="icon">
                                    <i class="bx bx-wallet"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    Xem Chi Tiết
                                    <i class="bx bx-right-arrow-circle"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>254</h3>
                                    <p>Doanh Thu</p>
                                </div>
                                <div class="icon">
                                    <i class="bx bx-dollar"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    Xem Chi Tiết
                                    <i class="bx bx-right-arrow-circle"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>7</h3>
                                    <p>Đánh Giá</p>
                                </div>
                                <div class="icon">
                                    <i class="bx bx-edit"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    Xem Chi Tiết
                                    <i class="bx bx-right-arrow-circle"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php include "../../views/includes/footer-admin.php"; ?>
    </div>

    <?php include "../../views/includes/admin/script.php"; ?>
</body>
</html>