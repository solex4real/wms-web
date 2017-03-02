<!-- Header -->
            <?php $this->load->view('header');  ?>
            
            <section id="content">
                <div class="container">
                   
                    
					<div class="card-body card-padding">
                            <div role="tabpanel">
                                <ul class="tab-nav" role="tablist">
                                    <li class="active"><a href="#info11" aria-controls="info11" role="tab" data-toggle="tab">INFO SETTINGS</a></li>
                                    <li><a href="#page11" aria-controls="page11" role="tab" data-toggle="tab">PAGE SETTINGS</a></li>
                                    <li><a href="#page12" aria-controls="page12" role="tab" data-toggle="tab">SERVER SETTINGS</a></li>
                                    
                                </ul>
                              
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="info11">
									<?php $this->load->view('settings-info');  ?>     
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="page11">
										<?php $this->load->view('settings-page');  ?>	
                                    </div>
									<div role="tabpanel" class="tab-pane" id="page12">
										<?php $this->load->view('settings-reservation');  ?>
                                    </div>
                                    
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
		<script src="<?= base_url();?>material/vendors/bootgrid/jquery.bootgrid.min.js"></script>
        
        <script src="<?= base_url();?>material/js/functions.js"></script>
        <script src="<?= base_url();?>material/js/demo.js"></script>
        
		<script type="text/javascript">
			//var server_data = ;
			var server_data = <?php echo json_encode($servers);?>;
            $(document).ready(function() {
				var restaurant_id = "<?php echo $user_id;?>";
				var banner_path = "<?php echo $page_data->banner_path;?>";
				var banner_wide_path = "<?php echo $page_data->banner_wide_path;?>";
				var icon_path = "<?php echo $page_data->icon_path;?>";
				var data_text = "";
				document.getElementById('res-state').value="<?php echo $page_data->state?>";
				document.getElementById('res-start-day').value="<?php echo $page_data->start_day?>";
				document.getElementById('res-end-day').value="<?php echo $page_data->end_day?>";
				
				//Restaurant Reservation Settings
				document.getElementById('server-status').value="<?php 
					if(!empty($servers)){
						echo $servers[0]->status;
					}else{
						echo "0";
					}
				?>";
				//Change Id based on selected option
				$('select[name="server_list"]').change(function() {
					server_id = $(this).find('option:selected').attr('value');
					for (i = 0; i < server_data.length; i++) {
						if(server_data[i].user_id==server_id){
							document.getElementById('server-status').value = server_data[i].status;
							document.getElementById('server-limit').value = server_data[i].server_limit;
							$("#server-status").val(server_data[i].status).prop('selected',true).trigger('change');
						}
					}
				});
				
				$('body').on('click', '#save-res-table', function(){
					var server_id = $("#server_list :selected").val();
					var server_limit = $("#server-limit").val();
					var server_status = $("#server-status").val();
					if(server_id===undefined){
						server_id = "";
					}
					$ .ajax ({
								url: "<?php echo base_url(); ?>"+"Restaurant/update_res_settings" ,
								data: {'server_id':server_id,'server_limit':server_limit,'server_status':server_status,
								'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
								},
								type: 'POST' ,
								ContentType: 'application/json',
								success: function (json) {
								if(json!=true){
									notify("top", "right", "fa fa-comments", "danger", "animated fadeIn", "animated fadeIn", "Failed to save! ");
								}else{
									notify("top","right", "fa fa-comments", "success", "animated fadeIn", "animated fadeIn", "Content Saved Successfully!");
									
									if(!server_id==""){
										for (i = 0; i < server_data.length; i++) {
											if(server_data[i].user_id==server_id){
												server_data[i].status = server_status;
												server_data[i].server_limit = server_limit;
											}
										}
									}
									
								}
								
								}
					});
				});
				var tables = {};
				/*
				//Reservation tables
				var table = $("#data-table-command").bootgrid({
					ajax: true,
					searchable: true,
					css: {
                        icon: 'md icon',
                        iconColumns: 'md-view-module',
                        iconDown: 'md-expand-more',
                        iconRefresh: 'md-refresh',
                        iconUp: 'md-expand-less'
                    },
					responseHandler: function (response) { 
						tables = response['rows'];
					return response; },
					
					post: function ()
					{
					return {
						restaurant_id: "<?php echo $user_data['id'];?>",
						'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
						};
					},
					url: "<?php echo base_url();?>"+"Restaurant/get_tables",
				formatters: {
                        "commands": function(column, row) {
                            return "<button type=\"button\" class=\"btn btn-icon command-edit\" data-row-id=\"" + row.table_id + "\" \"><span class=\"md md-edit\"></span></button> " + 
                                "<button type=\"button\" class=\"btn btn-icon command-delete\" data-row-id=\"" + row.table_id + "\"  \"><span class=\"md md-delete\" ></span></button>";
                        }
                }
				}).on("loaded.rs.jquery.bootgrid", function(e, rows)
				{
			
				table.find(".command-edit").on("click", function(e)
				{
					//Show dialog
					
					updateTable($(this).data("row-id"));
					$('#edit-table').modal('show');
				//alert("You pressed edit on row: " + $(this).data("row-id"));
				}).end().find(".command-delete").on("click", function(e)
				{
					deleteTable($(this).data("row-id"));
				//alert("You pressed delete on row: " + $(this).data("row-id"));
				});
				});
				*/
				
				$('body').on('click', '#add-table', function(){
					$('#edit-table').modal('show');
					$('#edit-table form')[0].reset();
					$('#save-table').unbind('click').bind('click', function(){
					//Get Values 
					//var res_size = $('#tab-res-size').val();
					var res_size = document.getElementById('tab-res-size').value;
					var res_quantity = document.getElementById('tab-res-quantity').value;
					var table_location = document.getElementById('table-location').value;
					var table_des = document.getElementById('table-des').value;
					var cnt = 0;
					var i = Object.keys(tables).length;
					while( i-- ) {
						if( tables[i].size == res_size ){
							cnt++ ;
						} 
						if(i==0){
							break
						}
					}
					if(cnt<1&&!isEmpty(res_size)&&res_size>0&&!isEmpty(res_quantity)&&res_quantity>0){
						$ .ajax ({
						url: "<?php echo base_url(); ?>"+"restaurant/add_table" ,
								data: {'size':res_size,'quantity':res_quantity,'location':table_location,'description':table_des,
								'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
								},
								type: 'POST' ,
								ContentType: 'application/json',
								success: function (json) {
								if(json!=true){
									$('#edit-table').modal('hide');
									notify("top", "right", "fa fa-comments", "danger", "animated fadeIn", "animated fadeIn", "Failed to Update! ");
									console.error(json);
								}else{
									$('#edit-table').modal('hide');
									notify("top", "right", "fa fa-comments", "success", "animated fadeIn", "animated fadeIn", "Updated! ");
									$('#data-table-command').bootgrid('reload');
								}
								},
								error: function (request, status, error) {
									console.error(request.responseText);
								}

						});
					}else{
						document.getElementById('table-input-block').className += " has-error";
						if(cnt>0){
							document.getElementById("table-error-message").innerHTML = "There can't be duplicate table sizes.";
						}else{
							document.getElementById("table-error-message").innerHTML = "Table size and quantity should be a value greater than zero .";
						}
					}
						
					});
				});
				
				//Update Table for Reservations
			function updateTable(rowid){
				var i = Object.keys(tables).length;
				while( i-- ) {
					if( tables[i].table_id == rowid ) break;
				}
				var pos = i;
				//Set Values
				document.getElementById('tab-res-size').value = tables[pos].size; 
				document.getElementById('tab-res-quantity').value = tables[pos].quantity; 
				document.getElementById('table-location').value = tables[pos].location; 
				document.getElementById('table-des').value = tables[pos].description; 
				
				var id = tables[i].id;
				//Save button action #saveTable
				$('#save-table').unbind('click').bind('click', function(){
					//Get Values 
					var res_size = document.getElementById('tab-res-size').value;
					var res_quantity = document.getElementById('tab-res-quantity').value;
					var table_location = document.getElementById('table-location').value;
					var table_des = document.getElementById('table-des').value;
					var cnt = 0;
					var i = Object.keys(tables).length;
					while( i-- ) {
						if( tables[i].size == res_size ){
							cnt++ ;
						} 
						if(i==0){
							break
						}
					}
					if(cnt<2||!isEmpty(res_size)||res_size<=0||!isEmpty(res_quantity)||res_quantity<=0){
						$ .ajax ({
						url: "<?php echo base_url(); ?>"+"restaurant/update_table" ,
								data: {'restaurant_id': "<?php echo $user_data['id'];?>",
								'table_id':rowid,'id':id,'size':res_size,'quantity':res_quantity,'location':table_location,'description':table_des,
								'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
								},
								type: 'POST' ,
								ContentType: 'application/json',
								success: function (json) {
								if(json!=true){
									$('#edit-table').modal('hide');
									notify("top", "right", "fa fa-comments", "danger", "animated fadeIn", "animated fadeIn", "Failed to Update! ");
									console.error(json);
								}else{
									$('#edit-table').modal('hide');
									notify("top", "right", "fa fa-comments", "success", "animated fadeIn", "animated fadeIn", "Updated! ");
									$('#data-table-command').bootgrid('reload');
								}
								},
								error: function (request, status, error) {
									console.error(request.responseText);
								}

						});
					}else{
						document.getElementById('table-input-block').className += " has-error";
						if(cnt>1){
							document.getElementById("table-error-message").innerHTML = "There can't be duplicate table sizes.";
						}else{
							document.getElementById("table-error-message").innerHTML = "Table size and quantity should be a value greater than zero .";
						}
					}
				});
			}
			
			function deleteTable(rowid){
				swal({   
								title: "Are you sure?",   
								text: "You will not be able to recover this reservation!",   
								type: "warning",   
								showCancelButton: true,    
								confirmButtonColor: "#DD6B55",   
								confirmButtonText: "Yes, delete it!",   
								closeOnConfirm: true 
								}, function(){ 
								var i = Object.keys(tables).length;
								while( i-- ) {
									if( tables[i].table_id == rowid ) break;
								}
								var pos = i;
								var id = tables[pos].id;
								$ .ajax ({
									url: "<?php echo base_url(); ?>"+"restaurant/remove_table",
									data: {'id': id,
									'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
									},
									type: 'POST' ,
									ContentType: 'application/json',
									success: function (json) {
									if(json!=true){
										notify("top", "right", "fa fa-comments", "danger", "animated fadeIn", "animated fadeIn", "Failed to Delete! ");
									}else{
										notify("top", "right", "fa fa-comments", "success", "animated fadeIn", "animated fadeIn", "Deleted! ");
										$('#data-table-command').bootgrid('reload');
									}
									}

								});
				});
			}

				//Save
				$('body').on('click', '.hec-save', function(){
				$('.html-editor-click').code();
				$('.html-editor-click').destroy();
				$('.hec-save').hide();
				data_text = $('.html-editor-click').html();
					$ .ajax ({		
								url: "<?php echo base_url(); ?>"+"Restaurant/update_data" ,
								data: {'data_text':data_text,
								'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
								},
								type: 'POST' ,
								ContentType: 'application/json',
								success: function (json) {
								if(json!=true){
									notify("top", "right", "fa fa-comments", "danger", "animated fadeIn", "animated fadeIn", "Failed to save! ");
								}else{
									notify("top","right", "fa fa-comments", "success", "animated fadeIn", "animated fadeIn", "Content Saved Successfully!");
								}
								
							}
							});				
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
								
								url: "<?php echo base_url(); ?>"+"Restaurant/update_password" ,
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
				
				
				
				//Change Restaurant settings
				$('body').on('click', '#change-res', function(){
					res_name = $('#res-name').val();
					res_email = $('#res-email').val();
					res_address = $('#res-address').val();
					res_contact = $('#res-contact').val();
					res_county = $('#res-county').val();
					res_zip = $('#res-zip').val();
					res_url = $('#res-url').val();
					res_state = $("#res-state :selected").val();
					res_des = $('textarea#res-des').val();
					
					//Start and end time
					res_start_day = $("#res-start-day :selected").val();
					res_end_day = $("#res-end-day :selected").val();
					res_start_time = formatTime($('#start-time').val());
					res_end_time = formatTime($('#end-time').val());
					
				if(res_name==""||res_email==""||res_contact==""||res_zip==""||res_state==""){
						notify("top","right", "fa fa-comments", "danger", "animated fadeIn", "animated fadeIn", "All Restaurant fields required!");
					}else{
						$ .ajax ({	
								url: "<?php echo base_url(); ?>"+"Restaurant/update_info" ,
								data: {'name': res_name,
								'email':res_email,'address':res_address,'contact':res_contact,'county':res_county,'zip':res_zip,
								'url':res_url,'state':res_state, 'description':res_des, 'start_day':res_start_day, 'start_time': res_start_time,
								'end_day':res_end_day, 'end_time':res_end_time,
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
				
				
				//Change owner settings
				$('body').on('click', '#change-owner', function(){
					owner_first_name = $('#owner-first-name').val();
					owner_last_name = $('#owner-last-name').val();
					owner_contact = $('#owner-contact').val();
					owner_email = $('#owner-email').val();
					
					if(owner_first_name==""||owner_last_name==""||owner_contact==""||owner_email==""){
						notify("top","right", "fa fa-comments", "danger", "animated fadeIn", "animated fadeIn", "All Owner's fields required!");
					}else{
						$ .ajax ({			
								url: "<?php echo base_url(); ?>"+"Restaurant/update_owner_info" ,
								data: {'name-first': owner_first_name,'name-last': owner_last_name,
								'email':owner_email,'contact':owner_contact,
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
				});
				
				//Remove button thumb 1
				 $("#remove-1").show();
				$('body').on('click', '#remove-1', function(){
					var location = "banner_wide_path";
					var thumb_id = '#thumb1';
					remove_image(banner_wide_path,location,thumb_id);
					//alert('test');
					return true;
				});
				
				//Remove button thumb 2
				 $("#remove-2").show();
				$('body').on('click', '#remove-2', function(){
					var location = "banner_path";
					var thumb_id = '#thumb2';
					remove_image(banner_path,location,thumb_id);
					//alert('test');
					return true;
				});
				
				//Remove button thumb 3
				 $("#remove-3").show();
				$('body').on('click', '#remove-3', function(){
					var location = "icon_path";
					var thumb_id = '#thumb3';
					remove_image(icon_path,location,thumb_id);
					//alert('test');
					return true;
				});
				
				//Display Image on thumbnail 1
				displayImage("<?php echo $page_data->banner_wide_path;?>",'#thumb1');
				$("#thumb1").on("change.bs.fileinput", function(e) {
					e.stopPropagation(); 
					
					$('#thumb1').css("background", "none" );
				});
				
				//Display Image on thumbnail 2
				displayImage("<?php echo $page_data->banner_path;?>",'#thumb2');
				$("#thumb2").on("change.bs.fileinput", function(e) {
					e.stopPropagation(); 
					
					$('#thumb2').css("background", "none" );
				});
				
				//Display Image on thumbnail 3
				displayImage("<?php echo $page_data->icon_path;?>",'#thumb3');
				$("#thumb3").on("change.bs.fileinput", function(e) {
					e.stopPropagation(); 
					
					$('#thumb3').css("background", "none" );
				});
				
				
				//Save image banner wide ( Thumb 1)
					$("form#frm1").submit(function() {
					var formData = new FormData($(this)[0]);
					$.ajax({
						url: "<?php echo base_url(); ?>"+"restaurant/do_upload_banner_wide",
						type: 'POST',
						data: formData,
						async: false,
						success: function(jsonStr) {
								var obj = JSON.parse(jsonStr);
								data = obj;
								
								if(data.success==true){ 
									addImagePath(data.path,"banner_wide_path");	
									banner_wide_path = data.path;
									notify("top","right", "fa fa-comments", "success", "animated fadeIn", "animated fadeIn", "Icon Saved Successfully!");
								}else{
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
					
				//Save image banner ( Thumb 2)
					$("form#frm2").submit(function() {
					var formData = new FormData($(this)[0]);
					$.ajax({
						url: "<?php echo base_url(); ?>"+"restaurant/do_upload_banner",
						type: 'POST',
						data: formData,
						async: false,
						success: function(jsonStr) {
								var obj = JSON.parse(jsonStr);
								data = obj;
								
								if(data.success==true){ 
									addImagePath(data.path,"banner_path");
									banner_path = data.path;
									notify("top","right", "fa fa-comments", "success", "animated fadeIn", "animated fadeIn", "Icon Saved Successfully!");
								}else{
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
					
				

				//Save image icon ( Thumb 3)
					$("form#frm3").submit(function() {
					var formData = new FormData($(this)[0]);
					$.ajax({
						url: "<?php echo base_url(); ?>"+"restaurant/do_upload_icon",
						type: 'POST',
						data: formData,
						async: false,
						success: function(jsonStr) {
								var obj = JSON.parse(jsonStr);
								data = obj;
								
								if(data.success==true){ 
									addImagePath(data.path,"icon_path");
									icon_path = data.path;
									notify("top","right", "fa fa-comments", "success", "animated fadeIn", "animated fadeIn", "Icon Saved Successfully!");
								}else{
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


			function addImagePath(image_path,location){
					$ .ajax ({
								//$restaurant_id,$order_id,$order,$notes,$status
								url: "<?php echo base_url(); ?>"+"restaurant/update_image_path" ,
								data: {'image_path': image_path,'location':location,
								'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
								},
								type: 'POST' ,
								ContentType: 'application/json',
								success: function (jsonStr) {
									var json = JSON.parse(jsonStr);
								if(json.success!=true){
									//alert(json);
									
									notify("top", "right", "fa fa-comments", "danger", "animated fadeIn", "animated fadeIn", "Failed to addd! ");
								}else{
									
										notify("top", "right", "fa fa-comments", "success", "animated fadeIn", "animated fadeIn", "Successfully Added! ");
									//alert(value.order_id);
								
					
								}
								}
					});
				}
  
			//Display Image
			function displayImage(image_path1,thumb){
				if(image_path1 !="" ){
					//background-size: 80px 60px;
					//var width = document.getElementById('thumb').offsetWidth;
					//var height = document.getElementById('thumb').offsetHeight;
					$(thumb).css("background", "url(" + "<?php echo base_url(); ?>"+image_path1 +")" + " no-repeat center "); 
					$(thumb).css("background-size", "contain" );
				}
				
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
			
			//Remove image
			function remove_image(image_path,location,thumb_id){
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
								url: "<?php echo base_url(); ?>"+"restaurant/remove_image_path" ,
								data: {'image_path': image_path,'location':location,
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
										$(thumb_id).css("background", "none" );
										notify("top", "right", "fa fa-comments", "success", "animated fadeIn", "animated fadeIn", "Successfully Removed! ");
										//Update image variable
										switch(location){
											case "banner_wide_path":
												banner_wide_path = "";
												break;
											case "banner_path":
												banner_path = "";
												break;
											case "icon_path":
												icon_path = "";
												break;
										}
								}
								}
								});
									
								}else{
									//Change image background
									displayImage(image_path,thumb_id);
								}
					});
				}
			}
			
			
			//Time Format e.i H:i:s
				function formatTime(time) {
							time = time.split(' ');
							var hour = 0;
							time_val = time[0].split(':');
							switch(time[1]){
								case "AM":
									hour = 0;
									break;
								case "PM":
									hour = 12;
									break;
							}
							
							var hour_val = +time_val[0]; 
							hour = hour + hour_val;
							var str_time = " "+hour+":"+time_val[1]+":00";
							var str = str_time;
							//alert(str);
							return str;
				};
			
			
			function isEmpty(str) {
				return (!str || 0 === str.length);
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