<?php 

// Required Config / Include Database, Auth
include "../../config/database.php";
include "../../classes/CategoryClass.php";
include "../../classes/EventClass.php";

// Test Run Data
// print_r($_REQUEST);

if($_SERVER["REQUEST_METHOD"] === "POST") {

    // Check Empty

    if(!empty($_REQUEST["action"])) {
        $action = $_REQUEST["action"];

        // Set Up Folder
        $folder_images = "../../upload/images";
        $folder_thumbnail = "../../upload/thumbnail";

        // Create
        if($action == "submit_event_create") {
            $title = $_REQUEST["title"];

            $header = $_REQUEST["get-tmce-header-event"];
            $content = $_REQUEST["get-tmce-content-event"];
            $isShow = 1;
            $datetime = $_REQUEST["datetime"];

            // Check Category Foreign Key
            if(!empty($_REQUEST["category"])) {
                $replace = array('[', ']', '"');
                $category = str_replace($replace, "", json_encode($_REQUEST["category"], JSON_UNESCAPED_UNICODE));
            } else {
                $category = "";
            }

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

            $create_event = new EventClass($title, $thumbnail_rand, $images_rand, $header, $content, $isShow, $datetime, $category);

            EventClass::Create($create_event);
        }
        
        // Update
        if($action == "submit_event_update") {
            $id = $_REQUEST["id"];
            $title = $_REQUEST["title"];

            $header = $_REQUEST["get-tmce-header-event-update"];
            $content = $_REQUEST["get-tmce-content-event-update"];
            $isShow = 1;
            $datetime = $_REQUEST["datetime"];

            // Check Category Foreign Key
            if(!empty($_REQUEST["category"])) {
                $replace = array('[', ']', '"');
                $category = str_replace($replace, "", json_encode($_REQUEST["category"], JSON_UNESCAPED_UNICODE));
            } else {
                $category = "";
            }

            $find_event = EventClass::FindById($id);

            // Set Extension Rand
            $images_rand = "";
            $thumbnail_rand = "";

            ## Images
            if((isset($_FILES["images"])) && (!$_FILES["images"]["error"])) {
                ## Images
                $images = $_FILES["images"]["name"];
                $images_tmp_name = $_FILES["images"]["tmp_name"];
                $images_extension = explode(".", $images);
                $images_extension = strtolower(end($images_extension));
                // Random Name
                $images_rand = rand() . "." . $images_extension;
                // Path
                $images_path = $folder_images . "/" . $images_rand;

                // Unlink
                unlink($folder_images . "/" . $find_event[0]["images"]);
                
                move_uploaded_file($images_tmp_name, $images_path);

            } else {
                $images_rand = $find_event["images"];
            }

            ## Thumbnail
            if((isset($_FILES["thumbnail"])) && (!$_FILES["thumbnail"]["error"])) {
                ## Images
                $thumbnail = $_FILES["images"]["name"];
                $thumbnail_tmp_name = $_FILES["images"]["tmp_name"];
                $thumbnail_extension = explode(".", $thumbnail);
                $thumbnail_extension = strtolower(end($thumbnail_extension));
                // Random Name
                $thumbnail_rand = rand() . "." . $thumbnail_extension;
                // Path
                $thumbnail_path = $folder_thumbnail . "/" . $thumbnail_rand;

                // Unlink
                unlink($folder_thumbnail . "/" . $find_event[0]["thumbnail"]);
                
                move_uploaded_file($thumbnail_tmp_name, $thumbnail_path);

            } else {
                $thumbnail_rand = $find_event["thumbnail"];
            }

            $create_event = new EventClass($title, $thumbnail_rand, $images_rand, $header, $content, $isShow, $datetime, $category);

            EventClass::Update($id, $create_event);
        }

        // Delete
        if($action == "submit_event_delete") {
            $id = $_REQUEST["id"];

            return EventClass::Delete($id);
        }

        // Find
        if($action == "submit_event_find") {
            $id = $_REQUEST["id"];

            return EventClass::JsonEncodeFindById($id);
        }
    }
}

?>