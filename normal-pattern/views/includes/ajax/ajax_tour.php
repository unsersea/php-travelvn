<?php

// Include
include "../../../config/database.php";
include "../../../classes/TourClass.php";
include "../../../classes/LocationClass.php";

// Test

// if ($_SERVER["REQUEST_METHOD"] === "POST") {
//     if (isset($_REQUEST["action"])) {
//         $action = $_REQUEST["action"];

//         $conn = connectDB();

//         // Check Method
//         if (isset($_GET["page"])) {
//             $page = $_GET["page"];
//         } else {
//             $page = 1;
//         }

//         $row_list = 10;
//         $from_list = ($page - 1) * $row_list;

//         $sql = "SELECT * FROM `tour` WHERE `isShow` = '1' ";

//         // Check Price
//         if (isset($_POST["min_price"], $_POST["max_price"]) && !empty($_POST["min_price"]) && !empty($_POST["max_price"])) {
//             $sql .= " AND `price_total` BETWEEN '" . $_POST["min_price"] . "' AND '" . $_POST["max_price"] . "'";
//         }

//         if (isset($_POST["search_title"]) && !empty($_POST["search_title"])) {
//             $sql .= " AND `title` LIKE '%" . $_POST["search_title"] . "%'";
//         }

//         $sql .= " ORDER BY id DESC LIMIT $from_list, $row_list ";

//         $result = $conn->query($sql);
//         $output = '';

//         if ($result === false) {

//         } else {
//             $array = array();

//             while ($row = $result->fetch_assoc()) {
//                 $array[] = $row;


//             }
//             // while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
//             //     $array = $row;
//             // }
//         }

//         // print_r($array);
//         // die();

//         // $list_tour_ = TourClass::Read();

//         // $sum_tour = count($list_tour_);
//         // $page_tour = ceil((int) $sum_tour / (int) TourClass::RowTour());

//         foreach ($array as $row) {
//             $output = '
//                 <div class="col-element col-12 col-xl-4 col-lg-6 col-md-6 col-sm-12 pb-4">
//                     <div class="card card-element" type="tour" card-id="' . $row["id"] . '">
//                         <img src="../../upload/thumbnail/' . $row["thumbnail"] . '" alt=""
//                             class="card-img-top">
//                         <div class="card-body">
//                             <h5 class="card-title">
//                                 ' . $row["title"] . '
//                             </h5>
//                             <hr class="hr-line">
//                             <p class="card-text card-days">
//                                 <i class="bx bx-calendar-week"></i>
//                                 <span>
//                                     Số Ngày:' . $row["days"] . '
//                                 </span>
//                             </p>
//                             <p class="card-text card-nos">
//                                 <i class="bx bx-run"></i>
//                                 <span>
//                                     Số Chỗ:' . $row["number_of_seat"] . '
//                                 </span>
//                             </p>
//                             <div class="d-flex align-items-center justify-content-between">
//                                 <div class="div-price-total">
//                                     <p class="card-text card-price-total">
//                                         ' . number_format($row["price_total"], 0, ',', ',') . " VNĐ " . '
//                                     </p>
//                                 </div>
//                                 <div class="div-link">
//                                     <a class="link-tour-detail btn btn-primary btn-sm"
//                                         link-id="' . $row["id"] . '" href="#">Xem Chi Tiết</a>
//                                 </div>
//                             </div>
//                         </div>
//                     </div>
//                 </div>
//             ';
//             echo $output;
//         }

//         disconnectDB($conn);
//     }
// }

