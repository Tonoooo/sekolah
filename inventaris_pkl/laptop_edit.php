<?php
include 'header.php';
include 'koneksi.php';

$id = $_GET['id'];
$pengguna_devisi = mysqli_query($koneksi, "SELECT data_devisi.nama_devisi, data_inventaris.id_data_devisi, data_pengguna.nama, data_inventaris.nama_pengguna_id FROM data_devisi JOIN data_inventaris ON data_devisi.id=data_inventaris.id_data_devisi JOIN data_pengguna ON data_pengguna.id=data_inventaris.nama_pengguna_id JOIN data_laptop ON data_laptop.id=data_inventaris.id_data_laptop WHERE data_inventaris.id_data_laptop='$id'");
$data_pengguna_devisi = mysqli_fetch_array($pengguna_devisi);
?>

<br><br><br><br><br>

<div class="container">
	
	<div class="card">
		<div class="card-header text-center">
			<h3>Edit Data Laptop</h3>
		</div>
		 
		<div class="card-body">

			<form method="post" action="laptop_update.php">

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
					$data = mysqli_query($koneksi, "SELECT * FROM data_laptop WHERE id='$id'");

					while ($d=mysqli_fetch_array($data)){
						?>
						<input type="hidden" value="<?php echo $d['id'];?>" name="id">
						<tr>
							<td><h6>Merk</h6></td>
							<td width="75%"><input type="text" name="merk" class="form-control" value="<?php echo $d['merk']; ?>"></td>
						</tr>
						<tr>
							<td><h6>Tipe</h6></td>
							<td width="75%"><input type="text" name="tipe" class="form-control" value="<?php echo $d['tipe']; ?>"></td>
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
							<td><h6>SSD</h6></td>
							<td width="75%"><input type="text" name="ssd" class="form-control" value="<?php echo $d['ssd']; ?>"></td>
						</tr>
						<tr>
							<td><h6>HDD</h6></td>
							<td width="75%"><input type="text" name="hdd" class="form-control" value="<?php echo $d['hdd']; ?>"></td>
						</tr>
						<tr>
							<td><h6>OS</h6></td>
							<td width="75%"><input type="text" name="os" class="form-control" value="<?php echo $d['os']; ?>"></td>
						</tr>
						<tr>
							<td><h6>No Seri</h6></td>
							<td width="75%"><input type="text" name="no_seri" class="form-control" value="<?php echo $d['no_seri']; ?>"></td>
						</tr>
						<tr>
							<td><h6>Akun Email Microsoft</h6></td>
							<td width="75%"><input type="email" name="akun_email_microsoft" class="form-control" value="<?php echo $d['akun_email_microsoft']; ?>"></td>
						</tr>
						<tr>
							<td><h6>Password Email Microsoft</h6></td>
							<td width="75%"><input type="password" name="password_email_microsoft" class="form-control" value="<?php echo $d['password_email_microsoft']; ?>"></td>
						</tr>
						<?php 
					} ?>
				</table>
				<input type="submit" class="btn btn-primary pull-right" value="Simpan" style="float: right;">
					<a href="laptop.php" class="btn btn-secondary">kembali</a>

			</form>
			
		</div>
	</div>
</div>