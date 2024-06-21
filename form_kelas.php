<?php include 'include/header.php'; ?>
    <div class="container my-5 mx-auto" style="max-width: 500px;">
        <h2 class="mt-5 mb-5 text-center">Input Data Kelas</h2>
        <form action="input_kelas.php" method="post" class="mt-5">
            <div class="form-group">
                <label for="tingkat">Tingkat:</label>
                <select class="form-control" id="tingkat" name="tingkat" required>
                    <option value="">Pilih Tingkat</option>
                    <option value="7">Kelas 7</option>
                    <option value="8">Kelas 8</option>
                    <option value="9">Kelas 9</option>
                </select>
            </div>
            <div class="form-group">
                <label for="jumlah_kelas">Jumlah Kelas:</label>
                <input type="number" class="form-control" id="jumlah_kelas" name="jumlah_kelas" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        </form>
    </div>

    <script>
        function showAlert(type, message) {
            Swal.fire({
                icon: type,
                title: type.charAt(0).toUpperCase() + type.slice(1),
                text: message,
                showConfirmButton: false,
                timer: 1500
            });
        }

        window.onload = function() {
            const urlParams = new URLSearchParams(window.location.search);
            const message = urlParams.get('message');
            if (message === 'success') {
                showAlert('success', 'Kelas berhasil ditambahkan!');
            } else if (message === 'error') {
                showAlert('error', 'Terjadi kesalahan saat menyimpan data!');
            }
        }
    </script>


<?php include 'include/footer.php'; ?>