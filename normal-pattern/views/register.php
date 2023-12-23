<!DOCTYPE html>
<html lang="vi">
<head>
    <!-- Title -->
    <title>php-travelvn | trang đăng ký | v1.0</title>
    <?php include "../../normal-pattern/views/includes/head-account.php"; ?>
</head>
<body page="register" id="bd-main-register">

    <?php include "../../normal-pattern/views/includes/load.php"; ?>

    <!-- Register Page -->
    <section class="section" type="register">
        <div class="container">
            <div class="logo">
                <img src="../../normal-pattern/assets/img/logo.png" alt="" class="logo-img" width="40" height="40">
                <span class="logo-name">TravelVN</span>
            </div>
            <form action="./register" method="POST" enctype="multipart/form-data" class="form-account" type="register" id="fm-register">
                <div class="field">
                    <div class="input-field" field="username">
                        <input type="text" name="" placeholder="Nhập Tài Khoản">
                        <i class="bx bx-user"></i>
                    </div>
                </div>
                <div class="field">
                    <div class="input-field" field="password">
                        <input type="password" name="" placeholder="Nhập Mật Khẩu">
                        <i class="bx bx-lock-alt"></i>
                    </div>
                </div>
                <div class="field">
                    <div class="input-field" field="phone">
                        <input type="number" name="" placeholder="Nhập Số Điện Thoại">
                        <i class="bx bx-phone"></i>
                    </div>
                </div>
                <div class="field">
                    <div class="input-field" field="email">
                        <input type="text" name="" placeholder="Nhập Email">
                        <i class="bx bx-envelope"></i>
                    </div>
                </div>
                <div class="button-submit">
                    <button type="submit" name="action" value="register">Đăng Ký</button>
                </div>
                <div class="other-link">
                    <span>Bạn đã có tài khoản? <a href="">Đăng nhập</a></span>
                </div>
            </form>
        </div>
    </section>

    <?php include "../../normal-pattern/views/includes/footer-account.php"; ?>

    <!-- Script Validate -->
    <script type="text/javascript">
        (function($) {

            // Register
            $("#fm-register").validate({
                
            });

        })(jQuery);
    </script>
</body>
</html>