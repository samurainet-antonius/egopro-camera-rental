<h1>Tambah Pelanggan</h1>
<hr/>
<form method="POST">
    <div class="form-group">
        <label>Nama Lengkap</label>
        <input type="text" name="nama" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Alamat</label>
        <input type="text" name="alamat" class="form-control" required>
    </div>

    <div class="form-group">
        <label>No HP</label>
        <input type="text" name="no_hp" class="form-control" required>
    </div>

    <div class="form-group">
        <label>No WA</label>
        <input type="text" name="no_wa" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Sosial Media</label>
        <input type="text" name="sosial_media" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Level Pelanggan</label>
        <select name="id_pelanggan" class="form-control">
            <option value="">-Pilih Level-</option>
            <option value="Eksklusif">Eksklusif</option>
            <option value="Regular">Regular</option>
        </select>
    </div>

    <button name="simpan" class="btn btn-primary btn-sm">Simpan</button>
</form>


<?php

if(isset($_POST['simpan'])){

    $nama_pelanggan = $_POST['nama'];

    $email = $_POST['email'];

    $password = sha1($_POST['password']);

    $alamat = $_POST['alamat'];

    $no_hp = $_POST['no_hp'];

    $no_wa = $_POST['no_wa'];

    $sosial_media = $_POST['sosial_media'];

    $level_pelanggan = $_POST['level_pelanggan'];




    $koneksi->query("INSERT INTO pelanggan (nama, email, password, alamat, no_hp, no_wa, sosial_media, level_pelanggan)VALUES('$nama','$password','$email','$alamat', '$no_hp', '$no_wa', '$sosial_media', '$level_pelanggan')")or die(mysqli_error($koneksi));

    echo "<script>alert('Data pelanggan baru berhasil disimpan');location='index.php?page=pelanggan';</script>";
}
?>