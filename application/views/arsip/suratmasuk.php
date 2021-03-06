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

            <a href="" class="btn btn-primary btn-icon-split mb-3" data-toggle="modal" data-target="#tambahSurat">
                <span class="icon text-white-50">
                    <i class="fas fa-plus-circle"></i>
                </span>
                <span class="text">Tambah Surat Masuk</span>
            </a>
            <br>




            <!-- DataTales Example -->
            <div class="card shadow mb-4">

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr align="center">
                                    <th>#</th>
                                    <th>Tgl Diterima</th>
                                    <th>No. Surat</th>
                                    <th>Tgl Surat</th>
                                    <th>Perihal</th>
                                    <th>Berkas</th>
                                    <th>Disposisi</th>
                                    <th>Aksi</th>

                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($surat as $iz) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= date('d/m/Y', $iz['dibuat_pada']); ?></td>
                                        <td><?= $iz['no_surat']; ?></td>
                                        <td><?= tanggal_indonesia($iz['tgl_surat']); ?></td>
                                        <td><?= $iz['perihal']; ?></td>
                                        <td align="center">
                                            <?php if ($iz['berkas_surat'] == "") : ?>
                                                (No File)
                                            <?php else : ?>
                                                <a href="<?= base_url('assets/img/surat_masuk/'); ?><?= $iz['berkas_surat']; ?>" target="_blank" class="btn btn-info btn-circle btn-sm">
                                                    <i class="fas fa-file"></i>
                                                </a>
                                            <?php endif; ?>
                                        </td>
                                        <td align="center">
                                            <?php if ($iz['status_disposisi'] == 0) : ?>
                                                <a href="" class="btn btn-dark btn-circle btn-sm" data-toggle="modal" data-target="#DisposisiSurat<?= $iz['id']; ?>">
                                                    <i class="fas fa-share-square"></i>
                                                </a>
                                            <?php else : ?>
                                                <a href="<?= base_url('arsip/cetakdisposisi/') . $iz['id']; ?>" target="_blank" class="btn btn-success btn-circle btn-sm">
                                                    <i class="fas fa-check"></i>
                                                </a>
                                            <?php endif; ?>
                                        </td>
                                        <td align="center" width="100px">
                                            <a href="<?= base_url('arsip/viewall/') . $iz['id']; ?>" class="btn btn-primary btn-circle btn-sm">
                                                <i class="fas fa-search"></i>
                                            </a>

                                            <a href="" class="btn btn-warning btn-circle btn-sm" data-toggle="modal" data-target="#EditSurat<?= $iz['id']; ?>">
                                                <i class="fas fa-edit"></i>
                                            </a>
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
<div class="modal fade bd-example-modal-lg" id="tambahSurat" tabindex="-1" role="dialog" aria-labelledby="tambahSurat" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="padding: 10px 20px;">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahSurat">Tambah Surat Masuk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <br>
            <?= form_open_multipart('arsip/suratmasuk'); ?>
            <form action="<?= base_url('arsip/suratmasuk'); ?>" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <input type="hidden" name="petugas" class="form-control" value="<?= $user['id']; ?>">
                        <div class="form-group">
                            <label>Tanggal Diterima</label>
                            <div class="input-group">
                                <input type="date" name="dibuat_pada" id="dibuat_pada" class="form-control" value="<?= date('Y-m-d', time()); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>No. Surat</label>
                            <input type="text" name="no_surat" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Perihal</label>
                            <input type="text" name="perihal" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Tanggal Surat</label>
                            <div class="input-group">
                                <input type="date" name="tgl_surat" id="inputTglSurat" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Jenis Surat</label>
                            <select name="jenis_surat" class="form-control">
                                <option value="" selected="selected">-- Jenis Surat --</option>
                                <?php foreach ($jenissurat as $list) : ?>
                                    <option value="<?= $list['id']; ?>"><?= $list['jenis_surat']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Pengirim</label>
                            <input type="text" name="pengirim" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Ditujukan</label>
                            <input type="text" name="ditujukan" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" rows="2"></textarea>
                        </div>

                        <div class="form-group">
                            <label id="label-photo">Berkas</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                            <br>
                            <br>
                            <div class="form-group">
                                <label>Sifat Surat</label>
                                <select name="sifat_surat" class="form-control">
                                    <option value="Rahasia">Rahasia</option>
                                    <option value="Penting">Penting</option>
                                    <option value="Segera">Segera</option>
                                    <option value="Biasa" selected="selected">Biasa</option>

                                </select>
                            </div>

                        </div>
                    </div>
                </div>
                <div class=" modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>



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

                <form action="<?= base_url('arsip/deletsuratmasuk'); ?>" method="post">
                    <div class="modal-body">
                        <p>Anda yakin untuk menghapus Surat Masuk Nomor <strong><?= $iz['no_surat']; ?></strong>?</p>
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
<?php $no = 0;
foreach ($surat as $iz) : $no++; ?>
    <div class="modal fade bd-example-modal-lg" id="EditSurat<?= $iz['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="EditSurat" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" style="padding: 10px 20px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="EditSurat">Edit Surat Masuk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <br>
                <?= form_open_multipart('arsip/editsurat'); ?>
                <form action="<?= base_url('arsip/editsurat'); ?>" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" name="id" class="form-control" value="<?= $iz['id']; ?>">
                            <div class=" form-group">
                                <label>tanggal diterima</label>
                                <input type="date" name="perihal" class="form-control" value="<?= date('Y-m-d', $iz['dibuat_pada']); ?>">
                            </div>
                            <div class="form-group">
                                <label>No. Surat</label>
                                <input type="text" name="no_surat" class="form-control" value="<?= $iz['no_surat']; ?>">
                            </div>

                            <div class=" form-group">
                                <label>Perihal</label>
                                <input type="text" name="perihal" class="form-control" value="<?= $iz['perihal']; ?>">
                            </div>

                            <div class=" form-group">
                                <label>Tanggal Surat</label>
                                <div class="input-group">
                                    <input type="date" name="tgl_surat" id="inputTglSurat" class="form-control" value="<?= $iz['tgl_surat']; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Jenis Surat</label>
                                <select name="jenis_surat" class="form-control">
                                    <?php foreach ($jenissurat as $list) : ?>
                                        <option value="<?= $list['id']; ?>" <?php if ($list['id'] == $iz['id_jenis_surat']) {
                                                                                echo 'selected="selected"';
                                                                            }; ?>><?= $list['jenis_surat']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Pengirim</label>
                                <input type="text" name="pengirim" class="form-control" value="<?= $iz['pengirim']; ?>">
                            </div>

                            <div class="form-group">
                                <label>Ditujukan</label>
                                <input type="text" name="ditujukan" class="form-control" value="<?= $iz['ditujukan']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" rows="2"><?= $iz['deskripsi']; ?></textarea>
                            </div>

                            <div class="form-group">
                                <label id="label-photo">Berkas</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                </div>
                                <br>
                                <br>
                                <div class="form-group">
                                    <label>Sifat Surat</label>
                                    <select name="sifat_surat" class="form-control">
                                        <option value="Rahasia" <?php if ($iz['sifat_surat'] == "Rahasia") {
                                                                    echo 'selected="selected"';
                                                                }; ?>>Rahasia</option>
                                        <option value="Penting" <?php if ($iz['sifat_surat'] == "Penting") {
                                                                    echo 'selected="selected"';
                                                                }; ?>>Penting</option>
                                        <option value="Segera" <?php if ($iz['sifat_surat'] == "Segera") {
                                                                    echo 'selected="selected"';
                                                                }; ?>>Segera</option>
                                        <option value="Biasa" <?php if ($iz['sifat_surat'] == "Biasa") {
                                                                    echo 'selected="selected"';
                                                                }; ?>>Biasa</option>

                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class=" modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?php $no = 0;
