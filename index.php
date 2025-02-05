<?php

include('./resources/conn.php')

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GNT Research Health Care Center</title>
  <link rel="shortcut icon" href="./assets/img/main/favicontop.png" type="image/x-icon">
  <!-- links -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  
  <!-- custom css -->
  <link rel="stylesheet" href="./assets/css/resources/style.css">
  <link rel="stylesheet" href="./assets/css/resources/resource.css">
  <link rel="stylesheet" href="./assets/css/home/style.css">

  

</head>

<body>



  <!-- navbar -->

  <?php include('./resources/navbar.php') ?>

  <!-- hero section -->

  <div id="hero-section">
    <div class="swiper mySwiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide hero-swiper-slide myslider-1" style="background: url(./assets/img/home/slider1.jpg) no-repeat center/cover;">
          <div class="slider-content">
            <h2>Experience Holistic Healing</h2>
            <p>Discover natural therapies like Ayurveda, acupuncture, and yoga for a balanced, healthier lifestyle.</p>
            <div class="hero-slider-btn">
              <button>Book Now</button>
            </div>
          </div>
        </div>
        <div class="swiper-slide hero-swiper-slide myslider-2" style="background: url(./assets/img/home/slider2.jpg) no-repeat center/cover;">
          <div class="slider-content">
            <h2>Personalized Care for Every Need</h2>
            <p>Tailored treatment plans designed to address your unique health and wellness goals effectively.</p>
            <div class="hero-slider-btn">
              <button>Learn More</button>
            </div>
          </div>
        </div>
        <div class="swiper-slide hero-swiper-slide myslider-3" style="background: url(./assets/img/home/slider3.jpg) no-repeat center/cover;">
          <div class="slider-content">
            <h2>Expert Practitioners You Can Trust</h2>
            <p>Our skilled professionals combine traditional practices with modern techniques for optimal health outcomes.</p>
            <div class="hero-slider-btn">
              <button>Read More</button>
            </div>
          </div>
        </div>

      </div>
      <div class="swiper-button-next-btn">
        <div class="swiper-button-next swiper-button-next"></div>
      </div>
      <div class="swiper-button-prev-btn">
        <div class="swiper-button-prev myswiper-button-prev"></div>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>
  <div class="marquee">
<div class="marquee-con">
<marquee behavior="smooth" direction="right">
<?php

$marquee_query = "SELECT *  FROM marquee";
$stmt_marquee = $conn->prepare($marquee_query);
$stmt_marquee->execute();
$result_marquee = $stmt_marquee->get_result();
$marquee_con=[];
if ($result_marquee->num_rows > 0) {
    while($marquee_list=$result_marquee->fetch_assoc()){
        $marquee_con[]=$marquee_list;
        foreach($marquee_con as $marquee){
          echo $marquee['marquee_text'];
        }
    }

} else {
    echo "Social Media not found.";
}


?></marquee>
</div>
  </div>


  <?php include('./resources/aboutcard.php') ?>

  <!-- features  -->
  <section id="key-features">
    <div class="key-features-main">
      <div class="key-features-content">
        <div class="key-features-icon">
          <img src="./assets/img/main/favicon.png" alt="">
        </div>
        <div class="key-features-con-heading">
          <h4>
            FEATURES
          </h4>
          <h2>
            Our Key Strengths
          </h2>
        </div>
        <div class="key-features-con-points">
         <div class="key-features-con-point">
         <div class="key-features-point-img">
            <img src="./assets/img/home/healing.png" alt="">
          </div>
          <div class="key-features-points-con">
            <h2>
              Holistic Treatments
            </h2>
            <p>
              Integrating natural therapie techniques for complete healing.
            </p>
          </div>
         </div>
         <div class="key-features-con-point">
         <div class="key-features-point-img">
            <img src="./assets/img/home/personalized.png" alt="">
          </div>
          <div class="key-features-points-con">
            <h2>
              Personalized Care
            </h2>
            <p>
              Tailored treatment plans designed to suit individual needs.
             </p>
          </div>
         </div>
         <div class="key-features-con-point">
         <div class="key-features-point-img">
            <img src="./assets/img/home/womenicon.png" alt="">
          </div>
          <div class="key-features-points-con">
            <h2>
              Experienced Professionals
            </h2>
            <p>
              Skilled practitioners dedicated to providing expert care.
             </p>
          </div>
         </div>
         
        </div>
      </div>
      <div class="key-features-images">
        <div class="key-image-1">
          <img src="./assets/img/home/keyitem1.png" alt="">
        </div>
        <div class="key-image-2">
          <img src="./assets/img/home/keyitem2.jpg" alt="">
        </div>
      </div>
    </div>
  </section>


  <!-- our services -->
  <section id="our-services">
    <div class="our-services-main">
      <div class="our-services-head">
        <h4>
          OUR SERVICES
        </h4>
        <h2>
          Our Premium Wellness <br> Services
        </h2>
      </div>
      <div class="our-services-items">
        <div class="our-services-item">
          <div class="our-services-item-img">
            <img src="./assets/img/home/accu.jpeg" alt="">
          </div>
          <div class="our-services-item-con">
            <img src="./assets/img/home/acupuncture.png" alt="">
            <h2>
              Acupuncture Therapy
            </h2>
            <p>
              Experience relief and balance through ancient acupuncture techniques, promoting natural healing and reducing pain by restoring energy flow.
            </p>
            <button>
              Read More <i class="fa-solid fa-arrow-right"></i>
            </button>
          </div>

        </div>
        <div class="our-services-item">
          <div class="our-services-item-img">
            <img src="./assets/img/home/chiropractic.jpg" alt="">
          </div>
          <div class="our-services-item-con">
            <img src="./assets/img/home/chiropractic.png" alt="">
            <h2>
              Chiropractic Care
            </h2>
            <p>
              Restore spinal health and alleviate pain through expert chiropractic adjustments, improving mobility, posture, and overall well-being. </p>
            <button>
              Read More <i class="fa-solid fa-arrow-right"></i>
            </button>
          </div>

        </div>

        <div class="our-services-item">
          <div class="our-services-item-img">
            <img src="./assets/img/home/yoga.jpg" alt="">
          </div>
          <div class="our-services-item-con">
            <img src="./assets/img/home/exercise.png" alt="">
            <h2>
              Yoga and Meditation
            </h2>
            <p>
              Enhance your physical and mental well-being with guided yoga and meditation sessions, fostering relaxation and inner harmony. </p>
            <button>
              Read More <i class="fa-solid fa-arrow-right"></i>
            </button>
          </div>

        </div>
      </div>
    </div>
  </section>





  <div id="offer-banner">
  <?php
