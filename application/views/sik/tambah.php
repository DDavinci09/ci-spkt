<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <?php echo validation_errors(); ?>
                    <?php echo form_open_multipart('SIK/tambah'); ?>
                    <form action="" method="post">
                        <!-- input id pelapor -->
                        <input type="hidden" name="id_pelapor" value="<?= $user['id_pelapor']; ?>">
                        <input type="hidden" name="status_sik" value="Menunggu">
                        <div class="row">
                            <div class="col-sm-6"> 
                                <div class="form-group" >
                                    <label>Kode SIK</label>
                                    <input class="form-control" rows="3" id="kode_sik" name="kode_sik" value="<?= $autoKD; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-sm-6"> 
                                <div class="form-group" >
                                    <label>ID Pelapor</label>
                                    <input class="form-control" rows="3" id="id_pelapor" name="id_pelapor" value="<?= $user['id_pelapor']; ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6"> 
                                <div class="form-group" >
                                    <label>Tanggal SIK</label>
                                    <input type="date" class="form-control" id="tanggal_sik" name="tanggal_sik" value="<?= set_value('tanggal_sik'); ?>">
                                    <small class="form-text text-danger"><?= form_error('tanggal_sik'); ?></small>
                                </div>
                            </div>
                            <div class="col-sm-6"> 
                                <div class="form-group" >
                                    <label>Nama Pelapor</label>
                                    <input class="form-control" rows="3" id="nama" name="nama" value="<?= $user['nama']; ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                <label>Nama Kegiatan</label>
                                    <input type="text" class="form-control" rows="3" id="nama_kegiatan" name="nama_kegiatan" value="<?= set_value('nama_kegiatan'); ?>">
                                    <small class="form-text text-danger"><?= form_error('nama_kegiatan'); ?></small>
                                </div>
                            </div>
                            <div class="col-sm-6"> 
                                <div class="form-group" >
                                    <label>NIK</label>
                                    <input class="form-control" rows="3" id="nik" name="nik" value="<?= $user['nik']; ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                <label>Tujuan Kegiatan</label>
                                    <input type="text" class="form-control" rows="3" id="tujuan_kegiatan" name="tujuan_kegiatan" value="<?= set_value('tujuan_kegiatan'); ?>">
                                    <small class="form-text text-danger"><?= form_error('tujuan_kegiatan'); ?></small>
                                </div>
                            </div>
                            <div class="col-sm-6"> 
                                <div class="form-group" >
                                    <label>Jenis Kelamin</label>
                                    <input class="form-control" rows="3" id="jenis_kelamin" name="jenis_kelamin" value="<?= $user['jenis_kelamin']; ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6"> 
                                <div class="form-group" >
                                <label>Waktu Kegiatan</label>
                                    <input type="datetime-local" class="form-control" id="waktu_kegiatan" name="waktu_kegiatan" value="<?= set_value('waktu_kegiatan'); ?>">
                                    <small class="form-text text-danger"><?= form_error('waktu_kegiatan'); ?></small>
                                </div>
                            </div>
                            <div class="col-sm-6"> 
                                <div class="form-group" >
                                    <label>No Telp</label>
                                    <input class="form-control" rows="3" id="no_telp" name="no_telp" value="<?= $user['no_telp']; ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                <label>Tempat Kegiatan</label>
                                    <input class="form-control" rows="3" id="tempat_kegiatan" name="tempat_kegiatan" value="<?= set_value('tempat_kegiatan'); ?>">
                                    <small class="form-text text-danger"><?= form_error('waktu_kegiatan'); ?></small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input class="form-control" rows="3" id="alamat" name="alamat" value="<?= $user['alamat']; ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                <label>Penanggung Jawab</label>
                                    <input class="form-control" rows="3" id="penanggungjawab" name="penanggungjawab" value="<?= set_value('penanggungjawab'); ?>">
                                    <small class="form-text text-danger"><?= form_error('penanggungjawab'); ?></small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="ktp">KTP</label>
                                    <a class=" form-control btn btn-sm btn-success" target="_blank" rows="1"  href="<?= base_url('./assets/upload/KTP/') . $user['ktp']; ?>">KTP</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6"> 
                                <div class="form-group" >
                                    <label>Organisasi</label>
                                    <input class="form-control" rows="3" id="organisasi" name="organisasi" value="<?= set_value('organisasi'); ?>">
                                    <small class="form-text text-danger"><?= form_error('organisasi'); ?></small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                <label for="bukti">Bukti : *pdf,png,docx</label>
                                    <input type="file" class="form-control" type="file" class="form-control" id="file" name="userfile" value="<?= set_value('file'); ?>" required>
                                    <small class="form-text text-danger"><?= form_error('bukti'); ?></small>
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