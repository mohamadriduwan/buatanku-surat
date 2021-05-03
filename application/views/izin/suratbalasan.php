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

            <a href="" class="btn btn-primary btn-icon-split mb-3" data-toggle="modal" data-target="#addBalasan">
                <span class="icon text-white-50">
                    <i class="fas fa-plus-circle"></i>
                </span>
                <span class="text">Tambah Surat Balasan</span>
            </a>
            <a href="#collapseOne" class="btn btn-success btn-icon-split mb-3" data-toggle="collapse">
                <span class="icon text-white-50">
                    <i class="fas fa-file-pdf"></i>
                </span>
                <span class="text">Laporan Surat Izin</span>
            </a>
            <div id="collapseOne" class="collapse col-md-9">
                <div class="panel-body">
                    <hr>
                    <form class="form-inline" action="<?php echo site_url('izin/laporansuratizin') ?>" target="_blank" method="get">
                        <div class="row">
                            <div class="col-md-9">
                                <p>Laporan Surat yang akan dicetak :</p>
                                <select name="status_surat" class="form-control">
                                    <option value="1">Surat Balasan Penelitian</option>
                                    <option value="2">Surat Keterangan Penelitian</option>
                                </select>
                            </div>

                            <div class="col-md-9">
                                <br>
                                <p>Berdasarkan rentang tanggal surat :</p>
                                <input type="date" class="form-control" name="start" required>
                                <input type="date" class="form-control" name="end" required>
                            </div>
                        </div>
                </div>
                <hr>
                <div class="form-group row justify-content-end">
                    <input type="submit" name="cetak_laporan" value="Cetak Laporan" class="btn btn-success" />
                </div>
                </form>
            </div>

            <br>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tgl. Surat Masuk</th>
                                    <th>Nama</th>
                                    <th>NIM</th>
                                    <th>No HP</th>
                                    <th>Universitas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($izin as $iz) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= tanggal_indonesia($iz['tanggal_surat']); ?></td>
                                        <td><?= $iz['nama_mahasiswa']; ?></td>
                                        <td><?= $iz['nim_mahasiswa']; ?></td>
                                        <td><?= $iz['no_hp']; ?></td>
                                        <td><?= $iz['asal_surat']; ?></td>
                                        <td>
                                            <a href="<?= base_url('izin/cetakbalasan/') . $iz['id']; ?>" target="_blank" class="badge badge-warning">Cetak Surat</a>
                                            <a href="" class="badge badge-success" data-toggle="modal" data-target="#EditBalasan<?= $iz['id']; ?>">Edit</a>

                                            <a href="" class="badge badge-danger" data-toggle="modal" data-target="#DeletBalasan<?= $iz['id']; ?>">Delete</a>

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
<div class="modal fade bd-example-modal-lg" id="addBalasan" tabindex="-1" role="dialog" aria-labelledby="addBalasan" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="padding: 10px 20px;">
            <div class="modal-header">
                <h5 class="modal-title" id="addBalasan">Add Surat Balasan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <br>
            <form action="<?= base_url('izin/suratbalasan'); ?>" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="penulis" name="penulis" placeholder="Penanda Tangan Surat">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="asal_surat" name="asal_surat" placeholder="Nama Instansi Pengirim">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nomor_asal" name="nomor_asal" placeholder="Nomor Surat asal">
                        </div>
                        <div class="form-group">
                            <label for="tanggal_asal">Tanggal Surat Asal</label>
                            <input type="date" class="form-control" id="tanggal_asal" name="tanggal_asal" placeholder="Tanggal Surat asal">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa" placeholder="Nama Mahasiswa">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nim_mahasiswa" name="nim_mahasiswa" placeholder="NIM Mahasiswa">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="fakultas" name="fakultas" placeholder="Fakultas">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="Jurusan">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="prodi" name="prodi" placeholder="Program Studi">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Nomor HP">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="judul_skripsi" name="judul_skripsi" placeholder="Judul Skripsi"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" placeholder="Nomor Surat Keluar">
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="tanggal_surat" name="tanggal_surat" value="<?= date('Y-m-d'); ?>">
                        </div>
                    </div>
                </div>
                <div class=" modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Edit -->
<?php $no = 0;
foreach ($izin as $iz) : $no++; ?>
    <div class="modal fade bd-example-modal-lg" id="EditBalasan<?= $iz['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="EditBalasanLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" style="padding: 10px 20px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="EditBalasanLabel">Edit Surat Balasan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <br>
                <form action="<?= base_url('izin/balasanedit'); ?>" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" class="form-control" id="id" name="id" value="<?= $iz['id']; ?>">
                            <div class="form-group">
                                <input type="text" class="form-control" id="penulis" name="penulis" placeholder="Penanda Tangan Surat" value="<?= $iz['penulis']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="asal_surat" name="asal_surat" placeholder="Nama Instansi Pengirim" value="<?= $iz['asal_surat']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="nomor_asal" name="nomor_asal" placeholder="Nomor Surat asal" value="<?= $iz['nomor_asal']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="tanggal_asal">Tanggal Surat Asal</label>
                                <input type="date" class="form-control" id="tanggal_asal" name="tanggal_asal" placeholder="Tanggal Surat asal" value="<?= $iz['tanggal_asal']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa" placeholder="Nama Mahasiswa" value="<?= $iz['nama_mahasiswa']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="nim_mahasiswa" name="nim_mahasiswa" placeholder="NIM Mahasiswa" value="<?= $iz['nim_mahasiswa']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="fakultas" name="fakultas" placeholder="Fakultas" value="<?= $iz['fakultas']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="Jurusan" value="<?= $iz['jurusan']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="prodi" name="prodi" placeholder="Program Studi" value="<?= $iz['prodi']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Nomor HP" value="<?= $iz['no_hp']; ?>">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" id="judul_skripsi" name="judul_skripsi" placeholder="Judul Skripsi"><?= $iz['judul_skripsi']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" placeholder="Nomor Surat Keluar" value="<?= $iz['nomor_surat']; ?>">
                            </div>
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

<!-- Delet -->
<?php $no = 0;
foreach ($izin as $iz) : $no++; ?>
    <div class="modal fade" id="DeletBalasan<?= $iz['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="DeletBalasanLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="DeletBalasanLabel">Delet</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="<?= base_url('izin/balasandelet'); ?>" method="post">
                    <div class="modal-body">
                        <p>Anda yakin untuk menghapus Balasan Surat untuk <strong><?= $iz['nama_mahasiswa']; ?></strong>?</p>
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