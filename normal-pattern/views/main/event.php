<?php

// Required Config / Include Database, Auth
include "../../config/database.php";
include "../../classes/AuthClass.php";

session_start();

?>

<?php include "../../views/includes/doctype.php"; ?>

<head>
    <title>php-travelvn | trang chủ người dùng | v1.0</title>
    <?php include "../../views/includes/head-user.php"; ?>
</head>

<body page="event" id="bd-main-event">
    <?php include "../../views/includes/load.php"; ?>

    <article class="article" article-type="event">
        <?php include "../../views/includes/user/navbar.php"; ?>
        
    </article>

    <?php include "../../views/includes/footer-user.php"; ?>
</body>

</html>