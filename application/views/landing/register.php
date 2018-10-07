<!DOCTYPE html>
<html lang="en">
<head>
	<title>LCP Register</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="<?=base_url()?>images/icons/favicon.ico"/>

	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/animate.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/select2.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/util-r.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/main-r.css">
</head>
<body style="background-color: #999999;">
	<div class="limiter">
		<div class="container-login100">
			<div class="login100-more" style="background-image: url('<?=base_url()?>images/bg-01.jpg');"></div>

			<div class="wrap-login100 p-l-50 p-r-50 p-t-30 p-b-30">
				<form class="login100-form validate-form" method="post" action="landing/regsub">
					<span class="login100-form-title p-b-25">
						Sign Up
					</span>

					<div class="wrap-input100 validate-input" data-validate="First Name is required">
						<span class="label-input100">First Name</span>
						<input class="input100" type="text" name="fname" placeholder="First Name...">
						<span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Last Name is required">
                        <span class="label-input100">Last Name</span>
                        <input class="input100" type="text" name="lname" placeholder="Last Name...">
                        <span class="focus-input100"></span>
                    </div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<span class="label-input100">Email</span>
						<input class="input100" type="text" name="email" placeholder="Email Address...">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="text" name="pass" placeholder="*************">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Repeat Password is required">
						<span class="label-input100">Repeat Password</span>
						<input class="input100" type="text" name="repeat-pass" placeholder="*************">
						<span class="focus-input100"></span>
					</div>

                    <div class="form-group">
                        <?=$widget?>
                        <?=$myscript?>
                    </div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Sign Up
							</button>
						</div>

						<a href="<?=base_url()?>landing" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
							Sign in
							<i class="fa fa-long-arrow-right m-l-5"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<script src="<?=base_url()?>assets/js/jquery-3.2.1.min.js"></script>
	<script src="<?=base_url()?>assets/js/animsition.min.js"></script>
	<script src="<?=base_url()?>assets/js/popper.js"></script>
	<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
	<script src="<?=base_url()?>assets/js/select2.min.js"></script>
	<script src="<?=base_url()?>assets/js/moment.min.js"></script>
	<script src="<?=base_url()?>assets/js/daterangepicker.js"></script>
	<script src="<?=base_url()?>assets/js/countdowntime.js"></script>
	<script src="<?=base_url()?>assets/js/main-r.js"></script>
</body>
</html>