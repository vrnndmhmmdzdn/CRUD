<?php
session_start();
include "connection.php";
include "is_login.php";
$id = $_GET["id"];
$customers = getData("SELECT * FROM data_pelanggan WHERE id = $id");

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
<section class="relative h-fit overflow-x-auto shadow-md sm:rounded-lg flex flex-col justify-center items-center pb-10">
    <div class="w-full my-10">
        <h1 class="text-3xl text-white font-bold text-center">Data Lengkap Customer</h1>
    </div>
    <table class="w-[700px] text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Info
                </th>
                <th scope="col" class="px-6 py-3">
                    Keterangan
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($customers as $customer):?>
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Nama
                </th>
                <th class="px-6 py-4 text-white">
                    <?= $customer["nama"]?>
                </th>
            </tr>
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Jenis
                </th>
                <td class="px-6 py-4">
                    <?= $customer["jenis"]?>
                </td>
            </tr>
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Merk
                </th>
                <td class="px-6 py-4">
                    <?= $customer["merk"]?>
                </td>
            </tr>
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Model
                </th>
                <td class="px-6 py-4">
                    <?= $customer["model"]?>
                </td>
            </tr>
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Nomer Polisi
                </th>
                <td class="px-6 py-4">
                    <?= $customer["nopol"]?>
                </td>
            </tr>
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Foto
                </th>
                <td class="px-6 py-4">
                    <div class="max-w-40 aspect-video overflow-hidden flex items-center">
                        <img src="images/<?= $customer["image"]?>" class="object-cover w-full">
                    </div>
                </td>
            </tr>
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Barang
                </th>
                <td class="px-6 py-4">
                    <?= $customer["barang"]?>
                </td>
            </tr>
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Service
                </th>
                <td class="px-6 py-4">
                    <?= $customer["service"]?>
                </td>
            </tr>
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Harga
                </th>
                <td class="px-6 py-4">
                    <?= $customer["harga"]?>
                </td>
            </tr>
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Waktu Check In
                </th>
                <td class="px-6 py-4">
                    <?= $customer["waktu"]?>
                </td>
            </tr>
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Estimasi Selesai
                </th>
                <td class="px-6 py-4" id="estimasi_<?= $customer['id'] ?>">
                    <span>
                        <?= $customer["estimasi"]?>
                    </span>  
                    <span>
                        <script>
                            startCountdown("<?= $customer['estimasi']?>", "estimasi_<?= $customer['id'] ?>")   
                        </script>
                    </span>
                </td>
            </tr>
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Kontak
                </th>
                <td class="px-6 py-4">
                    <?= $customer["kontak"]?>
                </td>
            </tr>
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Lunas/Belum
                </th>
                <td class="px-6 py-4">
                    <?= $customer["lunas"]?>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <div class="w-[700px] py-3 flex gap-2 justify-end">
        <a href="edit.php?id=<?= $customer["id"]?>" class="px-4 py-2 bg-[#238636] text-white font-semibold rounded-md hover:opacity-90">
            Edit Data
        </a>
        <a href="delete.php?id=<?= $customer["id"]?>" class="px-4 py-2 bg-[#212830] text-[#F85149] rounded-md font-semibold hover:opacity-90">
            Delete Data
        </a>
    </div>
</section>
</body>
</html>