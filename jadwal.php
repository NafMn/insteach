<?php
include './include/header.php'
?>
    <div class="container-fluid">
        <h1 class="mt-4 mb-5 text-center">Hasil Penetapan Guru dengan AHP</h1>
        <div class="table-responsive">
            <table class="table table-striped">
                <!-- <thead>
                    <tr>
                        <th>
                            <center>Tingkat</center>
                        </th>
                    </tr>
                </thead> -->
                <tbody>
                    <?php
                    $sql = "SELECT j.hari, k.tingkat, k.nama_kelas, mp.nama_mapel, g.nama_guru, j.jam_mulai, j.jam_selesai
                            FROM jadwal j
                            JOIN kelas k ON j.id_kelas = k.id_kelas
                            JOIN mata_pelajaran mp ON j.id_mapel = mp.id_mapel
                            LEFT JOIN guru g ON j.id_guru = g.id_guru
                            ORDER BY k.tingkat, k.nama_kelas, FIELD(j.hari, 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'), j.jam_mulai";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $current_tingkat = null;
                        $current_kelas = null;

                        while ($row = $result->fetch_assoc()) {
                            if ($current_tingkat != $row['tingkat']) {
                                if ($current_tingkat != null) {
                                    echo "</table></div><br>";
                                }
                                $current_tingkat = $row['tingkat'];
                                echo "<h3 class='mt-4 text-start'>Jadwal Kelas {$current_tingkat}</h3>";
                                echo "<div class='table-responsive'><table class='table table-striped'>
                                          <thead>
                                              <tr>
                                                  <th>Hari</th>
                                                  <th>Mata Pelajaran</th>
                                                  <th>Guru</th>
                                                  <th>Jam Mulai</th>
                                                  <th>Jam Selesai</th>
                                              </tr>
                                          </thead>
                                          <tbody>";
                            }

                            if ($current_kelas != $row['nama_kelas']) {
                                if ($current_kelas != null) {
                                    echo "</tbody></table></div><br>";
                                }
                                $current_kelas = $row['nama_kelas'];
                                echo "<h4 class='mt-4  text-start'>Kelas {$current_kelas}</h4>";
                                echo "<div class='table-responsive'><table class='table table-striped'>
                                          <tbody>";
                            }

                            echo "<tr>
                                    <td>{$row['hari']}</td>
                                    <td>{$row['nama_mapel']}</td>
                                    <td>" . ($row['nama_guru'] ?? 'Belum ditentukan') . "</td>
                                    <td>{$row['jam_mulai']}</td>
                                    <td>{$row['jam_selesai']}</td>
                                  </tr>";
                        }
                        echo "</tbody></table></div>";
                    } else {
                        echo "<tr><td colspan='5' class='text-center'>Tidak ada jadwal yang tersedia.</td></tr>";
                        echo "<tr><td colspan='5' class='text-center'>Data Kelas belum dimasukkan</td></tr>";
                        echo "<tr><td colspan='5' class='text-center'><a href='form_kelas.php' class='btn btn-warning'>Masukkan Data Kelas</a></td></tr>";
                    }

                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php include './include/footer.php' ?>
