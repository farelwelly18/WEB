<?php
require 'assets/function.php';

if(isset($_POST["daftar"])){
    $hasil = Daftar($_POST);
    if($hasil === 0){
        $emailKirim = SendEmail($_POST['emailD']);
        if ($emailKirim === 0 ) {
            echo "
            <script>
            document.location.href = 'index.php';
            </script>
            ";
        }else{ echo "Gagal"; } }else if($hasil === 1){ $bug = 0; }else{ $bug =
        1; } }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- 
cd ../../.../
cd xampp\htdocs\webKesehatan
     -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WELl WEB</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="container rounded-lg bg-slate-200 h-[90vh] m-auto content-center">
    <form action="" method="post" class="max-w-64 m-auto">
        <h1 class="text-center text-2xl font-semibold mb-5">Daftar</h1>
        <div class="mb-3">
            <label for="pass" class=" ml-2">Email</label>
            <div class="w-full min-h-8 bg-slate-100 rounded-full shadow-sm shadow-slate-400 content-center">
                <input type="email" id="emailD" name="emailD" placeholder="masukkan email aktif" class="text-xs ml-3 my-auto focus:outline-none w-56" required>
            </div>
        </div>
        <div class="mb-3">
            <label for="pass" class=" ml-2">Password</label>
            <div class="w-full min-h-8 bg-slate-100 rounded-full shadow-sm shadow-slate-400 content-center">
                <input type="password" id="passD" name="passD" placeholder="masukkan password" class="text-xs ml-3 my-auto focus:outline-none w-56" required>
            </div>
        </div>
        <div class="mb-3">
            <label for="pass" class=" ml-2">Konfirmasi Password</label>
            <div class="w-full min-h-8 bg-slate-100 rounded-full shadow-sm shadow-slate-400 content-center">
                <input type="password" id="passK" name="passK" placeholder="konfirmasi password" class="text-xs ml-3 my-auto focus:outline-none w-56" required>
            </div>
        </div>
        <?php if(isset($bug)): ?>
            <?php if($bug>0):?>
                <!-- Isi jika Email belum diverifikasi -->
                <p class="text-xs text-red-700 text-center mb-3">
                    Konfirmasi Password Salah!
                </p>
            <?php else:?>
                <!-- Isi jika Password/Email Salah -->
                <p class="text-xs text-red-700 text-center mb-3">
                    Email Sudah Terdaftar!
                </p>
            <?php endif;?>
        <?php endif?>
        <div class="flex w-full mb-2">
            <button type="submit" name="daftar" id="daftar" class="m-auto text-sm bg-slate-600 text-white py-1 px-5 rounded-xl">
                Daftar
            </button>
        </div>
        <p class="text-stone-600 text-xs text-center">sudah punya akun? <a href="index.php" class="text-sky-500">Login!</a></p>
    </form>        

</body>
</html>