<?php

/**
 * File: AuthClass.php
 * Versions: 1.0
 * Author:
 * Folder: classes
 * Description:
 */

// Include TimeZone

include __DIR__ . "/../config/timezone.php";

class AuthClass
{
    // Primary Key
    public $username;

    // Account
    public $password, $role, $token, $active;

    // Profile
    public $fullname, $email, $phone, $gender, $dob, $avatar;

    // Create & Update
    // public $create_at, $update_at;

    /**
     * Construct
     */
    public function __construct($username, $password, $role, $active, $token, $fullname, $email, $phone, $gender, $dob, $avatar)
    {
        $this->username = $username;
        $this->password = $password;
        $this->role = $role;
        $this->active = $active;
        $this->token = $token;
        $this->fullname = $fullname;
        $this->email = $email;
        $this->phone = $phone;
        $this->gender = $gender;
        $this->dob = $dob;
        $this->avatar = $avatar;
    }

    // Function
    public static function Login($username)
    {
        $conn = connectDB();

        $sql = "SELECT * FROM `account` WHERE `username` = '$username'";

        $result = $conn->query($sql);

        if ($result === false) {
        } else {
            $array = array();

            while ($row = $result->fetch_assoc()) {
                $array = $row;
            }

            // while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            //     $array = $row;
            // }
        }

        disconnectDB($conn);
        return $array;
    }

    public static function Register(AuthClass $authClass)
    {
        $conn = connectDB();

        // $date = date("j/n/Y - g:i a");

        $sql_account = "INSERT INTO `account` (`username`, `password`, `role`, `active`, `token`)
                        VALUES ('$authClass->username', '$authClass->password', '$authClass->role', '$authClass->active', '$authClass->token')";
        $sql_profile = "INSERT INTO `profile` (`username`, `fullname`, `email`, `phone`, `gender`, `dob`, `avatar`)
                        VALUES ('$authClass->username', '$authClass->fullname', '$authClass->email', '$authClass->phone', '$authClass->gender', '$authClass->dob', '$authClass->avatar')";

        $result = $conn->query($sql_account);
        $result = $conn->query($sql_profile);

        disconnectDB($conn);
        return $result;
    }

    public static function Profile($username)
    {
        $conn = connectDB();

        $sql = "SELECT * FROM `profile` WHERE `username` = '$username'";

        $result = $conn->query($sql);

        if ($result === false) {
        } else {
            $array = array();

            while ($row = $result->fetch_assoc()) {
                $array = $row;
            }

            // while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            //     $array = $row;
            // }
        }

        disconnectDB($conn);
        return $array;
    }

    public static function ForgotPassword($username)
    {
        $conn = connectDB();

        // $date = date("j/n/Y - g:i a");

    }

    public static function UpdateProfile($id, AuthClass $authClass)
    {
        $conn = connectDB();

        // $date = date("j/n/Y - g:i a");

        $sql = "UPDATE `profile` SET
                `fullname` = '$authClass->fullname', `phone` = '$authClass->phone', `gender` = '$authClass->gender', `dob` = '$authClass->dob',
                `avatar` = '$authClass->avatar' WHERE `profile`.`id` = '$id'";

        $result = $conn->query($sql);

        disconnectDB($conn);
        return $result;
    }

    public static function VerifyAccount($token, $username)
    {
        $conn = connectDB();

        $sql_find = "SELECT * FROM `account` WHERE `token` = '$token'";

        $result_find = $conn->query($sql_find);

        if (mysqli_num_rows($result_find) > 0) {
            $set_token = 0;
            $set_active = 1;
            $sql_update = "UPDATE `account` SET `active` = '$set_active', `token` = '$set_token' WHERE `account`.`username` = '$username'";
            $result_update = $conn->query($sql_update);
        }

        disconnectDB($conn);
        return $result_update;
    }

    public static function VerifyGoogle($id_google, AuthClass $authClass)
    {
        $conn = connectDB();

        $sql_find = "SELECT * FROM `account` WHERE `username` = '$id_google'";

        $result_find = $conn->query($sql_find);

        if (mysqli_num_rows($result_find) > 0) {

            disconnectDB($conn);
            return true;

        } else {
            // $date = date("j/n/Y - g:i a");

            $sql_account = "INSERT INTO `account` (`username`, `password`, `role`, `active`, `token`)
                        VALUES ('$authClass->username', '$authClass->password', '$authClass->role', '$authClass->active', '$authClass->token')";
            $sql_profile = "INSERT INTO `profile` (`username`, `fullname`, `email`, `phone`, `gender`, `dob`, `avatar`)
                        VALUES ('$authClass->username', '$authClass->fullname', '$authClass->email', '$authClass->phone', '$authClass->gender', '$authClass->dob', '$authClass->avatar')";

            $conn->query($sql_account);
            $conn->query($sql_profile);

            disconnectDB($conn);
            return false;
        }
    }
}