<?php

// Session
session_Start();

include "../../config/database.php";
include "../../classes/AuthClass.php";
include "../../classes/LocationClass.php";

$list_location = LocationClass::Read();

?>
<?php include "../../views/includes/doctype.php"; ?>

<head>
    <title>php-travelvn | trang sản phẩm | v1.0</title>
    <?php include "../../views/includes/head-admin.php"; ?>
</head>

<body page="ad-tour" id="bd-main-ad-tour">
    <?php include "../../views/includes/load.php"; ?>

    <div class="wrapper">
        <?php include "../../views/includes/admin/sidebar.php"; ?>

        <div class="content-wrapper">
            <!-- Title -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h2>Sản Phẩm</h2>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">
                                    <a href="#">Trang Chủ</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    Sản Phẩm
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
                                <div class="card-header">
                                    <div class="btn-link-create-tour">
                                        <a href="#" data-id="" data-toggle="modal" data-target="#modal-create-tour"
                                            class="btn btn-success text-white">
                                            <i class="bx bx-plus"></i>
                                            <span>Tạo Mới</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="datatables-tour-list"
                                        class="display table table-bordered table-hover nowrap datatables">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tựa Đề</th>
                                                <th>Tổng Giá</th>
                                                <th>Số Chổ</th>
                                                <th>Hình Ảnh</th>
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