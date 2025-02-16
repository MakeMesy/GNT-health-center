<?php

$query = "SELECT * FROM testimonial ORDER BY created_at DESC";
$result = $conn->query($query);
$testimonial_user=[];

if ($result->num_rows > 0) {
    while ($testimonial = $result->fetch_assoc()) {
        $testimonial_user[]=$testimonial;
    }
} else {
    echo "<p>No testimonials found.</p>";
}

?>


<section id="feedback">
  <div class="feedback-main">
    <div class="feedback-heading">
      <span>clients feedback</span>
      <h2>Satisfied People Are <br> Say About Our Center</h2>
    </div>
  </div>

  <div class="feedback-content-main swiper" id="feedback-slider">
  
    <div class="swiper-wrapper ">
      <!-- First Feedback Card -->
      <?php foreach ($testimonial_user as $user): ?>
        <div class="feedback-card swiper-slide">
          <div class="feedback-card-img">
          <img src="./assets/img/testimonialuser/<?php echo $user['user_image']; ?>" alt="Testimonial Image" width="140px">
          </div>
          <div class="feedback-card-content">
            <p class="text-center p-2"><?php echo $user['feedback']; ?></p>
          </div>
          <div class="feedback-card-name">
            <span class="font-weight-bold"><?php echo $user['name']; ?></span>
          </div>
        </div>
  <?php endforeach; ?>
       
    </div>


    <div class="swiper-pagination"></div>


    <div class="swiper-button-prev mynewswiper-button-prev"></div>
    <div class="swiper-button-next mynewswiper-button-next"></div>
  </div>
</section>




<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
  var swiper = new Swiper('#feedback-slider', {
    loop: true,
    slidesPerView: 1,
    spaceBetween: 50,
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    breakpoints: {
      1024: {
        slidesPerView: 4,
      },
      768: {
        slidesPerView: 4,
      }
    }
  });
</script>
