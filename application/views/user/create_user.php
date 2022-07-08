<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>User</h1>
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

                <form method="post" action="<?php echo base_url(); ?>user/save_user">

                    <div class="form-group">
                        <label for="username">username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Masukan username">
                    </div>

                    <div class="form-group">
                        <label for="password">password</label>
                        <input type="number" class="form-control" id="password" name="password" placeholder="Masukan password">
                    </div>

                    <div class="form-group">
                        <label for="email">email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukan email">
                    </div>

                    <div class="form-group">
                        <label for="created_at">created_at</label>
                        <input type="date" class="form-control" id="created_at" name="created_at" placeholder="Masukan created_at">
                    </div>

                    <div class="form-group">
                        <label for="last_login">last_login</label>
                        <input type="date" class="form-control" id="last_login" name="last_login" placeholder="Masukan last_login">
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select class="custom-select rounded-0" name="status">
                            <option value="">Pilih</option>
                            <option value="1">1</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Role</label>
                        <select class="custom-select rounded-0" name="role">
                            <option value="">Pilih</option>
                            <option value="Administrator">Administrator</option>
                            <option value="Public">Public</option>
                        </select>
                    </div>

                    <!-- <div class="form-group">
                        <label for="foto_flyer">foto_flyer</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="foto_flyer" name="foto_flyer">
                            <label class="custom-file-label" for="customFile">Cari Gambar</label>
                        </div>
                    </div> -->

                    <div class="form-group">
                        <input type="hidden" class="form-control" id="foto_flyer" name="foto_flyer" value="seminar1.jpg">
                    </div>


            </div>
            <!-- /.card -->

            <div class="card-footer">
                <button name="kirim" type="submit" class="btn btn-primary">Simpan</button>
            </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->