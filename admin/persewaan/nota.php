<?php
$idSewa = $_GET['id'];

$query = $koneksi->query("SELECT * FROM sewa WHERE id_sewa='$idSewa'");
$sewa = $query->fetch_assoc();

$result=array();

$query = $koneksi->query("SELECT * FROM detail_sewa WHERE id_sewa='$idSewa'");
while($row = $query->fetch_assoc()){
    $result [] =$row;
}

$query = $koneksi->query("SELECT * FROM api_midtrans WHERE invoice='$idSewa'");
$apiMidtrans = $query->fetch_assoc();

$payment = json_decode($apiMidtrans['payload'],true);
if(array_key_exists("va_numbers",$payment)){
  $bank = strtoupper($payment['va_numbers'][0]['bank']);
  $vaNumber = $payment['va_numbers'][0]['va_number'];
}else if(array_key_exists("permata_va_number",$payment)){
  $bank = 'Permata';
  $vaNumber = $payment['permata_va_number'];
}
?>
<div class="row">
           <div class="col-sm-6">
             <div class="text-left">
                 <h4><?= $sewa['nama_peminjam']; ?></h4>
                 <p><?= $sewa['alamat_peminjam']; ?></p>
             </div>
           </div>
           <div class="col-sm-6">
            <div style="text-align:right">
                <div class="row">
                    <div class="col-md-9">
                        <h4>Egopro Jogja</h4>
                        <p>Jl, Candrakirana No, 14 <br/>
                        Sagan, Terban, Yogyakarta <br/>    
                        Yogyakarta 55223 @egopro
                        </p>
                        <p>
                            08570-2222-111 <br/>
                            egoprojogja@gmail.com
                        </p>
                    </div>
                    <div class="col-md-3">
                        <img src="../assets/img/logo/logo.png" alt="">
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-10">
                            <p>Start : <?= date("d M Y",strtotime($sewa['tanggal_mulai_sewa'])); ?></p>
                            <p>Stop : <?= date("d M Y",strtotime($sewa['tanggal_selesai_sewa'])); ?></p>
                    </div>
                </div>
             </div>
           </div>
         </div>
         <div class="pt-5">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Qty</th>
                        <th>Harga Sewa/hari</th>
                        <th>Durasi</th>
                        <th>Sub Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total=0; ?>
                    <?php foreach($result as $key => $per_produk): ?>
                        <tr>
                            <td><?= $key+1; ?></td>
                            <td><?= $per_produk['produk']; ?></td>
                            <td><?= $per_produk['jumlah']; ?></td>
                            <td>Rp <?= number_format($per_produk['harga'],0,",","."); ?></td>
                            <td><?= $per_produk['durasi_peminjaman']; ?> hari</td>
                            <td>Rp <?= number_format($per_produk['sub_total'],0,",","."); ?></td>

                        </tr>
                    <?php endforeach ?>
                </tbody>
                <tfoot>
                    <th colspan="5">Total</th>
                    <td>Rp <?= number_format($sewa['total_harga'],0,",","."); ?></td>
                </tfoot>
            </table>
         </div>
         <div class="row">
             <div class="col-md-8">
                 <div class="alert alert-info">
                    <p>Silahkan Melakukan Pembayaran <strong>Rp. <?php echo number_format($sewa['total_harga'],0,",","."); ?></strong> ke: 
                        <br> Bank: <strong><?php echo  $bank; ?></strong>
                        <br> Virtual Account Number: <strong> <?php echo $vaNumber; ?></strong>
                    </p>
                    <div class="" name="deadline_sewa" id="timer" value="<?php echo $sewa['deadline_sewa'] ?>" >
                        Daedline Bayar: <strong><?php echo date("d/M/Y H:i:s",strtotime($sewa['deadline_sewa'])) ?> </strong>
                    </div>
                 </div>
             </div>
         </div>