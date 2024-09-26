<?php
include "connection.php";
session_start();
include "is_login.php";
$id = $_GET["id"];

if(deleteData($id, "data_pelanggan") > 0){
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