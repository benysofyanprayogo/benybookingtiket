<?php 
require '../functions.php';
$id_cus = $_GET['id_cus'];

if(dcus($id_cus) > 0 ){
	echo "<script>
		document.location.href = 'index.php?page=info_customer';
		</script>";
}else{
	"<script>
		document.location.href = 'index.php';
		</script>";
}
?>