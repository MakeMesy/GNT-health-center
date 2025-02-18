<?php

$members_query = "SELECT `name`, `designation`, `education`, `description`, `image` FROM `team_members`";
$members_query = $conn->prepare($members_query);
$members_query->execute();

// Bind the result columns to PHP variables
$members_query->bind_result($name, $designation, $education,$description,$image); // Adjust the variables based on your table structure

$members_list = [];
while ($members_query->fetch()) {
    $members_list[] = [
        "name" => $name,
        "designation" => $designation,
        "image" => $image,
        "education"=>$education,
        "description"=>$description

    ];
}

// Close the prepared statement
$members_query->close();

if (empty($members_list)) {
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



