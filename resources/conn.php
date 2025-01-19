<?php

$name = "GNT Research Health Care Center";

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'gnt';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die('Connection Failed' . $conn->connect_error);
}
