<?php


include('../resources/conn.php');



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments</title>
    <link rel="shortcut icon" href="../assets/img/main/favicon.png" type="image/x-icon">
    <!-- links -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>

    <!-- custom css -->
    <link rel="stylesheet" href="../assets/css/wp-admin/style.css">
</head>

<body>

    <?php include('./navbar.php') ?>


    <div class="appointments">

        <?php

        $query = "SELECT * from appointments ORDER BY created_at DESC";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            while ($appointment_list = $result->fetch_assoc()) {
                echo  '<div class="appointments-list">';
                echo    '<div class="appointment-item">';
                echo        '<h2>' . $appointment_list['full_name'] . '</h2>';
                echo        '<h4>' . $appointment_list['email_address'] . '</h4>';
                echo '<p><strong>Phone:</strong> <a href="https://api.whatsapp.com/send?phone=' . $appointment_list['phone_number'] . '" target="_blank"> ' . $appointment_list['phone_number'] . '</a></p>';
                echo        '<p><strong>Treatments:</strong> ' . $appointment_list['service_category'] . '</p>';
                echo        '<p><strong>Message:</strong> ' . $appointment_list['message'] . '</p>';
                echo    '</div>';
                echo  '</div>';
            }
        } else {
            echo "<p>No appointments found.</p>";
        }


        ?>
    </div>







    <!-- custom scripts -->
    <script src="https://kit.fontawesome.com/181ea7bd20.js" crossorigin="anonymous"></script>
</body>

</html>