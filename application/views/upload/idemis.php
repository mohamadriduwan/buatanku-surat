<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <form action="<?= base_url('upload/uploadid'); ?>" method="post" enctype="multipart/form-data" id="importFrm">
                    Pilih File : <input type="file" name="fileidemis" />
                    <input type="submit" class="btn btn-primary" name="previewSubmit" value="PREVIEW">
                </form>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIS</th>
                                <th>NISN</th>
                                <th>Nama</th>
                                <th>Tempat, Tgl. Lahir</th>
                                <th>No Ujian</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($siswa as $s) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $s['nis']; ?></td>
                                    <td><?= $s['nisn']; ?></td>
                                    <td><?= $s['nama']; ?></td>
                                    <td><?= $s['tempat_lahir']; ?>, <?= $s['tanggal_lahir']; ?></td>
                                    <td><?= $s['no_ujian']; ?></td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->