$banner_query = "SELECT * FROM adsbanner ORDER BY created_at DESC LIMIT 1";
$result = $conn->query($banner_query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $ad_name = $row['ad_name'];
    $ad_banner = $row['ad_banner'];
    $description = json_decode($row['description'], true);
    ?>

    <div class="offer-main-banner">
        <div class="offer-img">
        <img src="./assets/img/home/offer.png" alt="">
 
        </div>
        <div class="offer-content">
            <h2><?php echo htmlspecialchars($ad_name); ?></h2>
            <ul>
                <?php
                if (is_array($description)) {
                    foreach ($description as $offer) {
                        echo "<li>" . htmlspecialchars($offer) . "</li>";
                    }
                }
                ?>
            </ul>
            <div class="offer-btn">
                <button>Book Now</button>
            </div>
        </div>
        <div class="offer-banner-ad">
        <img src="./assets/img/offer/<?php echo htmlspecialchars($ad_banner); ?>" alt="Ad Banner">
        </div>
    </div>

    <?php
} else {
    echo '<div class="offer-main-banner"><p>No offers available at the moment.</p></div>';
}
?>

  </div>

  <!-- feedback -->
  <?php include('./resources/feedback.php') ?>

  <!-- why choose us -->

  <section id="choose-us">
    <div class="choose-us-main">
      <div class="choose-us-main-img">
        <img src="./assets/img/home/chooseus.webp" alt="">
      </div>
      <div class="choose-us-con">
        <div class="choose-us-con-heading">
          <h4>
            Why Choose Us
          </h4>
          <h2>
            Experience Expert Care Through Natural Healing Solutions
          </h2>
          <p>
            With experienced professionals, personalized care, and holistic natural therapies, we ensure your journey to wellness is effective and nurturing
          </p>
        </div>
        <div class="choose-us-content">
          <span class="choose-us-con-points"><img src="./assets/img/main/icon1.png" alt=""><span>Combining traditional and modern therapies for complete well-being.</span></span>
          <span class="choose-us-con-points"><img src="./assets/img/main/icon1.png" alt=""><span>Skilled professionals delivering personalized and effective care.</span></span>
        </div>
        <div class="choose-us-points">
          <div>
            <img src="./assets/img/home/natural.png" alt="">
            <p>
              Natural Therapies
            </p>
          </div>
          <div>
            <img src="./assets/img/home/personalized.png" alt="">
            <p>
              Personalized Care
            </p>
          </div>
          <div>
            <img src="./assets/img/home/holistichealth.png" alt="">
            <p>
              5 + Years of Experience
            </p>
          </div>
        </div>

      </div>
    </div>
  </section>










  <!-- gallery -->
  <?php include('./resources/maingallery.php') ?>


  <!-- booking form -->
  <?php include('./resources/form.php') ?>






  <?php include('./resources/footer.php') ?>

  <script src="https://kit.fontawesome.com/181ea7bd20.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="./assets/js/resource/script.js"></script>
  <script>
    var swiper = new Swiper(".mySwiper", {
      spaceBetween: 30,
      effect: "fade",
      loop: true,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      autoplay: {
        delay: 2000,
      },
    });
  </script>
  
</body>

</html>