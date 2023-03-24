<?php

session_start();
$id = $_SESSION['id'];
$username = $_SESSION['username'];

const DB_LOC = "F:/Database/";
define('FILE_LOC', "/getimg/");
define('USER_FILE_LOC', "/getimg/" . "$id/");
define('PROFILE', DB_LOC . "$id/profile.json");


if (is_file(PROFILE)) {
    $data = json_decode(file_get_contents(PROFILE), true);
} else {
    fclose(fopen(PROFILE, 'w'));
    $data=[];
}

function check($check, $default)
{
    return (isset($check) && $check != '') ? $check : $default;
}
function getMilli(): int
{
    return round(microtime(true) * 1000);
}
