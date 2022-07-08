<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Kelola Kegiatan</h1>
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
                <a href="<?php echo base_url(); ?>kegiatan/create_kegiatan" type="button" class="ml-2 btn btn-success">Tambah Data</a>

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
                                    <th>Judul</th>
                                    <th>kapasitas</th>
                                    <th>harga_tiket</th>
                                    <th>tanggal</th>
                                    <th>narasumber</th>
                                    <th>tempat</th>
                                    <th>pic</th>
                                    <th>foto_flyer</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $nomor = 1;
                                foreach ($kegiatan as $x) {
                                ?>
                                    <tr>
                                        <td><?= $nomor ?></td>
                                        <td><?= $x->judul ?></td>
                                        <td><?= $x->kapasitas ?></td>
                                        <td><?= $x->harga_tiket ?></td>
                                        <td><?= $x->tanggal ?></td>
                                        <td><?= $x->narasumber ?></td>
                                        <td><?= $x->tempat ?></td>
                                        <td><?= $x->pic ?></td>
                                        <td>
                                            <img src="<?=base_url('uploads/flyer/'.$x->foto_flyer)?>" style="width: 50%">
                                        </td>
                                        <td>
                                            <a href="kegiatan/edit_kegiatan/<?= $x->id ?>"><button type="button" class="btn btn-warning">Edit</button></a>

                                            <a href="kegiatan/delete?id=<?= $x->id ?>"><button type="button" class="btn btn-danger">Hapus</button></a>
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