//
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_REQUEST["action"])) {
        $conn = connectPDO();

        $limit = '10';

        $page = 1;

        if ($_POST["page"] > 1) {
            $start = (($_POST["page"] - 1) * $limit);

            $page = $_POST["page"];
        } else {
            $start = 0;
        }

        $query = "SELECT * FROM `tour` WHERE `isShow` = '1'";


        if ($_POST["query"] != "") {
            if (isset($_POST["search_title"]) && !empty($_POST["search_title"])) {
                $query .= " AND `title` LIKE '%" . $_POST["search_title"] . "%'";
            }
        }

        if($_POST["min_price"] != "" && $_POST["max_price"] != "") {
            if (isset($_POST["min_price"], $_POST["max_price"]) && !empty($_POST["min_price"]) && !empty($_POST["max_price"])) {
                $query .= " AND `price_total` BETWEEN '" . $_POST["min_price"] . "' AND '" . $_POST["max_price"] . "'";
            }
        }

        $query .= " ORDER BY id DESC";

        $filter_query = $query . " LIMIT " . $start . ", " . $limit . "";

        $statement = $conn->prepare($query);

        $statement->execute();

        $total_data = $statement->rowCount();

        $statement = $conn->prepare($filter_query);

        $statement->execute();

        $result = $statement->fetchAll();

        $output = '';

        if ($total_data > 0) {
            foreach ($result as $row) {
                $output .= '
                    <div class="col-element col-12 col-xl-4 col-lg-6 col-md-6 col-sm-12 pb-4">
                        <div class="card card-element" type="tour" card-id="' . $row["id"] . '">
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
            }
        } else {
            // $output .= ' 
            //     <div class="col-element col-12 col-xl-4 col-lg-6 col-md-6 col-sm-12 pb-4">
            //         <span>*Không Tìm Thấy Kết Quả</span>
            //     </div>
            // ';
        }

        $output .= '
            <div class="col-pagination col-12">
                <nav aria-label="page pagination">
                    <ul class="pagination">
        ';

        $total_links = ceil($total_data / $limit);
        $previous_link = '';
        $next_link = '';
        $page_link = '';
        $page_array = [];

        //echo $total_links;

        if ($total_links > 4) {
            if ($page < 5) {
                for ($count = 1; $count <= 5; $count++) {
                    $page_array[] = $count;
                }
                $page_array[] = '...';
                $page_array[] = $total_links;
            } else {
                $end_limit = $total_links - 5;

                if ($page > $end_limit) {
                    $page_array[] = 1;
                    $page_array[] = '...';

                    for ($count = $end_limit; $count <= $total_links; $count++) {
                        $page_array[] = $count;
                    }
                } else {
                    $page_array[] = 1;
                    $page_array[] = '...';

                    for ($count = $page - 1; $count <= $page + 1; $count++) {
                        $page_array[] = $count;
                    }

                    $page_array[] = '...';
                    $page_array[] = $total_links;
                }
            }
        } else {
            for ($count = 1; $count <= $total_links; $count++) {
                $page_array[] = $count;
            }
        }

        for ($count = 0; $count < count($page_array); $count++) {
            if ($page == $page_array[$count]) {
                $page_link .= '
            <li class="page-item active">
            <a class="page-link" href="#">' . $page_array[$count] . ' <span class="sr-only">(current)</span></a>
            </li>
            ';

                $previous_id = $page_array[$count] - 1;
                if ($previous_id > 0) {
                    $previous_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="' . $previous_id . '"><i class="bx bx-chevron-left"></i></a></li>';
                } else {
                    $previous_link = '
            <li class="page-item disabled">
                <a class="page-link" href="#"><i class="bx bx-chevron-left"></i></a>
            </li>
            ';
                }
                $next_id = $page_array[$count] + 1;
                if ($next_id >= $total_links) {
                    $next_link = '
            <li class="page-item disabled">
                <a class="page-link" href="#"><i class="bx bx-chevron-right"></i></a>
            </li>
                ';
                } else {
                    $next_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="' . $next_id . '"><i class="bx bx-chevron-right"></i></a></li>';
                }
            } else {
                if ($page_array[$count] == '...') {
                    $page_link .= '
            <li class="page-item disabled">
                <a class="page-link" href="#">...</a>
            </li>
            ';
                } else {
                    $page_link .= '
            <li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="' . $page_array[$count] . '">' . $page_array[$count] . '</a></li>
            ';
                }
            }
        }

        $output .= $previous_link . $page_link . $next_link;

        $output .= '
                    </ul>
                </nav>
            </div>        
        ';

        echo $output;
    }
}