<?php

/**
 * File: TourClass.php
 * Versions: 1.0
 * Author:
 * Folder: classes
 * Description
 */

// Include TimeZone

include __DIR__ . "/../config/timezone.php";

class TourClass
{
    // Primary Key
    // public $id

    // Tour 
    public $title, $thumbnail, $images, $price_total, $price_children, $price_person, $content, $days, $number_of_seat, $isShow;

    // Foreign Key
    public $location_id;

    /**
     * Construct
     */
    public function __construct($title, $thumbnail, $images, $price_total, $price_children, $price_person, $content, $days, $number_of_seat, $isShow, $location_id)
    {
        $this->title = $title;
        $this->thumbnail = $thumbnail;
        $this->images = $images;
        $this->price_total = $price_total;
        $this->price_children = $price_children;
        $this->price_person = $price_person;
        $this->content = $content;
        $this->days = $days;
        $this->number_of_seat = $number_of_seat;
        $this->isShow = $isShow;
        $this->location_id = $location_id;
    }

    // Function
    public static function Create(TourClass $tourClass)
    {
        $conn = connectDB();

        $sql = "INSERT INTO `tour` (`title`, `thumbnail`, `images`, `price_total`, `price_children`, `price_person`, `content`, `days`, `number_of_seat`, `isShow`, `location_id`) 
                VALUES ('$tourClass->title', '$tourClass->thumbnail', '$tourClass->images', '$tourClass->price_total', '$tourClass->price_children', '$tourClass->price_person', '$tourClass->content', '$tourClass->days', '$tourClass->number_of_seat', '$tourClass->isShow', '$tourClass->location_id')";

        $result = $conn->query($sql);

        disconnectDB($conn);
        return $result;
    }

    public static function Read()
    {
        $conn = connectDB();

        $sql = "SELECT * FROM `tour`";

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

    public static function Update($id, TourClass $tourClass)
    {
        $conn = connectDB();

        $sql = "UPDATE `tour` SET `title` = '$tourClass->title', `thumbnail` = '$tourClass->thumbnail', `images` = '$tourClass->images', `price_total` = '$tourClass->price_total', `price_children` = '$tourClass->price_children',
                `price_person` = '$tourClass->price_person', `content` = '$tourClass->content', `days` = '$tourClass->days', `number_of_seat` = '$tourClass->number_of_seat', `isShow` = '$tourClass->isShow', `location_id` = '$tourClass->location_id' WHERE `tour`.`id` = '$id'";

        $result = $conn->query($sql);

        disconnectDB($conn);
        return $result;
    }

    public static function Delete($id)
    {
        $conn = connectDB();

        $sql = "DELETE FROM `tour` WHERE `tour`.`id` = '$id'";

        $result = $conn->query($sql);

        disconnectDB($conn);
        return $result;
    }

    public static function FindById($id)
    {
        $conn = connectDB();

        $sql = "SELECT * FROM `tour` WHERE `id` = '$id'";
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

    public static function FindByTitle($title)
    {
        $conn = connectDB();

        $sql = "SELECT * FROM `tour` WHERE `title` LIKE '%$title%'";
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

        $sql = "SELECT * FROM `tour` WHERE `id` = '$id' LIMIT 1";

        $result = $conn->query($sql);
        $row = mysqli_fetch_assoc($result);

        disconnectDB($conn);
        echo json_encode($row);
    }

    // Datatables
    public static function ListByPDO()
    {
        $conn = connectPDO();

        $sql = "SELECT * FROM `tour`";

        $statement = $conn->prepare($sql);
        $statement->execute();
        $statement->fetchAll();

        // $conn = null;

        return $statement->rowCount();
    }

    // Pagination
    public static function ReadByPagination()
    {
        $conn = connectDB();

        // Check Method
        if (isset($_GET["page"])) {
            $page = $_GET["page"];
        } else {
            $page = 1;
        }

        $row_list = 10;
        $from_list = ($page - 1) * $row_list;

        $sql = "SELECT * FROM `tour` ORDER BY id DESC LIMIT $from_list, $row_list";

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

    public static function ReadByLimit($limit = 10) 
    {
        $conn = connectDB();

        $sql = "SELECT * FROM `event` ORDER BY id DESC LIMIT $limit";

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

    public static function RowTour($row = 10) 
    {
        return $row;
    }
}