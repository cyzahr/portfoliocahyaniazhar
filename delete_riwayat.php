<?php
include 'database.php'; // Koneksi ke database

// Ambil ID dari parameter URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0) {
    // Query untuk mengambil data (jika ada file foto yang terkait, sesuaikan jika diperlukan)
    $sql = "SELECT foto FROM riwayat_pendidikan WHERE id = '$id'";
    $result = $conn->query($sql);
    
    if ($result && $row = $result->fetch_assoc()) {
        // Hapus file foto jika ada (sesuaikan path dan nama kolom foto jika digunakan)
        if (!empty($row['foto']) && file_exists("assets/images/" . $row['foto'])) {
            unlink("assets/images/" . $row['foto']);
        }
    }

    // Query untuk menghapus data berdasarkan ID
    $sql = "DELETE FROM riwayat_pendidikan WHERE id = '$id'";
    if ($conn->query($sql) === TRUE) {
        // Redirect ke halaman utama setelah berhasil hapus
        header('Location: index.php');
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "ID tidak valid.";
}

$conn->close();
?>
