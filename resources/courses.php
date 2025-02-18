<?php

$course_list_query = $conn->prepare("SELECT * FROM courses_list");
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
  <div class="our-courses-main">
    <div class="our-courses-heading">
      <span>Our courses</span>
      <h2>Explore. Learn. Excel – Find the Perfect Course for You!</h2>
    </div>
  </div>

  <div class="our-courses-content-main swiper" id="our-courses-slider">
  
    <div class="swiper-wrapper courses-content-main ">
      <!-- First our-courses Card -->
      <?php foreach ($course_list as $course): ?>
        <div class="our-courses-card swiper-slide">
          <div class="our-courses-card-img">
          <img src="./assets/img/courses/<?php echo $course['image']; ?>" alt="course Image" >
          </div>
          <div class="our-courses-card-content">
            <p class="text-center"><?php echo $course['course_name']; ?></p>
            <span class="description" ><?php echo $course['description']; ?></span>
            <span class="price">&#8377;<?php echo $course['price']; ?></span>
          <a href="./courses.php?course=<?php echo $course['url_name']; ?>"><button>Explore</button></a>
          </div>
        </div>
  <?php endforeach; ?>
       
    </div>

    <div class="swiper-pagination"></div>
    <div class="swiper-button-prev mynewswiper-button-prev course-newswiper-button-prev"></div>
    <div class="swiper-button-next mynewswiper-button-next course-newswiper-button-next"></div>
  </div>
</section>




<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
  var swiper = new Swiper('#our-courses-slider', {
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
        slidesPerView: 3,
      },
      768: {
        slidesPerView: 4,
      }
    }
  });
</script>
