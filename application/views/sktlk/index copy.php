<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
        <div calss="row">
        <?php if ($user["level"] !== 'Pelapor') { ?>
            <a href="<?= base_url(); ?>SKTLK/laporanSKTLK/" class="btn btn-sm btn-success btn-delete" target="_blank"><i class="fas fa-fw fa-fw fa-print"></i></a>
        <?php } ?>
            <a href="<?= base_url(); ?>SKTLK/tambah" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>Tambah Data</a>
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
                            <th scope="col" class="align-middle text-center">Tanggal</th>
                            <th scope="col" class="align-middle text-center">Kejadian</th>
                            <th scope="col" class="align-middle text-center">Waktu</th>
                            <th scope="col" class="align-middle text-center">Tempat</th>
                            <th scope="col" class="align-middle text-center">Status</th>
                            <th scope="col" class="align-middle text-center">Bukti</th>
                            <th scope="col" class="align-middle text-center">Dokumen</th>
                            <th scope="col" class="align-middle text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            foreach ($SKTLK as $sk) : ?>
                            <tr>
                                <td class="align-middle"><?= $i++; ?></td>
                                <td class="align-middle"><?= $sk['nama'] ?></td>
                                <td class="align-middle"><?= date("d-m-Y", strtotime($sk['tgl_sktlk'])) ?></td>
                                <td class="align-middle"><?= $sk['kejadian'] ?></td>
                                <td class="align-middle"><?= date("d-m-Y h:m:s", strtotime($sk['waktu_kejadian'])) ?></td>
                                <td class="align-middle"><?= $sk['tempat_kejadian'] ?></td>
                                <td class="align-middle text-center">
                                <?php if ($user["level"] !== 'Pelapor') { ?>
                                        <?php if ($sk["status_sktlk"] == 'Menunggu') { ?>
                                        <a class="btn btn-warning" href="<?= base_url(); ?>SKTLK/Persetujuan/<?= $sk['id_sktlk'] ?>">Menunggu</a>
                                        <?php } else if ($sk["status_sktlk"] == 'Terima') { ?>
                                        <a class="btn btn-success" href="#">Diterima</a>
                                        <?php } else if ($sk["status_sktlk"] == 'Tolak') { ?>
                                        <a class="btn btn-danger" href="<?= base_url(); ?>SKTLK/Persetujuan/<?= $sk['id_sktlk'] ?>">Ditolak</a>
                                        <?php } ?>
                                    <?php } else if ($user["level"] == 'Pelapor') { ?>
                                        <?php if ($sk["status_sktlk"] == 'Menunggu') { ?>
                                        <a class="btn btn-warning">Menunggu</a>
                                        <?php } else if ($sk["status_sktlk"] == 'Terima') { ?>
                                        <a class="btn btn-success">Diterima</a>
                                        <?php } else if ($sk["status_sktlk"] == 'Tolak') { ?>
                                        <a class="btn btn-danger">Ditolak</a>
                                        <?php } ?>
                                <?php } ?>
                                </td>
                                <td class="align-middle text-center">
                                    <a href="<?= base_url('./assets/upload/buktiSKTLK/') . $sk['bukti']; ?>" class="btn btn-sm btn-warning" target="_blank"><i class="fas fa-fw fa-file"></i></a>
                                </td>
                                <td class="align-middle text-center">
                                    <a href="<?= base_url('./assets/upload/dokumenSKTLK/') . $sk['dokumen']; ?>" class="btn btn-sm btn-warning" target="_blank"><i class="fas fa-fw fa-file"></i></a>
                                </td>
                                <td class="align-middle text-center">
                                <?php if ($user["level"] == 'Pelapor') { ?>
                                    <a href="<?= base_url(); ?>SKTLK/edit/<?= $sk['id_sktlk']; ?>" class="btn btn-sm btn-warning"><i class="fas fa-fw fa-edit"></i></a>
                                    <a href="<?= base_url(); ?>SKTLK/edit/<?= $sk['id_sktlk']; ?>" class="btn btn-sm btn-warning"><i class="fas fa-fw fa-edit"></i></a>
                                <?php } ?>
                                <?php if ($sk["status_sktlk"] == 'Terima') { ?>
                                    <a href="<?= base_url(); ?>SKTLK/cetakSKTLK/<?= $sk['id_sktlk']; ?>" class="btn btn-sm btn-success btn-delete" target="_blank"><i class="fas fa-fw fa-fw fa-print"></i></a>
                                <?php } ?>
                                    <a href="#" class="btn btn-sm btn-danger btn-delete" onclick="deleteConfirmation('<?= base_url(); ?>SKTLK/hapus/<?= $sk['id_sktlk']; ?>')"><i class="fas fa-fw fa-fw fa-trash"></i></a>
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