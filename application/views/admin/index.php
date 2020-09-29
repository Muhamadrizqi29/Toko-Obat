<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="col-lg-12">
        <h1 class="h3 mb-4 text-gray-800">Data Admin
        <a href="<?= base_url(); ?>admin/tambah" class="btn btn-primary float-right">Tambah Data</a>
        </h1>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List Admin</h6>
      </div>
      <div class="card-body">
        <?php if($this->session->flashdata('info') ): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          Data Admin <strong>berhasil</strong> <?= $this->session->flashdata('info'); ?>.
          <button type="button" class="close" data-dismiss="alert" aria-label="close">
            <span area-hidden="true">&times;</span>
          </button>
        </div>
      <?php endif; ?>
        <table class="table table-bordered" id="dataTable">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama Admin</th>
              <th>Username</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <?php $no = 1; ?>
          <?php foreach($admin as $a) : ?>
          <tbody>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $a['nama']; ?></td>
              <td><?= $a['username']; ?></td>
              <td>
                <a href="<?= base_url(); ?>admin/hapus/<?= $a['id']; ?>" class="btn btn-primary btn-circle btn-sm" onclick="return confirm('Yakin ingin menghapus data ini ?');"><i class="fa fa-trash"></i></a>
                <a href="<?= base_url(); ?>admin/ubah/<?= $a['id']; ?>" class="btn btn-primary btn-circle btn-sm"><i class="fa fa-edit"></i></a>
              </td>
            </tr>
          </tbody>
          <?php endforeach ?>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->