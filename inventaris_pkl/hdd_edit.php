<?php 
include 'header.php';
include 'koneksi.php';

$id = $_GET['id'];
$pengguna_devisi = mysqli_query($koneksi, "SELECT data_devisi.nama_devisi, data_inventaris.id_data_devisi, data_pengguna.nama, data_inventaris.nama_pengguna_id FROM data_devisi JOIN data_inventaris ON data_devisi.id=data_inventaris.id_data_devisi JOIN data_pengguna ON data_pengguna.id=data_inventaris.nama_pengguna_id JOIN db_hdd_eks ON db_hdd_eks.id=data_inventaris.id_data_hdd_eks WHERE data_inventaris.id_data_hdd_eks='$id'");
$data_pengguna_devisi = mysqli_fetch_array($pengguna_devisi);
?> 

<br><br><br><br><br>

<div class="container">
	<div class="col-md-5 col-md-offset-3">
		<div class="card">
			<div class="card-header">
				<h3>Edit Data Hard Disk</h3>
			</div>

			<div class="card-body">
				<form method="post" action="hdd_update.php">

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
					<table class="table table-bordered table-striped">
						<?php 
						$data = mysqli_query($koneksi, "SELECT * FROM db_hdd_eks WHERE  id='$id'");
						while ($d=mysqli_fetch_array($data)) {
						 	?>
							<input type="hidden" value="<?php echo $d['id'];?>" name="id">
							<tr>
								<td><h6>Merk</h6></td>
								<td><input type="text" name="merk" class="form-control" value="<?php echo $d['merk']; ?>"></td>
							</tr>
							<tr>
								<td><h6>Kapasitas</h6></td>
								<td><input type="text" name="kapasitas" class="form-control" value="<?php echo $d['kapasitas']; ?>"></td>
							</tr>
							<tr>
								<td><h6>No Seri</h6></td>
								<td><input type="text" name="no_seri" class="form-control" value="<?php echo $d['no_seri']; ?>"></td>
							</tr>
							<?php 
						 } ?>
					</table>
					<input type="submit" class="btn btn-primary pull-right" value="Simpan" style="float: right;">
					<a href="hdd.php" class="btn btn-secondary">kembali</a>
				</form>
			</div>
		</div>
	</div>
</div>