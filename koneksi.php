<?php
$koneksi = mysqli_connect("localhost", "root", "", "news_project");
// $koneksi = mysqli_connect("localhost", "root", "uloydev002", "news");

// Check connection
if (mysqli_connect_errno()) {
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
