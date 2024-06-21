<?php
include './include/database.php';

// Pastikan tombol update_jadwal diklik
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Query untuk update jadwal dengan id_guru yang sesuai dari ahp_guru
    $sql_update = "UPDATE jadwal j
                   JOIN ahp_guru ag ON j.id_mapel = ag.id_mapel
                   SET j.id_guru = ag.id_guru
                   WHERE j.id_guru IS NULL";

    if ($conn->query($sql_update) === TRUE) {
        header('Location: hasil_ahp.php?message=berhasilupdatejadwal');
       
    } else {
        header('Location: hasil_ahp.php?message=error');
        
    }
}

?>
