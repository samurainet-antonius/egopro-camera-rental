<?php
require_once 'config/koneksi.php';
$kode = $_GET['kode'];

$query = $koneksi->query("SELECT * FROM pelanggan WHERE kode_aktivasi='$kode'");

if($query->num_rows == 1){
    $query = $koneksi->query("SELECT UUID() as uuid")->fetch_assoc();
    $kode_aktivasi = $query['uuid'];
    $koneksi->query("UPDATE pelanggan SET status='1', kode_aktivasi='$kode_aktivasi' WHERE kode_aktivasi='$kode'");
    echo "<script>alert('Akun anda berhasil diaktifkan');location='login.php';</script>";
}else{
    echo "<script>alert('Akun anda gagal diaktifkan, kode aktivasi tidak terdaftar');location='register.php';</script>";
}