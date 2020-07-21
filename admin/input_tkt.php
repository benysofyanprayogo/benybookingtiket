<?php 
require '../functions.php';
if(isset($_POST['submit'])){
	if(itkt($_POST) > 0 ){
		echo "<script>
		document.location.href = 'index.php?page=info_tiket';
		</script>";
	}else{
		header('Location : index.php');
	}
}
?>


	<div style="margin-top:30px;width:100%,height:50px;text-align:center;background:#da0000;color:#fff;line-height:60px;font-size:20px;"><b>
Tambah Data Tiket</b>
</div>
<form method="post" class="form-group"  enctype="multipart/form-data" style="margin-top:20px;">
	<br>
	<input type="text" name="nama" placeholder="Nama" class="form-control" autocomplete="off" required><br>
	<input type="text" name="kls" placeholder="Kelas" class="form-control" autocomplete="off" required><br>
	<input type="number" name="harga" placeholder="Harga" class="form-control" autocomplete="off" required><br>
	<input type="text" name="tujuan" placeholder="Tujuan" class="form-control" autocomplete="off" required><br>
	<button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#myModal" name="submit">Simpan</button><br>
	</form>