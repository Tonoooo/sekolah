<?php 
include 'header.php';
include 'koneksi.php';
?>
<br><br><br><br><br>

<div class="container-md container-mt5 bg-white">
	<br><br>
	<h1 style="text-align: center;">Sistem Pencatatan Infrastruktur Teknologi Informasi </h1>
  	<br>
	<!-- diagram batang -->
	<div class="row mt-3">
		<div class="col-sm-7 mt-5">
			<div class="card">
				<div class="card-header"><center>IT</center></div>
				<div class="card-body">
					<div style="width: 700px; margin: 0px auto;">
						<canvas id="diagram_batang"></canvas>
					</div>
				</div>
			</div>
		</div>
		<!-- card jumlah pengguna & divisi -->
		<div class="col-sm-5">
				<div class="row" style="margin-bottom: 0; margin-top: 40px">
					<div class="col-sm-5" style="width: 270px;">
						<div class="card" style="background: #42a5f5;">
							<div class="card-header">
								<h1>
									<img src="assets/user_icon.png" style="width: 18%; height: 10%">
									<span style="float: right;">
		                                <?php 
		                                $jumlah_pengguna = mysqli_query($koneksi, "SELECT  * FROM data_pengguna");
										echo mysqli_num_rows($jumlah_pengguna);
		                                ?>
		                            </span>
		                            </h1>Jumlah Pengguna
	                        </div>
						</div>
					</div>	
					<div class="col">
						<div class="col-sm-8" style="width: 250px">
							<div class="card" style="background: #42a5f5;">
								<div class="card-header">
									<h1>
										<img src="assets/divisi.png" style="width: 18%; height: 10%">
										<span style="float: right;">
								            <?php 
											$jumlah_devisi = mysqli_query($koneksi, "SELECT  * FROM data_devisi");
											echo mysqli_num_rows($jumlah_devisi);
											?>
							        	</span>
							        </h1>Jumlah Divisi
						        </div>
							</div>
						</div>
					</div>
				</div>
				<!-- diagram lingkaran -->
			<br><br>
			<div class="card"  style="width:525px; height: 285px">
				<div class="card-header"><center>Laptop & Komputer</center></div>
				<div class="card-body">
					<div style="width: 400px;margin: 0px auto;">
						<canvas id="diagram_lingkaran"></canvas>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br><br>

	
	<!--     Nav tabs untuk tabel pengguna, divisi, laptop, & komputer     -->
	  <ul class="nav nav-tabs" role="tablist">
	    <li class="nav-item">
	      <a class="nav-link active" data-bs-toggle="tab" href="#pengguna">Pengguna</a>
	    </li>
	    <li class="nav-item">
	      <a class="nav-link" data-bs-toggle="tab" href="#divisi">Divisi</a>
	    </li>
	    <li class="nav-item">
	      <a class="nav-link" data-bs-toggle="tab" href="#laptop">Laptop</a>
	    </li>
	    <li class="nav-item">
	      <a class="nav-link" data-bs-toggle="tab" href="#komputer">Komputer</a>
	    </li>
	  </ul>
	<div class="tab-content">
		<div id="pengguna" class="container tab-pane active"><br>
			<center><h3>Data Pengguna</h3></center>
			<table class="table table-white table-bordered table-striped">
					<tr>
						<th width="1%">No</th>
						<th>Nama Pengguna</th>
					</tr>
					<?php 
					    $data = mysqli_query($koneksi, "select * from data_pengguna"); 
					    $no = 1;
					    while ($d=mysqli_fetch_array($data)) {
							?>
							<tr>
								<td><?php echo $no++; ?></td>
								<td><?php echo $d['nama']; ?></td>
							</tr>
						<?php 
					} ?>
				</table>
		</div>
		<div id="divisi" class="container tab-pane fade"><br>
			<center><h3>Data Divisi</h3></center>
			<table class="table table-bordered table-striped">
					<tr>
						<th width="1%">No</th>
						<th>Nama Divisi</th>
					</tr>
				<?php 
				$no = 1;
				$data = mysqli_query($koneksi, "select * from data_devisi");
				while ($d=mysqli_fetch_array($data)) {
					?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $d['nama_devisi']; ?></td>
					</tr>
					<?php 
				} ?>
				</table>
		</div>
		<div id="laptop" class="container tab-pane fade"><br>
			<center><h3>Data Laptop</h3></center>
			<table class="table table-bordered table-striped">
					<tr>
						<th width="1%">No</th>
						<th>Devisi </th>
						<th>Pengguna</th>
						<th>Merk</th>
						<th>Tipe</th>
						<th>Processor</th>
						<th>Ram</th>
						<th>SSD</th>
						<th>HDD</th>
						<th>OS</th>
						<th>No Seri</th>
						<th>Akun Email Microsoft</th>
						<th>Password Email Microsoft</th>
					</tr>
				<?php 
				$no = 1;
				$data = mysqli_query($koneksi, "SELECT data_inventaris.id_data_laptop, data_devisi.nama_devisi, data_pengguna.nama, data_laptop.merk, data_laptop.tipe, data_laptop.processor, data_laptop.ram, data_laptop.ssd, data_laptop.hdd, data_laptop.os, data_laptop.no_seri, data_laptop.akun_email_microsoft, data_laptop.password_email_microsoft FROM data_inventaris JOIN data_devisi ON data_devisi.id = data_inventaris.id_data_devisi JOIN data_pengguna ON data_pengguna.id = data_inventaris.nama_pengguna_id JOIN data_laptop ON data_laptop.id = data_inventaris.id_data_laptop ORDER BY id_data_laptop");
				while ($d=mysqli_fetch_array($data)) {
					?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $d['nama_devisi']; ?></td>
						<td><?php echo $d['nama']; ?></td>
						<td><?php echo $d['merk']; ?></td>
						<td><?php echo $d['tipe']; ?></td>
						<td><?php echo $d['processor']; ?></td>
						<td><?php echo $d['ram']; ?></td>
						<td><?php echo $d['ssd']; ?></td>
						<td><?php echo $d['hdd']; ?></td>
						<td><?php echo $d['os']; ?></td>
						<td><?php echo $d['no_seri']; ?></td>
						<td><?php echo $d['akun_email_microsoft']; ?></td>
						<td><?php echo $d['password_email_microsoft']; ?></td>
					</tr>
					<?php 
				} ?>
				</table>
		</div>
		<div id="komputer" class="container tab-pane fade"><br>
			<center><h3>Data Komputer</h3></center>
			<table class="table table-bordered table-striped">
					<tr>
						<th width="1%">No</th>
						<th>Komputer</th>
						<th>Monitor</th>
						<th>Mainboard</th>
						<th>Processor</th>
						<th>RAM</th>
						<th>VGA</th>
						<th>HDD</th>
						<th>SSD</th>
						<th>OS</th>
					</tr>
				<?php 
				$no = 1;
				$data = mysqli_query($koneksi, "SELECT data_devisi.nama_devisi, data_pengguna.nama, data_pc.computer_name, data_monitor.merk, data_pc.mainboard, data_pc.processor, data_pc.ram,data_pc.vga,data_pc.hdd,data_pc.ssd,data_pc.os FROM data_devisi JOIN data_inventaris ON data_devisi.id=data_inventaris.id_data_devisi JOIN data_pengguna ON data_pengguna.id=data_inventaris.nama_pengguna_id JOIN data_pc ON data_pc.id=data_inventaris.id_data_pc JOIN data_monitor ON data_monitor.id=data_inventaris.id_data_monitor ORDER BY id_data_pc");
				while ($d=mysqli_fetch_array($data)) {
					?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $d['computer_name']; ?></td>
						<td><?php echo $d['merk']; ?></td>
						<td><?php echo $d['mainboard']; ?></td>
						<td><?php echo $d['processor']; ?></td>
						<td><?php echo $d['ram']; ?></td>
						<td><?php echo $d['vga']; ?></td>
						<td><?php echo $d['hdd']; ?></td>
						<td><?php echo $d['ssd']; ?></td>
						<td><?php echo $d['os']; ?></td>
					</tr>
					<?php 
				} ?>
				</table>
		</div>
	</div>


