<?php 
session_start();
$id_tkt = $_GET["id_tkt"];
unset($_SESSION["keranjang"][$id_tkt]);
echo "<script>location='keranjang.php';</script>";
?>