<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
    </div>

    <div class="box">
        <div class="box-body">
            <div class="row">
                <div class="col-sm-6"> 
                    <div class="form-group" >
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?= $user['username'] ?>">
                    </div>
                </div>
                <div class="col-sm-6"> 
                    <div class="form-group" >
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama'] ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6"> 
                    <div class="form-group" >
                    <label for="nik">NIK</label>
                    <input type="text" class="form-control" id="nik" name="nik" value="<?= $user['nik'] ?>">
                    </div>
                </div>
                <div class="col-sm-6"> 
                    <div class="form-group" >
                    <label for="nik">Jenis Kelamin</label>
                    <input type="text" class="form-control" id="nik" name="nik" value="<?= $user['jenis_kelamin'] ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6"> 
                    <div class="form-group" >
                    <label for="no_telp">No Telp</label>
                    <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= $user['no_telp'] ?>">
                    </div>
                </div>
                <div class="col-sm-6"> 
                    <div class="form-group" >
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $user['alamat'] ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="ktp">KTP</label>
                        <a class=" form-control btn btn-sm btn-success" target="_blank" rows="1"  href="<?= base_url('./assets/upload/KTP/') . $user['ktp']; ?>">KTP</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->