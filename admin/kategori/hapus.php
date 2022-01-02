<?php
//$_GET['nama parameter url] = digunakan untuk mengambil nilai/isi dari parameter yang ada di url
//mengambil isi/nilai dari parameter id yang ada di url 

$id_kategori = $_GET['id'];

$koneksi->query("DELETE FROM kategori WHERE id_kategori='$id_kategori'");

echo "<script>alert('Kategori berhasil dihapus');location='index.php?page=kategori';</script>";
?>