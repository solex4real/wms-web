<!-- Header -->
            <?php $this->load->view('header');  ?>
            
            <section id="content">
                <div class="container">
				
				
                    <div class="card">
                        <div class="card-header">
                            <h2>Guest Reservations <small>Preview reservations made by walk ins/guest.</small></h2>
                        </div>
                        <button class='btn pull-right btn-success col-sm-2' id='add-reservation' onclick='add_reservation();'><i class='md md-add'>Add Guest</i></button>
                        
						
						<table id="data-table-command" class="table table-striped table-vmiddle" >
                            <thead>
                                <tr>
                                    <th data-column-id="reservation_id" data-identifier="true" data-sortable="true" data-order="desc" data-type="numeric">ID</th>
                                    <th data-column-id="guest_name" data-sortable="true">Customer</th>
                                    <th data-column-id="server_name" data-formatter="server_name" data-sortable="false">Server</th>
                                    <th data-column-id="arrival_time" >Received</th>
                                    <th data-column-id="commands" data-formatter="commands" data-sortable="false">Commands</th>
									<th data-column-id="status" data-formatter="status" data-sortable="false">Status</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
					
											<!-- Add Reservation -->
		<div class="modal fade" id="add-reservation-modal" data-backdrop="static"
			data-keyboard="false">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Add Guest Reservation</h4>
					</div>
					<div class="modal-body">
						<form class="addEvent" role="form">
							<div class="form-group">
								<label for="add-customer-name" >Customer's Name</label>
								<div class="fg-line">
									<input type="text" class="input-sm form-control" id="add-customer-name" required>
								</div>
								<label for="add-customer-email">Customer's Email</label>
								<div class="fg-line">
									<input type="text" class="input-sm form-control" id="add-customer-email" required>
								</div>
								<label for="staus-select" class="p-t-10">Reservation Time</label>
								<div class="m-t-10 row">
									<div class="col-sm-4">
										<label for="add-reservation-date">Date</label>
										<div class="input-group form-group">
											<span class="input-group-addon"><i class="md md-event"></i></span>
											<div class="dtp-container dropdown fg-line">
												<input type='text' id="add-reservation-date" class="form-control date-picker" value="<?php echo date("Y-m-d");?>" data-date-format='YYYY-MM-DD' data-toggle="dropdown" placeholder="Select Date">
											</div>
										</div>
									</div>     
									<div class="col-sm-4">
										<label for="add-reservation-time">Time</label>
										<div class="input-group form-group">
											<span class="input-group-addon"><i class="md md-access-time"></i></span>
											<div class="dtp-container dropdown fg-line">
												<input type='text' id="add-reservation-time" class="form-control time-picker" value="<?php echo date("h:i A");?>" data-toggle="dropdown" placeholder="Select Time">
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<label for="add-turn-time">Turn Time</label>
										<div class="fg-line">
											<input type="text" class="input-sm form-control" id="add-turn-time" value="01:00:00">
										</div>
									</div>
								</div>
								
								<div class="row">
										<div class="col-sm-6">
											<label for="add-group-size" class="p-t-10">Group Size</label>
											<select id="add-group-size" class="selectpicker" data-live-search="true">
												<option value="1" id="group1">1 Person</option>
												<option value="2" id="group2">2 People</option>
												<option value="3" id="group3">3 People</option>
												<option value="4" id="group4">4 People</option>
												<option value="5" id="group5">5 People</option>
												<option value="6" id="group6">6 People</option>
												<option value="7" id="group7">7 People</option>
											</select>
										</div>
										<div class="col-sm-6">
											<label for="add-table-list" class="p-t-10">Tables</label>
											</br>
											<select id="add-table-list" class="selectpicker" data-live-search="true" multiple>
												
											</select>
										</div>
                             </div>
								
								<label for="add-server-list" class="p-t-10">Server</label>
								<div class="fg-line ">
									<select id="add-server-list" class="selectpicker" >
												<?php
												foreach($servers as $row){
													$disabled = ($row->status == 0) ? "disabled":"";
													echo "<option value=".$row->user_id." id="."server_id".$row->user_id." ".$disabled.">".$row->name."</option>";
												}
												?>
									</select>
								</div>
								<label for="add-notes" class="p-t-10">Notes</label>
								<div class="fg-line ">
									<input type="text" class="input-sm form-control" id="add-notes"
										placeholder="add chocolate"/>
								</div>
								<label for="add-staus-select" class="p-t-10">Status</label>
								<div class="fg-line"> 
                                    <select class="selectpicker" id="add-status-table" name="status-table">
                                        <option value="0" id="pending">Pending</option>
                                        <option value="1" id="waiting">Waiting</option>
                                        <option value="2" id="checked in">Checked In</option>
                                        <option value="3" id="completed">Completed</option>
                                    </select>
                             </div>
							</div>
							
							
							

							<input type="hidden" id="getStart" /> <input type="hidden"
								id="getEnd" />
						</form>
					</div>

					<div class="modal-footer">
						<button type="submit" class="btn btn-link" id="save-add-reservation">Save</button>
						<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
					
					
									<!-- Edit Reservation -->
		<div class="modal fade" id="edit-reservation" data-backdrop="static"
			data-keyboard="false">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Edit Guest Reservation</h4>
					</div>
					<div class="modal-body">
						<form class="addEvent" role="form">
							<div class="form-group">
								<label for="eventName1">Customer's Name</label>
								<div class="fg-line">
									<input type="text" class="input-sm form-control" id="customer-name" Disabled>
								</div>
								<label for="eventName12">Customer's Email</label>
								<div class="fg-line">
									<input type="text" class="input-sm form-control" id="customer-email" >
								</div>
								<label for="eventTag1" class="p-t-10">Reservation Date</label>
								<div class="fg-line ">
									<input type="text" class="input-sm form-control" id="reservation" Disabled>
								</div>
								
								<div class="row">
										<div class="col-sm-6">
											<label for="eventTag1" class="p-t-10">Group Size</label>
											<select id="group-size" class="selectpicker" data-live-search="true">
												<option value="1" id="group1">1 Person</option>
												<option value="2" id="group2">2 People</option>
												<option value="3" id="group3">3 People</option>
												<option value="4" id="group4">4 People</option>
												<option value="5" id="group5">5 People</option>
												<option value="6" id="group6">6 People</option>
												<option value="7" id="group7">7 People</option>
											</select>
										</div>
										<div class="col-sm-6">
											<label for="eventTag1" class="p-t-10">Tables</label>
											</br>
											<select id="table-list" class="selectpicker" data-live-search="true" multiple>
												
											</select>
										</div>
                             </div>
								
								<label for="eventTag1" class="p-t-10">Server</label>
								<div class="fg-line ">
									<select id="server" class="selectpicker" >
												<?php
												foreach($servers as $row){
													$disabled = ($row->status == 0) ? "disabled":"";
													echo "<option value=".$row->user_id." id="."server_id".$row->user_id." ".$disabled.">".$row->name."</option>";
												}
												?>
									</select>
								</div>
								<label for="eventTag1" class="p-t-10">Notes</label>
								<div class="fg-line ">
									<input type="text" class="input-sm form-control" id="notes"
										placeholder="add chocolate"/>
								</div>
								<label for="staus-select" class="p-t-10">Status</label>
								<div class="fg-line"> 
                                    <select class="selectpicker" id="status-table" name="status-table">
                                        <option value="0" id="pending">Pending</option>
                                        <option value="1" id="waiting">Waiting</option>
                                        <option value="2" id="checked in">Checked In</option>
                                        <option value="3" id="completed">Completed</option>
                                    </select>
                             </div>
							</div>
							
							
							

							<input type="hidden" id="getStart" /> <input type="hidden"
								id="getEnd" />
						</form>
					</div>

					<div class="modal-footer">
						<button type="submit" class="btn btn-link" id="save-reservation">Save</button>
						<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		
					<!-- Add block space to aviod view bug -->
					<?php $this->load->view('block-space');  ?>
					
                </div>
            </section>
        </section>
        
        
       <?php $this->load->view('footer');?>

