

		<div class="jumbotron jumbotron-fluid" style="background-color: white">

		  <div class="container">
		  	<div class="row" style="background-color: white"> 
	<div class="col-md-7"> 

		<h3 class="display-3">Selamat Datang di GO-BUS</h3>
	<p class="lead">Anda bisa memesan tiket Bus dengan mudah dengan  </p>
	<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTdIs9gTfHIsCqYqguy3WJKwEF3K2uvI0Co5w&usqp=CAUs" sizes="100px">
	 <img src="">
	</div>

	<div class="col-md-5">
	<form action="<?='cariTiket' ?>" method="POST">
		<div class="form-group">
			<label>Terminal Asal</label>
			<select name="asal" class="form-control">
				<?php foreach ($stasiun as $st):?>
				<option value="<?= $st->id ?>"><?=$st->nama_stasiun ?></option>
				<?php endforeach ?>
				
			</select>
		</div>
		<div class="form-group">
			<label>Terminal Tujuan</label>
			<select name="tujuan" class="form-control">
	<?php foreach ($stasiun as $st):?>
				<option value="<?= $st->id ?>"><?=$st->nama_stasiun ?></option>
				<?php endforeach ?>		</select>
		</div>
		<div class="form-group">
	    				<label class="text-black bayangan font-weight-bold">Tanggal Berangkat</label>
	    				<input type="date" name="tanggal" class="form-control" min="<?= date('Y-m-d') ?>" value='<?= date('Y-m-d') ?>'>
	    			</div>
		<div class="form-group">
			<label>Jumlah Penumpang</label>
			<select name="jumlah" class="form-control">
				<?php for ($i=1; $i <=5 ; $i++): ?>
				<option value="<?= $i ?>"><?= $i ?> Penumpang</option>
				<?php endfor ; ?>
			</select>
		</div>
		<br><br>
		<button class="btn btn-primary btn-block">Cari Tiket</button>
	</form>
	 </div>
	 </div>
	</div>
	</div>
	<div class="container">
			<hr>
			

	<div class="container">
		<hr>
		<?php if (!isset($tiket)): ?>
			
		<?php else: ?>
			
		<div class="table-responsive">
			<table class="table table-hover table-bordered">
				<thead class="bg-primary text-white text-center">
					<tr>
						<th>No</th>
						<th>Nama Kereta</th>
						<th>Tanggal Berangkat</th>
						<th>Tanggal Sampai</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody class="text-center">

					<?php $no = 1; ?>
					<?php foreach ($tiket as $tk): ?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $tk->nama_bus ?></td>
						<td><?php $date = date_create($tk->tgl_berangkat); echo date_format($date, "d-m-Y h:i:s");  ?></td>
						<td><?php $date = date_create($tk->tgl_sampai); echo date_format($date, "d-m-Y h:i:s"); ?></td>
						<td>
							<a class="btn btn-primary" href="<?= base_url('pesan/'.$tk->id.'?p='.$penumpang) ?> ">Pesan</a>
						</td>
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>

		<?php endif; ?>

	</div>







