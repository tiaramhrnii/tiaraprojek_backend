<?php
// WAJIB: Header agar Flutter Web (Chrome) bisa mengakses data tanpa diblokir CORS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Content-Type: application/json");

include 'koneksi.php'; // Pastikan $conn mengarah ke db_produk

// Query untuk mengambil semua data biodata
$sql = "SELECT * FROM biodata ORDER BY id DESC";
$result = $conn->query($sql);
$data = array();

if ($result) {
    // Memasukkan setiap baris data ke dalam array
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    // Jika query gagal, kirimkan pesan error
    echo json_encode(["status" => "error", "message" => "Query Gagal: " . $conn->error]);
    exit;
}

// Mengirimkan data dalam format JSON
echo json_encode($data);
?>