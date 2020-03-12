<?php
		include 'koneksi.php';
		$data = mysqli_query($koneksi,"select * from tes");
    $list = [];
    while($row = mysqli_fetch_assoc($data))
    {
       $list[] = $row;
    }

    echo json_encode($list);
?>
