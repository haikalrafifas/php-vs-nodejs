<?php

$path = str_replace("/api/", "/", $_SERVER["REQUEST_URI"]);
$api = __DIR__ . "/models$path.php";
header("Content-Type: application/json");
echo json_encode(file_exists($api) ? include $api : ["error" => "Cannot GET $path"]);
