<?php
include "connection.php";
session_start();
include "is_login.php";
$id = $_GET["id"];

if(deletedata($id) > 0){
    echo "<script>
    alert('Data Berhasil Dihapus!');
    document.location.href = 'index.php';
    </script>";
}else{
    echo "<script>
    alert('Data Gagal Dihapus!');
    document.location.href = 'index.php';
    </script>";
}


?>