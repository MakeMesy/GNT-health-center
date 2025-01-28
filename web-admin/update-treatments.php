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
     
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $formName=$_POST['form_name'];
        if($formName=='hero-title'){
            $hero_title=$_POST['herosection_title'];
            $hero_title_update="UPDATE treatments set herosection_title=? where id= ?";
            $hero_title_stmt=$conn->prepare($hero_title_update);
            $hero_title_stmt->bind_param('ss',$hero_title,$id);
            if($hero_title_stmt->execute()){
                echo '<script>alert("herosection title updated")</script>';
                ob_start();
                header("Location: ./update-treatments.php?id=$id");
                ob_end_flush();
                exit();
            }else{
                echo '<script>alert("error herosection title updated")</script>';
                ob_start();
                header("Location: ./update-treatments.php?id=$id");
                ob_end_flush();
                exit();
            }
        }
        elseif($formName=='hero-des'){
            $hero_des=$_POST['herosection_des'];
            $hero_des_update="UPDATE treatments set herosection_des=? where id= ?";
            $hero_des_stmt=$conn->prepare($hero_des_update);
            $hero_des_stmt->bind_param('ss',$hero_des,$id);
            if($hero_des_stmt->execute()){
                ob_start();
                header("Location: ./update-treatments.php?id=$id");
                ob_end_flush();
                exit();
            }else{
                ob_start();
                header("Location: ./update-treatments.php?id=$id");
                ob_end_flush();
                exit();
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
  <title><?php echo safe_htmlspecialchars($treatment_details['name']); ?>  | Update</title>
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
            <p>Title</p>
            <form action="./update-treatments.php?id=<?php echo urlencode($treatment_details['id']); ?>" method="post" >
            <input type="hidden" name="form_name" value="hero-title">
            <input type="text" value="<?php echo safe_htmlspecialchars($treatment_details['herosection_title']); ?>" name='herosection_title'>
                <button type="submit" class="update-icon"><i class="fa fa-refresh" aria-hidden="true"></i></button>
            </form>
            </div>
            <div class="mt-5">
           <p>Description</p>
            <form action="./update-treatments.php?id=<?php echo urlencode($treatment_details['id']); ?>" method="post" >
            <input type="hidden" name="form_name" value="hero-des">
            <input type="text" value="<?php echo safe_htmlspecialchars($treatment_details['herosection_des']); ?>" name='herosection_des' >
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

            </div>
            <div class="about-con">
                <h2>
                    <?php echo safe_htmlspecialchars($treatment_details['slogan']); ?>
                </h2>
                <p>
                    <?php echo safe_htmlspecialchars($treatment_details['about']); ?>
                </p>
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
                    foreach ($therapie_list['therapies'] as $therapie) {
                        echo "<div class='list-of-therapies'>";
                        echo "<div class='therapies-img' >
                   <img src='../assets/img/treatments/" . safe_htmlspecialchars($therapie['image']) . "' />
                </div>";

                        echo "<h2>" . nl2br(safe_htmlspecialchars($therapie['name'])) . "</h2>";

                        echo "</div>";
                    }
                } else {
                    echo "<p>No Treatments.</p>";
                }
                ?>
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
                    foreach (array_slice($therapie_benefits, 0, 3) as $benefit) {
                        echo "<ul>";
                        echo '<li><i class="fa-solid fa-feather-pointed"></i>' . safe_htmlspecialchars($benefit) . "</li>";
                        echo "</ul>";
                    }
                } else {
                    echo "No valid benefits found or the data is empty.";
                }
                ?>
            </div>
            <div class="benefits-sec-2">
                <img src=../assets/img/treatmentsbenefits/<?php echo safe_htmlspecialchars($treatment_details['images']); ?> alt="">
            </div>
            <div class="benefits-sec-3 benefits-con">
                <?php $therapie_benefits = json_decode($treatment_details['benefits']);
                if (is_array($therapie_benefits) && !empty($therapie_benefits)) {
                    foreach (array_slice($therapie_benefits, 3, 6) as $benefit) {
                        echo "<ul>";
                        echo '<li><i class="fa-solid fa-feather-pointed"></i>' . safe_htmlspecialchars($benefit) . "</li>";
                        echo "</ul>";
                    }
                }
                ?>
            </div>

        </div>
    </div>






<!-- custom scripts -->
  <script src="https://kit.fontawesome.com/181ea7bd20.js" crossorigin="anonymous"></script>
</body>
</html>