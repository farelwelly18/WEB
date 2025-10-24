<?php
require "assets/function.php";


function Enkripsi($kata){
    $code = 'AES-256-CBC';
    $kataKunci = 'WellyKesehatan'; 
    $iv = "1234567890123456";

    $Enkripsi = openssl_encrypt($kata, $code, $kataKunci, 0, $iv);
    return $Enkripsi;
}

function UnEnkripsi($kata){
    $kode = 'AES-256-CBC'; // Must be the same method used for encryption
    $katakunci = 'WellyKesehatan'; // Must be the same key used for encryption
    $iv = "1234567890123456";

    $kata = openssl_decrypt($kata, $kode, $katakunci, 0, $iv);
    return $kata;
}
//Atas Fungsi

if(isset($_GET['secure'])){
    $unsecure = UnEnkripsi($_GET['secure']);
}
?>

<?php if(isset($_GET['secure'])):?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="container rounded-lg bg-slate-200 h-[90vh] m-auto content-center">
    <form action="" method="post" class="max-w-64 m-auto">
        <div class="mb-2">
            <!-- Password -->
            <label for="pass" class=" ml-2">Masukkan Password Baru</label>
            <div class="w-full min-h-8 bg-slate-100 rounded-full shadow-sm shadow-slate-400 content-center">
                <input type="password" id="pass" name="pass" placeholder="masukkan password" class="text-xs ml-3 my-auto focus:outline-none w-56" required>
            </div>
        </div>
        <div class="flex w-full mb-2">
            <!-- Submit -->
            <button type="submit" name="ganti" id="ganti" class="m-auto text-sm bg-slate-600 text-white py-1 px-5 rounded-xl ">
                Ganti
            </button>
        </div>
    </form>
</body>
</html>

<?php elseif(isset($_GET['email'])):
    $email = $_GET['email'];
    $secure = Enkripsi($email);
    echo $email;
    
    echo SendReset($email, $secure);
    echo "<script>alert('Silahkan Cek Email')</script>";
    echo "<script>
            document.location.href = 'index.php';
        </script>";
?>
<?php else:?>
    echo "
    <script>
        document.location.href = 'index.php';
    </script>
    ";

<?php endif; ?>
<?php 
if(isset($_POST['ganti'])){
    $pass = $_POST['pass'];
    // echo $pass;
    $pass = password_hash($pass, PASSWORD_DEFAULT);
    // echo $pass;
    $query = "
    UPDATE akun
    SET password = '$pass'
    WHERE email  = '$unsecure';
    ";
    mysqli_query($connect, $query);
    echo "
    <script>
        document.location.href = 'index.php';
    </script>
    ";
}

?>