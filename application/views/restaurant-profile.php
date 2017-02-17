<!-- Header -->
<?php 
if($user_data['is_logged_in']){
	$this->load->view('header');
}else{
	$this->load->view('header-public');
}
?>
            <section id="content">
                <div class="container">
				<div class="row">
					 <div class="alert alert-danger" id="reservation-alert" role="alert" style="display: none">No tables available for your reservation. Please try another date.</div>
				</div>
                    <div class="block-header">
                        <h2><?php echo $data_restaurant->name;?><small></small></h2>
                        
                        
                    </div>
                    
                    <div class="card" id="profile-main">
                        <div class="pm-overview c-overflow">
                            <div class="pmo-pic">
                                <div class="p-relative">
                                    <a href="">
										
                                        <img id="thumb1"src="<?php
										//base_url().$data_restaurant->banner_path;
										$banner_path = $data_restaurant->banner_path;
										if(empty($banner_path)){
											$banner_path = "wms/images/icons/meal-2.png";
										}
										echo base_url().$banner_path;
										?>" alt=""> 
                                    </a>
                                    
                                    <div class="dropdown pmop-message">
                                        <a data-toggle="dropdown" href="" class="btn bgm-white btn-float z-depth-1">
                                            <i class="md md-message"></i>
                                        </a>
                                        
                                        <div class="dropdown-menu">
                                            <textarea placeholder="Write something..." id="res-message"></textarea>
                                            
                                            <button class="btn bgm-green btn-icon" onclick="send_feedback()"><i class="md md-send"></i></button>
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                                
                                
                                <div class="pmo-stat">
                                    <h2 class="m-0 c-white">Feedback</h2>
                                    Let us a know what you think!.
                                </div>
                            </div>
                            
                            <div class="pmo-block pmo-contact hidden-xs">
                                <h2>Contact</h2>
                                
                                <ul>
                                    <li><i class="md md-phone"></i> <?php echo $data_restaurant->contact;?></li>
                                    <li><i class="md md-email"></i> <?php echo $data_restaurant->email;?></li>
                                    <li><i class="md md-room"></i> <?php echo $data_restaurant->address.", ".
									$data_restaurant->county.", ".$data_restaurant->state.". ".$data_restaurant->zip.".";?></li>
                                    <li><i class="md md-schedule"></i> <?php
										echo $data_restaurant->start_day." - ".$data_restaurant->end_day;
										echo "<br/>";
										echo date('h:i A', strtotime($data_restaurant->start_time))." - ".date('h:i A', strtotime($data_restaurant->end_time));
										
									?></li>
									<li><i class="md md-language"></i> <?php 
										if(!empty($data_restaurant->url)||$data_restaurant->url==""){
											echo "not available";
										}else{
											echo $data_restaurant->url;
										}
									?></li>
                                    <li>
                                        <i class="md md-equalizer"></i>
                                        <address class="m-b-0">
                                            <?php echo $data_restaurant->description;?>
                                        </address>
                                    </li>
                                </ul>
                            </div>
                            
                         
                        </div>
						
					<!-- Confirm Reservation -->
		<div class="modal fade" id="confirm-reservation" data-backdrop="static"
			data-keyboard="false">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Confirm Reservation</h4>
					</div>
					<div class="modal-body">
						
						<form class="addEvent" role="form">
							<div class="form-group">
								 <h5>Restaurant</h5>
								 <p id="Res_Name_1"></P>
								
								<h5>Server</h5>
								 <p id="Server_Name_1"></P>
								
								<h5>Date</h5>
								 <p id="date_res"></P>
								
								<h5>Time</h5>
								 <p id="time_res_1"></P>
							
								<h5>Notes</h5>
								<div class="fg-line">
									<input type="text" class="input-sm form-control" id="res_notes"
										placeholder="I prefer a table outside..."/>
								</div>
							</div>


							<input type="hidden" id="getStart" /> <input type="hidden"
								id="getEnd" />
						</form>
					</div>

					<div class="modal-footer">
						<button type="submit" onclick="confirm_btn()" class="btn btn-link" id="confirm_reservation">Confirm</button>
						<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
                        
                    <div class="pm-body clearfix" role="tabpanel">
                            <ul class="tab-nav tn-justified">
                                <li class="active waves-effect"><a href="#reservation" aria-controls="reservation" role="tab" data-toggle="tab">RESERVATION</a></li>
								<li class="waves-effect"><a href="#servers" aria-controls="servers" role="tab" data-toggle="tab" >SERVERS</a></li>
                            </ul>
                          <div class="pmb-block clearfix photos tab-content">
						  
									<div role="tabpanel" class="tab-pane active" id="reservation">
									<div class="row">
										<div class="col-sm-3 m-b-25">
											<select id="group-size" class="selectpicker" data-live-search="true">
												<option value="1">1 Person</option>
												<option value="2">2 People</option>
												<option value="3">3 People</option>
												<option value="4">4 People</option>
												<option value="5">5 People</option>
												<option value="6">6 People</option>
												<option value="7">7 People</option>
											</select>
										</div>
								<div class="col-sm-3">
                                    <div class="input-group form-group">
                                        <span class="input-group-addon"><i class="md md-event"></i></span>
                                            <div class="dtp-container dropdown fg-line">
                                            <input type='text' id="date" class="form-control date-picker" value="<?php echo date("d/m/Y");?>" data-toggle="dropdown" placeholder="Select Date">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-sm-3">
                                    <div class="input-group form-group">
                                        <span class="input-group-addon"><i class="md md-access-time"></i></span>
                                            <div class="dtp-container dropdown fg-line">
                                            <input type='text' id="time" class="form-control time-picker" value="<?php echo date("h:i A");?>" data-toggle="dropdown" placeholder="Select Time">
                                        </div>
                                    </div>
                                </div>
								<button type="submit" class="btn btn-default" id="searchRes"><i class="md md-search"></i> Search</button>			
									</div>
								<div class="row">
								
								<p class="c-black f-500 m-b-5">Available Servers</p>
								
								
								<div id="available-servers"class="contacts clearfix row">
								<?php
								foreach ( $data as $row ) {
									echo "<div class='col-md-2 col-sm-4 col-xs-6'>";
									echo "<div class='c-item'>";
									echo "<a href='' class='ci-avatar'>";
									echo "<img src=".base_url().$row->icon_path." alt="."".">";
									echo "</a>";
									echo "<div class='c-info'>";
									echo "<strong>".$row->name."</strong>";
									echo "<strong>"."Rating: ".number_format($row->rating_avg , 1)."</strong>";
									echo "</div>";
									echo "<div class='c-footer'>";
									echo "<button class='waves-effect' onclick='reserve(".$row->user_id.",\"".$row->name."\",\"".$row->icon_path."\")'>
									<a class='zmdi zmdi-person-add' href=''>
									</a> Reserve</button>";
						
									echo "</div>";
									echo "</div>";
									echo "</div>";
								}
								?>
								</div>

								</div>
										
									</div>
                                    <div role="tabpane2" class="tab-pane" id="servers">
										
							<div class="contacts clearfix row">
							<?php
								foreach ( $servers as $row ) {
									echo "<div class='col-md-2 col-sm-4 col-xs-6'>";
									echo "<div class='c-item'>";
									echo "<a href='' class='ci-avatar'>";
									echo "<img src=".base_url().$row->icon_path." alt="."".">";
									echo "</a>";
									echo "<div class='c-info'>";
									echo "<strong>".$row->name."</strong>";
									echo "<strong>"."Rating: ".number_format($row->rating_avg , 1)."</strong>";
									echo "</div>";
									echo "<div class='c-footer'>";
									echo "<button class='waves-effect' onclick=location.href='".base_url()."servers/openprofile/".$row->username."' >
									<a class='zmdi zmdi-person-add' >
									</a> Select</button>";
						
									echo "</div>";
									echo "</div>";
									echo "</div>";
								}
							?>
							
						
                
                            </div>

                
                           
									</div>			
									</div>
						
									
									
                    </div>
                </div>
            </section>
        </section>
        
