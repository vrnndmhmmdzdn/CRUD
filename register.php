<?php
include "connection.php";
session_start();
$register_message = "";
if(isset($_SESSION["is_login"])){
    header("location: index.php");
}

if(isset($_POST["submit"])){
    $hashpassword = hash("sha256",$_POST["password"]);
    $akunBaru = [$_POST["name"],$_POST["username"], $hashpassword];
    
    if(empty($akunBaru[1]) || empty($akunBaru[2])){
        $register_message = "Input Tidak Boleh Kosong!";
    }else{
        try{
            addData(null,null,$akunBaru,"akun");
            if(mysqli_affected_rows($connection) > 0){
                $register_message = "Register Berhasil!";
                $result = loginAccount($akunBaru[1],$akunBaru[2]);
                $data = $result->fetch_assoc();
                $_SESSION["id"] = $data["id"]; 
                $_SESSION["name"] = $data["nama"]; 
                $_SESSION["username"] = $data["username"]; 
                $_SESSION["is_login"] = true;
                echo "<script>
                alert('$register_message');
                document.location.href = 'index.php';
                </script>";
            }else{
                $register_message = "Register Gagal!";
            }
        }catch(mysqli_sql_exception){
            $register_message = "Username Telah Digunakan!";
        }
        $connection->close();
    }
    echo "<script>alert('$register_message');</script>";

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
                  Register
              </h1>
              <form class="" action="" method="post">
                      <label for="name" class="block text-sm font-medium text-gray-900 dark:text-white ">Nama</label>
                      <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mt-2 mb-4" required>
                      
                      <label for="username" class="block text-sm font-medium text-gray-900 dark:text-white ">E-Mail</label>
                      <input type="email" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mt-2 mb-4" placeholder="example@gmail.com" required>

                      <label for="password" class="block text-sm font-medium text-gray-900 dark:text-white">Password</label>
                      <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mt-2 mb-4" required>

                  <button type="submit" name="submit" class="w-full text-white bg-gray-600 hover:bg-gray-400 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 mt-10 mb-3">Register</button>
                  <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                      have an account? <a href="login.php" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Login</a>
                  </p>
              </form>
          </div>
      </div>
  </div>
</section>
</body>
</html>