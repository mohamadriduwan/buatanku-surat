<?php foreach ($surat as $iz) : ?>
    <div linespacing="50px" style="text-align:justify ; font-size:20px ; color:black ; font-family: Times New Roman">
        <center>
            <div class="card-body">
                <table>
                    <br>
                    <tr>
                        <td>
                            <center><img src="<?= base_url('assets/img/profile/KOPBOS.jpg'); ?>" width="95%"></center>
                        </td>
                    </tr>
                </table>
                <br>
                <table class="surat-buatan2" width="90%" border="1" style="text-align:justify">
                    <tr>
                        <td height="50px" align="center"><b>LEMBAR DISPOSISI</b></td>
                    </tr>
                    <tr>
                        <td height="200px">
                            <table border="0" style="text-align:justify">
                                <tr valign="top">
                                    <td width="20px"></td>
                                    <td width="150px">Nomor Urut</td>
                                    <td width=20px>:</td>
                                    <td><b><?= $iz['no_urut']; ?></b></td>
                                    <td width="20px"></td>
                                </tr>
                                <tr valign="top">
                                    <td></td>
                                    <td>Tanggal Surat</td>
                                    <td>:</td>
                                    <td><b><?= tanggal_indonesia($iz['tgl_surat']); ?></b></td>
                                    <td></td>
                                </tr>
                                <tr valign="top">
                                    <td></td>
                                    <td>Nomor Surat</td>
                                    <td>:</td>
                                    <td><b><?= $iz['no_surat']; ?></b></td>
                                    <td></td>
                                </tr>
                                <tr valign="top">
                                    <td></td>
                                    <td>Dari</td>
                                    <td>:</td>
                                    <td><b><?= $iz['pengirim']; ?></b></td>
                                    <td></td>
                                </tr>
                                <tr valign="top">
                                    <td></td>
                                    <td>Perihal</td>
                                    <td>:</td>
                                    <td><b><?= $iz['perihal']; ?></b></td>
                                    <td></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td height="50px" align="center"><b>DISPOSISI KEPADA</b></td>
                    </tr>
                    <tr>
                        <td align="center" height="50px"><b><?= $iz['disposisi_kepada']; ?></b></td>
                    </tr>
                    <tr>
                        <td align="center" height="50px"><b>ISI DISPOSISI / INSTRUKSI</b></td>
                    </tr>
                    <tr>
                        <td valign="top" align="center" height="500px"><b><br><?= $iz['instruksi']; ?></b></td>
                    </tr>
                </table>
                <br>

        </center>
    <?php endforeach; ?>
    <script>
        window.print();
    </script>