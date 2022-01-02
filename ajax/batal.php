<?php
require_once '../config/koneksi.php';

$tglSkrng = date("Y-m-d H:i:s");
$query = $koneksi->query("SELECT * FROM sewa WHERE deadline_sewa <= '$tglSkrng'");
while($row = $query->fetch_assoc()){
    
    $koneksi->query("UPDATE sewa SET status_pembayaran='Batal' WHERE id_sewa='$row[id_sewa]'");
}