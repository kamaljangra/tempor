<?php

session_start();
$id = $_SESSION['id'];
const DB_LOC = "F:/Database/";

define('REQUESTS', DB_LOC . "$id/requests.json");

if (is_file(REQUESTS)) {
    $data = json_decode(file_get_contents(REQUESTS), true);
} else {
    fclose(fopen(REQUESTS, 'w'));
    $data = [];
}
if ($data != null && count($data) > 0) {
    for ($i = 0; $i < count($data); $i++) {
?>
        <div class="cflex request">
            <h5 class="req_title">tempor.com</h5>
            <div class="req_action rflex jcsb">
                <h5 class="reject">
                    <i class="fa-regular fa-xmark"></i>
                    <span>Reject</span>
                </h5>
                <h5 class="accept">
                    <i class="fa-regular fa-check"></i>
                    <span>Accept</span>
                </h5>
            </div>
        </div>
<?php
    }
}else{
    ?>
    <h5 style="padding:10px">No new requests</h5>
    <?php
}
?>