<?php
if(!isset($_SESSION["is_login"])){
    echo "<script>
    alert('Anda Belum Login!');
    document.location.href = 'login.php'
    </script>";
}

?>