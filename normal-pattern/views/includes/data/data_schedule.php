<?php

/**
 * File: data_schedule.php
 * Versions: 1.0
 * Author:
 * Folder: data
 * Description: Fetch DataTables with PHP
 */

// Include
include "../../../config/database.php";
include "../../../classes/ScheduleClass.php";

// Call Connection
$conn = connectPDO();

$query = '';

$output = array();

$table = 'schedule';

$query .= "SELECT * FROM $table ";

// Check Isset Search Value
if (isset($_POST["search"]["value"])) {
    $query .= 'WHERE note LIKE "%' . $_POST["search"]["value"] . '%" ';
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
    $sub_array[] = $row["start_datetime"];
    $sub_array[] = $row["end_datetime"];
    $sub_array[] = $row["note"];
    $sub_array[] =
        '
        <a class="btn btn-info text-white" data-id="' . $row["id"] . '" id="btn-update-schedule">
            <i class="bx bx-edit-alt"></i>
        </a>
        <a class="btn btn-danger text-white" data-id="' . $row["id"] . '" id="btn-delete-schedule"> 
            <i class="bx bx-trash"></i>
        </a>
        <a class="btn btn-warning text-white" data-id="' . $row["id"] . '" id="btn-detail-schedule">
            <i class="bx bx-detail"></i>
        </a>
    ';

    $data[] = $sub_array;
}

$output = array(
    "draw" => intval($_POST["draw"]),
    "recordsTotal" => $filtered_rows,
    "recordsFiltered" => ScheduleClass::ListByPDO(),
    "data" => $data
);

echo json_encode($output);