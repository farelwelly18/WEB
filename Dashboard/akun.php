<?php
require '../assets/function2.php';
if (!isset($_COOKIE['id']) || !isset($_COOKIE['id2'])) {
        echo "
            <script>
            document.location.href = '../index.php';
            </script>
        ";
    }else{
        $id = HeckelDefender();
        $info = Show("akun", $id)[0];

    }
if (isset($_POST['hapus'])){
    // mysqli_query($connect, "DELETE FROM akun WHERE id = $id");
    setcookie("id", "biji", time()-2, "/WEB");
    setcookie("id2", "biji", time()-1,"/WEB");
    echo "
            <script>
            document.location.href = '../index.php';
            </script>
        ";
}

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
<body class="h-screen content-center justify-center bg-stone-100 text-stone-900" id="body">
    <!-- Bawah ini menghitamkan bg -->
    <div class=" fixed w-screen h-full bg-black opacity-70 z-10" style="display: none;" id="bg">
    </div>
    <!-- Bawah ini pesan hapus akun -->
    <div class=" top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 bg-stone-100 rounded-lg w-64 h-auto fixed z-20 px-3 py-5" style="display: none;" id="danger">
        <form action="" method="post">
        <h1 class="text-center font-bold mb-3">PERHATIAN!</h1>
        <hr class="text-stone-600 mb-3">
        <p class="mb-3">Apakah anda yakin ingin menghapus akun ini?</p>
        <div class="flex gap-2">
                <button class="m-auto flex-1 bg-blue-600 text-white p-1 px-2 rounded-md" onclick="gagalHapus()">
                    <i class="fa fa-times" aria-hidden="true" ></i>
                        Tidak
                </button>
                <button type="submit" name="hapus" id="hapus" class="m-auto flex-1 bg-red-600 text-white p-1 px-2 rounded-md">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                        Ya
                </button>
            </div>
        </form>
    </div>



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
                    <p class=""><?= $info["date"]; ?></p>
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
                    <?php if(is_null($info["darah"])):?>
                        <p class="">Silahkan Cek ke Dokter</p>
                    <?php else: ?>
                        <p class=""><?= $info["darah"]; ?></p>
                    <?php endif ?>
                </div>
                <div class="container w-full content-between justify-between flex gap-7 mb-4">
                    <button class="m-auto flex-1 bg-blue-600 text-white p-1 px-2 rounded-md">
                        <i class="fa fa-cog" aria-hidden="true"></i>
                        Edit Profil
                    </button>
                    <button class="m-auto flex-1 bg-red-600 text-white p-1 px-2 rounded-md" onclick="hapusTombol()">
                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                        Hapus Akun
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script>
        const bg = document.getElementById('bg');
        const danger = document.getElementById('danger');
        const body = document.getElementById('body');
        function hapusTombol(){
            bg.style.display = "block";
            danger.style.display = "block";
            body.style.overflow = "hidden";
        }
        function gagalHapus(){
            bg.style.display = "none";
            danger.style.display = "none";
            body.style.overflow = "scroll";
        }
    </script>
</body>
</html>