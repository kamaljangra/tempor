<?php

require "./conn.php";

const DB_LOC = "F:/Database/";

$username = strtolower(mysqli_escape_string($conn, $_POST['user']));
$otp = $_POST['otp'];

$find = isExist('otp', ["username", $username]);
if ($find['exist']) {
    if ($find['data']['otp'] == $otp) {
        $mq = "DELETE FROM `otp` WHERE `username`='$username'";
        mysqli_query($conn, $mq);
        mkdir(DB_LOC . "/" . $username);
        if (mysqli_query($conn, "UPDATE `users` SET `valid`='1' WHERE `id`='$username'")) {
            $find = isExist('users', ["id", $username]);
            $_SESSION['id'] = $username;
            $_SESSION['username'] = $find['data']['username'];
            $device_id = $_POST['device'] == '' ? randStr(15, true) : $_POST['device'];
            echo json_encode(["success" => true, 'msg' => "Verified Success", 'device' => $device_id]);
        }
    } else respond(OTP_VER_FAILED);
} else respond(USER_NOT_EXIST);
