<!DOCTYPE html>
<html lang="en">
<head>
    <title>LCP Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="<?=base_url()?>assets/iamges/favicon.png"/>
    
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/animate.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/main.css">
</head>
<body>
    <div class="limiter">
        <div class="container-login100" style="background-image: url('<?=base_url()?>images/img-01.jpg');">
            <div class="wrap-login100 p-t-50 p-b-30">
                <form class="login100-form validate-form" method="post" action="<?=base_url()?>landing/login">
                    <div class="login100-form-avatar">
                        <a href="<?=base_url()?>portal">
                            <img draggable="false" ondragstart="return false;" src="<?=base_url()?>assets/images/lcp.png">
                        </a>
                    </div>

                    <span class="login100-form-title p-t-20 p-b-45">Lung Center of the Philippines</span>

                    <div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
                        <input class="input100" type="text" name="user" placeholder="Username">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
                        <input class="input100" type="password" name="pass" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn p-t-10">
                        <button class="login100-form-btn">Login</button>
                    </div>

                    <div class="text-center w-full p-t-25 p-b-25">
                        <a href="#" class="txt1">Forgot Username / Password?</a>
                    </div>

                    <div class="text-center w-full">
                        <a class="txt1" href="<?=base_url()?>landing/register">Create new account<i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="<?=base_url()?>assets/js/jquery-3.2.1.min.js"></script>
    <script src="<?=base_url()?>assets/js/popper.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/js/select2.min.js"></script>
    <script src="<?=base_url()?>assets/js/main.js"></script>
</body>
</html>