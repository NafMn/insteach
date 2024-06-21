<?php
include './include/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sql_reset_kelas = "TRUNCATE TABLE kelas";

    if ($conn->query($sql_reset_kelas) === TRUE) {
        echo json_encode(["status" => "success", "message" => "Data kelas telah dihapus."]);
    } else {
        echo json_encode(["status" => "error", "message" => "Terjadi kesalahan: " . $conn->error]);
    }

    $conn->close();
}
?>

