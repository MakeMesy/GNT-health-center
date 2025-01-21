<?php

include('../resources/conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ad_name = $_POST['ad_name'];
    $offers = $_POST['offers'];

    if (isset($_FILES['ad_banner']) && $_FILES['ad_banner']['error'] == 0) {
        $ad_banner = $_FILES['ad_banner'];
        $description = json_encode($offers);

        $unique_filename = uniqid() . "_" . basename($ad_banner["name"]);
        $target_dir = "../assets/img/offer/";
        $target_file = $target_dir . $unique_filename;

        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0755, true);
        }

        if (move_uploaded_file($ad_banner["tmp_name"], $target_file)) {
            $stmt = $conn->prepare("INSERT INTO adsbanner (ad_name, ad_banner, description, created_at) VALUES (?, ?, ?, NOW())");
            $stmt->bind_param("sss", $ad_name, $unique_filename, $description);
            $stmt->execute();
            $stmt->close();

            header('Location: ./adsbanner.php');
            exit();
        } else {
            echo "Failed to upload the image.";
        }
    } else {
        echo "No file uploaded or there was an error with the file upload.";
    }
} else {
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ads Banner</title>
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

<!-- upload banners -->

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="./adsbanner.php" method="post" id="ad-form" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="ad_name" class="form-label">Ad Name:</label>
                            <input type="text" name="ad_name" id="ad_name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="ad_banner" class="form-label">Ad Banner:</label>
                            <input type="file" name="ad_banner" id="ad_banner" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="list_of_offers" class="form-label">List of Offers:</label>
                            <div id="offer-list">
                                <input type="text" name="offers[]" class="form-control mb-2" required>
                            </div>
                            <button type="button" id="add-offer" class="btn btn-success btn-sm">Add Offer</button>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- all banners -->
<?php
$query = "SELECT * FROM adsbanner ORDER BY created_at DESC";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    echo '<section class="ads-banner-section py-5 bg-light">
            <div class="container">
                <div class="row g-4">';

    while ($row = $result->fetch_assoc()) {
        $ad_id = $row['id'];
        $ad_name = $row['ad_name'];
        $ad_banner = $row['ad_banner'];
        $description = json_decode($row['description'], true);
        $created_at = $row['created_at'];

        echo '
            <div class="col-md-6 col-lg-4 ">
                <div class="card shadow-sm h-100 " >
                <div class="d-flex justify-content-center mt-2">
                                    <img src="../assets/img/offer/' . $ad_banner . '" alt="Ad Banner" width="180px" class=" rounded" >
</div>
                    <div class="card-body">
                        <h5 class="card-title text-primary fw-bold">' . htmlspecialchars($ad_name) . '</h5>';
        
        echo '<ul class="list-group list-group-flush mb-3">';
        foreach ($description as $offer) {
            echo '<li class="list-group-item">' . htmlspecialchars($offer) . '</li>';
        }
        echo '</ul>';
        
        echo '<p class="text-muted small">Created on: ' . htmlspecialchars($created_at) . '</p>';
        echo '
          
                    </div>
                  
                </div>
              
            </div>';
    }

    echo '</div>
        </div>
    </section>';
} else {
    echo '<p class="text-center py-5 text-muted">No ads found.</p>';
}

$conn->close();
?>




<script>
        document.getElementById('add-offer').addEventListener('click', function() {
            const offerList = document.getElementById('offer-list');
            const input = document.createElement('input');
            input.type = 'text';
            input.name = 'offers[]';
            input.className = 'w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:ring-lime-500 focus:border-lime-500';
            input.required = true;
            offerList.appendChild(input);
        });
    </script>

<!-- custom scripts -->
  <script src="https://kit.fontawesome.com/181ea7bd20.js" crossorigin="anonymous"></script>
</body>
</html>