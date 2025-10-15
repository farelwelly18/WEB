<?php 	

function HeckelDefender(){
	$id = $_COOKIE['id'];
	$kode = 'AES-256-CBC'; // Must be the same method used for encryption
	$katakunci = 'WellyKesehatan'; // Must be the same key used for encryption
	$iv = $_COOKIE['id2'];

	$idTable = openssl_decrypt($id, $kode, $katakunci, 0, $iv);
	return $idTable;
}

 ?>