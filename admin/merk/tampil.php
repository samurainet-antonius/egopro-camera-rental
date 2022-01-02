<?php
$query =$koneksi->query("SELECT * FROM merk");
$semua_merk=array();
while($per_merk = $query->fetch_assoc()){
    $semua_merk[] = $per_merk;
}

?>
<h1>Merk</h1>
<hr/>
<a href="index.php?page=tambah_merk" class="btn btn-primary btn-sm">Tambah</a>
<br/>
<br/> 
<table class="table table-bordered table-striped" border='1'>
    <thead>
        <tr>
            <th>No</th>
            <th>Merk</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($semua_merk as $key => $per_merk): ?>
        <tr>
            <td><?php echo $key+1; ?></td>
            <td><?php echo $per_merk['nama_merk'] ?></td>
            <td>
                <a href="index.php?page=edit_merk&id=<?php echo $per_merk
                ['id_merk']; ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="index.php?page=hapus_merk&id=<?php echo $per_merk
                ['id_merk']; ?>" class="btn btn-danger btn-sm">Hapus</a>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>