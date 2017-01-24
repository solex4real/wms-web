
        
        
        
        
        
        
        
        
        
        
        
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
	<!-- Login -->
        <?php echo form_open('main/recover_login/'.$id."/".$link_id, ['class' => 'lc-block toggled', 'role' => 'form', 'id' => 'l-recover-pasword']); ?>
           <p class="text-left">Enter your new password.</p>
            
            <div class="input-group m-b-20">
                <span class="input-group-addon"><i class="md md-lock"></i></span>
                <div class="fg-line">
                    <?php echo form_password(['name' => 'new-password', 'id' => 'new-password', 'class' => 'form-control', 'value' => set_value(''), 'placeholder' => 'New Password']); ?>
                </div>
            </div>
            
            <a href="" class="btn btn-login btn-danger btn-float"><i class="md md-arrow-forward"></i></a>
            
            <div class="m-b-20"></div>
	
	<div class="btn-group btn-group-justified" role="group" aria-label="...">
		  <div class="btn-group" role="group">
          <button type="button" class="btn bgm-teal"
          onclick="location.href='<?php echo base_url();?>main/register_page'">Register</button>
          </div>
                                
          <div class="btn-group" role="group">
          <button type="button" class="btn btn-default"
          onclick="location.href='<?php echo base_url();?>main/login'">Login</button>
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
        
        <!-- Older IE warning message -->
	<!--[if lt IE 9]>
            <div class="ie-warning">
                <h1 class="c-white">IE SUCKS!</h1>
                <p>You are using an outdated version of Internet Explorer, upgrade to any of the following web browser <br/>in order to access the maximum functionality of this website. </p>
                <ul class="iew-download">
                    <li>
                        <a href="http://www.google.com/chrome/">
                            <img src="img/browsers/chrome.png" alt="">
                            <div>Chrome</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.mozilla.org/en-US/firefox/new/">
                            <img src="img/browsers/firefox.png" alt="">
                            <div>Firefox</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://www.opera.com">
                            <img src="img/browsers/opera.png" alt="">
                            <div>Opera</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.apple.com/safari/">
                            <img src="img/browsers/safari.png" alt="">
                            <div>Safari</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                            <img src="img/browsers/ie.png" alt="">
                            <div>IE (New)</div>
                        </a>
                    </li>
                </ul>
                <p>Upgrade your browser for a Safer and Faster web experience. <br/>Thank you for your patience...</p>
            </div>   
        <![endif]-->

	<!-- Unclick Events -->


	<!-- Javascript Libraries -->
	<script src="<?= base_url();?>material/js/jquery-2.1.1.min.js"></script>
	<script src="<?= base_url();?>material/js/bootstrap.min.js"></script>

	<script src="<?= base_url();?>material/vendors/waves/waves.min.js"></script>

	<script src="<?= base_url();?>material/js/functions.js"></script>

</body>
</html>