<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
</head>


<body>
	<div class="container-fluid">
<div class="row justify-content-center">
	<div class="col-md-5">
	<div class="card my-5">
		<div class="card-header bg-primary text-white text-center">Login Sebagai Admin</div>
			<div class="card-body">
				<form action="<?=base_url('prosesLogin')?>" method="POST">
					<div class="form-group">
						<label>Username</label>
						<input type="text" name="Username"placehorder="Username" class="form-control">
			</div>

			<div class="form-group">
				<label>Password</label>
				<input type="text" name="Password"placehorder="Password" class="form-control">
			</div>
			<button class="btn btn-succes bg-primary text-white btn-block">Login</button>

		</form>
			</div>
		</div>
</div>
</div>
</div>
</body>
</html>