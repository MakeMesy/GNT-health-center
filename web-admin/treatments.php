<?php

include('../resources/conn.php');


$treatment_list_nav = "SELECT * FROM treatments";
$stmt_for_treatment_list_nav = $conn->prepare($treatment_list_nav);
$stmt_for_treatment_list_nav->execute();
$result_list = $stmt_for_treatment_list_nav->get_result();
$treatments_nav=[];
if ($result_list->num_rows > 0) {
    while($treatment_list=$result_list->fetch_assoc()){
        $treatments_nav[]=$treatment_list;   
    }

} else {
    echo "Treatment not found.";
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $treatment_id = $_POST['treatment_id'];

  if ( $treatment_id ) {
          $stmt = $conn->prepare("DELETE from treatments where id= ?");
          $stmt->bind_param("s", $treatment_id);
          $stmt->execute();
          $stmt->close();

          header('Location: ./treatments.php');
          exit();
      } else {
          echo '<script>alert("error in delete")</script>';
      }
  }



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Treatments</title>
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



<!-- add the treatments -->
<div class="new-treatments d-flex justify-content-start mt-5 mb-5 p-2 container">
  
  <h5 class="mr-5">Add New Treatments</h5>
  <a href="./add-treatments.php"><button class="btn btn-primary "> Add </button></a>
</div>



<!-- treatments list -->

<div class="treatment-main">
  <div class="treatments-content">
    <?php
      foreach( $treatments_nav as $treatments_list){
        echo "<div class='treatments-list'>";
        echo "<div>";
        echo "<h2>".$treatments_list['name']."</h2>";
        echo "<p>".$treatments_list['herosection_title']."</p>";
        echo "<a href='./update-treatments.php?id=".$treatments_list['id']."' target='_blank'><button class='mb-2 '>Update</button></a>";
        echo "<form action='./treatments.php' method='POST' >";
        echo "<input type='hidden' name='treatment_id' value='" . $treatments_list['id'] . "'>";
        echo "<button type='submit' onclick='return confirm(\"Are you sure you want to delete this treatment?\")'>Delete</button>";
        echo "</form>";
        echo "</div>";
        echo "<img src=../assets/img/treatmentsaboutimg/".$treatments_list['thumbnail']." width='180px' height='180px'>";
        echo "</div>";
    }

    ?>
  </div>
</div>








<!-- custom scripts -->
  <script src="https://kit.fontawesome.com/181ea7bd20.js" crossorigin="anonymous"></script>
</body>
</html>