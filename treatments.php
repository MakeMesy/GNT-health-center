<?php
include('./resources/conn.php');

$treatment_query = "SELECT url_name FROM treatments";
$stmt_for_treatment = $conn->prepare($treatment_query);
$stmt_for_treatment->execute();
$stmt_for_treatment->bind_result($url_name);

$treatments = [];

while ($stmt_for_treatment->fetch()) {
    $treatments[] = $url_name;
}

$stmt_for_treatment->close();


if (isset($_GET['treatment']) && in_array($_GET['treatment'], $treatments)) {
    $url_name = $_GET['treatment'];
    $treatment_query = "SELECT id, url_name, name, slogan, about, benefits, therapies, images, thumbnail, created_at, herosection, herosection_title, herosection_des, about_video, video_link, video_title FROM treatments WHERE url_name = ?";
    $stmt_for_treatment = $conn->prepare($treatment_query);
    $stmt_for_treatment->bind_param("s", $url_name); 
    $stmt_for_treatment->execute();

    $stmt_for_treatment->bind_result($id, $url_name, $name, $slogan, $about, $benefits, $therapies, $images, $thumbnail, $created_at, $herosection, $herosection_title, $herosection_des, $about_video, $video_link, $video_title);

    $treatment_details = [];
    if ($stmt_for_treatment->fetch()) {

        $treatment_details = [
            "id" => $id,
            "url_name" => $url_name,
            "name" => $name,
            "slogan" => $slogan,
            "about" => $about,
            "benefits" => $benefits,
            "therapies" => $therapies,
            "images" => $images,
            "thumbnail" => $thumbnail,
            "created_at" => $created_at,
            "herosection" => $herosection,
            "herosection_title" => $herosection_title,
            "herosection_des" => $herosection_des,
            "about_video" => $about_video,
            "video_link" => $video_link,
            "video_title" => $video_title
        ];
    } else {
        echo "Treatment not found.";
    }

    $stmt_for_treatment->close();
} else {
    header("Location: ./");
    exit();
}


function safe_htmlspecialchars($value)
{
    return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8');
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo $name ?></title>
    <link rel="shortcut icon" href="./assets/img/main/favicontop.png" type="image/x-icon">
    <!-- links -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- custom css -->

    <link rel="stylesheet" href="./assets/css/resources/style.css">
    <link rel="stylesheet" href="./assets/css/treatments/style.css">


</head>

<body>

    <!-- navbar -->
    <?php include('./resources/navbar.php') ?>


    <!-- hero section -->
    <div class="" id="hero-section" style="background: url('./assets/img/treatmentshero/<?php echo htmlspecialchars($treatment_details['herosection']); ?>') no-repeat center/cover ;">

        <div class="hero-section-con">
            <h2>
                <?php echo safe_htmlspecialchars($treatment_details['herosection_title']); ?>
            </h2>
            <h4 class="mt-5">
                <?php echo safe_htmlspecialchars($treatment_details['herosection_des']); ?>

            </h4>
        </div>
    </div>


    <!-- about section -->

    <div id="about-section" class="section-init">
        <div class="about-section">
            <div class="about-img">
                <img src=./assets/img/treatmentsaboutimg/<?php echo safe_htmlspecialchars($treatment_details['thumbnail']); ?> alt="">

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
            <?php 

                       if( strtolower($url_name)=="karla-kattai"){
                             echo "<h2>Our Karla Kattai types</h2>";
                       }else{
                        echo "<h2>Our Specialized Therapies</h2>";
                       }
                       


                    ?>
                
                <h4>
                    Tailored treatments for your holistic well-being
                </h4>
            </div>
            <div class="therapies-lists">
                <?php $therapie_list = json_decode($treatment_details['therapies'], true);
                if (isset($therapie_list['therapies']) && is_array($therapie_list['therapies'])) {
                    foreach ($therapie_list['therapies'] as $therapie) {
                        echo "<div class='list-of-therapies'>";
                        echo "<div class='therapies-img ' >
                   <img src='./assets/img/treatments/" . safe_htmlspecialchars($therapie['image']) . "' />
                </div>";

                        echo "<h2 class='text-center'>" . nl2br(safe_htmlspecialchars($therapie['name'])) . "</h2>";

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
                <img src=./assets/img/treatmentsbenefits/<?php echo safe_htmlspecialchars($treatment_details['images']); ?> alt="">
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
    <?php   $video_url = $treatment_details['video_link'] ?? '';
        
        if (!empty($video_url)) { ?>
          <div id="video_section" class="section-init">

<div class="video-section">
    <div class="video-section-heading">
    <h2>See the Demo</h2>
    </div>
    <div class="video-section-content">
        <div class="video-section-con">
            <h2>
            <?php echo safe_htmlspecialchars($treatment_details['video_title']); ?>
            </h2>
            <p>
            <?php echo safe_htmlspecialchars($treatment_details['about_video']); ?>       
             </p>
        </div>
    <div class="yt-video">
    <?php 
    $video_url = $treatment_details['video_link'] ?? '';

    if (!empty($video_url)) {
        $video_id = '';

        if (strpos($video_url, 'youtube.com') !== false) {
            parse_str(parse_url($video_url, PHP_URL_QUERY) ?? '', $query_params);
            $video_id = $query_params['v'] ?? '';
        } 
        elseif (strpos($video_url, 'youtu.be') !== false) {
            $video_id = trim(parse_url($video_url, PHP_URL_PATH), '/');
        }

        if (!empty($video_id)) {
            echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/' . htmlspecialchars($video_id) . '" 
            frameborder="0" allowfullscreen></iframe>';
        }
    }
?></div>
    </div>
    
</div>
</div>
       <?php }?>
   

    <div id="quote-main-section">
        <div class="quote-main">
            <div>
                <h2>Heal naturally, live fully</h2>
                <h4>Don't Hesitate To Contact With Us</h4>
            </div>
            <div>
                <div class="quote-btn"><button>
                        Book Now <i class="fa-solid fa-arrow-right"></i>
                    </button></div>
            </div>
        </div>
    </div>

    <!-- feedback -->
    <?php include('./resources/feedback.php') ?>

    <?php include('./resources/form.php') ?>

    <!-- footer -->
    <?php include('./resources/footer.php') ?>

    <!-- custom scripts -->
    <script src="./assets/js/resource/script.js"></script>
    <script src="https://kit.fontawesome.com/181ea7bd20.js" crossorigin="anonymous"></script>
</body>

</html>