<?php
session_start();
if(is_null($_SESSION["user"])){
    header("Location: index.php");
}
else{
    require_once("koneksi.php");
    if(isset($_POST['register'])){
            $ruangan = filter_input(INPUT_POST, 'ruangan', FILTER_SANITIZE_STRING);
            $sql = "SELECT * FROM ruangan";
		    $row = $db->prepare($sql);
		    $row->execute();
		    $hasil = $row->fetchAll();
		    require 'view_ruangan.php';
        }
}
?>