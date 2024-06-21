<?php include_once './include/header.php'; 
    
    $sql = "SELECT * FROM guru ORDER BY nama_guru ASC";
    $result = $conn->query($sql);
    $guru = $result->fetch_all(MYSQLI_ASSOC);
?>
    <div class="container">
        <h2 class="mt-4 mb-4">Data Guru</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Mapel</th>
                    <th>Jabatan</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($guru as $data) { ?>
                    <tr>
                        <td><?= $data['nama_guru'] ?></td>
                        <td><?= $data['mata_pelajaran'] ?></td>
                        <td><?= $data['jabatan'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

<?php include_once './include/footer.php'; ?>

