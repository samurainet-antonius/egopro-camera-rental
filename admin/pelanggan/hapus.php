<?php

$id_pelanggan = $_GET['id'];

$koneksi->query("DELETE FROM pelanggan WHERE id_pelanggan='$id_pelanggan'");

echo "<script>alert('Data pelanggan berhasil dihapus');location='index.php?page=pelanggan';</script>";
?>