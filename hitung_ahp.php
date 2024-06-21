<?php
include './include/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Definisikan bobot kriteria (contoh saja, Anda harus mengisi sesuai dengan perhitungan AHP yang sebenarnya)
    $bobot_jam_mengajar = 0.7;
    $bobot_kesesuaian_mapel = 0.3;

    // Ambil data guru dari database
    $sql_guru = "SELECT * FROM guru";
    $result_guru = $conn->query($sql_guru);

    if ($result_guru->num_rows > 0) {
        while($row_guru = $result_guru->fetch_assoc()) {
            // Ambil jumlah mata pelajaran yang diajarkan oleh guru
            $mata_pelajaran_guru = explode(',', $row_guru['mata_pelajaran']);
            $jumlah_mapel = count($mata_pelajaran_guru);

            // Hitung skor AHP
            $skor_ahp = ($row_guru['jam_mengajar'] * $bobot_jam_mengajar) +
                        ($jumlah_mapel * $bobot_kesesuaian_mapel);

            // Periksa apakah skor AHP sudah ada untuk guru ini dan mata pelajaran ini
            foreach ($mata_pelajaran_guru as $nama_mapel) {
                // Ambil ID mata pelajaran dari tabel mata_pelajaran berdasarkan nama_mapel
                $sql_get_id = "SELECT id_mapel FROM mata_pelajaran WHERE nama_mapel = '$nama_mapel'";
                $result_id = $conn->query($sql_get_id);

                if ($result_id->num_rows > 0) {
                    $row_id = $result_id->fetch_assoc();
                    $id_mapel = $row_id['id_mapel'];

                    // Periksa apakah skor AHP sudah ada untuk guru ini dan mata pelajaran ini
                    $sql_check = "SELECT * FROM ahp_guru WHERE id_guru = {$row_guru['id_guru']} AND id_mapel = $id_mapel";
                    $result_check = $conn->query($sql_check);

                    if ($result_check->num_rows > 0) {
                        // Jika sudah ada, update skor AHP
                        $update_ahp = "UPDATE ahp_guru SET skor_ahp = $skor_ahp WHERE id_guru = {$row_guru['id_guru']} AND id_mapel = $id_mapel";
                        if ($conn->query($update_ahp) === TRUE) {
                            echo "Skor AHP untuk Guru ID {$row_guru['id_guru']} dan Mapel ID $id_mapel berhasil diupdate.<br>";
                        } else {
                            echo "Error updating AHP score for Guru ID {$row_guru['id_guru']} and Mapel ID $id_mapel: " . $conn->error . "<br>";
                        }
                    } else {
                        // Jika belum ada, insert skor AHP baru
                        $insert_ahp = "INSERT INTO ahp_guru (id_guru, id_mapel, skor_ahp) VALUES ({$row_guru['id_guru']}, $id_mapel, $skor_ahp)";
                        if ($conn->query($insert_ahp) === TRUE) {
                            echo "Skor AHP untuk Guru ID {$row_guru['id_guru']} dan Mapel ID $id_mapel berhasil dihitung dan disimpan.<br>";
                        } else {
                            echo "Error inserting AHP score for Guru ID {$row_guru['id_guru']} and Mapel ID $id_mapel: " . $conn->error . "<br>";
                        }
                    }
                } else {
                    echo "Error: ID mata pelajaran untuk $nama_mapel tidak ditemukan.<br>";
                }
            }
        }
    } else {
        echo "Tidak ada data guru.";
    }
    $conn->close();
    header('Location: hasil_ahp.php?message=berhasilhitungahp');
} else {
    header('Location: hasil_ahp.php?message=error');
}

?>


