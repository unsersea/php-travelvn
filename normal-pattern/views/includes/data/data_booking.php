<?php

/**
 * File: data_booking.php
 * Versions: 1.0
 * Author:
 * Folder: data
 * Description: Fetch DataTables with PHP
 */

// Include
include "../../../config/database.php";
include "../../../classes/TourClass.php";
include "../../../classes/BookingClass.php";
include "../../../classes/ScheduleClass.php";
include "../../../classes/LocationClass.php";

// Call Connection
$conn = connectPDO();

$query = '';

$output = array();

$table = 'booking';

$query .= "SELECT * FROM $table ";

// Check Isset Search Value
if (isset($_POST["search"]["value"])) {
    $query .= 'WHERE note LIKE "%' . $_POST["search"]["value"] . '%" ';
    // $query .= 'OR content LIKE "%'.$_POST["search"]["value"].'%" ';
}

// Check Order By
if (isset($_POST["order"])) {
    $query .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
} else {
    $query .= 'ORDER BY id DESC ';
}

// Check Length
if ($_POST["length"] != -1) {
    $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $conn->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();

foreach ($result as $row) {
    // Call Sub Array
    $sub_array = array();
    //
    $sub_array[] = $row["id"];
    if ($row["payment_method"] == "Trực Tiếp") {
        $sub_array[] = '<span class="badge badge-secondary">' . $row["payment_method"] . '</span>';
    } else if ($row["payment_method"] == "Momo") {
        $sub_array[] = '<span class="badge badge-watermelon">' . $row["payment_method"] . '</span>';
    }
    // $sub_array[] = $row["payment_method"];
    $sub_array[] = number_format($row["total_all"], 0, '', ',');

    if ($row["status"] == 0) {
        $sub_array[] = '<span class="badge badge-info">Chờ Duyệt</span>';
    } else if ($row["status"] == 1) {
        $sub_array[] = '<span class="badge badge-success">Đã Duyệt</span>';
    }

    // $sub_array[] = $row["status"];
    $sub_array[] = $row["note"];

    $sub_array[] =
        '
        <a class="btn btn-info text-white" data-id="' . $row["id"] . '" id="btn-update-booking">
            <i class="bx bx-edit-alt"></i>
        </a>
        <a class="btn btn-danger text-white" data-id="' . $row["id"] . '" id="btn-delete-booking"> 
            <i class="bx bx-trash"></i>
        </a>
        <a class="btn btn-warning text-white" data-id="' . $row["id"] . '" id="btn-detail-booking">
            <i class="bx bx-detail"></i>
        </a>
    ';

    $data[] = $sub_array;
}

$output = array(
    "draw" => intval($_POST["draw"]),
    "recordsTotal" => $filtered_rows,
    "recordsFiltered" => BookingClass::ListByPDO(),
    "data" => $data
);

echo json_encode($output);