<?php

// Single Validate - v1.0

if (!empty($_REQUEST["price_person"])) {
    $price_person = $_REQUEST["price_person"];

    if ($price_person > 0 && $price_person < 100000000) {
        echo json_encode(true);
    } else {
        echo json_encode(false);
    }
}