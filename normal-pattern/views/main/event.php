<?php

// Required Config / Include Database, Auth
include "../../config/database.php";
include "../../classes/AuthClass.php";
// Include Category / Event
include "../../classes/CategoryClass.php";
include "../../classes/EventClass.php";

session_start();

if (isset($_GET["page"])) {
    $check_page = $_GET["page"];

    if (empty($check_page)) {
        return header("Location: ../../views/main/event.php");
    }
}

?>

<?php include "../../views/includes/doctype.php"; ?>

<head>
    <title>php-travelvn | trang sự kiện người dùng | v1.0</title>
    <?php include "../../views/includes/head-user.php"; ?>
</head>

<body page="event" id="bd-main-event">
    <?php include "../../views/includes/load.php"; ?>

    <article class="article" article-type="event">
        <?php include "../../views/includes/user/navbar.php"; ?>

        <section class="section section-event">
            <div class="container">
                <div class="row row-padding">
                    <?php

                    $list_event = EventClass::ReadByPagination();
                    $list_event_ = EventClass::Read();

                    $sum_event = count($list_event_);
                    $page_event = ceil((int) $sum_event / (int) EventClass::RowEvent());
                    foreach ($list_event as $row) { ?>

                        <div class="col-element col-12 col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-element" type="event" card-id="<?php echo $row["id"]; ?>">
                                <img src="../../upload/thumbnail/<?php echo $row["thumbnail"]; ?>" alt=""
                                    class="card-img-top">
                                <div class="card-body">
                                    <p class="card-text card-datetime">
                                        <i class="bx bx-calendar-event"></i>
                                        <span>
                                            <?php echo $row["datetime"]; ?>
                                        </span>
                                    </p>
                                    <h5 class="card-title">
                                        <?php echo $row["title"]; ?>
                                    </h5>
                                    <hr class="hr-line">
                                    <div class="card-text card-header-text">
                                        <?php echo $row["header"]; ?>
                                    </div>
                                    <a class="link-event-detail btn btn-primary" link-id="<?php echo $row["id"]; ?>"
                                        href="../main/event_detail.php?v=<?php echo $row["id"]; ?>">Xem
                                        Chi Tiết</a>
                                </div>
                            </div>
                        </div>

                    <?php } ?>
                </div>
                <div class="row row-pagination">
                    <div class="col-pagination col-12">
                        <nav aria-label="page pagination">
                            <ul class="pagination">
                                <?php

                                for ($i = 1; $i <= $page_event; $i++) { ?>

                                    <li class="page-item">
                                        <a class="page-link" href="../main/event.php?page=<?php echo $i; ?>">
                                            <?php echo $i; ?>
                                        </a>
                                    </li>

                                <?php } ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
    </article>

    <?php include "../../views/includes/footer-user.php"; ?>
</body>

</html>