<?php
include('./resources/conn.php');

$course_query = "SELECT url_name FROM courses_list";
$course_stmt = $conn->prepare($course_query);
$course_stmt->execute();
$result = $course_stmt->get_result();

$courses_list = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $courses_list[] = $row['url_name'];
    }
}
if (isset($_GET['course']) && in_array($_GET['course'], $courses_list)) {
    $url_name = $_GET['course'];

    $course_query = "SELECT * FROM courses_list WHERE url_name = ?";
    $course_stmt = $conn->prepare($course_query);
    $course_stmt->bind_param("s", $url_name);
    $course_stmt->execute();
    $result = $course_stmt->get_result();

    if ($result->num_rows > 0) {
        $course_main = $result->fetch_assoc();
    } else {
        echo "course not found.";
    }
} else {
    header("Location: ./courseslist.php");
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
    <title> <?php echo safe_htmlspecialchars($course_main["course_name"]), " | ", $name ?></title>
    <link rel="shortcut icon" href="./assets/img/main/favicontop.png" type="image/x-icon">
    <!-- links -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- custom css -->
    <link rel="stylesheet" href="./assets/css/resources/style.css">
    <link rel="stylesheet" href="./assets/css/courses/course.css">


</head>

<body>

    <!-- navbar -->

    <?php include('./resources/navbar.php') ?>


    <div id="courses-main-section">
        <div class="courses-main-section">
            <div class="course-about">
                <div class="course-image">
                    <img src="./assets/img/courses/<?php echo $course_main["image"] ?>" alt="">
                </div>
                <div class="course-about-con">
                    <h2><?php echo safe_htmlspecialchars($course_main["course_name"]) ?></h2>
                    <p class="course-des"><?php echo safe_htmlspecialchars($course_main["description"]) ?></p>
                    <p class="con-1"><strong>Instructor :</strong> <?php echo safe_htmlspecialchars($course_main["instructors_name"]) ?></p>
                    <p class="con-1"><strong>Duration :</strong> <?php echo safe_htmlspecialchars($course_main["duration"]) ?></p>
                    <p class="con-1"><strong>Mode :</strong> <?php echo safe_htmlspecialchars($course_main["mode"]) ?></p>

                </div>
            </div>
<div class="course-in-con">
            <div class="course-coverage">
                <h2 class="text-center">Course Coverage</h2>
                <?php $course_coverage = json_decode($course_main['coverage']);
                if (is_array($course_coverage) && !empty($course_coverage)) {
                    foreach ($course_coverage as $coverage) {
                        echo "<ul>";
                        echo '<li>' . safe_htmlspecialchars($coverage) . "</li>";
                        echo "</ul>";
                    }
                }
                ?>
            </div>

            <div class="course_require">
                <h2 class="text-center">Course Requirements</h2>
                <?php $course_req = json_decode($course_main['requirements']);
                if (is_array($course_req) && !empty($course_req)) {
                    foreach ($course_req as $requirement) {
                        echo "<ul>";
                        echo '<li>' . safe_htmlspecialchars($requirement) . "</li>";
                        echo "</ul>";
                    }
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
                    foreach ($images as $image) { ?>

                        <img src="./assets/img/courses/<?php echo safe_htmlspecialchars($image)  ?>" alt="">
                    
                <?php }
                }
                ?>
                    </div>
            </div>

<div class="course-main-detail">
    
<div class="address_detail">
                <h2>Address Detail</h2>
                <p>Street :<?php echo safe_htmlspecialchars($course_main["street"]) ?></p>
                <p>District : <?php echo safe_htmlspecialchars($course_main["district"]) ?></p>
                <p>landmark : <?php echo safe_htmlspecialchars($course_main["landmark"]) ?></p>
                <p>Map : <a href="<?php echo safe_htmlspecialchars($course_main["google_map_link"]) ?>">Click Here</a></p>
            </div>


            <div class="contact_detail">
                <h2>Contact Detail</h2>
                <p>Phone :<?php echo safe_htmlspecialchars($course_main["phone"]) ?></p>
                <p>Email : <?php echo safe_htmlspecialchars($course_main["email"]) ?></p>
            </div>

            <div class="terms_and_condition">
                <h2>Terms and Conditions</h2>
                <p><?php echo safe_htmlspecialchars($course_main["terms_and_conditions"]) ?></p>
            </div>

            <div class="price_amout">
                <h2>Price : <?php echo safe_htmlspecialchars($course_main["price"]) ?></h2>
                <a href=""><Button>Join Now</Button></a>
            </div>
</div>
        </div>
    </div>






    <!-- footer -->
    <?php include('./resources/footer.php') ?>



    <!-- custom scripts -->
    <script src="./assets/js/resource/script.js"></script>
    <script src="https://kit.fontawesome.com/181ea7bd20.js" crossorigin="anonymous"></script>
</body>

</html>