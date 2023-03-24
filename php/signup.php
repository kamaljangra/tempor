<?php

require "./conn.php";
// data coming from client-side
$username = strtolower(mysqli_escape_string($conn, $_POST['username']));
$contact = mysqli_escape_string($conn, $_POST['contact']);
$password = mysqli_escape_string($conn, $_POST['password']);
$email = mysqli_escape_string($conn, $_POST['email']);

// checking if user exists
if (isExist('users', ["username", $username])['exist']) respond(USER_EXIST);
if (isExist('users', ["contact", $contact])['exist']) respond(CONTACT_EXIST);
if (isExist('users', ["email", $email])['exist']) respond(EMAIL_EXIST);

// Generating random string as user name
do $id = randStr(15);
while (isExist('users', ["id", $id])['exist']);

$query = "INSERT INTO `users`(`id`, `username`, `password`, `contact`,`email`) VALUES ('$id','$username','$password','$contact','$email')";

if (mysqli_query($conn, $query)) {
    // Genereating otp
    if (generate_otp($id)) respond(SUCCESS + ['user' => $id]);
    else respond(OTP_GEN_FAILED);
} else respond(SERVER_ERROR);
