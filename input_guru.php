<?php include './include/header.php'?>
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_guru = $_POST['nama_guru'];
    $jam_mengajar = $_POST['jam_mengajar'];
    $mata_pelajaran = isset($_POST['mata_pelajaran']) ? $_POST['mata_pelajaran'] : '';

    $sql = "INSERT INTO guru (nama_guru, mata_pelajaran, jam_mengajar) VALUES ('$nama_guru', '$mata_pelajaran', '$jam_mengajar')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Data guru berhasil disimpan";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Mengambil data mata pelajaran dari database
$sql_mapel = "SELECT * FROM mata_pelajaran";
$result_mapel = $conn->query($sql_mapel);
?>

<div class="container mt-5">
    <div class="container">
        <h2 class="mt-5">Input Data Guru</h2>
        <form action="" method="post" class="mt-5">
            <div class="form-group">
                <label for="nama_guru">Nama Guru:</label>
                <input type="text" class="form-control" id="nama_guru" name="nama_guru" required>
            </div>
            <div class="form-group">
                <label for="mata_pelajaran">Mata Pelajaran:</label>
                <select class="form-control" id="mata_pelajaran" name="mata_pelajaran" required>
                    <option value="">Pilih Mata Pelajaran</option>
                    <?php
                    if ($result_mapel->num_rows > 0) {
                        while($row_mapel = $result_mapel->fetch_assoc()) {
                            echo '<option value="' . $row_mapel['id_mapel'] . '">' . $row_mapel['nama_mapel'] . '</option>';
                        }
                    } else {
                        echo '<option value="">Tidak ada mata pelajaran yang tersedia.</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="jam_mengajar">Jam Mengajar:</label>
                <input type="text" class="form-control" id="jam_mengajar" name="jam_mengajar" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

<?php include './include/footer.php'?>
