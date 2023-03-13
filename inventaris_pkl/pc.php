<?php include 'header.php'; ?>

<br><br><br><br><br>
<div class="container-fluid">
	<div class="card-header text-center">
		<h3>Form Data Komputer

		<button type="button" class="btn btn-white" data-bs-toggle="modal" data-bs-target="#myModal" title="Cari" style="float: right;">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  			<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/></svg>
		</button></h3></h3>
	</div>

	<div class="card">
		<div class="card-body">
			<a href="pc_tambah.php" class="btn btn-sm btn-info">Tambah</a>
			<br><br>

			<table class="table table-bordered table-striped">
				<tr>
					<th width="1%">No</th>
					<th>Divisi</th>
					<th>Pengguna</th>
					<th>Nama Komputer</th>
					<th>Mainboard</th>
					<th>Processor</th>
					<th>RAM</th>
					<th>VGA</th>
					<th>HDD</th>
					<th>SSD</th>
					<th>OS</th>
					<th>mac_address</th>
					<th>no_seri</th>
					<th width="9%">OPSI</th>
				</tr>

				<?php 
				include 'koneksi.php';

				// untuk mencari 
				if(isset($_POST['cari'])){
					$cari = $_POST['cari'];
					$data = mysqli_query($koneksi, "SELECT data_inventaris.id_data_pc, data_devisi.nama_devisi, data_pengguna.nama, data_pc.computer_name,data_pc.mainboard,data_pc.processor,data_pc.ram,data_pc.vga,data_pc.hdd,data_pc.ssd,data_pc.os,data_pc.mac_address,data_pc.no_seri FROM data_inventaris JOIN data_devisi ON data_devisi.id = data_inventaris.id_data_devisi JOIN data_pengguna ON data_pengguna.id = data_inventaris.nama_pengguna_id JOIN data_pc ON data_pc.id = data_inventaris.id_data_pc WHERE data_pengguna.nama LIKE '%".$cari."%' ORDER BY id_data_pc");
				}
				else{
					$data = mysqli_query($koneksi, "SELECT data_inventaris.id_data_pc, data_devisi.nama_devisi, data_pengguna.nama, data_pc.computer_name,data_pc.mainboard,data_pc.processor,data_pc.ram,data_pc.vga,data_pc.hdd,data_pc.ssd,data_pc.os,data_pc.mac_address,data_pc.no_seri FROM data_inventaris JOIN data_devisi ON data_devisi.id = data_inventaris.id_data_devisi JOIN data_pengguna ON data_pengguna.id = data_inventaris.nama_pengguna_id JOIN data_pc ON data_pc.id = data_inventaris.id_data_pc ORDER BY id_data_pc;");
				}

				$no = 1;
				while ($d=mysqli_fetch_array($data)) {
					?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $d['nama_devisi']; ?></td>
						<td><?php echo $d['nama']; ?></td>
						<td><?php echo $d['computer_name']; ?></td>
						<td><?php echo $d['mainboard']; ?></td>
						<td><?php echo $d['processor']; ?></td>
						<td><?php echo $d['ram']; ?></td>
						<td><?php echo $d['vga']; ?></td>
						<td><?php echo $d['hdd']; ?></td>
						<td><?php echo $d['ssd']; ?></td>
						<td><?php echo $d['os']; ?></td>
						<td><?php echo $d['mac_address']; ?></td>
						<td><?php echo $d['no_seri']; ?></td>
						<td>
							<a href="pc_detail.php?id=<?php echo $d['id_data_pc']; ?>" class="btn btn-sm btn-warning">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
								  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
								  <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
								</svg>
							</a>
							<a href="pc_edit.php?id=<?php echo $d['id_data_pc']; ?>" class="btn btn-sm btn-info">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
	  									<path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
									</svg>
								</a>
							<a href="pc_hapus.php?id=<?php echo $d['id_data_pc']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapusnya ?');">
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