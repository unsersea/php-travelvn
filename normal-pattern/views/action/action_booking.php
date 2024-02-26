<?php

// Required Config / Include Database, Auth
include "../../config/database.php";
include "../../classes/LocationClass.php";
include "../../classes/TourClass.php";
include "../../classes/BookingClass.php";
include "../../classes/ScheduleClass.php";

// Test Run Data
// print_r($_REQUEST);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check Empty

    if (!empty($_REQUEST["action"])) {
        $action = $_REQUEST["action"];

        $array_character = array("VNĐ", ",");


        if ($action == "submit_booking_create") {
            // print_r($_REQUEST);
            $number_of_seat = $_REQUEST["number_of_seat"];

            $amount_person = $_REQUEST["amount_person"];
            $amount_children = $_REQUEST["amount_children"];

            $payment_method = $_REQUEST["payment_method"];
            $start_date = "";

            $isShow = 1;
            $status = 0;

            $price_person = str_replace($array_character, "", $_REQUEST["cal-total-price-person"]);
            $price_children = str_replace($array_character, "", $_REQUEST["cal-total-price-children"]);
            $price_total = str_replace($array_character, "", $_REQUEST["cal-total-all"]);

            // $tour_id = $_REQUEST["tour_id"];
            $schedule_id = $_REQUEST["schedule_id"];

            $find_schedule = ScheduleClass::FindById($schedule_id);
            
            $start_date = $find_schedule["start_datetime"];

            $note = $_REQUEST["note"];

            // Check Payment Method
            if ($payment_method == "Trực Tiếp") {

                $create_booking = new BookingClass($payment_method, $note, $start_date, $price_children, $price_person, $amount_children, $amount_person, $price_total, $status, $isShow, "", $schedule_id);
            
                // BookingClass::Create($create_booking);

                print_r($create_booking);
            }
        }

    }
}