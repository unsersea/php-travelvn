<?php 

/**
 * File Name: define.php
 * Versions: 1.0
 * Folder: config
 * Description: All Config Setup
 */

// Database

define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "php-travelvn-db");

// Mail
define("SMTP_USER", "undersea250@gmail.com"); // EMAIL ACCOUNT
define("SMTP_PASS", "mxwcouqzbwogimbn"); // PASSWORD TOKEN EMAIL
define("SMTP_HOST", "smtp.gmail.com");
define("SMTP_SECURE", "ssl");
define("SMTP_PORT", "465");
define("SMTP_AUTH", true);
define("SMTP_DEBUG", 0);
define("SMTP_HTML", true);

// Google
define("GOOGLE_CLIENT_ID", "996704266615-ro90geijurn9hkhj8599t43npqa1tpeb.apps.googleusercontent.com");
define("GOOGLE_CLIENT_SECRET", "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");
define("GOOGLE_REDIRECT_URL", "http://localhost/php-travelvn/normal-pattern/views/action/action_google");

?>