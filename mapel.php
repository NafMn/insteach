<?php include_once './include/header.php'; ?>
<div class="container my-5">
    <h2 class="mt-5">Data Mata Pelajaran</h2>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Mata Pelajaran</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $sql = "SELECT * FROM mata_pelajaran";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id_mapel'] . "</td>";
                    echo "<td>" . $row['nama_mapel'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='2'>Tidak ada data mata pelajaran.</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>
</div>
<?php include_once './include/footer.php'; ?>