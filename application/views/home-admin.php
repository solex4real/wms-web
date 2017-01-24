<!-- Header -->
<?php $this->load->view('header');  ?>

<section id="content">
	<div class="container">
		
		   <div class="card">
                        <div class="card-header">
                            <h2>Sales Statistics <small>Vestibulum purus quam scelerisque, mollis nonummy metus</small></h2>
                            
                            <ul class="actions">
                                <li>
                                    <a href="">
                                        <i class="md md-cached"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="md md-file-download"></i>
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a href="" data-toggle="dropdown">
                                        <i class="md md-more-vert"></i>
                                    </a>
                                    
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li>
                                            <a href="">Change Date Range</a>
                                        </li>
                                        <li>
                                            <a href="">Change Graph Type</a>
                                        </li>
                                        <li>
                                            <a href="">Other Settings</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        
                        <div class="card-body">
                            <div class="chart-edge">
                                <div id="curved-line-chart" class="flot-chart "></div>
                            </div>
                        </div>
                    </div>
		
									
                       


					 <div class="card">
                        <div class="card-header">
                            <h2>Food Orders <small> </small></h2>
                        </div>
                        
                        <table id="data-table-command" class="table table-striped table-vmiddle">
                            <thead>
                                <tr>
                                    <th data-column-id="id" data-identifier="true" data-order="desc" data-type="numeric">ID</th>
                                    <th data-column-id="sender">Sender</th>
                                    <th data-column-id="received" >Received</th>
                                    <th data-column-id="commands" data-formatter="commands" data-sortable="false">Commands</th>
									<th data-column-id="status" data-formatter="status" data-sortable="false">Status</th>
                                </tr>
                            </thead>
                            <tbody>
							
								<?php
									foreach ($orders as $row):
									echo "<tr id='".$row->order_id."'>";
									echo "<td>".$row->order_id."</td>";
									echo "<td>".$row->customer_name."</td>";
									$val = explode(" ", $row->date_sent);
									echo "<td>".$val[0]."</td>";
									echo "<td></td>";
									$status = array("Pending","Processing","Completed");
									echo "<td>".$row->status."</td>";
									echo "</tr>";
									endforeach;
									
								?>
								
                                
								
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
						<button type="submit" class="btn btn-link" id="saveOrder">Save</button>
						<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>

	
                        
		
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

