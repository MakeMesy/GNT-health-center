<?php

include('../resources/conn.php');

$social_media_query = "SELECT *  FROM social_media";
$stmt_social_media = $conn->prepare($social_media_query);
$stmt_social_media->execute();
$result_social_media = $stmt_social_media->get_result();
$social_media = [];
if ($result_social_media->num_rows > 0) {
    while ($social_media_list = $result_social_media->fetch_assoc()) {
        $social_media[] = $social_media_list;
    }
} else {
    echo "Social Media not found.";
}


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $FormName = $_POST['FormName'];
    if ($FormName == 'social_media_update') {
        $social_id = $_POST['social_id'];
        $social_link = $_POST['social_link'];

        $social_media_update = "UPDATE social_media set profile_link=? where id= ?";
        $social_media_stmt = $conn->prepare($social_media_update);
        $social_media_stmt->bind_param('ss', $social_link, $social_id);
        if ($social_media_stmt->execute()) {
            ob_start();
            header("Location: ./setting.php");
            ob_end_flush();
            exit();
        } else {
            ob_start();
            header("Location: ./setting.php");
            ob_end_flush();
            exit();
        }
    } elseif ($FormName == 'marquee_update') {
        $marque_id = $_POST['marque_id'];
        $marquee_text = $_POST['marquee_text'];

        $marquee_update = "UPDATE marquee set marquee_text=? where id= ?";
        $marquee_stmt = $conn->prepare($marquee_update);
        $marquee_stmt->bind_param('ss', $marquee_text, $marque_id);
        if ($marquee_stmt->execute()) {
            ob_start();
            header("Location: ./setting.php");
            ob_end_flush();
            exit();
        } else {
            ob_start();
            header("Location: ./setting.php");
            ob_end_flush();
            exit();
        }
    } elseif ($FormName == "service_img") {
        $service_id = $_POST['service_id'];
        if (isset($_FILES['service_img']) && $_FILES['service_img']['error'] == 0) {
            $service_img = $_FILES['service_img'];
            $unique_filename = uniqid() . "_" . basename($service_img["name"]);
            $target_dir = "../assets/img/services/";
            $target_file = $target_dir . $unique_filename;
            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0755, true);
            }
            if (move_uploaded_file($service_img["tmp_name"], $target_file)) {
                $stmt = $conn->prepare("UPDATE main_treatments SET image_icon = ? WHERE id = ?");
                $stmt->bind_param("ss", $unique_filename, $service_id);
                $stmt->execute();
                $stmt->close();

                header("Location: ./setting.php");
                exit();
            } else {
                echo "<script>alert(Failed to upload the image.)</script>";
            }
        }
    } elseif ($FormName == 'service_detail') {
        $service_name = $_POST['service_name'];
        $service_des = $_POST['service_des'];
        $service_price = $_POST['service_price'];
        $service_id = $_POST['service_id'];

        $service_update = "UPDATE main_treatments set name=?,description=?,price=? where id= ?";
        $service_stmt = $conn->prepare($service_update);
        $service_stmt->bind_param('ssss', $service_name, $service_des, $service_price, $service_id);
        if ($service_stmt->execute()) {
            ob_start();
            header("Location: ./setting.php");
            ob_end_flush();
            exit();
        } else {
            ob_start();
            header("Location: ./setting.php");
            ob_end_flush();
            exit();
        }
    } elseif ($FormName == 'service_add') {
        $service_name = $_POST['service_name'];
        $service_des = $_POST['service_des'];
        $service_price = $_POST['service_price'];
         
        if (isset($_FILES['service_img']) && $_FILES['service_img']['error'] == 0) {
            $service_img = $_FILES['service_img'];
            $unique_filename = uniqid() . "_" . basename($service_img["name"]);
            $target_dir = "../assets/img/services/";
            $target_file = $target_dir . $unique_filename;
            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0755, true);
            }
    
            if (move_uploaded_file($service_img["tmp_name"], $target_file)) {
                $stmt = $conn->prepare("INSERT INTO main_treatments (name,description,price,image_icon) VALUES (?, ?, ?,?)");
                $stmt->bind_param('ssss', $service_name, $service_des, $service_price, $unique_filename);
                $stmt->execute();
                $stmt->close();
                header('Location: ./setting.php');
                exit();
            } else {
                echo "<script>alert(upload)</script>";
            }
        } 

    }
    else if ($FormName == 'service_del') {
        $service_id = $_POST['service_id'];
        if ($service_id) {
            $stmt = $conn->prepare("DELETE from main_treatments where id= ?");
            $stmt->bind_param("s", $service_id);
            $stmt->execute();
            $stmt->close();

            header('Location: ./setting.php');
            exit();
        } else {
            echo '<script>alert("error in delete")</script>';
        }
    } else {
        echo "No file uploaded or there was an error with the file upload.";
    }
}

