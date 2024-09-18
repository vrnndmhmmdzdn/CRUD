<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "bengkel";

$connection = mysqli_connect($server,$user,$password,$database);

if (!$connection) {
    echo "Gagal Terhubung!" . mysqli_connect_error($connection);
}

function getData($query){
    global $connection;
    $result = mysqli_query($connection, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row; 
    }
    return $rows;
}
function addData($data){
    global $connection;
    $nama = $data["nama"];
    $jenis = $data["jenis"];
    $merk = $data["merk"];
    $model = $data["model"];
    $nopol = $data["nopol"];
    $barang = $data["barang"];
    $service = $data["jenis"];
    $harga = $data["harga"];
    $estimasi = $data["estimasi"];
    $kontak = $data["kontak"];
    $lunas = $data["lunas"];

    $query = "INSERT INTO data_pelanggan VALUES (null,'$nama','$jenis','$merk','$model','$nopol','$barang','$service','$harga',null,'$estimasi','$kontak','$lunas')";

    mysqli_query($connection,$query);

    if(mysqli_affected_rows($connection) > 0){
        echo "<script>
        alert('Data Berhasil Ditambahkan!');
        document.location.href = 'index.php';
        </script>";
    }else{
        echo ('Data Gagal Ditambahkan');
    }
}
function deleteData($id){
    global $connection;
    $query = "DELETE FROM data_pelanggan WHERE id = $id";
    mysqli_query($connection,$query);
    return mysqli_affected_rows($connection);
}
function editData($data,$id){
    global $connection;
    
    $nama = $data["nama"];
    $jenis = $data["jenis"];
    $merk = $data["merk"];
    $model = $data["model"];
    $nopol = $data["nopol"];
    $barang = $data["barang"];
    $service = $data["service"];
    $harga = $data["harga"];
    $estimasi = $data["estimasi"];
    $kontak = $data["kontak"];
    $lunas = $data["lunas"];

    $query = "UPDATE data_pelanggan SET nama= '$nama', jenis= '$jenis', merk= '$merk', model= '$model', nopol= '$nopol', barang= '$barang', service= '$service', harga= '$harga', estimasi= '$estimasi', kontak= '$kontak', lunas= '$lunas' WHERE id = $id";

    mysqli_query($connection,$query);

    if(mysqli_affected_rows($connection) > 0){
        echo "<script>
        alert('Data Berhasil Diupdate!');
        document.location.href = 'index.php';
        </script>";
    }else{
        echo ('Data Gagal Diupdate');
    }
}
function addAccount($name,$username,$hashpassword){
    global $connection;
    $query = "INSERT INTO akun VALUES (null,'$name','$username','$hashpassword')";
    mysqli_query($connection,$query);
    return $connection;
}
function loginAccount($username,$hashpassword){
    global $connection;
    $query = "SELECT * FROM akun WHERE username = '$username' AND password = '$hashpassword'";
    $result = mysqli_query($connection,$query);
    return $result;
}
function deleteAccount($akun){
    global $connection;
    $query = "DELETE FROM akun WHERE username = '$akun'";
    mysqli_query($connection, $query);
    mysqli_affected_rows($connection);
    session_unset();
    session_destroy();
    return $connection;
}
?>

<script>
    function startCountdown(targetDateStr, elementId) {
    let targetDate = new Date(targetDateStr).getTime();
    
    let countdownInterval = setInterval(function () {
        let now = new Date().getTime();
        let distance = targetDate - now;

        let days = Math.floor(distance / (1000 * 60 * 60 * 24));
        let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        let seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById(elementId).innerHTML = 
            days + "d " + hours + "h " + minutes + "m " + seconds + "s ";

        if (distance < 0) {
            clearInterval(countdownInterval);
            document.getElementById(elementId).innerHTML = "Service Selesai!";
            document.getElementById(elementId).classList.add("text-blue-700")
            return;
        }
    }, 1000);
}
</script>




<script src="https://unpkg.com/@phosphor-icons/web"></script>
<script src="https://cdn.tailwindcss.com"></script>