<?php

/**
 * File: EventClass.php
 * Versions: 1.0
 * Author:
 * Folder: classes
 * Description
 */

// Include TimeZone

include __DIR__ . "/../config/timezone.php";

class EventClass
{
    // Primary Key
    // public $id

    // Event
    public $title, $thumbnail, $images, $header, $content, $isShow, $datetime;

    // Foreign Key
    public $category_id;

    /**
     * Construct
     *
     * @param [type] $title
     * @param [type] $thumbnail
     * @param [type] $images
     * @param [type] $header
     * @param [type] $content
     * @param [type] $isShow
     * @param [type] $datetime
     */
    public function __construct($title, $thumbnail, $images, $header, $content, $isShow, $datetime, $category_id)
    {
        $this->title = $title;
        $this->thumbnail = $thumbnail;
        $this->images = $images;
        $this->header = $header;
        $this->content = $content;
        $this->isShow = $isShow;
        $this->datetime = $datetime;
        $this->category_id = $category_id;
    }

    // Function
    public static function Create(EventClass $eventClass)
    {
        $conn = connectDB();

        $sql = "INSERT INTO `event` (`title`, `thumbnail`, `images`, `header`, `content`, `isShow`, `datetime`, `category_id`)
                VALUES ('$eventClass->title', '$eventClass->thumbnail', '$eventClass->images', '$eventClass->header', '$eventClass->content', '$eventClass->isShow', '$eventClass->datetime', '$eventClass->category_id')";

        $result = $conn->query($sql);

        disconnectDB($conn);
        return $result;
    }

    public static function Read()
    {
        $conn = connectDB();

        $sql = "SELECT * FROM `event`";

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

    public static function Update($id, EventClass $eventClass)
    {
        $conn = connectDB();

        $sql = "UPDATE `event` SET `title` = '$eventClass->title', `thumbnail` = '$eventClass->thumbnail', `images` = '$eventClass->images', `header` = '$eventClass->header',
                `content` = '$eventClass->content', `isShow` = '$eventClass->isShow', `datetime` = '$eventClass->datetime', `category_id` = '$eventClass->category_id' WHERE `event`.`id` = '$id'";

        $result = $conn->query($sql);

        disconnectDB($conn);
        return $result;
    }

    public static function Delete($id)
    {
        $conn = connectDB();

        $sql = "DELETE FROM `event` WHERE `event`.`id` = '$id'";

        $result = $conn->query($sql);

        disconnectDB($conn);
        return $result;
    }

    public static function FindById($id)
    {
        $conn = connectDB();

        $sql = "SELECT * FROM `event` WHERE `id` = '$id'";
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

    public static function FindByCategory($category_id)
    {
        $conn = connectDB();

        $sql = "SELECT * FROM `event` WHERE `category_id` = '$category_id'";
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

        $sql = "SELECT * FROM `event` WHERE `title` LIKE '%$title%'";
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

        $sql = "SELECT * FROM `event` WHERE `id` = '$id' LIMIT 1";

        $result = $conn->query($sql);
        $row = mysqli_fetch_assoc($result);

        disconnectDB($conn);
        echo json_encode($row);
    }

    // Datatables
    public static function ListByPDO()
    {
        $conn = connectPDO();

        $sql = "SELECT * FROM `event`";

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

        $sql = "SELECT * FROM `event` ORDER BY id DESC LIMIT $from_list, $row_list";

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

    public static function RowEvent($row = 10) {
        return $row;
    }
}