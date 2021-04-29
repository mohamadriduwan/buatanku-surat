<!-- Begin Page Content -->
<!-- <script>
	function printDiv(printableArea) {
		var printContents = document.getElementById(printableArea).innerHTML;
		var originalContents = document.body.innerHTML;
		document.body.innerHTML = printContents;
		window.print();
		document.body.innerHTML = originalContents;

	}
</script> -->

<div class="container-fluid">
	<?php foreach ($izin as $iz) : ?>
		<!-- Page Heading -->
		<h1 class="h3 mb-4 text-gray-800"><?= $title; ?> <?= $iz['nama_mahasiswa']; ?></h1>

		<center>
			<div class="card mb-3 col-lg-12">
				<div class="row no-gutters">
					<div class="col-md-4">
						<table width="100%" border="1">
							<br>
							<tr>
								<td>&nbsp;Nama</td>
								<td>&nbsp;<b><?= $iz['nama_mahasiswa']; ?></b></td>
							</tr>
							<tr>
								<td>&nbsp;NIM</td>
								<td>&nbsp;<?= $iz['nim_mahasiswa']; ?></td>
							</tr>
							<tr>
								<td>&nbsp;Asal Universitas</td>
								<td>&nbsp;<?= $iz['asal_surat']; ?></td>
							</tr>
							<tr>
								<td>&nbsp;Nomor HP</td>
								<td>&nbsp;<?= $iz['no_hp']; ?></td>
							</tr>
						</table>
						<br>
						<table width="100%" border="0" style="text-align:center">
							<br>
							<tr>
								<td>
									<div class="my-2"></div>
									<a href="<?= base_url('izin/index'); ?>" class="btn btn-success btn-icon-split">
										<span class="icon text-white-50">
											<i class="fas fa-arrow-alt-circle-left"></i>
										</span>
										<span class="text">Kembali</span>
									</a>
					</div>
					</td>
					<td>
						<div class="my-2"></div>
						<a href="<?= base_url('izin/cetakbalasan/') . $iz['id']; ?>" target="_blank" class="btn btn-primary btn-icon-split">
							<span class="icon text-white-50">
								<i class="fas fa-print"></i>
							</span>
							<span class="text">Print</span>
						</a>
				</div>
				</td>
				</tr>
				</table>
			</div>

			<div class="col-md-8 surat-buatan" id="printableArea">
				<center>
					<div class="card-body">
						<table>
							<tr>
								<td><img src="<?= base_url('assets/img/profile/KOPBOS.jpg'); ?>" width="100%"></td>
							</tr>


							<table width="80%" border="0" style="text-align:justify">
								<tr>
									<td>Nomor</td>
									<td>: MTsM/609/PP.00.5/<?= $iz['nomor_surat']; ?>/<?= getRomawi(date('m', strtotime($iz['tanggal_surat']))); ?>/<?= date('Y', strtotime($iz['tanggal_surat'])); ?></td>
								</tr>
								<tr>
									<td>Lamp</td>
									<td>: -</td>
								</tr>
								<tr>
									<td>Hal</td>
									<td>: <b><u>Balasan Penelitian</u></b></td>
								</tr>
							</table>
							<br>
							<table width="80%" border="0" style="text-align:justify">
								<br>
								<br>
								<tr>
									<td colspan=2>Kepada Yth.</td>
								</tr>
								<tr>
									<td colspan=2><b>Bapak/Ibu <?= $iz['penulis']; ?></b></td>
								</tr>
								<tr>
									<td colspan=2><b><?= $iz['asal_surat']; ?></b></td>
								</tr>
								<tr>
									<td colspan=2>di</td>
								</tr>
								<tr>
									<td colspan=2>&nbsp;</td>
								</tr>
								<tr>
									<td width="10%"></td>
									<td>Tempat</td>
								</tr>
							</table>
							<br>
							<br>
							<table width="80%" border="0" style="text-align:justify">
								<tr>
									<td>
										<p><b><i>Assalamu'alaikum Wr. Wb.</i></b></p>
									</td>
								</tr>
								<tr>
									<td>
										<p>Sehubungan dengan surat Bapak/Ibu pada tanggal <?= tanggal_indonesia($iz['tanggal_asal']); ?>
											Nomor <?= $iz['nomor_asal']; ?> perihal perizinan tempat penelitian
											dalam rangka penyusunan Skripsi Mahasiswa/Mahasiswi :</p>
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
								<tr>
									<td valign="top" class="text"></td>
									<td class="text" valign="top">Judul Skripsi</td>
									<td class="text" valign="top">:</td>
									<td class="text" valign="top"><b><?= $iz['judul_skripsi']; ?></b></td>
								</tr>
							</table>
							<br>
							<table width="80%" border="0" style="text-align:justify">
								<tr>
									<td>
										<p>Perlu kami sampaikan beberapa hal sebagai berikut :</p>
										<ol>
											<li>Pada prinsipnya kami tidak keberatan dan dapat mengizinkan pelaksanaan penelitian tersebut di tempat kami</li>
											<li>Izin melakukan penelitian diberikan semata-mata untuk keperluan akademik</li>
										</ol>
									</td>
								</tr>
								<tr>
									<td>
										<p>Demikian surat balasan dari kami, atas kerjasamanya kami mengucapkan terimakasih.</p>
									</td>
								</tr>
								<tr>
									<td>
										<p><b><i>Wassalamu'alaikum Wr. Wb.</i></b></p>
									</td>
								</tr>
							</table>


							<br>
							<br>
							<table width="80%" border="0" style="text-align:justify">
								<tr>
									<td width="60%" class="text"></td>
									<td class="text">Blitar, <?= tanggal_indonesia($iz['tanggal_surat']); ?></td>
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
		</center>

	<?php endforeach; ?>

	<iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->