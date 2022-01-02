<?php
require 'vendor/autoload.php';
require_once 'config/koneksi.php';

if(!isset($_SESSION['member'])){
    echo "<script>alert('Anda harus login terlebih dahulu');location='login.php';</script>";
    exit();
}
$idSewa = $_GET['no'];
$idPelanggan = $_SESSION['member']['id_pelanggan'];

$query = $koneksi->query("SELECT * FROM sewa WHERE id_sewa='$idSewa' AND id_pelanggan='$idPelanggan'");
$sewa = $query->fetch_assoc();

if(empty($sewa)){
    header("location: profil.php");
}

$result=array();

$query = $koneksi->query("SELECT * FROM detail_sewa WHERE id_sewa='$idSewa'");
while($row = $query->fetch_assoc()){
    $result [] =$row;
}

$query = $koneksi->query("SELECT * FROM api_midtrans WHERE invoice='$idSewa'");
$apiMidtrans = $query->fetch_assoc();

$payment = json_decode($apiMidtrans['payload'],true);
if(array_key_exists("va_numbers",$payment)){
  $bank = strtoupper($payment['va_numbers'][0]['bank']);
  $vaNumber = $payment['va_numbers'][0]['va_number'];
}else if(array_key_exists("permata_va_number",$payment)){
  $bank = 'Permata';
  $vaNumber = $payment['permata_va_number'];
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
           <div class="col-sm-6">
             <div class="text-left">
                 <h4><?= $sewa['nama_peminjam']; ?></h4>
                 <p><?= $sewa['alamat_peminjam']; ?></p>
             </div>
           </div>
           <div class="col-sm-6">
            <div style="text-align:right">
                <div class="row">
                    <div class="col-md-9">
                        <h4>Egopro Jogja</h4>
                        <p>Jl, Candrakirana No, 14 <br/>
                        Sagan, Terban, Yogyakarta <br/>    
                        Yogyakarta 55223 @egopro
                        </p>
                        <p>
                            08570-2222-111 <br/>
                            egoprojogja@gmail.com
                        </p>
                    </div>
                    <div class="col-md-3">
                        <img src="assets/img/logo/logo.png" alt="">
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-10">
                            <p>Start : <?= date("d M Y",strtotime($sewa['tanggal_mulai_sewa'])); ?></p>
                            <p>Stop : <?= date("d M Y",strtotime($sewa['tanggal_selesai_sewa'])); ?></p>
                    </div>
                </div>
             </div>
           </div>
         </div>
         <div class="pt-5">
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
                    <?php foreach($result as $key => $per_produk): ?>
                        <tr>
                            <td><?= $key+1; ?></td>
                            <td><?= $per_produk['produk']; ?></td>
                            <td><?= $per_produk['jumlah']; ?></td>
                            <td>Rp <?= number_format($per_produk['harga'],0,",","."); ?></td>
                            <td><?= $per_produk['durasi_peminjaman']; ?> hari</td>
                            <td>Rp <?= number_format($per_produk['sub_total'],0,",","."); ?></td>

                        </tr>
                    <?php endforeach ?>
                </tbody>
                <tfoot>
                    <th colspan="5">Total</th>
                    <td>Rp <?= number_format($sewa['total_harga'],0,",","."); ?></td>
                </tfoot>
            </table>
         </div>
         <?php if($sewa['status_pembayaran'] == "Belum Lunas"): ?>
          <div class="row">
             <div class="col-md-8">
                 <div class="alert alert-info">
                    <p>Silahkan Melakukan Pembayaran <strong>Rp. <?php echo number_format($sewa['total_harga'],0,",","."); ?></strong> ke: 
                        <br> Bank: <strong><?php echo  $bank; ?></strong>
                        <br> Virtual Account Number: <strong> <?php echo $vaNumber; ?></strong>
                    </p>
                    <div class="" name="deadline_sewa" id="timer" value="<?php echo $sewa['deadline_sewa'] ?>" >
                        Daedline Bayar: <strong><?php echo date("d/M/Y H:i:s",strtotime($sewa['deadline_sewa'])) ?> </strong>
                    </div>
                    <br>
                    <p id="deadline"></p>
                 </div>
             </div>
         </div>
          <?php endif ?>
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
  <?php if($sewa['status_pembayaran']=="Belum Lunas" || $sewa['status_pembayaran']=="belum lunas"): ?>
					<script>
				// Set the date we're counting down to
				var countDownDate = new Date("<?php echo $sewa['deadline_sewa'] ?>").getTime();

				// Update the count down every 1 second
				var x = setInterval(function() {

				  // Get today's date and time
				  var now = new Date().getTime();

				  // Find the distance between now and the count down date
				  var distance = countDownDate - now;

				  // Time calculations for days, hours, minutes and seconds
				  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
				  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
				  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
				  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

				  // Output the result in an element with id="demo"
				  // document.getElementById("demo").innerHTML = days + "d " + hours + "h "
				  // + minutes + "m " + seconds + "s "; 
				  /** Jika waktu kurang dari 10 menit maka Timer akan berubah menjadi warna merah */
				  
				  document.getElementById("deadline").innerHTML = '<h1 align="center">Sisa waktu Pembayaran <br />'+ days + ' hari : ' + hours + ' jam : ' + minutes + ' menit : ' + seconds + ' detik</h1><hr>';


				  // If the count down is over, write some text 
				  if (distance < 0) {
				  	clearInterval(x);
				  	document.getElementById("deadline").innerHTML ='<h1 align="center">Waktu Pembayaran telah habis <br /></h1><hr>';
				  }
				}, 1000);
			</script>
		<?php endif ?>
    <script src="assets/js/payment.js"></script>
    <script src="assets/js/main.js"></script>
  </body>
</html>