<?php
include './include/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sql_reset_guru = "UPDATE jadwal SET id_guru = NULL";

    // Prepared statement tidak diperlukan karena tidak ada input dari pengguna
    if ($conn->query($sql_reset_guru) === TRUE) {
        // Redirect menggunakan header hanya jika query berhasil dieksekusi
        header('Location: hasil_ahp.php?message=berhasilresetjadwal');
        exit(); // Penting: hentikan eksekusi skrip setelah mengarahkan
    } else {
        // Jika terjadi kesalahan dalam eksekusi query
        echo "Error executing query: " . $conn->error;
    }

    $conn->close(); // Tutup koneksi database
}
?>
