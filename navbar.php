<?php
if(isset($_POST["logout"])){
    session_unset();
    session_destroy();
    echo "<script>
    alert('Anda Telah Logout');
    document.location.href = 'login.php';
    </script>";
}
// if(isset($_POST["hapusakun"])){
//     session_unset();
//     session_destroy();
//     echo "<script>
//     alert('Akun Anda Telah Dihapus, Silahkan Register Kembali');
//     document.location.href = 'login.php';
//     </script>";
// }
?>
<nav class="w-full px-7 flex justify-end bg-[#0D1117]">
    <form action="" method="post" class="flex mt-3 gap-3">
        <!-- <button type="submit" name="hapusakun" class="py-1 px-3 bg-[#212830] text-[#F85149] text-sm font-bold flex flex-row justify-center items-center gap-2 rounded-lg hover:opacity-80">Delete Akun
        </button> -->
        <a href="delete-account.php?username=<?= $_SESSION['username'] ?>" class="py-1 px-3 bg-[#212830] text-[#F85149] text-sm font-bold flex flex-row justify-center items-center gap-2 rounded-lg hover:opacity-80">Delete Account</a>
        <button type="submit" name="logout" class="py-1 px-3 bg-[#212830] text-[#F85149] text-sm font-bold flex flex-row justify-center items-center gap-2 rounded-lg hover:opacity-80">
            <span>Log Out</span>
            <i class="ph ph-sign-out font-bold text-xl"></i>
        </button>
    </form>
</nav>