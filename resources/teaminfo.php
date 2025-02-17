
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
    <div class="team-info-style-img">
      <img src="./assets/img/main/side.png" alt="">
    </div>
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



