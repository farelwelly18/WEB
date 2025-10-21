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

function GantiFormat($ymd){
    $old    = explode("-", $ymd);
    $bulan  = ["Januari", "Februari", "Maret", "April", "Meil", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
    $bulanN = $bulan[$old[1]-1];
    $new    = $old[2]." ".$bulanN." ".$old[0];
    return $new;
}

function SetProfil($data){
    global $connect;
    $id = HeckelDefender();
	$asli = Show("akun", $id)[0];
    $username =  mysqli_real_escape_string($connect, htmlspecialchars($data['username']));
    $nickname =  mysqli_real_escape_string($connect, htmlspecialchars($data['nick']));
    $tinggi =  mysqli_real_escape_string($connect, htmlspecialchars($data['tinggi']));
    $berat =  mysqli_real_escape_string($connect, htmlspecialchars($data['berat']));
    $date =  mysqli_real_escape_string($connect, htmlspecialchars($data['date']));
	$gambar = mysqli_real_escape_string($connect, htmlspecialchars($data['gambar']));
	if(!empty($date)){
		$umur = explode(" ", $date);
		$umur = 2025 - $umur[2];
	}else{
		$umur = $asli['umur'];
		$date = $asli['date'];
	}
    $query = "
    UPDATE akun
    SET username = '$username',
        nickname = '$nickname',
        tinggi   = '$tinggi',
        berat    = '$berat',
        date     = '$date',
        umur     = '$umur',
		gambar   = '$gambar'
    WHERE id = $id;
    ";
    mysqli_query($connect, $query);
}

?>