<?php
require 'app/Database.php';

$id = $_GET["id"];

if(hapus($id) > 0){
    echo "<script>
            alert ('Hapus Berhasil');
            document.location.href = 'admin.php'
        </script>";
        
    }else{
        echo "<script>
                alert ('Hapus Gagal');
            </script>";
        }


?>