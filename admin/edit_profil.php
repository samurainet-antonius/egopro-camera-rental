<?php

$id = $_SESSION['admin']['id_admin'];

$query = $koneksi->query("SELECT * FROM admin WHERE id_admin='$id'");
$admin = $query->fetch_assoc();

?>
<h1>Edit Profil dan Password</h1>
<hr/>
<form method="POST">
    <div class="form-group">
        <label>Username</label>
        <input type="text" required name="username" class="form-control" value="<?php echo 
        $admin['username']; ?>">
    </div>

    <div class="form-group">
        <label>Nama</label>
        <input type="text" required name="nama" class="form-control" value="<?php echo 
        $admin['nama']; ?>">
    </div>

    <div class="form-group">
        <label>Password Lama</label>
        <input type="password" name="password_lama" class="form-control">
    </div>

    <div class="form-group">
        <label>Password Baru</label>
        <input type="password" name="password_baru" class="form-control">
    </div>

    <div class="form-group">
        <label>Password Konfirmasi</label>
        <input type="password" name="password_konfirmasi" class="form-control">
    </div>

    <button name="simpan" class="btn btn-primary">Simpan</button>
</form>
<p><i>*Apabila password tidak akan diubah mohon tidak perlu diisi.</i></p>

<?php
if(isset($_POST['username'])){

    $username = $_POST['username'];
    $nama = $_POST['nama'];
    $password_lama = $_POST['password_lama'];
    $password_baru = $_POST['password_baru'];
    $password_konfirmasi = $_POST['password_konfirmasi'];

    if(!empty($password_lama)){

        $password_lama_encrypt = sha1{$password_lama);
        $query = $koneksi->query("SELECT * FROM admin WHERE id_admin='$id' AND
        password='$password_lama_encrypt'");
        if($query->num_rows == 1){

            if($password_baru == $password_konfirmasi){

                $passowrd_baru_encrypt = sha1($password_baru);

                $koneksi->query("UPDATE admin SET password='$passowrd_baru_encrypt' WHERE id_admin='$id'");

                echo "<script>alert('Profil dan password berhasil diubah');location='index.php?page=profil';</script>";
            }else{
                echo "<script>alert('Password baru tidak cocok dengan password konfirmasi');location='index.php?page=edit_profil';</script>";
            }
        }else{
            echo "<script>alert('Password lama tidak cocok');location='index.php?page=edit_profil';</script>";
        }
    }else{
        $koneksi->query("UPDATE admin SET username='$username', nama='$nama' WHERE id_admin='$id'");

                echo "<script>alert('Profil berhasil di ubah');location='index.php?page=profil';</script>";
    }
}
?>