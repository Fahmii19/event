<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Mahasiswa</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active">Mahasiswa</li>
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
                <h3 class="card-title"><?= $judul ?></h3>


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

                <?php
                if (validation_errors() != false) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo validation_errors(); ?>
                    </div>
                <?php
                }
                ?>

                <form method="post" action="<?php echo base_url(); ?>katpeserta/aksi_edit">
                    <input type="hidden" name="id" value="<?php echo $peserta->id; ?>">

                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $peserta->nama; ?>" placeholder="Masukan Nama">
                    </div>

            </div>
            <!-- /.card -->

            <div class="card-footer">
                <button name="kirim" type="submit" class="btn btn-success">Simpan</button>
            </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->