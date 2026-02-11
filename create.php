<?php
// WAJIB: Header agar Flutter Web (Chrome) bisa mengakses server local
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: application/json");

include 'koneksi.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Mengambil data dan mencegah error jika field kosong (Menggunakan isset)
    $nama    = isset($_POST['nama']) ? $_POST['nama'] : '';
    $email   = isset($_POST['email']) ? $_POST['email'] : '';
    $alamat  = isset($_POST['alamat']) ? $_POST['alamat'] : '';
    $tplahir = isset($_POST['tplahir']) ? $_POST['tplahir'] : '';
    $tglahir = isset($_POST['tglahir']) ? $_POST['tglahir'] : '';
    $kelamin = isset($_POST['kelamin']) ? $_POST['kelamin'] : '';
    $agama   = isset($_POST['agama']) ? $_POST['agama'] : '';

    if (!empty($nama)) {
        $sql = "INSERT INTO biodata (nama, email, alamat, tplahir, tglahir, kelamin, agama) 
                VALUES ('$nama', '$email', '$alamat', '$tplahir', '$tglahir', '$kelamin', '$agama')";

        if ($conn->query($sql)) {
            echo json_encode(["status" => "success", "message" => "Biodata berhasil disimpan"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Query Error: " . $conn->error]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Nama tidak boleh kosong"]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Metode pengiriman salah (Harus POST)"]);
}
?>