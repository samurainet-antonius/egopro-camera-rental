<h1>Tambah Merk</h1>
<hr/>
<form method="POST">
    <div class="form-group">
        <label> Nama Merk</label>
        <input type="text" class="form-control" name="nama_merk" required>
    </div>
    <button name="simpan" class="btn btn-primary btn-sm">Simpan</button>
</form>
<?php

if(isset($_POST['simpan'])){
    

    $nama_merk = $_POST['nama_merk'];

    
    $koneksi->query("INSERT INTO merk (nama_merk)VALUES('$nama_merk')");

   
    echo "<script>alert('Data merk baru berhasil disimpan');location='index.php?page=merk';</script>";

}
?>