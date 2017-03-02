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
                                    <th data-column-id="reservation_id" data-identifier="true" data-sortable="true" data-order="desc" data-type="numeric">Reservation ID</th>
                                    <th data-column-id="server_name" data-sortable="true">Server</th>
                                    <th data-column-id="reservation_time" >Received</th>
                                    <th data-column-id="commands" data-formatter="commands" data-sortable="false">Commands</th>
									<th data-column-id="status" data-formatter="status" data-sortable="false">Status</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
					
									<!-- Show Reservation Dialog -->
		<div class="modal fade" id="reservation-receipt" data-backdrop="static"
			data-keyboard="false">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Edit Order</h4>
					</div>
					<div class="modal-body">
						<form class="addEvent" role="form">
							<div class="form-group">
								<h5>Reservation ID</h5>
								 <p id="Reservation_id_1"></P>
								
								<h5>Restaurant</h5>
								 <p id="Res_Name_1"></P>
								
								<h5>Server</h5>
								 <p id="Server_Name_1"></P>
								
								<h5>Time</h5>
								 <p id="time_res_1"></P>
							
								<h5>Notes</h5>
								<p id="notes"></P>
								
							</div>
							
							
							

							<input type="hidden" id="getStart" /> <input type="hidden"
								id="getEnd" />
						</form>
					</div>

					<div class="modal-footer">
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
					post: function ()
					{
					return {
						user_id: "<?php echo $id;?>",
						current_page: current_page,
						search_value: search_val,
						'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
						};
					},
					//data: {'restaurant_id':"<?php echo $id;?>",'last_id':0},
					url: "<?php echo base_url();?>"+"Reservations/get_user_reservations",
					responseHandler: function (response) { 
						reservations = response['rows'];
						//console.log(response['restaurant_id']);
					return response; },
				formatters: {
                        "commands": function(column, row) {
                            return "<button type=\"button\" class=\"btn btn-icon command-edit\" data-row-id=\"" + row.reservation_id + "\" \"><span class=\"md  md-receipt\"></span></button> " + 
                                "<button type=\"button\" class=\"btn btn-icon command-delete\" data-row-id=\"" + row.reservation_id + "\"  \"><span class=\"md md-delete\" ></span></button>";
                        },
						"status": function(column, row) {
							var status_text = ["pending","waiting","checked in","completed"];
							var status_color = ["bgm-red","bgm-yellow","bgm-bluegray","bgm-green"];
                            return "<button type=\"button\" class=\"btn "+status_color[row.status]+" col-lg-8\" data-row-id=\"" + row.reservation_id + "\">"+status_text[row.status]+"</button>" ;
                        }
                }
				}).on("loaded.rs.jquery.bootgrid", function()
				{
				/* Executes after data is loaded and rendered */
				table.find(".command-edit").on("click", function(e)
				{
					//Show dialog
					
					ShowReservation($(this).data("row-id"));
					//alert($(this).data());
					$('#reservation-receipt').modal('show');
					
				//alert("You pressed edit on row: " + $(this).data("row-id"));
				}).end().find(".command-delete").on("click", function(e)
				{
					var row_id = $(this).data("row-id");
					var i = Object.keys(reservations).length;;
					while( i-- ) {
						if( reservations[i].reservation_id == row_id ) break;
					}
					var pos = i;
					var restaurant_id = reservations[pos].restaurant_id;
					//alert("Restaurant ID: "+restaurant_id+" Row ID: "+row_id);
					deleteReservation(row_id,restaurant_id);
				//alert("You pressed delete on row: " + $(this).data("row-id"));
				});
				});
				
            });
			
			function ShowReservation(rowid){
				
				var i = Object.keys(reservations).length;;
				while( i-- ) {
					if( reservations[i].reservation_id == rowid ) break;
				}
				var pos = i;
				//Set Values
				document.getElementById("Reservation_id_1").innerHTML = reservations[pos].reservation_id;
				document.getElementById("Res_Name_1").innerHTML = reservations[pos].restaurant_name;
				document.getElementById("Server_Name_1").innerHTML = reservations[pos].server_name;
				document.getElementById("time_res_1").innerHTML = reservations[pos].reservation_time;
				document.getElementById("notes").innerHTML = reservations[pos].notes;

			}
			
			
			
			function deleteReservation(rowid,restaurant_id){
				
				swal({   
								title: "Are you sure?",   
								text: "You will not be able to recover this reservation!",   
								type: "warning",   
								showCancelButton: true,   
								confirmButtonColor: "#DD6B55",   
								confirmButtonText: "Yes, delete it!",   
								closeOnConfirm: true 
								}, function(){ 
								
								$ .ajax ({
									url: "<?php echo base_url(); ?>"+"reservations/delete_reservation" ,
									data: {'restaurant_id': restaurant_id,
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
