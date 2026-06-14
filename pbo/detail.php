<?php 
require_once 'app/Database.php';
$id = $_GET['id'];
$row = query("SELECT * FROM buku WHERE id = $id")[0];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Buku - PerpusDigital</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <link rel="stylesheet" href="aset/detail.css">
</head>
<body>

    <nav class="navbar-custom">
        <a href="admin.php" class="brand-logo">
            <i class="fa-solid fa-book-open-reader"></i> PerpusDigital
        </a>
        
        <div class="page-title">Detail Buku</div>

        <div class="nav-actions">
            <a href="admin.php" class="btn-back-nav">
                <i class="fa-solid fa-arrow-left"></i> Kembali
            </a>
        </div>
    </nav>

    <div class="container-detail">
        <div class="card-detail">
            
            <div class="top-section">
                <div class="book-cover-wrapper">
                    <img src="sampul/<?= $row["foto"];?>" alt="Sampul Buku" class="book-cover">
                </div>

                <div class="book-info-text">
                    <h1 class="book-title"><?= $row["judul"];?></h1>
                    <div class="book-meta">
                        <span><strong>Penulis:</strong> <?= $row["pengarang"];?></span> <br>
                        <span><strong>Tahun:</strong> <?= $row["tahun"];?></span>
                    </div>

                    <h3 class="section-label">Sinopsis</h3>
                    <p class="sinopsis-text">
                        <?= $row["sinopsis"];?>
                    </p>
                </div>
            </div>

            <h3 class="section-label">Informasi Detail</h3>
            <div class="table-wrapper">
                <table class="detail-table">
                    <tr>
                        <th>ID Buku</th>
                        <td><?= $row["id"];?></td>
                    </tr>
                    <tr>
                        <th>Nomor ISBN</th>
                        <td><?= $row["isbn"];?></td>
                    </tr>
                    <tr>
                        <th>Jumlah Halaman</th>
                        <td><?= $row["halaman"];?></td>
                    </tr>
                    <tr>
                        <th>Stok Tersedia</th>
                        <td><?= $row["stok"];?></td>
                    </tr>
                </table>
            </div>

            <h3 class="section-label">Tinggalkan Komentar</h3>
            <div class="comment-section">
                <form class="form-komentar">
                    <div class="form-group">
                        <label class="form-label">Nama:</label>
                        <input type="text" name="nama" class="form-input" placeholder="Nama lengkap Anda">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Email:</label>
                        <input type="email" name="email" class="form-input" placeholder="alamat@email.com">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Komentar:</label>
                        <textarea name="komentar" rows="4" class="form-textarea" placeholder="Tulis pendapat Anda tentang buku ini..."></textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Rating (1–5):</label>
                        <input type="number" name="rating" min="1" max="5" class="form-input" style="width: 100px;">
                    </div>

                    <button type="submit" class="btn-kirim">
                        <i class="fa-solid fa-paper-plane"></i> Kirim Komentar
                    </button>
                </form>
            </div>

            <a href="#" id="scrollTopBtn" class="scroll-top">
                ↑ Kembali ke Atas
            </a>

        </div>
    </div>

    <footer class="footer">
        © 2025 Universitas Duta Bangsa. All rights reserved.
    </footer>

    <script>
        
        document.getElementById('scrollTopBtn').addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>

</body>
</html>