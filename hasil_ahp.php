<?php
include_once('include/header.php');

$message = isset($_GET['message']) ? $_GET['message'] : '';
?>
<h2 class="mt-4 mb-4 text-center">Update Jadwal dengan Guru</h2>
<div class="container d-flex justify-content-between">
    <form id="formHitungAHP" class="mt-4" action="hitung_ahp.php" method="POST">
        <button type="button" class="btn btn-success" onclick="hitungAHP()">Hitung AHP</button>
    </form> 
    <form id="formUpdateJadwal" class="mt-4" action="update_jadwal.php" method="POST">
        <button type="button" class="btn btn-primary" onclick="updateJadwal()">Update Jadwal</button>
    </form> 
    <form id="formResetGuru" class="mt-4" action="reset_idguru.php" method="POST">
        <button type="button" class="btn btn-danger" onclick="resetGuru()">Reset Jadwal</button>
    </form>
</div>
<div class="container">
    <h2 class="mt-4 mb-4 text-center">Hasil AHP</h2>
    <?php if ($message == 'berhasilupdatejadwal') { ?>
        <div class="alert alert-success" role="alert">
            Jadwal telah berhasil diupdate. <a href="jadwal.php" class="btn btn-primary">Lihat Jadwal</a>
        </div>
    <?php } ?>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Nama Guru</th>
                <th>Mata Pelajaran</th>
                <th>Skor AHP</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql_jadwal = "SELECT g.nama_guru, mp.nama_mapel AS mata_pelajaran, MAX(ag.skor_ahp) AS skor_ahp
        FROM jadwal j
        INNER JOIN mata_pelajaran mp ON j.id_mapel = mp.id_mapel
        LEFT JOIN ahp_guru ag ON j.id_guru = ag.id_guru AND j.id_mapel = ag.id_mapel
        LEFT JOIN guru g ON ag.id_guru = g.id_guru
        GROUP BY mp.nama_mapel, g.nama_guru
        ORDER BY mp.nama_mapel";


            $result_jadwal = $conn->query($sql_jadwal);

            $mapel_terlihat = array();

            while ($row = $result_jadwal->fetch_assoc()) {
                // Jika mata pelajaran sudah ada dalam array $mapel_terlihat, lewati iterasi ini
                if (in_array($row['mata_pelajaran'], $mapel_terlihat)) {
                    continue;
                }

                // Tambahkan mata pelajaran ke dalam array $mapel_terlihat
                $mapel_terlihat[] = $row['mata_pelajaran'];
            ?>
                <tr>
                    <td><?= $row['nama_guru'] ?? 'Belum ditentukan' ?></td>
                    <td><?= $row['mata_pelajaran'] ?></td>
                    <td><?= $row['skor_ahp'] ?? 'N/A' ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

<?php include_once('include/footer.php'); ?>

<script>
    function hitungAHP() {
        Swal.fire({
            title: 'Yakin ingin menghitung AHP?',
            text: "Perhitungan AHP akan memakan waktu yang cukup lama.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, lanjutkan!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('formHitungAHP').submit();
            }
        });
    }

    function updateJadwal() {
        Swal.fire({
            title: 'Yakin ingin mengupdate jadwal guru?',
            text: "Perubahan jadwal akan disimpan dan guru akan dipilih berdasarkan hasil perhitungan AHP.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, lanjutkan!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('formUpdateJadwal').submit();
            }
        });
    }

    function resetGuru() {
        Swal.fire({
            title: 'Yakin ingin mereset jadwal guru?',
            text: "Semua jadwal guru akan direset dan harus diupdate kembali.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, lanjutkan!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('formResetGuru').submit();
            }
        });
    }

    <?php if (isset($_GET['message']) && $_GET['message'] == 'berhasilhitungahp'): ?>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Skor AHP berhasil dihitung',
            showConfirmButton: false,
            timer: 1500
        });
    <?php endif; ?>

    <?php if (isset($_GET['message']) && $_GET['message'] == 'berhasilupdatejadwal'): ?>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Jadwal berhasil diupdate',
            showConfirmButton: false,
            timer: 1500
        });
    <?php endif; ?>

    <?php if (isset($_GET['message']) && $_GET['message'] == 'berhasilresetjadwal'): ?>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Jadwal guru berhasil direset',
            showConfirmButton: false,
            timer: 1500
        });
    <?php endif; ?>
</script>

