<!DOCTYPE html>
<html>
<head>
	<title>Dashboard Admin</title>


	<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css')?>">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
	    <a class="navbar-brand" href="#">GO-BUS</a>
	    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
	      <li class="nav-item active">
	        <a class="nav-link" href="<?= base_url('admin/dashboard') ?>">Home <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item active ">
	        <a class="nav-link" href="<?= base_url('admin/dashboard/kelola-jadwal') ?>">Kelola Jadwal</a>
	      </li>
	      <li class="nav-item">
	      </li>
	    </ul>
	    <span class="navbar-text">
<a class="text-muted" href="<?=base_url('logout')?>" >Logout</a>
	     </span>
	  </div>
	</nav>

<div class="container-fluid my-5">
<div class="row">
	
<div class="col-md-8"> 	
	<div  class="card">
	<div class="card-header"> Daftar Stasiun</div>
	<div class="card-body">
		<table class="table table-condensed table-hover">
			<thead>
				<tr>
					<th>NO</th>
					<th>Nama Stasiun</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1; ?>
				<?php foreach ($stasiun as $st): ?>
					
				
				<tr>
					<td><?= $no++; ?></td>
					<td><?= $st->nama_stasiun ?></td>
					<td><a class="text-danger" href="<?= base_url ('hapusStasiun/'.$st->id)?>">Hapus</a>
						<a href="<?= base_url('admin/dashboard/edit'.$st->id) ?>">Edit</a></td>
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>

	</div>

</div>


</div>
<div class="col-md-4">
	<div class="card">
		<div class="card-header">Form Tambah Stasiun </div>
		<div class="card-body"><form action="<?= base_url('tambahStasiun') ?>" method="POST">
		<div class="form-group">
			<label>Nama Stasiun</label>
			<input type="text" class="form-control" name="stasiun" placeholder="Nama Stasiun">
		</div>
		<button class="btn btn-succes btn-block btn-primary"> Tambah Stasiun</button>
	</form> </div>
	</div>
	
</div>
</div>	



</div>







</body>
</html>