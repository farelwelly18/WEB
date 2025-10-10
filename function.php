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
    //check password sama atau tidak
    if($pass == $passK){
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        mysqli_query($connect, "INSERT INTO `akun` (`id`, `email`, `password`, `username`, `nickname`, `verif`, `admin`) VALUES (NULL, '$email', '$pass', NULL, NULL, '0', '0')");
        return 0;
    }
    return 1;
}



?>