<?php
$id_merk = $_GET['id'];

$query = $koneksi->query("SELECT * FROM merk WHERE id_merk='$id_merk'");
$merk = $query->fetch_assoc();
?>
<pre>
    <?php print_r($merk); ?>
</pre>
<h1>Edit Merk</h1>
<hr/>
<form method="POST">
    <div class="form-group">
    <label> Nama Merk</label>
        <select name="id_kategori" class="form-control">
        <input type="text" name="nama_merk" value="<?php echo $merk['nama_merk']; ?>" required>
    </div>
    <button name="simpan" class="btn btn-primary btn-sm">Simpan</button>
</form>

<?php

if(isset($_POST['simpan'])){
    $nama_merk = $_POST['nama_merk'];

    $koneksi->query("UPDATE merk SET nama_merk='$nama_merk' WHERE id_merk = '$id_merk'");
    echo "<script>alert('Merk berhasil diedit');location='index.php?page=merk'; </script>";
}
?>