<?php
// app/Database.php

$conn = new mysqli("localhost", "root", "", "perpus_pbo");
class Database {
    protected $conn;

    public function __construct() {
        $this->conn = new mysqli("localhost", "root", "", "perpus_pbo");

        if ($this->conn->connect_error) {
            die("Koneksi gagal: " . $this->conn->connect_error);
        }
    }

    public function runQuery($sql) {
        return $this->conn->query($sql);
    }
}

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)){
        $rows []= $row;
    }
    return $rows;
}

function tambah($data){

    global $conn;
    $namaFile = htmlspecialchars($data["foto"]);
    $judul = htmlspecialchars($data["judul"], ENT_QUOTES);
    $isbn = htmlspecialchars($data["isbn"], ENT_QUOTES);
    $pengarang = htmlspecialchars($data["pengarang"], ENT_QUOTES);
    $halaman = htmlspecialchars($data["halaman"], ENT_QUOTES);
    $tahun = htmlspecialchars($data["tahun"], ENT_QUOTES);
    $sinopsis = htmlspecialchars($data["sinopsis"], ENT_QUOTES);
    $stok = htmlspecialchars($data["stok"], ENT_QUOTES);
    $user_id= htmlspecialchars($data["session_id"], ENT_QUOTES); 

    $query = "INSERT INTO buku VALUES ('', '$isbn','$namaFile', '$judul', '$pengarang', '$halaman', '$tahun', '$sinopsis', '$stok', '$user_id')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
    
}

function update($data){

    global $conn;

    $id = $data["id"];
    $namaFile = htmlspecialchars($data["foto"]);
    $judul = htmlspecialchars($data["judul"], ENT_QUOTES);
    $isbn = htmlspecialchars($data["isbn"], ENT_QUOTES);
    $pengarang = htmlspecialchars($data["pengarang"], ENT_QUOTES);
    $halaman = htmlspecialchars($data["halaman"], ENT_QUOTES);
    $tahun = htmlspecialchars($data["tahun"], ENT_QUOTES);
    $sinopsis = htmlspecialchars($data["sinopsis"], ENT_QUOTES);
    $stok = htmlspecialchars($data["stok"], ENT_QUOTES);
    $user_id= htmlspecialchars($data["user_id"], ENT_QUOTES); 

    $query = "UPDATE buku SET isbn = '$isbn',foto = '$namaFile',judul = '$judul',   pengarang = '$pengarang',halaman = '$halaman',tahun = '$tahun',sinopsis = '$sinopsis',stok = '$stok',user_id = '$user_id' WHERE id = $id";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
    
}

function login($data){
    global $conn;
    $email = htmlspecialchars($data["email"], ENT_QUOTES);
    $password = htmlspecialchars($data["password"]);

    $result = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");

    //cek email ada atau tidak
    if(mysqli_num_rows($result) === 1){
        $row = mysqli_fetch_assoc($result);

        //cocokan password
        if($password == $row["password"]){
            return $row;
        }
    }

    return false;
}

function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM buku WHERE id = $id");
    return mysqli_affected_rows($conn);
}
