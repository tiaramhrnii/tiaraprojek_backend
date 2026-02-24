<?php
header("Content-Type: application/json");
include 'koneksi.php'; 

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    
    if (empty($id)) {
        echo json_encode(["status" => "error", "message" => "ID tidak boleh kosong"]);
        exit;
    }

    $sql = "DELETE FROM biodata WHERE id='$id'";

    if ($conn->query($sql)) {
        if ($conn->affected_rows > 0) {
            echo json_encode(["status" => "success", "message" => "Data berhasil dihapus dari database"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Gagal: ID tidak ditemukan di tabel"]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => $conn->error]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Tidak ada ID yang dikirim dari Flutter"]);
}
?>