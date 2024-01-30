<?php 

// Include
include "../../../config/database.php";
include "../../../classes/TourClass.php";
include "../../../classes/LocationClass.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") { 
    if(isset($_REQUEST["action"])) {
        $action = $_REQUEST["action"];

        $conn = connectDB();
                
        
    }
}