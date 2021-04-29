<!-- Begin Page Content -->

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <?= $this->session->flashdata('message'); ?>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Universitas</th>
                                    <th>Awal Penelitian</th>
                                    <th>Akhir Penelitian</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($izin as $iz) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $iz['nama_mahasiswa']; ?></td>
                                        <td><?= $iz['asal_surat']; ?></td>
                                        <?php if ($iz['is_active'] == 0) : ?>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <a href="" class="badge badge-primary" data-toggle="modal" data-target="#BuatSurat<?= $iz['id']; ?>">Buat Surat</a>
                                            <?php else : ?>
                                            <td><?= tanggal_indonesia($iz['awal_penelitian']); ?></td>
                                            <td><?= tanggal_indonesia($iz['akhir_penelitian']); ?></td>
                                            <td>
                                                <a href="<?= base_url('izin/cetaksuket/') . $iz['id']; ?>" target="_blank" class="badge badge-warning">Cetak Surat</a>
                                                <a href="" class="badge badge-success" data-toggle="modal" data-target="#EditSurat<?= $iz['id']; ?>">Edit</a>
                                            <?php endif; ?>
                                            </td>
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
</div>
<!-- /.container-fluid -->

</div>

<!-- Edit -->
<?php $no = 0;
foreach ($izin as $iz) : $no++; ?>
    <div class="modal fade" id="BuatSurat<?= $iz['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="BuatSuratLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="BuatSuratLabel">Buat Surat Keterangan <b><?= $iz['nama_mahasiswa']; ?></b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="<?= base_url('izin/selesai'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="id" name="id" value="<?= $iz['id']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="no_suket" name="no_suket" placeholder="Nomor Surat" value="<?= $iz['no_suket']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Awal Penelitian</label>
                            <input type="date" class="form-control" id="awal_penelitian" name="awal_penelitian" placeholder="Awal Penelitian" value="<?= $iz['awal_penelitian']; ?>">
                        </div>
                        <label>Akhir Penelitian</label>
                        <div class="form-group">
                            <input type="date" class="form-control" id="akhir_penelitian" name="akhir_penelitian" placeholder="akhir Penelitian" value="<?= $iz['akhir_penelitian']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="is_active" name="is_active" placeholder="Nomor Surat asal" value="1">
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="tanggal_suket" name="tanggal_suket" value="<?= $iz['tanggal_asal']; ?>">
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
    </div>

<?php endforeach; ?>

<!-- Edit -->
<?php $no = 0;
foreach ($izin as $iz) : $no++; ?>
    <div class="modal fade" id="EditSurat<?= $iz['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="EditSuratLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="EditSuratLabel">Edit Surat Keterangan <b><?= $iz['nama_mahasiswa']; ?></b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="<?= base_url('izin/editsurat'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="id" name="id" value="<?= $iz['id']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="no_suket" name="no_suket" placeholder="Nomor Surat" value="<?= $iz['no_suket']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Awal Penelitian</label>
                            <input type="date" class="form-control" id="awal_penelitian" name="awal_penelitian" placeholder="Awal Penelitian" value="<?= $iz['awal_penelitian']; ?>">
                        </div>
                        <label>Akhir Penelitian</label>
                        <div class="form-group">
                            <input type="date" class="form-control" id="akhir_penelitian" name="akhir_penelitian" placeholder="akhir Penelitian" value="<?= $iz['akhir_penelitian']; ?>">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
    </div>

<?php endforeach; ?>