<?php

$gallery_images=[];
$gallery_query = "SELECT * from maingallery";
$gallery_result=$conn->query($gallery_query);
if($gallery_result->num_rows>0){
  while($gallery_list=$gallery_result->fetch_assoc()){
    $gallery_images[]=$gallery_list['image'];
  }
}
else{
  echo "<script>alert(Image Fetch Error)</script>";
}

?>

<section id="gallery">
<?php foreach ($gallery_images as $image): ?>
    <img src="./assets/img/gallery/<?php echo $image; ?>" alt="Gallery Image" >
  <?php endforeach; ?>
         
</section>