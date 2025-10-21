<?php 
setcookie("id", "biji", time()-2, "/");
setcookie("id2", "biji", time()-1,"/");
echo "
            <script>
            document.location.href = 'index.php';
            </script>
        ";
?>