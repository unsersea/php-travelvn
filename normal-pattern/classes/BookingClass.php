<?php 

/**
 * File: BookingClass.php
 * Versions: 1.0
 * Author:
 * Folder: classes
 * Description
 */

// Include TimeZone

include __DIR__ . "/../config/timezone.php";

Class BookingClass {
    // Primary Key
    // public $id

    // Booking
    public $payment_method, $note, $datetime, $total_price_children, $total_price_person, $amount_children, $amount_person, $status, $isShow;
    
    // Foreign Key
    public $account_id, $schedule_id;

    /**
     * Construct
     */
    public function __construct($payment_method, $note, $datetime, $total_price_children, $total_price_person, $amount_children, $amount_person, $status, $isShow, $account_id, $schedule_id) {
        $this->payment_method = $payment_method;
        $this->note = $note;
        $this->datetime = $datetime;
        $this->total_price_children = $total_price_children;
        $this->total_price_person = $total_price_person;
        $this->amount_children = $amount_children;
        $this->amount_person = $amount_person;
        $this->status = $status;
        $this->isShow = $isShow;
        $this->account_id = $account_id;
        $this->schedule_id = $schedule_id;
    }

    // Function
    public static function Create(BookingClass $bookingClass) {
        $conn = connectDB();

        $sql = "INSERT INTO `booking` (`payment_method`, `note`, `datetime`, `total_price_children`, `total_price_person`, `amount_children`, `amount_person`, `status`, `isShow`, `account_id`, `schedule_id`) 
                VALUES ('$bookingClass->payment_method', '$bookingClass->note', '$bookingClass->datetime', '$bookingClass->total_price_children', '$bookingClass->total_price_person', '$bookingClass->amount_children', '$bookingClass->amount_person', '$bookingClass->status', '$bookingClass->isShow', '$bookingClass->account_id', '$bookingClass->schedule_id')";

        $result = $conn->query($sql);

        disconnectDB($conn);
        return $result;
    }

    public static function Read() {
        $conn = connectDB();

        $sql = "SELECT * FROM `booking`";

        $result = $conn->query($sql);

        if($result === false) {

        } else {
            $array = array();

            while($row = $result->fetch_assoc()) {
                $array[] = $row;
            }
            // while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            //     $array = $row;
            // }
        }

        disconnectDB($conn);
        return $array;
    }

    public static function Update($id, BookingClass $bookingClass) {
        $conn = connectDB();

        $sql = "";

        $result = $conn->query($sql);

        disconnectDB($conn);
        return $result;
    }

    public static function Delete($id) {
        $conn = connectDB();

        $sql = "DELETE FROM `booking` WHERE `booking`.`id` = '$id'";

        $result = $conn->query($sql);

        disconnectDB($conn);
        return $result;
    }

    public static function FindById($id) {
        $conn = connectDB();

        $sql = "SELECT * FROM `booking` WHERE `id` = '$id'";
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

    public static function JsonEncodeFindById($id) {
        $conn = connectDB();

        $sql = "SELECT * FROM `booking` WHERE `id` = '$id' LIMIT 1";

        $result = $conn->query($sql);
        $row = mysqli_fetch_assoc($result);

        disconnectDB($conn);
        echo json_encode($row);
    }
}

?>