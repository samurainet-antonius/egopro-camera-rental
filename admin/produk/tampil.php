<?php
$semuaProduk = array();
$sql = $koneksi->query("SELECT * FROM produk");
while($per_produk = $sql->fetch_assoc()){
    $semuaProduk[] = $per_produk;
}
//membuat query tampil produk 
$query = $koneksi->query("SELECT * FROM produk");

//membuat wadah dengan nama semua_produk yang bernilai array kosong
$semua_produk = array();

//query mengambil kategori diubah kebentuk array 
while($per_produk =$query->fetch_assoc()){
    $semua_produk[] = $per_produk;
}



?>
<h1>Produk</h1>
<hr/>
<a href="index.php?page=tambah_produk" class="btn btn-primary btn-sm">Tambah</a>
<br/>
<br/> 
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($semua_produk as $no => $per_produk): ?>
        <tr>
            <td><?php echo $no+1; ?></td>
            <td><?php echo $per_produk['nama_produk']; ?></td>
            <td>Rp <?php echo number_format($per_produk['harga_produk'],"0",",","."); ?></td>
            <td><?php echo $per_produk['stok_produk']; ?></td>
            <td>
                <img src="../assets/img/produk/<?php echo $per_produk['foto_produk1'] ?>" alt="gambar"
                width="100">
            </td>
                <td>
                <a href="index.php?page=edit_produk&id=<?php echo $per_produk['id_produk']; ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="index.php?page=hapus_produk&id=<?php echo $per_produk['id_produk']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>
            <?php endforeach ?>
    </tbody>    
</table>