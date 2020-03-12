<?php

$koneksi = mysqli_connect("localhost","raniyagr_ferdy","ferdycahyapratama123","raniyagr_pwa");

// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}

?>
