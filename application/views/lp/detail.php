<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <?php echo validation_errors(); ?>
                    <form action="" method="post">
                    <input type="hidden" name="id_lp" value="<?= $LP['id_lp']; ?>">
                        <div class="row">
                            <div class="col-sm-6"> 
                                <div class="form-group" >
                                    <label>Kode LP</label>
                                    <input class="form-control" rows="3" id="kode_lp" name="kode_lp" value="<?= $LP['kode_lp'] ?>" readonly>
                                </div>
                            </div>
                            <div class="col-sm-6"> 
                                <div class="form-group" >
                                    <label>ID Pelapor</label>
                                    <input class="form-control" rows="3" id="id_pelapor" name="id_pelapor" value="<?= $LP['id_pelapor'] ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6"> 
                                <div class="form-group" >
                                    <label>Tanggal LP</label>
                                    <input type="date" class="form-control" id="tanggal_lp" name="tanggal_lp" value="<?= $LP['tgl_lp'] ?>" readonly>
                                    <small class="form-text text-danger"><?= form_error('tanggal_lp'); ?></small>
                                </div>
                            </div>
                            <div class="col-sm-6"> 
                                <div class="form-group" >
                                    <label>Nama Pelapor</label>
                                    <input class="form-control" rows="3" id="nama" name="nama" value="<?= $LP['nama'] ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Jenis Laporan</label>
                                    <input class="form-control" rows="3" id="jenis_lp" name="jenis_lp" value="<?= $LP['jenis_lp'] ?>" readonly>
                                </div>
                            </div>
                            <div class="col-sm-6"> 
                                <div class="form-group" >
                                    <label>NIK</label>
                                    <input class="form-control" rows="3" id="nik" name="nik" value="<?= $LP['nik']; ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Waktu Kejadian</label>
                                    <input type="datetime-local" class="form-control" id="waktu_kejadian" name="waktu_kejadian" value="<?= $LP['waktu_kejadian'] ?>">
                                    <small class="form-text text-danger"><?= form_error('waktu_kejadian'); ?></small>
                                </div>
                            </div>
                            <div class="col-sm-6"> 
                                <div class="form-group" >
                                    <label>Jenis Kelamin</label>
                                    <input class="form-control" rows="3" id="jenis_kelamin" name="jenis_kelamin" value="<?= $LP['jenis_kelamin']; ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6"> 
                                <div class="form-group" >
                                    <label>Isi Laporan</label>
                                    <input class="form-control" rows="3" id="isi_lp" name="isi_lp" value="<?= $LP['isi_lp'] ?>">
                                    <small class="form-text text-danger"><?= form_error('isi_lp'); ?></small>
                                </div>
                            </div>
                            <div class="col-sm-6"> 
                                <div class="form-group" >
                                    <label>No Telp</label>
                                    <input class="form-control" rows="3" id="no_telp" name="no_telp" value="<?= $LP['no_telp']; ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                <label>Tempat Kejadian</label>
                                    <input class="form-control" rows="3" id="tempat_kejadian" name="tempat_kejadian" value="<?= $LP['tempat_kejadian'] ?>">
                                    <small class="form-text text-danger"><?= form_error('tempat_kejadian'); ?></small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input class="form-control" rows="3" id="alamat" name="alamat" value="<?= $LP['alamat']; ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="bukti">Bukti</label>
                                    <a class=" form-control btn btn-sm btn-success" target="_blank" rows="1"  href="<?= base_url('./assets/upload/buktiLP/') . $LP['bukti']; ?>"><?= $LP['bukti']; ?></a>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="ktp">KTP</label>
                                    <a class=" form-control btn btn-sm btn-success" target="_blank" rows="1"  href="<?= base_url('./assets/upload/KTP/') . $LP['ktp']; ?>">KTP</a>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php if ($user["level"] !== 'Pelapor') { ?>
                    <a href="<?= base_url(); ?>LP/editPetugas/<?= $LP['id_lp']; ?>" class="btn btn-primary float-right"><i class="fas fa-edit fa-sm text-white-50"></i>Edit Data</a>
                    
                    <a href="#" onclick="deleteConfirmation('<?= base_url(); ?>LP/hapusPetugas/<?= $LP['id_lp']; ?>')" class="btn btn-danger float-right mr-2"><i class="fas fa-edit fa-sm text-white-50"></i>Hapus</a>
                    <?php } ?>
                    <?php if ($user["level"] == 'Pelapor') { ?>
                    <a href="<?= base_url(); ?>LP/edit/<?= $LP['id_lp']; ?>" class="btn btn-primary float-right"><i class="fas fa-edit fa-sm text-white-50"></i>Edit Data</a>
                    
                    <a href="#" onclick="deleteConfirmation('<?= base_url(); ?>LP/hapus/<?= $LP['id_lp']; ?>')" class="btn btn-danger float-right mr-2"><i class="fas fa-edit fa-sm text-white-50"></i>Hapus</a>
                    <?php } ?>
                    
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->