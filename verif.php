<?php 	
require 'assets/function.php';
if (isset($_GET['id'])){
	$id = $_GET['id'];
	echo $id;
	mysqli_query($connect, "UPDATE akun SET verif = 1 WHERE email = '$id'");

}
echo "
    <script>
    document.location.href = 'index.php';
    </script>
    ";


 ?>