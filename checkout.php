<?php
require 'vendor/autoload.php';
require_once 'config/koneksi.php';


if(!isset($_SESSION['member'])){
    echo "<script>alert('Anda harus login terlebih dahulu');location='login.php';</script>";
    exit();
}

if(!isset($_SESSION['rental'])){
  echo "<script>alert('Anda harus memilih produk terlebih dahulu');location='explore.php';</script>";
  exit();
}


$idPelanggan = $_SESSION['member']['id_pelanggan'];

$querySQL = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$idPelanggan'");
$member = $querySQL->fetch_assoc();

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
        
        if($detail['stok_produk'] <= 0){
            echo "<script>alert('Produk ".$detail['nama_produk']." sudah tidak ada stok');</script>";
            unset($_SESSION['rental']);
        }
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
  <!-- <section id="home">
    <div class="container-fluid px-0 top-banner">
      <div class="container">
        <div class="row">
          <div class="col-lg-5 col-md-6">
            <h1>Good food choices are good investments.</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et purus a odio finibus bibendum amet leo.
            </p>
            <div class="mt-4">
              <a href="explore.php" class="white-btn mt-4">Explore Egopro <i class="fas fa-angle-right ps-3"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> -->

  <!-- section-4 explore food-->
   <section id="explore-food">
     <div class="explore-food wrapper">
       <div class="container">
         <div class="row">
           <div class="col-sm-12">
             <div class="text-content text-center">
              <h2>Checkout Rental</h2>
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
                    </tr>
                </thead>
                <tbody>
                    <?php $total=0; ?>
                    <?php foreach($rental as $key => $per_produk): ?>
                        <?php $total+=$per_produk['subtotal']; ?>
                        <tr>
                            <td><?= $key+1; ?></td>
                            <td><?= $per_produk['nama_produk']; ?></td>
                            <td><?= $per_produk['qty']; ?></td>
                            <td>Rp <?= number_format($per_produk['harga_produk'],0,",","."); ?></td>
                            <td><?= $per_produk['durasi']; ?> hari</td>
                            <td>Rp <?= number_format($per_produk['subtotal'],0,",","."); ?></td>

                        </tr>
                    <?php endforeach ?>
                </tbody>
                <tfoot>
                    <th colspan="5">Total</th>
                    <td>Rp <?= number_format($total,0,",","."); ?></td>
                </tfoot>
            </table>
            <form method="POST" enctype="multipart/form-data">
                <input type="hidden" value="<?= $total; ?>" name="total" required>
                <div class="form-group mt-2 mb-4">
                  <label>Nama Peminjam</label>
                  <input type="text" class="form-control" name="nama_peminjam" required value="<?php echo $member['nama']; ?>">
                </div>
                <div class="form-group mt-4 mb-4">
                  <label>Alamat Peminjam</label>
                  <textarea class="form-control" name="alamat_peminjam" required><?php echo $member['alamat']; ?></textarea>
                </div>
                <div class="form-group mt-4 mb-4">
                    <label>Jaminan</label>
                    <select name="jaminan" class="form-control" required>
                      <option value="">- Pilih Jaminan -</option>
                      <option value="KTP">KTP</option>
                      <option value="Kartu Pelajar/Mahasiswa">Kartu Pelajar/Mahasiswa</option>
                      <option value="SIM A">SIM A</option>
                      <option value="SIM B">SIM B</option>
                      <option value="SIM C">SIM C</option>
                    </select>
                </div>

                <div class="form-group mt-4 mb-4">
                    <label>File Jaminan</label>
                    <input type="file" class="form-control" name="file_jaminan" required>
                </div>
                <button class="main-btn" id="pay-button" name="payment">Checkout</button>
            </form>
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
  <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-mGmpg_QkWVReWrpE"></script>
  <?php
  if(isset($_POST['payment'])){
    $invoice = date("Ymdhis");
    
    $rental = array();
    foreach ($_SESSION['rental'] as $produkID => $isi) {
        
        $query = $koneksi->query("SELECT * FROM produk WHERE id_produk='$produkID'");
        $detail = $query->fetch_assoc();
        
        if($detail['stok_produk'] <= 0){
            echo "<script>alert('Produk ".$detail['nama_produk']." sudah tidak ada stok');</script>";
            unset($_SESSION['rental']);
        }
    }


    if(!isset($_SESSION['rental'])){
        echo "<script>location='explore.php';</script>";    
    }
    
    $file = $_FILES['file_jaminan'];
    $file_jaminan = time().$file['name'];
    move_uploaded_file($file['tmp_name'],"assets/dokumen/".$file_jaminan);
    $_SESSION['sewa']['nama_peminjam'] = $_POST['nama_peminjam'];
    $_SESSION['sewa']['alamat_peminjam'] = $_POST['alamat_peminjam'];
    $_SESSION['sewa']['jaminan'] = $_POST['jaminan'];
    $_SESSION['sewa']['file_jaminan'] = $file_jaminan;
    $snapToken = addToMidtrans($_POST['total'],$invoice);   
    ?>
  <script type="text/javascript">
            // document.getElementById('pay-button').onclick = function(){
                // SnapToken acquired from previous step
                snap.pay('<?php echo $snapToken?>', {
                    // Optional
                    onSuccess: function(result){
                        console.log('success'+result);  
                    },
                    // Optional
                    onPending: function(result){
                        // console.log('pending'+result);
                        $.ajax({
                            url:'ajax/bayar.php',
                            method:'POST',
                            dataType:'json',
                            data:{result:result},
                            success: function(data) {
                                  location='nota.php?no=<?= $invoice ?>'
                                
                            },
                            error: function(data) {
                              location='nota.php?no=<?= $invoice ?>'
                            },
                        });
                        
                    },
                    // Optional
                    onError: function(result){
                        
                    }
                });
            // };
    </script>
    <?php } ?>
    <!-- <script src="assets/js/payment.js"></script> -->
    <script src="assets/js/main.js"></script>
</body>
</html>