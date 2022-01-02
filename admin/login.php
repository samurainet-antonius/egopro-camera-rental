<?php
require_once '../config/koneksi.php';
//jika ada session admin maka
if(isset($_SESSION['admin'])){
    //dikembalikan ke halaman admin
    echo "<script>location='index.php';</script>"; 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin</title>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- icon -->
    <link rel="shortcut icon" href="https://egoprojogja.com/storage/app/public/img/favicon20171116074639.ico?v=8" type="image/
    x-icon" />
</head>
<body style="padding-top: 170px;">
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-md-offset-3" style="padding:20px 30px;border:1px solid #333;">
                <h1>Login</h1>
                 <form method="POST">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username">
                     </div>
                     <div class="form-group">
                         <label>Password</label>
                         <input type="password" class="form-control" name="password">
                     </div>
                     <button class="btn btn-primary btn-sm" name="login">Login</button>
                </form>
            </div>
        </div>
    </div>
<?php
if(isset($_POST['login'])){
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    //menecnrypt password
    $password_encrypt = sha1($password);

    $query = $koneksi->query("SELECT * FROM admin WHERE username='$username' AND password='$password_encrypt'");
    
    if($query->num_rows == 1){
        $dataAdmin = $query->fetch_assoc();

        // session merupakan tempat menyimpan data pada browser 
        $_SESSION['admin'] = $dataAdmin;
        echo "<script>alert('Anda berhasil login. ');location='index.php';</script>";
    }else{
        echo "<script>alert('Anda gagal login. ');location='login.php';</script>";

    }

    }
?>
</body>
</html>