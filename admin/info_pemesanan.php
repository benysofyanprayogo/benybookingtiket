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
Managemen Pemesanan</b>
</div></h2>
		<hr>
   
		<form class="form-horizontal">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Customer</th>
						<th>Tanggal</th>
						<th>Total</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php

						require '../functions.php';

						$query = mysqli_query($conn, "SELECT * FROM pemesanan JOIN customer ON pemesanan.id_cus=customer.id_cus")or die(mysqli_error());
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
												echo '<td>'.$data['tgl_pemesanan'].'</td>';
												?>



												<td>Rp. <?= number_format($data["ttl_pemesanan"]) ?></td>

												<?php
		echo '<td>
		<a href=index.php?page=detail&id_pemesanan='.$data['id_pemesanan'].' class="btn btn-info">Detail</a>';
		echo '<a href=delete_pms.php?id_pemesanan='.$data['id_pemesanan'].' class="btn btn-danger">Hapus</a></td>';
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
