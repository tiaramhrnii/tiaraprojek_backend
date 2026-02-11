<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Content-Type: application/json");

include 'koneksi.php'; 

$sql = "SELECT * FROM biodata ORDER BY id DESC";
$result = $conn->query($sql);
$data = array();

if ($result) {

while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {

echo json_encode(["status" => "error", "message" => "Query Gagal: " . $conn->error]);
    exit;
}


echo json_encode($data);
?>