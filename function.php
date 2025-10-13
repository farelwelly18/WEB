<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "kesehatan";

// Sesuaikan host dan db dengan yang ada di mysql mu


$connect = new mysqli($host, $user, $pass, $db);

function Login($data){
    global $connect;
    $email = $data['email'];
    $pass = $data['pass'];


}

function Daftar($data){
    global $connect;
    $email = $data['emailD'];
    $pass = $data['passD'];
    $passK = $data['passK'];

    //Check ada email sama atau tidak

    $temp = mysqli_query($connect, "SELECT * FROM akun where email = '$email'");
    $temp = mysqli_fetch_assoc($temp);
    if (is_null($temp)) {
        if($pass == $passK){
            $pass = password_hash($pass, PASSWORD_DEFAULT);
            mysqli_query($connect, "INSERT INTO `akun` (`id`, `email`, `password`, `username`, `nickname`, `verif`, `admin`) VALUES (NULL, '$email', '$pass', NULL, NULL, '0', '0')");
            return 0;
        }
        return 2;
    }

    //check password sama atau tidakk

    return 1;
}

        // $biji = mysqli_query($connect, "SELECT * FROM akun where email = 'farisabdillah1806@gmail.com'");
        // $biji = mysqli_fetch_assoc($biji);
        // if (!is_null($biji)) {
        //     var_dump($biji);
        // }
?>