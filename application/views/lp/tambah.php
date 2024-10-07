<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <?php echo validation_errors(); ?>
                    <?php echo form_open_multipart('LP/tambah'); ?>
                    <form action="" method="post">
                        <!-- input id pelapor -->
                        <!-- <input type="hidden" name="id_pelapor" value="<?= $user['id_pelapor']; ?>"> -->
                        <input type="hidden" name="status_lp" value="Menunggu">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Kode LP</label>
                                    <input class="form-control" rows="3" id="kode_lp" name="kode_lp"
                                        value="<?= $autoKD; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>ID Pelapor</label>
                                    <input class="form-control" rows="3" id="id_pelapor" name="id_pelapor"
                                        value="<?= $user['id_pelapor']; ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Tanggal LP</label>
                                    <input type="date" class="form-control" id="tanggal_lp" name="tanggal_lp"
                                        value="<?= set_value('tanggal_lp'); ?>">
                                    <small class="form-text text-danger"><?= form_error('tanggal_lp'); ?></small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Nama Pelapor</label>
                                    <input class="form-control" rows="3" id="nama" name="nama"
                                        value="<?= $user['nama']; ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Jenis Laporan</label>
                                    <select class="form-control" name="jenis_lp" id="jenis_lp"
                                        value="<?= set_value('jenis_lp'); ?>">
                                        <option value="">- - Jenis Laporan - -</option>
                                        <option value="Pengaduan">Pengaduan</option>
                                        <option value="Tindak Pidana">Tindak Pidana</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>NIK</label>
                                    <input class="form-control" rows="3" id="nik" name="nik"
                                        value="<?= $user['nik']; ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Waktu Kejadian</label>
                                    <input type="datetime-local" class="form-control" id="waktu_kejadian"
                                        name="waktu_kejadian" value="<?= set_value('waktu_kejadian'); ?>">
                                    <small class="form-text text-danger"><?= form_error('waktu_kejadian'); ?></small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <input class="form-control" rows="3" id="jenis_kelamin" name="jenis_kelamin"
                                        value="<?= $user['jenis_kelamin']; ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Isi Laporan</label>
                                    <input class="form-control" rows="3" id="isi_lp" name="isi_lp"
                                        value="<?= set_value('isi_lp'); ?>">
                                    <small class="form-text text-danger"><?= form_error('isi_lp'); ?></small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>No Telp</label>
                                    <input class="form-control" rows="3" id="no_telp" name="no_telp"
                                        value="<?= $user['no_telp']; ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Tempat Kejadian</label>
                                    <input class="form-control" rows="3" id="tempat_kejadian" name="tempat_kejadian"
                                        value="<?= set_value('tempat_kejadian'); ?>">
                                    <small class="form-text text-danger"><?= form_error('tempat_kejadian'); ?></small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input class="form-control" rows="3" id="alamat" name="alamat"
                                        value="<?= $user['alamat']; ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="bukti">Bukti : *jpg,png</label>
                                    <input type="file" class="form-control" type="file" class="form-control" id="file"
                                        name="userfile" value="<?= set_value('file'); ?>" required>
                                    <small class="form-text text-danger"><?= form_error('bukti'); ?></small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="ktp">KTP</label>
                                    <a class=" form-control btn btn-sm btn-success" target="_blank" rows="1"
                                        href="<?= base_url('./assets/upload/KTP/') . $user['ktp']; ?>">KTP</a>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Tambah Data</button>
                    </form>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->