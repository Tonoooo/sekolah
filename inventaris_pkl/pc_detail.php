<?php 
include 'header.php';
include 'koneksi.php'; ?>

<br><br><br>

<div class="container mt-5">
	<div class="card">
		<?php 
		$id_pc = $_GET['id'];

		$data = mysqli_query($koneksi, "SELECT data_inventaris.id_data_pc, data_devisi.nama_devisi, data_pengguna.nama, data_pc.computer_name,data_pc.mainboard,data_pc.processor,data_pc.ram,data_pc.vga,data_pc.hdd,data_pc.ssd,data_pc.os,data_pc.mac_address,data_pc.no_seri FROM data_inventaris JOIN data_devisi ON data_devisi.id = data_inventaris.id_data_devisi JOIN data_pengguna ON data_pengguna.id = data_inventaris.nama_pengguna_id JOIN data_pc ON data_pc.id = data_inventaris.id_data_pc WHERE data_pc.id='$id_pc'");
		while ($d=mysqli_fetch_array($data)) {
		 	?>
		 	<div class="card-header text-center">
				<h3>Detail Komputer <?php echo $d['computer_name']; ?></h3>
			</div>

			<div class="card-body">
				<table class="table">
					<tr>
						<th>Divisi</th>
						<th>:</th>
						<td><?= $d['nama_devisi']; ?></td>
					</tr>
					<tr>
						<th>Pengguna</th>
						<th>:</th>
						<td><?= $d['nama']; ?></td>
					</tr>
					<tr>
						<th>Nama Komputer</th>
						<th>:</th>
						<td><?= $d['computer_name']; ?></td>
					</tr>
					<tr>
						<th>Mainboard</th>
						<th>:</th>
						<td><?= $d['mainboard']; ?></td>
					</tr>
					<tr>
						<th>Processor</th>
						<th>:</th>
						<td><?= $d['processor']; ?></td>
					</tr>
					<tr>
						<th>RAM</th>
						<th>:</th>
						<td><?= $d['ram'] ?></td>
					</tr>
					<tr>
						<th>VGA</th>
						<th>:</th>
						<td><?= $d['vga']; ?></td>
					</tr>
					<tr>
						<th>HDD</th>
						<th>:</th>
						<td><?= $d['hdd']; ?></td>
					</tr>
					<tr>
						<th>SSD</th>
						<th>:</th>
						<td><?= $d['ssd']; ?></td>
					</tr>
					<tr>
						<th>OS</th>
						<th>:</th>
						<td><?= $d['os']; ?></td>
					</tr>
					<tr>
						<th>mac_address</th>
						<th>:</th>
						<td><?= $d['mac_address']; ?></td>
					</tr>
					<tr>
						<th>no_seri</th>
						<th>:</th>
						<td><?= $d['no_seri'];?></td>
					</tr>

				</table>

				<br>
				<div class="row">
					<div class="col-sm-12 p-3">
						<h3><center>Software</center></h3>
					</div>
					<hr>
					<div class="col-sm-6 p-3" style="align-content: right;">
						
							<form method="post" action="pc_software_tambah.php">
								<div class="input-group">
									<input type="hidden" value="<?php echo $id_pc;?>" name="id_pcnya">
									<span class="input-group-text">Tambah Software Baru</span>
									<select class="form-control" name="software" required="required">
										<option value="">--- Pilih Software ---</option>
										<?php 
										$data = mysqli_query($koneksi,"SELECT * FROM data_software");
										while ($d=mysqli_fetch_array($data)) {
										 	 ?>
										 	 <option value="<?php echo $d['id']; ?>"><?php echo $d['nama_software']; ?>  |  <?php echo $d['serial_number']; ?></option>

										 	 <?php 
										 } ?>
									</select>
									<input type="submit" class="btn btn-info pull-right" value="Simpan" style="float: right;">
								</div>
							</form>
						
					</div>
				</div>

				<br>
				<table class=" table table-md table-bordered table-striped">
					<tr>
						<th width="5%">No</th>
						<th>Nama Software</th>
						<th>Serial Number</th>
						<th>Hapus</th>
					</tr>
					<?php 
					$no = 1;

					$software = mysqli_query($koneksi, "SELECT data_pc.computer_name, data_software.nama_software, data_software.serial_number, software.id FROM data_pc JOIN software ON data_pc.id=software.id_pc JOIN data_software ON data_software.id=software.id_data_software WHERE data_pc.id='$id_pc'");

					while ($s=mysqli_fetch_array($software)) {
					 	 ?>
					 	 <tr>
					 	 	<td><?php echo $no++; ?></td>
					 	 	<td><?php echo $s['nama_software']; ?></td>
					 	 	<td><?php echo $s['serial_number']; ?></td>
					 	 	<td><a href="pc_software_hapus.php?id=<?php echo $s['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapusnya ?');">
					 	 			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
	  								<path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
									</svg>
					 	 		</a>
					 	 	</td>
					 	 </tr>
					 	 <?php 
					 } ?>
				</table>
				<br><br><br>
				<a href="pc.php" class="btn btn-secondary">kembali</a>
			</div>
		 	<?php
		 } ?>
	</div>
</div>