<?php
include 'koneksi.php';
// menyimpan data id kedalam variabel
$no_ktp  = $_GET['No_Ktp'];

// query SQL untuk insert data
date_default_timezone_set('Asia/Jakarta');
$time=date('G:i:s');

$query="UPDATE cek_inout SET Check_out='$time' WHERE No_Ktp='$no_ktp' ";
mysqli_query($koneksi, $query);
// mengalihkan ke halaman admin.php
header("location:admin.php");
?>