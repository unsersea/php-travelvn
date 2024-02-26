<?php 

if(!empty($_REQUEST["number_of_seat"]) && !empty($_REQUEST["amount_person"]) && !empty($_REQUEST["amount_children"])) {
    $number_of_seat = $_REQUEST["number_of_seat"];

    $amount_person = $_REQUEST["amount_person"];

    $amount_children = $_REQUEST["amount_children"];

    if($number_of_seat >= ($amount_person + $amount_children)) {
        echo json_encode(true);
    } else {
        echo json_encode(false);
    }
}