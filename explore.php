<?php
require_once 'config/koneksi.php';

$products=array();
if(isset($_GET['q'])){
  $q = $_GET['q'];
  $query = $koneksi->query("SELECT * FROM produk WHERE nama_produk LIKE '%$q%' ORDER BY id_produk DESC");
  while($sql = $query->fetch_assoc()){
    $products[] = $sql;
  }
}else{
  $query = $koneksi->query("SELECT * FROM produk ORDER BY id_produk DESC");
  while($sql = $query->fetch_assoc()){
    $products[] = $sql;
  }
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
        </div>
    </section>
   


  <!-- section-4 explore food-->
   <section id="explore-food">
     <div class="explore-food wrapper">
       <div class="container">
         <div class="row">
           <div class="col-sm-12">
             <div class="text-content text-center">
              <h2>Explore Our Products</h2>
           </div>
         </div>
         <div class="row">
           <div class="col-md-12">
             <form method="GET">
               <div class="form-group mb-2">
                 <input type="text" class="form-control" placeholder="Search name products..." name="q">
               </div>
               <button class="white-btn">Search</button>
             </form>
           </div>
         </div>
         <div class="row pt-5">

          <?php foreach($products as $per_produk): ?>
           <div class="col-lg-3 col-md-6 mb-lg-0 mb-5 mt-5">
             <div class="card">
               <img src="assets/img/produk/<?php echo $per_produk['foto_produk1'] ?>" class="img-fluid">
               <div class="pt-3">
                <h4><?php echo $per_produk['nama_produk']; ?></h4>
                <div class="desc-product">
                    <?php echo substr($per_produk['deskripsi_produk'],0,80); ?>
                    <hr/>
                    <p>
                      <b>Stok : <?php echo $per_produk['stok_produk']; ?></b>
                    </p>
                </div>
                <span>Rp <?php echo number_format($per_produk['harga_produk'],"0",",","."); ?></span>
                <?php if($per_produk['stok_produk'] < 1): ?>
                  <div class="mt-4 alert alert-danger">Stok produk sedang kosong.</div>
                <?php else: ?>
                  <a href="order.php?produk=<?= $per_produk['id_produk']; ?>" class="mt-4 main-btn">Rental Now</a>
                <?php endif ?>
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