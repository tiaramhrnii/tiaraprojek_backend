<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: application/json");
include 'koneksi.php';

$id      = $_POST['id'];
$nama    = $_POST['nama'];
$email   = $_POST['email'];
$alamat  = $_POST['alamat'];
$tplahir = $_POST['tplahir'];
$tglahir = $_POST['tglahir'];
$kelamin = $_POST['kelamin'];
$agama   = $_POST['agama'];

$sql = "UPDATE biodata SET 
        nama='$nama', email='$email', alamat='$alamat', 
        tplahir='$tplahir', tglahir='$tglahir', kelamin='$kelamin', agama='$agama' 
        WHERE id=$id";

if ($conn->query($sql)) {
    echo json_encode(["status" => "success", "message" => "Data diperbarui"]);
} else {
    echo json_encode(["status" => "error", "message" => $conn->error]);
}
?>