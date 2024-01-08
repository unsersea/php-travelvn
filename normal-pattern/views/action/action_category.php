<?php 

// Required Config / Include Database, Auth
include "../../config/database.php";
include "../../classes/CategoryClass.php";

// Test Run Data
// print_r($_REQUEST);

if($_SERVER["REQUEST_METHOD"] === "POST") {
    
    // Check Empty

    if(!empty($_REQUEST["action"])) {
        $action = $_REQUEST["action"];

        // Create
        if($action == "submit_category_create") {
            $category = $_REQUEST["category"];
            $content = $_REQUEST["content"];

            $create_category = new CategoryClass($category, $content);

            return CategoryClass::Create($create_category);
        }

        // Update
        if($action == "submit_category_update") {
            $id = $_REQUEST["id"];
            $category = $_REQUEST["category"];
            $content = $_REQUEST["content"];

            $create_category = new CategoryClass($category, $content);

            return CategoryClass::Update($id, $create_category);
        }

        // Delete
        if($action == "submit_category_delete") {
            $id = $_REQUEST["id"];

            return CategoryClass::Delete($id);
        }

        // Find
        if($action == "submit_category_find") {
            $id = $_REQUEST["id"];

            return CategoryClass::JsonEncodeFindById($id);
        }
    }

}

?>