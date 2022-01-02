<?php
require 'vendor/autoload.php';
require_once 'config/koneksi.php';

$products=array();

$query = $koneksi->query("SELECT * FROM produk ORDER BY id_produk DESC LIMIT 3");
while($sql = $query->fetch_assoc()){
  $products[] = $sql;
}

$produkID = $_GET['produk'];
$query = $koneksi->query("SELECT * FROM produk WHERE id_produk='$produkID'");
$detail = $query->fetch_assoc();


if(isset($_POST['rental'])){
    if(isset($_SESSION['rental'][$produkID])){
        $_SESSION['rental'][$produkID]['durasi'] = $_POST['durasi'];
        $_SESSION['rental'][$produkID]['qty'] += $_POST['qty'];
    }else{
        $_SESSION['rental'][$produkID]['durasi'] = $_POST['durasi'];
        $_SESSION['rental'][$produkID]['qty'] = $_POST['qty'];
    }

    echo "<script>location='rental.php';</script>";
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
   
  <!-- section-1 top-banner -->
  <section id="home">
    <div class="container-fluid px-0 top-banner">
      <div class="container">
        <div class="row">
          <div class="col-lg-5 col-md-6">
            <h1>Egopro Jogja | Persewaan Alat Fotografi dan Videografi</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et purus a odio finibus bibendum amet leo.
            </p>
            <div class="mt-4">
              <a href="explore.php" class="white-btn mt-4">Explore Egopro <i class="fas fa-angle-right ps-3"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  
  <!-- section-3 about-->
  <section id="about">
     <div class="about-section wrapper">
       <div class="container food-type">
         <div class="row align-items-center">
           <div class="col-lg-5 col-md-12 mb-lg-0 mb-5">
             <div class="card border-0">
               <img src="assets/img/produk/<?php echo $detail['foto_produk1'] ?>" class="img-fluid">
             </div>
           </div>
           <div class="col-lg-7 col-md-12 text-sec">
            <h2><?= $detail['nama_produk'] ?>.</h2>
            <div class="mt-3 mb-3">
                <h4>Stok : <?= $detail['stok_produk']; ?></h4>
                <h3 class="text-red">Rp. <?= number_format($detail['harga_produk'],"0",",","."); ?>/Hari</h3>
            </div>
            <?php if($detail['stok_produk'] < 1): ?>
              <div class="alert alert-info">Mohon maaf stok sedang tidak tersedia. silahkan pilih produk <a href="explore.php">Lainnya</a></div>
            <?php else: ?>
              <form method="POST">
                  <div class="form-group">
                      <label>Qty</label>
                      <input type="number" name="qty" class="form-control" min="1" max="<?= $detail['stok_produk']; ?>">
                  </div>
                  <div class="form-group mt-3">
                      <label>Durasi (Hari)</label>
                      <input type="number" name="durasi" class="form-control" min="1">
                  </div>
                  <button name="rental" class="main-btn mt-4">Rental Now</button>
              </form>
            <?php endif ?>
           </div>
         </div>
         <div class="row mt-3">
             <div class="col-md-12">
                <h2><?= $detail['nama_produk'] ?>.</h2>
                <?= $detail['deskripsi_produk'] ?>
             </div>
         </div>
       </div>
     </div>
   </section>

  <!-- section-4 explore food-->
   <section id="explore-food">
     <div class="explore-food wrapper">
       <div class="container">
         <div class="row">
           <div class="col-sm-12">
             <div class="text-content text-center">
              <h2>Explore Our Egopro</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et purus a odio finibus bibendum in sit
                amet leo. Mauris feugiat erat tellus. Far far away, behind the word mountains, far from the countries
                Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove.</p>
             </div>
           </div>
         </div>
         <div class="row pt-5">

          <?php foreach($products as $per_produk): ?>
           <div class="col-lg-4 col-md-6 mb-lg-0 mb-5">
             <div class="card">
               <img src="assets/img/produk/<?php echo $per_produk['foto_produk1'] ?>" class="img-fluid">
               <div class="pt-3">
                <h4><?php echo $per_produk['nama_produk']; ?></h4>
                <?php echo substr($per_produk['deskripsi_produk'],0,80); ?>
                <span>Rp <?php echo number_format($per_produk['harga_produk'],"0",",","."); ?></span>
                <a href="order.php?produk=<?= $per_produk['id_produk']; ?>" class="mt-4 main-btn">Order Now</a>
              </div>
             </div>
           </div>
           <?php endforeach ?>

         </div>
       </div>
     </div>
   </section>



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