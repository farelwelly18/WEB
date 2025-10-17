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

    $akun = Show("akun", $id)[0];


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="../assets/icon/css/font-awesome.min.css">

</head>
<body class="bg-stone-100">
    <div class="container bg-indigo-600 flex-col">
        <div class="container  w-full h-auto m-auto flex px-3 py-12 content-center">
            <h1 class="text-stone-100 text-2xl text-left m-auto">Selamat Pagi <?= $akun['nickname']?>!</h1>
        </div>
        <div class="container w-full m-auto rounded-t-lg bg-stone-100 py-6 px-4 border-t-1 ">
            <div class="mb-5">
                <h2 class="mb-2">Jadwal Hari Ini </h2>
                    <div class="Jadwal bg-stone-200 w-full h-32 mb-2 flex rounded-md">
                        <p class="m-auto text-sm text-stone-600">Tidak ada Jadwal Hari ini</p>
                    </div>
            </div>
            <div class="mb-5">
                <h2 class="mb-2">Tips Kesehatan</h2>
                <div class="Jadwal bg-stone-200 w-full min-h-12 mb-2 flex-col rounded-md p-2">
                    <p class="my-auto text-sm text-stone-600">"Olahragalah walau hanya punya waktu luang 5 menit"</p>
                </div>
            </div>
            <div class="mb-5">
                <h2 class="mb-2">Artikel Terbaru</h2>
                
            </div>
        </div>
    </div>
    <div class="">
        
    </div>
    <div class="nav container fixed bottom-0 w-full bg-stone-200 left-1/2 -translate-x-1/2 flex text-sm content-center justify-around gap-2 py-2 px-1 rounded-t-md border-stone-400 border-t-2">
        <div class="m-auto text-center flex-1 rounded-full scale-90 text-indigo-700">
            <i class="fa fa-home fa-2x" aria-hidden="true"></i>
            <!-- <h4>Dashboard </h4> -->
        </div>
        <div class="m-auto text-center flex-1  rounded-full scale-75">
            <i class="fa fa-calendar fa-2x" aria-hidden="true"></i>
            <!-- <h4>Schedule</h4> -->
        </div>
        <div class="m-auto text-center flex-1  rounded-full scale-75">
            <i class="fa fa-file-text fa-2x" aria-hidden="true"></i>
            <!-- <h4>Article</h4> -->
        </div>
        <div class="m-auto text-center flex-1  rounded-full scale-75">
            <a href="akun.php">
                <i class="fa fa-user fa-2x" aria-hidden="true"></i>
            </a>
            <!-- <h4>Profil</h4> -->
        </div>
    </div>
</body>
</html>