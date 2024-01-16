<?php

include("../../normal-pattern/config/database.php");

require_once("../../normal-pattern/config/google.php");
// Google Login
session_start();

$google_button = '';

if (isset($_SESSION["user_token"])) {

} else {
    $google_button
        = '
            <a href=' . $google_client->createAuthUrl() . ' class="btn btn-login-google" id="btn-login-google">
                <span>
                    <i class="bx bxl-google"></i>
                </span>
                <span>Đăng Nhập Bằng Google</span>
            </a>
        ';
}

?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <!-- Title -->
    <title>php-travelvn | trang đăng nhập | v1.0</title>
    <?php include "../../normal-pattern/views/includes/head-account.php"; ?>
</head>

<body page="login" id="bd-main-login">
    <div class="loader">
        <div class="shape"></div>
    </div>

    <!-- Login Page -->
    <section class="section" type="login">
        <div class="container">
            <div class="logo">
                <img src="../../normal-pattern/assets/img/logo.png" alt="" class="logo-img" width="40" height="40">
                <span class="logo-name">TravelVN</span>
            </div>
            <form action="./login.php" class="form-account" type="login" id="fm-login" method="POST"
                enctype="multipart/form-data">
                <div class="alert alert-danger" role="alert" id="alert-login"></div>
                <div class="field">
                    <div class="input-field" field="username">
                        <input type="text" name="username" placeholder="Nhập Tài Khoản">
                        <i class="bx bx-user"></i>
                    </div>
                </div>
                <div class="field">
                    <div class="input-field" field="password">
                        <input type="password" name="password" placeholder="Nhập Mật Khẩu">
                        <i class="bx bx-lock-alt"></i>
                    </div>
                </div>
                <div class="field" type="flex">
                    <div class="rm">
                        <input type="checkbox" name="cb-rmb">
                        <label class="mb-0" for="cb-rmb">Ghi Nhớ</label>
                    </div>
                    <div class="fg-password">
                        <a href="" class="link" type="fg-password">Quên mật khẩu?</a>
                    </div>
                </div>
                <div class="button-submit">
                    <button type="submit" id="btn-login">Đăng Nhập</button>
                </div>
                <div class="button-google">
                    <?php

                    if ($google_button == '') {

                    } else {
                        echo $google_button;
                    }

                    ?>
                </div>
                <div class="other-link">
                    <span>Bạn chưa có tài khoản? <a href="">Đăng ký</a></span>
                </div>
            </form>
        </div>
    </section>

    <?php include "../../normal-pattern/views/includes/footer-account.php"; ?>

    <!-- Script Login -->
    <script type="text/javascript" src="../../normal-pattern/assets/js/Login.js"></script>
</body>

</html>