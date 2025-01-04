<?php
include 'database.php'; // Koneksi database

// Periksa apakah ID tersedia di URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Pastikan ID adalah angka untuk keamanan

    // Ambil data riwayat pendidikan berdasarkan ID
    $sql = "SELECT * FROM riwayat_pendidikan WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    } else {
        die("Data riwayat pendidikan tidak ditemukan!");
    }
}

// Proses update data ketika form dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pendidikan = $_POST['pendidikan'];
    $tahun = intval($_POST['tahun']);
    $nama_sekolah = $_POST['nama_sekolah'];

    // Query UPDATE untuk menyimpan perubahan
    $update_sql = "UPDATE riwayat_pendidikan SET 
                    pendidikan = '$pendidikan', 
                    tahun = $tahun, 
                    nama_sekolah = '$nama_sekolah' 
                  WHERE id = $id";

    if ($conn->query($update_sql) === TRUE) {
        // Redirect ke halaman utama dengan pesan sukses
        header("Location: index.php?message=Data riwayat pendidikan berhasil diperbarui");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Riwayat Pendidikan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Edit Riwayat Pendidikan</h2>
    <form method="POST" action="">
        <div class="mb-3">
            <label for="pendidikan" class="form-label">Jenjang Pendidikan</label>
            <input type="text" class="form-control" id="pendidikan" name="pendidikan" 
                   value="<?= htmlspecialchars($row['pendidikan']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="tahun" class="form-label">Tahun</label>
            <input type="text" class="form-control" id="tahun" name="tahun" 
                   value="<?= htmlspecialchars($row['tahun']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="nama_sekolah" class="form-label">Nama Sekolah/Kampus</label>
            <input type="text" class="form-control" id="nama_sekolah" name="nama_sekolah" 
                   value="<?= htmlspecialchars($row['nama_sekolah']) ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="index.php" class="btn btn-secondary">Batal</a>
    </form>
</div>
</body>
</html>
