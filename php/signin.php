<?php

require "./conn.php";
// data coming from client-side
$username = strtolower(mysqli_escape_string($conn, $_POST['username']));
$password = mysqli_escape_string($conn, $_POST['password']);

// checking if user exists
$find = isExist('users', ["username", $username]);

if ($find['exist']) {
    if ($find['data']['password'] == $password) {
        $x = $find['data']['valid'];
        $id = $find['data']['id'];
        if ($x) {
            $_SESSION['id'] = $id;
            $_SESSION['username'] = $find['data']['username'];
            $device_id = $_POST['device'] == '' ? randStr(15, true) : $_POST['device'];
            respond(SUCCESS + ['user' => $id, 'verified' => true, 'device' => $device_id]);
        } else {
            if (generate_otp($id)) {
                respond(SUCCESS + ['user' => $id, 'verified' => false]);
            } else {
                respond(OTP_GEN_FAILED);
            }
        }
    } else respond(PASSWORD_NOT_VALID);
} else respond(USER_NOT_EXIST);
