<?php

// Required Config / Include Database, Auth
include "../../config/database.php";
include "../../classes/TourClass.php";
include "../../classes/ScheduleClass.php";

// Test Run Data
// print_r($_REQUEST);

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Check Empty

    if (!empty($_REQUEST["action"])) {
        $action = $_REQUEST["action"];

        // Create
        if ($action == "submit_schedule_create") {
            $start_datetime = $_REQUEST["start_datetime"];
            $end_datetime = $_REQUEST["end_datetime"];
            $remaining = $_REQUEST["number_of_seat"];
            $note = $_REQUEST["note"];
            // Foreign Key
            $tour_id = $_REQUEST["tour_id"];
            $feedback_id = null;

            $create_schedule = new ScheduleClass($start_datetime, $end_datetime, $remaining, $note, $tour_id, $feedback_id);
            ScheduleClass::Create($create_schedule);
        }

        // Update
        if ($action == "submit_schedule_update") {
            $id = $_REQUEST["schedule_id"];
            $start_datetime = $_REQUEST["start_datetime"];
            $end_datetime = $_REQUEST["end_datetime"];
            $remaining = $_REQUEST["remaining"];
            $note = $_REQUEST["note"];
            // Foreign Key
            $tour_id = $_REQUEST["tour_id"];
            $feedback_id = null;

            $create_schedule = new ScheduleClass($start_datetime, $end_datetime, $remaining, $note, $tour_id, $feedback_id);
            ScheduleClass::Update($id, $create_schedule);
        }

        // Delete
        if ($action == "submit_schedule_delete") {
            $id = $_REQUEST["id"];

            return ScheduleClass::Delete($id);
        }

        // Find Schedule
        if ($action == "submit_schedule_find") {
            $id = $_REQUEST["id"];
            // Find Tour
            $find_tour_id = ScheduleClass::FindById($id);

            echo json_encode(array_merge(ScheduleClass::FindById($id), TourClass::FindById($find_tour_id["tour_id"])));
        }

        // Find Tour
        if ($action == "ajax_find_tour") {
            $id = $_REQUEST["id"];

            return TourClass::JsonEncodeFindById($id);
        }
    }
}