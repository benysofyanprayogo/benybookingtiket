<?php
require '../functions.php'; 

$info_keberangkatan = query("SELECT * FROM keberangkatan");
?>



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
Managemen Jadwal</b>
</div></h2>
		<hr>
		
    <br>
		<a href="index.php?page=input_kb"><button type="submit" class="btn btn-success" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus"></span>Tambah</button></a>
		<br><br>
		<form class="form-horizontal">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Tujuan</th>
						<th>Jadwal</th>
						<th>Rute</th>
						<th colspan="2"><center>Action</center></th>
					</tr>
				</thead>
				<tbody>
<?php $i = 1; ?>
	<?php foreach( $info_keberangkatan as $row ) : ?>
	<tr>
		<td><?= $i; ?></td>
		
		
		<td><?= $row["tujuan"]; ?></td>
		<td><?= $row["jadwal"]; ?></td>
		<td><?= $row["rute"]; ?></td>
		<td><a href="index.php?page=edit_kb&id_berangkat=<?= $row['id_berangkat']; ?>"><span class="glyphicon glyphicon-edit"></span></a></td>
		<td><a href="delete_kb.php?id_berangkat=<?= $row['id_berangkat']; ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
	</tr>
	<?php $i++; ?>
	<?php endforeach; ?>
	
				    				
				</tbody>
			</table>
		</form>
	</div>
</div>

<!-- Modal Tambah Data Keberangkatan -->
