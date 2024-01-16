<?php

// Required Config / Include Database, Auth
include "../../config/database.php";
include "../../classes/LocationClass.php";

// Test Run Data
// print_r($_REQUEST);

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Check Empty

    if (!empty($_REQUEST["action"])) {
        $action = $_REQUEST["action"];

        // Create
        if ($action == "submit_location_create") {
            $location_name = $_REQUEST["location_name"];
            $city = $_REQUEST["city"];
            $acronym = $_REQUEST["acronym"];
            $address = $_REQUEST["address"];
            $isShow = 1;

            $create_location = new LocationClass($location_name, $city, $acronym, $address, $isShow);

            LocationClass::Create($create_location);
        }

        // Update
        if ($action == "submit_location_update") {
            $id = $_REQUEST["id"];
            $location_name = $_REQUEST["location_name"];
            $city = $_REQUEST["city"];
            $acronym = $_REQUEST["acronym"];
            $address = $_REQUEST["address"];
            $isShow = 1;

            $create_location = new LocationClass($location_name, $city, $acronym, $address, $isShow);

            LocationClass::Update($id, $create_location);
        }

        // Delete
        if ($action == "submit_location_delete") {
            $id = $_REQUEST["id"];

            return LocationClass::Delete($id);
        }

        // Find
        if ($action == "submit_location_find") {
            $id = $_REQUEST["id"];

            return LocationClass::JsonEncodeFindById($id);
        }
    }
}