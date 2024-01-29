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
    } else {
        $limit_event = EventClass::ReadByLimit();
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
                <div class="row">
                    <div class="col-12 col-lg-8 col-md-12 col-sm-12">
                        <div class="content">
                            <span class="content-datetime">
                                <span class="icon-time">
                                    <i class="bx bx-time"></i>
                                </span>
                                <?php echo $find_event["datetime"]; ?>
                            </span>
                            <div class="content-header">
                                <span><?php echo $find_event["header"]; ?></span>
                            </div>
                            <div class="content-thumbnail">
                                <span>
                                    <img src="../../upload/thumbnail/<?php echo $find_event["thumbnail"]; ?>" alt="">
                                </span>
                            </div>
                            <div class="content-detail">
                                <span><?php echo $find_event["content"]; ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 col-md-12 col-sm-12">
                        <h5 class="title-limit">Một Số Sự Kiện</h5>
                        <hr class="hr-line">
                        <div class="row list-event" type="limit">
                            <?php 
                            
                            foreach ($limit_event as $row) {
                                ?>

                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </article>

    <?php include "../../views/includes/footer-user.php"; ?>
</body>

</html>