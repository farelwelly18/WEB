<?php 



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="../assets/icon/css/font-awesome.min.css">
</head>
<body class="p-2">
    <h1 class="text-2xl text-center p-6">Tabel Semua Akun</h1>

    <table class="w-full text-center border-collapse border-stone-600 m-auto">
        <tr class="h-12 bg-blue-600 text-white">
            <th class="w-6">No</th>
            <th class="w-8">Id</th>
            <th class="max-w-26">Photo Profil</th>
            <th>Email</th>
            <th>Nama Panjang</th>
            <th>Nickname</th>
            <th>Tanggal Lahir</th>
            <th>Umur</th>
            <th>Tinggi</th>
            <th>Berat</th>
            <th>Terakhir Login</th>
        </tr>
        <tr class=" border-b-1">
            <td>1</td>
            <td>2</td>
            <td class="h-28 flex"><img src="../assets/image/profile/2.png" alt="" class="w-24 h-24 object-cover rounded-full text-center m-auto"></td>
            <td>farisabdillah@gmail.com</td>
            <td>Muhammad Fahrian Faris Abdillah</td>
            <td>Farizz</td>
            <td>18 Juni 2009</td>
            <td>16</td>
            <td>155 cm</td>
            <td>49 kg</td>
            <td>18 Juni 2008</td>
        </tr>
    </table>
</body>
</html>