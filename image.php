<?php
session_start();

if(is_null($_SESSION["user"])){
    header("Location: index.php");
}
else{
    require_once("koneksi.php");
    
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
    echo "<br>";
    $namaFile = $_FILES['foto']['name'];
    $foto = explode(".",$namaFile);
    $namafoto = time().".".$foto[1];
	$namaSementara = $_FILES['foto']['tmp_name'];
	$data[] = $namafoto;
    $data[] = $id;
    $sql = "UPDATE user SET foto=? WHERE id=?";
    $stmt = $db->prepare($sql);

    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($data);
	$dirUpload = "img/";

	// pindahkan file
	$terupload = move_uploaded_file($namaSementara, $dirUpload.$namafoto);
    session_destroy();
    $sql = "SELECT * FROM user WHERE id=:id";
    $stmt = $db->prepare($sql);
    
    // bind parameter ke query
    $params = array(
        ":id" => $id
    );

    $stmt->execute($params);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    session_start();
    $_SESSION["user"] = $user;
    header("Location: dashboard.php");
}
?>