foreach ($surat as $iz) : $no++; ?>
    <div class="modal fade bd-example-modal-lg" id="DisposisiSurat<?= $iz['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="DisposisiSuratLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="DisposisiSuratLabel">Disposisi Surat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="form-group">

                    <table class="table">
                        <tr>
                            <td width="25%">Nomor Urut</td>
                            <td width="5%">:</td>
                            <td><b><?= $no; ?></b></td>
                        </tr>
                        <tr>
                            <td>Tanggal Surat</td>
                            <td>:</td>
                            <td><b><?= tanggal_indonesia($iz['tgl_surat']); ?></b></td>
                        </tr>
                        <tr>
                            <td>Nomor Surat</td>
                            <td>:</td>
                            <td><b><?= $iz['no_surat']; ?></b></td>
                        </tr>
                        <tr>
                            <td>Dari</td>
                            <td>:</td>
                            <td><b><?= $iz['pengirim']; ?></b></td>
                        </tr>
                        <tr>
                            <td>Perihal</td>
                            <td>:</td>
                            <td><b><?= $iz['perihal']; ?></b></td>
                        </tr>
                    </table>
                    <hr>
                    <form action="<?= base_url('arsip/disposisi'); ?>" method="post">
                        <div class="modal-body">
                            <div class="form-group row">
                                <input type="hidden" name="no_urut" class="form-control" value="<?= $no; ?>">
                                <input type="hidden" name="id" class="form-control" value="<?= $iz['id']; ?>">
                                <input type="hidden" name="status_disposisi" class="form-control" value="1">
                                <label for="disposisi_kepada" class="col-sm-3 col-form-label">Disposisi Kepada</label>
                                <div class="col-sm-5">
                                    <select name="disposisi_kepada" class="form-control" required>
                                        <option value="" selected="selected">- Silahkan Pilih -</option>
                                        <option value="Waka Kurikulum">Waka Kurikulum</option>
                                        <option value="Waka Humas">Waka Humas</option>
                                        <option value="Waka Kesiswaan">Waka Kesiswaan</option>
                                        <option value="Waka Sarpras">Waka Sarpras</option>
                                        <option value="Kepala Perpustakaan">Kepala Perpustakaan</option>
                                        <option value="Kepala TU">Kepala TU</option>
                                        <option value="BP/BK">BP/BK</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="instruksi" class="col-sm-3 col-form-label">Instruksi</label>
                                <div class="col-sm-7">
                                    <textarea name="instruksi" class="form-control" rows="2" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Disposisikan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>