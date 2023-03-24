<?php

const DB_LOC = "F:/Database/";
$loc = DB_LOC . substr($_SERVER['REQUEST_URI'], 8);
$filename = basename($loc);
$image = file_get_contents($loc);

header('Content-type: '.mime_content_type($loc));
echo $image;
