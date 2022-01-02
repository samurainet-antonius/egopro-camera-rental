<?php
require_once 'config/koneksi.php';
//Load Composer's autoloader
require 'vendor/autoload.php';
require_once 'config/mail.php';
require_once 'config/url.php';
if(isset($_SESSION['member']) || !empty($_SESSION['member'])){
  echo "<script>location='profil.php';</script>";
}

$query = $koneksi->query("SELECT UUID() as uuid")->fetch_assoc();
$kode = $query['uuid'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="Description" content="Enter your description here" />
  <title>EGOPRO | Sewa Kamera Jogja / Jogja sewa kamera / Rental kamera sewa lensa</title>
  <!-- bootstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

  <!-- icon -->
  <link rel="shortcut icon" href="https://egoprojogja.com/storage/app/public/img/favicon20171116074639.ico?v=8" type="image/x-icon" />
 
  <!-- OWN CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/responsive-style.css">
</head>

<body>
  <!-- header design -->
  <?php include 'layouts/header.php'; ?>

  <section id="explore-food">
     <div class="explore-food wrapper">
       <div class="container">
         <div class="row">
           <div class="col-sm-12">
             <div class="text-content text-center">
              <h2>Register</h2>
           </div>
         </div>
         <div class="row pt-5">
            <div class="col col-md-5 offset-4 justify-content-center">
                <form method="POST">
                    <div class="form-group">
                        <label>Nema Lengkap</label>
                        <input type="nama" class="form-control" required name="nama" oninvalid="this.setCustomValidity('Nama harus diisi.')" oninput="setCustomValidity('')">
                    </div>

                    <div class="form-group mt-4">
                        <label>Email</label>
                        <input type="email" class="form-control" required name="email" oninvalid="this.setCustomValidity('Email harus diisi.')" oninput="setCustomValidity('')">
                    </div>

                    <div class="form-group mt-4">
                        <label>Password</label>
                        <input type="password" class="form-control" required name="password" oninvalid="this.setCustomValidity('Password harus diisi.')" oninput="setCustomValidity('')">
                    </div>

                    <!-- <div class="form-group mt-4">
                        <label>Konfirmasi Password</label>
                        <input type="password" class="form-control">
                    </div> -->

                    <button name="register" class="main-btn mt-4">Register</button>
                </form>
            </div>
         </div>
       </div>
     </div>
   </section>
   <?php
   if(isset($_POST['register'])){

        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $password = sha1($_POST['password']);
        $level_pelanggan = 'Regular';

        $query = $koneksi->query("SELECT * FROM pelanggan WHERE email='$email'");

        if($query->num_rows == 1){
            echo "<script>alert('Email sudah terdaftar');location='register.php';</script>";
        }else{

          $body = '<h1>Halo '.$nama.'</h1>';
          $body .= '<p>Selamat anda telah berhasil melakukan pendaftaran pada website <a href="https://egopro.com">Egopro</a> <br/> silahkan lakukan aktivasi akun dengan cara menekan link aktivasi dibawah ini.</p>';
          $body .= '<a href="'.$base_url.'aktivasi.php?kode='.$kode.'">Aktivasi Akun</a>';

            $check = sendMail('Pendaftaran Member',$email,$nama, $body);
            if($check){
              $koneksi->query("INSERT INTO pelanggan (nama, email, password, level_pelanggan,kode_aktivasi)VALUES('$nama','$email','$password', '$level_pelanggan','$kode')")or die(mysqli_error($koneksi));
              echo "<script>alert('Register berhasil dilakukan, silahkan cek email untuk aktivasi akun');location='login.php';</script>";
            }else{
              echo "<script>alert('Register gagal dilakukan');location='register.php';</script>";
            }
        }

   }
   ?>


  <!-- section-9 footer-->
  <?php include 'layouts/footer.php' ?>
   

  <!-- JS Libraries -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"></script>
  <!-- own js -->
  <script src="assets/js/payment.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>