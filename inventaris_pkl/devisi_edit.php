<?php 
include 'header.php';
include 'koneksi.php';
?> 

<br><br><br><br><br>

<div class="container">
	<div class="col-md-5 col-md-offset-3">
		<div class="card">
			<div class="card-header">
				<h3>Edit Nama Divisi</h3>
			</div>

			<div class="card-body">
				
				<?php
				
				$id = $_GET['id'];

				$devisi = mysqli_query($koneksi,"select * from data_devisi where id='$id'");
				while ($t=mysqli_fetch_array($devisi)) {
					?>
					<form method="post" action="devisi_update.php">
						<input type="hidden" value="<?php echo $t['id'];?>" name="id">
						<input class="form-control" name="nama" value="<?php echo $t['nama_devisi']; ?>">
						<br>
						<input type="submit" class="btn btn-primary pull-right" value="Simpan" style="float: right;">
						<a href="devisi.php?id=<?php echo $id; ?>" class="btn btn-secondary">kembali</a>
					</form>
					

					<?php 
				} ?>
				
			</div>
		</div>
	</div>
</div>