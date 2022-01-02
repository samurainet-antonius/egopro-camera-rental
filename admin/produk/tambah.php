<?php

$semua_merk = array();
$queryMerk = $koneksi->query("SELECT * FROM merk");
while($per_merk = $queryMerk->fetch_assoc()){
    $semua_merk[] = $per_merk;
}

$semua_jenis = array();
$queryJenis = $koneksi->query("SELECT * FROM jenis JOIN kategori ON jenis.id_kategori=kategori.id_kategori");
while($per_jenis = $queryJenis->fetch_assoc()){
    $semua_jenis[] = $per_jenis;
}

?>
<h1>Tambah Produk</h1>
<hr/>
<form method="POST" enctype="multipart/form-data">
<div class="form-group">
    <label>Merk</label>
    <select name="id_merk" class="form-control">
    <option value="">-Pilih Merk-</option>
    <?php foreach($semua_merk as $key => $per_merk):?>
        <option value="<?php echo $per_merk['id_merk'] ?>"><?php echo $per_merk
        ['nama_merk']; ?></option>
    <?php endforeach ?>
</select>
</div>

<div class="form-group">
    <label>Jenis</label>
    <select name="id_jenis" class="form-control" required>
    <option value="">-Pilih Jenis-</option>
    <?php foreach($semua_jenis as $key => $per_jenis):?>
        <option value="<?php echo $per_jenis['id_jenis'] ?>"><?php echo $per_jenis['nama_kategori']." - ".$per_jenis
        ['nama_jenis']; ?></option>
    <?php endforeach ?>
</select>
</div>

<div class="form-group">
    <label>Nama Produk</label>
    <input type="text" name="nama_produk" class="form-control" required>
</div>

<div class="form-group">
    <label>Harga</label>
    <input type="text" name="harga_produk" class="form-control" required>
</div>

<div class="form-group">
    <label>Stok</label>
    <input type="text" name="stok_produk" class="form-control" required>
</div>

<div class="form-group">
    <label>Gambar 1</label>
    <input type="file" name="foto_produk1" class="form-control" required>
</div>

<div class="form-group">
    <label>Gambar 2</label>
    <input type="file" name="foto_produk2" class="form-control" required>
</div>

<div class="form-group">
    <label>Deskripsi</label>
    <textarea name="deskripsi_produk" class="form-control" required></textarea>
</div>
<button name="simpan" class="btn btn-primary btn-sm">Simpan</button>
</form>

<?php
if(isset($_POST['simpan'])){

    $id_merk = $_POST['id_merk'];

    $id_jenis = $_POST['id_jenis'];

    $nama_produk = $_POST['nama_produk'];

    $harga_produk = $_POST['harga_produk'];

    $stok_produk = $_POST['stok_produk'];

    $deskripsi_produk = $_POST['deskripsi_produk'];

    //mengambil data foto_produk1 menggunakan perintah $_FILES
    $foto_produk1 = $_FILES['foto_produk1'];

    //mengambil lokasi file foto_produk1
    $lokasi_foto_produk1 = $foto_produk1['tmp_name'];

    //mengambil nama file foto_produk1
    $nama_foto_produk1 = date('YmdHis').$foto_produk1['name'];

    //upload foto_produk1 ke folder assets/img/produk/
    move_uploaded_file($lokasi_foto_produk1,"../assets/img/produk/".$nama_foto_produk1);

    $koneksi-> query("INSERT INTO produk (id_merk, id_jenis, nama_produk, harga_produk,stok_produk, deskripsi_produk, foto_produk1) VALUES ('$id_merk', '$id_jenis','$nama_produk','$harga_produk','$stok_produk','$deskripsi_produk','$nama_foto_produk1')")or die(mysqli_error($koneksi));

    echo "<script>alert('Data produk telah di tambahkan');location='index.php?page=produk';</script>";

}

?>