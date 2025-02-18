<?php

include('../resources/conn.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $FormName = $_POST['FormName'];
    if ($FormName == "featured_course_img") {
        $course_id = $_POST['course_id'];
        if (isset($_FILES['course_img']) && $_FILES['course_img']['error'] == 0) {
            $course_img = $_FILES['course_img'];
            $unique_filename = uniqid() . "_" . basename($course_img["name"]);
            $target_dir = "../assets/img/courses/";
            $target_file = $target_dir . $unique_filename;
            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0755, true);
            }
            if (move_uploaded_file($course_img["tmp_name"], $target_file)) {
                $stmt = $conn->prepare("UPDATE featured_courses SET image = ? WHERE id = ?");
                $stmt->bind_param("ss", $unique_filename, $course_id);
                $stmt->execute();
                $stmt->close();

                header("Location: ./courses.php");
                exit();
            } else {
                echo "<script>alert(Failed to upload the image.)</script>";
            }
        }
    } elseif ($FormName == 'featured_course_con') {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $Link = $_POST['link'];
        $course_id = $_POST['course_id'];
        $course_update = "UPDATE featured_courses set name=?,description=?,price=?,link=? where id= ?";
        $course_stmt = $conn->prepare($course_update);
        $course_stmt->bind_param('sssss', $name, $description, $price, $Link, $course_id);
        if ($course_stmt->execute()) {
            ob_start();
            header("Location: ./courses.php");
            ob_end_flush();
            exit();
        } else {
            ob_start();
            header("Location: ./courses.php");
            ob_end_flush();
            exit();
        }
    }
    elseif ( $FormName=="delete_course" ) {
            $course_id=$_POST['course_id'];
            $stmt = $conn->prepare("DELETE from courses_list where id= ?");
            $stmt->bind_param("s", $course_id);
            $stmt->execute();
            $stmt->close();
  
            header('Location: ./courses.php');
            exit();
        } else {
            echo '<script>alert("error in delete")</script>';
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
    <link rel="stylesheet" href="../assets/css/wp-admin/courses.css">
</head>

<body>

    <?php include('./navbar.php') ?>



    <?php
    $featured_query = "SELECT * FROM  featured_courses ";
    $featured_query = $conn->prepare($featured_query);
    $featured_query->execute();
    $featured_cour_list = [];
    $featured_cour_lists = $featured_query->get_result();
    if ($featured_cour_lists->num_rows > 0) {

        while ($row = $featured_cour_lists->fetch_assoc()) {
            $featured_cour_list[] = $row;
        }
    } else {
        echo "No services found";
    }

    ?>

    <!-- featured courses -->
    <div id="featured-courses">
        <h2 class="mb-5">Featured Courses Update</h2>
        <div class="features-courses">
            <div class="features-course-content">
                <?php foreach ($featured_cour_list as $featured_course): ?>
                    <div class="features-course-point">
                        <div class="features-course-point-img">
                            <img src="../assets/img/courses/<?php echo $featured_course['image']; ?>" alt="">
                            <form action="./courses.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" value="featured_course_img" name="FormName">
                                <input type="hidden" value="<?php echo $featured_course['id'] ?>" name="course_id">
                                <input type="file" name="course_img">
                                <button type="submit" class="update-icon w-25"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                            </form>
                        </div>
                        <div class="features-course-con">
                            <form action="./courses.php" method="post">
                                <input type="hidden" value="featured_course_con" name="FormName">

                                <input type="hidden" value="<?php echo $featured_course['id'] ?>" name="course_id">
                                <input type="text" value="<?php echo $featured_course['name']; ?>" name="name">
                                <input type="text" value="<?php echo $featured_course['description']; ?>" name="description">
                                <input type="text" value="<?php echo $featured_course['link']; ?>" name="link">
                                <input type="text" value="<?php echo $featured_course['price']; ?>" name="price">
                                <button type="submit" class="update-icon w-25"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                            </form>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>




    <?php
    $course_list_query = $conn->prepare("SELECT * FROM courses_list ORDER bY id desc");
    $course_list_query->execute();
    $result = $course_list_query->get_result();

    $course_list = [];

    if ($result->num_rows > 0) {
        while ($course_lists = $result->fetch_assoc()) {
            $course_list[] = $course_lists;
        }
    } else {
        echo "<p>No courses found.</p>";
    }

    ?>



    <section id="our-courses">

    <h2>Add Courses</h2>
<a href="./add_courses.php"><button class="btn btn-secondary">Add</button></a>
        <div class="our-courses-content-main mt-2 " id="our-courses-slider">

            <div class="courses-content-main">
                <?php foreach ($course_list as $course): ?>
                    <div class="our-courses-card ">
                        <div class="our-courses-card-img">
                            <img src="../assets/img/courses/<?php echo $course['image']; ?>" alt="course Image">
                        </div>
                        <div class="our-courses-card-content">
                            <p class="text-center"><?php echo $course['course_name']; ?></p>
                            <span class="description"><?php echo $course['description']; ?></span>
                            <span class="price">&#8377;<?php echo $course['price']; ?></span>
                            <a href="./update_course.php?id=<?php echo $course['id']; ?>"><button>Update</button></a>
                            <form action="./courses.php" method="post" class="mt-2">
                                <input type="hidden" value="delete_course" name="FormName">
                         <input type="hidden" value="<?php echo $course['id']; ?>" name="course_id">
                                <button type="submit" class="update-icon w-25">Delete</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>








    <!-- custom scripts -->
    <script src="https://kit.fontawesome.com/181ea7bd20.js" crossorigin="anonymous"></script>
</body>

</html>