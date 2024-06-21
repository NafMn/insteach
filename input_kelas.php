<?php
include './include/database.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tingkat = $_POST['tingkat'] ?? '';
    $jumlah_kelas = $_POST['jumlah_kelas'] ?? '';

    if (empty($tingkat) || empty($jumlah_kelas)) {
        header('Location: form_kelas.php?message=error');
        exit;
    }

    for ($i = 65; $i < 65 + $jumlah_kelas; $i++) {
        $nama_kelas = chr($i);
        $sql = "INSERT INTO kelas (tingkat, nama_kelas, jumlah_kelas) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssi', $tingkat, $nama_kelas, $jumlah_kelas);
        if (!$stmt->execute()) {
            header('Location: form_kelas.php?message=error');
            exit;
        }
    }

    header('Location: form_kelas.php?message=success');
    exit;
}