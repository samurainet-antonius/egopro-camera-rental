<?php

$id = $_SESSION['admin']['id_admin'];

$query = $koneksi->query("SELECT * FROM admin WHERE id_admin='$id'");
$admin = $query->fetch_assoc();

?>
<h1>Profil</h1>
<table class="table">
    <tbody>
        <tr>
            <th>Nama</th>
            <td>: <?php echo $admin['nama']; ?></td>
        </tr>
        <tr>
            <th>Username</th>
            <td>: <?php echo $admin['username']; ?></td>
        </tr>
    </tbody>
</table>
<a href="index.php?page=edit_profil">Edit Profil</a>
