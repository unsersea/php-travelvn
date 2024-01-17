<?php

// Single Validate - v1.0

if (!empty($_REQUEST["days"])) {
    $days = $_REQUEST["days"];

    if ($days > 0 && $days <= 90) {
        echo json_encode(true);
    } else {
        echo json_encode(false);
    }
}