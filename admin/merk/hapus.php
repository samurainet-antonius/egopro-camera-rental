<?php

$id_merk = $_GET['id'];

$koneksi->query("DELETE FROM merk WHERE id_merk='$id_merk'");

echo "<script>alert('Merk berhasil dihapus');location='index.php?page=merk';</script>";
?>