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
Managemen Tiket</b>
</div></h2>
		<hr>
    <br>
		<a href="index.php?page=input_tkt"><button type="submit" class="btn btn-success" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus"></span>Tambah</button></a>
		<br><br>
		<form class="form-horizontal">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Kelas</th>
						<th>Harga</th>
						<th>Tujuan</th>
						<th colspan="2"><center>Action</center></th>
					</tr>
				</thead>
				<tbody>
					<?php

						require '../functions.php';

						$query = mysqli_query($conn, "SELECT id_tkt, nama, kls, harga, tujuan FROM tiket")or die(mysqli_error());
										if(mysqli_num_rows($query) == 0){	
											echo '<tr><td colspan="5" align="center">Tidak ada data!</td></tr>';		
										}
											else
										{	
											$no = 1;				
											while($data = mysqli_fetch_array($query)){
											?>
												<tr>
													<td><?= $no; ?></td>
													<td><?= $data['nama']; ?></td>
													<td><?= $data['kls']; ?></td>
													<td>Rp. <?php echo number_format($data['harga']) ?></td>
													<td><?= $data['tujuan']; ?></td>
													<td>
														<a href="index.php?page=edit_tkt&id_tkt=<?= $data['id_tkt']; ?>"><span class="glyphicon glyphicon-edit"></span></a>
													</td>
													<td>
														<a href="delete_tkt.php?id_tkt=<?= $data['id_tkt']; ?>"><span class="glyphicon glyphicon-trash"></span></a>
													</td>
												</tr>
												<?php 
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
