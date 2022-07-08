<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Pendaftaran</h1>
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
                <h3 class="card-title">Form Edit Pendaftaran</h3>

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

                <form method="post" action="<?php echo base_url(); ?>daftar/aksi_edit">

                    <input type="hidden" name="id" value="<?php echo $daftar->id; ?>">

                    <div class="form-group">
                        <label for="tanggal_daftar">tanggal_daftar</label>
                        <input type="date" class="form-control" id="tanggal_daftar" name="tanggal_daftar" value="<?php echo $daftar->tanggal_daftar; ?>">
                    </div>

                    <div class="form-group">
                        <label for="alasan">alasan</label>
                        <input type="text" class="form-control" id="alasan" name="alasan" value="<?php echo $daftar->alasan; ?>" placeholder="Masukan alasan">
                    </div>

                    <div class="form-group">
                        <label for="nosertifikat">nosertifikat</label>
                        <input type="text" class="form-control" id="nosertifikat" name="nosertifikat" value="<?php echo $daftar->nosertifikat; ?>">
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