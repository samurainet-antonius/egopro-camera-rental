<?php
require_once 'config/koneksi.php';
session_destroy();
echo "<script>alert('Berhasil logout');location='index.php';</script>";