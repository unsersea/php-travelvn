<?php

/**
 * File Name: database.php
 * Versions: 1.0
 * Folder: config
 * Description: Connect Database
 */

require_once __DIR__ . '/../config/define.php';

function connectDB()
{
    $host = DB_HOST;
    $user = DB_USER;
    $password = DB_PASSWORD;
    $database = DB_NAME;

    /**
     * Connect Database
     */
    $conn = mysqli_connect($host, $user, $password, $database);

    if (!$conn) {
        die("Connection Failed: " . mysqli_connect_error());
    }

    return $conn;
}

function disconnectDB($conn)
{
    $conn->close();
}

function connectPDO()
{
    $host = DB_HOST;
    $user = DB_USER;
    $password = DB_PASSWORD;
    $database = DB_NAME;

    try {
        $conn = new PDO('mysql:host=' . $host . ';dbname=' . $database . '', $user, $password);
    } catch (PDOException $ex) {
        die("Connection Failed: " . $ex);
    }

    return $conn;

    // disconnect PDO return = null;
}