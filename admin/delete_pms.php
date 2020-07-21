<?php 
require '../functions.php';
$id_pemesanan = $_GET['id_pemesanan'];

if(dpms($id_pemesanan) > 0 ){
	echo "<script>
		document.location.href = 'index.php?page=info_pemesanan';
		</script>";
}else{
	"<script>
		document.location.href = 'index.php';
		</script>";
}
?>