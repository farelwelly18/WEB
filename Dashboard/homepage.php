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
// Waktu
date_default_timezone_set('Asia/Jakarta');
$time = date("H");
if($time>17){
    $time = 'Malam';
}elseif($time>14){
    $time = 'Sore';
}elseif($time>11){
    $time = 'Siang';
}elseif($time>5){
    $time = 'Pagi';
}else{
    $time = 'Dini';
}

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
        <div class="absolute right-0 p-1 w-auto">
            <div class="flex p-1 text-white bg-red-600 rounded-sm text-xs"><a  href="../keluar.php" class="flex gap-1">Log Out<i class="fa fa-sign-out m-auto" aria-hidden="true"></i></a></div>
        </div>
        <div class="container w-full h-auto m-auto flex px-3 py-12 content-center">
            <div class="text-left m-auto">
                <h1 class="text-stone-100 text-2xl text-left m-auto">Selamat <?= $time?> <?= $akun['nickname']?>!</h1>
                <div id="clock" class="text-stone-100 text-center"></div>
            </div>
        </div>
        <div class="container w-full m-auto rounded-t-xl bg-stone-100 py-6 px-4">
            <div class="mb-5">
                <h2 class="mb-2">Jadwal Hari Ini </h2>
                    <div class="Jadwal bg-stone-200 w-full h-32 mb-2 flex rounded-md">
                        <p class="m-auto text-sm text-stone-600">Tidak ada Jadwal Hari ini</p>
                    </div>
            </div>
            <div class="mb-5">
                <h2 class="mb-2">Tips Kesehatan</h2>
                <div class="Jadwal bg-stone-200 w-full min-h-12 mb-2 flex-col rounded-md p-2">
                    <p class="my-auto text-sm text-stone-600">Olahragalah walau hanya punya waktu luang 5 menit</p>
                </div>
            </div>
            <div class="mb-10">
                <h2 class="mb-2">Artikel Terbaru</h2>
                <a href="#" class="hover:bg-stone-200 focus:bg-stone-400">
                    <div class=" w-full max-h-64 mb-2 overflow-hidden hover:bg-stone-200 focus:bg-stone-400">
                        <img src="../assets/image/article/alam.jpg" alt="" class="w-full max-h-45  object-cover">
                        <div class="w-full pt-2 px-2 hover:bg-stone-200 focus:bg-stone-400">
                            <h2>Menikmati Alam Dapat Menghilangkan Resiko Bunuh Diri</h2>
                        </div>
                    </div>
                    <hr class="text-stone-300">
                </a>
                <a href="#" class="hover:bg-stone-200 focus:bg-stone-400">
                    <div class=" w-full max-h-64 mb-2 overflow-hidden hover:bg-stone-200 focus:bg-stone-400">
                        <img src="../assets/image/article/doctorHouse.avif" alt="" class="w-full max-h-45  object-cover">
                        <div class="w-full pt-2 px-2 hover:bg-stone-200 focus:bg-stone-400">
                            <h2>Dokter Gila Dari Entah Berantah Minum Pipis Pasiennya!</h2>
                        </div>
                    </div>
                    <hr class="text-stone-300">
                </a>
                
            </div>
        </div>
    </div>
    <div class="">
        
    </div>

    <!-- Bagian bawaha adalah navigasi -->
    <div class="nav container fixed bottom-0 w-full bg-stone-200 left-1/2 -translate-x-1/2 flex text-sm content-center justify-around gap-2 py-2 px-1 rounded-t-md shadow-sm shadow-stone-400">
        <div class="m-auto text-center flex-1 rounded-full scale-90 text-indigo-700">
            <i class="fa fa-home fa-2x" aria-hidden="true"></i>
            <!-- <h4>Dashboard </h4> -->
        </div>
        <div class="m-auto text-center flex-1  rounded-full scale-75">
            <i class="fa fa-calendar fa-2x" aria-hidden="true"></i>
            <!-- <h4>Schedule</h4> -->
        </div>
        <div class="m-auto text-center flex-1  rounded-full scale-75">
            <a href="article.php">
                <i class="fa fa-file-text fa-2x" aria-hidden="true"></i>
            </a>
            <!-- <h4>Article</h4> -->
        </div>
        <div class="m-auto text-center flex-1  rounded-full scale-90">
            <a href="profile.php">
                <i class="fa fa-user fa-2x" aria-hidden="true"></i>
            </a>
            <!-- <h4>Profil</h4> -->
        </div>
    </div>
    <script>
        function updateClock() {
        const now = new Date();
        const hours = now.getHours().toString().padStart(2, '0');
        const minutes = now.getMinutes().toString().padStart(2, '0');
        const seconds = now.getSeconds().toString().padStart(2, '0');

        const timeString = `${hours}:${minutes}:${seconds}`;
        document.getElementById('clock').textContent = timeString;
    }
        updateClock(); // Display initial time
        setInterval(updateClock, 1000); // Update every second
    </script>
</body>
</html>