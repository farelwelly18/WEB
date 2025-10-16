<?php
require 'assets/function.php';

if(isset($_POST["konfirmasi"])){
    $_POST['date'] = GantiFormat($_POST['date']);
    SetProfil($_POST);
    echo "
    <script>
        document.location.href = 'Dashboard/homepage.php';
    </script>
    ";
}

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
        <h1 class="text-center text-2xl font-semibold mb-5">Atur Profil</h1>
        <hr class="text-stone-500 mb-12">
        <div class="mb-12">
           <div class="mb-3">
               <label for="pass" class=" ml-2">Username</label>
                <div class="w-full min-h-8 bg-slate-100 rounded-full shadow-sm shadow-slate-400 content-center">
                    <input type="text" id="username" name="username" placeholder="masukkan nama panjangmu" class="text-xs ml-3 my-auto focus:outline-none w-56" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="pass" class=" ml-2">Nickname</label>
                <div class="w-full min-h-8 bg-slate-100 rounded-full shadow-sm shadow-slate-400 content-center">
                    <input type="text" id="nick" name="nick" placeholder="masukkan nama panggilanmu" class="text-xs ml-3 my-auto focus:outline-none w-56" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="pass" class=" ml-2">Tanggal Lahir</label>
                <div class="w-full min-h-8 bg-slate-100 rounded-full shadow-sm shadow-slate-400 content-center">
                    <input type="date" id="date" name="date" placeholder="masukkan nama panggilanmu" class="text-xs ml-3 my-auto focus:outline-none w-56" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="pass" class=" ml-2">Tinggi</label>
                <div class="w-full min-h-8 bg-slate-100 rounded-full shadow-sm shadow-slate-400 content-center">
                    <input type="text" id="tinggi" name="tinggi" placeholder="masukkan nama panggilanmu" class="text-xs ml-3 my-auto focus:outline-none w-56" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="pass" class=" ml-2">Berat</label>
                <div class="w-full min-h-8 bg-slate-100 rounded-full shadow-sm shadow-slate-400 content-center">
                    <input type="text" id="berat" name="berat" placeholder="masukkan nama panggilanmu" class="text-xs ml-3 my-auto focus:outline-none w-56" required>
                </div>
            </div>
        </div>

        <div class="flex w-full mb-2 px-2">
            <button type="submit" name="konfirmasi" id="konfirmasi" class="ml-auto text-sm bg-blue-600 text-white py-1 px-5 rounded-full">
                Konfirmasi
            </button>
            <!-- <button type="submit" name="back" id="back" class="mr-auto text-sm bg-slate-200 border-1 border-black text-black py-1 px-5 rounded-full ">
                Back
            </button>
            <button type="submit" name="next" id="next" class="ml-auto text-sm bg-blue-600 text-white py-1 px-5 rounded-full ">
                Next
            </button> -->
        </div>
    </form>        

</body>
</html>