<script
	src="<?= base_url();?>material/vendors/sparklines/jquery.sparkline.min.js"></script>
	
	<!-- Vendor CSS -->
        <link href="<?= base_url();?>material/vendors/animate-css/animate.min.css" rel="stylesheet">
        <link href="<?= base_url();?>material/vendors/noUiSlider/jquery.nouislider.min.css" rel="stylesheet">
        <link href="<?= base_url();?>material/vendors/farbtastic/farbtastic.css" rel="stylesheet">
        <link href="<?= base_url();?>material/vendors/summernote/summernote.css" rel="stylesheet">
        <link href="<?= base_url();?>material/vendors/sweet-alert/sweet-alert.min.css" rel="stylesheet">
        <link href="<?= base_url();?>material/vendors/material-icons/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="<?= base_url();?>material/vendors/socicon/socicon.min.css" rel="stylesheet">


<script src="<?= base_url();?>material/vendors/flot/jquery.flot.min.js"></script>
        <script src="<?= base_url();?>material/vendors/flot/jquery.flot.resize.min.js"></script>
<script src="<?= base_url();?>material/vendors/flot/plugins/curvedLines.js"></script>
        <script src="<?= base_url();?>material/vendors/sparklines/jquery.sparkline.min.js"></script>
<script
	src="<?= base_url();?>material/vendors/auto-size/jquery.autosize.min.js"></script>
