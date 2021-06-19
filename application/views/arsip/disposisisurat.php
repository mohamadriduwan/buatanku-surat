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
                                <tr align="center">
                                    <th>#</th>
                                    <th>No. Surat</th>
                                    <th>Tgl Surat</th>
                                    <th>Dari</th>
                                    <th>Perihal</th>
                                    <th>Aksi</th>

                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($surat as $iz) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $iz['no_surat']; ?></td>
                                        <td><?= tanggal_indonesia($iz['tgl_surat']); ?></td>
                                        <td><?= $iz['pengirim']; ?></td>

                                        <td><?= $iz['perihal']; ?>
                                        </td>
                                        <td align="center" width="100px">

                                            <a href="<?= base_url('arsip/cetakdisposisi/') . $iz['id']; ?>" target="_blank" class="btn btn-success btn-circle btn-sm">
                                                <i class="fas fa-print"></i>
                                            </a> |

                                            <a href="" class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#DeletSurat<?= $iz['id']; ?>">
                                                <i class="fas fa-trash-alt"></i>
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

<!-- Modal -->


<!-- Delete -->
<?php $no = 0;
foreach ($surat as $iz) : $no++; ?>
    <div class="modal fade" id="DeletSurat<?= $iz['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="DeletSuratLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="DeletSuratLabel">Hapus Surat Masuk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="<?= base_url('arsip/deletdisposisi'); ?>" method="post">
                    <div class="modal-body">
                        <p>Anda yakin untuk menghapus Disposisi Surat Masuk Nomor <strong><?= $iz['no_surat']; ?></strong>?</p>
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="id" name="id" value="<?= $iz['id']; ?>">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-primary">Ya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- EDIT Modal -->