<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
</head>
<body>

</body>
</html>
<style>
	table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #ffdbdb}

th {
    background-color: #e33d3d;
    color: white;
}

	
</style>
<div class="row">
	<div class="col-md-12">
		<h2><div style="margin-top:30px;width:100%,height:50px;text-align:center;background:#da0000;color:#fff;line-height:60px;font-size:20px;"><b>
Managemen Customer</b>
</div></h2>
		<hr>
    <br>
		<a href="index.php?page=input_cus"><button type="submit" class="btn btn-success" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus"></span>Tambah</button></a>
		<br><br>
		<form class="form-horizontal">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Email</th>
						<th>Telepon</th>
						<th>Alamat</th>
						<th colspan="2"><center>Action</center></th>
					</tr>
				</thead>
				<tbody>
					<?php

						require '../functions.php';

						$query = mysqli_query($conn, "SELECT id_cus, nama, email, telepon, alamat FROM customer")or die(mysqli_error());
										if(mysqli_num_rows($query) == 0){	
											echo '<tr><td colspan="5" align="center">Tidak ada data!</td></tr>';		
										}
											else
										{	
											$no = 1;				
											while($data = mysqli_fetch_array($query)){	
						 						echo '<tr>';
												echo '<td>'.$no.'</td>';
												echo '<td>'.$data['nama'].'</td>';
												echo '<td>'.$data['email'].'</td>';
												echo '<td>'.$data['telepon'].'</td>';
												echo '<td>'.$data['alamat'].'</td>';
		echo '<td><a href=index.php?page=edit_cus&id_cus='.$data['id_cus'].'><span class="glyphicon glyphicon-edit"></a></td>';
												echo '<td><a href=delete_cus.php?id_cus='.$data['id_cus'].'><span class="glyphicon glyphicon-trash"></span></a></td>';
												echo '</tr>';
												$no++;	
											}
										}
							
								?>
				    				
				</tbody>
			</table>
		</form>
	</div>
</div>

<!-- Modal Tambah Data Keberangkatan -->