<script
	src="<?= base_url();?>material/vendors/nicescroll/jquery.nicescroll.min.js"></script>
<script src="<?= base_url();?>material/vendors/waves/waves.min.js"></script>
<script
	src="<?= base_url();?>material/vendors/bootstrap-growl/bootstrap-growl.min.js"></script>
<script
	src="<?= base_url();?>material/vendors/sweet-alert/sweet-alert.min.js"></script>
	
	
	<script 
	src="<?= base_url();?>material/vendors/bootstrap-select/bootstrap-select.min.js"></script>
<script src="<?= base_url();?>material/vendors/chosen/chosen.jquery.min.js"></script>
<script src="<?= base_url();?>material/vendors/noUiSlider/jquery.nouislider.all.min.js"></script>
<script src="<?= base_url();?>material/vendors/input-mask/input-mask.min.js"></script>
<script src="<?= base_url();?>material/vendors/farbtastic/farbtastic.min.js"></script>
<script src="<?= base_url();?>material/vendors/summernote/summernote.min.js"></script>

 <script src="<?= base_url();?>material/js/flot-charts/curved-line-chart.js"></script>
 <script src="<?= base_url();?>material/js/flot-charts/line-chart.js"></script>
<script src="<?= base_url();?>material/vendors/bootgrid/jquery.bootgrid.min.js"></script>
<script src="<?= base_url();?>material/vendors/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js"></script>
	
