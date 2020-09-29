<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="col-lg-12">
        <h1 class="h3 mb-4 text-gray-800">Data obat
        <a href="#" class="btn btn-primary float-right">Tambah Data</a>
        </h1>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List obat</h6>
      </div>
      <div class="card-body">
        


        <table class="table table-bordered" id="dataTable">
          <thead>
            <tr>
              <th>#</th>
              <th>Kode Obat</th>
              <th>Nama Obat</th>
              <th>Harga</th>
              <th>Produsen</th>
              <th>Supplier</th>
              <th>Stok</th>
              <th>Gambar</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <?php $no = 1; ?>
          <?php foreach($obat as $o) : ?>
          <tbody>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $o['kode']; ?></td>
              <td><?= $o['nama_obat']; ?></td>
              <td><?= $o['harga']; ?></td>
              <td><?= $o['produsen']; ?></td>
              <td><?= $o['supplier_id']; ?></td>
              <td><?= $o['stok']; ?></td>
              <td><img src=" <?= base_url('assets/img/') . $o['foto']; ?> " width="100" ></td>
              <td>
                <a href="#" class="btn btn-primary btn-circle btn-sm"><i class="fa fa-trash"></i></a>
                <a href="#" class="btn btn-primary btn-circle btn-sm"><i class="fa fa-edit"></i></a>
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