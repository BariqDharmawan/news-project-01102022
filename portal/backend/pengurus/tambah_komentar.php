<?php

include 'koneksi.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$komentar = $_POST ['komentar'];
$aktif = 'N';
$id_berita = $_POST['id_berita'];

mysqli_query($koneksi,"insert into komentar values('$id','$nama','$email','$komentar','$aktif','$id_berita')");

header("location:tablekomentar.php");

?>