<?php 

// Required Config / Include Database, Auth
session_start();

include "../../config/database.php";
include "../../classes/AuthClass.php";

require_once "../../config/google.php";

// Google Login

if(!isset($_SESSION["user_token"])) {

}

if(isset($_GET["code"])) {
    $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

    $google_client->setAccessToken($token["access_token"]);

    $google_service = new Google_Service_Oauth2($google_client);

    $data = $google_service->userinfo->get();

    $info_data = [
        'email' => $data["email"],
        'first_name' => $data["giveName"],
        'last_name' => $data["familyName"],
        'gender' => $data["gender"],
        'full_name' => $data["name"],
        'picture' => $data["picture"],
        'verified_email' => $data["verifiedEmail"],
        'token' => $data["id"],
    ];

    // Account
    $username = $info_data["token"];
    $password = '';
    $role = 0;
    $active = $info_data["verified_email"];
    $token = 0;

    // Profile
    $fullname = $info_data["full_name"];
    $email = $info_data["email"];
    $phone = '';
    $gender = $info_data["gender"];
    $dob = date("Y-m-d");
    $avatar = $info_data["picture"];

    $create_auth = new AuthClass($username, $password, $role, $active, $token, $fullname, $email, $phone, $gender, $dob, $avatar);

    if(AuthClass::VerifyGoogle($username, $create_auth) === false) {
        $_SESSION["navbar_username"] = substr($email, 0, strpos($email, '@'));

        $_SESSION["user_token"] = $info_data["token"];

        header("Location: ../../views/main/index.php");
        exit();
    } else {
        $_SESSION["navbar_username"] = substr($email, 0, strpos($email, '@'));

        $_SESSION["user_token"] = $info_data["token"];

        header("Location: ../../views/main/index.php");
        exit();
    }

}


?>