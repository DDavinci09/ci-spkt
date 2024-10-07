<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <?php echo validation_errors(); ?>
                    <?php echo form_open_multipart('SKTLK/tambah'); ?>
                    <form action="" method="post">
                        <!-- input id pelapor -->
                        <input type="hidden" name="id_pelapor" value="<?= $user['id_pelapor']; ?>">
                        <input type="hidden" name="status_sktlk" value="Menunggu">
                        <div class="row">
                            <div class="col-sm-6"> 
                                <div class="form-group" >
                                    <label>Kode SKTLK</label>
                                    <input class="form-control" rows="3" id="kode_sktlk" name="kode_sktlk" value="<?= $autoKD; ?>" readonly>
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
                                    <label>Tanggal SKTLK</label>
                                    <input type="date" class="form-control" id="tanggal_sktlk" name="tanggal_sktlk" value="<?= set_value('tanggal_sktlk'); ?>">
                                    <small class="form-text text-danger"><?= form_error('tanggal_sktlk'); ?></small>
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
                                <label>Waktu Kejadian</label>
                                    <input type="datetime-local" class="form-control" id="waktu_kejadian" name="waktu_kejadian" value="<?= set_value('waktu_kejadian'); ?>">
                                    <small class="form-text text-danger"><?= form_error('waktu_kejadian'); ?></small>
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
                                <label>Kejadian</label>
                                    <input class="form-control" rows="3" id="kejadian" name="kejadian" value="<?= set_value('kejadian'); ?>">
                                    <small class="form-text text-danger"><?= form_error('kejadian'); ?></small>
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
                                    <label>Tempat Kejadian</label>
                                    <input class="form-control" rows="3" id="tempat_kejadian" name="tempat_kejadian" value="<?= set_value('tempat_kejadian'); ?>">
                                    <small class="form-text text-danger"><?= form_error('tempat_kejadian'); ?></small>
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
                                <label for="bukti">Bukti : *pdf,png,docx</label>
                                    <input type="file" class="form-control" class="form-control" id="file1" name="userfile1" value="<?= set_value('file'); ?>" required>
                                    <small class="form-text text-danger"><?= form_error('bukti'); ?></small>
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
                                <label for="bukti">Dokumen : *pdf,png,docx</label>
                                    <input type="file" class="form-control" class="form-control" id="file2" name="userfile2" value="<?= set_value('file'); ?>" required>
                                    <small class="form-text text-danger"><?= form_error('bukti'); ?></small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="ktp">KTP</label>
                                    <a class=" form-control btn btn-sm btn-success" target="_blank" rows="1"  href="<?= base_url('./assets/upload/KTP/') . $user['ktp']; ?>">KTP</a>
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