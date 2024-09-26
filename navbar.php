<?php
if(isset($_POST["logout"])){
    session_unset();
    session_destroy();
    echo "<script>
    alert('Anda Telah Logout');
    document.location.href = 'login.php';
    </script>";
}
?>
<nav class="w-full px-7 flex justify-end bg-[#0D1117]">
    <form action="" method="post" class="flex mt-3 gap-3">
        <a href="change-pw.php?username=<?= $_SESSION['username'] ?>" class="py-1 px-3 bg-[#212830] text-[#F85149] text-sm font-bold flex flex-row justify-center items-center gap-2 rounded-lg hover:opacity-80">Change Password</a>
        <a href="delete-account.php?id=<?= $_SESSION['id'] ?>" class="py-1 px-3 bg-[#212830] text-[#F85149] text-sm font-bold flex flex-row justify-center items-center gap-2 rounded-lg hover:opacity-80">Delete Account</a>
        <button type="submit" name="logout" class="py-1 px-3 bg-[#212830] text-[#F85149] text-sm font-bold flex flex-row justify-center items-center gap-2 rounded-lg hover:opacity-80">
            <span>Log Out</span>
            <i class="ph ph-sign-out font-bold text-xl"></i>
        </button>
    </form>
</nav>