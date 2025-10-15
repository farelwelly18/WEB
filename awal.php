<?php
require 'assets/function.php';

if(isset($_POST["konfirmasi"])){
   SetNama($_POST);
    
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
        <h1 class="text-center text-2xl font-semibold mb-5">Atur Namamu</h1>
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
        <div class="flex w-full mb-2">
            <button type="submit" name="konfirmasi" id="konfirmasi" class="m-auto text-sm bg-slate-600 text-white py-1 px-5 rounded-full ">
                Konfirmasi
            </button>
        </div>
    </form>        

</body>
</html>