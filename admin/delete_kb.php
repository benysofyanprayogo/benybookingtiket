<?php 
require '../functions.php';
$id_berangkat = $_GET['id_berangkat'];

if(dkb($id_berangkat) > 0 ){
	echo "<script>
		document.location.href = 'index.php?page=info_keberangkatan';
		</script>";
}else{
	"<script>
		document.location.href = 'index.php';
		</script>";
}
?>