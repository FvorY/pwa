<?php
include 'koneksi.php';
$title = $_GET['title'];
$content = $_GET['content'];

$data = mysqli_query($koneksi,"insert into tes(title,content) VALUES('".$title."', '".$content."')");
  if ($data) {
    echo json_encode('sukses');
  }
?>
