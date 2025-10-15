<?php 	
require 'assets/function.php';
if (isset($_GET['id'])){
	echo "string";
	$id = $_GET['id'];
	mysqli_query($connect, "UPDATE akun SET verif = 1 WHERE id = $id");
}else{
	echo "
        <script>
        document.location.href = 'index.php';
        </script>
        ";
}

 ?>