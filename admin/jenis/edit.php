<?php
$id_jenis = $_GET['id'];

$semua_kategori = array();
$query = $koneksi->query("SELECT * FROM kategori");
while($per_kategori = $query->fetch_assoc()){
    $semua_kategori[] = $per_kategori;
}

$query = $koneksi->query("SELECT * FROM jenis WHERE id_jenis='$id_jenis'");
$jenis = $query->fetch_assoc();
?>

<h1>Edit Jenis</h1>
<hr/>
<form method="POST">
    <div class="form-group">
    <label>Kategori</label>
    <select name="id_kategori" class="form-control" required>
        <option value="">- Pilih Kategori -</option>
        <?php foreach($semua_kategori as $key => $per_kategori): ?>
            <option value="<?php echo $per_kategori['id_kategori']; ?>"<?php echo ($per_kategori['id_kategori'] == $jenis['id_kategori']) ? 'selected' : ''; ?>><?php echo $per_kategori
            ['nama_kategori']; ?></option>
        <?php endforeach ?>
    </select>
    </div>
    <div class="form-group">
        <label> Nama Jenis</label>
        <input type="text" name="nama_jenis" class="form-control" required value="<?php echo $jenis['nama_jenis']; ?>">
    </div>
    <button name="simpan" class="btn btn-primary btn-sm">Simpan</button>
</form>

<?php

if(isset($_POST['simpan'])){
    $id_kategori = $_POST['id_kategori'];
    $nama_jenis = $_POST['nama_jenis'];

    $koneksi->query("UPDATE jenis SET nama_jenis='$nama_jenis',id_kategori='$id_kategori' WHERE id_jenis = '$id_jenis'")or die(mysqli_error($koneksi));
    echo "<script>alert('Jenis Produk berhasil diedit');location='index.php?page=jenis'; </script>";
}
?>