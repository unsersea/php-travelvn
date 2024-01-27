<?php

// Required Config / Include Database, Auth
include "../../config/database.php";
include "../../classes/AuthClass.php";
// Include Category / Event
include "../../classes/CategoryClass.php";
include "../../classes/EventClass.php";

session_start();

if (isset($_GET["v"])) {
    $v = $_GET["v"];

    $find_event = EventClass::FindById($v);

    if ($v != $find_event["id"] || empty($v)) {
        return header("Location: ../../views/main/event.php");
    }

} else {
    return header("Location: ../../views/main/event.php");
}


?>

<?php include "../../views/includes/doctype.php"; ?>

<head>
    <title>php-travelvn | trang chi tiết sự kiện | v1.0</title>
    <?php include "../../views/includes/head-user.php"; ?>
</head>

<body page="event-detail" id="bd-main-event-detail">
    <?php include "../../views/includes/load.php"; ?>

    <article class="article" article-type="event-detail">
        <?php include "../../views/includes/user/navbar.php"; ?>

        <section class="section section-event-detail">
            <div class="container">

            </div>
        </section>
    </article>

    <?php include "../../views/includes/footer-user.php"; ?>
</body>

</html>