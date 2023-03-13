<?php include 'header.php';
include 'koneksi.php'; ?>

<br><br><br><br><br>

<div class="container">

		<div class="card">
			<div class="card-header text-center">
				<h3>Tambah data Laptop</h3>
			</div>

			<div class="card-body">
				
				<form method="post" action="laptop_aksi.php">

					<div class="form-group">
						<label><h5>Nama Divisi</h5></label>
						<select class="form-control" name="devisi" required="required">
							<option value="">- Pilih Divisi</option>
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
							<option value="">- Pilih Pengguna</option>
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
						<tr>
							<td><h6>Merk</h6></td>
							<td width="75%"><input type="text" name="merk" class="form-control"></td>
						</tr>
						<tr>
							<td><h6>Tipe</h6></td>
							<td width="75%"><input type="text" name="tipe" class="form-control"></td>
						</tr>
						<tr>
							<td><h6>Processor</h6></td>
							<td width="75%"><input type="text" name="processor" class="form-control"></td>
						</tr>
						<tr>
							<td><h6>RAM</h6></td>
							<td width="75%"><input type="text" name="ram" class="form-control"></td>
						</tr>
						<tr>
							<td><h6>SSD</h6></td>
							<td width="75%"><input type="text" name="ssd" class="form-control"></td>
						</tr>
						<tr>
							<td><h6>HDD</h6></td>
							<td width="75%"><input type="text" name="hdd" class="form-control"></td>
						</tr>
						<tr>
							<td><h6>OS</h6></td>
							<td width="75%"><input type="text" name="os" class="form-control"></td>
						</tr>
						<tr>
							<td><h6>No Seri</h6></td>
							<td width="75%"><input type="text" name="no_seri" class="form-control"></td>
						</tr>
						<tr>
							<td><h6>Akun Email Microsoft</h6></td>
							<td width="75%"><input type="email" name="akun_email_microsoft" class="form-control"></td>
						</tr>
						<tr>
							<td><h6>Password Email Microsoft</h6></td>
							<td width="75%"><input type="password" name="password_email_microsoft" class="form-control"></td>
						</tr>
					</table>
					
					<input type="submit" class="btn btn-primary pull-right" value="Simpan" style="float: right;">
					<a href="laptop.php" class="btn btn-secondary">kembali</a>
					
				</form>

			</div>
		</div>
</div>