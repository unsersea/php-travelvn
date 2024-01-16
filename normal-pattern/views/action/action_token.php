<?php

// Required Config / Include Database, Auth
include "../../config/database.php";
include "../../classes/AuthClass.php";

session_start();

// print_r($_REQUEST);

if (!empty(isset($_REQUEST["token"]))) {
    $token = $_REQUEST["token"];

    $session_token = $_SESSION["token"];
    $session_email = $_SESSION["email"];
    $session_username = $_SESSION["username"];

    if ($token == $session_token) {
        AuthClass::VerifyAccount($token, $session_username);

        // Add Session Navbar Name
        $_SESSION["navbar_username"] = $session_username;

        // Unset
        unset($_SESSION["token"]);
        unset($_SESSION["email"]);

        echo "success";
    } else {
        // echo json_encode("");
        echo "*Mã Xác Minh Không Chính Xác";
    }

}