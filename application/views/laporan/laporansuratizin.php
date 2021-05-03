<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card-body">
        <div class="table-responsive">
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?>
                <?php if ($_GET['status_surat'] == 1) : ?>
                    Surat Balasan Penelitian
                    <br>
                    Tanggal : <?= tanggal_indonesia($_GET['start']); ?> s/d Tanggal : <?= tanggal_indonesia($_GET['end']); ?>
            </h1>
            <hr>

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr align="center">
                        <th>No</th>
                        <th>Nomor Surat Balasan</th>
                        <th>Tanggal surat Balasan</th>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>No HP</th>
                        <th>Universitas</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($tabel as $iz) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $iz->nomor_surat; ?></td>
                            <td><?= tanggal_indonesia($iz->tanggal_surat); ?></td>
                            <td><?= $iz->nama_mahasiswa; ?></td>
                            <td><?= $iz->nim_mahasiswa; ?></td>
                            <td><?= $iz->no_hp; ?></td>
                            <td><?= $iz->asal_surat; ?></td>

                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>

        </div>
        <!-- /.container-fluid -->

    </div>
<?php else : ?>
    Surat Keterangan Penelitian
    <br>
    Tanggal : <?= tanggal_indonesia($_GET['start']); ?> s/d Tanggal : <?= tanggal_indonesia($_GET['end']); ?>
    </h1>
    <hr>

    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr align="center">
                <th>No</th>
                <th>Nomor Suket</th>
                <th>Tanggal Suket</th>
                <th>Nama</th>
                <th>Universitas</th>
                <th>Tgl. Mulai Penelitian</th>
                <th>Tgl. Akhir Penelitian</th>
            </tr>
        </thead>

        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($tabel as $iz) : ?>
                <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $iz->no_suket; ?></td>
                    <td><?= tanggal_indonesia($iz->tanggal_suket); ?></td>
                    <td><?= $iz->nama_mahasiswa; ?></td>
                    <td><?= $iz->asal_surat; ?></td>
                    <td><?= $iz->awal_penelitian; ?></td>
                    <td><?= $iz->akhir_penelitian; ?></td>

                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>

</div>
<!-- /.container-fluid -->

</div>
<?php endif; ?>

<!-- End of Main Content -->
<script>
    window.print();
</script>