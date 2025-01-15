<?php

include('./resources/conn.php')

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Service | <?php echo $name ?></title>
  <link rel="shortcut icon" href="./assets/img/main/favicon.png" type="image/x-icon">
  <!-- links -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

  <!-- custom css -->
  <link rel="stylesheet" href="./assets/css/resources/resource.css">
  <link rel="stylesheet" href="./assets/css/resources/style.css">
  <link rel="stylesheet" href="./assets/css/service/style.css">

</head>

<body>

  <!-- navbar -->

  <?php include('./resources/navbar.php') ?>

  <header style="background:url(./assets/img/header/service.jpg) no-repeat center/cover;">
    <h2>SERVICES</h2>
  </header>

  <div id="section-1">
    <section id="treatments">
      <div id="swiper-button-next"><button><i class="fa-solid fa-arrow-right"></i></button></div>
      <div id="swiper-button-prev"><button><i class="fa-solid fa-arrow-left"></i></button></div>
      <div class="treatments">
        <div class="treatments-content">
          <div class="treatments-content-heading">
            <h4>Explore Treatments</h4>
            <h2>
              We Manage Cannabis
              Product Strategy
            </h2>

          </div>
          <div class="treatments-con">
            <p>
              Our holistic therapies, including acupuncture, cupping, Ayurveda, chiropractic care, and yoga, are designed to promote natural healing. By blending ancient traditions with modern methods, we help restore balance, relieve stress, and improve overall health.
            </p>
          </div>
        </div>
        <div class="treatments-slider">

          <div class="swiper mySwiper">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <div class="slide-image">
                  <img src="./assets/img/services/weight-loss.jpg" alt="Weight Loss">
                </div>
                <div class="slide-content">
                  <h3>Weight Loss</h3>
                  <p>Effective plans to reduce body fat and maintain a healthy weight naturally.</p>
                  <button>Read More <i class="fa-solid fa-arrow-right"></i></button>
                </div>
              </div>

              <div class="swiper-slide">
                <div class="slide-image">
                  <img src="./assets/img/services/bridal-care.jpg" alt="Bridal Care">
                </div>
                <div class="slide-content">
                  <h3>Bridal Care</h3>
                  <p>Comprehensive pre-wedding care for glowing skin and radiant beauty.</p>
                  <button>Read More <i class="fa-solid fa-arrow-right"></i></button>
                </div>
              </div>

              <div class="swiper-slide">
                <div class="slide-image">
                  <img src="./assets/img/services/Detox.webp" alt="Detox">
                </div>
                <div class="slide-content">
                  <h3>Full Body Detox</h3>
                  <p>Cleansing programs to eliminate toxins and rejuvenate your body.</p>
                  <button>Read More <i class="fa-solid fa-arrow-right"></i></button>
                </div>
              </div>

              <div class="swiper-slide">
                <div class="slide-image">
                  <img src="./assets/img/services/Skin Care.jpg" alt="Skin Care">
                </div>
                <div class="slide-content">
                  <h3>Skin Care</h3>
                  <p>Treatments for healthy, glowing, and youthful-looking skin.</p>
                  <button>Read More <i class="fa-solid fa-arrow-right"></i></button>
                </div>
              </div>

              <div class="swiper-slide">
                <div class="slide-image">
                  <img src="./assets/img/services/Hair Care.jpeg" alt="Hair Care">
                </div>
                <div class="slide-content">
                  <h3>Hair Care</h3>
                  <p>Solutions for stronger, shinier, and nourished hair.</p>
                  <button>Read More <i class="fa-solid fa-arrow-right"></i></button>
                </div>
              </div>

              <div class="swiper-slide">
                <div class="slide-image">
                  <img src="./assets/img/services/Pain Relief.jpg" alt="Pain Relief">
                </div>
                <div class="slide-content">
                  <h3>Pain Relief</h3>
                  <p>Natural remedies to alleviate pain and improve mobility.</p>
                  <button>Read More <i class="fa-solid fa-arrow-right"></i></button>
                </div>
              </div>

              <div class="swiper-slide">
                <div class="slide-image">
                  <img src="./assets/img/services/Insomnia.jpg" alt="Insomnia">
                </div>
                <div class="slide-content">
                  <h3>Insomnia</h3>
                  <p>Holistic therapies for restful sleep and stress reduction.</p>
                  <button>Read More <i class="fa-solid fa-arrow-right"></i></button>
                </div>
              </div>

              <div class="swiper-slide">
                <div class="slide-image">
                  <img src="./assets/img/services/spinecare.jpg" alt="Spine Care">
                </div>
                <div class="slide-content">
                  <h3>Spine Care</h3>
                  <p>Treatments to support a healthy, pain-free spine.</p>
                  <button>Read More <i class="fa-solid fa-arrow-right"></i></button>
                </div>
              </div>

              <div class="swiper-slide">
                <div class="slide-image">
                  <img src="./assets/img/services/Flower Medicine.webp" alt="Flower Medicine">
                </div>
                <div class="slide-content">
                  <h3>Flower Medicine</h3>
                  <p>Healing using natural extracts for emotional and physical balance.</p>
                  <button>Read More <i class="fa-solid fa-arrow-right"></i></button>
                </div>
              </div>

              <div class="swiper-slide">
                <div class="slide-image">
                  <img src="./assets/img/services/Yoga.webp" alt="Yoga">
                </div>
                <div class="slide-content">
                  <h3>Yoga</h3>
                  <p>Practices for enhanced flexibility, mindfulness, and overall wellness.</p>
                  <button>Read More <i class="fa-solid fa-arrow-right"></i></button>
                </div>
              </div>



            </div>

          </div>

        </div>
      </div>
    </section>
  </div>



  <!-- Therapy -->
  <section id="therapy">
    <div class="therapy">
      <div class="therapy-content d-flex">
        <div class="therapy-heading">
          <h4>WHAT WE DO</h4>
          <h2>Therapies Offered</h2>
        </div>
        <div class="therapy-para">
          <p>
            Our therapy offerings are designed to nurture your body, mind, and spirit, helping you achieve holistic wellness. By combining ancient traditions with modern approaches, each therapy is tailored to support your unique health needs and promote balance, healing, and vitality.
          </p>
        </div>
      </div>
      <div class="therapy-slider">
        <div class="swiper mySwiper2">
          <div class="swiper-wrapper">
            <div class="swiper-slide myswiper-slide dorn-therapy">
              <img src="./assets/img/therapy/done.png" alt="Dorn Therapy">
              <h3>Dorn Therapy</h3>
            </div>
            <div class="swiper-slide myswiper-slide acupuncture">
              <img src="./assets/img/therapy/acupuncture-needles.png" alt="Acupuncture">
              <h3>Acupuncture</h3>
            </div>
            <div class="swiper-slide myswiper-slide massage">
              <img src="./assets/img/therapy/massage.png" alt="Massage">
              <h3>Massage</h3>
            </div>
            <div class="swiper-slide myswiper-slide paadha-gusa">
              <img src="./assets/img/therapy/paadha-gusa.png" alt="Paadha Gusa">
              <h3>Paadha Gusa</h3>
            </div>
            <div class="swiper-slide myswiper-slide wetpack">
              <img src="./assets/img/therapy/wetpack.png" alt="Wet Pack">
              <h3>Wet Pack</h3>
            </div>
            <div class="swiper-slide myswiper-slide flower-medicine">
              <img src="./assets/img/therapy/flower-medicine.png" alt="Flower Medicine">
              <h3>Flower Medicine</h3>
            </div>
            <div class="swiper-slide myswiper-slide hijama">
              <img src="./assets/img/therapy/Hijama.png" alt="Hijama">
              <h3>Hijama</h3>
            </div>
            <div class="swiper-slide myswiper-slide acupressure">
              <img src="./assets/img/therapy/acupressure.png" alt="Acupressure">
              <h3>Acupressure</h3>
            </div>
            <div class="swiper-slide myswiper-slide reflexology">
              <img src="./assets/img/therapy/Reflexology.png" alt="Reflexology">
              <h3>Reflexology</h3>
            </div>
            <div class="swiper-slide myswiper-slide navara-massage">
              <img src="./assets/img/therapy/navara-massage.png" alt="Navara Massage">
              <h3>Navara Massage</h3>
            </div>
            <div class="swiper-slide myswiper-slide facial">
              <img src="./assets/img/therapy/Facial.png" alt="Facial">
              <h3>Facial</h3>
            </div>
            <div class="swiper-slide myswiper-slide yoga">
              <img src="./assets/img/therapy/Yoga.png" alt="Yoga">
              <h3>Yoga</h3>
            </div>
            <div class="swiper-slide myswiper-slide cupping-facial">
              <img src="./assets/img/therapy/cupping-facial.png" alt="Cupping Facial">
              <h3>Cupping Facial</h3>
            </div>
            <div class="swiper-slide myswiper-slide herbal-steam">
              <img src="./assets/img/therapy/steam.png" alt="Herbal Steam">
              <h3>Herbal Steam</h3>
            </div>
            <div class="swiper-slide myswiper-slide shirodhara">
              <img src="./assets/img/therapy/shirodhara.png" alt="Shirodhara">
              <h3>Shirodhara</h3>
            </div>
            <div class="swiper-slide myswiper-slide stone-therapy">
              <img src="./assets/img/therapy/stone-therapy.png" alt="Stone Therapy">
              <h3>Stone Therapy</h3>
            </div>
            <div class="swiper-slide myswiper-slide detox-therapy">
              <img src="./assets/img/therapy/detox-therapy.png" alt="Detox Therapy">
              <h3>Detox Therapy</h3>
            </div>
          </div>

        </div>
      </div>
    </div>
    </div>
    </div>
  </section>


<!-- QUOTE -->
 <div id="quote-main-section" >
  <div class="quote-main">
    <div>
    <h2>Heal naturally, live fully</h2>
    <h4>Don't Hesitate To Contact With Us</h4>
    </div>
    <div>
      <div class="quote-btn"><button>
     Book Now  <i class="fa-solid fa-arrow-right"></i>
      </button></div>
    </div>
  </div>
 </div>





















  <!-- footer -->
  <?php include('./resources/footer.php') ?>



  <!-- custom scripts -->
  <script src="./assets/js/resource/script.js"></script>
  <script src="https://kit.fontawesome.com/181ea7bd20.js" crossorigin="anonymous"></script>

  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper(".mySwiper", {
      slidesPerView: 4,
      spaceBetween: 15,
      loop: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: '#swiper-button-next',
        prevEl: '#swiper-button-prev',
      },
      autoplay: {
        delay: 2000,
      },
    });
    var swiper2 = new Swiper(".mySwiper2", {
      slidesPerView: 6,
      spaceBetween: 15,
      loop: true,
      autoplay: {
        delay: 1100,
      },
    });
  </script>
</body>

</html>