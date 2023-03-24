<?php

/** 
 * 1@@ server errors
 * 2@@ success codes
 * 3@@ failure codes
 */

session_start();

const SUCCESS = ["success" => true];
const ERROR = ["success" => false];

const SERVER_ERROR = ERROR + ["code" => "T110", "msg" => "Server error"];
const SERVER_CONN_FAILED = ERROR + ["code" => "T111", "msg" => "Server handshake failed"];

const USER_EXIST_SUCCESS = SUCCESS + ["code" => "T210"];
const PASSWORD_MATCH = SUCCESS + ["code" => "T220"];
const CONTACT_EXIST_SUCCESS = SUCCESS + ["code" => "T230"];
const EMAIL_EXIST_SUCCESS = SUCCESS + ["code" => "T240"];

const USER_EXIST = ERROR + ["code" => "T310", "msg" => "User already exists"];
const USER_NOT_EXIST = ERROR + ["code" => "T311", "msg" => "User not exist"];
const USER_NOT_VALID = ERROR + ["code" => "T312", "msg" => "Username not valid"];

const PASSWORD_NOT_GIVEN = ERROR + ["code" => "T320", "msg" => "Password not provided"];
const PASSWORD_NOT_VALID = ERROR + ["code" => "T321", "msg" => "Invalid Details"];

const CONTACT_EXIST = ERROR + ["code" => "T330", "msg" => "Contact already exists"];
const CONTACT_NOT_EXIST = ERROR + ["code" => "T331", "msg" => "Contact not exist"];
const CONTACT_NOT_GIVEN = ERROR + ["code" => "T332", "msg" => "Contact not provided"];
const CONTACT_NOT_VALID = ERROR + ["code" => "T333", "msg" => "Contact not valid"];

const EMAIL_EXIST = ERROR + ["code" => "T340", "msg" => "E-mail already exists"];
const EMAIL_NOT_EXIST = ERROR + ["code" => "T341", "msg" => "E-mail not exist"];
const EMAIL_NOT_GIVEN = ERROR + ["code" => "T342", "msg" => "E-mail not provided"];
const EMAIL_NOT_VALID = ERROR + ["code" => "T343", "msg" => "Invalid E-mail"];

const OTP_GEN_FAILED = ERROR + ["code" => "T350", "msg" => "Otp generation failed"];
const OTP_VER_FAILED = ERROR + ["code" => "T350", "msg" => "Otp verification failed"];

const UNKNOWN = ERROR + ["code" => "T300", "msg" => "Unknown error"];
const INVALID = ERROR + ["code" => "T400", "msg" => "Invalid request"];

$conn = mysqli_connect("localhost", "root", "", "tempor");
if (!$conn) respond(SERVER_CONN_FAILED);

function generate_otp($id){
    global $conn;
    $otp = random_int(100000, 999999);
    $query = isExist('otp', ["username", $id])['exist'] ?
    "UPDATE `otp` SET `otp`='$otp' WHERE `username`='$id'" :
    "INSERT INTO `otp`(`username`, `otp`) VALUES ('$id','$otp')";
    return mysqli_query($conn, $query);
}

function isExist($t, $q)
{
    global $conn;
    $f = $q[0];
    $v = $q[1];
    $r = [];
    $result = mysqli_query($conn, "SELECT * from $t where $f='$v'");
    if (mysqli_num_rows($result) == 1) {
        $r['exist'] = true;
        $r['data'] = mysqli_fetch_assoc($result);
    } else {
        $r['exist'] = false;
    }
    return $r;
}
function getMilli(): int
{
    return round(microtime(true) * 1000);
}
function respond($t): void
{
    echo json_encode($t + ["reqTime" => getMilli()]);
    die();
}
function randStr($length = 12, $l = false)
{
    $t = 'AQZWSXEDCRFVTGBYHNUJMIKOLP0123456789';
    if ($l) $t .= 'abcdefghijklmnopqrstuvwxyz';
    $s = '';
    for ($i = 0; $i < $length; $i++) $s .= $t[rand(0, strlen($t) - 1)];
    return $s;
}
