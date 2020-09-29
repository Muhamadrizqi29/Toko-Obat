<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<!-- <h1 class="h3 mb-4 text-gray-800">Tambah Data obat</h1> -->
	<div class="col-lg-8">
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Form Tambah Data Supplier</h6>
			</div>
			<div class="card-body">

				<?php if(validation_errors() ) : ?>
					<div class="alert alert-danger" role="alert">
						<?= validation_errors(); ?>
					</div>
				<?php endif; ?>
                <form action="" method="post">
					<div class="form-group">
						<label for="nama">Nama Supplier</label>
						<input type="text" name="nama" id="nama" class="form-control" autocomplete="off" required>
					</div>
					<div class="form-group">
						<label for="alamat">Alamat</label>
						<input type="text" name="alamat" id="alamat" class="form-control" autocomplete="off" required>
					</div>
					<div class="form-group">
						<label for="kota">Kota</label>
						<input type="text" name="kota" id="kota" class="form-control" autocomplete="off" required>
					</div>
					<div class="form-group">
						<label for="telp">No Telepon</label>
						<input type="number" name="telp" id="telp" class="form-control" autocomplete="off" required>
					</div>
                    <button type="submit" name="submit" class="btn btn-success">Submit</button>
                    <button type="reset" class="btn btn-warning">Reset</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /.container-fluid -->
