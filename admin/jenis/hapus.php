<?php

$id_jenis = $_GET['id'];

$koneksi->query("DELETE FROM jenis WHERE id_jenis='$id_jenis'");

echo "<script>alert('Jenis Produk berhasil dihapus');location='index.php?page=jenis';</script>";
?>