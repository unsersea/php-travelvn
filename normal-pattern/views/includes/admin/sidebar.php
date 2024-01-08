<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a href="#" class="nav-link" data-widget="pushmenu" role="button">
                <i class="bx bx-menu" type="bx-menu-sidebar"></i>
            </a>
        </li>
    </ul>
</nav>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link" type="logo-link">
        <img src="../../assets/img/logo.png" alt="Logo Sidebar" class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">TravelVN</span>
    </a>
    <div class="sidebar">
        <?php 
        
        if(isset($_SESSION["sidebar_username"])) {
            $username = $_SESSION["sidebar_username"];
        ?>
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../../assets/img/user2-160x160.jpg" alt="" class="img-circle elevation-2" width="60" height="60">
            </div>
            <div class="info">
                <a href="#" class="d-block">
                    <?php echo $username; ?>
                </a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">Tổng Quan</li>
                <li class="nav-item nav-dashboard">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bx bxs-dashboard"></i>
                        <p>Trang Chủ</p>
                    </a>
                </li>
                <li class="nav-item nav-user">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bx bx-user"></i>
                        <p>Người Dùng</p>
                    </a>
                </li>
                <li class="nav-item nav-schedule">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bx bx-calendar-check"></i>
                        <p>Lịch Trình</p>
                    </a>
                </li>
                <li class="nav-item nav-category">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bx bx-category"></i>
                        <p>Thể Loại</p>
                    </a>
                </li>
                <li class="nav-item nav-event">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bx bx-calendar-event"></i>
                        <p>Sự Kiện</p>
                    </a>
                </li>
                <li class="nav-item nav-location">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bx bx-globe"></i>
                        <p>Khu Vực</p>
                    </a>
                </li>
                <li class="nav-item nav-tour">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bx bx-notepad"></i>
                        <p>Sản Phẩm</p>
                    </a>
                </li>
                <li class="nav-item nav-feedback">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bx bx-edit-alt"></i>
                        <p>Đánh Giá</p>
                    </a>
                </li>
                <li class="nav-item nav-bill">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bx bx-wallet"></i>
                        <p>Hoá Đơn</p>
                    </a>
                </li>
                <li class="nav-item nav-chart">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bx bx-bar-chart"></i>
                        <p>Biểu Đồ</p>
                    </a>
                </li>
                <li class="nav-header">Thiết Lập</li>
                <li class="nav-item nav-exit">
                    <a href="../../views/logout.php" class="nav-link" id="_logout-username">
                        <i class="nav-icon bx bx-log-out"></i>
                        <p>Đăng Xuất</p>
                    </a>
                </li>
            </ul>
        </nav>
        <?php 
        } else { 
            header("Location: ../../views/login.php");
            exit();  
        }
        ?>
    </div>
</aside>