<?php
require_once 'config/koneksi.php';
if(!isset($_SESSION['member']) || empty($_SESSION['member'])){
    echo "<script>location='login.php';</script>";
}

$id_pelanggan = $_SESSION['member']['id_pelanggan'];
$query = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$id_pelanggan'");
$profil = $query->fetch_assoc();

if(isset($_POST['edit'])){

    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $no_wa = $_POST['no_wa'];
    $sosial_media = $_POST['sosial_media'];

    $koneksi->query("UPDATE pelanggan SET nama='$nama', alamat='$alamat', no_hp='$no_hp',no_wa='$no_wa',sosial_media='$sosial_media' WHERE id_pelanggan='$id_pelanggan'");
    echo "<script>alert('Profil berhasil diedit');location='profil.php';</script>";
}

if(isset($_POST['edit_password'])){

    $password_lama = sha1($_POST['password_lama']);
    $password = sha1($_POST['password']);
    
    $query = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$id_pelanggan' AND password='$password_lama'");

    if($query->num_rows == 1){
        $koneksi->query("UPDATE pelanggan SET password='$password' WHERE id_pelanggan='$id_pelanggan'");
        echo "<script>alert('Password berhasil diedit');location='profil.php';</script>";
    }else{
        echo "<script>alert('Password lama tidak sesuai');location='profil.php';</script>";
    }
}

$idPelanggan = $_SESSION['member']['id_pelanggan'];
$result=array();
$query = $koneksi->query("SELECT * FROM sewa WHERE id_pelanggan='$idPelanggan' ORDER BY tgl_sewa DESC");
while($row = $query->fetch_assoc()){
    $result [] =$row;
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
              <h2>Account</h2>
           </div>
         </div>
         <div class="row pt-5">
             <div class="col col-md-3">
                <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action active" id="list-home-list" data-bs-toggle="list" href="#list-home" role="tab" aria-controls="list-home">Profile</a>
                    <a class="list-group-item list-group-item-action" id="list-profile-list" data-bs-toggle="list" href="#list-profile" role="tab" aria-controls="list-profile">Rental</a>
                    <a class="list-group-item list-group-item-action" id="list-settings-list" data-bs-toggle="list" href="#list-settings" role="tab" aria-controls="list-settings">Settings</a>
                </div>
             </div>
             <div class="col col-md-9">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                        <form method="POST">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" required class="form-control" name="nama" value="<?php echo $profil['nama']; ?>">
                            </div>
                            <div class="form-group mt-4">
                                <label>Email</label>
                                <input type="email" class="form-control" value="<?php echo $profil['email']; ?>" readonly>
                            </div>
                            <div class="form-group mt-4">
                                <label>Alamat</label>
                                <textarea name="alamat" required class="form-control"><?php echo $profil['alamat']; ?></textarea>
                            </div>
                            <div class="row">
                                <div class="col col-md-4">
                                    <div class="form-group mt-4">
                                        <label>No. HP</label>
                                        <input type="text" required class="form-control" name="no_hp" value="<?php echo $profil['no_hp']; ?>">
                                    </div>
                                </div>

                                <div class="col col-md-4">
                                    <div class="form-group mt-4">
                                        <label>No. Whatsapp</label>
                                        <input type="text" required class="form-control" name="no_wa" value="<?php echo $profil['no_wa']; ?>">
                                    </div>
                                </div>

                                <div class="col col-md-4">
                                    <div class="form-group mt-4">
                                        <label>Social Media</label>
                                        <input type="text" class="form-control" name="sosial_media" value="<?php echo $profil['sosial_media']; ?>">
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <button class="main-btn" name="edit">Edit</button>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                        <h4>Riwayat Rental</h4>
                        <hr/>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Invoice</th>
                                        <th>Nama Peminjam</th>
                                        <th>Jaminan</th>
                                        <th>Tgl. Sewa</th>
                                        <th>Total Barang</th>
                                        <th>Total Harga</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($result as $key => $per_sewa): ?>
                                        <tr>
                                            <td><?= $key+1; ?></td>
                                            <td><?= $per_sewa['no_sewa']; ?></td>
                                            <td><?= $per_sewa['nama_peminjam']; ?></td>
                                            <td>
                                                <?= $per_sewa['jaminan']; ?>
                                                <br/>
                                                <a href="assets/dokumen/<?php echo $per_sewa['file_jaminan']; ?>" target="_blank">Download</a>
                                            </td>
                                            <td><?= date("d M Y",strtotime($per_sewa['tgl_sewa'])); ?></td>
                                            <td><?= $per_sewa['total_produk']; ?></td>
                                            <td>Rp <?= number_format($per_sewa['total_harga'],0,",","."); ?></td>
                                            <td><?= $per_sewa['status_pembayaran']; ?></td>
                                            <td>
                                                <a href="nota.php?no=<?= $per_sewa['no_sewa'] ?>" class="btn btn-info btn-sm text-white">Nota</a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
                    <form method="POST">
                            <div class="form-group">
                                <label>Password Lama</label>
                                <input type="password" class="form-control" name="password_lama" required>
                            </div>
                            <div class="form-group mt-4">
                                <label>Password Baru</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                            <br/>
                            <button class="main-btn" name="edit_password">Edit</button>
                        </form>
                    </div>
                </div>
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