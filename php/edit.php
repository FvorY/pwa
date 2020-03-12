<?php 
  session_start();
  include 'koneksi.php';
  $id = $_GET['id'];
  $data = mysqli_query($koneksi,"select * from tes WHERE id='".$id."'");
  $list = [];
  while($row = mysqli_fetch_assoc($data))
  {
     $list[] = $row;
  }
//   $_SESSION["id"] = $id;
//   $_SESSION["title"] = $list[0]['title'];
//   $_SESSION["content"] = $list[0]['content'];
  header("Location: " . 'http://' . $_SERVER['SERVER_NAME'] . "/pwa/editinput.php?id=".$id."&title=".$list[0]['title']."&content=".$list[0]['content']."");
  die();
?>