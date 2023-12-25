<?php 

// Setup
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require "../../libraries/mailer/vendor/autoload.php";

$phpmailer = new PHPMailer();

$phpmailer->isSMTP();
$phpmailer->SMTPDebug = SMTP_DEBUG;
$phpmailer->Host = SMTP_HOST;
$phpmailer->SMTPAuth = SMTP_AUTH;
$phpmailer->Username = SMTP_USER;
$phpmailer->Password = SMTP_PASS;
$phpmailer->SMTPSecure = SMTP_SECURE;
$phpmailer->Port = SMTP_PORT;
$phpmailer->isHTML(SMTP_HTML);

$phpmailer->setFrom(SMTP_USER, 'php-travelvn');

?>