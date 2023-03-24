<?php

require "./utils.php";

$profes_img = isset($data['profile_pics']['profes']['filename']) ? USER_FILE_LOC . $data['profile_pics']['profes']['filename'] : FILE_LOC . "profile.jpg";
$casual_img =isset($data['profile_pics']['casual']['filename']) ? USER_FILE_LOC . $data['profile_pics']['casual']['filename'] : FILE_LOC . "profile.jpg";
$profile_img = isset($data['profile_pics']['profile']['filename']) ? USER_FILE_LOC . $data['profile_pics']['profile']['filename'] : FILE_LOC . "profile.jpg";

?>
<div class="profile_pic cflex">
    <div class="pic">
        <img src="<?php echo $profes_img ?>" alt="" id="profes_img">
        <div class="config">
            <i class="icon fa-regular fa-gear" onclick="config_pic('profes','#profes_img')"></i>
        </div>
    </div>
    <div class="pic_type">
        <h5>Professional</h5>
        <h6>Used in forms and applications</h6>
    </div>
</div>
<div class="profile_pic cflex">
    <div class="pic">
        <img src="<?php echo $casual_img ?>" alt="" id="casual_img">
        <div class="config">
            <i class="icon fa-regular fa-gear" onclick="config_pic('casual','#casual_img')"></i>
        </div>
    </div>
    <div class="pic_type">
        <h5>Casual</h5>
        <h6>Provided to apps and websites for authentication</h6>
    </div>
</div>
<div class="profile_pic cflex">
    <div class="pic">
        <img src="<?php echo $profile_img ?>" alt="" id="profile_img">
        <div class="config">
            <i class="icon fa-regular fa-gear" onclick="config_pic('profile','#profile_img')"></i>
        </div>
    </div>
    <div class="pic_type">
        <h5>Profile</h5>
        <h6>Display as profile </h6>
    </div>
</div>