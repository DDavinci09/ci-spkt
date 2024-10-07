<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <?php echo validation_errors(); ?>
                    <?php echo form_open_multipart('LP/edit/'. $LP['id_lp']); ?>
                    <form action="" method="post">
                    <input type="hidden" name="id_lp" value="<?= $LP['id_lp']; ?>">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Jenis Laporan</label>
                                    <select class="form-control" name="jenis_lp" id="jenis_lp" value="<?= set_value('jenis_lp'); ?>">
                                        <option value="Pengaduan" <?php if($LP['jenis_lp'] == 'Pengaduan') echo 'selected'; ?>>Pengaduan</option>
                                        <option value="Tindak Pidana" <?php if($LP['jenis_lp'] == 'Tindak Pidana') echo 'selected'; ?>>Tindak Pidana</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Waktu Kejadian</label>
                                    <input type="datetime-local" class="form-control" id="waktu_kejadian" name="waktu_kejadian" value="<?= $LP['waktu_kejadian'] ?>">
                                    <small class="form-text text-danger"><?= form_error('waktu_kejadian'); ?></small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6"> 
                                <div class="form-group" >
                                    <label>Isi Laporan</label>
                                    <textarea class="form-control" rows="3" id="isi_lp" name="isi_lp" value="<?= $LP['isi_lp'] ?>"><?= $LP['isi_lp'] ?></textarea>
                                    <small class="form-text text-danger"><?= form_error('isi_lp'); ?></small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Tempat Kejadian</label>
                                    <textarea class="form-control" rows="3" id="tempat_kejadian" name="tempat_kejadian" value="<?= $LP['tempat_kejadian'] ?>"><?= $LP['tempat_kejadian'] ?></textarea>
                                    <small class="form-text text-danger"><?= form_error('tempat_kejadian'); ?></small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="bukti">Bukti</label>
                                    <input type="file" class="form-control" class="form-control" id="file" name="userfile" value="<?= set_value('file'); ?>">
                                    <small><?= $LP['bukti'] ?></small>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Edit Data</button>
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