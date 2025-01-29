<?php

include('../resources/conn.php');



if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $treatment_query = "SELECT * FROM treatments WHERE id = ?";
    $stmt_for_treatment = $conn->prepare($treatment_query);
    $stmt_for_treatment->bind_param("s", $id);
    $stmt_for_treatment->execute();
    $result = $stmt_for_treatment->get_result();

    if ($result->num_rows > 0) {
        $treatment_details = $result->fetch_assoc();
    } else {
        echo header("Location: ./treatments.php");
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $formName = $_POST['form_name'];
        if ($formName == 'hero-title') {
            $hero_title = $_POST['herosection_title'];
            $hero_title_update = "UPDATE treatments set herosection_title=? where id= ?";
            $hero_title_stmt = $conn->prepare($hero_title_update);
            $hero_title_stmt->bind_param('ss', $hero_title, $id);
            if ($hero_title_stmt->execute()) {
                echo '<script>alert("herosection title updated")</script>';
                ob_start();
                header("Location: ./update-treatments.php?id=$id");
                ob_end_flush();
                exit();
            } else {
                echo '<script>alert("error herosection title updated")</script>';
                ob_start();
                header("Location: ./update-treatments.php?id=$id");
                ob_end_flush();
                exit();
            }
        } elseif ($formName == 'hero-des') {
            $hero_des = $_POST['herosection_des'];
            $hero_des_update = "UPDATE treatments set herosection_des=? where id= ?";
            $hero_des_stmt = $conn->prepare($hero_des_update);
            $hero_des_stmt->bind_param('ss', $hero_des, $id);
            if ($hero_des_stmt->execute()) {
                ob_start();
                header("Location: ./update-treatments.php?id=$id");
                ob_end_flush();
                exit();
            } else {
                ob_start();
                header("Location: ./update-treatments.php?id=$id");
                ob_end_flush();
                exit();
            }
        } elseif ($formName == 'slogan') {
            $slogan = $_POST['slogan'];
            $slogan_update = "UPDATE treatments set slogan=? where id= ?";
            $slogan_stmt = $conn->prepare($slogan_update);
            $slogan_stmt->bind_param('ss', $slogan, $id);
            if ($slogan_stmt->execute()) {
                ob_start();
                header("Location: ./update-treatments.php?id=$id");
                ob_end_flush();
                exit();
            } else {
                ob_start();
                header("Location: ./update-treatments.php?id=$id");
                ob_end_flush();
                exit();
            }
        } elseif ($formName == "about") {
            $about = $_POST['about'];
            $about_update = "UPDATE treatments set about=? where id= ?";
            $about_stmt = $conn->prepare($about_update);
            $about_stmt->bind_param('ss', $about, $id);
            if ($about_stmt->execute()) {
                ob_start();
                header("Location: ./update-treatments.php?id=$id");
                ob_end_flush();
                exit();
            } else {
                ob_start();
                header("Location: ./update-treatments.php?id=$id");
                ob_end_flush();
                exit();
            }
        } elseif ($formName == "benefit_update") {
            $benefit_index = $_POST['benefit_index'] ?? null;
            $benefit = $_POST['benefit'] ?? null;

            if (isset($benefit_index) && $benefit !== null) {
                $therapie_benefits = json_decode($treatment_details['benefits'], true);

                if (is_array($therapie_benefits) && isset($therapie_benefits[$benefit_index])) {
                    $therapie_benefits[$benefit_index] = htmlspecialchars($benefit, ENT_QUOTES, 'UTF-8');

                    $updated_benefits = json_encode($therapie_benefits);
                    $update_query = "UPDATE treatments SET benefits = ? WHERE id = ?";
                    $update_stmt = $conn->prepare($update_query);
                    $update_stmt->bind_param('ss', $updated_benefits, $id);

                    if ($update_stmt->execute()) {
                        echo '<script>alert("Benefit updated successfully!");</script>';
                        header("Location: ./update-treatments.php?id=$id");
                        exit();
                    } else {
                        echo '<script>alert("Error updating benefit.");</script>';
                    }
                } else {
                    echo '<script>alert("Invalid benefit index.");</script>';
                }
            } else {
                echo '<script>alert("Invalid data provided.");</script>';
            }
        } elseif ($formName == 'about-img') {

            if (isset($_FILES['about-image']) && $_FILES['about-image']['error'] == 0) {
                $about_image = $_FILES['about-image'];
                $unique_filename = uniqid() . "_" . basename($about_image["name"]);
                $target_dir = "../assets/img/treatmentsaboutimg/";
                $target_file = $target_dir . $unique_filename;
                if (!is_dir($target_dir)) {
                    mkdir($target_dir, 0755, true);
                }
                if (move_uploaded_file($about_image["tmp_name"], $target_file)) {
                    $stmt = $conn->prepare("UPDATE treatments SET thumbnail = ? WHERE id = ?");
                    $stmt->bind_param("ss", $unique_filename, $id);
                    $stmt->execute();
                    $stmt->close();

                    header("Location: ./update-treatments.php?id=$id");
                    exit();
                } else {
                    echo "Failed to upload the image.";
                }
            }
        } elseif ($formName == 'benefit-img') {

            if (isset($_FILES['benefit-image']) && $_FILES['benefit-image']['error'] == 0) {
                $benefit_image = $_FILES['benefit-image'];
                $unique_filename_2 = uniqid() . "_" . basename($benefit_image["name"]);
                $target_dir = "../assets/img/treatmentsbenefits/";
                $target_file = $target_dir . $unique_filename_2;
                if (!is_dir($target_dir)) {
                    mkdir($target_dir, 0755, true);
                }
                if (move_uploaded_file($benefit_image["tmp_name"], $target_file)) {
                    $stmt = $conn->prepare("UPDATE treatments SET images = ? WHERE id = ?");
                    $stmt->bind_param("ss", $unique_filename_2, $id);
                    $stmt->execute();
                    $stmt->close();

                    header("Location: ./update-treatments.php?id=$id");
                    exit();
                } else {
                    echo "Failed to upload the image.";
                }
            }
        }
        elseif ($formName == 'hero-img') {

            if (isset($_FILES['hero-image']) && $_FILES['hero-image']['error'] == 0) {
                $hero_image = $_FILES['hero-image'];
                $unique_filename_3 = uniqid() . "_" . basename($hero_image["name"]);
                $target_dir = "../assets/img/treatmentshero/";
                $target_file = $target_dir . $unique_filename_3;
                if (!is_dir($target_dir)) {
                    mkdir($target_dir, 0755, true);
                }
                if (move_uploaded_file($hero_image["tmp_name"], $target_file)) {
                    $stmt = $conn->prepare("UPDATE treatments SET herosection = ? WHERE id = ?");
                    $stmt->bind_param("ss", $unique_filename_3, $id);
                    $stmt->execute();
                    $stmt->close();

                    header("Location: ./update-treatments.php?id=$id");
                    exit();
                } else {
                    echo "Failed to upload the image.";
                }
            }
        }elseif ($formName == 'therapies') {
            $therapy_index = intval($_POST['therapy_index']);
            
            if ($therapy_index >= 0) {
                $therapie_list = json_decode($treatment_details['therapies'], true);
        
                if (is_array($therapie_list) && isset($therapie_list['therapies'][$therapy_index])) {
                    unset($therapie_list['therapies'][$therapy_index]);
                    $therapie_list['therapies'] = array_values($therapie_list['therapies']);
        
                    $updated_json = json_encode($therapie_list, JSON_PRETTY_PRINT);
        
                    $id = intval($_GET['id']);
                    $stmt = $conn->prepare("UPDATE treatments SET therapies = ? WHERE id = ?");
                    $stmt->bind_param("si", $updated_json, $id);
                    $stmt->execute();
        
                    header("Location: ./update-treatments.php?id=$id&status=deleted");
                    exit;
                } else {
                    echo "Invalid therapy index.";
                }
            } else {
                echo "Invalid request.";
            }
        }elseif ($formName == 'therapie_add') {
            $id = intval($_GET['id']);
            $therapie_name = trim($_POST['therapie_name']);
            $upload_dir = "../assets/img/treatments/";
            $image_name = "";
        
            if (!empty($_FILES['therapie_images']['name'])) {
                $image_name = basename($_FILES['therapie_images']['name']);
                $target_path = $upload_dir . $image_name;
        
                if (move_uploaded_file($_FILES['therapie_images']['tmp_name'], $target_path)) {
                } else {
                    echo "Error uploading image.";
                    exit;
                }
            }
        
            
            $therapie_list = json_decode($treatment_details['therapies'], true);
            
            if (!is_array($therapie_list)) {
                $therapie_list = ['therapies' => []];
            }
        
            $therapie_list['therapies'][] = [
                'name' => $therapie_name,
                'image' => $image_name
            ];
        
            $updated_json = json_encode($therapie_list, JSON_PRETTY_PRINT);
        
            $stmt = $conn->prepare("UPDATE treatments SET therapies = ? WHERE id = ?");
            $stmt->bind_param("si", $updated_json, $id);
            $stmt->execute();
        
            header("Location: ./update-treatments.php?id=$id&status=added");
            exit;
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
    <title><?php echo safe_htmlspecialchars($treatment_details['name']); ?> | Update</title>
    <link rel="shortcut icon" href="../assets/img/main/favicon.png" type="image/x-icon">
    <!-- links -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>

    <!-- custom css -->
    <link rel="stylesheet" href="../assets/css/wp-admin/style.css">
    <link rel="stylesheet" href="../assets/css/wp-admin/update-treatments.css">
</head>

<body>

    <?php include('./navbar.php') ?>




    <!-- hero section -->
    <div class="" id="hero-section" style="background: url('../assets/img/treatmentshero/<?php echo htmlspecialchars($treatment_details['herosection']); ?>') no-repeat center/cover ;">

        <div class="hero-section-con">
      <div>
        <p>Thumnail</p>
      <form action="./update-treatments.php?id=<?php echo urlencode($treatment_details['id']); ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="form_name" value="hero-img">
                <input type="file" name='hero-image' >
                <button type="submit" class="update-icon"><i class="fa fa-refresh" aria-hidden="true"></i></button>
            </form>
      </div>
            <div>
                <p>Title</p>
                <form action="./update-treatments.php?id=<?php echo urlencode($treatment_details['id']); ?>" method="post">
                    <input type="hidden" name="form_name" value="hero-title">
                    <input type="text" value="<?php echo safe_htmlspecialchars($treatment_details['herosection_title']); ?>" name='herosection_title'>
                    <button type="submit" class="update-icon"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                </form>
            </div>
            <div class="mt-5">
                <p>Description</p>
                <form action="./update-treatments.php?id=<?php echo urlencode($treatment_details['id']); ?>" method="post">
                    <input type="hidden" name="form_name" value="hero-des">
                    <input type="text" value="<?php echo safe_htmlspecialchars($treatment_details['herosection_des']); ?>" name='herosection_des'>
                    <button type="submit" class="update-icon"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                </form>
            </div>
        </div>
    </div>



    <!-- about section -->

    <div id="about-section" class="section-init">
        <div class="about-section">
            <div class="about-img">
                <img src=../assets/img/treatmentsaboutimg/<?php echo safe_htmlspecialchars($treatment_details['thumbnail']); ?> alt="">
                <form action="./update-treatments.php?id=<?php echo urlencode($treatment_details['id']); ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="form_name" value="about-img">
                    <input type="file" name='about-image'>
                    <button type="submit" class="update-icon"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                </form>
            </div>
            <div class="about-con">
                <div>
                    <form action="./update-treatments.php?id=<?php echo urlencode($treatment_details['id']); ?>" method="post">
                        <input type="hidden" name="form_name" value="slogan">
                        <input type="text" value="<?php echo safe_htmlspecialchars($treatment_details['slogan']); ?>" name='slogan' class="slogan_input">
                        <button type="submit" class="update-icon"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                    </form>
                </div>
                <div>
                    <form action="./update-treatments.php?id=<?php echo urlencode($treatment_details['id']); ?>" method="post">
                        <input type="hidden" name="form_name" value="about">
                        <textarea name="about" id="">
                <?php echo safe_htmlspecialchars($treatment_details['about']); ?>
            </textarea>
                        <button type="submit" class="update-icon"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- therapies -->
    <div id="therapies" class="section-init">

        <div class="therapies">

            <div class="therapies-heading mb-5">
                <h2>Our Specialized Therapies</h2>
                <h4>
                    Tailored treatments for your holistic well-being
                </h4>
            </div>
            <div class="therapies-lists">
                <?php $therapie_list = json_decode($treatment_details['therapies'], true);
                if (isset($therapie_list['therapies']) && is_array($therapie_list['therapies'])) {
                    foreach ($therapie_list['therapies'] as $index => $therapie) {
                        echo "<div class='list-of-therapies'>";
                        echo "<div class='therapies-img' >
                   <img src='../assets/img/treatments/" . safe_htmlspecialchars($therapie['image']) . "' />
                </div>";

                        echo "<h2>" . nl2br(safe_htmlspecialchars($therapie['name'])) . "</h2>";

                        echo '<form action="./update-treatments.php?id=' . urlencode($treatment_details['id']) . '" method="post">';
                        echo "<input type='hidden' name='form_name' value='therapies'>";
                        echo "<input type='hidden' name='therapy_index' value='" . $index . "'>";
                        echo "<button type='submit' class='update-icon'><i class='fa-solid fa-trash'></i></button>";
                        echo "</form>";

                        echo "</div>";
                    }
                } else {
                    echo "<p>No Treatments.</p>";
                }
                ?>
            </div>
            <div class="therapie-add d">
            <form action="./update-treatments.php?id=<?php echo urlencode($treatment_details['id']); ?>" method="post" class="d-flex flex-column mt-4" enctype="multipart/form-data" > 
                                <input type="hidden" name="form_name" value="therapie_add">
                                <input type="file" name="therapie_images" >
                                <input type="text" name="therapie_name" value="" class="w-25 mt-2" >
                                <button type="submit" class="update-icon">Add</button>
                            </form>
            </div>
        </div>
    </div>


    <!-- benefits -->
    <div id="benefits" class="section-init">
        <div class="benefits-heading d-flex justify-content-center mb-5">
            <h2>
                Benefits of <?php echo safe_htmlspecialchars($treatment_details['name']); ?>
            </h2>
        </div>
        <div class="benefits-section">

            <div class="benefits-sec-1 benefits-con">
                <?php
                $therapie_benefits = json_decode($treatment_details['benefits'], true);

                if (is_array($therapie_benefits) && !empty($therapie_benefits)) {
                    echo "<ul>";
                    foreach (array_slice($therapie_benefits, 0, 6) as $index => $benefit) {
                ?>
                        <li>
                            <form action="./update-treatments.php?id=<?php echo urlencode($treatment_details['id']); ?>" method="post">
                                <input type="hidden" name="form_name" value="benefit_update">
                                <input type="hidden" name="benefit_index" value="<?php echo $index; ?>">
                                <input type="text" name="benefit" value="<?php echo htmlspecialchars($benefit, ENT_QUOTES, 'UTF-8'); ?>" class="benefit-points">
                                <button type="submit" class="update-icon"><i class="fa fa-refresh" aria-hidden="true" style="color: white;"></i></button>
                            </form>
                        </li>
                <?php
                    }
                    echo "</ul>";
                } else {
                    echo "No valid benefits found or the data is empty.";
                }
                ?>

            </div>
            <div class="benefits-sec-2 d-flex flex-column">
                <img src=../assets/img/treatmentsbenefits/<?php echo safe_htmlspecialchars($treatment_details['images']); ?> alt="">
                <form action="./update-treatments.php?id=<?php echo urlencode($treatment_details['id']); ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="form_name" value="benefit-img">
                    <input type="file" name='benefit-image'>
                    <button type="submit" class="update-icon"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                </form>
            </div>

        </div>






        <!-- custom scripts -->
        <script src="https://kit.fontawesome.com/181ea7bd20.js" crossorigin="anonymous"></script>
</body>

</html>