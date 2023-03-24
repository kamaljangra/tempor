<?php

require "./conn.php";

$id = $_POST['user'];
$find = isExist('users', ["id", $id]);

if ($find['exist']) {
    $_SESSION['username'] = $find['data']['username'];
    $_SESSION['id'] = $id;
    respond(SUCCESS);
} else    respond(USER_NOT_EXIST);
