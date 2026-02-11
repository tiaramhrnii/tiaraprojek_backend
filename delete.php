<?php
header("Content-Type: application/json");
include 'koneksi.php';

$id = $_POST['id'];

$sql = "DELETE FROM biodata WHERE id=$id";

if ($conn->query($sql)) {
    echo json_encode(["status" => "success", "message" => "Data dihapus"]);
} else {
    echo json_encode(["status" => "error", "message" => $conn->error]);
}
?>