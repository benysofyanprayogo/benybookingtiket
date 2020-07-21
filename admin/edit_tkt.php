<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<?php
include"../functions.php";
$id_tkt=$_GET['id_tkt'];

if( isset($_POST["edit"]) ) {
	
	// cek apakah data berhasil diubah atau tidak
	if( etkt($_POST) > 0 ) {
		echo "
			<script>
				alert('Data berhasil diubah!');
				document.location.href = 'index.php?page=info_tiket';
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

$kb=query("SELECT * FROM  tiket WHERE id_tkt = $id_tkt")[0];
?>
<div style="margin-top:30px;width:100%,height:50px;text-align:center;background:#da0000;color:#fff;line-height:60px;font-size:20px;margin-bottom:20px;">
Edit Keberangkatan
</div>
<form action="" method="post" enctype="multipart/form-data">
 		<input type="hidden" name="id_tkt" class="form-control" value =" <?php  echo $kb['id_tkt'];?>">
 		<b>Nama :</b> <input type="text" name="nama"  autocomplete="off" class="form-control" value =" <?php  echo $kb['nama'];?>" required><br>
 		<b>Kelas :</b><input type="text" name="kls" autocomplete="off" class="form-control" value =" <?php  echo $kb['kls'];?>" required><br>
 		<b>Harga : </b><input type="number" name="harga" autocomplete="off" class="form-control" value =" <?php  echo $kb['harga'];?>" required><br>
 		<b>Tujuan : </b><input type="text" name="tujuan" autocomplete="off" class="form-control" value =" <?php  echo $kb['tujuan'];?>" required><br>
 		<td><input type="submit" class="btn btn-danger" value="Edit" name="edit">
</form>