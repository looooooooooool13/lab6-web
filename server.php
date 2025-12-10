<?php
$filename = "movies.json";

if (isset($_POST["clear"])) {
    file_put_contents($filename, json_encode([], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    header("Location: index2.html");
    exit;
}

header("Content-Type: application/json; charset=utf-8");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");

$raw = file_get_contents("php://input");
$data = json_decode($raw, true);

if (!is_array($data)) {
    echo json_encode(["status" => "error", "msg" => "No data received"]);
    exit;
}

file_put_contents($filename, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

echo json_encode(["status" => "ok"]);
