<?php
session_start();
if(is_null($_SESSION["user"])){
    header("Location: index.php");
}
else{
    require_once("koneksi.php");
    $usr = 0;
    if($_SESSION['user']['role'] == 1){
        if(isset($_POST['register'])){

            // filter data yang diinputkan
            $nama = filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_STRING);
            $tgl_lahir = filter_input(INPUT_POST, 'tgl_lahir', FILTER_SANITIZE_STRING);
            $alamat = filter_input(INPUT_POST, 'alamat', FILTER_SANITIZE_STRING);
            $no_hp = filter_input(INPUT_POST, 'no_hp', FILTER_SANITIZE_STRING);
            $pekerjaan = filter_input(INPUT_POST, 'pekerjaan', FILTER_SANITIZE_STRING);
            // enkripsi password
            $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $foto = "default.jpeg";

            $data_email = $email;
            $data_no_hp = $no_hp;

            $sql = "SELECT * FROM user WHERE email = '$email'";
            $row = $db->prepare($sql);
            $row->execute();
            $hasil = $row->fetchAll();

            $sql1 = "SELECT * FROM user WHERE no_hp = $no_hp";
            $row1 = $db->prepare($sql1);
            $row1->execute();
            $hasil1 = $row1->fetchAll();

            if(!empty($hasil) && !empty($hasil1)){
                $usr = 3;
            }
            else{
                // menyiapkan query
                $sql = "INSERT INTO user (nama, email, tgl_lahir, alamat, no_hp, pekerjaan, password, foto, role) 
                        VALUES (:nama, :email, :tgl_lahir, :alamat, :no_hp, :pekerjaan, :password, :foto, :role)";
                $stmt = $db->prepare($sql);

                // bind parameter ke query
                $params = array(
                    ":nama" => $nama,
                    ":email" => $email,
                    ":tgl_lahir" => $tgl_lahir,
                    ":alamat" => $alamat,
                    ":no_hp" => $no_hp,
                    ":pekerjaan" => $pekerjaan,
                    ":password" => $password,
                    ":foto" => $foto,
                    ":role" => 2,
                );

                // eksekusi query untuk menyimpan ke database
                $saved = $stmt->execute($params);
                // jika query simpan berhasil, maka user sudah terdaftar
                // maka alihkan ke halaman login
                if($saved){
                    header("Location: direct.php?id=hal_admin");
                }
                else{
                    $usr = 2;
                }
            }
        }
        require 'view_tambah_admin.php';
    }
    else{
        header("Location: dashboard.php");
    }
    
}
?>