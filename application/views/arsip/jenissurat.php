<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <?= form_error('jenis_surat', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#TambahJenisSurat">Tambah Jenis Surat</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Jenis Surat</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($jenissurat as $j) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $j['jenis_surat']; ?></td>
                            <td>
                                <a href="" class="badge badge-success" data-toggle="modal" data-target="#EditJenisSurat<?= $j['id']; ?>">edit</a>
                                <a href="" class="badge badge-danger" data-toggle="modal" data-target="#DeletSurat<?= $j['id']; ?>">delete</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>


        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->

<!-- Modal -->
<div class="modal fade" id="TambahJenisSurat" tabindex="-1" role="dialog" aria-labelledby="TambahJenisSuratLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TambahJenisSuratLabel">Tambah Jenis Surat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('arsip/jenissurat'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="jenis_surat" name="jenis_surat" placeholder="Jenis Surat">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $no = 0;
foreach ($jenissurat as $j) : $no++; ?>
    <div class="modal fade" id="EditJenisSurat<?= $j['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="EditJenisSuratLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="EditJenisSuratLabel">Edit Jenis Surat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="<?= base_url('arsip/editjenissurat'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="id" name="id" value="<?= $j['id']; ?>">
                        </div>
                        <div>
                            <input type="text" class="form-control" id="jenis_surat" name="jenis_surat" value="<?= $j['jenis_surat']; ?>">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>


<!-- Delete -->
<?php $no = 0;
foreach ($jenissurat as $j) : $no++; ?>
    <div class="modal fade" id="DeletSurat<?= $j['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="DeletSuratLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="DeletSuratLabel">Hapus Surat Masuk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="<?= base_url('arsip/deletjenissurat'); ?>" method="post">
                    <div class="modal-body">
                        <p>Anda yakin untuk menghapus Jenis Surat yang bernama <strong><?= $j['jenis_surat']; ?></strong>?</p>
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="id" name="id" value="<?= $j['id']; ?>">
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