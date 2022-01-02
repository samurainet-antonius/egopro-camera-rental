<h1>Tambah Kategori</h1>
<hr/>
<form method="POST">
    <div class="form-group">
        <label> Nama Kategori</label>
        <input type="text" name="nama_kategori" class="form-control" required>
    </div>
    <button name="simpan" class="btn btn-primary btn-sm">Simpan</button>
</form>
<?php
//mengambil data dari dalam form dengan method POST menggunakan perintah $_POST['name button select']
//jika tombol simpan ditekan maka
if(isset($_POST['simpan'])){
    
    //memngambil data nama_kategori dari dalam input
    $nama_kategori = $_POST['nama_kategori'];

    //menyimpan ke table kategori
    $koneksi->query("INSERT INTO kategori (nama_kategori)VALUES('$nama_kategori')");

    //menampilkan pesan layar
    echo "<script>alert('Data kategori baru berhasil disimpan');location='index.php?page=kategori';</script>";

}
?>