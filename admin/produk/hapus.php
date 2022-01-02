<?php

$id_produk = $_GET['id'];

$koneksi->query("DELETE FROM produk WHERE id_produk='$id_produk'");

echo "<script>alert('Data produk berhasil dihapus');location='index.php?page=produk';</script>";
?>