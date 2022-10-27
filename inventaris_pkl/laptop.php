<?php include 'header.php'; ?>

<br><br><br><br><br>
<div class="container-fluid">

	<div class="card">
		<div class="card-header text-center">
			<h3>Form Data Laptop

			<button type="button" class="btn btn-white" data-bs-toggle="modal" data-bs-target="#myModal" title="Cari" style="float: right;">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  				<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/></svg>
			</button></h3>
		</div>

		<div class="card-body">
			<a href="laptop_tambah.php" class="btn btn-sm btn-info">Tambah</a>
			<br><br>

			<table class="table table-bordered table-striped">
				<tr>
					<th width="1%">No</th>
					<th>Nama Devisi </th>
					<th>Nama Pengguna</th>
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
					<th width="9%">OPSI</th>
				</tr>

				<?php 
				include 'koneksi.php';
				if (isset($_POST['cari'])) {
					$cari = $_POST['cari'];
					$data = mysqli_query($koneksi,"
					SELECT data_inventaris.id_data_laptop, data_devisi.nama_devisi, data_pengguna.nama, data_laptop.merk, data_laptop.tipe, data_laptop.processor, data_laptop.ram, data_laptop.ssd, data_laptop.hdd, data_laptop.os, data_laptop.no_seri, data_laptop.akun_email_microsoft, data_laptop.password_email_microsoft FROM data_inventaris JOIN data_devisi ON data_devisi.id = data_inventaris.id_data_devisi JOIN data_pengguna ON data_pengguna.id = data_inventaris.nama_pengguna_id JOIN data_laptop ON data_laptop.id = data_inventaris.id_data_laptop WHERE data_pengguna.nama LIKE '%".$cari."%' ORDER BY id_data_laptop;");
				}
				else{
				$data = mysqli_query($koneksi,"
					SELECT data_inventaris.id_data_laptop, data_devisi.nama_devisi, data_pengguna.nama, data_laptop.merk, data_laptop.tipe, data_laptop.processor, data_laptop.ram, data_laptop.ssd, data_laptop.hdd, data_laptop.os, data_laptop.no_seri, data_laptop.akun_email_microsoft, data_laptop.password_email_microsoft FROM data_inventaris JOIN data_devisi ON data_devisi.id = data_inventaris.id_data_devisi JOIN data_pengguna ON data_pengguna.id = data_inventaris.nama_pengguna_id JOIN data_laptop ON data_laptop.id = data_inventaris.id_data_laptop ORDER BY id_data_laptop;");
				}
				$no = 1;

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
						<td>
							<a href="laptop_edit.php?id=<?php echo $d['id_data_laptop']; ?>" class="btn btn-sm btn-info">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
  									<path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
								</svg>
							</a>
							<a href="laptop_hapus.php?id=<?php echo $d['id_data_laptop']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapusnya ?');">
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


<!-- Modal -->
<div class="modal" id="myModal">
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
	        	<input class="form-control" type="text" name="cari" placeholder="Masukkan Nama Pengguna">
				<input type="submit"  class="btn btn-info" value="Cari">
			</div>
        </form>
      </div>

    </div>
  </div>
</div>