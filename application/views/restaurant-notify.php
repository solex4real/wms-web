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
<div class="lc-block toggled" id="l-forget-password">
            <p class="text-left"><h4> A few more steps for your Restaurant profile to be complete! Use your username sent to your email to login to your account.</h4></p>
            
            
            
            
           <div class="m-b-20"></div>
            
            <div class="btn-group btn-group-justified" role="group" aria-label="...">
		  <div class="btn-group" role="group">
          <button type="button" class="btn bgm-teal"
          onclick="location.href='<?php echo base_url();?>Restaurant/login'">Login</button>
          </div>
                                
          <div class="btn-group" role="group">
          <button type="button" class="btn btn-default"
          onclick="location.href='<?php echo base_url();?>Restaurant/Register_page'">Register</button>
          </div>
			</div>
</div> 




	<!-- Javascript Libraries -->
	<script src="<?= base_url();?>material/js/jquery-2.1.1.min.js"></script>
	<script src="<?= base_url();?>material/js/bootstrap.min.js"></script>

	<script src="<?= base_url();?>material/vendors/waves/waves.min.js"></script>

	<script src="<?= base_url();?>material/js/functions.js"></script>
	
	<script type="text/javascript">
	$(document).ready(function(){
		document.getElementById("r-register").className = "lc-block";
	});
	
	</script>

</body>
</html>

