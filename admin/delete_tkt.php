<?php 
require '../functions.php';
$id_tkt = $_GET['id_tkt'];

if(dtkt($id_tkt) > 0 ){
	echo "<script>
		document.location.href = 'index.php?page=info_tiket';
		</script>";
}else{
	"<script>
		document.location.href = 'index.php';
		</script>";
}
?>