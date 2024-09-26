<?php
session_start();
include "connection.php";
include "is_login.php";
$customers = getData("SELECT * FROM data_pelanggan");

if(isset($_POST["button"])){
    $keyword = $_POST["search"];
    $customers = search($keyword);
};

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
<div class="w-full flex flex-col gap-5 justify-center items-center py-5">
    <h1 class="text-3xl text-white font-bold">Selamat Datang, <?= $_SESSION['name']; ?>!</h1>
</div>
<section class="relative h-screen overflow-x-auto shadow-md sm:rounded-lg p-10">
    <div class="w-full justify-between flex flex-row items-start">
        <a class="py-2 px-5 text-white font-semibold rounded-lg hover:opacity-70 bg-[#238636]" href="tambah.php">Tambah +</a>
        <form action="" method="post" class="space-x-1 mt-2 relative">
            <span class="absolute top-1/4 left-4"><i class="ph ph-magnifying-glass text-white"></i></span>
            <input type="text" name="search"class="pr-3 pl-9 py-1 w-72 bg-[#0D1117] text-white rounded-md border border-gray-500" placeholder="Search">
                
            <button type="submit" name="button" class="bg-[#238636] hover:opacity-70 h-fit py-1 px-3 rounded-md text-white hidden">Search</button>
        </form>
    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nama
                </th>
                <th scope="col" class="px-6 py-3">
                    Merk Mobil
                </th>
                <th scope="col" class="px-6 py-3">
                    Kontak
                </th>
                <th scope="col" class="px-6 py-3">
                    Jenis Service
                </th>
                <th scope="col" class="px-6 py-3">
                    Waktu Check In
                </th>
                <th scope="col" class="px-6 py-3">
                    Estimasi
                </th>
                <th scope="col" class="px-6 py-3">
                    Selengkapnya
                </th>
                <th scope="col" class="px-6 py-3">
                    Aksi
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($customers as $customer):?>
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <?= $customer["nama"]?>
                </th>
                <td class="px-6 py-4">
                    <?= $customer["merk"]?>
                </td>
                <td class="px-6 py-4">
                    <?= $customer["kontak"]?>
                </td>
                <td class="px-6 py-4">
                    <?= $customer["service"]?>
                </td>
                <td class="px-6 py-4">
                    <?= $customer["waktu"]?>
                </td>
                <td class="px-6 py-4" id="estimasi_<?= $customer['id'] ?>">
                    <script>
                        startCountdown("<?= $customer['estimasi']?>", "estimasi_<?= $customer['id'] ?>")   
                    </script>
                </td>
                <td class="px-6 py-4">
                    <a href="info.php?id=<?= $customer["id"]?>" class="font-normal text-blue-600 underline hover:opacity-70 ">Lihat</a>
                </td>
                <td class="px-6 py-4">
                    <a href="edit.php?id=<?= $customer["id"]?>" class="mr-2">
                        <i class="ph ph-pencil-simple font-bold text-xl text-[#238636] hover:underline hover:opacity-70 "></i>
                    </a>
                    <a href="delete.php?id=<?= $customer["id"]?>">
                        <i class="ph ph-trash-simple font-bold text-xl text-[#F85149] hover:underline hover:opacity-70 "></i>
                    </a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</section>
</body>
</html>