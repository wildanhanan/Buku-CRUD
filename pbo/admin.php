<?php 
session_start();

require_once 'app/Database.php';
if (!isset($_SESSION['session_id'])) {
}
$id = $_SESSION['session_id'];
$nama = $_SESSION['session_nama'];
$tampilData = query("SELECT buku.*, user.nama FROM buku JOIN user ON buku.user_id = user.id");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="aset/admin.css">
    <title>Dashboard Admin</title>
</head>
<body>

    <nav class="navbar-custom">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="brand-logo">
                <i class="fa-solid fa-book-open-reader me-2"></i> PerpusDigital
            </div>
            
            <a href="logout.php" class="btn-logout" onclick="return confirm('Yakin ingin keluar?')">
                <i class="fa-solid fa-right-from-bracket"></i> Logout
            </a>
        </div>
    </nav>

    <div class="main-container">
        
        <div class="header-section">
            <div class="welcome-text">
                <h1>Selamat Pagi, <span><?= $nama; ?></span> 👋</h1>
                <p>Kelola data buku perpustakaan dengan mudah.</p>
            </div>
            
            <a href="tambah_buku.php" class="btn-custom-add">
                <i class="fa-solid fa-plus"></i> Tambah Buku
            </a>
        </div>

        <div class="table-wrapper">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Foto</th>
                        <th>Info Buku</th>
                        <th>Pengarang</th>
                        <th>Tahun</th>
                        <th>Hal</th>
                        <th>Stok</th>
                        <th>Tanggal Input</th>
                        <th>Admin</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>   
                    <?php foreach ($tampilData as $row) : ?>
                    
                        <tr>
                            <td class="fw-bold"><?= $i; ?></td>
                            <td><span class="text-muted small">#<?= $row["id"];?></span></td>
                            <td>
                                <div class="img-frame">
                                    <img src="sampul/<?= $row["foto"];?>" alt="Cover Buku">
                                </div>
                            </td>
                            <td>
                                <div class="book-info">
                                    <span class="book-title"><?= $row["judul"];?></span>
                                    <span class="book-isbn"><i class="fa-solid fa-barcode"></i> <?= $row["isbn"];?></span>
                                </div>
                            </td>
                            <td><?= $row["pengarang"];?></td>
                            <td><span class="badge-year"><?= $row["tahun"];?></span></td>
                            <td><?= $row["halaman"];?></td>
                            
                            <td>
                                <span class="stok-status <?= $row['stok'] < 5 ? 'low' : 'ok' ?>">
                                    <?= $row["stok"];?> pcs
                                </span>
                            </td>
                            
                            <td class="text-muted small">Tanggal Ditambahkan</td>
                            
                            <td>
                                <div class="admin-badge">
                                    <i class="fa-solid fa-user-shield"></i> <?= $row["nama"]; ?>
                                </div>
                            </td>

                            <td>
                                <div class="action-buttons">
                                    <a href="detail.php?id=<?= $row["id"];?>" class="btn-icon btn-detail" title="Detail"><i class="fa-solid fa-eye"></i></a>
                                    <a href="update.php?id=<?= $row["id"];?>" class="btn-icon btn-edit" title="Edit"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="hapus.php?id=<?= $row["id"];?>" onclick="return confirm('Yakin Hapus?');" class="btn-icon btn-delete" title="Hapus"><i class="fa-solid fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    <?php $i++; ?>    
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <footer class="footer">
        <p>&copy; 2025 Perpustakaan Digital. </i> oleh Kelompok Menuju Cumlaude.</p>
    </footer>

</body>
</html>