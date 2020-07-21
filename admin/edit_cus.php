<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<?php
include"../functions.php";
$id_cus=$_GET['id_cus'];

if( isset($_POST["edit"]) ) {
	
	// cek apakah data berhasil diubah atau tidak
	if( ecus($_POST) > 0 ) {
		echo "
			<script>
				alert('Data berhasil diubah!');
				document.location.href = 'index.php?page=info_customer';
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

$kb=query("SELECT * FROM  customer WHERE id_cus = $id_cus")[0];
?>
<div style="margin-top:30px;width:100%,height:50px;text-align:center;background:#da0000;color:#fff;line-height:60px;font-size:20px;margin-bottom:20px;">
Edit Customer
</div>
<form action="" method="post" enctype="multipart/form-data">
 		<input type="hidden" name="id_cus" class="form-control" value =" <?php  echo $kb['id_cus'];?>">
 		<b>Nama :</b> <input type="text" autocomplete="off" name="nama" class="form-control" value =" <?php  echo $kb['nama'];?>" required><br>
 		<b>Email :</b><input type="email" name="email" autocomplete="off" class="form-control" value =" <?php  echo $kb['email'];?>" required><br>
 		<b>Telepon : </b><input type="number" name="telepon"  autocomplete="off" class="form-control" value =" <?php  echo $kb['telepon'];?>" required><br>
 		<b>Password : </b><input type="password" name="password"  autocomplete="off" class="form-control" value =" <?php  echo $kb['password'];?>" required><br>
 		<b>Alamat : </b><input type="text" name="alamat" class="form-control"  autocomplete="off" value =" <?php  echo $kb['alamat'];?>" required><br>
 		<td><input type="submit" class="btn btn-danger" value="Edit" name="edit">
</form>