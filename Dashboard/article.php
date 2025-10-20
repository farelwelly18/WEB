<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artikel</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="../assets/icon/css/font-awesome.min.css">
</head>
<body class="bg-stone-100">

    <!-- Nav Bar -->
    <div class="nav container fixed bottom-0 w-full bg-white left-1/2 -translate-x-1/2 flex text-sm content-center justify-around gap-2 py-2 px-1 rounded-t-md">
        <div class="m-auto text-center flex-1 rounded-full scale-90">
            <a href="homepage.php">
                <i class="fa fa-home fa-2x" aria-hidden="true"></i>
            </a>
            <!-- <h4>Dashboard </h4> -->
        </div>
        <div class="m-auto text-center flex-1  rounded-full scale-75">
            <i class="fa fa-calendar fa-2x" aria-hidden="true"></i>
            <!-- <h4>Schedule</h4> -->
        </div>
        <div class="m-auto text-center flex-1  rounded-full scale-75 text-indigo-700">
            <i class="fa fa-file-text fa-2x" aria-hidden="true"></i>
            <!-- <h4>Article</h4> -->
        </div>
        <div class="m-auto text-center flex-1  rounded-full scale-90">
            <a href="profile.php">
                <i class="fa fa-user fa-2x" aria-hidden="true"></i>
            </a>
            <!-- <h4>Profil</h4> -->
        </div>
    </div>

    <!-- Upper? -->
    <div class="fixed top-0 w-full flex justify-between h-12 p-3 bg-stone-100 border-b-1 border-stone-400">
        <!-- Masukkan logo atau apalah -->
        <!-- <h1 class="text-xl">Welly Kesehatan</h1> -->
        <form action="" method="get" class="ml-auto my-auto pl-2 border-1 border-stone-400 rounded-lg overflow-hidden">
            <input type="search" name="search" placeholder="Cari artikel.." class=" focus:outline-none">
            <button class="bg-indigo-600 h-full w-8" type="submit">
                <i class="fa fa-search text-stone-200" aria-hidden="true" ></i>
            </button>
        </form>
    </div>

    <div class="mb-13"></div>  <!-- Batas Upper  -->

    <div class="container judul article">
        <a href="#" class="mb-2">
            <div class=" w-full max-h-64 mb-2 overflow-hidden hover:bg-stone-200 focus:bg-stone-400">
                <img src="../assets/image/article/alam.jpg" alt="" class="w-full max-h-44  object-cover">
                <div class="w-full pt-2 px-2 hover:bg-stone-200 focus:bg-stone-400">
                    <h2>Menikmati Alam Dapat Menghilangkan Resiko Bunuh Diri</h2>
                    <div class="flex">
                        <p class="text-xs my-auto text-stone-600 mr-auto">Diterbitkan oleh Farizz</p>
                        <p class="ml-auto my-auto text-stone-600 text-xs scale-90">12 Juni 2025</p>
                    </div>
                </div>
            </div>
        </a>
        <hr class="text-stone-300 mb-0.5">
        
    </div>


    
    <!-- Rule 34 ahhh slider -->
    <div class="text-xl m-2 flex">
        <div class="m-auto">
            <a href="" class="border-1 border-stone-600">&laquo;</a>
            <span class="border-1 border-stone-600 px-0.5"><a href="" class="text-base">1</a></span>
            <span class="border-1 border-stone-600 px-0.5"><a href="" class="text-base">2</a></span>
            <span class="border-1 border-stone-600 px-0.5"><a href="" class="text-base">3</a></span>
            <a href="" class="border-1 border-stone-600">&raquo;</a>
        </div>
    </div>
    <div class="flex m-auto"> 
        <form action="" method="get" class="text-sm m-auto">
            <div>Pergi Ke <input type="text" class="w-8 focus:outline-none border-b-1 text-center" name="sektor"> <button class="border-1 border-stone-600 p-0.5 bg-indigo-600 text-white">Go</button></div>
        </form>
    </div>

    <div class="mb-14"></div>
</body>
</html>