<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<!-- <h1 class="h3 mb-4 text-gray-800">Tambah Data obat</h1> -->
	<div class="col-lg-8">
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Form Tambah Data Admin</h6>
			</div>
			<div class="card-body">

				<?php if(validation_errors() ) : ?>
					<div class="alert alert-danger" role="alert">
						<?= validation_errors(); ?>
					</div>
				<?php endif; ?>
                <form action="" method="post">
					<div class="form-group">
						<label for="nama">Nama Admin</label>
						<input type="text" name="nama" id="nama" class="form-control" autocomplete="off" required>
					</div>
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" name="username" id="username" class="form-control" autocomplete="off" required>
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" name="password" id="password" class="form-control" autocomplete="off" required>
					</div>
                    <button type="submit" name="submit" class="btn btn-success">Submit</button>
                    <button type="reset" class="btn btn-warning">Reset</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /.container-fluid -->
