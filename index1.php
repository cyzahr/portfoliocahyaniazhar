<?php
// Konfigurasi Database
$host = "localhost";
$user = "root"; 
$password = ""; 
$database = "cv";

// Membuat koneksi ke database
$conn = new mysqli($host, $user, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil data dari tabel
$sql = "SELECT id, nama, jenis_kelamin, alamat, deskripsi, foto FROM users";
$result = $conn->query($sql);

$sql = "SELECT * FROM riwayat_pendidikan";
$pendidikan = $conn->query($sql);

$sql = "SELECT * FROM project";
$project = $conn->query($sql);
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>My Portfolio</title>
        <!-- Bootstrap CSS -->
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
         rel="stylesheet">
         <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
         <link rel="stylesheet" href="style.css">
        </head>
        <body>
            <!-- Navbar -->
             <nav class="navbar navbar-expand-lg bg-black">
                <div class="container">
                    <a class="navbar-brand text-white" href="#">2203010014 CAHYANI AZHAR TI A</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                        <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="#home"><b>HOME</b></a></li>
                        <li class="nav-item"><a class="nav-link" href="#education"><b>EDUCATION</b></a></li>
                        <li class="nav-item"><a class="nav-link" href="#project"><b>PROJECT</b></a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact"><b>CONTACT</b></a></li>
                        <li class="nav-item">
                            <button class="btn hire-btn"><b>Hire me</b></button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <section class="hero-section">
            <div class="container">
                <div class="row align-items-center">
                <!-- Hero Text -->
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="col-md-6 hero-content">
                        <h1><span>I’m</span> <br> <?= $row['nama'] ?></h1>
                        <!-- Tampilkan Deskripsi -->
                        <p class="my-3">
                            <?= $row['deskripsi'] ?>
                        </p>
                        <a href="#" class="btn btn-primary">Download CV</a>
                    </div>
                    
                    <!-- Hero Image -->
                    <div class="col-md-6 text-center hero-image">
                        <img src="assets/images<?= $row['foto'] ?>" alt="Foto" width="100">
                    </div>
                </div>
            </div>
            
            
            <?php endwhile; ?>
        </section>

        <section id="education" class="education">
            <h2>EDUCATION</h2>
            <table>
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
                        </tr>
                    <?php endwhile; $conn->close(); ?>
                </tbody>
            </table>
        </section>

        <div class="project-judul">
            <h2>PROJECT</h2>
        </div>
        <section id="project">
            <?php while ($row = $project->fetch_assoc()): ?>
                <div class="col-md-4 mb-4"> <!-- Set kolom 4 -->
                    <div class="card">
                        <img src="assets/images/<?= $row['image'] ?>" class="card-img-top" alt="Project Image">
                        <div class="card-body">
                            <h5 class="card-title"><?= $row['nama_project'] ?></h5>
                            <p class="card-text"><?= $row['keterangan'] ?></p>
                            <a href="<?= $row['link_project'] ?>" class="btn btn-primary" target="_blank">Lihat Project</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </section>

        <section id="contact" class="contact-section">
        <h2>Contact</h2>
        <div>
            <p>Address: Kp. Mekartanjung Desa Cayur Kecamatan Cikatomas Kabupaten Tasikmalaya </p>
            <p>Email: 2203010014@unper.ac.id</p>
            <p>Phone: +62 867-0266-7116</p>
        </div>
        <div class="social-icons">
            <a href="https://www.tiktok.com/@babychetah__?_t=ZS-8smNE3kYkvH&_r=1" target="_blank" class="social-icon">
                <i class="fab fa-tiktok"></i>
            </a>
            <a href="https://instagram.com/cyazhr_" target="_blank" class="social-icon">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="www.linkedin.com/in/cahyani-azhar-123816292" target="_blank" class="social-icon">
                <i class="fab fa-linkedin"></i>
            </a>
            <a href="https://github.com/cyzahr" target="_blank" class="social-icon">
                <i class="fab fa-github"></i>
            </a>
        </div>

        </section>

        <footer class="footer-section">
            <p>&copy; 2024 Cahyani Azhar</p>
        </footer>


        <!-- Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>