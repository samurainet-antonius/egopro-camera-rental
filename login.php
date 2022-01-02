<?php
require_once 'config/koneksi.php';
if(isset($_SESSION['member']) || !empty($_SESSION['member'])){
  echo "<script>location='profil.php';</script>";
}

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
              <h2>Login</h2>
           </div>
         </div>
         <div class="row pt-5">
            <div class="col col-md-5 offset-4 justify-content-center">
                <form method="POST">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>

                    <div class="form-group mt-4">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>

                    <button name="login" class="main-btn mt-4">Login</button>
                </form>
            </div>
         </div>
       </div>
     </div>
   </section>
   <?php
   if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = sha1($_POST['password']);

    $query = $koneksi->query("SELECT * FROM pelanggan WHERE email='$email' AND password='$password' AND status='1'");

    if($query->num_rows == 1){

        $_SESSION['member'] = $query->fetch_assoc();
        echo "<script>alert('Berhasil login');location='profil.php';</script>";
    }else{
        echo "<script>alert('Gagal login');location='login.php';</script>";
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
</body>
</html>