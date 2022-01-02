<!-- query mengambil produk berdasarkan id yang ada di url -->
<?php
$id_produk = $_GET['id'];

//membuat query 
$query = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
$detail_produk = $query->fetch_assoc();


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
<h1>Edit Produk</h1>
<hr/>
<form method="POST" enctype="multipart/form-data">
<div class="form-group">
    <label>Merk</label>
    <select name="id_merk" class="form-control">
    <option value="">- Pilih Merk -</option>
    <?php foreach($semua_merk as $key => $per_merk): ?>
        <option value="<?php echo $per_merk['id_merk'] ?>" <?php echo ($per_merk
        ['id_merk'] == $detail_produk['id_merk']) ? 'selected' : ''; ?>><?php echo 
        $per_merk['nama_merk']; ?></option>
    <?php endforeach ?>
</select>
</div>

<div class="form-group">
    <label>Jenis Produk</label>
    <select name="id_jenis" class="form-control">
    <option value="">- Pilih Jenis -</option>
    <?php foreach($semua_jenis as $key => $per_jenis): ?>
        <option value="<?php echo $per_jenis['id_jenis'] ?>" <?php echo ($per_jenis
        ['id_jenis'] == $detail_produk['id_jenis']) ? 'selected' : ''; ?>><?php echo 
        $per_jenis['nama_kategori'].'-'.$per_jenis['nama_jenis']; ?></option>
    <?php endforeach ?>
</select>
</div>

<div class="form-group">
    <label>Nama Produk</label>
    <input type="text" name="nama_produk" value="<?php echo $detail_produk['nama_produk']; ?>"
    class="form-control">
</div>

<div class="form-group">
    <label>Harga Produk</label>
    <input type="text" name="harga_produk" value="<?php echo $detail_produk['harga_produk']; ?>"
    class="form-control">
</div>

<div class="form-group">
    <label>Stok Produk</label>
    <input type="text" name="stok_produk" value="<?php echo $detail_produk['stok_produk']; ?>"
    class="form-control">
</div>

<div class="form-group">
    <label>Gambar 1</label>
    <img src="../assets/img/produk/<?php echo $detail_produk['foto_produk1']; ?>" alt="" width="100">
    <br/>
    <input type="file" name="foto_produk1" class="form-control">
</div>

<div class="form-group">
    <label>Gambar 2</label>
    <input type="file" name="foto_produk2" class="form-control">
</div>

<div class="form-group">
    <label>Deskripsi</label>
    <textarea class="form-control" name="deskripsi_produk"><?php echo $detail_produk['deskripsi_produk']; ?></textarea>
</div>
<button name="simpan" class="btn btn-primary btn-sm">Simpan</button>
</form>
<?php

//jika tombol bernama simpan ditekan maka
if(isset($_POST['simpan'])){

    //mengambil isi dari name nama_produk
    $id_merk = $_POST['id_merk'];
    $id_jenis = $_POST['id_jenis'];
    $nama_produk = $_POST['nama_produk'];
    $stok_produk = $_POST['stok_produk'];
    $harga_produk = $_POST['harga_produk'];
    $deskripsi_produk = $_POST['deskripsi_produk'];
    $foto_produk1 = $_FILES['foto_produk1'];
    //jika ada foto yang diubah maka (lokasi foto tidak kosong)
    $lokasi_foto1 =$foto_produk1['tmp_name'];
    $nama_foto1 = date('YmdHis').$foto_produk1['name'];
    if(!empty($lokasi_foto1)){
        //foto lama dihapus lalu upload foto baru
        unlink("../assets/img/produk/".$detail_produk['foto_produk1']);

        move_uploaded_file($lokasi_foto1,"../assets/img/produk/".$nama_foto1);

        //membuat query ubah beserta fotonya 
        $koneksi->query("UPDATE produk SET id_jenis='$id_jenis', id_merk='$id_merk', nama_produk='$nama_produk',
        harga_produk='$harga_produk',deskripsi_produk='$deskripsi_produk',stok_produk='$stok_produk',foto_produk1='$nama_foto1' WHERE id_produk='$id_produk'")or die(mysqli_error($koneksi));

    }else{
        //membuat query ubah beserta fotonya 
        $koneksi->query("UPDATE produk SET id_jenis='$id_jenis', id_merk='$id_merk', nama_produk='$nama_produk',
        harga_produk='$harga_produk',stok_produk='$stok_produk',deskripsi_produk='$deskripsi_produk' WHERE id_produk='$id_produk'")or die(mysqli_error($koneksi));
    }
    echo "<script>alert('Data produk telah di edit');location='index.php?page=produk';</script>";

}
?>