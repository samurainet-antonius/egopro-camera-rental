<?php
$tgl_awal = date("Y-m-d");
$tgl_akhir = date("Y-m-d");

if(isset($_POST['tgl_awal']) && isset($_POST['tgl_akhir'])){
    $tgl_awal = $_POST['tgl_awal'];
    $tgl_akhir = $_POST['tgl_akhir'];
}
$query = $koneksi->query("SELECT * FROM sewa WHERE date(tgl_sewa) BETWEEN '$tgl_awal' AND '$tgl_akhir'");

$semua_persewaan = array();
while($per_persewaan =$query->fetch_assoc()){
    $semua_persewaan[] = $per_persewaan;
}

?>
<h1>Persewaan</h1>
</hr>
<br/>
<form method="POST">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Dari Tanggal</label>
                <input type="date" class="form-control" name="tgl_awal" value="<?php echo $tgl_awal; ?>">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Sampai Tanggal</label>
                <input type="date" class="form-control" name="tgl_akhir" value="<?php echo $tgl_akhir; ?>">
            </div>
        </div>

        <div class="col-md-12">
            <button class="btn btn-primary">Cari</button>
        </div>
    </div>
</form>
<br/>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>No Sewa</th>
            <th>Total produk</th>
            <th>Total Harga</th>
            <th>Tanggal Mulai Sewa</th>
            <th>Tanggal Selesai Sewa</th>
            <th>Jaminan</th>
            <th>Status Pembayaran</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($semua_persewaan as $no => $per_persewaan): ?>
        <tr>
            <td><?php echo $no+1; ?></td>
            <td><?php echo $per_persewaan['no_sewa']; ?></td>
            <td><?php echo $per_persewaan['total_produk']; ?></td>
            <td><?php echo $per_persewaan['total_harga']; ?></td>
            <td><?php echo $per_persewaan['tanggal_mulai_sewa']; ?></td>
            <td><?php echo $per_persewaan['tanggal_selesai_sewa']; ?></td>
            <td>
                <?php echo $per_persewaan['jaminan']; ?>
                <br/>
                <a href="../assets/dokumen/<?php echo $per_persewaan['file_jaminan']; ?>" target="_blank">Download</a>
            </td>
            <td><?php echo $per_persewaan['status_pembayaran']; ?></td>
            <td>
                <a href="index.php?page=nota&id=<?php echo $per_persewaan['no_sewa']; ?>" class="btn btn-warning btn-sm">Nota</a>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
        </table>