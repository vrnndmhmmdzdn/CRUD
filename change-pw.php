<?php
session_start();
include "connection.php";
include "navbar.php";
include "is_login.php";

if(isset($_POST["confirm"])){
    $akun = $_GET["username"];
    $current = $_POST["current"];
    $hashCurrent = hash("sha256",$current);
    $new = $_POST["new"];
    $hashNew = hash("sha256",$new);
    $result = checkPassword($akun,$hashCurrent);

   if($result > 0){
        if(switchPassword($hashNew,$akun) > 0){
        echo "<script>
        alert('Password berhasil diubah!');
        document.location.href = 'index.php';
        </script>";
        }else{
            echo "<script>
            alert('Password gagal diubah!');
            </script>";
        }
    }else{
            echo "<script>alert('Password yang anda masukkan salah!')</script>";
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
<body>
<section class="bg-gray-50 dark:bg-gray-900">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
            BengkelAN 
        </a>
        <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    Change Your Password
                </h1>
                <form class="" action="" method="post">
                        <label for="current" class="block text-sm font-medium text-gray-900 dark:text-white ">Enter your current password</label>
                        <input type="password" name="current" id="current" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mt-2 mb-4" placeholder="••••••••" required="">

                        <label for="new" class="block text-sm font-medium text-gray-900 dark:text-white">Enter new password</label>
                        <input type="password" name="new" id="new" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mt-2 mb-4" required="">

                    <button type="submit" name="confirm" class="w-full text-white bg-gray-600 hover:bg-gray-400 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 mt-10 mb-3">Confirm</button>
                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                        Forgot your password? <a href="" class="font-medium text-primary-600 hover:underline dark:text-primary-500">click here</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>
</body>
</html>