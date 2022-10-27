<?php include 'header.php';
include 'koneksi.php'; ?>


<br><br><br><br><br>
<div class="container">
	
		<div class="card">
			<div class="card-header text-center">
				<h3>Form Data Divisi
				<button type="button" class="btn btn-white" data-bs-toggle="modal" data-bs-target="#myModal" title="Cari" style="float: right;">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  					<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/></svg>
				</button></h3>
			</div>

			<br><br>
			<form method="post" action="devisi_aksi.php" style="margin: 0px 20px 0px 20px">

				<div class="input-group">
					<span class="input-group-text">Tambah Divisi baru</span>
					<input class="form-control" name="devisi_baru" placeholder="Masukkan Nama Divisi">
					<input type="submit" class="btn btn-info" value="Simpan" style="float: right;">
				</div>
					
			</form>


			<div class="card-body">
				<!-- <a href="devisi_tambah.php" class="btn btn-sm btn-info">Tambah</a> -->
				<br><br>
				
				<table class="table table-bordered table-striped">
					<tr>
						<th width="1%">No</th>
						<th>Nama Divisi</th>
						<th width="20%">OPSI</th>
					</tr>

				<?php 

				// $data = mysqli_query($koneksi,"SELECT * FROM data_devisi");
				$no = 1;
				if (isset($_POST['cari'])) {
					$cari = $_POST['cari'];
					$data = mysqli_query($koneksi, "select * from data_devisi where nama_devisi like '%".$cari."%'"); 
				}
				else{
					$data = mysqli_query($koneksi, "select * from data_devisi");
				}

				while ($d=mysqli_fetch_array($data)) {
					?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $d['nama_devisi']; ?></td>
						<td>
							<a href="devisi_edit.php?id=<?php echo $d['id']; ?>" class="btn btn-sm btn-info">edit</a>
							<a href="devisi_hapus.php?id=<?php echo $d['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapusnya ?');">delete</a>
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
	        	<input class="form-control" type="text" name="cari" placeholder="Masukkan kata kunci">
				<input type="submit"  class="btn btn-info" value="Cari">
			</div>
        </form>
      </div>

    </div>
  </div>
</div>