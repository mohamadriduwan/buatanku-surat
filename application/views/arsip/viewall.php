<div class="container-fluid">
	<?php foreach ($getsurat as $iz) : ?>
		<!-- Page Heading -->
		<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

		<center>
			<div class="card mb-3 col-lg-12">
				<div class="row no-gutters">
					<div class="col-md-4">
						<table width="100%" class="table table-sm">
							<br>
							<tr>
								<td width="30%">No. Surat</td>
								<td>:</td>
								<td><b><?= $iz['no_surat']; ?></b></td>
							</tr>
							<tr>
								<td>Tgl Surat</td>
								<td>:</td>
								<td><b><?= tanggal_indonesia($iz['tgl_surat']); ?><b></td>
							</tr>
							<tr>
								<td>Perihal</td>
								<td>:</td>
								<td align="justify"><b><?= $iz['perihal']; ?><b></td>
							</tr>
							<tr>
								<td>Jenis Surat</td>
								<td>:</td>
								<td align="justify"><b><?= $iz['jenis_surat']; ?><b></td>
							</tr>
							<tr>
								<td>Asal Surat</td>
								<td>:</td>
								<td align="justify"><b><?= $iz['pengirim']; ?><b></td>
							</tr>
							<tr>
								<td>Tujuan Surat</td>
								<td>:</td>
								<td align="justify"><b><?= $iz['ditujukan']; ?><b></td>
							</tr>
							<tr>
								<td>Sifat Surat</td>
								<td>:</td>
								<td align="justify"><b><?= $iz['sifat_surat']; ?><b></td>
							</tr>
							<tr>
								<td>Tgl. Masuk</td>
								<td>:</td>
								<td align="justify"><b><?= $iz['dibuat_pada']; ?><b></td>
							</tr>

						</table>
						<br>
						<table width="100%" border="0" style="text-align:center">
							<br>
							<tr>
								<td>
									<div class="my-2"></div>
									<a href="<?= base_url('arsip/suratmasuk'); ?>" class="btn btn-success btn-icon-split">
										<span class="icon text-white-50">
											<i class="fas fa-arrow-alt-circle-left"></i>
										</span>
										<span class="text">Kembali</span>
									</a>
					</div>

					</table>
				</div>

				<div class="col-md-8 surat-buatan" id="printableArea">
					<center>
						<div class="card-body">
							<table>

								<?php if ($iz['berkas_surat'] == "") : ?>
									<tr>
										<td style="font-size:22px"><br><br><br><b>(No File)</b></td>
									<?php else : ?>
									<tr>
										<td><img src="<?= base_url('assets/img/surat_masuk/'); ?><?= $iz['berkas_surat']; ?>" width="100%"></td>
									<?php endif; ?>
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