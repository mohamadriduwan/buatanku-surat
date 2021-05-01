<?php foreach ($izin as $iz) : ?>
    <div class="surat-buatan2">
        <center>
            <div class="card-body">
                <table>
                    <br>
                    <tr>
                        <td><img src="<?= base_url('assets/img/profile/KOPBOS.jpg'); ?>" width="100%"></td>
                    </tr>

                    <table class="surat-buatan2" width="80%" border="0" cellpadding="0" style="text-align:center">
                        <br>
                        <br>
                        <tr>
                            <td style="font-size: 22pt">
                                <b><u>
                                        SURAT KETERANGAN
                                    </u></b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Nomor : MTsM/609/PP.00.5/<?= $iz['no_suket']; ?>/<?= getRomawi(date('m', strtotime($iz['tanggal_suket']))); ?>/<?= date('Y', strtotime($iz['tanggal_suket'])); ?>
                            </td>
                        </tr>
                    </table>
                    <br>
                    <br>
                    <br>
                    <table width="80%" border="0" style="text-align:justify">
                        <tr>
                            <td colspan="4">
                                Yang bertanda tangan di bawah ini :
                            </td>
                        </tr>
                        <tr>
                            <td width="5%" valign="top" class="text"></td>
                            <td width="20%" valign="top" class="text">Nama</td>
                            <td class="text" width="2%" valign="top">:</td>
                            <td class="text" valign="top"><b>FARUQ, RIFQI, S.Pd.</b></td>
                        </tr>
                        <tr>
                            <td width="5%" valign="top" class="text"></td>
                            <td width="20%" valign="top" class="text">Jabatan</td>
                            <td class="text" width="2%" valign="top">:</td>
                            <td class="text" valign="top">Kepala Madrasah</td>
                        </tr>
                        <tr>
                            <td width="5%" valign="top" class="text"></td>
                            <td width="20%" valign="top" class="text">Unit Kerja</td>
                            <td class="text" width="2%" valign="top">:</td>
                            <td class="text" valign="top">MTs. Ma'arif Bakung</td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <br>
                                Menerangkan dengan sebenarnya bahwa :
                            </td>
                        </tr>
                    </table>

                    <table width="80%" border="0" style="text-align:justify">
                        <tr>
                            <td width="5%" valign="top" class="text"></td>
                            <td width="20%" valign="top" class="text">Nama</td>
                            <td class="text" width="2%" valign="top">:</td>
                            <td class="text" valign="top"><b><?= $iz['nama_mahasiswa']; ?></b></td>
                        </tr>
                        <tr>
                            <td valign="top" class="text"></td>
                            <td class="text" valign="top">NIM</td>
                            <td class="text" valign="top">:</td>
                            <td class="text" valign="top"><b><?= $iz['nim_mahasiswa']; ?></b></td>
                        </tr>
                        <?php if ($iz['fakultas'] != "") : ?>
                            <tr>
                                <td class="text" valign="top"></td>
                                <td class="text" valign="top">Fakultas</td>
                                <td class="text" valign="top">:</td>
                                <td class="text" valign="top"><b><?= $iz['fakultas']; ?></b></td>
                            </tr>
                        <?php else : ?>
                        <?php endif; ?>
                        <?php if ($iz['jurusan'] != "") : ?>
                            <tr>
                                <td class="text" valign="top"></td>
                                <td class="text" valign="top">Jurusan</td>
                                <td class="text" valign="top">:</td>
                                <td class="text" valign="top"><b><?= $iz['jurusan']; ?></b></td>
                            </tr>
                        <?php else : ?>
                        <?php endif; ?>
                        <?php if ($iz['prodi'] != "") : ?>
                            <tr>
                                <td class="text" valign="top"></td>
                                <td class="text" valign="top">Program Studi</td>
                                <td class="text" valign="top">:</td>
                                <td class="text" valign="top"><b><?= $iz['prodi']; ?></b></td>
                            </tr>
                        <?php else : ?>
                        <?php endif; ?>
                        <tr>
                            <td valign="top" class="text"></td>
                            <td class="text" valign="top">Telepon</td>
                            <td class="text" valign="top">:</td>
                            <td class="text" valign="top"><b><?= $iz['no_hp']; ?></b></td>
                        </tr>
                    </table>
                    <br>
                    <table width="80%" border="0" style="text-align:justify">
                        <tr>
                            <td>
                                <p>Telah melaksanakan penelitian di MTs. Ma’arif Bakung Udanawu Blitar mulai tanggal <?= tanggal_indonesia($iz['awal_penelitian']); ?> sampai dengan <?= tanggal_indonesia($iz['akhir_penelitian']); ?> dengan judul skripsi :
                                    <b>“<?= $iz['judul_skripsi']; ?>”</b>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Demikian Surat ini kami buat untuk diketahui dan dipergunakan sebagaimana mestinya.</p>
                            </td>
                        </tr>

                    </table>


                    <br>
                    <br>
                    <table width="80%" border="0" style="text-align:justify">
                        <tr>
                            <td width="60%" class="text"></td>
                            <td class="text">Blitar, <?= tanggal_indonesia($iz['tanggal_suket']); ?></td>
                        </tr>
                        <tr>
                            <td class="text"></td>
                            <td class="text">Kepala Madrasah,</td>
                        </tr>
                        <tr>
                            <td class="text"><br><br><br></td>
                            <td class="text"></td>
                        </tr>
                        <tr>
                            <td class="text"></td>
                            <td class="text"><b>FARUQ RIFQI, S.Pd.</b></td>
                        </tr>
                    </table>
        </center>
    <?php endforeach; ?>
    <script>
        window.print();
    </script>