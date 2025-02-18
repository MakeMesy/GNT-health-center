

<?php

$name = "GNT Research Health Care Center";
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'gnt';
// $host = "localhost";
// $user = "vattava2_gnt";
// $pass = "nbv@2022";
// $db = "vattava2_gnt";

$conn = new mysqli($host, $user, $pass, $db);
if (mysqli_connect_error()) {
    header('location:404.php');
}
mysqli_set_charset($conn, "utf8mb4");

date_default_timezone_set('Asia/Calcutta');
function siteURL()
{
    $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $domainName = $_SERVER['HTTP_HOST'];
    return $protocol . $domainName . ":8080/adminLTE/";
}
define("SITE_URL", siteURL());

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>
