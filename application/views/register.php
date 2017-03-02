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


<?php echo form_open('main/register', ['class' => 'lc-block toggled', 'role' => 'form', 'id' => 'l-register','name' => 'l-register']); ?>

			
			
			<div class="input-group m-b-20">
                <span class="input-group-addon"><i class="md md-person"></i></span>
                <div class="fg-line">
                    <?php echo form_input(['name' => 'name', 'id' => 'name', 
                    		'class' => 'form-control', 'value' => set_value('name'), 
                    		'placeholder' => 'Name']); ?>
                </div>
            </div>
			
            <div class="input-group m-b-20" id="username-div">
            <label id="message"></label>
                <span class="input-group-addon"><i class="md md-person"></i></span>
                <div class="fg-line">
                    <?php echo form_input(['name' => 'username_r', 'id' => 'username_r', 
                    		'class' => 'form-control', 'value' => set_value('username'), 
                    		'placeholder' => 'username']); ?>
                </div>
            </div>
            
            <div class="input-group m-b-20" id="email-div">
                <span class="input-group-addon"><i class="md md-mail"></i></span>
                <div class="fg-line">
                   <?php echo form_input(['name' => 'email', 'id' => 'email',  
                    		'class' => 'form-control', 'value' => set_value('Email'), 
                    		'placeholder' => 'Email Address']); ?>
                </div>
            </div>
            
            <div class="input-group m-b-20">
                <span class="input-group-addon"><i class="md md-local-phone"></i></span>
                <div class="fg-line">
                    <?php echo form_input(['name' => 'phone', 'id' => 'phone',
                    		'class' => 'form-control', 'value' => set_value('Phone'), 
                    		'placeholder' => 'Contact Number']); ?>
                </div>
            </div>
            
            <div class="input-group m-b-20">
                <span class="input-group-addon"><i class="md md-accessibility"></i></span>
                <div class="fg-line">
                
                    <?php echo form_password(['name' => 'password_r', 'id' => 'password_r', 
                    		'class' => 'form-control', 'value' => set_value('password'), 
                    		'placeholder' => 'Password']); ?>
                </div>
            </div>
            
            <div class="input-group m-b-20">
                <span class="input-group-addon"><i class="md md-accessibility"></i></span>
                <div class="fg-line">
                    <?php echo form_password(['name' => 'password_r_2', 'id' => 'password_r_2', 
                    		'class' => 'form-control', 'value' => set_value('password'), 
                    		'placeholder' => 'Password']); ?>
                </div>
            </div>
            
            <div class="clearfix"></div>
            
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="">
                    <i class="input-helper"></i>
                    Accept the license agreement
                </label>
            </div>
            
            <button href="" type="submit" class="btn btn-login btn-danger btn-float" id="register"><i class="md md-arrow-forward"></i></button>
            
            <div class="m-b-20"></div>
            
            <div class="btn-group btn-group-justified" role="group" aria-label="...">
		  <div class="btn-group" role="group">
          <button type="button" class="btn bgm-teal"
          onclick="location.href='<?php echo base_url();?>main/login'">Login</button>
          </div>
                                
          <div class="btn-group" role="group">
          <button type="button" class="btn btn-default"
          onclick="location.href='<?php echo base_url();?>main/forgot_password'">Forgot Password</button>
          </div>
			</div>
            
            <!-- >
            <ul class="login-navigation">
                <li data-block="#l-login" class="bgm-green">Login</li>
                <li data-block="#l-forget-password" class="bgm-orange">Forgot Password?</li>
            </ul>
            <! -->
        <?php echo form_close(); ?>
        
	<!-- Javascript Libraries -->
	<script src="<?= base_url();?>material/js/jquery-2.1.1.min.js"></script>
	<script src="<?= base_url();?>material/js/bootstrap.min.js"></script>
	<script src="<?= base_url();?>material/vendors/waves/waves.min.js"></script>
	<script src="<?= base_url();?>material/js/functions.js"></script>
	
	<script type="text/javascript">
	//Check if email or username exist
	$(document).ready(function(){
		$('#email').keyup(function(){
			var email = $('#email').val();
			if(email.length>2){
				//console.log(email);
				$.ajax({
					url: "<?php echo base_url();?>"+"main/email_exist",
					data:{'email':email,
						'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'},
					type: 'POST',
					success: function(json){
						if(json){
							//console.log(json);
							document.getElementById('email-div').className += " has-error";
						}else{
							document.getElementById('email-div').className = " input-group m-b-20";
						}
					},
					error: function (request, status, error) {
						console.error(request.responseText);
					}
				});
			}
		});
		$('#username_r').keyup(function(){
			var username = $('#username_r').val();
			regex = /([^A-Za-z0-9_]+)/g;
			if(username.length>2){
				//console.log(email);
				$.ajax({
					url: "<?php echo base_url();?>"+"main/username_exist",
					data:{'username_r':username,
						'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'},
					type: 'POST',
					success: function(json){
						//console.log(regex.test(username));
						if(json){
							//console.log(json);
							document.getElementById('username-div').className += " has-error";
						}else if(regex.test(username)){
							document.getElementById('username-div').className += " has-error";
						}else{
							document.getElementById('username-div').className = " input-group m-b-20";
						}
					},
					error: function (request, status, error) {
						console.error(request.responseText);
					}
				});
			}
		});
		$('#register').click(function(){
			var username = $('#username_r').val();
			regex = /([^A-Za-z0-9_]+)/g;
			if(regex.test(username)){
				return false
			}
			return true;
		}
		);
	});
	
	</script>

</body>
</html>
        
          