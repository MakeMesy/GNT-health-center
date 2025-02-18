<?php

include('../resources/conn.php');

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $course_query = "SELECT * FROM courses_list WHERE id = ?";
  $course_stmt = $conn->prepare($course_query);
  $course_stmt->bind_param("s", $id);
  $course_stmt->execute();
  $result = $course_stmt->get_result();

  if ($result->num_rows > 0) {
    $course_main = $result->fetch_assoc();
  } else {
    echo "Treatment not found.";
  }
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $formName = $_POST['form_name'];
    if ($formName == 'course_img') {
      if (isset($_FILES['course_img']) && $_FILES['course_img']['error'] == 0) {
        $course_img = $_FILES['course_img'];
        $unique_filename_img = uniqid() . "_" . basename($course_img["name"]);
        $target_dir = "../assets/img/courses/";
        $target_file = $target_dir . $unique_filename_img;
        if (!is_dir($target_dir)) {
          mkdir($target_dir, 0755, true);
        }
        if (move_uploaded_file($course_img["tmp_name"], $target_file)) {
          $stmt = $conn->prepare("UPDATE courses_list SET image = ? WHERE id = ?");
          $stmt->bind_param("ss", $unique_filename_img, $id);
          $stmt->execute();
          $stmt->close();

          header("Location: ./update_course.php?id=$id");
          exit();
        } else {
          echo "Failed to upload the image.";
        }
      }
    } elseif ($formName == 'course_about_con') {
      $course_name = $_POST['course_name'];
      $url_name = $_POST['url_name'];
      $description = $_POST['description'];
      $instructors_name = $_POST['instructors_name'];
      $duration = $_POST['duration'];
      $mode = $_POST['mode'];

      $about_update = "UPDATE courses_list set course_name=?,url_name=?,instructors_name=?,duration=?,mode=?,description=? where id= ?";
      $about_stmt = $conn->prepare($about_update);
      $about_stmt->bind_param('sssssss', $course_name, $url_name, $instructors_name, $duration, $mode, $description, $id);
      if ($about_stmt->execute()) {
        ob_start();
        header("Location: ./update_course.php?id=$id");
        ob_end_flush();
        exit();
      } else {
        ob_start();
        header("Location: ./update_course.php?id=$id");
        ob_end_flush();
        exit();
      }
    } elseif ($formName == "coverage_update") {
      $coverage_index = $_POST['coverage_index'] ?? null;
      $coverage = $_POST['coverage'] ?? null;

      if (isset($coverage_index) && $coverage !== null) {
        $course_coverage_main = json_decode($course_main['coverage'], true);
        if (is_array($course_coverage_main) && isset($course_coverage_main[$coverage_index])) {
          $course_coverage_main[$coverage_index] = htmlspecialchars($coverage, ENT_QUOTES, 'UTF-8');
          $updated_coverages = json_encode($course_coverage_main);
          $update_query = "UPDATE courses_list SET coverage = ? WHERE id = ?";
          $update_stmt = $conn->prepare($update_query);
          $update_stmt->bind_param('ss', $updated_coverages, $id);

          if ($update_stmt->execute()) {
            echo '<script>alert("coverage updated successfully!");</script>';
            header("Location: ./update_course.php?id=$id");
            exit();
          } else {
            echo '<script>alert("Error updating coverage.");</script>';
          }
        } else {
          echo '<script>alert("Invalid coverage index.");</script>';
        }
      } else {
        echo '<script>alert("Invalid data provided.");</script>';
      }
    }
    elseif ($formName == "req_update") {
      $req_index = $_POST['req_index'] ?? null;
      $requirement = $_POST['requirement'] ?? null;

      if (isset($req_index) && $requirement !== null) {
        $course_req_main = json_decode($course_main['requirements'], true);
        if (is_array($course_req_main) && isset($course_req_main[$req_index])) {
          $course_req_main[$req_index] = htmlspecialchars($requirement, ENT_QUOTES, 'UTF-8');
          $updated_req = json_encode($course_req_main);
          $update_req_query = "UPDATE courses_list SET requirements = ? WHERE id = ?";
          $update_req_stmt = $conn->prepare($update_req_query);
          $update_req_stmt->bind_param('ss', $updated_req, $id);

          if ($update_req_stmt->execute()) {
            echo '<script>alert("coverage updated successfully!");</script>';
            header("Location: ./update_course.php?id=$id");
            exit();
          } else {
            echo '<script>alert("Error updating coverage.");</script>';
          }
        } else {
          echo '<script>alert("Invalid coverage index.");</script>';
        }
      } else {
        echo '<script>alert("Invalid data provided.");</script>';
      }
    }
    elseif ($formName == "course_image_sub") {
      $course_image_index = $_POST['course_image_index'] ?? null;
      $course_img_sub = $_FILES['course_img_sub'];
  
      if (!isset($course_img_sub) || empty($course_img_sub["name"])) {
          echo '<script>alert("No image selected.");</script>';
          exit();
      }
  
      $unique_filename_img = uniqid() . "_" . basename($course_img_sub["name"]);
      $target_dir = "../assets/img/courses/";
      $target_file = $target_dir . $unique_filename_img;
  
      if (!is_dir($target_dir)) {
          mkdir($target_dir, 0755, true);
      }
  
      if (move_uploaded_file($course_img_sub["tmp_name"], $target_file)) {
          $course_images = json_decode($course_main['images'], true);
          if (!is_array($course_images)) {
              $course_images = [];
          }
  
          if (isset($course_image_index) && isset($course_images[$course_image_index])) {
              $course_images[$course_image_index] = $unique_filename_img;
          } else {
              $course_images[] = $unique_filename_img;
          }
  
          $updated_images = json_encode($course_images);
  
          $update_query = "UPDATE courses_list SET images = ? WHERE id = ?";
          $update_stmt = $conn->prepare($update_query);
          $update_stmt->bind_param('si', $updated_images, $id);
  
          if ($update_stmt->execute()) {
              echo '<script>alert("Image updated successfully!");</script>';
              header("Location: ./update_course.php?id=$id");
              exit();
          } else {
              echo '<script>alert("Error updating image in database.");</script>';
          }
      } else {
          echo '<script>alert("Error uploading image.");</script>';
      }
  }
  elseif ($formName == "course_detail") {
    $street = $_POST['street'];
    $district = $_POST['district'];
    $landmark = $_POST['landmark'];
    $google_map_link = $_POST['google_map_link'];
    $terms_and_conditions = $_POST['terms_and_conditions'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $price = $_POST['price'];

    $course_update_query = "UPDATE courses_list 
                            SET street = ?, district = ?, landmark = ?, google_map_link = ?, 
                                terms_and_conditions = ?, email = ?, phone = ?, price = ? 
                            WHERE id = ?";

    $course_update_stmt = $conn->prepare($course_update_query);
    $course_update_stmt->bind_param("ssssssssi", 
        $street, $district, $landmark, $google_map_link, 
        $terms_and_conditions, $email, $phone, $price, $id
    );

    if ($course_update_stmt->execute()) {
        echo '<script>alert("Course details updated successfully!");</script>';
        header("Location: ./update_course.php?id=" . urlencode($id));
        exit();
    } else {
        echo '<script>alert("Error updating course details.");</script>';
    }
}


  
}
} else {
  header("Location: ./");
}

