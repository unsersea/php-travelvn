<?php 

// Required Config / Include Database, Auth
include "../../config/database.php";
include "../../classes/AuthClass.php";

if($_SERVER["REQUEST_METHOD"] === "POST") {
    
    // Check Empty

    if(!empty($_REQUEST["action"])) {
        $action = $_REQUEST["action"];

        // Register
        if($action === "register") {
            print_r($_REQUEST);
        }
    }
}

?>