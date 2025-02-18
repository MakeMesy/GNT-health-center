<?php

$treatment_list_nav = "SELECT url_name, name FROM treatments";
$stmt_for_treatment_list_nav = $conn->prepare($treatment_list_nav);
$stmt_for_treatment_list_nav->execute();
$stmt_for_treatment_list_nav->bind_result($url_name, $name);
$treatments_nav = [];
while ($stmt_for_treatment_list_nav->fetch()) {
    $treatments_nav[] = [
        "url_name" => $url_name,
        "name" => $name
    ];
}
$stmt_for_treatment_list_nav->close();

if (empty($treatments_nav)) {
    echo "Treatment not found.";
}

// social media
$social_media_query = "SELECT icon, profile_link FROM social_media";
$stmt_social_media = $conn->prepare($social_media_query);
$stmt_social_media->execute();

$stmt_social_media->bind_result($icon, $profile_link);

$social_media = [];
while ($stmt_social_media->fetch()) {
    $social_media[] = [
        "icon" => $icon,
        "profile_link" => $profile_link
    ];
}

$stmt_social_media->close();

if (empty($social_media)) {
    echo "Social Media not found.";
}

?>

<div class="navbar-1">
    <div class="navbar-container  ">
        <div class="navbar-detail ">
            <div class="navbar-item ">
                <i class="fa-solid fa-phone"></i> <span> +91 8667832990</span>
            </div>
            <div class="navbar-item">
                <i class="fa-solid fa-envelope"></i><a href=""> gnthealthcare999@gmail.com</a>
            </div>
            <div class="navbar-item">
                <i class="fa-solid fa-location-dot"></i><span> Rathinam Nagar ,Theni, Tamil Nadu, 625531, India</span>
            </div>
        </div>
        <div class="navbar-social">
            <?php foreach ( $social_media as $social_Link): ?>
            <div>
                <a href="<?php echo $social_Link['profile_link'] ?>"><?php echo $social_Link['icon'] ?></a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<div class="navbar-2">
    <nav>
        <div class="">
            <img src="./assets/img/main/logo.png" alt="" width="180px">
        </div>
        <div class="nav-items">
            <ul>
                <li><a href="./">Home</a></li>
                <li><a href="./about.php">About</a></li>
                <li><a href="./service.php">Services</a></li>
                <li class="dropdown">

                    <a >Treatments</a>
                    <ul class="submenu">

                    <?php 
                    foreach( $treatments_nav as $nav_treatments){
                        echo "<li><a href=./treatments.php?treatment=".$nav_treatments['url_name'].">".$nav_treatments['name']."</a></li>";
                    }

                    ?>
                    </ul>

                </li>
                <li><a href="./courseslist.php">Courses</a></li>
                <li><a href="./gallery.php">Gallery</a></li>
                
            </ul>
        </div>
        <div class="nav-btn">
            <a href="./contact.php">
                <button>
                    Contact
                </button>
            </a>
        </div>
        <div class="nav-switch" style="z-index: 1999">
            <div class="nav-toggle">
                <i class="fa-solid fa-bars-staggered"></i>
            </div>
        </div>
        <div class="mobile-navigation">
            <div class="mobile-nav-items">
                <ul>
                    <li><a href="./">Home</a></li>
                    <li><a href="./about.php">About</a></li>
                    <li><a href="./service.php">Services</a></li>
                    <li class="dropdown">
                        <a >Treatments</a>
                        <ul class="mobile-submenu">
                        <?php 
                    foreach( $treatments_nav as $nav_treatments){
                        echo "<li><a href=./treatments.php?treatment=".$nav_treatments['url_name'].">".$nav_treatments['name']."</a></li>";
                    }

                    ?>
                        </ul>
                    </li>
                    <li><a href="./courseslist.php">Courses</a></li>
                    <li><a href="./gallery.php">Gallery</a></li>

                </ul>
                <div class="nav-top-logo">
                    <img src="./assets/img/main/favicon.png" alt="">
                </div>
                <div class="mobile-nav-items-details">
                    <div class="mobile-navbar-item">
                        <i class="fa-solid fa-phone"></i> <span> +91 8667832990</span>
                    </div>
                    <div class="mobile-navbar-item">
                        <i class="fa-solid fa-envelope"></i><a href=""> gnthealthcare999@gmail.com</a>
                    </div>
                    <div class="mobile-navbar-item">
                        <i class="fa-solid fa-location-dot"></i><span> Rathinam Nagar 6th street , Theni - Allinagram</span>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    
</div>


<div class="social_media_side">
<?php foreach ( $social_media as $social_Link): ?>
            <div class="social_media_side_item">
                <a href="<?php echo $social_Link['profile_link'] ?>"><?php echo $social_Link['icon'] ?></a>
            </div>
            <?php endforeach; ?>
</div>

<script>
    window.addEventListener("scroll", function () {
        let formDiv = document.querySelector(".social_media_side");

       if(window.screenY>200){
        formDiv.style.display='block';
       }else{
        formDiv.style.display='none';

       }
    });
</script>
