<?php
session_start();
include "connection.php";
$login_message = "";
if(isset($_SESSION["is_login"])){
    header("location: index.php");
}

if(isset($_POST["submit"])){
    $username = $_POST["email"];
    $password = $_POST["password"];
    $hashpassword = hash("sha256",$password);
    $result = loginAccount($username,$hashpassword);

    if($result && $result->num_rows > 0){
        $login_message = "Selamat Datang";
        $data = $result->fetch_assoc();
        $_SESSION["name"] = $data["nama"];
        $_SESSION["username"] = $data["username"];
        $_SESSION["is_login"] = true;
        echo "<script>
        alert('$login_message');
        document.location.href = 'index.php';
        </script>";
    }else {
        $login_message = "Akun Tidak Ditemukan!";
        echo "<script>
        alert('$login_message');
        </script>" ;
    }
    $connection->close();
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
                  Sign in to your account
              </h1>
              <form class="" action="" method="post">
                      <label for="email" class="block text-sm font-medium text-gray-900 dark:text-white ">Your email</label>
                      <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mt-2 mb-4" placeholder="example@gmail.com" required="">

                      <label for="password" class="block text-sm font-medium text-gray-900 dark:text-white">Password</label>
                      <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mt-2 mb-4" required="">

                  <button type="submit" name="submit" class="w-full text-white bg-gray-600 hover:bg-gray-400 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 mt-10 mb-3">Sign in</button>
                  <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                      Don’t have an account yet? <a href="register.php" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Register</a>
                  </p>
              </form>
          </div>
      </div>
  </div>
</section>
</body>
</html>