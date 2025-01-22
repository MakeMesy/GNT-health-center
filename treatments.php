<?php
include('./resources/conn.php');

$treatment_query = "SELECT url_name FROM treatments";
$stmt_for_treatment = $conn->prepare($treatment_query);
$stmt_for_treatment->execute();
$result = $stmt_for_treatment->get_result();

$treatments = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $treatments[] = $row['url_name'];
    }
}
if (isset($_GET['treatment'])&& in_array($_GET['treatment'], $treatments)) {
    $url_name = $_GET['treatment'];

    $treatment_query = "SELECT * FROM treatments WHERE url_name = ?";
    $stmt_for_treatment = $conn->prepare($treatment_query);
    $stmt_for_treatment->bind_param("s", $url_name);
    $stmt_for_treatment->execute();
    $result = $stmt_for_treatment->get_result();

    if ($result->num_rows > 0) {
        $treatment_details = $result->fetch_assoc();
    } else {
        echo "Treatment not found.";
    }
} else {
    header("Location: ./");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> <?php echo $name ?></title>
  <link rel="shortcut icon" href="./assets/img/main/favicon.png" type="image/x-icon">
  <!-- links -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  
  <!-- custom css -->
   <link rel="stylesheet" href="./assets/css/resources/resource.css">
   <link rel="stylesheet" href="./assets/css/resources/style.css">


</head>
<body>

<!-- navbar -->

<?php include('./resources/navbar.php') ?>




<?php echo htmlspecialchars($treatment_details['name']) ?>
<?php echo htmlspecialchars($treatment_details['benefits']) ?>



<!-- footer -->
<?php include('./resources/footer.php') ?>



<!-- custom scripts -->
<script src="./assets/js/resource/script.js"></script>
  <script src="https://kit.fontawesome.com/181ea7bd20.js" crossorigin="anonymous"></script>
</body>
</html>