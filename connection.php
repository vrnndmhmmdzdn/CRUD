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
function addData($data, $file,$akunBaru ,$tabel){
    global $connection;
    $args = func_get_args();
    $nonNull = 0;
    foreach ($args as $arg) {
        if ($arg !== null) {
            $nonNull++;
        }
    }
    $query = "";

    if($nonNull == 2){
        $name = $akunBaru[0];
        $username = $akunBaru[1];
        $password = $akunBaru[2];
        $query = "INSERT INTO $tabel VALUES (null,'$name','$username','$password')";
    }
    if($nonNull == 3){
        $nama = $data["nama"];
        $jenis = $data["jenis"];
        $merk = $data["merk"];
        $model = $data["model"];
        $nopol = $data["nopol"];
        $image = uploadImage($file);
        $barang = $data["barang"];
        $service = $data["service"];
        $harga = $data["harga"];
        $estimasi = $data["estimasi"];
        $kontak = $data["kontak"];
        $lunas = $data["lunas"];

        if($image == false){
        return false; //bisa diganti required
        }
        $query = "INSERT INTO $tabel VALUES (null,'$nama','$jenis','$merk','$model','$nopol','$image','$barang','$service','$harga',null,'$estimasi','$kontak','$lunas')";
    }  
    mysqli_query($connection,$query);
    return mysqli_affected_rows($connection);
    // if(mysqli_affected_rows($connection) > 0){
    //     echo "<script>
    //     alert('Data Berhasil Ditambahkan!');
    //     document.location.href = 'index.php';
    //     </script>";
    // }else{
    //     echo ('Data Gagal Ditambahkan');
    // }
}
function deleteData($id,$tabel){
    global $connection;
    $query = "DELETE FROM $tabel WHERE id = $id";
    mysqli_query($connection,$query);
    return mysqli_affected_rows($connection);
}
function editData($data,$file,$id){
    global $connection;
    
    $nama = $data["nama"];
    $jenis = $data["jenis"];
    $merk = $data["merk"];
    $model = $data["model"];
    $nopol = $data["nopol"];
    $image = uploadImage($file);
    $oldimage = $data["old_image"];
    $barang = $data["barang"];
    $service = $data["service"];
    $harga = $data["harga"];
    $estimasi = $data["estimasi"];
    $kontak = $data["kontak"];
    $lunas = $data["lunas"];

    if($file["image"]["error"] === 4){
        $image = $oldimage;
    }else{
        $image = uploadImage($file);
    }
    

    if($image == false){
        return false;
        //bisa diganti required
    }
    $query = "UPDATE data_pelanggan SET nama= '$nama', jenis= '$jenis', merk= '$merk', model= '$model', nopol= '$nopol',image= '$image', barang= '$barang', service= '$service', harga= '$harga', estimasi= '$estimasi', kontak= '$kontak', lunas= '$lunas' WHERE id = $id";

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
function loginAccount($username,$hashpassword){
    global $connection;
    $query = "SELECT * FROM akun WHERE username = '$username' AND password = '$hashpassword'";
    $result = mysqli_query($connection,$query);
    return $result;
}
function checkPassword($akun,$hashCurrent){
    global $connection;
    $query = "SELECT * FROM akun WHERE username = '$akun' AND password = '$hashCurrent'";
    mysqli_query($connection,$query);
    return mysqli_affected_rows($connection);
}
function switchPassword($hashNew, $akun){
    global $connection;
    $query = "UPDATE akun SET password= '$hashNew' WHERE username = '$akun'";
    mysqli_query($connection, $query);
    return mysqli_affected_rows($connection);
}
function deleteAccount($akun){
    global $connection;
    $query = "DELETE FROM akun WHERE username = '$akun'";
}
function search($keyword){
    $query = "SELECT * FROM data_pelanggan WHERE nama LIKE '%$keyword%' OR kontak LIKE '%$keyword%' OR service LIKE '%$keyword%' OR merk LIKE '%$keyword%';";
    return getData($query);
}
function uploadImage($file,$oldimage = null){
    $namaFile = $file['image']['name'];
    $error = $file['image']['error'];
    $ukuranFile = $file['image']['size'];
    $tmpName = $file['image']['tmp_name'];
    $typeFile = $file['image']['type'];

    $ekstensi = ["jpg", "jpeg", "png"];
    $ekstensiFile = explode('.',$namaFile);
    $resultekstensi = strtolower(end($ekstensiFile));

    $namaFileId = uniqid();
    $namaFileId .= ".";
    $namaFileId .= $resultekstensi;

    if($error > 0){
        echo "<script>
        alert('Gagal upload!');
        </script>";
        return false;
    }
    //in_array = apakah di dalam array $resultekstensi ada file yang bernama seperti di dalam $ekstensi ==>
    if(!in_array($resultekstensi, $ekstensi)){
        echo "<script>
        alert('Format tidak didukung!');
        </script>";
        return false;
    }
    if($ukuranFile > 10000000){
        echo "<script>
        alert('Ukuran file terlalu besar!');
        </script>";
        return false;
    }
    if($oldimage == null){
        $namaFileId = generateName($resultekstensi);
    }

    
    // echo $namaFileId;
    //parameter pertama untuk mengambil dimana penyimpanan pertama sebelum nya, yang kedua ke folder mana file akan di pindahkan 
    move_uploaded_file($tmpName,'images/' . $namaFileId);
    return $namaFileId;
}
function generateName($ekstensi){
    $namaFileId = uniqid();
    $namaFileId .= ".";
    $namaFileId .= $ekstensi;
    return $namaFileId;
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