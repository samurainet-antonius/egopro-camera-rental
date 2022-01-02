<?php

//membuat query tampil kategori 
$query = $koneksi->query("SELECT * FROM kategori");

//membuat wadah dengan nama semua_kategori yang bernilai array kosong
$semua_kategori = array();

//query mengambil kategori diubah kebentuk array 
while($per_kategori =$query->fetch_assoc()){
    $semua_kategori[] = $per_kategori;
}

?>
<h1>Kategori</h1>
<hr/>
<a href="index.php?page=tambah_kategori" class="btn btn-primary btn-sm">Tambah</a>
<br/>
<br/> 
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($semua_kategori as $no => $per_kategori): ?>
        <tr>
            <td><?php echo $no+1; ?></td>
            <td><?php echo $per_kategori['nama_kategori']; ?></td>
            <td>
                <a href="index.php?page=edit_kategori&id=<?php echo $per_kategori['id_kategori']; ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="index.php?page=hapus_kategori&id=<?php echo $per_kategori['id_kategori']; ?>" class="btn btn-danger btn-sm">Hapus</a>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>