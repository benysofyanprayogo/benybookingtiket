<?php 
session_start();
//mendapatkan id_produk dari  url
$id_tkt = $_GET['id_tkt'];

//jika sdh ada produk itu dikeranjang,maka produk itu jumlahnya di +1
if (isset($_SESSION['keranjang'][$id_tkt])) 
{
	$_SESSION['keranjang'][$id_tkt]+=1;
}
//selain itu (blm ada dikeranjang) maka produk itu dianggap dibeli 1
else
{
	$_SESSION['keranjang'][$id_tkt]=1;
}

echo "<script>location='keranjang.php';</script>";


 ?>