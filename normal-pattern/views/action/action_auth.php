<?php 

// Required Config / Include Database, Auth
include "../../config/database.php";
include "../../classes/AuthClass.php";

if($_SERVER["REQUEST_METHOD"] === "POST") {
    
    // Check Empty

    if(!empty($_REQUEST["action"])) {
        $action = $_REQUEST["action"];

        // Register
        if($action === "register") {
            // print_r($_REQUEST);

            // Account
            $username = $_REQUEST["username"];
            $password = $_REQUEST["password"];
            $role = 0;
            $active = 0;

            // Profile
            $fullname = null;
            $email = $_REQUEST["email"];
            $phone = $_REQUEST["phone"];
            $gender = null;
            $dob = date("Y-m-d");
            $avatar = null;
            
            $encrypt_password = password_hash($password, PASSWORD_DEFAULT);
            $token = mt_rand(1111, 9999);

            // $token = substr(number_format(time()* rand(), 0, '', ''), 0, 4);
            $create_auth = new AuthClass($username, $encrypt_password, $role, $active, $token, $fullname, $email, $phone, $gender, $dob, $avatar);

            if(AuthClass::Register($create_auth)) {
                // Send Email
                require_once "../../config/email.php";
                
                $phpmailer->addAddress($email);
                $phpmailer->Subject = "Email verification";
                $phpmailer->Body = "<p>Your verification code is: <b style='font-size:24px;'>". $token ."</b></p>";
                $phpmailer->send();

                $_SESSION["token"] = $token;
                $_SESSION["email"] = $email;
                $_SESSION["username"] = $username;
            }

        }
    }
}

?>