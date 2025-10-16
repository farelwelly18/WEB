<?php
require '../assets/function2.php';
$id = HeckelDefender();
if (!isset($_COOKIE['id'])) {
        echo "
            <script>
            document.location.href = '../index.php';
            </script>
        ";
    }
    
$info = Show("akun", $id)[0];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="../assets/icon/css/font-awesome.min.css">
</head>
<body class="h-screen content-center justify-center bg-stone-100 text-stone-900">
    <div class="container m-auto bg-inherit rounded-lg max-w-96 h-auto p-3">
        <h1 class="text-2xl text-center font-bold mb-6 ">Profil Pribadi</h1>
        <img src="../assets/image/default.png" alt="" class="rounded-full w-24 m-auto mb-1">
        <h1 class="text-xl text-center font-semibold mb-3">Farizz</h1>
        <hr class="text-stone-500 mb-3">
        <div class="container bg-stone-100 w-full m-auto rounded-md px-2">
            <div class="container text-sm px-3 text-stone-950">
            <h4 class="mb-1 text-base text-stone-700">Username</h4>
                <div class="bg-slate-200 p-3 rounded-md mb-3">
                    <p class=""><?= $info["username"]; ?></p>
                </div>
            <h4 class="mb-1 text-base text-stone-700">Nickname</h4>
                <div class="bg-slate-200 p-3 rounded-md mb-3">
                    <p class=""><?= $info["nickname"]; ?></p>
                </div>
            <h4 class="mb-1 text-base text-stone-700">E-Mail</h4>
                <div class="bg-slate-200 p-3 rounded-md mb-3">
                    <p class=""><?= $info["email"]; ?></p>
                </div>
            <h4 class="mb-1 text-base text-stone-700">Tanggal Lahir</h4>
                <div class="bg-slate-200 p-3 rounded-md mb-3">
                    <p class=""><?= $info["tanggalLahir"]; ?></p>
                </div>
            <h4 class="mb-1 text-base text-stone-700">Umur</h4>
                <div class="bg-slate-200 p-3 rounded-md mb-3">
                    <p class=""><?= $info["umur"]; ?></p>
                </div>
            <h4 class="mb-1 text-base text-stone-700">Tinggi Badan</h4>
                <div class="bg-slate-200 p-3 rounded-md mb-3">
                    <p class=""><?= $info["tinggi"]; ?> cm</p>
                </div>
            <h4 class="mb-1 text-base text-stone-700">Berat Badan</h4>
                <div class="bg-slate-200 p-3 rounded-md mb-3">
                    <p class=""><?= $info["berat"]; ?> kg</p>
                </div>
            <h4 class="mb-1 text-base text-stone-700">Golongan Darah</h4>
                <div class="bg-slate-200 p-3 rounded-md mb-3">
                    <p class=""><?= $info["golonganDarah"]; ?></p>
                </div>
                <div class="container w-full content-between justify-between flex gap-7 mb-4">
                    <button class="m-auto flex-1 bg-blue-600 text-white p-1 px-2 rounded-md">
                        <i class="fa fa-cog" aria-hidden="true"></i>
                        Edit Profil
                    </button>
                    <button class="m-auto flex-1 bg-red-600 text-white p-1 px-2 rounded-md">
                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                        Hapus Akun
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>