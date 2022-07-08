<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Kelola Kategori Peserta</h1>
                </div>
                <div class="col-sm-6">

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <!-- <a href="form_mahasiswa" type="button" class="btn btn-success">Tambah</a> -->
                <h3 class="card-title">Form Input</h3>

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
                    <div class="col-md-6">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kategori Peserta</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $nomor = 1;
                                foreach ($peserta as $x) {
                                ?>
                                    <tr>
                                        <td><?= $nomor ?></td>
                                        <td><?= $x->nama ?></td>
                                        <td>
                                            <a href="katpeserta/edit_katpeserta/<?= $x->id ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                            <a href="katpeserta/delete?id=<?= $x->id ?>"><button type="button" class="btn btn-danger">Hapus</button></a>
                                        </td>
                                    </tr>
                                <?php
                                    $nomor++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Tambah Data</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="post" action="<?php echo base_url(); ?>katpeserta/save_peserta">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nama">Kategori</label>
                                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Input Kategori Peserta">
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
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