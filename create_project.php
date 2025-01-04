<?php
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_project = $_POST['nama_project'];
    $keterangan = $_POST['keterangan'];
    $link_project = $_POST['link_project'];

    // Handle upload image
    $image = $_FILES['image']['name'];
    $target_dir = "assets/images/";
    $image_file_type = strtolower(pathinfo($image, PATHINFO_EXTENSION));
    $new_file_name = uniqid() . "." . $image_file_type;
    $target_file = $target_dir . basename($image);

    $allowed_types = ['jpg', 'jpeg', 'png'];
    if (!in_array($image_file_type, $allowed_types)) {
        die("Tipe file tidak diizinkan. Hanya JPG, JPEG, atau PNG yang diperbolehkan.");
    }

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        // Query INSERT untuk menyimpan data ke database
        $sql = "INSERT INTO project (nama_project, keterangan, image, link_project) 
                VALUES ('$nama_project', '$keterangan', '$image', '$link_project')";

        if ($conn->query($sql) === TRUE) {
            header('Location: index.php?pesan=create_sukses');
            exit();
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Gagal mengunggah file gambar.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tambah Project</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container mt-5">
            <h1 class="mb-4">Tambah Project</h1>
            <form action="create_project.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nama_project" class="form-label">Nama Project</label>
                    <input type="text" class="form-control" id="nama_project" name="nama_project" required>
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea class="form-control" id="keterangan" name="keterangan" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="image" required>
                </div>
                <div class="mb-3">
                    <label for="link_project" class="form-label">Link Project</label>
                    <input type="url" class="form-control" id="link_project" name="link_project" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
            <a href="index.php" class="btn btn-secondary mt-3">Kembali</a>
        </div>
    </body>
</html>
