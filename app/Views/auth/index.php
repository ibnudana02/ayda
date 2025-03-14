<!DOCTYPE html>
<html lang="en">

<head>
	<title><?= $app['nm_aplikasi'] . " - " . strtoupper($title) ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?= base_url('public/uploads/aplikasi/' . $app['logo']) ?>" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('public/auth/') ?>plugins/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('public/auth/') ?>fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('public/auth/') ?>fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('public/auth/') ?>plugins/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('public/auth/') ?>plugins/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('public/auth/') ?>plugins/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('public/auth/') ?>plugins/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('public/auth/') ?>plugins/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('public/auth/') ?>css/util.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('public/auth/') ?>css/main.css">
	<!--===============================================================================================-->
</head>

<body>

	<div class="limiter">
		<div class="container-login100" style='background-image: url("<?= base_url('public/uploads/aplikasi/' . $app['background']) ?>");'>
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="<?= base_url('admin/login') ?>" method="post">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>
					<span class="login100-form-title p-b-34 p-t-27">
						Log in <br> <?= $app['fnama_aplikasi'] ?>
					</span>
					<?php if (session()->getFlashdata('msg')) : ?>
						<div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
					<?php endif; ?>
					<div class="wrap-input100 validate-input" data-validate="Enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

	<!--===============================================================================================-->
	<script src="<?= base_url('public/auth/') ?>plugins/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url('public/auth/') ?>plugins/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url('public/auth/') ?>plugins/bootstrap/js/popper.js"></script>
	<script src="<?= base_url('public/auth/') ?>plugins/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url('public/auth/') ?>plugins/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url('public/auth/') ?>plugins/daterangepicker/moment.min.js"></script>
	<script src="<?= base_url('public/auth/') ?>plugins/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url('public/auth/') ?>plugins/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url('public/auth/') ?>js/main.js"></script>

</body>

</html>