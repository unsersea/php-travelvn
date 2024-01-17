<?php

// Single Validate - v1.0

if (!empty($_REQUEST["price_total"])) {
    $price_total = $_REQUEST["price_total"];

    if ($price_total > 0 && $price_total < 100000000) {
        echo json_encode(true);
    } else {
        echo json_encode(false);
    }
}