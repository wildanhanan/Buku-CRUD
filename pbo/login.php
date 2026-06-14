<?php 
session_start();
require "app/Database.php";

if(isset ($_POST["submit"])){

    $user = login($_POST);

    if($user){
        $_SESSION['session_id'] = $user['id'];
        $_SESSION['session_nama'] = $user['nama'];    
    echo "<script>
            alert ('Login Berhasil');
            document.location.href = 'admin.php'
        </script>";
        
    }else{
        echo "<script>
                alert ('Email / Password Salah');
            </script>";
        }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="aset/login.css">

    <title>Login</title>
</head>
<body>
    <div class="login-left">
    <img src="asset/login.png" class="login-image" alt="">
  </div>
        
        <div class="login-right">
    <h2 class="login-title">Selamat Datang Di</h2>
    <h2 class="login-subtitle">Perpustakaan Digital</h2>

            <form action="" method="POST">
                <li>
                    <label for="email">Masukan Email</label>
                    <input type="email" id="email" name="email">
                </li>
                <li>
                    <label for="password">Masukan Password</label>
                    <input type="password" id="password" name="password">
                </li>
                <button type="submit" name="submit">Login</button>
            </form>
        </div>
    </div>
</body>

</html>