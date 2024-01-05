<!-- Menu Page -->
<header class="header" type="top-page">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a href="#" class="navbar-brand">
            <img src="../../assets/img/logo.png" alt="" class="logo-navbar">
            <span class="logo-name">TravelVN</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse navbar-menu" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Trang Chủ<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Dịch Vụ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Sự Kiện</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Liên Hệ</a>
                </li>

                <?php 
                
                if(isset($_SESSION["navbar_username"])) {
                    $username = $_SESSION["navbar_username"];

                    if(isset($_SESSION["user_token"])) {

                    }
                
                ?>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $username ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Thông Tin</a>
                        <a class="dropdown-item" href="../../views/logout.php" id="logout-username">Đăng Xuất</a>
                    </div>
                </li>

                <?php 
                } else { 
                    header("Location: ../../views/login.php");
                    exit();  
                }
                ?>
            </ul>
            <form class="form-inline">
                <input type="text" class="form-control mr-sm-2" placeholder="Tìm Kiếm" aria-label="Search">
                <button type="" class="btn btn-primary my-2 my-sm-0">
                    <i class="bx bx-search-alt-2"></i>
                </button>
            </form>
        </div>
    </nav>
</header>