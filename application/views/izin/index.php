<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
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
    <hr>
    <div class="row">
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Surat Balasan Penelitian</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $JumlahSurat; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file-export fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php if ($JumlahSuket != 0) : ?>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Surat Keterangan Penelitian</div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $JumlahSuket; ?></div>
                                    </div>
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: <?= ($JumlahSuket / $JumlahSurat) * 100; ?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            <?php else : ?>
                <div class="col-xl-6 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Surat Keterangan Penelitian</div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">0</div>
                                        </div>
                                        <div class="col">
                                            <div class="progress progress-sm mr-2">
                                                <div class="progress-bar bg-info" role="progressbar" style="width: 0%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                </div>
            </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->