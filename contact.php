<?php

include('./resources/conn.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Contact | <?php echo $name ?></title>
  <link rel="shortcut icon" href="./assets/img/main/favicontop.png" type="image/x-icon">
  <!-- links -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  
  <!-- custom css -->
   <link rel="stylesheet" href="./assets/css/resources/style.css">
   <link rel="stylesheet" href="./assets/css/contact/style.css">


</head>
<body>



<!-- navbar -->

<?php include('./resources/navbar.php') ?>

<header style="background:url(./assets/img/header/contact.jpg) no-repeat center/cover;">
    <h2>CONTACT US</h2>
  </header>

<!-- contact details -->
<section id="contact-detail">
    <div class="contact-content">
        <div class="content-con-item">
            <img src="./assets/img/contact/map.png" alt="">
            <h2>Center Location</h2>
            <p>
            Rathinam Nagar 6th street , Theni - Allinagram
            </p>
        </div>
        <div class="content-con-item">
            <img src="./assets/img/contact/mail.png" alt="">
            <h2>Email Us</h2>
            <a href="">
            gowri12185@gmail.com
            </a>
        </div>
        <div class="content-con-item">
            <img src="./assets/img/contact/phone.png" alt="">
            <h2>Contact Us</h2>
            <p >
            +91 8667832990
            </p>
        </div>
    </div>
</section>

 <!-- map -->

<section id="map-main">
<iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.8354345080887!2d-122.41941548467932!3d37.77492977975917!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80858154d2353b1f%3A0x8a6e9c8e12db519f!2sSan%20Francisco%2C%20CA%2C%20USA!5e0!3m2!1sen!2sin!4v1697035040657!5m2!1sen!2sin"
        allowfullscreen=""
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade">
    </iframe>
</section> 


<?php include('./resources/form.php'); ?>







<!-- footer -->
<?php include('./resources/footer.php') ?>

<!-- custom scripts -->
 <script src="./assets/js/resource/script.js"></script>
  <script src="https://kit.fontawesome.com/181ea7bd20.js" crossorigin="anonymous"></script>

</body>
</html>