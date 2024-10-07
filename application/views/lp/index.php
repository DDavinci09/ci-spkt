<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
        <div class="row">
        <?php if ($user["level"] !== 'Pelapor') { ?>
            <a href="<?= base_url(); ?>LP/laporanLP/" class="btn btn-sm btn-success btn-delete" target="_blank"><i class="fas fa-fw fa-fw fa-print"></i></a>
        <?php } ?>
        <?php if ($user["level"] == 'Pelapor') { ?>
            <a href="<?= base_url(); ?>LP/tambah" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>Tambah Data</a>
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
                            <th scope="col" class="align-middle text-center">Kode LP</th>
                            <th scope="col" class="align-middle text-center">Tanggal LP</th>
                            <th scope="col" class="align-middle text-center">Jenis LP</th>
                            <th scope="col" class="align-middle text-center">Isi LP</th>
                            <th scope="col" class="align-middle text-center">Status</th>
                            <th scope="col" class="align-middle text-center">Bukti</th>
                            <th scope="col" class="align-middle text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody> 
                        <?php
                            $i = 1;
                            foreach ($LP as $l) : ?>
                            <tr>
                                <td class="align-middle"><?= $i++; ?></td>
                                <td class="align-middle"><?= $l['nama'] ?></td>
                                <td class="align-middle"><?= $l['kode_lp'] ?></td>
                                <td class="align-middle"><?= date("d-m-Y", strtotime($l['tgl_lp'])) ?></td>
                                <td class="align-middle"><?= $l['jenis_lp'] ?></td>
                                <td class="align-middle"><?= $l['isi_lp'] ?></td>
                                <td class="align-middle text-center">
                                    <?php if ($user["level"] !== 'Pelapor') { ?>
                                        <?php if ($l["status_lp"] == 'Menunggu') { ?>
                                        <a class="btn btn-warning" href="<?= base_url(); ?>LP/Persetujuan/<?= $l['id_lp'] ?>">Menunggu</a>
                                        <?php } else if ($l["status_lp"] == 'Terima') { ?>
                                        <a class="btn btn-success" href="#">Diterima</a>
                                        <?php } else if ($l["status_lp"] == 'Tolak') { ?>
                                        <a class="btn btn-danger" href="<?= base_url(); ?>LP/Persetujuan/<?= $l['id_lp'] ?>">Ditolak</a>
                                        <?php } ?>
                                    <?php } else if ($user["level"] == 'Pelapor') { ?>
                                        <?php if ($l["status_lp"] == 'Menunggu') { ?>
                                        <a class="btn btn-warning">Menunggu</a>
                                        <?php } else if ($l["status_lp"] == 'Terima') { ?>
                                        <a class="btn btn-success">Diterima</a>
                                        <?php } else if ($l["status_lp"] == 'Tolak') { ?>
                                        <a class="btn btn-danger">Ditolak</a>
                                        <?php } ?>
                                    <?php } ?> 
                                </td>
                                <td class="align-middle text-center">
                                    <a href="<?= base_url('./assets/upload/buktiLP/') . $l['bukti']; ?>" class="btn btn-sm btn-warning" target="_blank"><i class="fas fa-fw fa-file"></i></a>
                                </td>
                                <td class="align-middle text-center">
                                <?php if ($user["level"] !== 'Pelapor') { ?>
                                    <a href="<?= base_url(); ?>LP/detailPetugas/<?= $l['id_lp']; ?>" class="btn btn-sm btn-primary"><i class="fas fa-fw fa-edit"></i></a> 
                                    <a href="#" class="btn btn-sm btn-danger btn-delete" onclick="deleteConfirmation('<?= base_url(); ?>LP/hapusPetugas/<?= $l['id_lp']; ?>')"><i class="fas fa-fw fa-fw fa-trash"></i></a>
                                <?php } ?>
                                <?php if ($user["level"] == 'Pelapor') { ?>
                                    <a href="<?= base_url(); ?>LP/detail/<?= $l['id_lp']; ?>" class="btn btn-sm btn-primary"><i class="fas fa-fw fa-edit"></i></a> 
                                    <a href="#" class="btn btn-sm btn-danger btn-delete" onclick="deleteConfirmation('<?= base_url(); ?>LP/hapus/<?= $l['id_lp']; ?>')"><i class="fas fa-fw fa-fw fa-trash"></i></a>
                                <?php } ?>
                                    <?php if ($l["status_lp"] == 'Terima') { ?>
                                    <a href="<?= base_url(); ?>LP/cetakLP/<?= $l['id_lp']; ?>" class="btn btn-sm btn-success btn-delete" target="_blank"><i class="fas fa-fw fa-fw fa-print"></i></a>
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