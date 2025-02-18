<?php

$name = "GNT Research Health Care Center";

// $host = 'localhost';
// $user = 'root';
// $pass = '';
// $db = 'gnt';

$host = "localhost";
$user = "vattava2_gnt"; 
$pass = "nbv@2022"; 
$db = "vattava2_gnt";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die('Connection Failed' . $conn->connect_error);
}
