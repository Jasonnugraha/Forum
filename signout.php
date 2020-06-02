<?php
include 'connect.php';
include 'header.php';
unset($_SESSION["signed_in"]);
echo '
    <script>
        window.location.replace("/index.php")
    </script>';
include 'footer.php'
?>