<!-- Footer -->
<?php 
if($user_data['is_logged_in']){
	$this->load->view('footer');
}else{
	$this->load->view('footer-public');
}
?>
        
        <script src="<?= base_url();?>material/vendors/flot/jquery.flot.min.js"></script>
        <script src="<?= base_url();?>material/vendors/flot/jquery.flot.resize.min.js"></script>
        <script src="<?= base_url();?>material/vendors/flot/plugins/curvedLines.js"></script>
        <script src="<?= base_url();?>material/vendors/sparklines/jquery.sparkline.min.js"></script>
		
		<script src="<?= base_url();?>material/vendors/moment/moment.min.js"></script>
        <script src="<?= base_url();?>material/vendors/bootstrap-select/bootstrap-select.min.js"></script>
        <script src="<?= base_url();?>material/vendors/chosen/chosen.jquery.min.js"></script>
        <script src="<?= base_url();?>material/vendors/noUiSlider/jquery.nouislider.all.min.js"></script>
        <script src="<?= base_url();?>material/vendors/input-mask/input-mask.min.js"></script>
        <script src="<?= base_url();?>material/vendors/farbtastic/farbtastic.min.js"></script>
        <script src="<?= base_url();?>material/vendors/summernote/summernote.min.js"></script>
        <script src="<?= base_url();?>material/vendors/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js"></script>
        <script src="<?= base_url();?>material/vendors/fileinput/fileinput.min.js"></script>
        
        
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
		
		$(document).ready(function() {
			$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
				
			});
						//Search button action 
						$('#searchRes').unbind('click').bind('click', function(){
							tableAvailable();
							//Get Values
							var restaurant_id = "<?php echo $data_restaurant->id;?>";
							var group_size = $('#group-size :selected').val();
							var date = $('#date').val();
							var time = $('#time').val();
							var dateTime = formatDate(date,time);
							
							$ .ajax ({
								url: "<?php echo base_url(); ?>"+"Restaurant/get_available_servers" ,
								data: {'restaurant_id': restaurant_id,
								'dateTime':dateTime,'group_size':group_size,
								'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
								},
								type: 'POST' ,
								ContentType: 'application/json',
								success: function (json) {
								if(json===null){
									//alert(json);
									
									notify("top", "right", "fa fa-comments", "danger", "animated fadeIn", "animated fadeIn", "Failed");
								}else{
									//Update List of Available Servers
									
									//Parse Json data
									json = JSON.parse(json);
									var len = json.length;
									
									var data = "";
									for (i = 0; i < len; i++) {
										var rating = json[i].rating_avg;
										if(rating==null){
											rating = 0;
										}else{
											rating = parseFloat(json[i].rating_avg);
										}
										data += 
										"<div class='col-md-2 col-sm-4 col-xs-6'>"+
										"<div class='c-item'>"+
										"<a href='' class='ci-avatar'>"+
										"<img src="+"<?php echo base_url(); ?>"+json[i].icon_path+">"+
										"</a>"+
										"<div class='c-info'>"+
										"<strong>"+json[i].name+"</strong>"+
										"<strong>"+"Rating: "+rating.toFixed(1)+"</strong>"+
										"</div>"+
										"<div class='c-footer'>"+
										"<button class='waves-effect' onclick='reserve("+json[i].user_id+",\""+json[i].name+"\",\""+json[i].icon_path+"\")'>"+
										"<a class='zmdi zmdi-person-add' href=''>"+
										"</a> Reserve</button>"+
										"</div>"+
										"</div>"+
										"</div>";
									}
									var myDiv = document.getElementById("available-servers");
									myDiv.innerHTML = data;
									//$('available-servers').html(data);
									
								}
								
							}
							});
							
							 
							return false;
						});
						
						
  
		});
		
		
		
		
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
				var server_id = "";
				var server_name = "";
				function reserve(ser_id,ser_name,server_icon){
					var isLoggedIn = ("<?= $user_data['is_logged_in']?>"==true);
					if(tableAvailable&&serverAvailable(ser_id)&&isLoggedIn){
						//Get Values
						server_id = ser_id;
						server_name = ser_name;
						var restaurant_id = "<?php echo $data_restaurant->id;?>";
						var restaurant_name = "<?php echo $data_restaurant->name;?>";
						var group_size = $('#group-size :selected').val();
						var date = $('#date').val();
						var time = $('#time').val();
						//var dateTime = formatDate(date,time);
						//Change data in html
						document.getElementById("Res_Name_1").innerHTML = restaurant_name;
						document.getElementById("Server_Name_1").innerHTML = server_name;
						document.getElementById("date_res").innerHTML = date;
						document.getElementById("time_res_1").innerHTML = time;
						$('#confirm-reservation').modal('show');
					}else{
						if(!tableAvailable){
							swal("No Tables Available","Please try other reservation dates for available table spaces.");
						}else if(!isLoggedIn){
							a = "<?php
								$this->session->set_userdata('link',"restaurant/profile/".$data_restaurant->restaurant_username); 
							?>";
							window.location.replace("<?= base_url()?>"+"main/login");
						}else{
							swal("Server No Longer Available","Please try other reservation dates for available servers.");
						}
						
					}		   
				};
				
				function confirm_btn(){
							//Get Values
							var restaurant_id = "<?php echo $data_restaurant->id;?>";
							var restaurant_name = "<?php echo $data_restaurant->name;?>";
							var user_id = "<?php echo $user_id;?>";
							var group_size = $('#group-size :selected').val();
							var date = $('#date').val();
							var time = $('#time').val();
							var dateTime = formatDate(date,time);
							var notes = $('#res_notes').val();
							$ .ajax ({
								url: "<?php echo base_url(); ?>"+"Reservations/add_reservation" ,
								data: {'restaurant_id': restaurant_id, 'server_id': server_id, 'user_id': user_id,
								'notes': notes, 'dateTime':dateTime,'group_size':group_size,
								'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
								},
								type: 'POST' ,
								ContentType: 'application/json',
								success: function (json) {
									//Parse Json data
									json = JSON.parse(json);
								if(json.success){
									$('#confirm-reservation').modal('hide');
									//Success Message
									swal("Reserved!", "Check your email for detials of reservation", "success");
									send_confirmation_email(json.reservation_id);
								}else{
									$('#confirm-reservation').modal('hide');
									alert(json);
									notify("top", "right", "fa fa-comments", "danger", "animated fadeIn", "animated fadeIn", "Failed");
								}
								
								}
							});
				}
				
				function send_confirmation_email(reservation_id){
					restaurant_name = "<?php echo $data_restaurant->name;?>";
					var group_size = $('#group-size :selected').val();
					var date = $('#date').val();
					var time = $('#time').val();
					var dateTime = formatDate(date,time);
					var notes = $('#res_notes').val();
					var user_name = "<?php echo $name;?>";
					var user_email = "<?php echo $email;?>";
					
					
					$ .ajax ({
								url: "<?php echo base_url(); ?>"+"Reservations/reservation_send" ,
								data: {'reservation_id': reservation_id,'restaurant_name': restaurant_name, 'server_name': server_name, 'user_name': user_name,
								'notes': notes, 'dateTime':dateTime,'group_size':group_size, 'user_email': user_email,
								'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
								},
								type: 'POST' ,
								ContentType: 'application/json',
								success: function (json) {
									if(json){
										//notify("top", "right", "fa fa-comments", "success", "animated fadeIn", "animated fadeIn", "Sent to email");
									}else{
											notify("top", "right", "fa fa-comments", "danger", "animated fadeIn", "animated fadeIn", "Failed to send to email");
									}
								}
					});
					
				}
				
				function send_feedback(){
					var restaurant_email = "<?php echo $data_restaurant->email;?>";
					var user_name = "<?php echo $name;?>";
					var user_email = "<?php echo $email;?>";
					var message =  $('#res-message').val();
					
					$ .ajax ({
								url: "<?php echo base_url(); ?>"+"Restaurant/feedback_send" ,
								data: {'restaurant_email': restaurant_email, 'user_name': user_name,
								'message': message, 'user_email': user_email,
								'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
								},
								type: 'POST' ,
								ContentType: 'application/json',
								success: function (json) {
									if(json){
										notify("top", "right", "fa fa-comments", "success", "animated fadeIn", "animated fadeIn", "Feedback Sent!");
									}else{
											notify("top", "right", "fa fa-comments", "danger", "animated fadeIn", "animated fadeIn", "Failed to send to feedback");
									}
								}
					});
				}
				
				function tableAvailable(){
							//Get Values
							var restaurant_id = "<?php echo $data_restaurant->id;?>";
							var group_size = $('#group-size :selected').val();
							var date = $('#date').val();
							var time = $('#time').val();
							var dateTime = formatDate(date,time);
							var isAvailable = false;
							$ .ajax ({
								async: false,
								url: "<?php echo base_url(); ?>"+"Reservations/get_available_tables" ,
								data: {'restaurant_id': restaurant_id,
								'dateTime':dateTime,'group_size':group_size,
								'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
								},
								type: 'POST',
								ContentType: 'application/json',
								success: function (json) {
									if(json!==null){
										json = JSON.parse(json);
										if(json.sum<group_size){
											$('#reservation-alert').show();
											isAvailable  = false;
											return false;
										}else{
											$('#reservation-alert').hide();
											isAvailable = true;
											return true;
										}
									}
								}
							});
							return isAvailable;
							//return "tr";
				}
				
				function serverAvailable(server_id){
							//Get Values
							var restaurant_id = "<?php echo $data_restaurant->id;?>";
							var group_size = $('#group-size :selected').val();
							var date = $('#date').val();
							var time = $('#time').val();
							var dateTime = formatDate(date,time);
							var isAvailable = false;
							$ .ajax ({
								async: false,
								url: "<?php echo base_url(); ?>"+"Reservations/server_isAvailable" ,
								data: {'restaurant_id': restaurant_id,'server_id':server_id,
								'dateTime':dateTime,'group_size':group_size,
								'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
								},
								type: 'POST',
								ContentType: 'application/json',
								success: function (json) {
									if(json==="1"){
										isAvailable = true;		
									}else{
										isAvailable = false;
									}
								}
							});
							return isAvailable;
				}
				
				//Date Time Format
				function formatDate(date,time) {
							date = date.split('/');
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
							
							var str_date = date[2].concat("-",date[1],"-",date[0]);
							var hour_val = +time_val[0]; 
							hour = hour + hour_val;
							var str_time = " "+hour+":"+time_val[1]+":00";
							var str = str_date+str_time;
							//alert(str);
							return str;
				};
				
        </script>
		
		<script type="text/javascript">
				/*
             * Notifications
             */
 
			
        </script>

        
    </body>
  </html>