<?php

include('./resources/conn.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About | <?php echo $name ?></title>
  <link rel="shortcut icon" href="./assets/img/main/favicontop.png" type="image/x-icon">
  <!-- links -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <!-- custom css -->

  <link rel="stylesheet" href="./assets/css/resources/style.css">
  <link rel="stylesheet" href="./assets/css/about/style.css">

</head>

<body>



  <!-- navbar -->

  <?php include('./resources/navbar.php')
  ?>


  <!-- header -->
  <header style="background:url(./assets/img/header/about.jpg) no-repeat center/cover;">
    <h2>ABOUT US</h2>
  </header>





  <!-- about us  -->
  <?php include('./resources/aboutcard.php') ?>


  <!-- Goals-->
  <div class="main-goals">
    <section id="goals">
      <div class="goals-main">
        <div class="goal-main-head">

          <div class="goal-icon">
            <img src="./assets/img/main/favicon.png" alt="" width="100px">
          </div>
          <div class="goal-heading">
            <h2>
              OUR GOALS
            </h2>
            <h2>
              We Have An Great Plan <br>
              For The Next Generation
            </h2>
          </div>
        </div>
        <div class="goal-content">
          <div class="goal-item">
            <div class="goal-item-img">
              <img src="./assets/img/about/Healthier.jpg" alt="" width="280px" height="280px">
            </div>
            <div class="goal-item-content">
              <div class="goal-item-head">
                <h2>
                  Shaping a Healthier Tomorrow
                </h2>
              </div>
              <div class="goal-content">
                <p>
                  We combine traditional wisdom with modern techniques to build a healthier future for all.
                </p>
              </div>
              <div class="goal-item-btn">
                <span>
                  Read More &nbsp; <i class="fa-solid fa-arrow-right"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="goal-item">
            <div class="goal-item-img">
              <img src="./assets/img/about/wellness.jpg" alt="" width="280px" height="280px">
            </div>
            <div class="goal-item-content">
              <div class="goal-item-head">
                <h2>
                  Advancing Natural <br> Wellness
                </h2>
              </div>
              <div class="goal-content">
                <p>

                  We focus on making holistic therapies more accessible and effective for future generations.
                </p>
              </div>
              <div class="goal-item-btn">
                <span>
                  Read More &nbsp; &nbsp; <i class="fa-solid fa-arrow-right"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="goal-item">
            <div class="goal-item-img">
              <img src="./assets/img/about/item3.jpg" alt="" width="280px" height="280px">
            </div>
            <div class="goal-item-content">
              <div class="goal-item-head">
                <h2>
                  Sustainable Health
                  <br> Practices
                </h2>
              </div>
              <div class="goal-content">
                <p>
                  We’re dedicated to eco-friendly wellness solutions that benefit both people and the planet. </p>
              </div>
              <div class="goal-item-btn">
                <span>
                  Read More &nbsp; <i class="fa-solid fa-arrow-right"></i>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>


  <?php

  $members_query = "SELECT * FROM  team_members ";
  $members_query = $conn->prepare($members_query);
  $members_query->execute();
  $members_list = [];
  $members_lists = $members_query->get_result();
  if ($members_lists->num_rows > 0) {

    while ($row = $members_lists->fetch_assoc()) {
      $members_list[] = $row;
    }
  } else {
    echo "No services found";
  }

  ?>
  <!-- Team info -->
  <div id="team-info">
    <div class="team-info">
      <div class="team-info-heading text-center">
        <h2>Our Strong Team</h2>
        <h4>
          Meet Our Experts, Driven by Passion & Excellence!
        </h4>
      </div>

      <div class="team-info-section">

        <div class="team-info-members">
          
            <?php foreach ($members_list as $member): ?>
              <div class="team-member">
              <div class="team-member-img">
                <img src="./assets/img/about/<?php echo $member['image'] ?>" alt="">
              </div>
              <div class="team-member-con">
                <h2>
                  <?php echo $member['name'] ?>
                </h2>
                <h3>
                  <?php echo $member['education'] ?>
                </h3>
                <h4>
                  <?php echo $member['designation'] ?>
                </h4>
                <p>
                  <?php echo $member['description'] ?>
                </p>
              </div>
              </div>
            <?php endforeach; ?>

        
        </div>

      </div>
    </div>
  </div>











  <!-- feedback -->
  <?php include('./resources/feedback.php') ?>

  <!-- footer -->
  <?php include('./resources/footer.php') ?>

  <!-- custom scripts -->
  <script src="./assets/js/resource/script.js"></script>
  <script src="https://kit.fontawesome.com/181ea7bd20.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


</body>

</html>