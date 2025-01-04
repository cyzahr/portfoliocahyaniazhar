<?php
include 'database.php'; // Koneksi database

// Periksa apakah ID tersedia di URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Konversi ID menjadi integer

    // Ambil data proyek berdasarkan ID
    $sql = "SELECT * FROM project WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    } else {
        die("Data proyek tidak ditemukan!");
    }
}

// Proses update data saat form dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_project = $_POST['nama_project'];
    $keterangan = $_POST['keterangan'];
    $link_project = $_POST['link_project'];
    $image = $_POST['image'];

    // Query UPDATE untuk menyimpan perubahan
    $update_sql = "UPDATE project SET 
                    nama_project = '$nama_project', 
                    keterangan = '$keterangan', 
                    link_project = '$link_project', 
                    image = '$image' 
                  WHERE id = $id";

    if ($conn->query($update_sql) === TRUE) {
        // Redirect kembali ke halaman utama
        header("Location: index.php?message=Data proyek berhasil diperbarui");
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
    <title>Edit Proyek</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Edit Data Proyek</h2>
    <form method="POST" action="">
        <div class="mb-3">
            <label for="nama_project" class="form-label">Nama Project</label>
            <input type="text" class="form-control" id="nama_project" name="nama_project" 
                   value="<?= isset($row['nama_project']) ? htmlspecialchars($row['nama_project']) : '' ?>" required>
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan" rows="3" required><?= htmlspecialchars($row['keterangan']) ?></textarea>
        </div>
        <div class="mb-3">
            <label for="link_project" class="form-label">Link Project</label>
            <input type="text" class="form-control" id="link_project" name="link_project" 
                   value="<?= isset($row['link_project']) ? htmlspecialchars($row['link_project']) : ''?>" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Nama File Gambar</label>
            <input type="text" class="form-control" id="image" name="image" 
                   value="<?= htmlspecialchars($row['image']) ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="index.php" class="btn btn-secondary">Batal</a>
    </form>
</div>
</body>
</html>
