<?php

include 'koneksi.php';

$id = $_GET['id'];

mysqli_query($koneksi,"update komentar set aktif='Y' where id='$id'");

header("location:tablekomentar.php"); 

?>