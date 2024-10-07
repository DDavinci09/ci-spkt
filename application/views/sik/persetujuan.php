<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <?php echo validation_errors(); ?>
                    <?php echo form_open_multipart('SIK/Persetujuan/' . $SIK['id_sik']); ?>
                    <input type="hidden" name="id_sik" value="<?= $SIK['id_sik']; ?>">
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status_sik" id="status_sik" >
                                        <option value="Terima" <?php if($SIK['status_sik'] == 'Terima') echo 'selected'; ?>>Terima</option>
                                        <option value="Tolak" <?php if($SIK['status_sik'] == 'Tolak') echo 'selected'; ?>>Tolak</option>
                                        <option value="Menunggu" <?php if($SIK['status_sik'] == 'Menunggu') echo 'selected'; ?>>Menunggu</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6"> 
                                <div class="form-group" >
                                    <label>Keterangan</label>
                                    <textarea class="form-control" rows="3" id="keterangan" name="keterangan" value="<?= set_value('keterangan'); ?>"><?= $SIK['keterangan'] ?></textarea>
                                    <small class="form-text text-danger"><?= form_error('keterangan'); ?></small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6"> 
                                <button type="submit" class="btn btn-primary float-right">Konfirmasi</button>
                            </div>
                        </div>
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