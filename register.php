<?php
$usr = 0;
require_once("koneksi.php");
session_start();
$nilai = isset ($_SESSION["user"]) ? $_SESSION["user"]:'';
if($nilai){
    header("Location: dashboard.php");
}
else{
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


        // menyiapkan query
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

        if(empty($hasil) && empty($hasil1)){
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
                ":role" => 3,
            );

            // eksekusi query untuk menyimpan ke database
            $saved = $stmt->execute($params);

            // jika query simpan berhasil, maka user sudah terdaftar
            // maka alihkan ke halaman login
            if($saved){
                header("Location: index.php");
            }
            else{
                $usr = 2;
            }
        }
        else{
            $usr = 3;
        }
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <center>
        	<div class="card o-hidden border-0 shadow-lg my-5" style="width: 30rem">
	            <div class="card-body p-0">
	                <!-- Nested Row within Card Body -->
	                <div class="row">
	                    <div class="col">
	                        <div class="p-5">
	                            <div class="text-center">
	                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
	                            </div>
                                <?php if($usr=='2'):?>
                                <div class="alert alert-danger" role="alert">
                                  Invalid email/password!!
                                </div>
                                <?php endif;?>
                                <?php if($usr=='3'):?>
                                <div class="alert alert-danger" role="alert">
                                  Email/No HP tidak boleh sama!!
                                </div>
                                <?php endif;?>
	                            <form class="user" action="" method="POST">
	                            	<div class="form-group">
	                                    <input type="text" class="form-control form-control-user" id="nama" name="nama" 
	                                        placeholder="Nama Lengkap">
	                                </div>
	                                <div class="form-group">
	                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail" name="email" 
	                                        placeholder="Email Address">
	                                </div>
                                    <div class="form-group">
                                        <input type="date" class="form-control form-control-user" id="tgl_lahir" name="tgl_lahir" 
                                            placeholder="Tanggal lahir">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="alamat" name="alamat" 
                                            placeholder="Alamat">
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="number" class="form-control form-control-user" id="no_hp" name="no_hp" placeholder="No HP">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control form-control-user" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan">
                                        </div>
                                    </div>
	                                <div class="form-group">
	                                    <input type="password" class="form-control form-control-user" id="password" name="password" 
	                                        placeholder="Password">
	                                </div>
	                                <input type="submit" name="register" class="btn btn-primary btn-user btn-block" value="Daftar!!">
	                            </form>
	                            <hr>
	                            <div class="text-center">
	                                <a class="small" href="index.php">Already have an account? Login!</a>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
        </center>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>