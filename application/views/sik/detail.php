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
                                    <label>Kode SIK</label>
                                    <input class="form-control" rows="3" id="kode_sik" name="kode_sik" value="<?= $SIK['kode_sik']; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-sm-6"> 
                                <div class="form-group" >
                                    <label>ID Pelapor</label>
                                    <input class="form-control" rows="3" id="id_pelapor" name="id_pelapor" value="<?= $SIK['id_pelapor']; ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6"> 
                                <div class="form-group" >
                                    <label>Tanggal SIK</label>
                                    <input type="date" class="form-control" id="tanggal_sik" name="tanggal_sik" value="<?= $SIK['tgl_sik'] ?>" readonly>
                                    <small class="form-text text-danger"><?= form_error('tanggal_sik'); ?></small>
                                </div>
                            </div>
                            <div class="col-sm-6"> 
                                <div class="form-group" >
                                    <label>Nama Pelapor</label>
                                    <input class="form-control" rows="3" id="nama" name="nama" value="<?= $SIK['nama']; ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                <label>Nama Kegiatan</label>
                                    <input type="text" class="form-control" rows="3" id="nama_kegiatan" name="nama_kegiatan" value="<?= $SIK['nama_kegiatan'] ?>" readonly>
                                    <small class="form-text text-danger"><?= form_error('nama_kegiatan'); ?></small>
                                </div>
                            </div>
                            <div class="col-sm-6"> 
                                <div class="form-group" >
                                    <label>NIK</label>
                                    <input class="form-control" rows="3" id="nik" name="nik" value="<?= $SIK['nik']; ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                <label>Tujuan Kegiatan</label>
                                    <input type="text" class="form-control" rows="3" id="tujuan_kegiatan" name="tujuan_kegiatan" value="<?= $SIK['tujuan_kegiatan'] ?>" readonly>
                                    <small class="form-text text-danger"><?= form_error('tujuan_kegiatan'); ?></small>
                                </div>
                            </div>
                            <div class="col-sm-6"> 
                                <div class="form-group" >
                                    <label>Jenis Kelamin</label>
                                    <input class="form-control" rows="3" id="jenis_kelamin" name="jenis_kelamin" value="<?= $SIK['jenis_kelamin']; ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6"> 
                                <div class="form-group" >
                                <label>Waktu Kegiatan</label>
                                    <input type="datetime-local" class="form-control" id="waktu_kegiatan" name="waktu_kegiatan" value="<?= $SIK['waktu_kegiatan'] ?>" readonly>
                                    <small class="form-text text-danger"><?= form_error('waktu_kegiatan'); ?></small>
                                </div>
                            </div>
                            <div class="col-sm-6"> 
                                <div class="form-group" >
                                    <label>No Telp</label>
                                    <input class="form-control" rows="3" id="no_telp" name="no_telp" value="<?= $SIK['no_telp']; ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                <label>Tempat Kegiatan</label>
                                    <input class="form-control" rows="3" id="tempat_kegiatan" name="tempat_kegiatan" value="<?= $SIK['tempat_kegiatan'] ?>" readonly>
                                    <small class="form-text text-danger"><?= form_error('waktu_kegiatan'); ?></small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input class="form-control" rows="3" id="alamat" name="alamat" value="<?= $SIK['alamat']; ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                <label>Penanggung Jawab</label>
                                    <input class="form-control" rows="3" id="penanggungjawab" name="penanggungjawab" value="<?= $SIK['penanggungjawab'] ?>" readonly>
                                    <small class="form-text text-danger"><?= form_error('penanggungjawab'); ?></small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="ktp">KTP</label>
                                    <a class=" form-control btn btn-sm btn-success" target="_blank" rows="1"  href="<?= base_url('./assets/upload/KTP/') . $SIK['ktp']; ?>">KTP</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-sm-6"> 
                                <div class="form-group" >
                                    <label>Organisasi</label>
                                    <input class="form-control" rows="3" id="organisasi" name="organisasi" value="<?= $SIK['organisasi'] ?>" readonly>
                                    <small class="form-text text-danger"><?= form_error('organisasi'); ?></small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                <label for="bukti">Bukti</label>
                                <a class=" form-control btn btn-sm btn-success" target="_blank" rows="1"  href="<?= base_url('./assets/upload/buktiSIK/') . $SIK['dokumen']; ?>"><?= $SIK['dokumen'] ?></a>
                                </div>
                            </div>
                        </div>
                        <?php if ($user["level"] !== 'Pelapor') { ?>
                        <a href="<?= base_url(); ?>SIK/editPetugas/<?= $SIK['id_sik']; ?>" class="btn btn-primary float-right"><i class="fas fa-edit fa-sm text-white-50"></i>Edit Data</a>

                        <a href="#" onclick="deleteConfirmation('<?= base_url(); ?>SIK/hapusPetugas/<?= $SIK['id_sik'] ?>')" class="btn btn-danger float-right mr-2"><i class="fas fa-edit fa-sm text-white-50"></i>Hapus</a>
                        <?php } ?>
                        <?php if ($user["level"] == 'Pelapor') { ?>
                        <a href="<?= base_url(); ?>SIK/edit/<?= $SIK['id_sik']; ?>" class="btn btn-primary float-right"><i class="fas fa-edit fa-sm text-white-50"></i>Edit Data</a>

                        <a href="#" onclick="deleteConfirmation('<?= base_url(); ?>SIK/hapus/<?= $SIK['id_sik'] ?>')" class="btn btn-danger float-right mr-2"><i class="fas fa-edit fa-sm text-white-50"></i>Hapus</a>
                        <?php } ?>
                        
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