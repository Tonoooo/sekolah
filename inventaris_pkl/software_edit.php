<?php 
include 'header.php';
include 'koneksi.php';

$id = $_GET['id'];
?> 

<br><br><br><br><br>

<div class="container">
	<div class="col-md-5 col-md-offset-3">
		<div class="card">
			<div class="card-header">
				<h3>Edit Data Software</h3>
			</div>

			<div class="card-body">
				<form method="post" action="software_update.php">
					<table class="table table-bordered table-striped">
						<?php 
						$data = mysqli_query($koneksi, "SELECT * FROM data_software WHERE  id='$id'");
						while ($d=mysqli_fetch_array($data)) {
						 	?>
							<input type="hidden" value="<?php echo $d['id'];?>" name="id">
							<tr>
								<td><h6>Nama Software</h6></td>
								<td><input type="text" name="nama_software" class="form-control" value="<?php echo $d['nama_software']; ?>"></td>
							</tr>
							<tr>
								<td><h6>Serial Number</h6></td>
								<td><input type="text" name="serial_number" class="form-control" value="<?php echo $d['serial_number']; ?>"></td>
							</tr>
							<tr>
								<td><h6>Status Aktif</h6></td>
								<td><input type="text" name="status_aktif" class="form-control" value="<?php echo $d['status_aktif']; ?>"></td>
							</tr>
							<tr>
								<td><h6>Jumlah Lisensi</h6></td>
								<td><input type="text" name="jumlah_lisensi" class="form-control" value="<?php echo $d['jumlah_lisensi']; ?>"></td>
							</tr>
							<?php 
						 } ?>
					</table>
					<input type="submit" class="btn btn-primary pull-right" value="Simpan" style="float: right;">
					<a href="software.php" class="btn btn-secondary">kembali</a>
				</form>
			</div>
		</div>
	</div>
</div>