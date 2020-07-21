<?php include 'navbar.php'; ?>
<section class="konten">
  <div class="container">
    <center><h1>Info Jadwal</h1></center><br>
<form class="form-horizontal">
  		<table class="table table-striped">
    		<thead>
      			<tr class="bg-info">
					<th>NO</th>
					<th>JADWAL</th>
					<th>TUJUAN</th>
					<th>RUTE</th>	
     			</tr>
    		</thead>
    		<tbody>
    			<?php

    				include 'functions.php';

					$query = mysqli_query($conn, "SELECT * FROM keberangkatan ORDER BY tujuan ASC")or die(mysqli_error());
						if(mysqli_num_rows($query) == 0){	
							echo '<tr><td colspan="3" align="center">Tidak ada data!</td></tr>';		
						}
						else
						{	
							$no = 1;				
							while($data = mysqli_fetch_array($query)){	
								echo '<tr>';
								echo '<td>'.$no.'</td>';
								echo '<td>'.$data['jadwal'].'</td>';
								echo '<td>'.$data['tujuan'].'</td>';
								
								echo '<td>'.$data['rute'].'</td>';
								$no++;	
							}
						}
			
				?>
    		</tbody>
  		</table>
	</form>
    </div></section>

