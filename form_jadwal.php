<?php include 'include/header.php'; ?>

    <div class="container">
        <h2 class="mt-5">Formulir Jadwal Mengajar</h2>
        <form method="post" action="input_jadwal.php" class="mt-5" id="formJadwal" onsubmit="confirmAlert(); return false;">
            <div class="form-group row">
                <label for="id_mapel" class="col-sm-2 col-form-label">Mata Pelajaran:</label>
                <div class="col-sm-10">
                    <select id="id_mapel" name="id_mapel" class="form-control" required>
                        <?php
                        include 'database.php';
                        $sql_mapel = "SELECT id_mapel, nama_mapel FROM mata_pelajaran";
                        $result_mapel = $conn->query($sql_mapel);
                        if ($result_mapel->num_rows > 0) {
                            while($row_mapel = $result_mapel->fetch_assoc()) {
                                echo "<option value='" . $row_mapel['id_mapel'] . "'>" . $row_mapel['nama_mapel'] . "</option>";
                            }
                        } else {
                            echo "<option value=''>Tidak ada mata pelajaran</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="id_kelas" class="col-sm-2 col-form-label">Kelas:</label>
                <div class="col-sm-10">
                    <select id="id_kelas" name="id_kelas" class="form-control" required>
                        <?php
                        $sql_kelas = "SELECT id_kelas, tingkat, nama_kelas FROM kelas ORDER BY tingkat, nama_kelas";
                        $result_kelas = $conn->query($sql_kelas);
                        if ($result_kelas->num_rows > 0) {
                            while($row_kelas = $result_kelas->fetch_assoc()) {
                                echo "<option value='" . $row_kelas['id_kelas'] . "'>Kelas " . $row_kelas['tingkat'] . $row_kelas['nama_kelas'] . "</option>";
                            }
                        } else {
                            echo "<option value=''>Tidak ada kelas</option>";
                        }
                        $conn->close();
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="hari" class="col-sm-2 col-form-label">Hari:</label>
                <div class="col-sm-10">
                    <select id="hari" name="hari" class="form-control" required>
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jumat">Jumat</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="jam_mulai" class="col-sm-2 col-form-label">Jam Mulai:</label>
                <div class="col-sm-10">
                    <input type="time" id="jam_mulai" name="jam_mulai" class="form-control" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="jam_selesai" class="col-sm-2 col-form-label">Jam Selesai:</label>
                <div class="col-sm-10">
                    <input type="time" id="jam_selesai" name="jam_selesai" class="form-control" required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Simpan Jadwal</button>
        </form>
    </div>

    <script>
        <?php
        if (isset($_GET['message']) && $_GET['message'] == 'success') {
            echo "showAlert('Sukses', 'Jadwal berhasil disimpan', 'success');";
        } elseif (isset($_GET['message']) && $_GET['message'] == 'error') {
            echo "showAlert('Gagal', 'Jadwal gagal disimpan', 'error');";
        }
        ?>
    </script>
    <script>
        function showAlert(title, message, icon) {
            Swal.fire({
                title: title,
                text: message,
                icon: icon,
                confirmButtonText: 'OK'
            });
        }

        function confirmAlert() {
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Anda yakin akan menyimpan jadwal?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Simpan'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('formJadwal').submit();
                }
            });
        }
    </script>

<?php include 'include/footer.php'; ?>

