<?php
require_once '../config/koneksi.php';
require '../vendor/autoload.php';

$tglSkrng = date("Y-m-d H:i:s");
$result=[];
$query = $koneksi->query("SELECT * FROM sewa WHERE deadline_sewa >= '$tglSkrng'");
while($row = $query->fetch_assoc()){
    
    // $result[] = $row;
    $payemnt = checkStatus($row['no_sewa']);
    if(array_key_exists('transaction_status',$payemnt)){
        $status = ($payemnt['transaction_status'] == 'settlement') ? 'Lunas' : 'Belum Lunas';
        $koneksi->query("UPDATE sewa SET status_pembayaran='$status' WHERE id_sewa='$row[id_sewa]'");
    }
}
// echo true;