<?php 
session_start();
session_unset();
session_destroy();
echo "<script>alert('Anda telah LOG OUT!');</script>";
echo "<script>location='index.php';</script>";


?>