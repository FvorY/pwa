<?php
include 'koneksi.php';
$id = $_GET['id'];
$title = $_GET['title'];
$content = $_GET['content'];

$data = mysqli_query($koneksi,"UPDATE tes SET title='".$title."', content='".$content."' WHERE id='".$id."'");
  if ($data) {
    echo json_encode('sukses');
  }
?>
