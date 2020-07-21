<?php 
require '../functions.php';
if(isset($_POST['submit'])){
	if(icus($_POST) > 0 ){
		echo "<script>
		document.location.href = 'index.php?page=info_customer';
		</script>";
	}else{
		header('Location : index.php');
	}
}
?>


	<div style="margin-top:30px;width:100%,height:50px;text-align:center;background:#da0000;color:#fff;line-height:60px;font-size:20px;"><b>
Tambah Data Customer</b>
</div>
<form method="post" class="form-group"  enctype="multipart/form-data" style="margin-top:20px;">
	<br>
	<input type="text" name="nama" placeholder="Nama" class="form-control" autocomplete="off" required><br>
	<input type="email" name="email" placeholder="Email" class="form-control"  autocomplete="off" autosave="off" required><br>
	<input type="number" name="telepon" placeholder="Telepon" class="form-control" autocomplete="off" required><br>
	<input type="text" name="alamat" placeholder="Alamat" class="form-control" autocomplete="off" required><br>
	<input type="password" name="password" placeholder="Password" class="form-control" autocomplete="off" autosave="off" required><br>
	<button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#myModal" name="submit">Simpan</button><br>
	</form>