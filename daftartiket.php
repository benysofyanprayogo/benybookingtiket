<?php include 'navbar.php'; ?>
<section class="konten">
  <div class="container">
    <center><h1>Daftar Tiket</h1></center><br>
<form class="form-horizontal">
  		<table class="table table-striped">
    		<thead>
      			<tr class="bg-info">
      				<th>NO</th>
					<th>NAMA TIKET</th>
					<th>KELAS</th>
					<th>HARGA</th>
					<th>TUJUAN</th>
					<th>OPSI</th>
     			</tr>
    		</thead>
    		<tbody>
    			<?php
    				include 'functions.php';
    				
					$tkt=query("SELECT * FROM tiket");
					$no=1;

					foreach($tkt as $t) :
						?>
						<tr>
							<td><?= $no; ?></td>
							<td><?= $t["nama"]; ?></td>
							<td><?= $t["kls"]; ?></td>
							<td><?= $t["harga"]; ?></td>
							<td><?= $t["tujuan"]; ?></td>
							<td>
            					<a href="beli.php?id_tkt=<?= $t['id_tkt']; ?>">Pesan</a>
        
							</td>
						</tr>
						<?php $no++; ?>
					<?php endforeach; ?>

			
			
				
    		</tbody>
  		</table>
  	</form>
    </div></section>

