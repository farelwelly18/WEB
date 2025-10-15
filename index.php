<?php
    require 'assets/function.php';
   
    if(isset($_POST['Login'])){
        $email = $_POST['email'];
        $search = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM akun where email = '$email'"));
        $hasil = Login($_POST);
        if ($hasil === 0 ) {
            if (is_null($search['nickname'])) {
                echo "
                <script>
                document.location.href = 'awal.php';
                </script>
                ";
            }
            echo "
            <script>
            document.location.href = 'Dashboard/homepage.php';
            </script>
            ";
        }else if($hasil === 1){
            $bug = 1 ;
        }else{
            $bug = 0 ;
        }
    }
    
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
    <form action="" method="post" class="max-w-64 m-auto">
        <h1 class="text-center text-2xl font-semibold mb-5">Login</h1>
        <div class="mb-3">
            <!-- Email -->
            <label for="pass" class=" ml-2">Email</label>
            <div class="w-full min-h-8 bg-slate-100 rounded-full shadow-sm shadow-slate-400 content-center">
                <input type="email" id="email" name="email" placeholder="masukkan email" class="text-xs ml-3 my-auto focus:outline-none w-56" required>
            </div>
        </div>
        <div class="mb-4">
            <!-- Password -->
            <label for="pass" class=" ml-2">Password</label>
            <div class="w-full min-h-8 bg-slate-100 rounded-full shadow-sm shadow-slate-400 content-center">
                <input type="password" id="pass" name="pass" placeholder="masukkan password" class="text-xs ml-3 my-auto focus:outline-none w-56" required>
            </div>
        </div>
        <?php if(isset($bug)): ?>
            <?php if($bug>0):?>
                <!-- Isi jika Email belum diverifikasi -->
                <p class="text-xs text-red-700 text-center mb-3">
                    Verifikasi E-Mail Terlebih Dahulu!
                </p>
            <?php else:?>
                <!-- Isi jika Password/Email Salah -->
                <p class="text-xs text-red-700 text-center mb-3">
                    Email/Password Salah!
                </p>
            <?php endif;?>
        <?php endif?>
            
        <div class="flex w-full mb-2">
            <!-- Submit -->
            <button type="submit" name="Login" id="Login" class="m-auto text-sm bg-slate-600 text-white py-1 px-5 rounded-xl ">
                Login
            </button>
        </div>
        <p class="text-stone-600 text-xs text-center">Belum punya akun? <a href="daftar.php" class="text-sky-500">Daftar!</a></p>
    </form>        

    

</body>
</html>
