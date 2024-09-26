<?php
session_start();
include "connection.php";
include "is_login.php";
if(isset($_POST["submit"])){
    if(addData($_POST,$_FILES,null,"data_pelanggan") > 0){
        echo "<script>
        alert('Data berhasil ditambah');
        document.location.href = 'index.php';
        </script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class="bg-[#161B22]">
    <?php include "navbar.php" ?>
    <section class="shadow-md sm:rounded-lg p-10">
        <form class="max-w-md mx-auto flex flex-col p-10 rounded-lg bg-gray-800" action="" method="post" enctype="multipart/form-data">
            <h1 class="text-3xl font-bold text-white">TAMBAH DATA</h1>
            <label for="nama" class="text-lg font-normal  mb-1 mt-3 text-white">Nama</label>
            <input type="text" id="nama" name="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
        
            <label for="jenis" class="text-lg font-normal  mb-1 mt-3 text-white">Jenis</label>
            <input type="text" id="jenis" name="jenis" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            
            <label for="merk" class="text-lg font-normal  mb-1 mt-3 text-white">Merk</label>
            <input type="text" id="merk" name="merk" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            
            <label for="model" class="text-lg font-normal  mb-1 mt-3 text-white">Model</label>
            <input type="text" id="model" name="model" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            
            <label for="nopol" class="text-lg font-normal  mb-1 mt-3 text-white">Nopol</label>
            <input type="text" id="nopol" name="nopol" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            
            <label for="image" class="text-lg font-normal  mb-1 mt-3 text-white">Foto</label>
            <input type="file" id="image" name="image" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            
            <label for="barang" class="text-lg font-normal  mb-1 mt-3 text-white">Barang/Sparpart</label>
            <input type="text" id="barang" name="barang" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            
            <label for="service" class="text-lg font-normal  mb-1 mt-3 text-white">Service</label>
            <input type="text" id="service" name="service" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            
            <label for="harga" class="text-lg font-normal  mb-1 mt-3 text-white">Harga</label>
            <input type="text" id="harga" name="harga" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
              
            <label for="estimasi" class="text-lg font-normal  mb-1 mt-3 text-white">Estimasi</label>
            <input type="text" id="estimasi" name="estimasi" placeholder="Tahun-Bulan-Tanggal HH:MM:SS" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            
            <label for="kontak" class="text-lg font-normal  mb-1 mt-3 text-white">Kontak</label>
            <input type="text" id="kontak" name="kontak" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            
            <label for="lunas" class="text-lg font-normal  mb-1 mt-3 text-white">Lunas</label>
            <input type="text" id="lunas" name="lunas" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
        
            <button type="submit" name="submit" class="mt-5 text-white bg-[#238636] hover:opacity-90 focus:ring-4 focus:outline-none  font-medium rounded-lg text-base w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
        </form>
    </section>
</body>
</html>