function safe_htmlspecialchars($value)
{
  return htmlspecialchars($value !== Null ? $value : '', ENT_QUOTES, 'UTF-8');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="shortcut icon" href="../assets/img/main/favicontop.png" type="image/x-icon">
  <!-- links -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>

  <!-- custom css -->
  <link rel="stylesheet" href="../assets/css/wp-admin/style.css">
  <link rel="stylesheet" href="../assets/css/wp-admin/update_course.css">
</head>

<body>

  <?php include('./navbar.php') ?>


  <div id="courses-main-section">
    <div class="courses-main-section">
      <div class="course-about">
        <div class="course-image">
          <img src="../assets/img/courses/<?php echo $course_main["image"] ?>" alt="">
          <form action="./update_course.php?id=<?php echo urlencode($course_main['id']); ?>" method="post" enctype="multipart/form-data" class="mt-2">
            <input type="hidden" name="form_name" value="course_img">
            <input type="file" name='course_img'>
            <button type="submit" class="update-icon"><i class="fa fa-refresh" aria-hidden="true"></i></button>
          </form>
        </div>
        <div class="course-about-con">
          <form action="./update_course.php?id=<?php echo urlencode($course_main['id']); ?>" method="post" enctype="multipart/form-data" class="mt-2">
            <h2><input type="text" value="<?php echo safe_htmlspecialchars($course_main["course_name"]) ?>" name="course_name"></h2>
            <span style="font-size: 13px;">Note : bridal-care (Eg: "Put name" with a hyphen)</span>
            <p>Url Name : <input type="text" value="<?php echo safe_htmlspecialchars($course_main["url_name"]) ?>" name="url_name"></p>
            <p class="course-des">Description : <input type="text" value="<?php echo safe_htmlspecialchars($course_main["description"]) ?>" name="description"></p>
            <p class="con-1"><strong>Instructor :</strong> <input type="text" value="<?php echo safe_htmlspecialchars($course_main["instructors_name"]) ?>" name="instructors_name"></p>
            <p class="con-1"><strong>Duration :</strong> <input type="text" value="<?php echo safe_htmlspecialchars($course_main["duration"]) ?>" name="duration"></p>
            <p class="con-1"><strong>Mode :</strong> <input type="text" value="<?php echo safe_htmlspecialchars($course_main["mode"]) ?>" name="mode"></p>
            <input type="hidden" name="form_name" value="course_about_con">
            <button type="submit" class="update-icon"><i class="fa fa-refresh" aria-hidden="true"></i></button>
          </form>
        </div>
      </div>
      <div class="course-in-con">
        <div class="course-coverage">
          <h2 class="text-center">Course Coverage</h2>
          <?php $course_coverage = json_decode($course_main['coverage']);
          if (is_array($course_coverage) && !empty($course_coverage)) {
            foreach ($course_coverage as $index => $coverage) { ?>
              <ul>

                <li>
                  <form action="./update_course.php?id=<?php echo urlencode($course_main['id']); ?>" method="post" enctype="multipart/form-data" class="mt-2">
                    <input type="hidden" name="form_name" value="coverage_update">
                    <input type="hidden" name="coverage_index" value="<?php echo $index; ?>">
                    <input type="text" name="coverage" value="<?php echo htmlspecialchars($coverage); ?>" class="coverage_points">
                    <button type="submit" class="update-icon"><i class="fa fa-refresh" aria-hidden="true" style="color: white;"></i></button>
                  </form>
                </li>
              </ul>
          <?php   }
          }
          ?>
        </div>

        <div class="course_require">
          <h2 class="text-center">Course Requirements</h2>
          <?php $course_req = json_decode($course_main['requirements']);
          if (is_array($course_req) && !empty($course_req)) {
            foreach ($course_req as $index_2=> $requirement) { ?>
              <ul>

                <li>
                  <form action="./update_course.php?id=<?php echo urlencode($course_main['id']); ?>" method="post" enctype="multipart/form-data" class="mt-2">
                    <input type="hidden" name="form_name" value="req_update">
                    <input type="hidden" name="req_index" value="<?php echo $index_2; ?>">
                    <input type="text" name="requirement" value="<?php echo htmlspecialchars($requirement); ?>" class="requirement_points">
                    <button type="submit" class="update-icon"><i class="fa fa-refresh" aria-hidden="true" style="color: white;"></i></button>
                  </form>
                </li>
              </ul>

          <?php   }
          }
          ?>
        </div>
      </div>
      <!-- images -->

      <div class="course_image">
        <h2 class="text-center">Images</h2>
        <div class="list_image mt-4">
          <?php $images = json_decode($course_main['images']);
          if (is_array($images) && !empty($images)) {
            foreach ($images as $index_3=>$image) { ?>
<div>
              <img src="../assets/img/courses/<?php echo safe_htmlspecialchars($image)  ?>" alt="">
  <form action="./update_course.php?id=<?php echo urlencode($course_main['id']); ?>" method="post" enctype="multipart/form-data" class="mt-2">
    <input type="hidden" name="form_name" value="course_image_sub">
    <input type="hidden" name="course_image_index" value="<?php echo $index_3; ?>">
    <input type="file" name="course_img_sub" >
    <button type="submit" class="update-icon"><i class="fa fa-refresh" aria-hidden="true" style="color: white;"></i></button>
  </form>
  </div>
          <?php }
          }
          ?>
        </div>
      </div>
      <form action="./update_course.php?id=<?php echo urlencode($course_main['id']); ?>" method="post" enctype="multipart/form-data" class="mt-2">
      <input type="hidden" name="form_name" value="course_detail">

      <div class="course-main-detail">

        <div class="address_detail">
          <h2>Address Detail</h2>
          <p>Street :<input type="text" name="street" value="<?php echo safe_htmlspecialchars($course_main["street"]) ?>"></p>
          <p>District : <input type="text" name="district" value="<?php echo safe_htmlspecialchars($course_main["district"]) ?>"></p>
          <p>landmark : <input type="text" name="landmark" value="<?php echo safe_htmlspecialchars($course_main["landmark"]) ?>"></p>
          <p>Map : <input type="text" name="google_map_link" value="<?php echo safe_htmlspecialchars($course_main["google_map_link"]) ?>"></p>
        </div>


        <div class="contact_detail">
          <h2>Contact Detail</h2>
          <p>Phone : <input type="text" name="phone" value="<?php echo safe_htmlspecialchars($course_main["phone"]) ?>"> </p>
          <p>Email : <input type="text" name="email" value="<?php echo safe_htmlspecialchars($course_main["email"]) ?>"> </p>
        </div>

        <div class="terms_and_condition">
          <h2>Terms and Conditions</h2>
          <p> <input type="text" value="<?php echo safe_htmlspecialchars($course_main["terms_and_conditions"]) ?>" name="terms_and_conditions" >  </p>
        </div>

        <div class="price_amout">
          <h2>Price : <input type="text" name="price" value="<?php echo safe_htmlspecialchars($course_main["price"]) ?>"> </h2>
        </div>
      </div>


      <button type="submit" class="update-icon"><i class="fa fa-refresh" aria-hidden="true" style="color: white;"></i></button>

    </form>
    </div>
  </div>




  <!-- custom scripts -->
  <script src="https://kit.fontawesome.com/181ea7bd20.js" crossorigin="anonymous"></script>
</body>

</html>