<?php include './include/header.php'; ?>
<div class="container mt-5 mb-5 pb-5">
    <div class="card mb-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Pilih Tingkat Kelas</h5>
            <button type="button" class="btn btn-danger" onclick="resetKelas()">Reset Data Kelas</button>
        </div>
        <div class="card-body">
            <form method="post" action="">
                <div class="form-group">
                    <label for="tingkat">Tingkat Kelas:</label>
                    <select name="tingkat" id="tingkat" class="form-control">
                        <option value="">Pilih Tingkat</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Tampilkan</button>
            </form>
        </div>
    </div>
    <script>
        function resetKelas() {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda akan menghapus semua data kelas!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'reset_kelas.php',
                        type: 'POST',
                        success: function(response) {
                            Swal.fire('Berhasil!', 'Data kelas telah dihapus.', 'success');
                            window.location.reload();
                        },
                        error: function() {
                            Swal.fire('Gagal!', 'Terjadi kesalahan.', 'error');
                        }
                    });
                }
            });
        }
    </script>

    <?php
    if (isset($_POST['tingkat']) && !empty($_POST['tingkat'])) {
        $tingkat = $_POST['tingkat'];
        // Menggunakan prepared statements untuk menghindari SQL injection
        $stmt = $conn->prepare("SELECT * FROM kelas WHERE tingkat = ?");
        $stmt->bind_param("s", $tingkat);
        $stmt->execute();
        $result_kelas = $stmt->get_result();
    }
    ?>
    <table class="table table-striped shadow p-3 mb-5 bg-white rounded">
        <thead>
            <tr>
                <th scope="col">Tingkat Kelas</th>
                <th scope="col">Nama Kelas</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($result_kelas)) {
                if ($result_kelas->num_rows > 0) {
                    while ($row_kelas = $result_kelas->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row_kelas['tingkat'] . "</td>";
                        echo "<td>" . $row_kelas['nama_kelas'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>Tidak ada data kelas untuk tingkat kelas tersebut.</td></tr>";
                }
            }
            ?>
        </tbody>
    </table>
</div>

<?php include_once './include/footer.php'?>
