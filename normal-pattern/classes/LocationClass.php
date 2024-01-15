<?php 

/**
 * File: LocationClass.php
 * Versions: 1.0
 * Author:
 * Folder: classes
 * Description
 */

// Include TimeZone

include __DIR__ . "/../config/timezone.php";

Class LocationClass {
    // Primary Key
    // public $id

    // Location
    public $location_name, $city, $acronym, $address, $isShow;

    /**
     * Construct
     */

    public function __construct($location_name, $city, $acronym, $address, $isShow) {
        $this->location_name = $location_name;
        $this->city = $city;
        $this->acronym = $acronym;
        $this->address = $address;
        $this->isShow = $isShow;
    }

    // Function
    public static function Create(LocationClass $locationClass) {
        $conn = connectDB();

        $sql = "INSERT INTO `location` (`location_name`, `city`, `acronym`, `address`, `isShow`)
                VALUES ('$locationClass->location_name', '$locationClass->city', '$locationClass->acronym', '$locationClass->address', '$locationClass->isShow')";

        $result = $conn->query($sql);

        disconnectDB($conn);
        return $result;
    }

    public static function Read() {
        $conn = connectDB();

        $sql = "SELECT * FROM `location`";

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

    public static function Update($id, LocationClass $locationClass) {
        $conn = connectDB();

        $sql = "UPDATE `location` SET `location_name` = '$locationClass->location_name', `city` = '$locationClass->city', `acronym` = '$locationClass->acronym',
                `address` = '$locationClass->address', `isShow` = '$locationClass->isShow' WHERE `location`.`id` = '$id'";

        $result = $conn->query($sql);

        disconnectDB($conn);
        return $result;
    }

    public static function Delete($id) {
        $conn = connectDB();

        $sql = "DELETE FROM `location` WHERE `location`.`id` = '$id'";

        $result = $conn->query($sql);

        disconnectDB($conn);
        return $result;
    }

    public static function FindById($id) {
        $conn = connectDB();

        $sql = "SELECT * FROM `location` WHERE `id` = '$id'";
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

    public static function FindByLocationName($location_name) {
        $conn = connectDB();

        $sql = "SELECT * FROM `location` WHERE `location_name` LIKE '%$location_name%'";
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

        $sql = "SELECT * FROM `location` WHERE `id` = '$id' LIMIT 1";

        $result = $conn->query($sql);
        $row = mysqli_fetch_assoc($result);

        disconnectDB($conn);
        echo json_encode($row);
    }

    // Datatables
    public static function ListByPDO() {
        $conn = connectPDO();

        $sql = "SELECT * FROM `location`";

        $statement = $conn->prepare($sql);
        $statement->execute();
        $statement->fetchAll();

        // $conn = null;
        
        return $statement->rowCount();
    }
}

?>