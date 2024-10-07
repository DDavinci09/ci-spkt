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
                        <input type="hidden" name="id_sktlk" value="<?= $SK['id_sktlk'] ?>">
                        <div class="row">
                            <div class="col-sm-6"> 
                                <div class="form-group" >
                                    <label>Kode SKTLK</label>
                                    <input class="form-control" rows="3" id="kode_sktlk" name="kode_sktlk" value="<?= $SK['kode_sktlk']; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-sm-6"> 
                                <div class="form-group" >
                                    <label>ID Pelapor</label>
                                    <input class="form-control" rows="3" id="id_pelapor" name="id_pelapor" value="<?= $SK['id_pelapor']; ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6"> 
                                <div class="form-group" >
                                    <label>Tanggal SKTLK</label>
                                    <input type="date" class="form-control" id="tanggal_sktlk" name="tanggal_sktlk" value="<?= $SK['tgl_sktlk']; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-sm-6"> 
                                <div class="form-group" >
                                    <label>Nama Pelapor</label>
                                    <input class="form-control" rows="3" id="nama" name="nama" value="<?= $SK['nama']; ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                <label>Waktu Kejadian</label>
                                    <input type="datetime-local" class="form-control" id="waktu_kejadian" name="waktu_kejadian" value="<?= $SK['waktu_kejadian'] ?>" readonly>
                                </div>
                            </div>
                            <div class="col-sm-6"> 
                                <div class="form-group" >
                                    <label>NIK</label>
                                    <input class="form-control" rows="3" id="nik" name="nik" value="<?= $SK['nik']; ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                <label>Kejadian</label>
                                    <input class="form-control" rows="3" id="kejadian" name="kejadian" value="<?= $SK['kejadian'] ?>" readonly>
                                </div>
                            </div>
                            <div class="col-sm-6"> 
                                <div class="form-group" >
                                    <label>Jenis Kelamin</label>
                                    <input class="form-control" rows="3" id="jenis_kelamin" name="jenis_kelamin" value="<?= $SK['jenis_kelamin']; ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6"> 
                                <div class="form-group" >
                                <label>Tempat Kejadian</label>
                                    <input class="form-control" rows="3" id="tempat_kejadian" name="tempat_kejadian" value="<?= $SK['tempat_kejadian'] ?>" readonly>
                                </div>
                            </div>
                            <div class="col-sm-6"> 
                                <div class="form-group" >
                                    <label>No Telp</label>
                                    <input class="form-control" rows="3" id="no_telp" name="no_telp" value="<?= $SK['no_telp']; ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="bukti">Bukti</label>
                                    <a class=" form-control btn btn-sm btn-success" target="_blank" rows="1"  href="<?= base_url('./assets/upload/buktiSKTLK/') . $SK['bukti']; ?>"><?= $SK['bukti']; ?></a>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input class="form-control" rows="3" id="alamat" name="alamat" value="<?= $SK['alamat']; ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                <label for="bukti">Dokumen</label>
                                <a class=" form-control btn btn-sm btn-success" target="_blank" rows="1"  href="<?= base_url('./assets/upload/buktiSKTLK/') . $SK['bukti']; ?>"><?= $SK['dokumen'] ?></a>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="ktp">KTP</label>
                                    <a class=" form-control btn btn-sm btn-success" target="_blank" rows="1"  href="<?= base_url('./assets/upload/KTP/') . $SK['ktp']; ?>">KTP</a>
                                </div>
                            </div>
                        </div>
                        <?php if ($user["level"] !== 'Pelapor') { ?>
                        <a href="<?= base_url(); ?>SKTLK/editPetugas/<?= $SK['id_sktlk']; ?>" class="btn btn-primary float-right"><i class="fas fa-edit fa-sm text-white-50"></i>Edit Data</a>

                        <a href="#" onclick="deleteConfirmation('<?= base_url(); ?>SKTLK/hapusPetugas/<?= $SK['id_sktlk'] ?>')" class="btn btn-danger float-right mr-2"><i class="fas fa-edit fa-sm text-white-50"></i>Hapus</a>
                        <?php } ?>
                        <?php if ($user["level"] == 'Pelapor') { ?>
                        <a href="<?= base_url(); ?>SKTLK/edit/<?= $SK['id_sktlk']; ?>" class="btn btn-primary float-right"><i class="fas fa-edit fa-sm text-white-50"></i>Edit Data</a>

                        <a href="#" onclick="deleteConfirmation('<?= base_url(); ?>SKTLK/hapus/<?= $SK['id_sktlk'] ?>')" class="btn btn-danger float-right mr-2"><i class="fas fa-edit fa-sm text-white-50"></i>Hapus</a>
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