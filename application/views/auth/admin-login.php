<!doctype html>
<html lang="en">

<head>
	<title>CandyCrush - Laundry</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">


	<!-- Bootstrap -->

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
		integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
		integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
		integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
		integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
	</script>

	<!--==================== UNICONS ====================-->
	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

	<!-- Font -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link
		href="https://fonts.googleapis.com/css2?family=Baloo+2&family=Fredoka+One&family=Poppins:wght@200;500&display=swap"
		rel="stylesheet">

	<link rel="stylesheet" href="<?= base_url('assets/') ?>css/style.css">

</head>

<body style="background-color: #F5EDDC;">
	<section class="ftco-section">
		<div class="container">
		<?= $this->session->flashdata('message'); ?>
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section" style="color: black;font-family: Poppins;">Login Admin - Laundry CandyCrush
					</h2>
					<span style="color: black;font-family: Poppins;">"Cuci Kilat Harga Bersahabat"</span>										
				</div>				
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex" style="border-radius: 15px;">
						<div class="img" style="background-image: url(<?= base_url('assets/')?>img/CCL.png);">
						</div>
						<div class="login-wrap p-4 p-md-5">
							<div class="d-flex">
								<div class="w-100">
									<h3 class="mb-4" style="font-family: Poppins;">Sign In</h3>
								</div>
								<div class="w-100">
									<p class="social-media d-flex justify-content-end">
										<a href="#" target="_blank" class="home__social-icon"
											style="color: #856404; padding-right:10px;">
											<i class="uil uil-facebook-f"></i>
										</a>
										<a href="#" target="_blank" class="home__social-icon" style="color: #856404; ">
											<i class="uil uil-instagram"></i>
										</a>
									</p>
								</div>
							</div>
							<form action="<?= base_url('admin') ?>" class="signin-form" style="font-family: Poppins;" method="POST">
								<div class="form-group mb-3">
									<label class="label" for="name">Username</label>
									<input type="text" name="username" class="form-control" placeholder="<?= form_error('username');?>"
										required>
								</div>

								<div class="form-group mb-3">
									<label class="label" for="password">Kata Sandi</label>
									<input type="password" class="form-control" placeholder="" name="password">																		
								</div>


								<div class="form-group">
									<button type="submit" class="btn btn-light btn-lg rounded submit px-3">Masuk</button>
								</div>								
								<div class="form-group d-md-flex">
									<div class="w-50 text-left">

										</label>
									</div>
								</div>
							</form>							
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>

<script src="<?= base_url('assets/') ?>js/jquery.min.js"></script>
<script src="<?= base_url('assets/') ?>js/popper.js"></script>
<script src="<?= base_url('assets/') ?>js/bootstrap.min.js"></script>
<script src="<?= base_url('assets/') ?>js/main1.js"></script>

</body>

</html>
