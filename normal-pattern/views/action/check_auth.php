<?php

// Single Check Auth - v1.0
// Required Config / Include Database, Auth
include "../../config/database.php";
include "../../classes/AuthClass.php";

if (!empty($_REQUEST["username"])) {
    $check_username = $_REQUEST["username"];

    $check_auth = AuthClass::Login($check_username);

    if ($check_auth == true) {
        echo json_encode(false);
    } else {
        echo json_encode(true);
    }
}