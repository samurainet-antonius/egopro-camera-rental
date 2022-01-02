<?php
$semua_kategori = array();
$query = $koneksi->query("SELECT * FROM kategori");
while($per_kategori = $query->fetch_assoc()){
    $semua_kategori[] = $per_kategori;
}
?>
<h1>Tambah Jenis</h1>
<hr/>
<form method="POST">
    <div class="form-group">
        <label>Kategori</label>
        <select name="id_kategori" class="form-control" required>
            <option value="">- Pilih Kategori -</option>
            <?php foreach($semua_kategori as $key => $per_kategori): ?>
                <option value="<?php echo $per_kategori['id_kategori']; ?>"><?php echo $per_kategori
                ['nama_kategori']; ?></option>
                <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <label> Nama Jenis</label>
        <input type="text" name="nama_jenis" class="form-control" required>
    </div>
    <button name="simpan" class="btn btn-primary btn-sm">Simpan</button>
</form>
<?php

if(isset($_POST['simpan'])){
    
    $id_kategori = $_POST['id_kategori'];

    $nama_jenis = $_POST['nama_jenis'];

  
    
    $koneksi->query("INSERT INTO jenis (id_kategori, nama_jenis)VALUES('$id_kategori', '$nama_jenis')");

   
    echo "<script>alert('Data Jenis Produk baru berhasil disimpan');location='index.php?page=jenis';</script>";

}
?>