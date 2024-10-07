<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
        <div calss="row">
            <?php if ($user["level"] == 'Pelapor') { ?>
            <a href="<?= base_url(); ?>SIK/tambah" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>Tambah Data</a>
            <?php } ?>
            <?php if ($user["level"] !== 'Pelapor') { ?>
            <a href="<?= base_url(); ?>SIK/laporanSIK/" class="btn btn-sm btn-success btn-delete" target="_blank"><i class="fas fa-fw fa-fw fa-print"></i></a>
            <?php } ?>
        </div>
    </div>

    <div class="box">
        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable">
                    <thead>
                        <tr>
                            <th scope="col" class="align-middle text-center">NO</th>
                            <th scope="col" class="align-middle text-center">Nama Pelapor</th>
                            <th scope="col" class="align-middle text-center">Kode SIK</th>
                            <th scope="col" class="align-middle text-center">Tanggal SIK</th>
                            <th scope="col" class="align-middle text-center">Nama Kegiatan</th>
                            <th scope="col" class="align-middle text-center">Tujuan Kegiatan</th>
                            <th scope="col" class="align-middle text-center">Status</th>
                            <th scope="col" class="align-middle text-center">Bukti</th>
                            <th scope="col" class="align-middle text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            foreach ($SIK as $si) : ?>
                            <tr>
                                <td class="align-middle"><?= $i++; ?></td>
                                <td class="align-middle"><?= $si['nama'] ?></td>
                                <td class="align-middle"><?= $si['kode_sik'] ?></td>
                                <td class="align-middle"><?= date("d-m-Y", strtotime($si['tgl_sik'])) ?></td>
                                <td class="align-middle"><?= $si['nama_kegiatan'] ?></td>
                                <td class="align-middle"><?= $si['tujuan_kegiatan'] ?></td>
                                <td class="align-middle text-center">
                                <?php if ($user["level"] !== 'Pelapor') { ?>
                                        <?php if ($si["status_sik"] == 'Menunggu') { ?>
                                        <a class="btn btn-warning" href="<?= base_url(); ?>SIK/Persetujuan/<?= $si['id_sik'] ?>">Menunggu</a>
                                        <?php } else if ($si["status_sik"] == 'Terima') { ?>
                                        <a class="btn btn-success" href="#">Diterima</a>
                                        <?php } else if ($si["status_sik"] == 'Tolak') { ?>
                                        <a class="btn btn-danger" href="<?= base_url(); ?>SIK/Persetujuan/<?= $si['id_sik'] ?>">Ditolak</a>
                                        <?php } ?>
                                    <?php } else if ($user["level"] == 'Pelapor') { ?>
                                        <?php if ($si["status_sik"] == 'Menunggu') { ?>
                                        <a class="btn btn-warning">Menunggu</a>
                                        <?php } else if ($si["status_sik"] == 'Terima') { ?>
                                        <a class="btn btn-success">Diterima</a>
                                        <?php } else if ($si["status_sik"] == 'Tolak') { ?>
                                        <a class="btn btn-danger">Ditolak</a>
                                        <?php } ?>
                                <?php } ?>
                                </td>
                                <td class="align-middle text-center">
                                    <a href="<?= base_url('./assets/upload/buktiSIK/') . $si['dokumen']; ?>" class="btn btn-sm btn-warning" target="_blank"><i class="fas fa-fw fa-file"></i></a>
                                </td>
                                <td class="align-middle text-center">
                                <?php if ($user["level"] !== 'Pelapor') { ?>
                                    <a href="<?= base_url(); ?>SIK/detailPetugas/<?= $si['id_sik']; ?>" class="btn btn-sm btn-primary"><i class="fas fa-fw fa-edit"></i></a>
                                    <a href="#" class="btn btn-sm btn-danger btn-delete" onclick="deleteConfirmation('<?= base_url(); ?>SIK/hapusPetugas/<?= $si['id_sik']; ?>')" " ><i class="fas fa-fw fa-fw fa-trash"></i></a>
                                <?php } ?>
                                <?php if ($user["level"] == 'Pelapor') { ?>
                                    <a href="<?= base_url(); ?>SIK/detail/<?= $si['id_sik']; ?>" class="btn btn-sm btn-primary"><i class="fas fa-fw fa-edit"></i></a>
                                    <a href="#" class="btn btn-sm btn-danger btn-delete" onclick="deleteConfirmation('<?= base_url(); ?>SIK/hapus/<?= $si['id_sik']; ?>')" " ><i class="fas fa-fw fa-fw fa-trash"></i></a>
                                <?php } ?>
                                <?php if ($si["status_sik"] == 'Terima') { ?>
                                    <a href="<?= base_url(); ?>SIK/cetakSIK/<?= $si['id_sik']; ?>" class="btn btn-sm btn-success btn-delete" target="_blank"><i class="fas fa-fw fa-fw fa-print"></i></a>
                                <?php } ?>
                                    
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->