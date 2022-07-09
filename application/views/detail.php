    <section class="py-5">
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <!-- Featured blog post-->
                    <div class="card mb-4">
                        <a href="#!"><img class="card-img-top" src="<?= base_url('uploads/flyer/' . $data->foto_flyer) ?>" alt="..." /></a>
                        <div class="card-body">
                            <h2 class="card-title"><?php echo $data->judul; ?></h2>
                            <hr>

                            <div class="row">
                                <div class="col-md-2">
                                    <p>Kapasitas</p>
                                </div>
                                <div class="col-md-6">
                                    <?php echo $data->kapasitas; ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-2">
                                    <p>Harga Tiket</p>
                                </div>
                                <div class="col-md-6">
                                    <?php echo $data->harga_tiket; ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-2">
                                    <p>Tanggal</p>
                                </div>
                                <div class="col-md-6">
                                    <?php echo $data->tanggal; ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-2">
                                    <p>Narasumber</p>
                                </div>
                                <div class="col-md-6">
                                    <?php echo $data->narasumber; ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-2">
                                    <p>tempat</p>
                                </div>
                                <div class="col-md-6">
                                    <?php echo $data->tempat; ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-2">
                                    <p>pic</p>
                                </div>
                                <div class="col-md-6">
                                    <?php echo $data->pic; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Search widget-->
                    <div class="card mb-4">
                        <div class="card-header">Booking</div>
                        <div class="card-body">
                            <?php if ($this->session->userdata('role') == NULL) { ?>
                                <div class="text-center">
                                    <p>Anda harus login terlebih dahulu</p>
                                </div>
                            <?php } else { ?>
                                <form method="post" action="<?php echo base_url(); ?>beranda/save_beranda" class="form-group">


                                    <input type="hidden" name="id" value="<?php echo $data->id; ?>">

                                    <div class="mb-3">
                                        <label for="tanggal">tanggal</label>
                                        <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Masukan tanggal">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Alasan Daftar</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" name="alasan" rows="3"></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label>Jenis Kegiatan</label>
                                        <select class="custom-select rounded-0 form-control" name="kegiatan_id">
                                            <option value="">-- Pilih --</option>
                                            <option value="1">Seminar</option>
                                            <option value="2">Workshop</option>
                                            <option value="3">Event Olah Raga</option>
                                            <option value="4">Bazaar</option>
                                            <option value="5">Pelatihan</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label>Kategori Peserta</label>
                                        <select class="custom-select rounded-0 form-control" name="kategori_peserta_id">
                                            <option value="">-- Pilih --</option>
                                            <option value="1">Pelajar</option>
                                            <option value="2">Mahasiswa</option>
                                            <option value="3">Karyawan Swasta</option>
                                            <option value="4">Guru/Dosen</option>
                                            <option value="5">Umum</option>
                                            <option value="6">ASN</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                </form>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>