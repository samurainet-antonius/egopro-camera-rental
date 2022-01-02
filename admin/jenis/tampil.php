<?php
$query =$koneksi->query("SELECT * FROM jenis");
$semua_jenis=array();
while($per_jenis = $query->fetch_assoc()){
    $semua_jenis[] = $per_jenis;
}

?>
<h1>Jenis Produk</h1>
<hr/>
<a class="btn btn-primary btn-sm" href="index.php?page=tambah_jenis">Tambah</a> 
<br/>
<br/>
<table class="table table-bordered table-striped" border='1'>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Jenis</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($semua_jenis as $key => $per_jenis): ?>
        <tr>
            <td><?php echo $key+1; ?></td>
            <td><?php echo $per_jenis['nama_jenis'] ?></td>
            <td>
                <a href="index.php?page=edit_jenis&id=<?php echo $per_jenis
                ['id_jenis']; ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="index.php?page=hapus_jenis&id=<?php echo $per_jenis
                ['id_jenis']; ?>" class="btn btn-danger btn-sm">Hapus</a>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>