<?php
include './include/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_mapel = $_POST['id_mapel'];
    $id_kelas = $_POST['id_kelas'];
    $hari = $_POST['hari'];
    $jam_mulai = $_POST['jam_mulai'];
    $jam_selesai = $_POST['jam_selesai'];

    // Simpan jadwal ke dalam tabel jadwal
    $sql_insert = "INSERT INTO jadwal (id_mapel, id_kelas, hari, jam_mulai, jam_selesai) 
                   VALUES ('$id_mapel', '$id_kelas', '$hari', '$jam_mulai', '$jam_selesai')";

    if ($conn->query($sql_insert) === TRUE) {
        header('Location: form_jadwal.php?message=success');
        exit;
    } else {
        header('Location: form_jadwal.php?message=error');
        exit;
    }
}

$conn->close();
?>
