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

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $url_name = mysqli_real_escape_string($conn, $_POST['url_name']);
    $slogan = mysqli_real_escape_string($conn, $_POST['slogan']);
    $about = mysqli_real_escape_string($conn, $_POST['about']);
    $herosection_title = mysqli_real_escape_string($conn, $_POST['herosection_title']);
    $herosection_des = mysqli_real_escape_string($conn, $_POST['herosection_des']);


    $benefits = isset($_POST['benefits']) ? json_encode($_POST['benefits'], JSON_UNESCAPED_SLASHES) : json_encode([]);

    
    $images = uploadFile($_FILES['images'], "../assets/img/treatmentsbenefits/");


    $thumbnail = uploadFile($_FILES['thumbnail'], "../assets/img/treatmentsaboutimg/");


    $herosection = uploadFile($_FILES['herosection'], "../assets/img/treatmentshero/");


    $therapies = [];
    if (isset($_POST['therapies_name']) && is_array($_POST['therapies_name']) && isset($_FILES['therapies_image'])) {
        foreach ($_POST['therapies_name'] as $key => $therapy_name) {
            if (!empty($therapy_name) && isset($_FILES['therapies_image']['tmp_name'][$key]) && !empty($_FILES['therapies_image']['tmp_name'][$key])) {
                $therapy_image = uploadFile(
                    ['name' => $_FILES['therapies_image']['name'][$key], 'tmp_name' => $_FILES['therapies_image']['tmp_name'][$key]], 
                    "../assets/img/treatments/"
                );

                if ($therapy_image) {
                    $therapies[] = [
                        'name' => mysqli_real_escape_string($conn, $therapy_name),
                        'image' => $therapy_image 
                    ];
                }
            }
        }
    }
    $therapies_json = json_encode(['therapies' => $therapies], JSON_UNESCAPED_SLASHES);

    $stmt = $conn->prepare("INSERT INTO treatments (name, url_name, slogan, about, benefits, therapies, images, thumbnail, herosection, herosection_title, herosection_des)
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssss", $name, $url_name, $slogan, $about, $benefits, $therapies_json, $images, $thumbnail, $herosection, $herosection_title, $herosection_des);

    if ($stmt->execute()) {
        echo "<script>alert('successfully created')</script>";
        header("Location: ./add-treatments.php");

    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Treatments</title>
  <link rel="shortcut icon" href="../assets/img/main/favicon.png" type="image/x-icon">
  <!-- links -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  
  <!-- custom css -->
   <link rel="stylesheet" href="../assets/css/wp-admin/style.css">
   <link rel="stylesheet" href="../assets/css/wp-admin/add_treatment.css">
</head>
<body>

<?php include('./navbar.php') ?>


<div class="main-section">
<form action="./add-treatments.php" method="post" enctype="multipart/form-data" class="d-flex flex-column mt-4" style="max-width: 100%; width: 100%;">
    
    <div class="form-section">
        <label for="name">Treatment Name:</label>
        <input type="text" name="name" id="name" required class="full-width mt-2">
    </div>

    <div class="form-section">
        <label for="url_name">URL Name:</label>
        <span style="font-size: 13px;">Note : bridal-care (Eg: "Put name" with a hyphen)</span>    
        <input type="text" name="url_name" id="url_name" required class="full-width mt-2">
    </div>

    <div class="form-section">
        <label for="slogan">Slogan:</label>
        <input type="text" name="slogan" id="slogan" class="full-width mt-2">
    </div>

    <div class="form-section">
        <label for="about">About:</label>
        <textarea name="about" id="about" rows="4" class="full-width mt-2"></textarea>
    </div>

    <div class="form-section">
        <label for="benefits">Benefits (Maximum 6 Points):</label>
        <div id="benefit-list">
            <input type="text" name="benefits[]" id="benefits" class="full-width mt-2">
        </div>
        <div>
            <button type="button" id="add-benefits" class="btn btn-success btn-sm">Add Benefits</button>
        </div>
    </div>

    <div class="form-section">
        <label for="therapies">Therapies (Name and Image):</label>
        <div id="therapies-list">
            <input type="text" name="therapies_name[]" placeholder="Therapy Name" class="full-width mt-2">
            <input type="file" name="therapies_image[]" class="mt-2">
        </div>
        <div>
            <button type="button" id="add-therapy" class="btn btn-success btn-sm">Add Therapies</button>
        </div>
    </div>

    <div class="form-section">
        <label for="images">Images:</label>
        <input type="file" name="images" id="images" multiple class="mt-2">
    </div>

    <div class="form-section">
        <label for="thumbnail">Thumbnail:</label>
        <input type="file" name="thumbnail" id="thumbnail" class="mt-2">
    </div>

    <div class="form-section">
        <label for="herosection">Hero Section Image:</label>
        <input type="file" name="herosection" id="herosection" class="mt-2">
    </div>

    <div class="form-section">
        <label for="herosection_title">Hero Section Title:</label>
        <input type="text" name="herosection_title" id="herosection_title" class="full-width mt-2">
    </div>

    <div class="form-section">
        <label for="herosection_des">Hero Section Description:</label>
        <textarea name="herosection_des" id="herosection_des" rows="4" class="full-width mt-2"></textarea>
    </div>

    <div class="form-section">
        <button type="submit" class="update-icon mt-3">Add Treatment</button>
    </div>
</form>


</div>
<script>
    document.getElementById('add-benefits').addEventListener('click', function() {
        const benefitList = document.getElementById('benefit-list');
        const benefitInputs = benefitList.getElementsByTagName('input');

        if (benefitInputs.length < 6) {
            const input = document.createElement('input');
            input.type = 'text';
            input.name = 'benefits[]';
            input.className = 'full-width mt-2';
            input.required = true;
            benefitList.appendChild(input);
        } else {
            alert('You can only add a maximum of 6 benefits.');
        }
    });

    document.getElementById('add-therapy').addEventListener('click', function() {
        const therapyList = document.getElementById('therapies-list');
        const therapyNameInput = document.createElement('input');
        therapyNameInput.type = 'text';
        therapyNameInput.name = 'therapies_name[]';
        therapyNameInput.placeholder = 'Therapy Name';
        therapyNameInput.className = 'full-width mt-2';

        const therapyImageInput = document.createElement('input');
        therapyImageInput.type = 'file';
        therapyImageInput.name = 'therapies_image[]';
        therapyImageInput.className = 'mt-2';

        therapyList.appendChild(therapyNameInput);
        therapyList.appendChild(therapyImageInput);
    });
</script>





<!-- custom scripts -->
  <script src="https://kit.fontawesome.com/181ea7bd20.js" crossorigin="anonymous"></script>
</body>
</html>