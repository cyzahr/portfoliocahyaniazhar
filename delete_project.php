<?php
include 'database.php';  // Pastikan koneksi database sudah benar

// Memastikan ada parameter 'id' di URL
if (isset($_GET['id'])) {
    // Ambil ID dari URL dan sanitasi dengan intval() agar aman
    $id = intval($_GET['id']);

    // Query untuk mendapatkan data gambar berdasarkan ID project
    $sql = "SELECT image FROM project WHERE id = $id"; // Pastikan 'id' adalah nama kolom yang benar
    $result = $conn->query($sql);

    // Cek apakah query berhasil
    if ($result === false) {
        echo "Query gagal: " . $conn->error;
        exit;
    }

    // Jika data ditemukan, ambil nama gambar dan hapus
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $image = $row['image'];  // Ambil nama gambar

        // Path ke file gambar
        $imagePath = "assets/images/$image";
        
        // Cek apakah file gambar ada sebelum menghapusnya
        if (file_exists($imagePath)) {
            unlink($imagePath);  // Hapus gambar
        }
    } else {
        echo "Data project tidak ditemukan.";
        exit;
    }

    // Query untuk menghapus data project berdasarkan ID
    $deleteSql = "DELETE FROM project WHERE id = $id";  // Ganti 'id' jika kolom di tabel berbeda
    if ($conn->query($deleteSql) === TRUE) {
        // Jika berhasil, redirect ke halaman index.php
        header("Location: index.php");
        exit;
    } else {
        echo "Error menghapus data: " . $conn->error;
    }
} else {
    echo "ID project tidak ditemukan.";
}
?>
