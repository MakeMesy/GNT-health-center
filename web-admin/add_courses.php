<?php
include('../resources/conn.php');
function uploadFile($file, $target_dir) {
    if (isset($file['tmp_name']) && is_uploaded_file($file['tmp_name'])) {

        $file_name = time() . "_" . uniqid() . "_" . basename($file["name"]);
        $target_file = $target_dir . $file_name;


        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            return $file_name;  
        }
    }
    return null;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_name = $_POST['course_name'];
    $url_name = $_POST['url_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    

    $image = uploadFile($_FILES['image'], "../assets/img/courses/");


    $requirements = json_encode($_POST['requirements']);
    $coverage = json_encode($_POST['coverage']); 

    $instructors_name = $_POST['instructors_name'];
    $street = $_POST['street'];
    $district = $_POST['district'];
    $landmark = $_POST['landmark'];
    $google_map_link = $_POST['google_map_link'];
    $duration = $_POST['duration'];
    $terms_and_conditions = $_POST['terms_and_conditions'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    if (!empty($_FILES['images']['name'][0])) {
        $images = [];
        $target_dir = "../assets/img/courses/"; 
        foreach ($_FILES['images']['name'] as $key => $value) {
            $image_name = uniqid() . '_' . basename($_FILES['images']['name'][$key]);
            $target_file = $target_dir . $image_name;

            if (move_uploaded_file($_FILES['images']['tmp_name'][$key], $target_file)) {
                $images[] = $image_name; 
            }
        }
        $images_json = json_encode($images);
    } else {
        $images_json = json_encode([]);
    }

    $mode = $_POST['mode'];

    $insert_query = "INSERT INTO courses_list 
                     (course_name, url_name, description, price, image, requirements, coverage, 
                      instructors_name, street, district, landmark, google_map_link, duration, 
                      terms_and_conditions, email, phone, images, mode) 
                     VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)";

    $stmt = $conn->prepare($insert_query);
    $stmt->bind_param("ssssssssssssssssss", $course_name, $url_name, $description, $price, 
                      $image, $requirements, $coverage, $instructors_name, $street, $district, 
                      $landmark, $google_map_link, $duration, $terms_and_conditions, $email, $phone, 
                      $images_json, $mode);

    if ($stmt->execute()) {
        header("Location: ./courses.php");
        echo '<script>alert("Course added successfully!");</script>';
        exit();
    } else {
        header("Location: ./courses.php"); 
        echo '<script>alert("Error adding course.");</script>';
    }
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
  <link rel="stylesheet" href="../assets/css/wp-admin/add_course.css">

</head>

<body>

  <?php include('./navbar.php') ?>

  <form action="./add_courses.php" method="POST" enctype="multipart/form-data">

<!-- Course Name -->
<label for="course_name">Course Name:</label>
<input type="text" id="course_name" name="course_name" required>

<!-- URL Name -->
<label for="url_name">URL Name:</label>
<input type="text" id="url_name" name="url_name" required>

<!-- Description -->
<label for="description">Description:</label>
<textarea id="description" name="description" required></textarea>

<!-- Price -->
<label for="price">Price:</label>
<input type="number" step="0.01" id="price" name="price" required>

<!-- Image -->
<label for="image">Image:</label>
<input type="file" id="image" name="image" required>

<!-- Requirements -->
<label for="requirements">Requirements:</label>
<div id="requirements-container"></div>
<button type="button" class="btn btn-primary" onclick="addRequirementField()">Add Requirement</button>

<!-- Coverage -->
<label for="coverage">Coverage:</label>
<div id="coverage-container"></div>
<button type="button" class="btn btn-primary" onclick="addCoverageField()">Add Coverage</button>


<!-- Instructor Name -->
<label for="instructors_name">Instructor's Name:</label>
<input type="text" id="instructors_name" name="instructors_name" required>

<!-- Street -->
<label for="street">Street:</label>
<input type="text" id="street" name="street" required>

<!-- District -->
<label for="district">District:</label>
<input type="text" id="district" name="district" required>

<!-- Landmark -->
<label for="landmark">Landmark:</label>
<input type="text" id="landmark" name="landmark" required>

<!-- Google Map Link -->
<label for="google_map_link">Google Map Link:</label>
<input type="url" id="google_map_link" name="google_map_link" required>

<!-- Duration -->
<label for="duration">Duration:</label>
<input type="text" id="duration" name="duration" required>

<!-- Terms and Conditions -->
<label for="terms_and_conditions">Terms and Conditions:</label>
<textarea id="terms_and_conditions" name="terms_and_conditions" required></textarea>

<!-- Email -->
<label for="email">Email:</label>
<input type="email" id="email" name="email" required>

<!-- Phone -->
<label for="phone">Phone:</label>
<input type="tel" id="phone" name="phone" required>

<!-- Images (multiple) -->
<label for="images">Images: You can select max 3</label>
<input type="file" id="images" name="images[]" accept="image/*" multiple required onchange="validateFileInput(this)">

<!-- Mode -->
<label for="mode">Mode:</label>
<select id="mode" name="mode" required>
    <option value="online">Online</option>
    <option value="offline">Offline</option>
    <option value="hybrid">Hybrid</option>
</select>

<button type="submit">Add Course</button>
</form>






  <!-- custom scripts -->
  <script src="https://kit.fontawesome.com/181ea7bd20.js" crossorigin="anonymous"></script>

    <script>
    function validateFileInput(input) {
        if (input.files.length > 3) {
            alert('You can only select up to 3 images.');
            input.value = ""; 
        }
    }
    let coverageCount = 0;

function addCoverageField() {
    if (coverageCount >= 4) {
        alert("You can only add up to 4 coverage points.");
        return;
    }

    coverageCount++;

    const coverageContainer = document.getElementById('coverage-container');
    const newTextArea = document.createElement('textarea');
    newTextArea.setAttribute('name', 'coverage[]');
    newTextArea.setAttribute('required', 'required'); // Ensure the textarea is required
    newTextArea.setAttribute('placeholder', 'Coverage point ' + coverageCount);
    coverageContainer.appendChild(newTextArea);
}

let requirementsCount = 0;

function addRequirementField() {
    if (requirementsCount >= 4) {
        alert("You can only add up to 4 requirements.");
        return;
    }

    requirementsCount++;

    const requirementsContainer = document.getElementById('requirements-container');
    const newTextArea = document.createElement('textarea');
    newTextArea.setAttribute('name', 'requirements[]');
    newTextArea.setAttribute('required', 'required'); // Ensure the textarea is required
    newTextArea.setAttribute('placeholder', 'Requirement ' + requirementsCount);
    requirementsContainer.appendChild(newTextArea);
}

</script>
</body>

</html>