<?php
echo "TESTIS";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WELl WEB</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="container rounded-lg bg-slate-200 h-[90vh] m-auto content-center">
    <form action="" class="max-w-64 m-auto">
        <h1 class="text-center text-2xl font-semibold mb-5">Login</h1>
        <div class="mb-3">
            <label for="pass" class=" ml-2">Email</label>
            <div class="w-full min-h-8 bg-slate-100 rounded-full shadow-sm shadow-slate-400 content-center">
                <input type="email" id="email" name="email" placeholder="masukkan email" class="text-xs ml-3 my-auto focus:outline-none">
            </div>
        </div>
        <div class="mb-5">
            <label for="pass" class=" ml-2">Password</label>
            <div class="w-full min-h-8 bg-slate-100 rounded-full shadow-sm shadow-slate-400 content-center">
                <input type="password" id="pass" name="pass" placeholder="masukkan password" class="text-xs ml-3 my-auto focus:outline-none">
            </div>
        </div>
        <div class="flex w-full mb-2">
            <!-- <input type="submit" name="submit" id="submit" class="text-sm text-center m-auto bg-sky-500 px-4 rounded-full py-1 text-white" placeholder="Login"> -->
            <button type="submit" name="submit" id="submit" class="m-auto text-sm bg-slate-600 text-white py-1 px-5 rounded-full ">
                Login
            </button>
        </div>
        <p class="text-stone-600 text-xs text-center">Belum punya akun? <a href="daftar.php" class="text-sky-500">Daftar!</a></p>
    </form>        

</body>
</html>
