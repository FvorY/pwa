<?php
include('koneksi.php');
$id = $_POST['id'];

$query = mysqli_query($koneksi,"DELETE FROM tes WHERE id='".$id."' ");

if ($query) {
    echo json_encode('sukses');
}

?>