<?php 
include 'header.php';
include 'koneksi.php'; ?>

<br><br><br>
<div class="container mt-5">
	<div class="card">
		<div class="card-header text-center">
			<h3>Form Data Software
				<button type="button" class="btn btn-white" data-bs-toggle="modal" data-bs-target="#myModal" title="Cari" style="float: right;">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  					<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/></svg>
				</button>
			</h3>
		</div>
		

		<div class="card-body">
			<button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modaltambah" title="Tambah Software">
				Tambah
			</button>

			<br><br>
			<table class="table table-bordered table-striped">
				<tr>
					<th width="1%">No</th>
					<th>Nama Software</th>
					<th>Serial Number</th>
					<th>Status Aktif</th>
					<th>Jumlah Lisensi</th>
					<th width="10%">OPSI</th>
				</tr>

				<?php 
				
				if (isset($_POST['cari'])) {
					$cari = $_POST['cari'];
					$data = mysqli_query($koneksi, "select * from data_software where nama_software like '%".$cari."%'"); 
				}
				else{
					$data = mysqli_query($koneksi, "SELECT * FROM data_software");
				}

				$no = 1;
				while ($d=mysqli_fetch_array($data)) {
					?>
					<tr>
						<td><?php echo $no++ ?></td>
						<td><?php echo $d['nama_software']; ?></td>
						<td><?php echo $d['serial_number']; ?></td>
						<td><?php echo $d['status_aktif']; ?></td>
						<td><?php echo $d['jumlah_lisensi']; ?></td>
						<td>
							<a href="software_edit.php?id=<?php echo $d['id']; ?>" class="btn btn-sm btn-info">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
  									<path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
								</svg>
							</a>
							<a href="software_hapus.php?id=<?php echo $d['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapusnya ?');">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
  									<path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
  								</svg>
							</a>
						</td>
					</tr>

					<?php 
				} ?>
				 
			</table>
		</div>
	</div>
</div>


<!-- Modal Cari -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Cari</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        	<div class="input-group">
	        	<input class="form-control" type="text" name="cari" placeholder="Masukkan Nama Software">
				<input type="submit"  class="btn btn-info" value="Cari">
			</div>
        </form>
      </div>

    </div>
  </div>
</div>


<!-- Modal Tambah data software -->
<div class="modal fade" id="modaltambah">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tambah Data Software</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="software_aksi.php" method="post">
        	<table class="table table-bordered table-striped">
						<tr>
							<td><h6>Nama software</h6></td>
							<td><input type="text" name="nama_software" class="form-control"></td>
						</tr>
						<tr>
							<td><h6>Serial Number</h6></td>
							<td><input type="text" name="serial_number" class="form-control"></td>
						</tr>
						<tr>
							<td><h6>Status Aktif</h6></td>
							<td><input type="text" name="status_aktif" class="form-control"></td>
						</tr>
						<tr>
							<td><h6>Jumlah Lisensi</h6></td>
							<td><input type="text" name="jumlah_lisensi" class="form-control"></td>
						</tr>
				</table>
				<input type="submit" class="btn btn-primary pull-right" value="Simpan" style="float: right;">
        </form>
      </div>

    </div>
  </div>
</div>