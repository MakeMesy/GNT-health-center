<?php

include('../resources/conn.php');

$social_media_query = "SELECT *  FROM social_media";
$stmt_social_media = $conn->prepare($social_media_query);
$stmt_social_media->execute();
$result_social_media = $stmt_social_media->get_result();
$social_media=[];
if ($result_social_media->num_rows > 0) {
    while($social_media_list=$result_social_media->fetch_assoc()){
        $social_media[]=$social_media_list;
        
    }

} else {
    echo "Social Media not found.";
}


if($_SERVER['REQUEST_METHOD']=="POST"){
    $FormName=$_POST['FormName'];
    if($FormName=='social_media_update'){
        $social_id=$_POST['social_id'];
        $social_link=$_POST['social_link'];

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
    }
    elseif($FormName=='marquee_update'){
        $marque_id=$_POST['marque_id'];
        $marquee_text=$_POST['marquee_text'];

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
    }
}

$marquee_query = "SELECT *  FROM marquee";
$stmt_marquee = $conn->prepare($marquee_query);
$stmt_marquee->execute();
$result_marquee = $stmt_marquee->get_result();
$marquee_con=[];
if ($result_marquee->num_rows > 0) {
    while($marquee_list=$result_marquee->fetch_assoc()){
        $marquee_con[]=$marquee_list;
        
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
  <link rel="shortcut icon" href="../assets/img/main/favicon.png" type="image/x-icon">
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

<div class="main-section">
    <h2>Social Media</h2>
  
<?php foreach ( $social_media as $social_Link): ?>
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
  <?php foreach ( $marquee_con as $marquee): ?>

                <form action="./setting.php" method="post" class="marquee-con">
                <input type="hidden" value="marquee_update" name="FormName">
                <input type="hidden" value="<?php echo $marquee['id'] ?>" name="marque_id">
                <input type="text" value="<?php echo $marquee['marquee_text'] ?>" name="marquee_text">
               <button type="submit" class="update-icon"><i class="fa fa-refresh" aria-hidden="true"></i></button>
               </form>

            <?php endforeach; ?>
  </div>




  <!-- custom scripts -->
  <script src="https://kit.fontawesome.com/181ea7bd20.js" crossorigin="anonymous"></script>
</body>

</html>