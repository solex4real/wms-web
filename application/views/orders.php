<!-- Header -->
            <?php $this->load->view('header');  ?>
            
            <section id="content">
                <div class="container">
				
				
				
				
				
				
				
				
                    <div class="card">
                        <div class="card-header">
                            <h2>Food Orders <small>Preview and edit food orders entered by customers.</small></h2>
                        </div>
                        
                        
						
						<table id="data-table-command" class="table table-striped table-vmiddle" >
                            <thead>
                                <tr>
                                    <th data-column-id="order_id" data-type="numeric">ID</th>
                                    <th data-column-id="customer_name" >Sender</th>
                                    <th data-column-id="date_sent" >Received</th>
                                     <th data-column-id="commands" data-formatter="commands" data-sortable="false">Commands</th>
									<th data-column-id="status" data-formatter="status" >Status</th>
                                </tr>
                            </thead>
                            <tbody>
							
								
                                
								
                            </tbody>
                        </table>
                    </div>
					
									<!-- Edit Order -->
		<div class="modal fade" id="edit-order" data-backdrop="static"
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
									<input type="text" class="input-sm form-control" id="customer-name"
										placeholder="eg: Sports day"/>
								</div>
								<label for="eventTag1" class="p-t-10">Order</label>
								<div class="fg-line ">
									<input type="text" class="input-sm form-control" id="order"
										placeholder="1-milkshake"/>
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
                                        <option value="1" id="processing">Processing</option>
                                        <option value="2" id="completed">Completed</option>
                                    </select>
                             </div>
							</div>
							
							
							

							<input type="hidden" id="getStart" /> <input type="hidden"
								id="getEnd" />
						</form>
					</div>

					<div class="modal-footer">
						<button type="submit" class="btn btn-link" id="save-order">Save</button>
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
        <script src="<?= base_url();?>material/js/jquery-2.1.1.min.js"></script>
        <script src="<?= base_url();?>material/js/bootstrap.min.js"></script>
		
		
		<script src="<?= base_url();?>material/vendors/flot/jquery.flot.min.js"></script>
        <script src="<?= base_url();?>material/vendors/flot/jquery.flot.resize.min.js"></script>
        <script src="<?= base_url();?>material/vendors/flot/plugins/curvedLines.js"></script>
        <script src="<?= base_url();?>material/vendors/sparklines/jquery.sparkline.min.js"></script>
        
		<script src="<?= base_url();?>material/vendors/bootgrid/jquery.bootgrid.min.js"></script>
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
    	
        
            <!-- Data Table -->
   <script type="text/javascript">
    var user_id = '<?php echo $user_data['id'];?>';
	//var orders_val = '<?php echo json_encode($orders['rows']);?>';
	//alert(orders_val);
	//var orders = JSON.parse(orders_val);
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
						orders = response['rows'];
						//alert(response['search_data']);
					return response; },
					post: function ()
					{
					return {
						restaurant_id: user_id,
						current_page: current_page,
						search_value: search_val,
						'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
						};
					},
					url: "<?php echo base_url();?>"+"Orders/get_orders",
				formatters: {
                        "commands": function(column, row) {
                            return "<button type=\"button\" class=\"btn btn-icon command-edit\" data-row-id=\"" + row.order_id + "\" \"><span class=\"md md-edit\"></span></button> " + 
                                "<button type=\"button\" class=\"btn btn-icon command-delete\" data-row-id=\"" + row.order_id + "\"  \"><span class=\"md md-delete\" ></span></button>";
                        },
						"status": function(column, row) {
							var status_text = ["pending","processing","completed"];
							var status_color = ["bgm-red","bgm-bluegray","bgm-green"];
                            return "<button type=\"button\" class=\"btn "+status_color[row.status]+" col-lg-8\" data-row-id=\"" + row.order_id + "\">"+status_text[row.status]+"</button>" ;
                        }
                }
				}).on("loaded.rs.jquery.bootgrid", function()
				{
				/* Executes after data is loaded and rendered */
				table.find(".command-edit").on("click", function(e)
				{
					//Show dialog
					$('#edit-order').modal('show');
					updateOrder($(this).data("row-id"));
					
				//alert("You pressed edit on row: " + $(this).data("row-id"));
				}).end().find(".command-delete").on("click", function(e)
				{
					deleteOrder($(this).data("row-id"));
					//alert("You pressed delete on row: " + $(this).data("row-id"));
				});
				});
				
    });
	
			//Update Reservation
			function updateOrder(rowid){
				var i = Object.keys(orders).length;
				while( i-- ) {
					if( orders[i].order_id == rowid ) break;
				}
				var status_array = ["pending","processing","completed"];
				var pos = i;
				//Set Values
				$('#customer-name').val(orders[pos].customer_name);
				$('#order').val(orders[pos].order);
				$('#notes').val(orders[pos].notes);
				document.getElementById(status_array[orders[pos].status]).selected = true;
				$('#status-table').val(orders[pos].status).change();
				
				//Save button action #saveOrder
				$('#save-order').unbind('click').bind('click', function(){
					//Get Values
					var order = $('#order').val();
					var val = document.getElementById("status-table");
					var status = val.options[val.selectedIndex].value;
					var notes = $('#notes').val();
					$ .ajax ({
						url: "<?php echo base_url(); ?>"+"orders/update_order" ,
								data: {'restaurant_id': user_id,
								'order_id':rowid,'order':order,'notes':notes,'status':status,
								'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
								},
								type: 'POST' ,
								ContentType: 'application/json',
								success: function (json) {
								if(json!=true){
									$('#edit-order').modal('hide');
									notify("top", "right", "fa fa-comments", "danger", "animated fadeIn", "animated fadeIn", "Failed to Update! ");
								}else{
									$('#edit-order').modal('hide');
									notify("top", "right", "fa fa-comments", "success", "animated fadeIn", "animated fadeIn", "Updated! ");
									$('#data-table-command').bootgrid('reload');
								}
								}

					});
				});
			}
			
			//Delete Order
			function deleteOrder(rowid){
				
				swal({   
								title: "Are you sure?",   
								text: "You will not be able to recover this order!",   
								type: "warning",   
								showCancelButton: true,   
								confirmButtonColor: "#DD6B55",   
								confirmButtonText: "Yes, delete it!",   
								closeOnConfirm: true 
								}, function(){ 
								
								$ .ajax ({
									url: "<?php echo base_url(); ?>"+"orders/delete_order" ,
									data: {'restaurant_id': user_id,
										'order_id':rowid,
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
