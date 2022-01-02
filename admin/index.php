<?php

//memanggil file koneksi yg ada didlm folder config
require_once '../config/koneksi.php';

//jika tidak ada session admin maka
if(!isset($_SESSION['admin'])){
    echo "<script>location='login.php';</script>";
}

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">

  <title>Egopro | Admin</title>

  <!-- Bootstrap CSS CDN -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- icon -->
  <link rel="shortcut icon" href="https://egoprojogja.com/storage/app/public/img/favicon20171116074639.ico?v=8" type="image/x-icon" />
  <!-- Our Custom CSS -->
  <link rel="stylesheet" href="../assets/css/style-admin.css">
  <!-- Scrollbar Custom CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap.min.css">
</head>

<body>



  <div class="wrapper">
    <!-- Sidebar Holder -->
    <nav id="sidebar">
      <div class="sidebar-header">
        <h3>Egopro Jogja </h3>
        </h3>
      </div>

      <ul class="list-unstyled">
        <p>Menu</p>
        <li class="active">
          <a href="#index.php">Home</a>
        </li>
        <li>
          <a href="index.php?page=merk">Merk</a>
        </li>
        <li>
          <a href="index.php?page=kategori">Kategori</a>
        </li>
        <li>
          <a href="index.php?page=jenis">Jenis</a>
        </li>
        <li>
          <a href="index.php?page=produk">Produk</a>
        </li>
        <li>
          <a href="index.php?page=pelanggan">Pelanggan</a>
        </li>
        <li>
          <a href="index.php?page=persewaan">Persewaan</a>
        </li>
        <li style="padding:10px;">
          <a href="index.php?page=logout" class="btn btn-primary">Keluar</a>
        </li>
      </ul>


    </nav>

    <!-- Page Content Holder -->
    <div id="content">

      <nav class="navbar navbar-default">
        <div class="container-fluid">

          <div class="navbar-header">
            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                                <i class="glyphicon glyphicon-align-left"></i>
                                <span></span>
                            </button>
          </div>
        </div>
      </nav>

      <!-- main -->
    <main>
        <?php
            //jika ada parameter page diurl maka 
            if(isset($_GET['page'])){

                if($_GET['page'] == 'merk'){
                    require_once 'merk/tampil.php';
                }

                else if($_GET['page'] == "tambah_merk"){
                    require_once 'merk/tambah.php';
                }

                else if($_GET['page'] == "hapus_merk"){
                    require_once 'merk/hapus.php';
                }

                else if($_GET['page'] == "edit_merk"){
                    require_once 'merk/edit.php';
                }

                //jika isi atau nilai dari page samadengan kategori maka 
                if($_GET['page']== 'kategori'){
                    //memanggil file tampil yg ada didalam folder kategori
                    require_once 'kategori/tampil.php';
                }

                else if($_GET['page'] == "tambah_kategori"){
                    //memanggil file tambah.php yang letaknya ada di folder kategori
                    require_once 'kategori/tambah.php';
                }

                else if($_GET['page']== "hapus_kategori") {
                    require_once 'kategori/hapus.php';
                }

                else if($_GET['page']== "edit_kategori") {
                    require_once 'kategori/edit.php';
                }

                //jika isi atau nilai dari page samadengan kategori maka 
                if($_GET['page']== 'jenis'){
                    //memanggil file tampil yg ada didalam folder jenis
                    require_once 'jenis/tampil.php';
                }

                else if($_GET['page'] == "tambah_jenis"){
                    //memanggil file tambah.php yang letaknya ada di folder jenis
                    require_once 'jenis/tambah.php';
                }

                else if($_GET['page']== "hapus_jenis") {
                    require_once 'jenis/hapus.php';
                }

                else if($_GET['page']== "edit_jenis") {
                    require_once 'jenis/edit.php';
                }

                //selain itu jika nilai atau isi dari page samadengan produk maka
                else if($_GET['page']== 'produk'){
                    //memanggil file tampil yg ada didalam folder produk 
                    require_once 'produk/tampil.php';
                }

                else if($_GET['page'] == "tambah_produk"){
                    require_once 'produk/tambah.php';
                }

                else if($_GET['page'] == "hapus_produk"){
                  require_once 'produk/hapus.php';
              }
                
                else if($_GET['page'] == "edit_produk"){
                    require_once 'produk/edit.php';
                }
                else if($_GET['page'] == "logout"){
                    //menghapus session
                    session_destroy();
                    echo "<script>location='login.php';</script>";
                }

                else if($_GET['page'] == "pelanggan"){
                    require_once 'pelanggan/tampil.php';
                }
                else if($_GET['page'] == "tambah_pelanggan"){
                    require_once 'pelanggan/tambah.php';
                }
                else if($_GET['page'] == "edit_pelanggan"){
                    require_once 'pelanggan/edit.php';
                }
                else if($_GET['page'] == "hapus_pelanggan"){
                    require_once 'pelanggan/hapus.php';
                }

                else if($_GET['page'] == "persewaan"){
                    require_once 'persewaan/tampil.php';
                }
                else if($_GET['page'] == "nota"){
                  require_once 'persewaan/nota.php';
                }

                else if($_GET['page'] == "profil"){
                    require_once 'profil.php';
                }

                else if($_GET['page'] == "edit_profil"){
                    require_once 'edit_profil.php';
                }
            }
        ?>
    </main>
    <!-- main -->


    </div>
  </div>





  <!-- jQuery CDN -->
  <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
  <!-- Bootstrap Js CDN -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- jQuery Custom Scroller CDN -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap.min.js"></script>
  <script src="../assets/js/admin-payment.js"></script>
  <script>
    $(document).ready(function() {
    $('.table').DataTable();
} );
  </script>
  <script type="text/javascript">
    $(document).ready(function() {


      $('#sidebarCollapse').on('click', function() {
        $('#sidebar, #content').toggleClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
      });
    });
  </script>
</body>

</html>