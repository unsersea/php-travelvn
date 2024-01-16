<?php

/**
 * File: FeedbackClass.php
 * Versions: 1.0
 * Author:
 * Folder: classes
 * Description
 */

// Include TimeZone

include __DIR__ . "/../config/timezone.php";

class FeedbackClass
{
    // Primary Key
    // public $id

    // Feedback
    public $fullname, $phone, $email, $promotion, $quality, $note, $isShow;

    // Foreign Key
    public $user_id, $admin_id, $booking_id;

    /**
     * Construct
     */
    public function __construct($fullname, $phone, $email, $promotion, $quality, $note, $isShow, $user_id, $admin_id, $booking_id)
    {
        $this->fullname = $fullname;
        $this->phone = $phone;
        $this->email = $email;
        $this->promotion = $promotion;
        $this->quality = $quality;
        $this->note = $note;
        $this->isShow = $isShow;
        $this->user_id = $user_id;
        $this->admin_id = $admin_id;
        $this->booking_id = $booking_id;
    }

    // Function
    public static function Create(FeedbackClass $feedbackClass)
    {
        $conn = connectDB();

        $sql = "INSERT INTO `feedback` (`fullname`, `phone`, `email`, `promotion`, `quality`, `note`, `isShow`, `user_id`, `admin_id`, `booking_id`)
                VALUES ('$feedbackClass->fullname', '$feedbackClass->phone', '$feedbackClass->email', '$feedbackClass->promotion', '$feedbackClass->quality', '$feedbackClass->note', '$feedbackClass->isShow', '$feedbackClass->user_id', '$feedbackClass->admin_id', '$feedbackClass->booking_id')";

        $result = $conn->query($sql);

        disconnectDB($conn);
        return $result;
    }

    public static function Read()
    {
        $conn = connectDB();

        $sql = "SELECT * FROM `feedback`";

        $result = $conn->query($sql);

        if ($result === false) {

        } else {
            $array = array();

            while ($row = $result->fetch_assoc()) {
                $array[] = $row;
            }
            // while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            //     $array = $row;
            // }
        }

        disconnectDB($conn);
        return $array;
    }

    public static function Update($id, FeedbackClass $feedbackClass)
    {
        $conn = connectDB();

        $sql = "";
        $result = $conn->query($sql);

        disconnectDB($conn);
        return $result;
    }

    public static function Delete($id)
    {
        $conn = connectDB();

        $sql = "DELETE FROM `feedback` WHERE `feedback`.`id` = '$id'";

        $result = $conn->query($sql);

        disconnectDB($conn);
        return $result;
    }

    public static function FindById($id)
    {
        $conn = connectDB();

        $sql = "SELECT * FROM `feedback` WHERE `id` = '$id'";
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

    public static function JsonEncodeFindById($id)
    {
        $conn = connectDB();

        $sql = "SELECT * FROM `feedback` WHERE `id` = '$id' LIMIT 1";

        $result = $conn->query($sql);
        $row = mysqli_fetch_assoc($result);

        disconnectDB($conn);
        echo json_encode($row);
    }
}