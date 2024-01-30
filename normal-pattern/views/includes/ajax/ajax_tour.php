<?php

// Include
include "../../../config/database.php";
include "../../../classes/TourClass.php";
include "../../../classes/LocationClass.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_REQUEST["action"])) {
        $action = $_REQUEST["action"];

        $conn = connectDB();

        // Check Method
        if (isset($_GET["page"])) {
            $page = $_GET["page"];
        } else {
            $page = 1;
        }

        $row_list = 10;
        $from_list = ($page - 1) * $row_list;

        $sql = "SELECT * FROM `tour` WHERE `isShow` = '1' ";

        $sql .= " ORDER BY id DESC LIMIT $from_list, $row_list ";

        $result = $conn->query($sql);
        $output = '';

        if ($result === false) {

        } else {
            $array = array();

            while ($row = $result->fetch_assoc()) {
                $array[] = $row;


            }
            // while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            //     $array = $row;
            // }
        }

        // print_r($array);
        // die();
        foreach ($array as $row) {
            $output = '
                <div class="col-element col-12 col-xl-4 col-lg-6 col-md-6 col-sm-12 pb-4">
                    <div class="card card-element" type="tour" card-id="<?php echo $row["id"]; ?>">
                        <img src="../../upload/thumbnail/' . $row["thumbnail"] . '" alt=""
                            class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">
                                ' . $row["title"] . '
                            </h5>
                            <hr class="hr-line">
                            <p class="card-text card-days">
                                <i class="bx bx-calendar-week"></i>
                                <span>
                                    Số Ngày:' . $row["days"] . '
                                </span>
                            </p>
                            <p class="card-text card-nos">
                                <i class="bx bx-run"></i>
                                <span>
                                    Số Chỗ:' . $row["number_of_seat"] . '
                                </span>
                            </p>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="div-price-total">
                                    <p class="card-text card-price-total">
                                        ' . number_format($row["price_total"], 0, ',', ',') . " VNĐ " . '
                                    </p>
                                </div>
                                <div class="div-link">
                                    <a class="link-tour-detail btn btn-primary btn-sm"
                                        link-id="' . $row["id"] . '" href="#">Xem Chi Tiết</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            ';
            echo $output;
        }
        disconnectDB($conn);
    }
}