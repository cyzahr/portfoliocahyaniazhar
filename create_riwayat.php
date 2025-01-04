<?php
include 'database.php';

// Inisialisasi variabel
$pendidikan = $tahun = $nama_sekolah = "";
$success = $error = "";

// Cek jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pendidikan = $_POST['pendidikan'];
    $tahun = $_POST['tahun'];
    $nama_sekolah = $_POST['nama_sekolah'];

    // Validasi input
    if (empty($pendidikan) || empty($tahun) || empty($nama_sekolah)) {
        $error = "Semua kolom wajib diisi!";
    } else {
        // Query untuk menambahkan data ke tabel riwayat_pendidikan
        $sql = "INSERT INTO riwayat_pendidikan (pendidikan, tahun, nama_sekolah) 
                VALUES ('$pendidikan', $tahun, '$nama_sekolah')";
        
        if ($conn->query($sql) === TRUE) {
            $success = "Data berhasil ditambahkan!";
        } else {
            $error = "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Riwayat Pendidikan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Tambah Riwayat Pendidikan</h1>

    <!-- Menampilkan pesan sukses atau error -->
    <?php if ($success): ?>
        <div class="alert alert-success"><?= $success ?></div>
    <?php elseif ($error): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <!-- Form Input -->
    <form method="POST" action="create_riwayat.php">
        <div class="mb-3">
            <label for="pendidikan" class="form-label">Pendidikan</label>
            <input type="text" name="pendidikan" id="pendidikan" class="form-control" placeholder=>
        </div>
        <div class="mb-3">
            <label for="tahun" class="form-label">Tahun</label>
            <input type="text" name="tahun" id="tahun" class="form-control" placeholder=>
        </div>
        <div class="mb-3">
            <label for="nama_sekolah" class="form-label">Nama Sekolah</label>
            <input type="text" name="nama_sekolah" id="nama_sekolah" class="form-control" >
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
<?php $conn->close(); ?>
