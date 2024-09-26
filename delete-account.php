<?php
include "connection.php";
session_start();
include "is_login.php";
$id = $_GET["id"];

if(deleteData($id, "akun") > 0){
    session_unset();
    session_destroy();
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