$marquee_query = "SELECT *  FROM marquee";
$stmt_marquee = $conn->prepare($marquee_query);
$stmt_marquee->execute();
$result_marquee = $stmt_marquee->get_result();
$marquee_con = [];
if ($result_marquee->num_rows > 0) {
    while ($marquee_list = $result_marquee->fetch_assoc()) {
        $marquee_con[] = $marquee_list;
    }
} else {
    echo "Social Media not found.";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link rel="shortcut icon" href="../assets/img/main/favicontop.png" type="image/x-icon">
    <!-- links -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>

    <!-- custom css -->
    <link rel="stylesheet" href="../assets/css/wp-admin/style.css">
    <link rel="stylesheet" href="../assets/css/wp-admin/setting.css">
</head>

<body>

    <?php include('./navbar.php') ?>
    <div class="main-basic-setting">
        <div class="main-section">
            <h2>Social Media</h2>

            <?php foreach ($social_media as $social_Link): ?>
                <div id="social_media">
                    <form action="./setting.php" method="post">
                        <input type="hidden" value="social_media_update" name="FormName">

                        <input type="hidden" value="<?php echo $social_Link['id'] ?>" name="social_id">
                        <input type="text" value="<?php echo $social_Link['profile_link'] ?>" name="social_link">
                        <span><?php echo $social_Link['icon'] ?></span>
                        <button type="submit" class="update-icon"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                    </form>
                </div>
            <?php endforeach; ?>

        </div>

        <div id="marquee-text" class="">
            <h2>Marquee Text </h2>
            <?php foreach ($marquee_con as $marquee): ?>

                <form action="./setting.php" method="post" class="marquee-con">
                    <input type="hidden" value="marquee_update" name="FormName">
                    <input type="hidden" value="<?php echo $marquee['id'] ?>" name="marque_id">
                    <input type="text" value="<?php echo $marquee['marquee_text'] ?>" name="marquee_text">
                    <button type="submit" class="update-icon"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                </form>

            <?php endforeach; ?>
        </div>
    </div>

    <!-- add new service -->
    <div id="serives-add">
        <div class="services-list">
            <div class="services-list-img">
                <form action="./setting.php" method="post" class="service mt-4" enctype="multipart/form-data">
                    <input type="hidden" value="service_add" name="FormName">
                    <input required type="file" name="service_img">
            </div>
            <label for="">Name:</label>
            <input required type="text" value="" name="service_name">
            <label for="">Description</label>
            <input required type="text" value="" name="service_des">
            <label for="">Price</label>
            <input required type="number" value="" class="w-75" name="service_price">
            <button type="submit" class="update-icon w-25">Add</button>
            </form>
        </div>
    </div>
    <!-- top services price update -->

    <?php

    $services_query = "SELECT * FROM  main_treatments ORDER BY  id DESC";
    $stmt_for_services = $conn->prepare($services_query);
    $stmt_for_services->execute();
    $services_list = [];
    $services_result = $stmt_for_services->get_result();
    if ($services_result->num_rows > 0) {

        while ($row = $services_result->fetch_assoc()) {
            $services_list[] = $row;
        }
    } else {
        echo "No services found";
    }

    ?>
    <div id="top-services">
        <div class="top-services">
            <div class="top-services-heading">
                <h2>Update Top services and Therapies</h2>
            </div>
            <div class="top-services-content">
                <div class="top-services-content-list">
                    <?php foreach ($services_list as $service): ?>
                        <div class="services-list">
                            <div class="services-list-img">
                                <img src="../assets/img/services/<?= htmlspecialchars($service['image_icon']); ?>" alt="<?= htmlspecialchars($service['name']); ?>">
                                <form action="./setting.php" method="post" class="service mt-4" enctype="multipart/form-data">
                                    <input type="hidden" value="service_img" name="FormName">
                                    <input type="hidden" value="<?= htmlspecialchars($service['id']); ?>" name="service_id">
                                    <input type="file" name="service_img">
                                    <button type="submit" class="update-icon"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                                </form>

                            </div>
                            <form action="./setting.php" method="post" class="service mt-4">
                                <input type="hidden" value="service_detail" name="FormName">
                                <div class="services-list-con">
                                    <input type="text" value="<?= htmlspecialchars($service['name']); ?>" name="service_name">
                                    <input type="text" value="<?= htmlspecialchars($service['description']); ?>" class="mt-2" name="service_des">
                                </div>
                                <div class="services-list-price">
                                    <input type="text" value="<?= htmlspecialchars($service['price']); ?>" class="w-75" name="service_price">
                                </div>
                                <input type="hidden" value="<?= htmlspecialchars($service['id']); ?>" name="service_id">
                                <button type="submit" class="update-icon w-25"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                            </form>
                            <form action="./setting.php" method="post">
                            <input type="hidden" value="service_del" name="FormName">
                            <input type="hidden" value="<?= htmlspecialchars($service['id']); ?>" name="service_id">
                                <button type="submit" class="update-icon w-100">Delete</button>
        
                            </form>
                        </div>

                    <?php endforeach; ?>
                </div>

            </div>
        </div>
    </div>




    <!-- custom scripts -->
    <script src="https://kit.fontawesome.com/181ea7bd20.js" crossorigin="anonymous"></script>
</body>

</html>