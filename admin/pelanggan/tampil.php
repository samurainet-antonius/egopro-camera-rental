<?php

$query = $koneksi->query("SELECT * FROM pelanggan");

$semua_pelanggan = array();
while($per_pelanggan =$query->fetch_assoc()){
    $semua_pelanggan[] = $per_pelanggan;
}


?>
<h1>Pelanggan</h1>
</hr>
<a class="btn btn-primary btn-sm" href="index.php?page=tambah_pelanggan">Tambah</a>
<br/>
<br/>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No HP</th>
            <th>No WA</th>
            <th>Sosial Media</th>
            <th>Level Pelanggan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($semua_pelanggan as $no => $per_pelanggan): ?>
        <tr>
            <td><?php echo $no+1; ?></td>
            <td><?php echo $per_pelanggan['nama']; ?></td>
            <td><?php echo $per_pelanggan['alamat']; ?></td>
            <td><?php echo $per_pelanggan['no_hp']; ?></td>
            <td><?php echo $per_pelanggan['no_wa']; ?></td>
            <td><?php echo $per_pelanggan['sosial_media']; ?></td>
            <td><?php echo $per_pelanggan['level_pelanggan']; ?></td>
            <td>
                <a href="index.php?page=edit_pelanggan&id=<?php echo $per_pelanggan['id_pelanggan']; ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="index.php?page=hapus_pelanggan&id=<?php echo $per_pelanggan['id_pelanggan']; ?>" class="btn btn-danger btn-sm">Hapus</a>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
        </table>