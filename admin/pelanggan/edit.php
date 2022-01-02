<?php
$id_pelanggan = $_GET['id'];

$query = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$id_pelanggan'");
$pelanggan = $query->fetch_assoc();
?>
<h1>Edit Pelanggan</h1>
<hr/>
<form method="POST">
    <div class="form-group">
        <label> Nama Pelanggan </label>
        <input type="text" name="nama" value="<?php echo $pelanggan['nama']; ?>"
        class="form-control" required>
    </div>

    <div class="form-group">
        <label> Alamat </label>
        <input type="text" name="alamat" value="<?php echo $pelanggan['alamat']; ?>"
        class="form-control" required>
    </div>

    <div class="form-group">
        <label> No HP </label>
        <input type="text" name="no_hp" value="<?php echo $pelanggan['no_hp']; ?>"
        class="form-control" required>
    </div>

    <div class="form-group">
        <label> No WA </label>
        <input type="text" name="no_wa" value="<?php echo $pelanggan['no_wa']; ?>"
        class="form-control" required>
    </div>

    <div class="form-group">
        <label> Sosial Media </label>
        <input type="text" name="sosial_media" value="<?php echo $pelanggan['sosial_media']; ?>"
        class="form-control" required>
    </div>

    <div class="form-group">
        <label>Level Pelanggan</label>
        <select name="id_pelanggan" class="form-control">
            <option value="">-Pilih Level-</option>
            <option value="Eksklusif" <?= ($pelanggan['level_pelanggan'] == 'Eksklusif') ? 'selected' : ''; ?>>Eksklusif</option>
            <option value="Regular" <?= ($pelanggan['level_pelanggan'] == 'Regular') ? 'selected' : ''; ?>>Regular</option>
        </select>
    </div>


    <button name="simpan" class="btn btn-primary btn-sm">Simpan</button>   
</form>

<?php

if(isset($_POST['simpan'])){

    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $no_wa = $_POST['no_wa'];
    $sosial_media = $_POST['sosial_media'];
    $level_pelanggan = $_POST['level_pelanggan'];

    $koneksi->query("UPDATE pelanggan SET nama='$nama', alamat='$alamat', no_hp='$no_hp', no_wa='$no_wa', sosial_media='$sosial_media', level_pelanggan='$level_pelanggan' WHERE id_pelanggan = '$id_pelanggan'");
    echo "<script>alert('Pelanggan berhasil didedit');location='index.php?page=pelanggan'; </script>";
}
?>