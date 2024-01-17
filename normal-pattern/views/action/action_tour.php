<?php

// Required Config / Include Database, Auth
include "../../config/database.php";
include "../../classes/LocationClass.php";
include "../../classes/TourClass.php";

// Test Run Data
// print_r($_REQUEST);

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Check Empty

    if (!empty($_REQUEST["action"])) { 
        $action = $_REQUEST["action"];

        // Set Up Folder
        $folder_images = "../../upload/images";
        $folder_thumbnail = "../../upload/thumbnail";

        // Create
        if ($action == "submit_tour_create") {
            $title = $_REQUEST["title"];
            $price_total = $_REQUEST["price_total"];
            $price_children = $_REQUEST["price_children"];
            $price_person = $_REQUEST["price_person"];

            // Images | Thumbnail
            ## Images
            $images = $_FILES["images"]["name"];
            $images_tmp_name = $_FILES["images"]["tmp_name"];
            $images_extension = explode(".", $images);
            $images_extension = strtolower(end($images_extension));
            // Random Name
            $images_rand = rand() . "." . $images_extension;
            // Path
            $images_path = $folder_images . "/" . $images_rand;

            ## Thumbnail
            $thumbnail = $_FILES["thumbnail"]["name"];
            $thumbnail_tmp_name = $_FILES["thumbnail"]["tmp_name"];
            $thumbnail_extension = explode(".", $thumbnail);
            $thumbnail_extension = strtolower(end($thumbnail_extension));
            // Random Name
            $thumbnail_rand = rand() . "." . $thumbnail_extension;
            // Path
            $thumbnail_path = $folder_thumbnail . "/" . $thumbnail_rand;

            // Move Upload
            move_uploaded_file($images_tmp_name, $images_path);
            move_uploaded_file($thumbnail_tmp_name, $thumbnail_path);

            $content = $_REQUEST["get-tmce-content-tour"];
            $days = $_REQUEST["days"];
            $number_of_seat = $_REQUEST["number_of_seat"];
            $isShow = 1;
            $location_id = $_REQUEST["location_id"];

            $create_tour = new TourClass($title, $thumbnail_rand, $images_rand, $price_total, $price_children, $price_person, $content, $days, $number_of_seat, $isShow, $location_id);

            TourClass::Create($create_tour);
        }
    }
}