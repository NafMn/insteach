<?php include 'include/header.php'; ?>
    <div class="container my-5">
        <h2 class="mt-5">Input Data Mata Pelajaran</h2>
        <form action="input_mapel.php" method="post" class="mt-5">
            <div class="form-group">
                <label for="nama_mapel">Nama Mata Pelajaran:</label>
                <input type="text" class="form-control" id="nama_mapel" name="nama_mapel" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
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
                showAlert('success', 'Mata Pelajaran berhasil ditambahkan!');
            } else if (message === 'error') {
                showAlert('error', 'Terjadi kesalahan saat menyimpan data!');
            }
        }
    </script>
<?php include 'include/footer.php'; ?>
