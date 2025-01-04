<?php
include 'database.php';

$sql = "SELECT * FROM users";
$result = $conn->query($sql);
if ($result->num_rows <= 0) {
    echo "<div class='alert alert-warning'>Data tidak ditemukan</div>";
}

// Query untuk tabel riwayat pendidikan
$sql_pendidikan = "SELECT * FROM riwayat_pendidikan";
$pendidikan = $conn->query($sql_pendidikan);
if (!$pendidikan){
    echo "Error: " . $conn->error;
}

// Query untuk tabel project
$sql_project = "SELECT * FROM project";
$project = $conn->query($sql_project);
if (!$project){
    echo "Error: " . $conn->error;
}
?>

<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CRUD Cahyani Azhar</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
        rel="stylesheet">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <div class="container mt-5">
        <h1 class="mb-4">Data Identitas Diri</h1>
        <a href="create.php" class="btn btn-primary mb-3">Tambah Identitas</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Deskripsi</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['nama'] ?></td>
                        <td><?= $row['jenis_kelamin'] ?></td>
                        <td><?= $row['alamat'] ?></td>
                        <td><?= $row['deskripsi'] ?></td>
                        <td>
                            <img src="assets/images/<?= $row['foto'] ?>" alt="Foto" width="100">
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="view.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-sm">View</a>
                                <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Hapus</a>
                            </div>
                        </td>
                    </tr>    
                <?php endwhile; ?>
            <tbody>
        </table>
        
        <!-- Tabel Riwayat Pendidikan -->
    <h2 class="mt-5">Riwayat Pendidikan</h2>
    <a href="create_riwayat.php" class="btn btn-primary mb-3">Tambah Riwayat Pendidikan</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Pendidikan</th>
                <th>Tahun</th>
                <th>Nama Sekolah</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $pendidikan->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['pendidikan'] ?></td>
                    <td><?= $row['tahun'] ?></td>
                    <td><?= $row['nama_sekolah'] ?></td>
                    <td>
                        <a href="view_riwayat.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-sm">View</a>
                        <a href="edit_riwayat.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="delete_riwayat.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>


    <!-- Tabel Project -->
    <h2 class="mt-5">Project</h2>
    <a href="create_project.php" class="btn btn-primary mb-3">Tambah Project</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Project</th>
                <th>Keterangan</th>
                <th>Image</th>
                <th>Link Project</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $project->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['nama_project'] ?></td>
                    <td><?= $row['keterangan'] ?></td>
                    <td>
                        <img src="assets/images/<?= $row['image'] ?>" alt="Project Image" width="100">
                    </td>
                    <td><a href="<?= $row['link_project'] ?>" target="_blank"><?= $row['link_project'] ?></a></td>
                    <td>
                        <a href="view_project.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-sm">View</a>
                        <a href="edit_project.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="delete_project.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    </div>
</body>
</html>
<?php $conn->close(); ?>
