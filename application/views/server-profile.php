<!-- Header -->
            <?php $this->load->view('header');  ?>
            
            <section id="content">
                <div class="container">
				<div class="row">
					 <div class="alert alert-success" id="server-added" role="alert" style="display: none">A notification request has already been sent to server.</div>
				</div>
                    <div class="block-header">
                        <h2><?= $data_server->name;?><small><?= $data_server->restaurant_name;?></small></h2>
                        
                        
                    </div>
                    
                    <div class="card" id="profile-main">
                        <div class="pm-overview c-overflow">
                            <div class="pmo-pic">
                                <div class="p-relative">
                                    <a href="">
                                        <img class="server-icon" onerror='onImgError(this)' data-name='<?= $data_server->name;?>' src="<?= base_url().$data_server->icon_path;?>" alt=""> 
                                    </a>
                                    
                                    <div class="dropdown pmop-message">
                                        <a data-toggle="dropdown" href="" id="ratebtn"class="btn bgm-white btn-float z-depth-1" onclick="showratingdialog();" <?php 
											if($user_data['type']==="user"){
												echo "";
											}
										
										?>>
                                            <i class="md  md-star" disabled></i>
                                        </a>
                                        
                                        
                                    </div>
                                    
                                    
                                </div>
                                
                                
                                <div class="pmo-stat">
                                    <h2 class="m-0 c-white"><?= $rating['total'];?></h2>
                                    Total Ratings
                                </div>
                            </div>
                            
                            <div class="pmo-block pmo-contact hidden-xs">
                                <div class="text-center lv-header">
                                    <div class="m-t-5">
                                        Average Rating <?php 
										$val = $rating['rating_avg'];
										echo number_format($val, 1);?>
                                    </div>
                                    
                                    <div class="clearfix"></div>
                                    
                                    <div class="rl-star">
                                        <i class="md md-star"></i>
                                        <i class="md md-star"></i>
                                        <i class="md md-star"></i>
                                        <i class="md md-star"></i>
                                        <i class="md md-star"></i>
                                    </div>
                                </div>
                                
                                
                                <ul>
									<!-- Service Ratings -->
                                    <li><i class="md md-star"></i>Service</li>
									<div class="lv-item">
                                            <div class="media">
                                                <div class="media-body">
                                                    <div class="progress">
                                                        <div class="progress-bar bgm-orange" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="<?php
														$service_avg = $rating['service_avg'];
														$percentage = number_format(($service_avg/5) * 100,0);
														echo "width: ".$percentage."%";
														?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
									
									<!-- Personality Ratings -->
                                    <li><i class="md md-star"></i>Personality</li>
									<div class="lv-item">
                                            <div class="media">
                                                <div class="media-body">
                                                    <div class="progress">
                                                        <div class="progress-bar bgm-green" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="<?php
														$personality_avg = $rating['personality_avg'];
														$percentage = number_format(($personality_avg/5) * 100,0);
														echo "width: ".$percentage."%";
														?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
									
									<!-- Aesthetics Ratings -->
                                    <li><i class="md md-star"></i>Aesthetics</li>
									<div class="lv-item">
                                            <div class="media">
                                                <div class="media-body">
                                                    <div class="progress">
                                                        <div class="progress-bar bgm-teal" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="<?php
														$aesthetics_avg = $rating['aesthetics_avg'];
														$percentage = number_format(($aesthetics_avg/5) * 100,0);
														echo "width: ".$percentage."%";
														?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
									
                                    <li><i class="socicon socicon-twitter"></i> not available</li>
                                    <li>
                                        <i class="md md-equalizer"></i>
                                        <address class="m-b-0">
                                            <?= $data_server->about;?>
                                        </address>
                                    </li>
                                </ul>
                            </div>
                            
                         
                        </div>
						
						<!-- Rate Server -->
		<div class="modal fade" id="rate-server" data-backdrop="static"
			data-keyboard="false">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Rate Server</h4>
					</div>
					<div class="modal-body">
						<form class="addEvent" role="form">
							<div class="form-group">
							<p class="c-black f-500 m-b-20 m-t-20">How would you rate the quality of your service offered by your Server.</p>
                            <label class="radio radio-inline m-r-20">
                                <input type="radio" name="serviceOptions" value="1">
                                <i class="input-helper"></i>  
                                1
                            </label>
                            
                            <label class="radio radio-inline m-r-20">
                                <input type="radio" name="serviceOptions" value="2">
                                <i class="input-helper"></i>  
                                2
                            </label>
                            
                            <label class="radio radio-inline m-r-20">
                                <input type="radio" name="serviceOptions" value="3">
                                <i class="input-helper"></i>  
                                3
                            </label>
							
							<label class="radio radio-inline m-r-20">
                                <input type="radio" name="serviceOptions" value="4">
                                <i class="input-helper"></i>  
                                4
                            </label>
							
							<label class="radio radio-inline m-r-20">
                                <input type="radio" name="serviceOptions" value="5">
                                <i class="input-helper"></i>  
                                5
                            </label>
							</div>
						
						<div class="form-group">
							<p class="c-black f-500 m-b-20 m-t-20">How would you rate the personality of your Server.</p>
                            <label class="radio radio-inline m-r-20">
                                <input type="radio" name="personalityOptions" value="1">
                                <i class="input-helper"></i>  
                                1
                            </label>
                            
                            <label class="radio radio-inline m-r-20">
                                <input type="radio" name="personalityOptions" value="2">
                                <i class="input-helper"></i>  
                                2
                            </label>
                            
                            <label class="radio radio-inline m-r-20">
                                <input type="radio" name="personalityOptions" value="3">
                                <i class="input-helper"></i>  
                                3
                            </label>
							
							<label class="radio radio-inline m-r-20">
                                <input type="radio" name="personalityOptions" value="4">
                                <i class="input-helper"></i>  
                                4
                            </label>
							
							<label class="radio radio-inline m-r-20">
                                <input type="radio" name="personalityOptions" value="5">
                                <i class="input-helper"></i>  
                                5
                            </label>
							</div>
							
							<div class="form-group">
							<p class="c-black f-500 m-b-20 m-t-20">How would you rate the aesthetic of your Server.</p>
                            <label class="radio radio-inline m-r-20">
                                <input type="radio" name="aestheticsOptions" value="1">
                                <i class="input-helper"></i>  
                                1
                            </label>
                            
                            <label class="radio radio-inline m-r-20">
                                <input type="radio" name="aestheticsOptions" value="2">
                                <i class="input-helper"></i>  
                                2
                            </label>
                            
                            <label class="radio radio-inline m-r-20">
                                <input type="radio" name="aestheticsOptions" value="3">
                                <i class="input-helper"></i>  
                                3
                            </label>
							
							<label class="radio radio-inline m-r-20">
                                <input type="radio" name="aestheticsOptions" value="4">
                                <i class="input-helper"></i>  
                                4
                            </label>
							
							<label class="radio radio-inline m-r-20">
                                <input type="radio" name="aestheticsOptions" value="5">
                                <i class="input-helper"></i>  
                                5
                            </label>
							</div>
							<div class="form-group">
								<label for="eventName">Comments</label>
								<div class="fg-line">
									<input type="text" class="input-sm form-control" id="comments"
										placeholder="eg: Great service!"/>
								</div>
							</div>
							
						

							<input type="hidden" id="getStart" /> <input type="hidden"
								id="getEnd" />
						</form>
					</div>

					<div class="modal-footer">
						<button type="submit" class="btn btn-link" id="rateServer">Rate</button>
						<button type="button" class="btn btn-link" data-dismiss="modal" >Close</button>
					</div>
				</div>
			</div>
		</div>
                        
                <div class="pm-body clearfix" role="tabpanel">
                            <ul class="tab-nav tn-justified">
                                <li class="active waves-effect"><a href="#about" aria-controls="about" role="tab" data-toggle="tab">Comments</a></li>
								<li class="waves-effect"><a href="#cal" aria-controls="cal" role="tab" data-toggle="tab" >Calendar</a></li>
                            </ul>
                          <div class="pmb-block clearfix photos tab-content">
						  
									<div role="tabpanel" class="tab-pane active" id="about">
										<?php $this->load->view('server-about');  ?>
									</div>
                                    <div role="tabpane2" class="tab-pane " id="cal">
                                        <div id="calendar" ></div>
															
									</div>
									<?php 
									if($exist&&($user_data['type']==="restaurant")){
										echo "<button class='btn btn-float btn-danger' id='remove-server'><i class='md md-clear'></i></button>";
										echo "<button class='btn btn-float btn-success' id='add-server' style='display:none;'><i class='md md-add'></i></button>";
									}elseif($user_data['type']==="restaurant"){
										echo "<button class='btn btn-float btn-success' id='add-server'><i class='md md-add'></i></button>";
										echo "<button class='btn btn-float btn-danger' id='remove-server' style='display:none;'><i class='md md-clear'></i></button>";
									}
									
									?>
									
									
                    </div>
                </div>
            </section>
        </section>
        
       
        
       <?php $this->load->view('footer');?>
        
        <script src="<?= base_url();?>material/vendors/flot/jquery.flot.min.js"></script>
        <script src="<?= base_url();?>material/vendors/flot/jquery.flot.resize.min.js"></script>
        <script src="<?= base_url();?>material/vendors/flot/plugins/curvedLines.js"></script>
        <script src="<?= base_url();?>material/vendors/sparklines/jquery.sparkline.min.js"></script>
        <script src="<?= base_url();?>material/vendors/easypiechart/jquery.easypiechart.min.js"></script>
        
        <script src="<?= base_url();?>material/vendors/fullcalendar/lib/moment.min.js"></script>
        <script src="<?= base_url();?>material/vendors/fullcalendar/fullcalendar.min.js"></script>
        <script src="<?= base_url();?>material/vendors/simpleWeather/jquery.simpleWeather.min.js"></script>
        <script src="<?= base_url();?>material/vendors/auto-size/jquery.autosize.min.js"></script>
        <script src="<?= base_url();?>material/vendors/nicescroll/jquery.nicescroll.min.js"></script>
        <script src="<?= base_url();?>material/vendors/waves/waves.min.js"></script>
        <script src="<?= base_url();?>material/vendors/bootstrap-growl/bootstrap-growl.min.js"></script>
        <script src="<?= base_url();?>material/vendors/sweet-alert/sweet-alert.min.js"></script>
        
        <script src="<?= base_url();?>material/js/flot-charts/curved-line-chart.js"></script>
        <script src="<?= base_url();?>material/js/flot-charts/line-chart.js"></script>
        <script src="<?= base_url();?>material/js/charts.js"></script>
        
        <script src="<?= base_url();?>material/js/charts.js"></script>
        <script src="<?= base_url();?>material/js/functions.js"></script>
        <script src="<?= base_url();?>material/js/demo.js"></script>
		
		<script type="text/javascript"> 
		var current = 1;
		var offset = 0;
		var total = parseInt("<?= $rating['total'];?>");
		
		$(document).ready(function() {
			//Strech image to fit container
			//Strech image of server to fit div container
			var width = $('img.server-icon').css('width');
			$('img.server-icon').css({'height':width});
			$(window).on('resize', function(){
				var width = $('img.server-icon').css('width');
				$('img.server-icon').css({'height':width});
			});
			
			$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
				$('#calendar').fullCalendar('render');
			});
			//Check if server added to notifications
			var user_type = "<?php echo $user_data['type'];?>";
			var server_exist = "<?php echo $exist;?>";
			if(user_type==="restaurant"&&server_exist!=="1"){
				$.ajax({
					url:"<?php echo base_url();?>"+"notifications/request_added",
					type: 'POST',
					ContentType: 'application/json',
					data: {'server_id':"<?php echo $data_server->user_id; ?>",
						'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'},
					success: function(json){
						if(json){
							$('#server-added').show();
							$("#add-server").hide();
						}
					},
					error: function (request, ajaxOptions, thrownError) {
						console.log(request.responseText);
					}				
				});
			}
			
			
			//Hide show load more button
			if(total>10){
				$("#load-ratings").show();
			}
			
			var cId = $('#calendar'); //Change the name if you want. I'm also using thsi add button for more actions
			events = {
				url: "<?= base_url();?>servers/get_events/<?php echo $data_server->user_id; ?>",
				type: 'POST',
				data: {
				'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
				}
			}
			cId.fullCalendar({
                    header: {
                        right: '',
                        center: 'prev, title, next',
                        left: ''
                    },

                    theme: true, //Do not remove this as it ruin the design
                    editable: false,
					eventSources: events
						
                    
					
				});
				//cId.fullCalendar( 'addEventSource', events);         
				//cId.fullCalendar( 'refetchEvents' );
				//Create and ddd Action button with dropdown in Calendar header. 
                var actionMenu = '<ul class="actions actions-alt" id="fc-actions">' +
                                    '<li class="dropdown">' +
                                        '<a href="" data-toggle="dropdown"><i class="md md-more-vert"></i></a>' +
                                        '<ul class="dropdown-menu dropdown-menu-right">' +
                                            '<li class="active">' +
                                                '<a data-view="month" href="">Month View</a>' +
                                            '</li>' +
                                            '<li>' +
                                                '<a data-view="basicWeek" href="">Week View</a>' +
                                            '</li>' +
                                            '<li>' +
                                                '<a data-view="agendaWeek" href="">Agenda Week View</a>' +
                                            '</li>' +
                                            '<li>' +
                                                '<a data-view="basicDay" href="">Day View</a>' +
                                            '</li>' +
                                            '<li>' +
                                                '<a data-view="agendaDay" href="">Agenda Day View</a>' +
                                            '</li>' +
                                        '</ul>' +
                                    '</div>' +
                                '</li>';


                cId.find('.fc-toolbar').append(actionMenu);
			
			//Calendar views
                $('body').on('click', '#fc-actions [data-view]', function(e){
                    e.preventDefault();
                    var dataView = $(this).attr('data-view');
                    
                    $('#fc-actions li').removeClass('active');
                    $(this).parent().addClass('active');
                    cId.fullCalendar('changeView', dataView);  
                });
			
			
			
		
            /*
             * Notifications
             */
            function notify(from, align, icon, type, animIn, animOut){
                $.growl({
                    icon: icon,
                    title: ' Bootstrap Growl ',
                    message: 'Turning standard Bootstrap alerts into awesome notifications',
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
            
            $('.notifications > div > .btn').click(function(e){
                e.preventDefault();
                var nFrom = $(this).attr('data-from');
                var nAlign = $(this).attr('data-align');
                var nIcons = $(this).attr('data-icon');
                var nType = $(this).attr('data-type');
                var nAnimIn = $(this).attr('data-animation-in');
                var nAnimOut = $(this).attr('data-animation-out');
                
                notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut);
            });
                        
		});
        </script>
		
		<script type="text/javascript">
				
			
			/*
             * Notifications
             */
            function notify(from, align, icon, type, animIn, animOut,des){
                $.growl({
                    icon: icon,
                    title: ' Alert ',
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
            
            $('.notifications > div > .btn').click(function(e){
                e.preventDefault();
                var nFrom = $(this).attr('data-from');
                var nAlign = $(this).attr('data-align');
                var nIcons = $(this).attr('data-icon');
                var nType = $(this).attr('data-type');
                var nAnimIn = $(this).attr('data-animation-in');
                var nAnimOut = $(this).attr('data-animation-out');
                
                notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut);
            });
			
			
			function showratingdialog(){
				$('#rate-server').modal('show');
				$('#rate-server form')[0].reset();
				
				//Save button action #saveEvent
						 $('#rateServer').unbind('click').bind('click', function(){
							 var comments = $('#comments').val();
							 var service = document.querySelector('input[name="serviceOptions"]:checked').value;
							 var personality = document.querySelector('input[name="personalityOptions"]:checked').value;
							 var aesthetics = document.querySelector('input[name="aestheticsOptions"]:checked').value;
							 var rating = (service*1+personality*1+aesthetics*1)/3;
							 var server_id = "<?php echo $data_server->user_id;?>";
							 var restaurant_id = "<?php echo $data_server->restaurant_id;?>";
							 
							 if(hasValue(service) && hasValue(personality) && hasValue(aesthetics) && hasValue(aesthetics)){
									$ .ajax ({
								
										url: "<?php echo base_url(); ?>"+"Servers/add_rating" ,
										data: {'restaurant_id':restaurant_id,'server_id':server_id,
										'service':service,'personality':personality,'aesthetics':aesthetics,'comments':comments,
										'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
										},
										type: 'POST' ,
										ContentType: 'application/json',
										success: function (jsonStr) {
										var json = JSON.parse(jsonStr);
										if(json.success!="1"){
											$('#rate-server').modal('hide');
											//alert(json);
											notify("top", "right", "fa fa-comments", "danger", "animated fadeIn", "animated fadeIn", "Failed to rate! ");
										}else{
											$('#rate-server form')[0].reset()
											$('#rate-server').modal('hide');
											++offset;
											//Add comments to list
											id = json.id;
											var div = document.getElementById('commentlist');
											val = moment().format('DD/MM/YYYY')
											divVal = "<div id='"+json.id+"' class='lv-item media'>"
													 + "<div class='media-body'>"
														+"<div class=''><h5>"+comments+"</h5></div>"	
														+ "<ul class='lv-attrs'>"		
														+"<li>Date Created: "+val+"</li>"
														+"<li>User: Me </li>"
														+"<li>Rating: "+rating.toFixed(1)+"</li>"
														+"</ul>"
														+"<div class='lv-actions actions dropdown'>"
														+"<a href='' data-toggle='dropdown' aria-expanded='true'>"
														+"<i class='md md-more-vert'></i>"
														+"</a>"
														+"<ul class='dropdown-menu dropdown-menu-right'>"
														+"<li>"
														+"<a onclick='deleterating("+id+");'>Delete</a>"
														+"</li>"
														+"</ul>"
														+"</div>"
														+"</div>"
														+"</div>";
											
											
											
											div.innerHTML = divVal + div.innerHTML;
											
											notify("top", "right", "fa fa-comments", "success", "animated fadeIn", "animated fadeIn", "Rated! ");				
											
										}
										}
									});
					
							}else{
							$('#rate-server').modal('hide');
							notify("top", "right", "fa fa-comments", "danger", "animated fadeIn", "animated fadeIn", "Rating Feilds Required!");
					
							}
							 
						 });
				
				
				
				return false;
			}
			
			//Check for empty value
			function hasValue(data) {
				if (data !== undefined && data !== null && data !== ""){
					return true;
				}
				return false;
			}
		
            
            /*
             * Dialogs
             */

            //Add Server
            $('#add-server').click(function(){
				
				swal({   
                    title: "Are you sure?",   
                    text: "Do you want to add this server to your list?",   
                    type: "warning",   
                    showCancelButton: true,   
                    confirmButtonColor: "#DD6B55",   
                    confirmButtonText: "Yes, Add it!",   
                    closeOnConfirm: false 
                }, function(){ 
						server_id = "<?php echo $data_server->user_id;?>";
						restaurant_id = "<?php echo $user_data['id'];?>";
						
                    $ .ajax ({
									url: "<?php echo base_url(); ?>"+"Notifications/add_notification" ,
									data: {'user_id':'0','server_id':server_id,'restaurant_id':restaurant_id,
									'type':"server-request",'message':"Restaurant Request",'user':"user",'reference_id':"0",
									'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
									},
									type: 'POST' ,
									ContentType: 'application/json',
									success: function (json) {
										if(json!="1"){
											console.log("Response: "+json+" Restaurant ID: "+restaurant_id);
											swal("Failed!", "Failed to add", "warning");
										}else{
											swal("Sent!", "Notification request has been sent to server", "success"); 
											$('#server-added').show();
											$("#add-server").hide();
										}
									},
									error: function (request, ajaxOptions, thrownError) {
										console.log(request.responseText);
									}	
						});
                });
                
            });

			
			//Remove Server
            $('#remove-server').click(function(){
				
				swal({   
                    title: "Are you sure?",   
                    text: "Do you want to remove this server to your list?",   
                    type: "warning",   
                    showCancelButton: true,   
                    confirmButtonColor: "#DD6B55",   
                    confirmButtonText: "Yes, Delete it!",   
                    closeOnConfirm: false 
                }, function(){ 
						server_id = "<?php echo $data_server->user_id;?>";
						restaurant_id = "<?php echo $data_server->restaurant_id?>";
						restaurant_name = "<?php echo $data_server->restaurant_name?>";
						
                    $ .ajax ({
									url: "<?php echo base_url(); ?>"+"Servers/remove_server" ,
									data: {'server_id':server_id,'restaurant_id':restaurant_id,'restaurant_name':restaurant_name,
									'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
									},
									type: 'POST' ,
									ContentType: 'application/json',
									success: function (json) {
										if(json!="1"){
											//alert(server_id);
											swal("Failed!", "Failed to delete", "warning");
										}else{
											$("#remove-server").hide();
											$("#add-server").show();
											swal("Deleted!", "Server has been deleted", "success"); 		
										}
									}
						});
                });
                
            });

            

			//Delete rating
              function deleterating(id){
                   //alert('test');
				  
					swal({   
                    title: "Are you sure?",   
                    text: "You will not be able to recover this imaginary file!",   
                    type: "warning",   
                    showCancelButton: true,   
                    confirmButtonColor: "#DD6B55",   
                    confirmButtonText: "Yes, delete it!",   
                    closeOnConfirm: false 
					}, function(){  

					$ .ajax ({
									url: "<?php echo base_url(); ?>"+"Servers/remove_rating" ,
									data: {'id':id,
									'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
									},
									type: 'POST' ,
									ContentType: 'application/json',
									success: function (json) {
										if(json==="1"){
											$("#"+id).hide();
											swal("Deleted!", "Your imaginary file has been deleted.", "success"); 
										}else{
											notify("top", "right", "fa fa-comments", "danger", "animated fadeIn", "animated fadeIn", "Failed to rate! ");		
										}
									},
									error: function (request, ajaxOptions, thrownError) {
										console.log(request.responseText);
									}	
						});
					});
                }
				
				//Load more button
				function loadRatings(){
					server_id = "<?php echo $data_server->user_id;?>";
					++current;
					$ .ajax ({
						url: "<?php echo base_url(); ?>"+"Servers/get_ratings" ,
						data: {'server_id':server_id,'current':current,'offset':offset,
							'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
							},
						type: 'POST' ,
						ContentType: 'application/json',
						success: function (json) {
							//console.log(json);
							json = JSON.parse(json);
							var len = json.length;
							divVal = "";
							for (i = 0; i < len; i++) {
								//Add comments to list
								val = json[i].date.split(" ");
								rating = parseFloat(json[i].rating);
								divVal += "<div id='"+json[i].id+"' class='lv-item media'>"
								+ "<div class='media-body'>"
								+"<div class=''><h5>"+json[i].comments+"</h5></div>"	
								+ "<ul class='lv-attrs'>"		
								+"<li>Date Created: "+val[0]+"</li>"
								+"<li>User: Me </li>"
								+"<li>Rating: "+rating.toFixed(1)+"</li>"
								+"</ul>";
								if(json[i].user_id==="<?php echo $user_data['id'];?>"){
									divVal += "<div class='lv-actions actions dropdown'>"
									+"<a href='' data-toggle='dropdown' aria-expanded='true'>"
									+"<i class='md md-more-vert'></i>"
									+"</a>"
									+"<ul class='dropdown-menu dropdown-menu-right'>"
									+"<li>"
									+"<a onclick='deleterating("+json[i].id+");'>Delete</a>"
									+"</li>"
									+"</ul>"
									+"</div>"
								}
								divVal += "</div>"+"</div>";		
							}
							var div = document.getElementById('commentlist');
							div.innerHTML = divVal + div.innerHTML;
							var rating_total = (current-1)*10+len;
							//console.log("Total: "+total+" Rating Total: "+rating_total+"Lenght: "+len);
							if(rating_total>=total){
								$("#load-ratings").hide();
							}
						},
						error: function (request, ajaxOptions, thrownError) {
							console.log(request.responseText);
						}	
					});
					return false;
				}
				
			
        </script>

        
    </body>
  </html>