<?php 

/**
 * File: CategoryClass.php
 * Versions: 1.0
 * Author:
 * Folder: classes
 * Description
 */

// Include TimeZone

include __DIR__ . "/../config/timezone.php";

Class CategoryClass {
    // Primary Key
    // public $id;

    // Category
    public $category, $content;

    // Create & Update
    // public $create_at, $update_at

    /**
     * Construct
     */
    public function __construct($category, $content) {
        $this->category = $category;
        $this->content = $content;
    }

    // Function
    public static function Create(CategoryClass $categoryClass) {
        $conn = connectDB();

        $sql = "INSERT INTO `category` (`category`, `content`)
        VALUES ('$categoryClass->category', '$categoryClass->content')";

        $result = $conn->query($sql);

        disconnectDB($conn);
        return $result;
    }

    public static function Read() {
        $conn = connectDB();

        $sql = "SELECT * FROM `category`";

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

    public static function Update($id, CategoryClass $categoryClass) {
        $conn = connectDB();

        $sql = "UPDATE `category` SET `category` = '$categoryClass->category', `content` = '$categoryClass->content' 
                WHERE `category`.`id` = '$id'";

        $result = $conn->query($sql);

        disconnectDB($conn);
        return $result;
    }

    public static function FindById($id) {
        $conn = connectDB();

        $sql = "SELECT * FROM `category` WHERE `id` = '$id'";
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

    public static function FindByCategory($category) {
        $conn = connectDB();

        $sql = "SELECT * FROM `category` WHERE `category` LIKE '%$category%'";
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

        $sql = "SELECT * FROM `category` WHERE `id` = '$id' LIMIT 1";

        $result = $conn->query($sql);
        $row = mysqli_fetch_assoc($result);

        disconnectDB($conn);
        echo json_encode($row);
    }
}

?>