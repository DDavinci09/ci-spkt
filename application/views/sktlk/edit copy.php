<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <?php echo validation_errors(); ?>
                    <?php echo form_open_multipart('SKTLK/edit/'. $SK['id_sktlk'] ); ?>
                    <form action="" method="post">
                        <input type="hidden" name="id_sktlk" value="<?= $SK['id_sktlk'] ?>">
                        <div class="row">
                            <div class="col-sm-6"> 
                                <div class="form-group" >
                                    <label>Kejadian</label>
                                    <textarea class="form-control" rows="3" id="kejadian" name="kejadian" value="<?= $SK['kejadian'] ?>"><?= $SK['kejadian'] ?></textarea>
                                    <small class="form-text text-danger"><?= form_error('kejadian'); ?></small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="bukti">Bukti</label>
                                    <input type="file" class="form-control" class="form-control" id="file1" name="userfile1" value="<?= set_value('bukti'); ?>">
                                    <small><?= $SK['bukti'] ?></small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6"> 
                                <div class="form-group" >
                                    <label>Tempat Kejadian</label>
                                    <textarea class="form-control" rows="3" id="tempat_kejadian" name="tempat_kejadian" value="<?= $SK['tempat_kejadian'] ?>"><?= $SK['tempat_kejadian'] ?></textarea>
                                    <small class="form-text text-danger"><?= form_error('tempat_kejadian'); ?></small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="bukti">Dokumen</label>
                                    <input type="file" class="form-control" class="form-control" id="file2" name="userfile2" value="<?= set_value('dokumen'); ?>">
                                    <small><?= $SK['dokumen'] ?></small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Waktu Kejadian</label>
                                    <input type="datetime-local" class="form-control" id="waktu_kejadian" name="waktu_kejadian" value="<?= $SK['waktu_kejadian'] ?>">
                                    <small class="form-text text-danger"><?= form_error('waktu_kejadian'); ?></small>
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