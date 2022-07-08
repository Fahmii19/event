<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Kelola Pendaftaran</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">

                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Form Data</h3>


                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>tanggal_daftar</th>
                                    <th>alasan</th>
                                    <th>users_id</th>
                                    <th>kegiatan_id </th>
                                    <th>kategori_peserta_id </th>
                                    <th>nosertifikat </th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $nomor = 1;
                                foreach ($daftar as $x) {
                                ?>
                                    <tr>
                                        <td><?= $nomor ?></td>
                                        <td><?= $x->tanggal_daftar ?></td>
                                        <td><?= $x->alasan ?></td>
                                        <td><?= $x->users_id ?></td>
                                        <td><?= $x->kegiatan_id ?></td>
                                        <td><?= $x->kategori_peserta_id  ?></td>
                                        <td><?= $x->nosertifikat ?></td>
                                        <td>
                                            <a href="daftar/edit_daftar/<?= $x->id ?>"><button type="button" class="btn btn-warning">Edit</button></a>

                                            <a href="daftar/delete?id=<?= $x->id ?>"><button type="button" class="btn btn-danger">Hapus</button></a>
                                        </td>
                                    </tr>
                                <?php
                                    $nomor++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->

                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->