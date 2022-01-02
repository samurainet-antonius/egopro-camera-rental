<?php
$id_kategori = $_GET['id'];

$query = $koneksi->query("SELECT * FROM kategori WHERE id_kategori='$id_kategori'");
$kategori = $query->fetch_assoc();
?>
<pre>
    <?php print_r($kategori); ?>
</pre>
<h1>Edit Kategori</h1>
<hr/>
<form method="POST">
    <div class="form-group">
        <label> Nama Kategori</label>
        <input type="text" name="nama_kategori" value="<?php echo $kategori['nama_kategori']; ?>" required>
    </div>
    <button name="simpan" class="btn btn-primary btn-sm">Simpan</button>  
</form>

<?php

if(isset($_POST['simpan'])){
    $nama_kategori = $_POST['nama_kategori'];

    $koneksi->query("UPDATE kategori SET nama_kategori='$nama_kategori' WHERE id_kategori = '$id_kategori'");
    echo "<script>alert('Kategori berhasil diedit');location='index.php?page=kategori'; </script>";
}
?>