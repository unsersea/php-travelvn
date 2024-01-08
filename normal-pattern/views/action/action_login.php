<?php 

// Required Config / Include Database, Auth
include "../../config/database.php";
include "../../classes/AuthClass.php";

// print_r($_REQUEST);

if(!empty($_REQUEST["username"]) && !empty($_REQUEST["password"])) {
    $username = $_REQUEST["username"];
    $password = $_REQUEST["password"];

    $check_auth = AuthClass::Login($username);

    if($check_auth == false) {
        echo "*Tài Khoản Này Không Tồn Tại";
    }  else {
        if($check_auth["password"] != password_verify($password, $check_auth["password"])) {
            echo "*Mật Khẩu Không Chính Xác";
        } else {
            // Run session()
            session_start();
            if($check_auth["role"] == 0) {
                $_SESSION["navbar_username"] = $username;
                echo "*user account success";
            }

            if($check_auth["role"] == 1) {
                $_SESSION["sidebar_username"] = $username;
                echo "*admin account success";
            }
        }
    }

} else {
    echo "*Vui Lòng Điền Đầy Đủ Thông Tin";
}

?>