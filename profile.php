<?php
session_start();
$not = 0;
if(is_null($_SESSION["user"])){
    header("Location: index.php");
}
else{
    require_once("koneksi.php");
    $nama = filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $tgl_lahir = filter_input(INPUT_POST, 'tgl_lahir', FILTER_SANITIZE_STRING);
    $alamat = filter_input(INPUT_POST, 'alamat', FILTER_SANITIZE_STRING);
    $no_hp = filter_input(INPUT_POST, 'no_hp', FILTER_SANITIZE_STRING);
    $pekerjaan = filter_input(INPUT_POST, 'pekerjaan', FILTER_SANITIZE_STRING);
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);

    $data_email = $_SESSION['user']['email'];
    $data_no_hp = $_SESSION['user']['no_hp'];

	$sql = "SELECT * FROM user WHERE id != $id AND email = '$email'";
	$row = $db->prepare($sql);
	$row->execute();
	$hasil = $row->fetchAll();

	$sql1 = "SELECT * FROM user WHERE id != $id AND no_hp = $no_hp";
	$row1 = $db->prepare($sql1);
	$row1->execute();
	$hasil1 = $row1->fetchAll();

	if($email == $data_email && $no_hp == $data_no_hp){
	$stat = 1;
	}
	else{
		if(!empty($hasil) && !empty($hasil1)){
			$stat = 2;
		}
		if(empty($hasil) && empty($hasil1)){
			$stat = 1;
		}
		else{
			$stat = 3;
		}
	}

    if(isset($_POST['profile'])){
    	$password = password_hash($_POST["password"], PASSWORD_DEFAULT);

        if($_POST["password"]==""){
        	if($stat == 1){
        		$data[] = $nama;
	            $data[] = $email;
	            $data[] = $tgl_lahir;
	            $data[] = $alamat;
	            $data[] = $no_hp;
	            $data[] = $pekerjaan;
	            $data[] = $id;
	            $sql = "UPDATE user SET nama=?, email=?, tgl_lahir=?, alamat=?, no_hp=?, pekerjaan=? WHERE id=?";
	            $stmt = $db->prepare($sql);

	            // eksekusi query untuk menyimpan ke database
	            $saved = $stmt->execute($data);
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
	            // jika query simpan berhasil, maka user sudah terdaftar
	            // maka alihkan ke halaman login
	            $not = 1;
        	}
        	else{
        		$not = 2;
        	}
            // menyiapkan query
            
        }
        else{
            // menyiapkan query
            if($stat == 1){
            	$data[] = $nama;
	            $data[] = $email;
	            $data[] = $tgl_lahir;
	            $data[] = $alamat;
	            $data[] = $no_hp;
	            $data[] = $pekerjaan;
	            $data[] = $password;
	            $data[] = $id;
	            $sql = "UPDATE user SET nama=?, email=?, tgl_lahir=?, alamat=?, no_hp=?, pekerjaan=?, password=? WHERE id=?";
	            $stmt = $db->prepare($sql);

	            // eksekusi query untuk menyimpan ke database
	            $saved = $stmt->execute($data);
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
	            // jika query simpan berhasil, maka user sudah terdaftar
	            // maka alihkan ke halaman login
	            $not = 1;
            }
            else{
            	$not = 2;
            }
        }
    }
    require 'view_profile_master.php';
}
?>