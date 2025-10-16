<?php 	
$host = "localhost";
$user = "root";
$pass = "";
$db = "kesehatan";

// Sesuaikan host dan db dengan yang ada di mysql mu


$connect = new mysqli($host, $user, $pass, $db);


function HeckelDefender(){
	$id = $_COOKIE['id'];
	$kode = 'AES-256-CBC'; // Must be the same method used for encryption
	$katakunci = 'WellyKesehatan'; // Must be the same key used for encryption
	$iv = $_COOKIE['id2'];

	$idTable = openssl_decrypt($id, $kode, $katakunci, 0, $iv);
	return $idTable;
}

function Show($table, $id = 0){
	//Gunakan id untuk data yang spesifik
	global $connect;
	if ($id > 0) {
		$query = "SELECT * FROM ".$table." WHERE id = ".$id;	
	}else{
		$query = "SELECT * FROM ".$table;
	}
	$result= mysqli_query($connect, $query);
	$tunggal=[];
	while ($tunggal = mysqli_fetch_assoc($result) ) {
		$majemuk[] = $tunggal;
	}
	return $majemuk;
}


?>