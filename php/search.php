<?php
		include 'koneksi.php';
    $search = $_GET['search'];
    
		$data = mysqli_query($koneksi,"select * from tes WHERE title LIKE '%".$search."%'");
    $list = [];
    while($row = mysqli_fetch_assoc($data))
    {
       $list[] = $row;
    }

    echo json_encode($list);
?>
