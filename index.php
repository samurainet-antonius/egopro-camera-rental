<?php
require_once 'config/koneksi.php';

$products=array();

$query = $koneksi->query("SELECT * FROM produk WHERE stok_produk > 0 ORDER BY id_produk DESC LIMIT 3");
while($sql = $query->fetch_assoc()){
  $products[] = $sql;
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
            <p>Fotografi identik dengan sebuah kebebasan. Kebebasan untuk melihat, mengambil dan bertanggung-jawab terhadap apa yang kita rekam.
              Abadikan setiap momen yang kita lakukan agar kita mempunyai memori untuk mengingatnya.</p>
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
              <h2>Explore Our Egopro</h2>
              <p>Egopro Jogja merupakan tempat persewaan kamera di jogja yang menyediakan berbagai pilihan kamera 
                Mirorrless, Dslr, Lensa Camera, Action Cam, 360 degree camera dan berbagai macam accessories 
                Action Camera ada untuk kebutuhan Fotografi dan Videografi.</p>
             </div>
           </div>
         </div>
         <div class="row pt-5">

          <?php foreach($products as $per_produk): ?>
            <div class="col-lg-4 col-md-6 mb-lg-0 mb-5 mt-5">
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
                  <div class="mt-4 alert alert-info">Stok produk sedang kosong.</div>
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

  <!-- Section-5 testimonial-->
   <section id="testimonial">
     <div class="wrapper testimonial-section">
       <div class="container text-center">
         <div class="text-center pb-4">
           <h2>Testimonial</h2>
         </div>
         <div class="row">
          <div class="col-sm-12 col-lg-10 offset-lg-1">
            <div id="carouselExampleDark" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                  aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                  aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                  aria-label="Slide 3"></button>
              </div>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <div class="carousel-caption">
                    <img src="images/review/review-1.jpg">
                    <p>yutikalusiamaypula1@gmail.com : 
                      "Sewa kamera disini lengkap banget, apa yang kita butuhkan ada disini. Mulai dari lensa sampai tripod pun ada disini. "</p>
                    <h5>Johnthan Doe - UX Designer</h5>
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="carousel-caption">
                    <img src="images/review/review-2.jpg">
                    <p>hennynur26@gmail.com : 
                      "Mantap banget barang yang aku sewa, gak pernah ngecewain kalo sewa di Egopro Jogja, banyak banget pilihan kamera yang disewakan disana. "</p>
                    <h5>Maccy Doe - Front End</h5>
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="carousel-caption">
                    <img src="images/review/review-1.jpg">
                    <p>ardianvito56@gmail.com : 
                      "Semua barang yang disewakan Egopro semua masih terlihat baru dan bagus, nggak bakaln nyesel setelah menyewa di Egopro Jogja dan bakal jadi langganan. "</p>
                    <h5>Johnthan Doe - UX Designer</h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
       </div>
     </div>
   </section>

  <!-- section-6 faq-->
   <section id="faq">
     <div class="faq wrapper">
       <div class="container">
         <div class="row">
           <div class="col-sm-12">
             <div class="text-center pb-4">
              <h2>Pertanyaan Yang Sering Diajukan</h2>
             </div>
           </div>
         </div>
         <div class="row pt-5">
           <div class="col-sm-6 mb-4">
            <h4><span>~</span>Bagaimana cara mendapatkan foto landscape yang bagus?</h4>
            <p>Cara memotret foto landscape yang mudah adalah dengan mengisolasi elemen yang paling penting dan 
              mewakili dari seluruh elemen yang ada. Fotografi landscape harus berusaha memilih elemen/unsur yang 
              bisa memperkuat POI atau Point Of Interest, kemudian tidak memasukkan elemen lainnya sebagus apapun 
              jika akhirnya hanya memperlemah elemen yang menjadi POI-nya. 
            </p>
           </div>
           <div class="col-sm-6 mb-4">
            <h4><span>~</span>Berapa cara memilih lensa untuk kamera mirrorless?</h4>
            <p>Cermati apa kebutuhan Anda ketika hendak memilih lensa untuk kamera mirrorless. Jangan sampai Anda 
              memilih lensa macro untuk penggunaan wide-angle. Anda harus memperhatikan jenis lensa yang cocok untuk 
              kebutuhan portrait, jarak dekat atau jarak jauh. Kalau tidak mau repot, Anda bisa memilih lensa all-round 
              atau satu lensa kit untuk berbagai kebutuhan sehari-hari.
            </p>
           </div>
           <div class="col-sm-6 mb-4">
            <h4><span>~</span>Bagimana menyesuaikan white balance?</h4>
            <p>Alasan kita menyesuaikan white balance adalah untuk mendapatkan waktu dalam gambar seakurat mungkin. 
              Seringkali mode otomatis cukup bagus, namun itu biasanya bisa salah. kamu dapat mengatur white balance secara manual, biasanya untuk 
              Tungsten, Fluorescent, Cloudy, Flash, dan Shade.
            </p>
           </div>
           <div class="col-sm-6 mb-4">
            <h4><span>~</span>Mengapa tidak boleh menyentuk lensa menggunakan jari?</h4>
            <p>Sidik jari kita akan meninggalkan bekas yang menempel pada optik lensa, hal ini akan menyebabkan lensa kamera menjadi kotor sehingga 
              berisiko dapat mengurangi kualitas tangkapan gambar. Disisi lain, lensa yang kotor akan menyebabkan munculnya jamur pada lensa.
            </p>
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