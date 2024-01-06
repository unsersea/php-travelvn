<?php 

/**
 * File: ScheduleClass.php
 * Versions: 1.0
 * Author:
 * Folder: classes
 * Description
 */

// Include TimeZone

include __DIR__ . "/../config/timezone.php";

Class ScheduleClass {
    // Primary Key
    // public $id

    // Schedule
    public $start_datetime, $end_datetime, $remaining, $note;

    // Foreign Key
    public $tour_id, $feedback_id;

    /**
     * Construct
     */
    public function __construct($start_datetime, $end_datetime, $remaining, $note, $tour_id, $feedback_id) {
        $this->start_datetime = $start_datetime;
        $this->end_datetime = $end_datetime;
        $this->remaining = $remaining;
        $this->note = $note;
        $this->tour_id = $tour_id;
        $this->feedback_id = $feedback_id;
    }

    // Function
    public static function Create(ScheduleClass $scheduleClass) {
        $conn = connectDB();

        $sql = "INSERT INTO `schedule` (`start_datetime`, `end_datetime`, `remaining`, `note`, `tour_id`, `feedback_id`)
                VALUES ('$scheduleClass->start_datetime', '$scheduleClass->end_datetime', '$scheduleClass->remaining', '$scheduleClass->note', '$scheduleClass->tour_id', '$scheduleClass->feedback_id')";

        $result = $conn->query($sql);

        disconnectDB($conn);
        return $result;
    }

    public static function Read() {
        $conn = connectDB();

        $sql = "SELECT * FROM `schedule`";

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

    public static function Update($id, ScheduleClass $scheduleClass) {
        $conn = connectDB();

        $sql = "UPDATE `schedule` SET `start_datetime` = '$scheduleClass->start_datetime', `end_datetime` = '$scheduleClass->end_datetime', `remaining` = '$scheduleClass->remaining',
                `note` = '$scheduleClass->note', `tour_id` = '$scheduleClass->tour_id', `feedback_id` = '$scheduleClass->feedback_id' WHERE `schedule`.`id` = '$id'";

        $result = $conn->query($sql);

        disconnectDB($conn);
        return $result;
    }

    public static function Delete($id) {
        $conn = connectDB();

        $sql = "DELETE FROM `schedule` WHERE `schedule`.`id` = '$id'";

        $result = $conn->query($sql);

        disconnectDB($conn);
        return $result;
    }

    public static function FindById($id) {
        $conn = connectDB();

        $sql = "SELECT * FROM `schedule` WHERE `id` = '$id'";
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

        $sql = "SELECT * FROM `schedule` WHERE `id` = '$id' LIMIT 1";

        $result = $conn->query($sql);
        $row = mysqli_fetch_assoc($result);

        disconnectDB($conn);
        echo json_encode($row);
    }
}

?>