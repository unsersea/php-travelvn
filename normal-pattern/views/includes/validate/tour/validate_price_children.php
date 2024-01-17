<?php

// Single Validate - v1.0

if (!empty($_REQUEST["price_children"])) {
    $price_children = $_REQUEST["price_children"];

    if ($price_children > 0 && $price_children < 100000000) {
        echo json_encode(true);
    } else {
        echo json_encode(false);
    }
}