<!-- Javascript Libraries -->
<script src="<?= base_url();?>material/js/jquery-2.1.1.min.js"></script>
<script src="<?= base_url();?>material/js/bootstrap.min.js"></script>

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
            $(document).ready(function(){
                var user_id = "<?php echo $id;?>";
				var orders_val = '<?php echo json_encode($orders);?>';
				var orders = JSON.parse(orders_val);
				
				
                //Command/Status Buttons
                var table = $("#data-table-command").bootgrid({
                    css: {
                        icon: 'md icon',
                        iconColumns: 'md-view-module',
                        iconDown: 'md-expand-more',
                        iconRefresh: 'md-refresh',
                        iconUp: 'md-expand-less'
                    },
                    formatters: {
                        "commands": function(column, row) {
                            return "<button type=\"button\" class=\"btn btn-icon command-edit\" data-row-id=\"" + row.id + "\" \"><span class=\"md md-edit\"></span></button> " + 
                                "<button type=\"button\" class=\"btn btn-icon command-delete\" data-row-id=\"" + row.id + "\"  \"><span class=\"md md-delete\" ></span></button>";
                        },
						"status": function(column, row) {
							var status_text = ["pending","processing","completed"];
							var status_color = ["bgm-red","bgm-bluegray","bgm-green"];
                            return "<button type=\"button\" class=\"btn "+status_color[row.status]+" col-lg-8\" data-row-id=\"" + row.id + "\">"+status_text[row.status]+"</button>" ;
                        }
                    }
					
                }).on("loaded.rs.jquery.bootgrid", function()
					{
				/* Executes after data is loaded and rendered */
				table.find(".command-edit").on("click", function(e)
					{
						var rowid =  $(this).data("row-id");
						$('#edit-order').modal('show');							 
							 var i = orders.length;
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
						 $('#saveOrder').unbind('click').bind('click', function(){
							//Get Values
							var order = $('#order').val();
							var val = document.getElementById("status-table");
							var status = val.options[val.selectedIndex].value;
							var notes = $('#notes').val();
							
							$ .ajax ({
								//$restaurant_id,$order_id,$order,$notes,$status
								url: "<?php echo base_url(); ?>"+"orders/update_order" ,
								data: {'restaurant_id': user_id,
								'order_id':rowid,'order':order,'notes':notes,'status':status,
								'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
								},
								type: 'POST' ,
								ContentType: 'application/json',
								success: function (json) {
								if(json!=true){
									//alert(json);
									
									$('#edit-order').modal('hide');
									notify("top", "right", "fa fa-comments", "danger", "animated fadeIn", "animated fadeIn", "Failed to save! ");
								}else{
									orders[pos].order = order;
									orders[pos].status = status;
									orders[pos].notes = notes;
									var status_array = ["pending","processing","completed"];
									var status_color = ["bgm-red","bgm-bluegray","bgm-green"];
									rowdate = orders[pos].date_sent.split(" ")[0];
									rowname = orders[pos].customer_name;
									rowcolor = status_color[status];
									rowstatus = status_array[status];
									updateRow(orders[pos].order_id,rowname,rowcolor,rowstatus,rowdate);
								
									 
									$('#edit-order').modal('hide');
									notify("top", "right", "fa fa-comments", "success", "animated fadeIn", "animated fadeIn", "Updated! ");
								}
								
							}
							});
						return false;
					 
						 });
						
					//alert("You pressed edit on row: " + $(this).data("row-id"));
					}).end().find(".command-delete").on("click", function(e)
						{
							var rowid = $(this).data("row-id");
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
								data: {'order_id':rowid, 'restaurant_id':user_id,
								'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
								},
								type: 'POST' ,
								ContentType: 'application/json',
								success: function (json) {
								if(json!="1"){
									notify("top", "right", "fa fa-comments", "danger", "animated fadeIn", "animated fadeIn", "Failed to delete! ");
								}else{
									var i = orders.length;
										while( i-- ) {
											if( orders[i].order_id === rowid ) break;
										}
									var pos = i;
									delete orders[pos];
										$('[data-row-id="'+rowid+'"]').remove();
								swal("Deleted!", "Your event has been deleted.", "success"); 	
							
									}
									}
								});									
					});
							
							
							

					//alert("You pressed delete on row: " + $(this).data("row-id"));
				});
				});
				
				
            });
			
			
			function updateRow(rowid,rowname,rowcolor,rowstatus,rowdate){
					
					$('[data-row-id="'+rowid+'"]').remove();
					//alert(rowcolor);
					
					var x=document.getElementById('data-table-command').insertRow(1);
					var c1=x.insertCell(0);
					var c2=x.insertCell(1);
					var c3=x.insertCell(2);
					var c4=x.insertCell(3);
					var c5=x.insertCell(4);
					c1.innerHTML=rowid;
					c2.innerHTML=rowname;
					c3.innerHTML=rowdate;
					c4.innerHTML="<button type=\"button\" class=\"btn btn-icon command-edit\" data-row-id=\"" + rowid+ "\" onclick=\"editOrder('"+rowid+"');\"><span class=\"md md-edit\"></span></button> " + 
                                "<button type=\"button\" class=\"btn btn-icon command-delete\" data-row-id=\"" + rowid+ "\" onclick=\"deleteOrder('"+rowid+"');\"><span class=\"md md-delete\"></span></button>";
					c5.innerHTML= "<button type=\"button\" class=\"btn "+rowcolor+" col-lg-8\" data-row-id=\"color" + rowid + "\">"+rowstatus+"</button>" ;
					
		   }
		   
		   
		   
		    //Auto refresh table
				
				var prevAjaxReturned = true;
				var xhr = null;
				setInterval(function() {
				if( prevAjaxReturned ) {
					prevAjaxReturned = false;
				} else if( xhr ) {
				xhr.abort( );
				}

				xhr = $.ajax({
				type: 'POST',
				data: {'last_id':orders[orders.length-1].order_id,'restaurant_id':user_id,
				'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
				},
				url: "<?php echo base_url(); ?>"+"Orders/get_orders",
				success: function(jsonStr) {
					var json = JSON.parse(jsonStr);
					
					if (json.length>0){
					//Add new order to table
					$.each(json, function (key, obj) {
						orders.push(obj);
						var status_text = ["pending","processing","completed"];
						var status_color = ["bgm-red","bgm-bluegray","bgm-green"];
						//Add table
						var x=document.getElementById('data-table-command').insertRow(1);
						var c1=x.insertCell(0);
						var c2=x.insertCell(1);
						var c3=x.insertCell(2);
						var c4=x.insertCell(3);
						var c5=x.insertCell(4);
						c1.innerHTML=obj.order_id;
						c2.innerHTML=obj.customer_name;
						c3.innerHTML=obj.date_sent.split(" ")[0];
						c4.innerHTML="<button type=\"button\" class=\"btn btn-icon command-edit\" data-row-id=\"" + obj.order_id+ "\" onclick=\"editOrder('"+obj.order_id+"');\"><span class=\"md md-edit\"></span></button> " + 
                                "<button type=\"button\" class=\"btn btn-icon command-delete\" data-row-id=\"" + obj.order_id+ "\" onclick=\"deleteOrder('"+obj.order_id+"');\"><span class=\"md md-delete\"></span></button>";
						c5.innerHTML="<button type=\"button\" class=\"btn "+status_color[obj.status]+" col-lg-8\" data-row-id=\"color" + obj.order_id + "\">"+status_text[obj.status]+"</button>" ;
						
						//alert(value.order_id);
						});
					
					}
					
					
                 // html is a string of all output of the server script.
					//$("#element").html(html);
					//prevAjaxReturned = true;
					//alert(html);
					
				}

				});

				}, 10000);
			
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