<?php

include('../resources/conn.php');

$gallery_images=[];
$gallery_query = "SELECT * from maingallery";
$gallery_result=$conn->query($gallery_query);
if($gallery_result->num_rows>0){
  while($gallery_list=$gallery_result->fetch_assoc()){
    $gallery_images[]=$gallery_list['image'];
    $gallery_id[]=$gallery_list['id'];
  }
}
else{
  echo "<script>alert(Image Fetch Error)</script>";
}

if($_SERVER['REQUEST_METHOD']=="POST"){
  $form_Name=$_POST['form_name'];
  if($form_Name=='image_update'){
    $image_id=$_POST['image_id'];
    if (isset($_FILES['gallery_image']) && $_FILES['gallery_image']['error'] == 0) {
      $gallery_image = $_FILES['gallery_image'];
      $unique_filename = uniqid() . "_" . basename($gallery_image["name"]);
      $target_dir = "../assets/img/gallery/";
      $target_file = $target_dir . $unique_filename;
      if (!is_dir($target_dir)) {
          mkdir($target_dir, 0755, true);
      }
      if (move_uploaded_file($gallery_image["tmp_name"], $target_file)) {
          $stmt = $conn->prepare("UPDATE maingallery SET image = ? WHERE id = ?");
          $stmt->bind_param("ss", $unique_filename, $image_id);
          $stmt->execute();
          $stmt->close();

          header("Location: ./gallery.php");
          exit();
      } else {
          echo "Failed to upload the image.";
      }
  }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gallery</title>
  <link rel="shortcut icon" href="../assets/img/main/favicontop.png" type="image/x-icon">
  <!-- links -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>

  <!-- custom css -->
  <link rel="stylesheet" href="../assets/css/wp-admin/gallery.css">
  <link rel="stylesheet" href="../assets/css/wp-admin/style.css">
  <style>
    .update-icon{
      border: 4px solid white;
    }
  </style>
</head>

<body>

  <?php include('./navbar.php') ?>


  

  <div class="update-gallery mt-5  ">
  <?php foreach ($gallery_id as $id): ?>
    <form action="./gallery.php" method="post" class="d-flex justify-content-center align-items-center flex-column" enctype="multipart/form-data">
                    <p class="mt-3"><?php echo $id ?></p>
                    <input type="hidden" name="form_name" value="image_update">
                    <input type="hidden" name="image_id" value="<?php echo htmlspecialchars($id); ?>">
                    <input type="file"  name='gallery_image'>
                    <button type="submit" class="update-icon mt-2"><i class="fa fa-refresh" aria-hidden="true"></i></button>
  </form>

   <?php endforeach; ?>
</div>

  <div id="gallery">
  <?php foreach ($gallery_images as $image): ?>
    <img src="../assets/img/gallery/<?php echo $image; ?>" alt="Gallery Image" >
  <?php endforeach; ?>
</div>






  <!-- custom scripts -->
  <script src="https://kit.fontawesome.com/181ea7bd20.js" crossorigin="anonymous"></script>
</body>

</html>