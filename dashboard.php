<?php
session_start();
if(is_null($_SESSION["user"])){
    header("Location: index.php");
}
else{
    require_once("koneksi.php");
    $sql = "SELECT * FROM ruangan";
    $row = $db->prepare($sql);
    $row->execute();
    $hasil = $row->fetchAll();
    require 'view_dashboard_master.php';
}
?>