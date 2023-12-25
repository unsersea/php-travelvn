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
                <div class="field">
                    <div class="input-field" field="phone">
                        <input type="number" name="phone" placeholder="Nhập Số Điện Thoại">
                        <i class="bx bx-phone"></i>
                    </div>
                </div>
                <div class="field">
                    <div class="input-field" field="email">
                        <input type="text" name="email" placeholder="Nhập Email">
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
                rules: {
                    username: {
                        required: true,
                        rangelength: [6, 25],
                        remote: {
                            url: "../../normal-pattern/views/action/check_auth.php",
                            type: "POST",
                            data: {
                                username: function() { 
                                    return $("#fm-register :input[name='username']").val(); 
                                }
                            }
                        }
                    },
                    password: {
                        required: true,
                        rangelength: [6, 50],
                    },
                    phone: {
                        required: true,
                        number: true,
                        remote: {
                            url: "../../normal-pattern/views/includes/validate/auth/validate_phone.php",
                            type: "POST",
                            data: { 
                                phone: function() { 
                                    return $("#fm-register :input[name='phone']").val(); 
                                }
                            }
                        }
                    },
                    email: {
                        required: true,
                        email: true,
                    }
                },
                messages: {
                    username: {
                        required: "*Bạn Chưa Nhập Tài Khoản",
                        rangelength: "*Tài Khoản Chỉ Nhận Từ 6 Đến 25 Ký Tự",
                        remote: "*Tài Khoản Này Đã Tồn Tại",
                    },
                    password: {
                        required: "*Bạn Chưa Nhập Mật Khẩu",
                        rangelength: "*Mật Khẩu Chỉ Nhận Từ 6 Đến 50 Ký Tự",
                    },
                    phone: {
                        required: "*Bạn Chưa Nhập Số Điện Thoại",
                        number: "*Số Điện Thoại Phải Là Ký Số",
                        remote: "*Số Điện Thoại Phải Đủ 10 Ký Số",
                    },
                    email: {
                        required: "*Bạn Chưa Nhập Email",
                        email: "*Email Không Đúng Định Dạng",
                    }
                },
                submitHandler: function(form) {
                    // form.submit()
                    // console.log($(form).serializeArray());
                    $.ajax({
                        type: "POST",
                        url: "../../normal-pattern/views/action/action_auth",
                        data: $(form).serializeArray(),
                        success: function(data) {
                            return location.href = "../../normal-pattern/views/_token.php";
                        }
                    });
                }
            });

        })(jQuery);
    </script>
</body>
</html>