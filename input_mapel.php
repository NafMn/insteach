<?php
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_mapel = $_POST['nama_mapel'];

    $sql = "INSERT INTO mata_pelajaran (nama_mapel) VALUES ('$nama_mapel')";
    
    if ($conn->query($sql) === TRUE) {
        header('Location: form_mapel.php?message=success');
        exit;
    } else {
        header('Location: form_mapel.php?message=error');
        exit;
    }
}
?>