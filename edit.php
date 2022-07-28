<?php
session_start();
if(is_null($_SESSION["user"])){
    header("Location: index.php");
}
else{
    require_once("koneksi.php");
    $usr = 0;
    $not = 0;
    $id = $_GET['id'];
    $sql = "SELECT * FROM user WHERE id = $id";
    $row = $db->prepare($sql);
    $row->execute();
    $hasil = $row->fetch();
    if(isset($_POST['edit'])){

        // filter data yang diinputkan
        $nama = filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        $tgl_lahir = filter_input(INPUT_POST, 'tgl_lahir', FILTER_SANITIZE_STRING);
        $alamat = filter_input(INPUT_POST, 'alamat', FILTER_SANITIZE_STRING);
        $no_hp = filter_input(INPUT_POST, 'no_hp', FILTER_SANITIZE_STRING);
        $pekerjaan = filter_input(INPUT_POST, 'pekerjaan', FILTER_SANITIZE_STRING);
        $role = filter_input(INPUT_POST, 'role', FILTER_SANITIZE_STRING);
        // enkripsi password
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

        $data_email = $hasil['email'];
        $data_no_hp = $hasil['no_hp'];

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
                // jika query simpan berhasil, maka user sudah terdaftar
                // maka alihkan ke halaman login
                if($saved){
                    if($role == '2'){
                        header("Location: direct.php?id=edit_admin");
                    }
                    else if($role == '3'){
                        header("Location: direct.php?id=edit_user");
                    }
                }
                // jika query simpan berhasil, maka user sudah terdaftar
                // maka alihkan ke halaman login
                $not = 1;
            }
            else{
                $not = 2;
                header("Location: edit.php?id=$id");
            }
        }
        else{
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
                // jika query simpan berhasil, maka user sudah terdaftar
                // maka alihkan ke halaman login
                if($saved){
                    if($role == '2'){
                        header("Location: direct.php?id=edit_admin");
                    }
                    else if($role == '3'){
                        header("Location: direct.php?id=edit_user");
                    }
                }
                // jika query simpan berhasil, maka user sudah terdaftar
                // maka alihkan ke halaman login
                $not = 1;
            }
            else{
                $not = 2;
                header("Location: edit.php?id=$id");
            }
        }
    }
    
    require 'view_edit.php';
}
?>