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

        $statement = $conn->query($sql);

        disconnectDB($conn);
        return $statement;
    }

    public static function Read() {
        $conn = connectDB();

        $sql = "SELECT * FROM `category`";

        $statement = $conn->query($sql);

        if($statement === false) {

        } else {
            $array = array();

            while($row = $statement->fetch_assoc()) {
                $array[] = $row;
            }
            // while ($row = mysqli_fetch_array($statement, MYSQLI_ASSOC)) {
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

        $statement = $conn->query($sql);

        disconnectDB($conn);
        return $statement;
    }

    public static function Delete($id) {
        $conn = connectDB();

        $sql = "DELETE FROM `category` WHERE `category`.`id` = '$id'";

        $statement = $conn->query($sql);

        disconnectDB($conn);
        return $statement;
    }

    public static function FindById($id) {
        $conn = connectDB();

        $sql = "SELECT * FROM `category` WHERE `id` = '$id'";
        $statement = $conn->query($sql);

        if ($statement === false) {

        } else {
            $array = array();

            while ($row = $statement->fetch_assoc()) {
                $array = $row;
            }
            // while ($row = mysqli_fetch_array($statement, MYSQLI_ASSOC)) {
            //     $array = $row;
            // }
        }

        disconnectDB($conn);
        return $array;
    }

    public static function FindByCategory($category) {
        $conn = connectDB();

        $sql = "SELECT * FROM `category` WHERE `category` LIKE '%$category%'";
        $statement = $conn->query($sql);

        if ($statement === false) {

        } else {
            $array = array();

            while ($row = $statement->fetch_assoc()) {
                $array = $row;
            }
            // while ($row = mysqli_fetch_array($statement, MYSQLI_ASSOC)) {
            //     $array = $row;
            // }
        }

        disconnectDB($conn);
        return $array;
    }

    public static function JsonEncodeFindById($id) {
        $conn = connectDB();

        $sql = "SELECT * FROM `category` WHERE `id` = '$id' LIMIT 1";

        $statement = $conn->query($sql);
        $row = mysqli_fetch_assoc($statement);

        disconnectDB($conn);
        echo json_encode($row);
    }

    // Datatables
    public static function ListByPDO() {
        $conn = connectPDO();

        $sql = "SELECT * FROM `category`";

        $statement = $conn->prepare($sql);
        $statement->execute();
        $statement->fetchAll();

        // $conn = null;
        
        return $statement->rowCount();
    }
}

?>