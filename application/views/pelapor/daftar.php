<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
    </div>

    <div class="box">
        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable">
                    <thead>
                        <tr>
                            <th scope="col" class="align-middle text-center">NO</th>
                            <th scope="col" class="align-middle text-center">Nama Pelapor</th>
                            <th scope="col" class="align-middle text-center">NIK</th>
                            <th scope="col" class="align-middle text-center">Jenis Kelamin</th>
                            <th scope="col" class="align-middle text-center">No Telp</th>
                            <th scope="col" class="align-middle text-center">Alamat</th>
                            <th scope="col" class="align-middle text-center">KTP</th>
                            <th scope="col" class="align-middle text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            foreach ($Pelapor as $P) : ?>
                            <tr>
                                <td class="align-middle"><?= $i++; ?></td>
                                <td class="align-middle"><?= $P['nama'] ?></td>
                                <td class="align-middle"><?= $P['nik'] ?></td>
                                <td class="align-middle"><?= $P['jenis_kelamin'] ?></td>
                                <td class="align-middle"><?= $P['no_telp'] ?></td>
                                <td class="align-middle"><?= $P['alamat'] ?></td>
                                <td class="align-middle text-center">
                                    <a href="<?= base_url('./assets/upload/KTP/') . $P['ktp']; ?>" class="btn btn-sm btn-warning" target="_blank"><i class="fas fa-fw fa-file"></i></a>
                                </td>
                                <td class="align-middle"><?= $P['status'] ?></td>
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