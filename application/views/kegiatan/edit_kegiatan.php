<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Kegiatan</h1>
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
                <h3 class="card-title">Form Edit Kegiatan</h3>

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

                <form method="post" action="<?php echo base_url(); ?>kegiatan/aksi_edit">

                    <input type="hidden" name="id" value="<?php echo $kegiatan->id; ?>">

                    <div class="form-group">
                        <label for="judul">judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $kegiatan->judul; ?>" placeholder="Masukan judul">
                    </div>
                    <div class="form-group">
                        <label for="kapasitas">kapasitas</label>
                        <input type="text" class="form-control" id="kapasitas" name="kapasitas" value="<?php echo $kegiatan->kapasitas; ?>" placeholder="Masukan kapasitas">
                    </div>

                    <div class="form-group">
                        <label for="harga_tiket">harga_tiket</label>
                        <input type="text" class="form-control" id="harga_tiket" name="harga_tiket" value="<?php echo $kegiatan->harga_tiket; ?>" placeholder="Masukan harga_tiket">
                    </div>

                    <div class="form-group">
                        <label for="tanggal">tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?php echo $kegiatan->tanggal; ?>">
                    </div>

                    <div class="form-group">
                        <label for="narasumber">narasumber</label>
                        <input type="text" class="form-control" id="narasumber" name="narasumber" value="<?php echo $kegiatan->narasumber; ?>" placeholder="Masukan narasumber">
                    </div>

                    <div class="form-group">
                        <label for="tempat">tempat</label>
                        <input type="text" class="form-control" id="tempat" name="tempat" value="<?php echo $kegiatan->tempat; ?>" placeholder="Masukan tempat">
                    </div>

                    <div class="form-group">
                        <label for="pic">pic</label>
                        <input type="text" class="form-control" id="pic" name="pic" value="<?php echo $kegiatan->pic; ?>" placeholder="Masukan pic">
                    </div>

                    <div class="form-group">
                        <label>Jenis Kegiatan</label>
                        <select class="custom-select rounded-0" name="jenis_id">
                            <option value="">Pilih</option>
                            <option value="1" <?php echo ($kegiatan->jenis_id ? '1' : 'selected'); ?>>Seminar</option>
                            <option value="2" <?php echo ($kegiatan->jenis_id ? '2' : 'selected'); ?>>Workshop</option>
                            <option value="3" <?php echo ($kegiatan->jenis_id ? '3' : 'selected'); ?>>Event Olah Raga</option>
                            <option value="4" <?php echo ($kegiatan->jenis_id ? '4' : 'selected'); ?>>Bazaar</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="hidden" class="form-control" id="foto_flyer" name="foto_flyer" value="seminar1.jpg">
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