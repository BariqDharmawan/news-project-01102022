<?php

include 'koneksi.php';

$id = $_GET['id'];

mysqli_query($koneksi,"delete from komentar where id='$id'");

header("location:tablekomentar.php"); 

?>