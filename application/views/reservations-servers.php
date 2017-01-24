<!-- Header -->
            <?php $this->load->view('header');  ?>
            
            <section id="content">
                <div class="container">
				
				
                    <div class="card">
                        <div class="card-header">
                            <h2>Reservations <small>Preview reservations made by customers.</small></h2>
                        </div>
                        
                        
						
						<table id="data-table-command" class="table table-striped table-vmiddle" >
                            <thead>
                                <tr>
                                    <th data-column-id="reservation_id" data-identifier="true" data-sortable="true" data-order="desc" data-type="numeric">ID</th>
                                    <th data-column-id="user_name" data-sortable="true">Sender</th>
                                    <th data-column-id="reservation_time" >Received</th>
                                    <th data-column-id="commands" data-formatter="commands" data-sortable="false">Commands</th>
									<th data-column-id="status" data-formatter="status" data-sortable="false">Status</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
					
									<!-- Edit Order -->
		<div class="modal fade" id="edit-reservation" data-backdrop="static"
			data-keyboard="false">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Edit Order</h4>
					</div>
					<div class="modal-body">
						<form class="addEvent" role="form">
							<div class="form-group">
								<label for="eventName1">Customer's Name</label>
								<div class="fg-line">
									<input type="text" class="input-sm form-control" id="customer-name" Disabled>
								</div>
								<label for="eventTag1" class="p-t-10">Reservation Date</label>
								<div class="fg-line ">
									<input type="text" class="input-sm form-control" id="reservation" Disabled>
								</div>
								<label for="eventTag1" class="p-t-10">Group Size</label>
								<div class="fg-line"> 
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
	
<script src="<?= base_url();?>material/js/charts.js"></script>
<script src="<?= base_url();?>material/js/functions.js"></script>
<script src="<?= base_url();?>material/js/demo.js"></script>
        
            <!-- Data Table -->
        <script type="text/javascript">
			var user_id = "<?php echo $id;?>";
			
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
					return response; },
					
					post: function ()
					{
					return {
						server_id: "<?php echo $id;?>",
						'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
						};
					},
					//data: {'restaurant_id':"<?php echo $id;?>",'last_id':0},
					url: "<?php echo base_url();?>"+"Reservations/get_server_reservations",
				formatters: {
                        "commands": function(column, row) {
                            return "<button type=\"button\" class=\"btn btn-icon command-edit\" data-row-id=\"" + row.reservation_id + "\" \"><span class=\"md md-edit\"></span></button> " + 
                                "<button type=\"button\" class=\"btn btn-icon command-delete\" data-row-id=\"" + row.reservation_id + "\"  \"><span class=\"md md-delete\" ></span></button>";
                        },
						"status": function(column, row) {
							var status_text = ["pending","waiting","checked in","completed"];
							var status_color = ["bgm-red","bgm-yellow","bgm-bluegray","bgm-green"];
                            return "<button type=\"button\" class=\"btn "+status_color[row.status]+" col-lg-8\" data-row-id=\"" + row.reservation_id + "\">"+status_text[row.status]+"</button>" ;
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
			
			//Update Reservation
			function updateReservation(rowid){
				var i = Object.keys(reservations).length;
				while( i-- ) {
					if( reservations[i].reservation_id == rowid ) break;
				}
				var status_array = ["pending","waiting","checked in","completed"];
				var pos = i;
				//Set Values
				$('#customer-name').val(reservations[pos].user_name);
				$('#reservation').val(reservations[pos].reservation_time);
				$('#notes').val(reservations[pos].notes);
				document.getElementById(status_array[reservations[pos].status]).selected = true;
				$('#status-table').val(reservations[pos].status).change();
				document.getElementById("group"+reservations[pos].customer_size).selected = true;
				$('#group-size').val(reservations[pos].customer_size).change();
				
				//Save button action #saveOrder
				$('#save-reservation').unbind('click').bind('click', function(){
					//Get Values 
					var server_id = "<?php echo $id;?>";
					var val2 = document.getElementById("group-size");
					var group_size = val2.options[val2.selectedIndex].value;
					var val3 = document.getElementById("status-table");
					var status = val3.options[val3.selectedIndex].value;
					var notes = $('#notes').val();
					//alert("Server_id: "+server_id+" group_size: "+group_size+" static: "+status+" notes: "+notes);
					$ .ajax ({
						url: "<?php echo base_url(); ?>"+"reservations/update_reservation" ,
								data: {'restaurant_id': reservations[pos].restaurant_id,
								'reservation_id':rowid,'server_id':server_id,'group_size':group_size,'notes':notes,'status':status,
								'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
								},
								type: 'POST' ,
								ContentType: 'application/json',
								success: function (json) {
								if(json!=true){
									$('#edit-reservation').modal('hide');
									notify("top", "right", "fa fa-comments", "danger", "animated fadeIn", "animated fadeIn", "Failed to Update! ");
								}else{
									$('#edit-reservation').modal('hide');
									notify("top", "right", "fa fa-comments", "success", "animated fadeIn", "animated fadeIn", "Updated! ");
									$('#data-table-command').bootgrid('reload');
								}
								}

					});
					
					
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
								var pos = i;
								
								$ .ajax ({
									url: "<?php echo base_url(); ?>"+"reservations/delete_reservation" ,
									data: {'restaurant_id': reservations[pos].restaurant_id,
										'reservation_id':rowid,
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
