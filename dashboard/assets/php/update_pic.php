<?php

require "./utils.php";

if ($_FILES) {
    $new = $_FILES['file']['name'];
    $ex = substr($new, strrpos($new, '.'));
    $new = getMilli() . "$ex";
    $data['profile_pics'][$_POST['type']]['filename'] = $new;
    // Saving file to server
    move_uploaded_file($_FILES['file']['tmp_name'], DB_LOC . "$id/" . $new);
}
if (isset($_POST['remove'])) {
    $data['profile_pics'][$_POST['type']]['filename'] = '';
}
$file = fopen(PROFILE, 'w');
fwrite($file, json_encode($data));
fclose($file);
echo json_encode(["success" => true]);
