<?php

require "./utils.php";

$fullname = isset($data['name']) ? $data['name'] : 'anonymous';
$about = isset($data['about']) ? $data['about'] : 'No description provided';
$profile_img = isset($data['profile_pics']['default']['filename']) ? USER_FILE_LOC . $data['profile_pics']['default']['filename'] : FILE_LOC . "profile.jpg";
$cover = isset($data['profile_pics']['cover']['filename']) ? USER_FILE_LOC . $data['profile_pics']['cover']['filename'] : FILE_LOC . "pexels-pixabay-326055.jpg";

?>
<div class="cover_image">
    <img src="<?php echo $cover ?>" alt="">
    <h6 class="cover_opt">
        <i class="fa-regular fa-camera"></i><span>Edit Cover</span>
    </h6>
</div>
<div class="profile_block cflex">
    <div class="profile rflex">
        <div class="profile_pic">
            <img src="<?php echo $profile_img ?>" alt="">
            <i class="icon fa-regular fa-camera"></i>
        </div>
        <div class="user_details cflex ">
            <h2><i class="fa-regular fa-at"></i> <?php echo $username ?></h2>
            <h5><?php echo $fullname; ?></h5>
            <p><?php echo $about ?></p>
        </div>
    </div>
    <div class="rflex jcsb aic">
        <nav class="social_icons rflex">
            <i class="icon fa-brands fa-facebook-f"></i>
            <i class="icon fa-brands fa-instagram"></i>
            <i class="icon fa-regular fa-envelope"></i>
            <i class="icon fa-regular fa-square-phone"></i>
            <i class="icon fa-brands fa-google"></i>
            <i class="icon fa-brands fa-amazon"></i>
            <i class="icon fa-brands fa-github"></i>
            <i class="icon fa-brands fa-reddit"></i>
            <i class="icon fa-brands fa-snapchat"></i>
            <i class="icon fa-brands fa-telegram"></i>
            <i class="icon fa-brands fa-tiktok"></i>
            <i class="icon fa-brands fa-twitter"></i>
            <i class="icon fa-brands fa-twitch"></i>
            <i class="icon fa-brands fa-youtube"></i>
        </nav>
        <div class="social_icons_adjust rflex">
            <a href="../signin.html">
                <i class="icon fa-regular fa-user-plus"></i>
            </a>
            <a href="./logout.php">
                <i class="icon fa-regular fa-sign-out"></i>
            </a>
        </div>
    </div>
</div>