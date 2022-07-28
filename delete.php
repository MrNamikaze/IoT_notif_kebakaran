<?php
session_start();
if(is_null($_SESSION["user"])){
    header("Location: index.php");
}
else{
    require_once("koneksi.php");
    $url = $_GET['id'];
	$data = explode(" ",$url);
	$id = $data[0];
	$sql = "DELETE FROM user WHERE id= ?";
	$row = $db->prepare($sql);
	$row->execute(array($id));
    if($data[1]=='1'){
    	header("Location: admin.php");
    }
    else{
    	header("Location: user.php");
    }
}
?>