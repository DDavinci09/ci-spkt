<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <?php echo validation_errors(); ?>
                    <?php echo form_open_multipart('SIK/edit/'. $SIK['id_sik']); ?>
                    <form action="" method="post">
                        <input type="hidden" name="id_sik" value="<?= $SIK['id_sik'] ?>">
                        <div class="row">
                            <div class="col-sm-6"> 
                                <div class="form-group" >
                                    <label>Nama Kegiatan</label>
                                    <textarea class="form-control" rows="3" id="nama_kegiatan" name="nama_kegiatan" value="<?= $SIK['nama_kegiatan'] ?>"><?= $SIK['nama_kegiatan'] ?></textarea>
                                    <small class="form-text text-danger"><?= form_error('nama_kegiatan'); ?></small>
                                </div>
                            </div>
                            <div class="col-sm-6"> 
                                <div class="form-group" >
                                    <label>Tujuan Kegiatan</label>
                                    <textarea class="form-control" rows="3" id="tujuan_kegiatan" name="tujuan_kegiatan" value="<?= $SIK['tujuan_kegiatan'] ?>"><?= $SIK['tujuan_kegiatan'] ?></textarea>
                                    <small class="form-text text-danger"><?= form_error('tujuan_kegiatan'); ?></small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6"> 
                                <div class="form-group" >
                                    <label>Penanggung Jawab</label>
                                    <input class="form-control" rows="3" id="penanggungjawab" name="penanggungjawab" value="<?= $SIK['penanggungjawab'] ?>">
                                    <small class="form-text text-danger"><?= form_error('penanggungjawab'); ?></small>
                                </div>
                            </div>
                            <div class="col-sm-6"> 
                                <div class="form-group" >
                                    <label>Organisasi</label>
                                    <input class="form-control" rows="3" id="organisasi" name="organisasi" value="<?= $SIK['organisasi'] ?>">
                                    <small class="form-text text-danger"><?= form_error('organisasi'); ?></small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Tempat Kegiatan</label>
                                    <textarea class="form-control" rows="3" id="tempat_kegiatan" name="tempat_kegiatan" value="<?= $SIK['tempat_kegiatan'] ?>"><?= $SIK['tempat_kegiatan'] ?></textarea>
                                    <small class="form-text text-danger"><?= form_error('tempat_kegiatan'); ?></small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Waktu Kegiatan</label>
                                    <input type="datetime-local" class="form-control" id="waktu_kegiatan" name="waktu_kegiatan" value="<?= $SIK['waktu_kegiatan'] ?>">
                                    <small class="form-text text-danger"><?= form_error('waktu_kegiatan'); ?></small>
                                    <label for="bukti">Bukti</label>
                                    <input type="file" class="form-control" type="file" class="form-control" id="file" name="userfile" value="<?= $SIK['dokumen'] ?>">
                                    <small><?= $SIK['dokumen'] ?></small>
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