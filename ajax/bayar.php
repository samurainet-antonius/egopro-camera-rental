<?php
require_once '../config/koneksi.php';
//Load Composer's autoloader
require '../vendor/autoload.php';
require_once '../config/mail.php';
$no_sewa = '';
if($_POST['result']['status_code'] == 201){

    $member = $_SESSION['member'];
    $id_pelanggan = $member['id_pelanggan'];

    $result = $_POST['result'];
    $no_sewa = $result['order_id'];

    $bodyJson = json_encode($result);
    

    $rental = array();
    $total=0;
    $qty=0;
    $durasi=0;
    foreach ($_SESSION['rental'] as $produkID => $isi) {
            $query = $koneksi->query("SELECT * FROM produk WHERE id_produk='$produkID'");
            $detail = $query->fetch_assoc();
            $detail['qty'] = $isi['qty'];
            $detail['durasi'] = $isi['durasi'];
            $detail['subtotal'] = $isi['durasi']*($detail['harga_produk']*$isi['qty']);
            $rental[] = $detail;

            $total += $detail['subtotal'];
            $qty += $isi['qty'];
            $durasi = $isi['durasi'];
    }

    
    $tgl_awal = date("Y-m-d");
    $tgl_selesai = date("Y-m-d",strtotime("+$durasi days"));
    $deadline = date("Y-m-d H:i:s",strtotime('+1 days'));
    
    $nama_peminjam = $_SESSION['sewa']['nama_peminjam'];
    $alamat_peminjam = $_SESSION['sewa']['alamat_peminjam'];
    $jaminan = $_SESSION['sewa']['jaminan'];
    $file_jaminan = $_SESSION['sewa']['file_jaminan'];

    if(array_key_exists("va_numbers",$result)){
        $bank = strtoupper($result['va_numbers'][0]['bank']);
        $vaNumber = $result['va_numbers'][0]['va_number'];
    }else if(array_key_exists("permata_va_number",$result)){
        $bank = 'Permata';
        $vaNumber = $result['permata_va_number'];
    }

    $body = '<h1>Halo '.$member['nama'].'</h1>';
    $body .= '<p>Selamat anda telah berhasil melakukan penyewaan pada webiste <a href="https://egopro.com">Egopro</a> <br/> silahkan lakukan pembayaran sebesar <b>Rp '.number_format($total,"0",",",".").'</b> pada nomer rekening berikut ini.</p>';
    $body .= '<b>Bank</b> : '.$bank.'<br/><b>Virtual Account</b> : '.$vaNumber.'<br/>';
    $body .= '<p>Batas waktu pembayaran ialah '.date('d/M/Y H:i:s', strtotime($deadline)).'.</p>';
    $body .= '<p>Untuk melihat atau mengunduh nota dalam bentuk pdf, dapat dilakukan dengan cara mengklik link dibawah ini.</p>';
    $body .= '<a href="'.$result['pdf_url'].'">Download Nota</a>';

    $check = sendMail('Nota #'.$no_sewa,$member['email'],$member['nama'],$body);

    if($check){
        $koneksi->query("INSERT INTO api_midtrans (invoice,payload)VALUES('$no_sewa','$bodyJson')");

        $koneksi->query("INSERT INTO sewa (id_sewa,no_sewa,id_admin,id_pelanggan,total_produk,total_harga,tanggal_mulai_sewa,tanggal_selesai_sewa,nama_peminjam,alamat_peminjam,jaminan,file_jaminan,deadline_sewa)VALUES('$no_sewa','$no_sewa','1','$id_pelanggan','$qty','$total','$tgl_awal','$tgl_selesai','$nama_peminjam','$alamat_peminjam','$jaminan','$file_jaminan','$deadline')")or die(mysqli_error($koneksi));

        foreach ($_SESSION['rental'] as $produkID => $isi) {
            $query = $koneksi->query("SELECT * FROM produk WHERE id_produk='$produkID'");
            $detail = $query->fetch_assoc();
            $detail['qty'] = $isi['qty'];
            $detail['durasi'] = $isi['durasi'];
            $detail['subtotal'] = $isi['durasi']*($detail['harga_produk']*$isi['qty']);
            $rental[] = $detail;

            $total += $detail['subtotal'];
            $qty += $isi['qty'];

            $koneksi->query("INSERT INTO detail_sewa (id_sewa,id_produk,produk,harga,jumlah,durasi_peminjaman,sub_total)VALUES('$no_sewa','$detail[id_produk]','$detail[nama_produk]','$detail[harga_produk]','$isi[qty]','$isi[durasi]','$detail[subtotal]')")or die(mysqli_error($koneksi));

            $qtyStock = $detail['stok_produk']-$isi['qty'];

            $koneksi->query("UPDATE produk SET stok_produk='$qtyStock' WHERE id_produk='$produkID'");
        }

        unset($_SESSION['rental']);
        unset($_SESSION['sewa']);

        echo $no_sewa;
    }
}