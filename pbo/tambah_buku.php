<?php
session_start();

require_once 'app/Book.php';

$id = $_SESSION['session_id'];
$namaAdmin = $_SESSION['session_nama'];
$user_id = $_SESSION['session_id'];

if (isset($_POST['submit'])) {
    $judul = $_POST['judul'];
    $isbn = $_POST['isbn'];
    $tahun = $_POST['tahun'];
    $sinopsis = $_POST['sinopsis'];
    $halaman = $_POST['halaman'];


    //gambar
    $namaFile = $_FILES['foto']['name'];
    $tmpName = $_FILES ['foto']['tmp_name'];
    $folder = "sampul/".$namaFile;
    move_uploaded_file($tmpName, $folder);

    $pengarang = $_POST['pengarang'];
    $stok = $_POST['stok'];

    // buat object book
    $book = new Book($namaFile, $judul, $isbn, $tahun, $sinopsis, $halaman, $pengarang, $stok, $user_id);

    if ($book->save()) {
        echo "<script>
            alert('Buku berhasil ditambahkan!');
                document.location.href = 'admin.php' </script>";
    } else {
        echo "<script>alert('Gagal menambah buku!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku Baru</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="aset/tambahbuku.css">
</head>
<body>

    <nav class="navbar-custom">
        <a href="admin.php" class="brand-logo">
            <i class="fa-solid fa-book-open-reader me-2"></i> PerpusDigital
        </a>
        
        <a href="logout.php" class="btn-logout" onclick="return confirm('Yakin ingin keluar?')">
            <i class="fa-solid fa-right-from-bracket"></i> Logout
        </a>
    </nav>

    <div class="content-wrapper">
        <div class="card-premium">
            
            <div class="card-header-gradient">
                <div>
                    <h2>Tambah Buku</h2>
                    <span class="sub-header">Silakan lengkapi data buku di bawah ini.</span>
                </div>
                <a href="admin.php" class="btn-back-fancy">
                    <i class="fa-solid fa-arrow-left me-2"></i> Dashboard
                </a>
            </div>

            <div class="form-body">
                <form method="POST" enctype="multipart/form-data">
                    
                    <div class="row g-4">
                        
                        <div class="col-12">
                            <div class="upload-zone">
                                <i class="fa-solid fa-cloud-arrow-up text-primary fa-2x mb-2"></i>
                                <h6 class="fw-bold mb-0">Upload Sampul Buku</h6>
                                <small class="text-muted d-block" id="fileInfo">Klik area ini untuk memilih gambar</small>
                                <input type="file" name="foto" required onchange="showFileName(this)">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul" required>
                                <label for="judul"><i class="fa-solid fa-book me-2"></i>Judul Buku</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="pengarang" name="pengarang" placeholder="Pengarang" required>
                                <label for="pengarang"><i class="fa-solid fa-user-pen me-2"></i>Pengarang</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="isbn" name="isbn" placeholder="ISBN" required>
                                <label for="isbn"><i class="fa-solid fa-barcode me-2"></i>ISBN</label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="tahun" name="tahun" placeholder="2024" required>
                                <label for="tahun">Tahun</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="halaman" name="halaman" placeholder="0" required>
                                <label for="halaman">Halaman</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="stok" name="stok" placeholder="0" required>
                                <label for="stok">Stok</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Sinopsis" id="sinopsis" name="sinopsis" style="height: 120px"></textarea>
                                <label for="sinopsis">Sinopsis Singkat</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="submit" name="submit" class="btn-neon">
                                Simpan Buku Baru <i class="fa-solid fa-circle-check ms-2"></i>
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <footer class="footer">
        <p>&copy; 2025 Perpustakaan Digital. </i> oleh Kelompok Menuju Cumlaude.</p>
    </footer>

    <script>
        function showFileName(input) {
            if (input.files && input.files[0]) {
                document.getElementById('fileInfo').innerText = "File Terpilih: " + input.files[0].name;
                document.getElementById('fileInfo').style.color = "#0072ff";
                document.getElementById('fileInfo').style.fontWeight = "bold";
            }
        }
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>