<script src="<?= base_url();?>material/js/charts.js"></script>
<script src="<?= base_url();?>material/js/functions.js"></script>
<script src="<?= base_url();?>material/js/demo.js"></script>
        
            <!-- Data Table -->
        <script type="text/javascript">
			var user_id = "<?php echo $id;?>";
			var reservations = [];
			var current_page = 1;
			var search_val = "";
			
            $(document).ready(function(){
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
						reservations = response['rows'];
						//console.log(response['restaurant_id']);
					return response; },
					
					post: function ()
					{
					return {
						current_page: current_page,
						search_value: search_val,
						'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
						};
					},
					//data: {'restaurant_id':"<?php echo $id;?>",'last_id':0},
					url: "<?php echo base_url();?>"+"Reservation_guest/get_reservations",
				formatters: {
                        "commands": function(column, row) {
                            return "<button type=\"button\" class=\"btn btn-icon command-edit\" data-row-id=\"" + row.reservation_id + "\" \"><span class=\"md md-edit\"></span></button> " + 
                                "<button type=\"button\" class=\"btn btn-icon command-delete\" data-row-id=\"" + row.reservation_id + "\"  \"><span class=\"md md-delete\" ></span></button>";
                        },
						"status": function(column, row) {
							var status_text = ["pending","waiting","checked in","completed"];
							var status_color = ["bgm-red","bgm-yellow","bgm-bluegray","bgm-green"];
                            return "<button type=\"button\" class=\"btn "+status_color[row.status]+" col-lg-8\" data-row-id=\"" + row.reservation_id + "\">"+status_text[row.status]+"</button>" ;
                        },
						"server_name": function(column, row) {
                            return "<p class='m-5'><img data-name='"+row.server_name+"' onerror='onImgError(this)' class='img-circle' src='"+"<?php echo base_url();?>"+row.icon_path+"' width='30' height='30'>"+"   "+row.server_name+"</p>" ;
                        }
                }
				}).on("loaded.rs.jquery.bootgrid", function(e, rows)
					
					
				{
				/* Executes after data is loaded and rendered */
				table.find(".command-edit").on("click", function(e)
				{
					//Show dialog
					$('#edit-reservation').modal('show');
					updateReservation($(this).data("row-id"));
					
				//alert("You pressed edit on row: " + $(this).data("row-id"));
				}).end().find(".command-delete").on("click", function(e)
				{
					deleteReservation($(this).data("row-id"));
				//alert("You pressed delete on row: " + $(this).data("row-id"));
				});
				});
				
				
				
            });
			
			
			//Load/Get available tables
			function get_avaialable_tables(dateTime){
				var table_data = [];
				$ .ajax ({
					url: "<?php echo base_url(); ?>"+"reservations/get_available_tables" ,
					data: {'dateTime': dateTime,
							'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
						},
					type: 'POST' ,
					async: false,
					ContentType: 'application/json',
					success: function (json) {
						json = JSON.parse(json);
						for(i = 0;i < json.table_ids.length;i++){
							table_data.push(json.table_ids[i]);
						}
					},
					error: function (request, status, error) {
						console.error(request.responseText);
					}

				});
				return table_data;
			}
			
			var tables = JSON.parse('<?= $tables;?>');
			//Add new guest reservation
			function add_reservation(){
				//clear modal
				$('#add-reservation-modal').find('form')[0].reset();
				//Reset status
				$('#status-table').val(0).change();
				//Reset tables
				$('#add-table-list option:selected').removeAttr("selected").change();
				//mask turn time input
				$('#add-turn-time').mask("00:00:00");
				//Add/update available tables
				updateAvailableTables(moment().format('YYYY-MM-DD HH:mm:ss'));
				$('#save-add-reservation').unbind('click').bind('click', function(){
					dateTime = new Date($('#add-reservation-date').val() + " "+ $('#add-reservation-time').val());
					console.log(dateTime);
					dateTime = moment(dateTime).format('YYYY-MM-DD HH:mm:ss');
					console.log(dateTime);
					form = $('#add-reservation-modal').find('form');
					if(form.valid() && $('#add-table-list').val() != null){
					dateTime = new Date($('#add-reservation-date').val() + " "+ $('#add-reservation-time').val());
					dateTime = moment(dateTime).format('YYYY-MM-DD HH:mm:ss');
					var table_data = [];
					var table_list = $('#add-table-list').val();
					//console.log(table_list);
					len = (table_list==null) ? 0:table_list.length;
					for(i = 0;i < len;i++){
						table_data.push({'table_id':table_list[i]});
					}
					table_data = JSON.stringify(table_data);
					//Get Values 
					var val1 = document.getElementById("add-server-list");
					var server_id = val1.options[val1.selectedIndex].value;
					var val2 = document.getElementById("add-group-size");
					var group_size = val2.options[val2.selectedIndex].value;
					var val3 = document.getElementById("add-status-table");
					var status = val3.options[val3.selectedIndex].value;
					var notes = $('#add-notes').val();
					var email = $('#add-customer-email').val();
					data = {'server_id':server_id,'guest_name':$('#add-customer-name').val(),
					'notes':notes, 'arrival_time':dateTime, 'turn_time': $('#add-turn-time').val(),
					'status':status,'customer_size':group_size,'email':$('#add-customer-email').val()};
					data = JSON.stringify(data);
					//Make request
					$.ajax({
						type: "POST",
						url: "<?php echo base_url(); ?>"+"reservation_guest/add_reservation",
						data: {'data':data,'tables':table_data,
							'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'},
						success: function(json) {
							console.log(json);
							if(json.success){
								notify("top", "right", "fa fa-comments", "success", "animated fadeIn", "animated fadeIn", "Added! ");
							}
							$('#data-table-command').bootgrid('reload');
							$('#add-reservation-modal').modal('hide');
						},
						error: function (request, ajaxOptions, thrownError) {
						console.log(request.responseText);
			
						}
					});
					}
				});
				$('#add-reservation-modal').modal('show');
			}
			//update available tables
			function updateAvailableTables(dateTime){
				$('#add-table-list').html("");
				available_tables = get_avaialable_tables(dateTime);
				len = tables.length;
				for(i = 0;i < len;i++){
					if(available_tables.indexOf(tables[i].table_id) > -1){
						//table is available
						$('#add-table-list').append("<option value='"+tables[i].table_id+"' >"+tables[i].table_id+":<span>"+tables[i].num_chairs+"</span></option>");
					}else{
						//table is not available
						$('#add-table-list').append("<option value='"+tables[i].table_id+"' disabled>"+tables[i].table_id+":<span>"+tables[i].num_chairs+"</span></option>");
					}
				}
				$('#add-table-list').selectpicker("refresh");
			}
			
			//update available tables based on time changes
			$('#add-reservation-time').focusout(function() {
				dateTime = new Date($('#add-reservation-date').val() + " "+ $('#add-reservation-time').val());
				dateTime = moment(dateTime).format('YYYY-MM-DD HH:mm:ss');
				updateAvailableTables(dateTime);
			});
			$('#add-reservation-date').focusout(function() {
				dateTime = new Date($('#add-reservation-date').val() + " "+ $('#add-reservation-time').val());
				dateTime = moment(dateTime).format('YYYY-MM-DD HH:mm:ss');
				updateAvailableTables(dateTime);
			});
			
			//Update Reservation
			function updateReservation(rowid){
				var i = Object.keys(reservations).length;;
				while( i-- ) {
					if( reservations[i].reservation_id == rowid ) break;
				}
				var status_array = ["pending","waiting","checked in","completed"];
				var pos = i;
				//Set Values
				$('#customer-name').val(reservations[pos].guest_name);
				$('#customer-email').val(reservations[pos].email);
				$('#reservation').val(reservations[pos].arrival_time);
				$('#notes').val(reservations[pos].notes);
				try{
					document.getElementById("server_id"+reservations[pos].server_id).selected = true;
					$('#server').val(reservations[pos].server_id).change();
				}catch(err){
					
				}	
				document.getElementById(status_array[reservations[pos].status]).selected = true;
				$('#status-table').val(reservations[pos].status).change();
				document.getElementById("group"+reservations[pos].customer_size).selected = true;
				$('#group-size').val(reservations[pos].customer_size).change();
				//Show selected tebles
				len = tables.length
				available_tables = get_avaialable_tables(reservations[pos].arrival_time);
				console.log(available_tables);
				tables_div = "";
				table_ids = (reservations[pos].table_ids!=null) ? reservations[pos].table_ids.split(','):[];
				$('#table-list option:selected').removeAttr("selected").change();
				for(i = 0;i < len;i++){
					isSelected = (table_ids.indexOf(tables[i].table_id) > -1) ? "selected":"";
					if(available_tables.indexOf(tables[i].table_id) > -1){
						//table is available
						$('#table-list').append("<option value='"+tables[i].table_id+"' "+isSelected+">"+tables[i].table_id+":<span>"+tables[i].num_chairs+"</span></option>");
					}else{
						//table is not available
						$('#table-list').append("<option value='"+tables[i].table_id+"' disabled "+isSelected+">"+tables[i].table_id+":<span>"+tables[i].num_chairs+"</span></option>");
					}
				}
				$('#table-list').selectpicker("refresh");
				//Save button action #saveOrder
				$('#save-reservation').unbind('click').bind('click', function(){
					//Get Values 
					var val1 = document.getElementById("server");
					var server_id = val1.options[val1.selectedIndex].value;
					var val2 = document.getElementById("group-size");
					var group_size = val2.options[val2.selectedIndex].value;
					var val3 = document.getElementById("status-table");
					var status = val3.options[val3.selectedIndex].value;
					var notes = $('#notes').val();
					var email = $('#customer-email').val();
					data = [{'id':reservations[pos].id,'server_id':server_id,'customer_size':group_size,'email':email,'notes':notes,'status':status}];
					data = JSON.stringify(data);
					var table_data = [];
					var table_list = $('#table-list').val();
					//console.log(table_list);
					len = (table_list==null) ? 0:table_list.length;
					for(i = 0;i < len;i++){
						table_data.push({'table_id':table_list[i]});
					}
					table_data = JSON.stringify(table_data);
					guestReservationTablesChanged(reservations[pos].reservation_id,table_data);
					$ .ajax ({
						url: "<?php echo base_url(); ?>"+"reservation_guest/update_reservation" ,
								data: {'data': data,
								'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
								},
								type: 'POST' ,
								ContentType: 'application/json',
								success: function (json) {
								if(json!=true){
									$('#edit-reservation').modal('hide');
									//notify("top", "right", "fa fa-comments", "danger", "animated fadeIn", "animated fadeIn", "Failed to Update! ");
									//console.error(json);
									$('#data-table-command').bootgrid('reload');
								}else{
									$('#edit-reservation').modal('hide');
									notify("top", "right", "fa fa-comments", "success", "animated fadeIn", "animated fadeIn", "Updated! ");
									$('#data-table-command').bootgrid('reload');
								}
								},
								error: function (request, status, error) {
									console.error(request.responseText);
								}

					});
					
					
				});
				
				
			}
			
			function guestReservationTablesChanged(reservation_id,table_data){
				//Make request
				$.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>"+"reservation_guest/change_tables",
					data: {'reservation_guest_id':reservation_id,'tables':table_data,
						'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'},
					success: function(json) {
						console.log(json);
					},
					error: function (request, ajaxOptions, thrownError) {
					console.log(request.responseText);
			
					}
				});
			}
			
			function deleteReservation(rowid){
				
				swal({   
								title: "Are you sure?",   
								text: "You will not be able to recover this reservation!",   
								type: "warning",   
								showCancelButton: true,    
								confirmButtonColor: "#DD6B55",   
								confirmButtonText: "Yes, delete it!",   
								closeOnConfirm: true 
								}, function(){ 
								var i = Object.keys(reservations).length;;
								while( i-- ) {
									if( reservations[i].reservation_id == rowid ) break;
								}
								console.log(rowid);
								var pos = i;
								$ .ajax ({
									url: "<?php echo base_url(); ?>"+"reservation_guest/remove_reservation" ,
									data: {'reservation_guest_id': rowid,
										'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
										},
									type: 'POST' ,
									ContentType: 'application/json',
									success: function (json) {
									if(json!=true){
										notify("top", "right", "fa fa-comments", "danger", "animated fadeIn", "animated fadeIn", "Failed to Delete! ");
										console.log(json);
									}else{
										notify("top", "right", "fa fa-comments", "success", "animated fadeIn", "animated fadeIn", "Deleted! ");
										$('#data-table-command').bootgrid('reload');
									}
									}

								});
		
				});

				
			}
			
			
			//Notify function
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
        </script>

        
    </body>
  </html>
