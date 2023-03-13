<?php 
include 'header.php';
include 'koneksi.php';

$id_pc = $_GET['id'];
$pengguna_devisi = mysqli_query($koneksi, "SELECT data_devisi.nama_devisi, data_inventaris.id_data_devisi, data_pengguna.nama, data_inventaris.nama_pengguna_id FROM data_devisi JOIN data_inventaris ON data_devisi.id=data_inventaris.id_data_devisi JOIN data_pengguna ON data_pengguna.id=data_inventaris.nama_pengguna_id JOIN data_pc ON data_pc.id=data_inventaris.id_data_pc WHERE data_inventaris.id_data_pc='$id_pc'");
$data_pengguna_devisi = mysqli_fetch_array($pengguna_devisi);
 ?>


 <br><br><br>

<div class="container">
	<div class="card">
		<div class="card-header text-center">
			<h3>Edit Data Komputer</h3>
		</div>

		<div class="card-body">
			<form method="post" action="pc_update.php">

				<div class="form-group">
						<label><h5>Nama Divisi</h5></label>
						<select class="form-control" name="devisi" required="required">
							<option value="<?php echo $data_pengguna_devisi['id_data_devisi']; ?>"><?php echo $data_pengguna_devisi['nama_devisi']; ?></option>
							<?php 
							$data = mysqli_query($koneksi,"SELECT * FROM data_devisi");
							while ($d=mysqli_fetch_array($data)) {

								?>
								<option value="<?php echo $d['id']; ?>"><?php echo $d['nama_devisi']; ?></option>
								<?php
							}
							 ?>
						</select>
					</div>
					<br>
					<div class="form-group">
						<label><h5>Pengguna</h5></label>
						<select class="form-control" name="pengguna" required="required">
							<option value="<?php echo $data_pengguna_devisi['nama_pengguna_id']; ?>"><?php echo $data_pengguna_devisi['nama']; ?></option>
							<?php 
							$data = mysqli_query($koneksi,"SELECT * FROM data_pengguna");
							while ($d=mysqli_fetch_array($data)) {
								?>
								<option value="<?php echo $d['id']; ?>"><?php echo $d['nama']; ?></option>
								<?php
							}
							 ?>
						</select>
					</div>

					<br>
				<div class="form-group">
						<label><h5>Spesifikasi</h5></label>
				</div>

				<table class="table table-bordered table-striped">
					<?php 
					$data = mysqli_query($koneksi, "SELECT * FROM data_pc WHERE id='$id_pc'");
					while ($d=mysqli_fetch_array($data)) {
						?>
						<input type="hidden" value="<?php echo $d['id'];?>" name="id">
						<tr>
							<td><h6>Nama Komputer</h6></td>
							<td width="75%"><input type="text" name="computer_name" class="form-control" value="<?php echo $d['computer_name']; ?>"></td>
						</tr>
						<tr>
							<td><h6>Mainboard</h6></td>
							<td width="75%"><input type="text" name="mainboard" class="form-control" value="<?php echo $d['mainboard']; ?>"></td>
						</tr>
						<tr>
							<td><h6>Processor</h6></td>
							<td width="75%"><input type="text" name="processor" class="form-control" value="<?php echo $d['processor']; ?>"></td>
						</tr>
						<tr>
							<td><h6>RAM</h6></td>
							<td width="75%"><input type="text" name="ram" class="form-control" value="<?php echo $d['ram']; ?>"></td>
						</tr>
						<tr>
							<td><h6>VGA</h6></td>
							<td width="75%"><input type="text" name="vga" class="form-control" value="<?php echo $d['vga']; ?>"></td>
						</tr>
						<tr>
							<td><h6>HDD</h6></td>
							<td width="75%"><input type="text" name="hdd" class="form-control" value="<?php echo $d['hdd']; ?>"></td>
						</tr>
						<tr>
							<td><h6>SSD</h6></td>
							<td width="75%"><input type="text" name="ssd" class="form-control" value="<?php echo $d['ssd']; ?>"></td>
						</tr>
						<tr>
							<td><h6>OS</h6></td>
							<td width="75%"><input type="text" name="os" class="form-control" value="<?php echo $d['os']; ?>"></td>
						</tr>
						<tr>
							<td><h6>mac_address</h6></td>
							<td width="75%"><input type="text" name="mac_address" class="form-control" value="<?php echo $d['mac_address']; ?>"></td>
						</tr>
						<tr>
							<td><h6>no_seri</h6></td>
							<td width="75%"><input type="text" name="no_seri" class="form-control" value="<?php echo $d['no_seri']; ?>"></td>
						</tr>
						<?php 
					}
					 ?>
				</table>
				<input type="submit" class="btn btn-primary pull-right" value="Simpan" style="float: right;">
				<a href="pc.php" class="btn btn-secondary">kembali</a>
			</form>
		</div>
	</div>
</div>