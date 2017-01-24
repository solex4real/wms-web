<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
?>
<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>WMS WEB</title>
<link rel="icon" href="<?= base_url();?>wms/images/icons/logo-small.png">

<!-- Include Bootstrap Material Design files -->



<!-- Vendor CSS -->
<link
	href="<?= base_url();?>material/vendors/animate-css/animate.min.css"
	rel="stylesheet">
<link
	href="<?= base_url();?>material/vendors/sweet-alert/sweet-alert.min.css"
	rel="stylesheet">
<link
	href="<?= base_url();?>material/vendors/material-icons/material-design-iconic-font.min.css"
	rel="stylesheet">
<link href="<?= base_url();?>material/vendors/socicon/socicon.min.css"
	rel="stylesheet">

<!-- CSS -->
<link href="<?= base_url();?>material/css/app.min.1.css"
	rel="stylesheet">
<link href="<?= base_url();?>material/css/app.min.2.css"
	rel="stylesheet">
</head>

<body class="login-content">
	
	<!-- Logo&Name 
	<img src="<?= base_url();?>wms/images/icons/company-name.png" alt="" >
	-->
	<div class="col-sm-12 p-absolute p-10">
		<button type="button" class="btn bgm-lightgreen pull-right"
        onclick="location.href='<?php echo base_url();?>restaurant/login'">Restaurant Login</button>
        </div>
	</div>
	

	<!-- Login -->
    <?php echo form_open('main/login_validation', ['class' => 'lc-block toggled', 'role' => 'form', 'id' => 'l-login']); ?>
	<div class="row text-center p-20">
		<img style="width: 100%; height: 100%;" src="<?= base_url();?>wms/images/icons/company-name.png" alt="">
	</div>
    <div class="input-group m-b-20">
		<span class="input-group-addon"><i class="md md-person"></i></span>
		<div class="fg-line">
    <?php echo form_input(['name' => 'username', 'id' => 'username', 'class' => 'form-control', 'value' => set_value('username'), 'placeholder' => 'Username']); ?>
    </div>
	</div>

	<div class="input-group m-b-20">
		<span class="input-group-addon"><i class="md md-accessibility"></i></span>
		<div class="fg-line">
                <?php echo form_password(['name' => 'password', 'id' => 'password', 'class' => 'form-control', 'value' => set_value('password'), 'placeholder' => 'Password']); ?>
                </div>
	</div>

	<div class="clearfix"></div>

	<div class="checkbox">
		<label> <input type="checkbox" value=""> <i class="input-helper"></i>
			Keep me signed in
		</label>
	</div>

	<button href="" id="login" type="submit" class="btn btn-login btn-danger btn-float">
		<i class="md md-arrow-forward"></i>
	</button>
	
	<div class="m-b-20"></div>
	
	<div class="btn-group btn-group-justified" role="group" aria-label="...">
		  <div class="btn-group" role="group">
          <button type="button" class="btn bgm-teal"
          onclick="location.href='<?php echo base_url();?>main/register_page'">Register</button>
          </div>
                                
          <div class="btn-group" role="group">
          <button type="button" class="btn btn-default"
          onclick="location.href='<?php echo base_url();?>main/forgot_password'">Forgot Password</button>
          </div>
	</div>

	<!--  >
	<ul class="login-navigation">
		<li data-block="#l-register" class="bgm-red">Register</li>
		<li data-block="#l-forget-password" class="bgm-orange">Forgot
			Password?</li>
	</ul>
	<! --> 
            <?php echo form_close(); ?>
        <!-- Register -->
         <?php //$this->load->view('register');  ?>
        
        <!-- Forgot Password -->
         <?php //$this->load->view('forgot-password');  ?>
        
       

	<!-- Unclick Events -->


	<!-- Javascript Libraries -->
	<script src="<?= base_url();?>material/js/jquery-2.1.1.min.js"></script>
	<script src="<?= base_url();?>material/js/bootstrap.min.js"></script>

	<script src="<?= base_url();?>material/vendors/waves/waves.min.js"></script>

	<script src="<?= base_url();?>material/js/functions.js"></script>

</body>
</html>