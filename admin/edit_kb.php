<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<?php
include"../functions.php";
$id_berangkat=$_GET['id_berangkat'];

if( isset($_POST["edit"]) ) {
	
	// cek apakah data berhasil diubah atau tidak
	if( ekb($_POST) > 0 ) {
		echo "
			<script>
				alert('Data berhasil diubah!');
				document.location.href = 'index.php?page=info_keberangkatan';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal diubah!');
				document.location.href = 'index.php';
			</script>
		";
	}


}

$kb=query("SELECT * FROM  keberangkatan WHERE id_berangkat = $id_berangkat")[0];
?>
<div style="margin-top:30px;width:100%,height:50px;text-align:center;background:#da0000;color:#fff;line-height:60px;font-size:20px;margin-bottom:20px;">
Edit Jadwal
</div>
<form action="" method="post" enctype="multipart/form-data">
 		<input type="hidden" name="id_berangkat" class="form-control" value =" <?php  echo $kb['id_berangkat'];?>" >
 		<b>Tujuan :</b> <input type="text" name="tujuan" autocomplete="off" class="form-control" value =" <?php  echo $kb['tujuan'];?>" required><br>
 		<b>Jadwal :</b><input type="time" name="jadwal" autocomplete="off" class="form-control" value =" <?php  echo $kb['jadwal'];?>" required><br>
 		<b>Rute : </b><input type="text" name="rute" autocomplete="off" class="form-control" value =" <?php  echo $kb['rute'];?>" required><br>
 		<td><input type="submit" class="btn btn-danger" value="Edit" name="edit">
</form>