</div>


<!-- Untuk grafik bar -->

<script type="text/javascript">
	var ctx = document.getElementById("diagram_batang").getContext('2d');
	var myChart = new Chart(ctx, {type:'bar',
		data: {
			labels: ['Software', 'Printer','Scanner','Monitor','Hardisk'],
			datasets: [{
				label: '',
				data: [
				<?php 
				$jumlah_software = mysqli_query($koneksi, "SELECT  * FROM data_software");
				echo mysqli_num_rows($jumlah_software);
				?>,
				<?php 
				$jumlah_printer = mysqli_query($koneksi, "SELECT  * FROM data_printer");
				echo mysqli_num_rows($jumlah_printer);
				?>,
				<?php 
				$jumlah_scanner = mysqli_query($koneksi, "SELECT  * FROM data_scanner");
				echo mysqli_num_rows($jumlah_scanner);
				?>,
				<?php 
				$jumlah_monitor = mysqli_query($koneksi, "SELECT  * FROM data_monitor");
				echo mysqli_num_rows($jumlah_monitor);
				?>,
				<?php 
				$jumlah_hardisk = mysqli_query($koneksi, "SELECT  * FROM db_hdd_eks");
				echo mysqli_num_rows($jumlah_hardisk);
				?>
				],
				backgroundColor: [
					'rgba(178, 132, 190, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(175, 0, 42, 0.2)',
					'rgba(255, 126, 0, 0.2)',
					'rgba(47, 79, 79, 0.2)'
					],
				borderColor: [
					'rgba(178, 132, 190, 1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(175, 0, 42, 1)',
					'rgba(255, 126, 0, 1)',
					'rgba(47, 79, 79, 1)'
					],
				borderWidth: 1
			}]

		},
		options: {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero:true
					}
				}]
			}
		}
	});
</script>


<!-- untuk diagram lingkaran -->
<script>
 
        var ctx = document.getElementById("diagram_lingkaran").getContext("2d");
        // tampilan chart
        var piechart = new Chart(ctx,{type: 'pie',
        data : {
        // label nama setiap Value
        labels:[
                  'Laptop',
                  'Komputer'
          ],
        datasets: [{
          // Jumlah Value yang ditampilkan
           data:[<?php 
				$jumlah_laptop = mysqli_query($koneksi, "SELECT  * FROM data_laptop");
				echo mysqli_num_rows($jumlah_laptop);
				?>,
				<?php 
				$jumlah_pc = mysqli_query($koneksi, "SELECT  * FROM data_pc");
				echo mysqli_num_rows($jumlah_pc);
				?>],
 
          backgroundColor:[
          		 'rgba(3, 115, 252, 0.5)',
                 'rgba(3, 194, 252, 0.5)'
                 ]
        }],
        }
        });
 
    </script>



<?php include 'footer.php'; ?>