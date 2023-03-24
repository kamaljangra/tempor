<?php

require "./conn.php";
$users = json_decode($_POST['users']);
if ($users==null || count($users) == 0) {
?>
    <a href="./signin.html">Login</a>
    <a href="./signup.html">Register</a>
    <?php
    die;
}
for ($i = 0; $i < count($users); $i++) {
    $check = isExist("users", ['id', $users[$i]]);
    if ($check['exist']) {
        $data = $check['data'];
        $id = $data['id'];
        $PROFILE = "F:/Database/$id/profile.json";
        $user_data = is_file($PROFILE) ? json_decode(file_get_contents($PROFILE), true) : [];
        $fullname = isset($user_data['name']) ? $user_data['name'] : 'Anonymous';
    ?>
        <div class="account rflex" onclick="auth_user('<?php echo $id ?>')">
            <img src="./images/profile.jpg" alt="">
            <div class="cflex jcc" style="padding:0 20px;">
                <h4><?php echo $fullname ?></h4>
                <h6 style="color: #ffffff99;"><i class="fa-regular fa-at"></i> <?php echo $data['username'] ?></h6>
            </div>
        </div>
<?php
    }
}
?>