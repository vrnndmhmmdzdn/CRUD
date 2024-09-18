<?php
include "connection.php";
session_start();
include "is_login.php";
$akun = $_GET["username"];


if(deleteAccount($akun) > 0){
    echo "<script>
    alert('Akun Berhasil Dihapus!,Silahkan Register Ulang');
    document.location.href = 'register.php';
    </script>";
}else{
    echo "<script>
    alert('Data Gagal Dihapus!');
    document.location.href = 'index.php';
    </script>";
}


?>