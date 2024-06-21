<?php include './include/header.php'; ?>
<div class="container">
    <h2>Data AHP</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID Guru</th>
                <th>ID Mapel</th>
                <th>Skor AHP</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql_ahp = "SELECT * FROM ahp_guru";
            $result_ahp = $conn->query($sql_ahp);

            while ($row_ahp = $result_ahp->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row_ahp['id_guru'] . "</td>";
                echo "<td>" . $row_ahp['id_mapel'] . "</td>";
                echo "<td>" . $row_ahp['skor_ahp'] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
    <style>
        .container {
            margin-top: 50px;
        }
        .card {
            margin-bottom: 20px;
        }
    </style>

    <div class="container">
        <h1 class="text-center mb-4">Penjelasan Perhitungan AHP</h1>

        <div class="card">
            <div class="card-header">
                Bobot Kriteria AHP
            </div>
            <div class="card-body">
                <p>Untuk melakukan perhitungan AHP, terlebih dahulu kita mendefinisikan bobot untuk setiap kriteria. Dalam contoh ini, bobot kriteria yang digunakan adalah sebagai berikut:</p>
                <ul>
                    <li>Bobot untuk jumlah jam mengajar: 0.7</li>
                    <li>Bobot untuk kesesuaian mata pelajaran: 0.3</li>
                </ul>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Langkah-langkah Perhitungan AHP
            </div>
            <div class="card-body">
                <p>Berikut adalah langkah-langkah yang dilakukan dalam perhitungan AHP untuk setiap guru:</p>
                <ol>
                    <li>Ambil data guru dari database.</li>
                    <li>Untuk setiap guru, ambil jumlah mata pelajaran yang diajarkan dan hitung skor AHP menggunakan rumus berikut:</li>
                    <pre>
Skor AHP = (Jam Mengajar × Bobot Jam Mengajar) + (Jumlah Mata Pelajaran × Bobot Kesesuaian Mapel)
                    </pre>
                    <li>Periksa apakah skor AHP sudah ada untuk guru ini dan mata pelajaran ini:</li>
                    <ul>
                        <li>Jika sudah ada, update skor AHP.</li>
                        <li>Jika belum ada, masukkan skor AHP baru ke dalam database.</li>
                    </ul>
                </ol>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Contoh Perhitungan
            </div>
            <div class="card-body">
                <p>Berikut adalah contoh perhitungan skor AHP untuk dua guru berdasarkan data dari database:</p>
                <ul>
                    <li><strong>Guru A:</strong> Jam Mengajar = 20 jam, Mata Pelajaran = Matematika, Fisika.</li>
                    <li><strong>Guru B:</strong> Jam Mengajar = 15 jam, Mata Pelajaran = Kimia, Biologi.</li>
                </ul>
                <p>Setelah perhitungan dilakukan, skor AHP untuk setiap mata pelajaran yang diajarkan oleh guru akan disimpan ke dalam tabel <code>ahp_guru</code> dalam database.</p>
            </div>
        </div>

        <div class="text-center">
            <a href="javascript:history.back()" class="btn btn-primary">Kembali</a>
        </div>

    </div>


<?php include './include/footer.php'; ?>