<?php 	
require '../assets/function2.php';
	$id = HeckelDefender();
if (!isset($_COOKIE['id'])) {
        echo "
            <script>
            document.location.href = '../index.php';
            </script>
        ";
    }

echo $id; 


 ?>