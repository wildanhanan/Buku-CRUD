<?php
// app/Book.php
require_once 'Database.php';

class Book extends Database {
    public $foto;
    public $judul;
    public $isbn;
    public $tahun;
    public $sinopsis;
    public $halaman;
    public $pengarang;
    public $stok;
    public $user_id;
    

    public function __construct($namaFile, $judul, $isbn, $tahun, $sinopsis, $halaman, $pengarang, $stok , $user_id) {
        parent::__construct(); 
        $this->foto = $namaFile;
        $this->judul = $judul;
        $this->isbn = $isbn;
        $this->tahun = $tahun;
        $this->sinopsis = $sinopsis;
        $this->halaman = $halaman;
        $this->pengarang = $pengarang;
        $this->stok = $stok;
        $this->user_id= $user_id;
    }

    public function save() {
        $sql = "INSERT INTO buku (isbn, foto, judul, pengarang, halaman, tahun, sinopsis, stok, user_id)
                VALUES ('$this->isbn','$this->foto','$this->judul','$this->pengarang', '$this->halaman', '$this->tahun', '$this->sinopsis','$this->stok','$this->user_id' )";
        
        return $this->runQuery($sql);
    }
}
