<?php
session_start();
if(is_null($_SESSION["user"])){
    header("Location: index.php");
}
else{
    require_once("koneksi.php");
    $sql = "SELECT * FROM user WHERE role = 3";
    $row = $db->prepare($sql);
    $row->execute();
    $hasil = $row->fetchAll();
    $a =1;
    require 'view_user.php';
}
?>