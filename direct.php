<?php
session_start();
if(is_null($_SESSION["user"])){
    header("Location: index.php");
}
else{
    $id = $_GET['id'];
    if($id == 'hal_admin'){
    	header("Location: admin.php");
    }
    else if($id == 'hal_user'){
    	header("Location: user.php");
    }
    else if($id == 'edit_admin'){
    	header("Location: admin.php");
    }
    else if($id == 'edit_user'){
    	header("Location: user.php");
    }
}
?>