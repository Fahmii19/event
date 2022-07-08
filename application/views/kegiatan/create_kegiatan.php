<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Kegiatan</h1>
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

                <form method="post" action="" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="judul">judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukan judul">
                    </div>

                    <div class="form-group">
                        <label for="kapasitas">kapasitas</label>
                        <input type="number" class="form-control" id="kapasitas" name="kapasitas" placeholder="Masukan kapasitas">
                    </div>

                    <div class="form-group">
                        <label for="harga_tiket">harga tiket</label>
                        <input type="number" class="form-control" id="harga_tiket" name="harga_tiket" placeholder="Masukan harga_tiket">
                    </div>

                    <div class="form-group">
                        <label for="tanggal">tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Masukan tanggal">
                    </div>

                    <div class="form-group">
                        <label for="narasumber">narasumber</label>
                        <input type="text" class="form-control" id="narasumber" name="narasumber" placeholder="Masukan narasumber">
                    </div>

                    <div class="form-group">
                        <label for="tempat">tempat</label>
                        <input type="text" class="form-control" id="tempat" name="tempat" placeholder="Masukan tempat">
                    </div>

                    <div class="form-group">
                        <label for="pic">pic</label>
                        <input type="text" class="form-control" id="pic" name="pic" placeholder="Masukan pic">
                    </div>

                    <div class="form-group">
                        <label>Jenis Kegiatan</label>
                        <select class="custom-select rounded-0" name="jenis_id">
                            <option value="">Pilih</option>
                            <option value="1">Seminar</option>
                            <option value="2">Workshop</option>
                            <option value="3">Event Olah Raga</option>
                            <option value="4">Bazaar</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="foto_flyer">foto flyer</label>
                        <div class="custom-file">
                            <input type="file" class="form-control custom-file-input" id="foto_flyer" name="foto_flyer">
                            <label class="custom-file-label" for="customFile">Cari Gambar</label>
                        </div>
                    </div>
            </div>

            <div class="card-footer">
                <button name="kirim" type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->