<div class="container-fluid">
<div class="row justify-content-center my-5">
	<div class="col-md-5 ">
		<?php if($this->session->flashdata('pesan') !== null):?>
			<div class="alert alert-success">
				<?= $this->session->flashdata('pesan') ?></div>
		<?php endif; ?>
		<div class="card-header bg-primary text-white text-center">Konfirmasi Pembayaran</div>
		<div class="card-body">
			
			<form action="<?= base_url ('cekKonfirmasi') ?>" method="POST">
				

				<div class="form-group">
					<label>Kode Booking</label>
					<input name="kode" type="text" class="form-control" placeholder="Kode-Booking">
				</div>
				<button class="btn btn-primary">Cek Kode Booking</button>
			</form>
		</div>

	</div>	
</div>

<hr>
	<?php if(isset($_GET['kode'])): ?>
		<div class="container-fluid">
			<div class="row justify-content-center my-6">


	<div class="card">
				<div class="card-header bg-dark text-white">
					Detail Pembayaran Anda
				</div>
				<div class="card-body">
					<h1 class="text-center">
						<?php if($no_tiket->status === '0'): ?>
							<i class="fa fa-times text-danger"></i> Belum Di Bayar
						<?php else: ?>
							<i class="fa fa-check text-success"></i> Sudah Di Bayar
						<?php endif; ?>
					</h1>
					<?php  if($this->session->flashdata('alert') !== null): ?>
						<div class="alert alert-danger">
							<?= $this->session->flashdata('alert') ?>
						</div>
					<?php endif; ?>

					</h1>
					<div class="table-responsive">
						<table class="table ">
							<thead>
								<tr class="text-center">
									<th>Nama</th>
									<th>Identitas</th>
								</tr>
							</thead>
							<tbody>
							<?php foreach($detail as $dt): ?>
								<tr>
									<td><?= $dt->nama ?></td>
									<td><?= $dt->no_identitas ?></td>
								</tr>
							<?php endforeach; ?>
							</tbody>
						</table>
						<p><b>Total Pembayaran Anda : Rp. <?= $no_tiket->total_pembayaran ?></b></p>
						<p class="text-danger">Silahkan Kirim Bukti Pembayaran Anda pada Kolom di Bawah.</p>
						<?= form_open_multipart("kirimKonfirmasi"); ?>
						<input type="hidden" name="no_tiket" value="<?= $no_tiket->no_tiket ?>" >
						<input type="file" name="bukti" class="form-control" required>
						<br>

						<button id="btn_konfirmasi" type="submit" class="btn btn-block btn-dark">Kirim Bukti Pembayaran</button>
						<?= form_close(); ?>

					</div>
				</div>
		</div>

<?php endif; ?>
