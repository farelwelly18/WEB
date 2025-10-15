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

 <!DOCTYPE html>
 <html>
 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Home</title>
     <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
 </head>
 <body>
    <div class="container">
        
    </div>
 </body>
 </html>