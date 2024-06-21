<?php include './include/header.php' ?>
<div class="container my-5">
    <h2 class="mt-5">Tutorial Penggunaan Aplikasi</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="card border-0">
                <img src="./image/login.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Step 1</h5>
                    <p class="card-text">Login menggunakan akun yang telah didaftarkan oleh administrator.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0">
                <img src="./image/profile.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Step 2</h5>
                    <p class="card-text">Masuk ke halaman profile untuk melihat informasi tentang akun Anda.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0">
                <img src="./image/hasiljadwal.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Step 3</h5>
                    <p class="card-text">Masuk ke halaman jadwal untuk melihat jadwal mengajar Anda.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <h2 class="mt-5">Cara Menggunakan Aplikasi</h2>
    <ol class="list-group list-group-numbered">
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">Step 1</div>
                Masuk ke halaman data mata pelajaran lalu klik tombol "Tambah Data Mata Pelajaran" untuk menambahkan data mata pelajaran baru.
            </div>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">Step 2</div>
                Masuk ke halaman data kelas lalu klik tombol "Tambah Data Kelas" untuk menambahkan data kelas baru.
            </div>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">Step 3</div>
                Masuk ke halaman data guru lalu klik tombol "Tambah Data Guru" untuk menambahkan data guru baru.
            </div>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">Step 4</div>
                Masuk ke halaman data jadwal lalu klik tombol "Tambah Data Jadwal" untuk menambahkan data jadwal baru.
            </div>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">Step 5</div>
                Setelah semua data diatas sudah ditambahkan, klik tombol "Hitung AHP" untuk melakukan perhitungan analisis harmonisasi preferensi.
            </div>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">Step 6</div>
                Setelah perhitungan selesai, klik tombol "Update Jadwal" untuk mengupdate jadwal mengajar guru sesuai dengan perhitungan AHP.
            </div>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">Step 7</div>
                Kemudian, masuk ke halaman data jadwal untuk melihat jadwal mengajar guru yang telah diupdate.
            </div>
        </li>
    </ol>
</div>


<?php include './include/footer.php' ?>