<?php

include('../resources/conn.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $formName = $_POST['formName'];
  if ($formName == 'feedback_submit') {
    $name = $_POST['name'];
    $feedback = $_POST['feedback'];
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
      $image = $_FILES['image'];
      $image_name = uniqid() . "_" . basename($image["name"]);
      $target_dir = "../assets/img/testimonialuser/";
      $target_file = $target_dir . $image_name;

      if (!is_dir($target_dir)) {
        mkdir($target_dir, 0755, true);
      }


      if (move_uploaded_file($image["tmp_name"], $target_file)) {

        $stmt = $conn->prepare("INSERT INTO testimonial (name, user_image, feedback) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $image_name, $feedback);

        if ($stmt->execute()) {
          header("Location: ./testimonialadd.php");
        } else {
          echo "Error submitting testimonial: " . $stmt->error;
        }

        $stmt->close();
      } else {
        echo "Error uploading the image.";
      }
    } else {
      echo "Please upload an image.";
    }
  }elseif($formName=="delete_feedback"){
    $delete_feedback = $_POST['delete_feedback'];
    if ($delete_feedback) {
        $stmt = $conn->prepare("DELETE from testimonial where id= ?");
        $stmt->bind_param("s", $delete_feedback);
        $stmt->execute();
        $stmt->close();

        header('Location: ./testimonialadd.php');
        exit();
    } else {
        echo '<script>alert("error in delete")</script>';
    }
} else {
    echo "No file uploaded or there was an error with the file upload.";
}
  }

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TestiMonial</title>
  <link rel="shortcut icon" href="../assets/img/main/favicon.png" type="image/x-icon">
  <!-- links -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <!-- custom css -->
  <link rel="stylesheet" href="../assets/css/wp-admin/testimonial.css">
  <link rel="stylesheet" href="../assets/css/wp-admin/style.css">
  <style>
    .update-icon {
      border: 4px solid white;
    }
  </style>
</head>

<body>

  <?php include('./navbar.php') ?>

  <form action="./testimonialadd.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="formName" value="feedback_submit">
    <div>
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required>
    </div>
    <div>
      <label for="image">Upload Image:</label>
      <input type="file" id="image" name="image" accept="image/*" required>
    </div>
    <div>
      <label for="feedback">Feedback:</label>
      <textarea id="feedback" name="feedback" rows="4" required></textarea>
    </div>
    <button type="submit">Submit Feedback</button>
  </form>

  <?php


  $query = "SELECT * FROM testimonial ORDER BY created_at DESC";
  $result = $conn->query($query);
  $testimonial_user = [];

  if ($result->num_rows > 0) {
    while ($testimonial = $result->fetch_assoc()) {
      $testimonial_user[] = $testimonial;
    }
  } else {
    echo "<p>No testimonials found.</p>";
  }

  $conn->close();
  ?>


  <section id="feedback">



    <?php foreach ($testimonial_user as $user): ?>
      <div class="feedback-card ">
        <div class="feedback-card-img">
          <img src="../assets/img/testimonialuser/<?php echo $user['user_image']; ?>" alt="Testimonial Image" width="140px">
        </div>
        <div class="feedback-card-content">
          <p class="text-center p-2"><?php echo $user['feedback']; ?></p>
        </div>
        <div class="feedback-card-name">
          <span class="font-weight-bold"><?php echo $user['name']; ?></span>
        </div>
        <div class="feedback-card-name">
        <form action="./testimonialadd.php" method='post'>
                            <input type='hidden' name='formName' value='delete_feedback'>
                        <input type='hidden' name='delete_feedback' value=<?php echo $user['id'] ?>>
                   <button type='submit' class='update-icon'><i class='fa-solid fa-trash'></i></button>

</form>
        </div>
      </div>
    <?php endforeach; ?>


  </section>



  <!-- custom scripts -->
  <script src="https://kit.fontawesome.com/181ea7bd20.js" crossorigin="anonymous"></script>

</body>

</html>