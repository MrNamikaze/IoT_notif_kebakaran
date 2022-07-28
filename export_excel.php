<?php
session_start();
if(is_null($_SESSION["user"])){
    header("Location: index.php");
}
else{
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=data_kebakaran.xls");
    require_once("koneksi.php");
    $sql = "SELECT * FROM arduino";
    $row = $db->prepare($sql);
    $row->execute();
    $hasil = $row->fetchAll();
    $a =1;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Export Excel</title>
</head>
<body>
	<table class="table" border="1">
        <tr>
          <th scope="col">No</th>
          <th scope="col">Ruangan</th>
          <th scope="col">Gas</th>
          <th scope="col">Api</th>
          <th scope="col">Suhu</th>
          <th scope="col">Waktu</th>
        </tr>
        <?php foreach($hasil as $b){?>
        <tr>
          <th scope="row"><?= $a?></th>
          <td><?= $b['ruangan'];?></td>
          <td><?= $b['gas_sensor'];?></td>
          <td><?= $b['flame_sensor'];?></td>
          <td><?= $b['suhu_sensor'];?></td>
          <td><?= $b['tanggal'];?> <?= $b['jam'];?></td>
        </tr>
        <?php $a++; }?>
    </table>
</body>
</html>