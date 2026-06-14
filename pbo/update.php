<?php

require_once 'app/Database.php';

$id = $_GET["id"];
$ambilBuku = query("SELECT * FROM buku WHERE id =$id")[0];

if (isset($_POST['submit'])) {
   // $judul = $_POST['judul'];
    // $isbn = $_POST['isbn'];
    // $tahun = $_POST['tahun'];
    // $sinopsis = $_POST['sinopsis'];
    // $halaman = $_POST['halaman'];

    // //gambar
    // $namaFile = $_FILES['foto']['name'];
    // $tmpName = $_FILES ['foto']['tmp_name'];
    // $folder = "sampul/".$namaFile;
    // move_uploaded_file($tmpName, $folder);

    // $pengarang = $_POST['pengarang'];
    // $stok = $_POST['stok'];

    if (update($_POST) > 0) {
        echo "<script>
            alert('Buku berhasil di update!');
                document.location.href = 'admin.php' </script>";
    } else {
        echo "<script>alert('Gagal di update buku!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku - PerpusDigital</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="aset/update.css">
</head>
<body>

    <nav class="navbar-custom">
        <a href="admin.php" class="brand-logo">
            <i class="fa-solid fa-book-open-reader me-2"></i> PerpusDigital
        </a>
        <a href="logout.php" class="btn-logout" onclick="return confirm('Yakin ingin keluar?')">
            <i class="fa-solid fa-right-from-bracket me-1"></i> Logout
        </a>
    </nav>

    <div class="content-wrapper">
        <div class="card-modern">
            
            <div class="card-header-brand">
                <div>
                    <h2>Edit Data Buku</h2>
                    <span class="sub-header">Ubah informasi buku ID #<?= $ambilBuku["id"]; ?></span>
                </div>
                <a href="admin.php" class="btn-back-white">
                    <i class="fa-solid fa-xmark me-1"></i> Batal
                </a>
            </div>

            <div class="form-body">
                <form method="POST" enctype="multipart/form-data">
                    
                    <input type="hidden" name="id" value="<?= $ambilBuku["id"]; ?>">
                    <input type="hidden" name="user_id" value="<?= $ambilBuku["user_id"]; ?>">
                    <input type="hidden" name="foto" value="<?= $ambilBuku["foto"]; ?>">

                    <div class="row g-5 align-items-center">

                        <div class="col-lg-4">
                            <div class="cover-preview-box">
                                <span class="text-secondary fw-bold small mb-2">SAMPUL SAAT INI</span>
                                <img src="sampul/<?= $ambilBuku["foto"]; ?>" alt="Cover Buku" class="cover-img" width="160">
                                
                                <div class="alert alert-light border text-muted small mt-3 mb-0">
                                    <i class="fa-solid fa-info-circle me-1"></i> Foto tidak dapat diubah di menu ini.
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <div class="row g-3">
                                
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="judul" name="judul" value="<?= $ambilBuku["judul"]; ?>" placeholder="Judul" required>
                                        <label for="judul">Judul Buku</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="pengarang" name="pengarang" value="<?= $ambilBuku["pengarang"]; ?>" placeholder="Pengarang" required>
                                        <label for="pengarang">Pengarang</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="isbn" name="isbn" value="<?= $ambilBuku["isbn"]; ?>" placeholder="ISBN" required>
                                        <label for="isbn">ISBN</label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="tahun" name="tahun" value="<?= $ambilBuku["tahun"]; ?>" placeholder="Tahun" required>
                                        <label for="tahun">Tahun</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" id="halaman" name="halaman" value="<?= $ambilBuku["halaman"]; ?>" placeholder="Hal" required>
                                        <label for="halaman">Halaman</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" id="stok" name="stok" value="<?= $ambilBuku['stok']; ?>" placeholder="Stok" required>
                                        <label for="stok">Stok</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Sinopsis" id="sinopsis" name="sinopsis" style="height: 120px"><?= $ambilBuku["sinopsis"]; ?></textarea>
                                        <label for="sinopsis">Sinopsis</label>
                                    </div>
                                </div>

                                <div class="col-12 mt-4">
                                    <button type="submit" name="submit" class="btn-blue-action">
                                        <i class="fa-solid fa-floppy-disk me-2"></i> SIMPAN PERUBAHAN
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <footer class="footer">
        <p>&copy; 2025 Perpustakaan Digital. </i> oleh Kelompok Menuju Cumlaude.</p>

    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>