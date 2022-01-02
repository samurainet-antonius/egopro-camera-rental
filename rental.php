<?php
require 'vendor/autoload.php';
require_once 'config/koneksi.php';

$products=array();

$query = $koneksi->query("SELECT * FROM produk ORDER BY id_produk DESC LIMIT 3");
while($sql = $query->fetch_assoc()){
  $products[] = $sql;
}
$rental = array();
if(isset($_SESSION['rental'])){
    $rental = array();
    foreach ($_SESSION['rental'] as $produkID => $isi) {
        $query = $koneksi->query("SELECT * FROM produk WHERE id_produk='$produkID'");
        $detail = $query->fetch_assoc();
        $detail['qty'] = $isi['qty'];
        $detail['durasi'] = $isi['durasi'];
        $detail['subtotal'] = $isi['durasi']*($detail['harga_produk']*$isi['qty']);
        $rental[] = $detail;
    }
}

if(isset($_GET['produk'])){
  unset($_SESSION['rental'][$_GET['produk']]);
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
            <p>Egopro Jogja merupakan tempat persewaan kamera di jogja yang menyediakan berbagai pilihan kamera 
                Mirorrless, Dslr, Lensa Camera, Action Cam, 360 degree camera dan berbagai macam accessories 
                Action Camera ada untuk kebutuhan Fotografi dan Videografi.
            </p>
            <div class="mt-4">
              <a href="explore.php" class="white-btn mt-4">Explore Egopro <i class="fas fa-angle-right ps-3"></i></a>
            </div>
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
              <h2>Keranjang Rental</h2>
             </div>
           </div>
         </div>
         <div class="row pt-5">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Qty</th>
                        <th>Harga Sewa/hari</th>
                        <th>Durasi</th>
                        <th>Sub Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($rental as $key => $per_produk): ?>
                        <tr>
                            <td><?= $key+1; ?></td>
                            <td><?= $per_produk['nama_produk']; ?></td>
                            <td><?= $per_produk['qty']; ?></td>
                            <td>Rp <?= number_format($per_produk['harga_produk'],0,",","."); ?></td>
                            <td><?= $per_produk['durasi']; ?> hari</td>
                            <td>Rp <?= number_format($per_produk['subtotal'],0,",","."); ?></td>
                            <td>
                                <a onclick="return confirm('Apakah anda yakin ?')" href="rental.php?produk=<?= $per_produk['id_produk']; ?>" class="text-red"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <br/>
            <div class="clearfix mt-3">
                <a href="explore.php" class="float-left white-btn">Other</a>
                <a href="checkout.php" class="float-right white-btn">Checkout</a>
            </div>
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