<?php

include('../resources/conn.php');


if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $FormName = $_POST['FormName'];
  if ($FormName == "member_img") {
    $member_id = $_POST['member_id'];
    if (isset($_FILES['member_img']) && $_FILES['member_img']['error'] == 0) {
      $member_img = $_FILES['member_img'];
      $unique_filename = uniqid() . "_" . basename($member_img["name"]);
      $target_dir = "../assets/img/about/";
      $target_file = $target_dir . $unique_filename;
      if (!is_dir($target_dir)) {
        mkdir($target_dir, 0755, true);
      }
      if (move_uploaded_file($member_img["tmp_name"], $target_file)) {
        $stmt = $conn->prepare("UPDATE team_members SET image = ? WHERE id = ?");
        $stmt->bind_param("ss", $unique_filename, $member_id);
        $stmt->execute();
        $stmt->close();

        header("Location: ./teammembers.php");
        exit();
      } else {
        echo "<script>alert(Failed to upload the image.)</script>";
      }
    }
  }elseif($FormName=='member_con'){
    $mem_name = $_POST['mem_name'];
    $mem_education = $_POST['mem_education'];
    $mem_designation = $_POST['mem_designation'];
    $mem_description = $_POST['mem_description'];
    $member_id = $_POST['member_id'];

    $mem_update = "UPDATE team_members set name=?,education=?,designation=?,description=? where id= ?";
    $mem_update_stmt = $conn->prepare($mem_update);
    $mem_update_stmt->bind_param('sssss', $mem_name, $mem_education, $mem_designation,$mem_description, $member_id);
    if ($mem_update_stmt->execute()) {
        ob_start();
        header("Location: ./teammembers.php");
        ob_end_flush();
        exit();
    } else {
        ob_start();
        header("Location:  ./teammembers.php");
        ob_end_flush();
        exit();
    }
  } elseif ($FormName == 'member_add') {
    $mem_name = $_POST['mem_name'];
    $mem_education = $_POST['mem_education'];
    $mem_designation = $_POST['mem_designation'];
    $mem_description = $_POST['mem_description'];
     
    if (isset($_FILES['member_img']) && $_FILES['member_img']['error'] == 0) {
        $member_img = $_FILES['member_img'];
        $unique_filename = uniqid() . "_" . basename($member_img["name"]);
        $target_dir = "../assets/img/about/";
        $target_file = $target_dir . $unique_filename;
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0755, true);
        }

        if (move_uploaded_file($member_img["tmp_name"], $target_file)) {
            $mem_update_stmt = $conn->prepare("INSERT INTO team_members (name,designation,education,description,image) VALUES (?, ?, ?,?,?)");
            $mem_update_stmt->bind_param('sssss', $mem_name,$mem_designation, $mem_education, $mem_description,$unique_filename,);
            $mem_update_stmt->execute();
            $mem_update_stmt->close();
            header('Location: ./teammembers.php');
            exit();
        } else {
            echo "<script>alert(upload)</script>";
        }
    } 

}
else if ($FormName == 'mem_del') {
  $member_id = $_POST['member_id'];
  if ($member_id) {
      $stmt = $conn->prepare("DELETE from team_members where id= ?");
      $stmt->bind_param("s", $member_id);
      $stmt->execute();
      $stmt->close();

      header('Location: ./teammembers.php');
      exit();
  } else {
      echo '<script>alert("error in delete")</script>';
  }
} else {
  echo "No file uploaded or there was an error with the file upload.";
}
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Team Members</title>
  <link rel="shortcut icon" href="../assets/img/main/favicontop.png" type="image/x-icon">
  <!-- links -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>

  <!-- custom css -->
  <link rel="stylesheet" href="../assets/css/wp-admin/members.css">
  <link rel="stylesheet" href="../assets/css/wp-admin/style.css">
  <style>
    .update-icon {
      border: 4px solid white;
    }
  </style>
</head>

<body>

  <?php include('./navbar.php') ?>



  <!-- add a team member -->
   <div id="add-member">
   <div class="team-member-add">
    <h2>Add a Member</h2>
   <form action="./teammembers.php" method="post" class="mt-4" enctype="multipart/form-data">
   <input type="hidden" value="member_add" name="FormName">

                  <input type="file" name="member_img" required>
                <p>Name</p>
                  <input type="text" value="" name="mem_name" required>
                  <p>Education</p>
                  <input type="text" value=" " name="mem_education" required>
                  <p>Designation</p>
                  <input type="text" value="" name="mem_designation" required>
                  <p>Description</p>
                  <input type="text" value="" name="mem_description" required>
                  <button type="submit" class="update-icon mt-3">Add</button>
                </form>

              </div>
            </div>
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

      <div class="team-info-section">

        <div class="team-info-members">

          <?php foreach ($members_list as $member): ?>
            <div class="team-member">
              <div class="team-member-img">
                <img src="../assets/img/about/<?php echo $member['image'] ?>" alt="">
                <form action="./teammembers.php" method="post" class="mt-4" enctype="multipart/form-data">
                  <input type="hidden" value="member_img" name="FormName">
                  <input type="hidden" value="<?= htmlspecialchars($member['id']); ?>" name="member_id">
                  <input type="file" name="member_img">
                  <button type="submit" class="update-icon mt-1"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                </form>
              </div>
              <div class="team-member-con">
                <p>Name</p>
                <form action="./teammembers.php" method="post" class="mt-4" enctype="multipart/form-data">
                  <input type="text" value="<?php echo $member['name'] ?>" name="mem_name">
                  <p>Education</p>
                  <input type="text" value=" <?php echo $member['education'] ?>" name="mem_education">
                  <p>Designation</p>
                  <input type="text" value="<?php echo $member['designation'] ?>" name="mem_designation">
                  <p>Description</p>
                  <input type="text" value="<?php echo $member['description'] ?>" name="mem_description">
                  <input type="hidden" value="member_con" name="FormName">
                  <input type="hidden" value="<?= htmlspecialchars($member['id']); ?>" name="member_id">
                  <button type="submit" class="update-icon mt-3"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                </form>

                <form action="./teammembers.php" method="post" class="mt-2">
                            <input type="hidden" value="mem_del" name="FormName">
                            <input type="hidden" value="<?= htmlspecialchars($member['id']); ?>" name="member_id">
                                <button type="submit" class="update-icon w-100">Delete</button>
        
                            </form>

              </div>
            </div>
          <?php endforeach; ?>


        </div>

      </div>
    </div>
  </div>











  <!-- custom scripts -->
  <script src="https://kit.fontawesome.com/181ea7bd20.js" crossorigin="anonymous"></script>
</body>

</html>