<!DOCTYPE html>
<html lang="vi">
<head>
    <!-- Title -->
    <title>php-travelvn | trang xác minh | v1.0</title>
    <?php include "../../normal-pattern/views/includes/head-account.php"; ?>
</head>
<body page="token" id="bd-main-token">

    <?php include "../../normal-pattern/views/includes/load.php"; ?>

    <!-- Token Page -->
    <section class="section" type="token">
        <div class="container">
            <div class="logo">
                <img src="../../assets/img/logo.png" alt="" class="logo-img" width="40" height="40">
                <span class="logo-name">TravelVN</span>
            </div>
            <form class="form-token" type="token" id="fm-token">
                <div class="field">
                    <div class="input-field" field="token">
                        <input type="number" name="" id="">
                        <i class="bx bx-lock"></i>
                    </div>
                </div>
                <div class="button-submit">
                    <button type="submit" id="btn-token">Xác Minh Tài Khoản</button>
                </div>
            </form>
        </div>
    </section>

    <?php include "../../normal-pattern/views/includes/footer-account.php"; ?>
    <?php include "../../normal-pattern/assets/js/Token.js"; ?>

    <!-- Script Validate -->

</body>
</html>