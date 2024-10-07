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
                                    <label>Nama Kegiatan</label>
                                    <textarea class="form-control" rows="3" id="nama_kegiatan" name="nama_kegiatan" value="<?= set_value('nama_kegiatan'); ?>"><?= set_value('nama_kegiatan'); ?></textarea>
                                    <small class="form-text text-danger"><?= form_error('nama_kegiatan'); ?></small>
                                </div>
                            </div>
                            <div class="col-sm-6"> 
                                <div class="form-group" >
                                    <label>Tujuan Kegiatan</label>
                                    <textarea class="form-control" rows="3" id="tujuan_kegiatan" name="tujuan_kegiatan" value="<?= set_value('tujuan_kegiatan'); ?>"><?= set_value('tujuan_kegiatan'); ?></textarea>
                                    <small class="form-text text-danger"><?= form_error('tujuan_kegiatan'); ?></small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6"> 
                                <div class="form-group" >
                                    <label>Penanggung Jawab</label>
                                    <input class="form-control" rows="3" id="penanggungjawab" name="penanggungjawab" value="<?= set_value('penanggungjawab'); ?>">
                                    <small class="form-text text-danger"><?= form_error('penanggungjawab'); ?></small>
                                </div>
                            </div>
                            <div class="col-sm-6"> 
                                <div class="form-group" >
                                    <label>Organisasi</label>
                                    <input class="form-control" rows="3" id="organisasi" name="organisasi" value="<?= set_value('organisasi'); ?>">
                                    <small class="form-text text-danger"><?= form_error('organisasi'); ?></small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Tempat Kegiatan</label>
                                    <textarea class="form-control" rows="3" id="tempat_kegiatan" name="tempat_kegiatan" value="<?= set_value('tempat_kegiatan'); ?>"><?= set_value('tempat_kegiatan'); ?></textarea>
                                    <small class="form-text text-danger"><?= form_error('waktu_kegiatan'); ?></small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Waktu Kegiatan</label>
                                    <input type="datetime-local" class="form-control" id="waktu_kegiatan" name="waktu_kegiatan" value="<?= set_value('waktu_kegiatan'); ?>">
                                    <small class="form-text text-danger"><?= form_error('waktu_kegiatan'); ?></small>
                                    <label for="bukti">Bukti</label>
                                    <input type="file" class="form-control" type="file" class="form-control" id="file" name="userfile" value="<?= set_value('file'); ?>" required>
                                    <small class="form-text text-danger"><?= form_error('bukti'); ?></small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    
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