<!-- Header -->
            <?php $this->load->view('header');  ?>
            
            <section id="content">
                <div class="container">
                   
                    
					<div class="card-body card-padding">
					
					<div class="card">
                        <div class="card-header">						
                            <h2>Account Settings</h2>
                        </div>
						
                        <div class="card-body card-padding">
                            <div class="row">
							
                                <div class="col-sm-12">                       
                                    
                                    <form class="row" role="form">
                                <div class="col-sm-3">
                                    <div class="form-group fg-line">
                                        <label class="sr-only" for="old-password">Old Password</label>
                                        <input type="password" class="form-control input-sm" id="old-password" placeholder="Old Password">
                                    </div>
                                </div>
                                
                                <div class="col-sm-3">
                                    <div class="form-group fg-line">
                                        <label class="sr-only" for="new-password">New Password</label>
                                        <input type="password" class="form-control input-sm" id="new-password" placeholder="New Password">
                                    </div>
                                </div>
                                
                                <div class="col-sm-3">
                                    <div class="form-group fg-line">
                                        <label class="sr-only" for="re-password">Password</label>
                                        <input type="password" class="form-control input-sm" id="re-password" placeholder="Re-Password">
                                    </div>
                                </div>
                                
                                <div class="col-sm-3">
                                    <button class="btn btn-primary btn-sm m-t-5" id="change-account" type="button">Change</button>
                                </div>
                            </form>
                                    
                                   
                                    
                                    
									
                                </div>                                   
                            </div>                                                    
                        </div>           
                        <br/>
                    </div>
					
					
					
					<div class="card">
			
                        <div class="card-header">						
                            <h2>Profile Settings </h2>
                        </div>
						
                        <div class="card-body card-padding">
                            <div class="row">
							
							
							
                                <div class="col-sm-12">                       
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="md md-timer-auto"></i></span>
                                        <div class="fg-line">
                                                <input type="text" class="form-control" id="user-name" placeholder="Name" value="<?php echo $page_data->name;?>">
                                        </div>
                                    </div>
                                    
                                    <br/>
                                    
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="md md-local-phone"></i></span>
                                        <div class="fg-line">
                                            <input type="text" class="form-control" id="user-contact" placeholder="Contact Number" value="<?php echo $page_data->phone;?>">
                                        </div>
                                    </div>
                                    
                                    <br/>
                                    
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="md md-email"></i></span>
                                        <div class="fg-line">
                                            <input type="email" class="form-control" id="user-email" placeholder="Email Address" value="<?php echo $page_data->email;?>">
                                        </div>
                                    </div>
									
									<br/>
									
									<div class="input-group">
                                        <span class="input-group-addon"><i class="md md-info"></i></span>
                                        <div class="fg-line">
                                            <input type="text" class="form-control" id="user-about" placeholder="About e.g  I love to watching MMA." value="<?php echo $page_data->about;?>">
                                        </div>
                                    </div>
                                    
                                    <br/>
									
									
									<div class="input-group">
                                        <span class="input-group-addon"><i class="md md-location-on"></i></span>
										
                                        							
										<div class="col-sm-3 m-l-5">
												<select class="selectpicker" id="user-gender" data-placeholder="Gender..." >
													<option value="Male">Male</option>
													<option value="Female">Female</option>
												</select>
										</div>
										<div class="col-sm-3">
												<select class="selectpicker" id="user-type" data-placeholder="User..." >
													<option value="0">User</option>
													<option value="1">Server</option>
												</select>
										</div>
										
										
                                    </div>
									
									
									
									
									
                                    
                                    
                                </div>
									
									<br/>
								<div class="col-sm-9">
           
                                </div>
								<div class="col-sm-9 m-t-20">
                                    <button class="btn btn-primary btn-sm m-t-5" id="change-user">Update</button>
                                </div>
									
									
                                </div> 
								
								
										
                        </div>                                                    
                      </div>           
                        <br/>
                    </div>
					
					
					    <div class="card">
                        <div class="card-header">
                            <h2>Image Preview </h2>
                        </div>
                        
                        <div class="card-body card-padding">
             
                          
							<form name="frm1" id="frm1" action="#" method="post" enctype="multipart/form-data">
                            <div class="fileinput fileinput-new" data-provides="fileinput"> 
                                <div class="fileinput-preview thumbnail" data-trigger="fileinput" id="thumb"></div>
                                <div>
                                    <span class="btn btn-info btn-file">
                                        <span class="fileinput-new">Select image</span>
                                        <span class="fileinput-exists">Change</span>
                                        <?php echo "<input type='file' name='userfile' size='20' />"; ?>
                                    </span>
                                    <a href="#" id="remove-u" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
									<button type="submit" class="btn btn-success fileinput-exists" id="save-banner" >Save</button>
                                </div>
                            </div>
							<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            </form>
							
							
                            <br/>
                            <br/>
                            <p><em>Recommended image size 620x480.</em></p>
                        </div>
                    </div>
					
					
					
                            
					</div>
					
					
                    
                </div>
            </section>
        </section>
        <?php $this->load->view('footer');?>
        
        <script src="<?= base_url();?>material/vendors/moment/moment.min.js"></script>
        <script src="<?= base_url();?>material/vendors/nicescroll/jquery.nicescroll.min.js"></script>
        <script src="<?= base_url();?>material/vendors/auto-size/jquery.autosize.min.js"></script>
        <script src="<?= base_url();?>material/vendors/bootstrap-select/bootstrap-select.min.js"></script>
        <script src="<?= base_url();?>material/vendors/chosen/chosen.jquery.min.js"></script>
        <script src="<?= base_url();?>material/vendors/noUiSlider/jquery.nouislider.all.min.js"></script>
        <script src="<?= base_url();?>material/vendors/input-mask/input-mask.min.js"></script>
        <script src="<?= base_url();?>material/vendors/farbtastic/farbtastic.min.js"></script>
        <script src="<?= base_url();?>material/vendors/summernote/summernote.min.js"></script>
        <script src="<?= base_url();?>material/vendors/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js"></script>
        <script src="<?= base_url();?>material/vendors/fileinput/fileinput.min.js"></script>
        <script src="<?= base_url();?>material/vendors/waves/waves.min.js"></script>
        <script src="<?= base_url();?>material/vendors/bootstrap-growl/bootstrap-growl.min.js"></script>
        <script src="<?= base_url();?>material/vendors/sweet-alert/sweet-alert.min.js"></script>
        
        <script src="<?= base_url();?>material/js/functions.js"></script>
        <script src="<?= base_url();?>material/js/demo.js"></script>
        
		<script type="text/javascript">
            $(document).ready(function() {
				var restaurant_id = "1";//"<?php echo $user_id;?>";
				var data_text = "";
				new_image_path = "";
				user_gender = "<?php echo $page_data->gender;?>";
				user_type = "<?php echo $page_data->server;?>";
				icon_path = "<?php echo $page_data->icon_path;?>";
				var element = document.getElementById('user-gender');
				element.value = user_gender;
				var element = document.getElementById('user-type');
				element.value = user_type;
				
				
				
				displayImage("<?php echo $page_data->icon_path;?>");
				$(".fileinput").on("change.bs.fileinput", function(e) {
					e.stopPropagation(); 
					
					$('#thumb').css("background", "none" );
				});
				
			
				//Change account settings
				$('body').on('click', '#change-account', function(){
					old_password = $('#old-password').val();
					new_password = $('#new-password').val();
					re_password = $('#re-password').val();
					
					if(old_password==""||new_password==""||re_password==""){
						notify("top","right", "fa fa-comments", "danger", "animated fadeIn", "animated fadeIn", "All password fields required");
						}else if(re_password!=new_password){
							notify("top","right", "fa fa-comments", "danger", "animated fadeIn", "animated fadeIn", "Password must match");
						
					}else{
						
						$ .ajax ({
								
								url: "<?php echo base_url(); ?>"+"users/update_password" ,
								data: {'new_password': new_password,
								'old_password':old_password,
								'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
								},
								type: 'POST' ,
								ContentType: 'application/json',
								success: function (json) {
								if(json!=true){
									notify("top", "right", "fa fa-comments", "danger", "animated fadeIn", "animated fadeIn", "Failed to update check password! ");
								}else{
									
									notify("top","right", "fa fa-comments", "success", "animated fadeIn", "animated fadeIn", "Password successfully updated!");
								}
								
							}
							});
						
					}
				
				});
				
				
				
				//Change user settings
				$('body').on('click', '#change-user', function(){
					user_name = $('#user-name').val();
					user_email = $('#user-email').val();
					user_contact = $('#user-contact').val();
					user_about = $('#user-about').val();
					user_gender = $("#user-gender :selected").val();
					user_type = $("#user-type :selected").val();
				if(user_name==""||user_email==""||user_email==""){
						notify("top","right", "fa fa-comments", "danger", "animated fadeIn", "animated fadeIn", "Name and email required!");
					}else{
						
						$ .ajax ({
								
								url: "<?php echo base_url(); ?>"+"users/update_info" ,
								data: {'name': user_name,
								'email':user_email,'contact':user_contact,'about':user_about,'gender':user_gender,'server':user_type,
								'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
								},
								type: 'POST' ,
								ContentType: 'application/json',
								success: function (json) {
								if(json!=true){
									notify("top", "right", "fa fa-comments", "danger", "animated fadeIn", "animated fadeIn", "Failed to update! ");
								}else{
									
									notify("top","right", "fa fa-comments", "success", "animated fadeIn", "animated fadeIn", "Successfully updated!");
								}
								
							}
							});
						
						
					}
					//notify("top","right", "fa fa-comments", "success", "animated fadeIn", "animated fadeIn", "Content Saved Successfully!");
					
				
				
				});
				
				
			
				
				//Save image
					$("form#frm1").submit(function() {
					var formData = new FormData($(this)[0]);
					$.ajax({
						url: "<?php echo base_url(); ?>"+"users/do_upload",
						type: 'POST',
						data: formData,
						async: false,
						success: function(jsonStr) {
								var obj = JSON.parse(jsonStr);
								data = obj;
								
								if(data.success==true){ 
									addImagePath(data.path);	
									icon_path = data.path;								
									notify("top","right", "fa fa-comments", "success", "animated fadeIn", "animated fadeIn", "Icon Saved Successfully!");
								}else{
									//alert(data);
									$('#add-product').modal('hide');
									notify("top","right", "fa fa-comments", "danger", "animated fadeIn", "animated fadeIn", "Failed to save!");
								};
								
								
						},
						error: function(data){
						 console.log("error");
						 console.log(data);
						 alert("Error :"+data);
						 },
						 cache: false,
						 contentType: false,
						 processData: false
					});
					return false;
				});	

					
				//Remove button thumb 
				 $("#remove-u").show();
				$('body').on('click', '#remove-u', function(){
					remove_image(icon_path);
					//alert('test');
					return true;
				});
					
			//Remove image
			function remove_image(image_path){
				if(!isEmpty(image_path)){
					
					swal({   
								title: "Are you sure?",   
								text: "You will not be able to recover this image!",   
								type: "warning",   
								showCancelButton: true,   
								confirmButtonColor: "#DD6B55",   
								confirmButtonText: "Yes, delete it!",   
								closeOnConfirm: true 
								}, function(isConfirm){
									if(isConfirm){
										$ .ajax ({
										url: "<?php echo base_url(); ?>"+"users/remove_image_path" ,
										data: {'image_path': image_path,
										'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
										},
										type: 'POST' ,
										ContentType: 'application/json',
										success: function (jsonStr) {
										//var json = JSON.parse(jsonStr);
										if(jsonStr!=true){
											//alert(json);
											notify("top", "right", "fa fa-comments", "danger", "animated fadeIn", "animated fadeIn", "Failed to Remove! ");
											//return false;
										}else{
									
											notify("top", "right", "fa fa-comments", "success", "animated fadeIn", "animated fadeIn", "Successfully Remove! ");
											$('#thumb').css("background", "none" );
											icon_path = "";
											//alert(value.order_id);
											//return true;
					
										}		
										}		
										});
									}else{
										//Change image background
										displayImage(icon_path);
									}
								
						});
				}
			}		
				




			function addImagePath(image_path){
				
					$ .ajax ({
								//$restaurant_id,$order_id,$order,$notes,$status
								url: "<?php echo base_url(); ?>"+"users/update_image_path" ,
								data: {'image_path': image_path,
								'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
								},
								type: 'POST' ,
								ContentType: 'application/json',
								success: function (jsonStr) {
									var json = JSON.parse(jsonStr);
								if(json.success!=true){
									//alert(json);
									icon_path = json.icon_path;
									notify("top", "right", "fa fa-comments", "danger", "animated fadeIn", "animated fadeIn", "Failed to addd! ");
								}else{
									
										notify("top", "right", "fa fa-comments", "success", "animated fadeIn", "animated fadeIn", "Successfully Added! ");
									//alert(value.order_id);
								
					
								}
								}
					});
				}
  
			//Display Image
			function displayImage(image_path1){
				if(image_path1 !="" ){
					//background-size: 80px 60px;
					var width = document.getElementById('thumb').offsetWidth;
					var height = document.getElementById('thumb').offsetHeight;
					$('#thumb').css("background", "url(" + "<?php echo base_url(); ?>"+image_path1 +")" + " no-repeat center "); 
					$('#thumb').css("background-size", "contain" );
				}
				
			}
				
			function isEmpty(str) {
				return (!str || 0 === str.length);
			}	
				
  
  
			//Change Image src
			function chageIcon(domImg,srcImage)
			{
				var img = new Image();
				img.onload = function()
				{
					// Load completed
					domImg.src = this.src;
				};
				img.src = srcImage;
			}
			
			//Notify function
				function notify(from, align, icon, type, animIn, animOut,des){
                $.growl({
                    icon: icon,
                    title: '',
                    message: des,
                    url: ''
                },{
                        element: 'body',
                        type: type,
                        allow_dismiss: true,
                        placement: {
                                from: from,
                                align: align
                        },
                        offset: {
                            x: 20,
                            y: 85
                        },
                        spacing: 10,
                        z_index: 1031,
                        delay: 2500,
                        timer: 1000,
                        url_target: '_blank',
                        mouse_over: false,
                        animate: {
                                enter: animIn,
                                exit: animOut
                        },
                        icon_type: 'class',
                        template: '<div data-growl="container" class="alert" role="alert">' +
                                        '<button type="button" class="close" data-growl="dismiss">' +
                                            '<span aria-hidden="true">&times;</span>' +
                                            '<span class="sr-only">Close</span>' +
                                        '</button>' +
                                        '<span data-growl="icon"></span>' +
                                        '<span data-growl="title"></span>' +
                                        '<span data-growl="message"></span>' +
                                        '<a href="#" data-growl="url"></a>' +
                                    '</div>'
                });
            };
  
				});
        </script>
		
		
    </body>
  </html>