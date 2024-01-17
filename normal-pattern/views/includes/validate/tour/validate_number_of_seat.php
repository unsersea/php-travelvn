<?php

// Single Validate - v1.0

if (!empty($_REQUEST["number_of_seat"])) {
    $number_of_seat = $_REQUEST["number_of_seat"];

    if ($number_of_seat > 0 && $number_of_seat <= 1000) {
        echo json_encode(true);
    } else {
        echo json_encode(false);
    }
}