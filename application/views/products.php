<!-- Header -->
            <?php $this->load->view('header');  ?>
            
            <section id="content">
                <div class="container">
				
				 
                    <div class="card">
                        <div class="card-header">
                            <h2>Food products <small>Add and edit food provided by your restaurant.</small></h2>
                        </div>
                        
                      
						
						<button class="btn btn-default pull-right m-10" id="add-food"><i class="md md-add "></i> Add</button>
						
						<table id="data-table-command" class="table table-striped table-vmiddle">
                            <thead>
                                <tr>
                                    <th data-column-id="product_id" data-identifier="true" data-order="desc" data-type="numeric">ID</th>
                                    <th data-column-id="name">Name</th>
                                    <th data-column-id="description" >Description</th>
                                    <th data-column-id="commands" data-formatter="commands" data-sortable="false">Commands</th>
									<th data-column-id="status" data-formatter="status" data-sortable="false">Status</th>
                                </tr>
                            </thead>
                            <tbody>
							
								
								
                            </tbody>
                        </table>
					
				</div>
				<div class="col-lg-9">
           
                                </div>
					
					
						<!-- Edit Product-->
		<div class="modal fade" id="edit-product" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Food</h4>
					</div>
					<div class="modal-body">
						<form class="addEvent" role="form" name="frm" id="frm" action="#" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label for="eventName1">Name</label>
								<div class="fg-line">
									<input type="text" class="input-sm form-control" id="name"
										placeholder="eg: Sports day"/>
								</div>
								<label for="eventTag1" class="p-t-10">Description</label>
								<div class="fg-line ">
									<input type="text" class="input-sm form-control" id="description"
										placeholder="1-milkshake"/>
								</div>
								<label for="eventTag1" class="p-t-10">Type/Category</label>
								<div class="fg-line ">
									<input type="text" class="input-sm form-control" id="type"
										placeholder="add chocolate"/>
								</div>
								<label for="eventTag1" class="p-t-10">Tag</label>
								<div class="fg-line ">
									<input type="text" class="input-sm form-control" id="tag"
										placeholder="add chocolate"/>
								</div>
								<label for="staus-select" class="p-t-10">Price</label>
								<div class="fg-line ">
									<input type="text" class="input-sm form-control" id="price"
										placeholder="add chocolate"/>
								</div>
								
								<label for="staus-select" class="p-t-10">Status</label>
								<div class="fg-line"> 
                                    <select class="selectpicker" id="status-table" name="status-table">
                                        <option value="1" id="active">Active</option>
                                        <option value="0" id="inactive">Inactive</option>
                                    </select>
								</div>
								
							<form name="frm-img" id="frm-img" action="#" method="post" enctype="multipart/form-data">	
                            <div class="fileinput fileinput-new" data-provides="fileinput"> 
                                <div class="fileinput-preview thumbnail" data-trigger="fileinput" id="thumb1" ></div>
                                <div>
                                    <span class="btn btn-info btn-file">
                                        <span class="fileinput-new">Select image</span>
                                        <span class="fileinput-exists">Change</span>
                                        <?php echo "<input type='file' name='userfile' size='20' />"; ?>
                                    </span>
                                    <a href="#" id="remove-icon" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
									<button type="submit" class="btn btn-success fileinput-exists" id="save-icon" >Save</button>
                                </div>
                            </div>
							<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
							</form>	
							</div>
					
							<input type="hidden" id="getStart" /> <input type="hidden"
								id="getEnd" />
								
								
					<div class="modal-footer">
						<button type="submit" class="btn btn-link" id="save-product">Save</button>
						<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
					</div>
						</form>
					</div>

				</div>
			</div>
		</div>
		
		
		<!-- Add Product -->
		<div class="modal fade" id="add-product" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog ">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Food</h4>
					</div>
					<div class="modal-body">
						<form class="addEvent" role="form"  name="frm1" id="frm1" action="#" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label for="eventName1">Name</label>
								<div class="fg-line">
									<input type="text" class="input-sm form-control" name="name1" id="name1"
										placeholder="eg: Cheese Pie"/>
								</div>
								<label for="eventTag1" class="p-t-10">Description</label>
								<div class="fg-line ">
									<input type="text" class="input-sm form-control" name="description1" id="description1"
										placeholder="Hot Cheese Pizza"/>
								</div>
								<label for="eventTag1" class="p-t-10">Category</label>
								<div class="fg-line ">
									<input type="text" class="input-sm form-control" name="type1" id="type1"
										placeholder="Lunch"/>
								</div>
								<label for="eventTag1" class="p-t-10">Tag</label>
								<div class="fg-line ">
									<input type="text" class="input-sm form-control" name="tag1" id="tag1"
										placeholder="cheese"/>
								</div>
								<label for="staus-select" class="p-t-10">Price</label>
								<div class="fg-line ">
									<input type="text" class="input-sm form-control" name="price1" id="price1"
										placeholder="11.99"/>
								</div>
								
								
								<br/>
								<br/>
								
                            <div class="fileinput fileinput-new" data-provides="fileinput"> 
                                <div class="fileinput-preview thumbnail" data-trigger="fileinput" id="thumb"></div>
                                <div>
                                    <span class="btn btn-info btn-file">
                                        <span class="fileinput-new">Select image</span>
                                        <span class="fileinput-exists">Change</span>
                                        <?php echo "<input type='file' name='userfile' size='20' />"; ?>
                                    </span>
                                    <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
							<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">	
							</div>
					
							<input type="hidden" id="getStart" /> <input type="hidden"
								id="getEnd" />
								<div class="modal-footer">
						<button type="submit" class="btn btn-link" id="add-product">Add</button>
						<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
						</div>
						</form>
					</div>

					
				</div>
			</div>
		</div>
		
					<!-- Add block space to aviod view bug -->
					<?php $this->load->view('block-space');  ?>
					
					
                </div>
            </section>
        </section>
        
       
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
	var row_id = "";
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
						products = response['rows'];
					return response; },
					post: function ()
					{
					return {
						restaurant_id: user_id,
						'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
						};
					},
					url: "<?php echo base_url();?>"+"Products/get_products",
				formatters: {
                        "commands": function(column, row) {
                            return "<button type=\"button\" class=\"btn btn-icon command-edit\" data-row-id=\"" + row.product_id + "\" \"><span class=\"md md-edit\"></span></button> " + 
                                "<button type=\"button\" class=\"btn btn-icon command-delete\" data-row-id=\"" + row.product_id + "\"  \"><span class=\"md md-delete\" ></span></button>";
                        },
						"status": function(column, row) {
							var status_text = ["inactive","Active"];
							var status_color = ["bgm-bluegray","bgm-green"];
                            return "<button type=\"button\" class=\"btn "+status_color[row.status]+" col-lg-8\" data-row-id=\"" + row.product_id + "\">"+status_text[row.status]+"</button>" ;
                        }
                }
				}).on("loaded.rs.jquery.bootgrid", function()
				{
				/* Executes after data is loaded and rendered */
				table.find(".command-edit").on("click", function(e)
				{
					//Show dialog
					$('#edit-product').modal('show');
					row_id = $(this).data("row-id");
					updateProduct($(this).data("row-id"));
					
				//alert("You pressed edit on row: " + $(this).data("row-id"));
				}).end().find(".command-delete").on("click", function(e)
				{
					deleteProduct($(this).data("row-id"));
					//alert("You pressed delete on row: " + $(this).data("row-id"));
				});
				});
				
    });
	
	
	
				//Parameter
				$('#add-food').click(function(){
					$('#add-product').modal('show');
					//Save image
					$("form#frm1").submit(function() {
					var formData = new FormData($(this)[0]);
					//var formData = $('form#frm1').serialize();
					alert(formData);
					$.ajax({
						url: "<?php echo base_url(); ?>"+"products/add_product",
						type: 'POST',
						data: formData,
						success: function(jsonStr) {
								var obj = JSON.parse(jsonStr);
								data = obj;
								
								if(data.success==true){
									 //addProduct(data.path);
									 $('#add-product').modal('hide');
									 alert(data.data);
									 $('#data-table-command').bootgrid('reload');
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
					
					
				});
	
	
	
	
			//Update Product
			function updateProduct(rowid){
				var i = Object.keys(products).length;
				while( i-- ) {
					if( products[i].product_id == rowid ) break;
				}
				var status_array = ["inactive","Active"];
				var pos = i;
				//Set Values
				$('#name').val(products[pos].name);
				$('#description').val(products[pos].description);
				$('#type').val(products[pos].type);
				$('#price').val(products[pos].price);
				$('#tag').val(products[pos].tag);
				$('#status-table').val(products[pos].status).change();
				new_image_path = products[pos].image_path;
							 
				if(products[pos].image_path !="" ){
					//background-size: 80px 60px;
					var width = document.getElementById('thumb1').offsetWidth;
					var height = document.getElementById('thumb1').offsetHeight;
					$('#thumb1').css("background", "url(" + "<?php echo base_url(); ?>"+products[pos].image_path +")" + " no-repeat center "); 
					$('#thumb1').css("background-size", "contain" );
					$("#remove-icon").show();
				}else{
					$('#thumb1').css("background", "none" );
				}
				
				//Save button action #save-product
				$('#save-product').unbind('click').bind('click', function(){
					//Get Values
					var product_id = products[pos].product_id;
					var name = $('#name').val();
					var type = $('#type').val();
					var description = $('#description').val();
					var price = $('#price').val();
					var tag = $('#tag').val();
					var val = document.getElementById("status-table");
					var status = val.options[val.selectedIndex].value;
					$ .ajax ({
						url: "<?php echo base_url(); ?>"+"products/update_product" ,
								data: {'restaurant_id': user_id,
								'name':name,'product_id':product_id,'type':type,'description':description,'price':price,'tag':tag,'status':status,
								'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
								},
								type: 'POST' ,
								ContentType: 'application/json',
								success: function (json) {
								if(json!=true){
									$('#edit-product').modal('hide');
									notify("top", "right", "fa fa-comments", "danger", "animated fadeIn", "animated fadeIn", "Failed to Update! ");
								}else{
									$('#edit-product').modal('hide');
									notify("top", "right", "fa fa-comments", "success", "animated fadeIn", "animated fadeIn", "Updated! ");
									$('#data-table-command').bootgrid('reload');
								}
								}
					});
				});
			}
			
			//Delete Product
			function deleteProduct(rowid){
				
				swal({   
								title: "Are you sure?",   
								text: "You will not be able to recover this product!",   
								type: "warning",   
								showCancelButton: true,   
								confirmButtonColor: "#DD6B55",   
								confirmButtonText: "Yes, delete it!",   
								closeOnConfirm: true 
								}, function(){ 
								
								$ .ajax ({
									url: "<?php echo base_url(); ?>"+"products/delete_product" ,
									data: {'restaurant_id': user_id,
										'product_id':rowid},
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
			
			
				//Save product icon 
				$("form#frm-img").submit(function() {
				var formData = new FormData($(this)[0]);
					$.ajax({
						url: "<?php echo base_url(); ?>"+"products/do_upload",
						type: 'POST',
						data: formData,
						async: false,
						success: function(jsonStr) {
								var obj = JSON.parse(jsonStr);
								data = obj;
								
								if(data.success==true){ 
									//update image path
									UpdateImagePath(row_id,data.image_path)
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
			
			//Update Image Path
			function UpdateImagePath(rowid,image_path){
				$ .ajax ({
									url: "<?php echo base_url(); ?>"+"products/update_image_path" ,
									data: {'image_path': image_path,
										'product_id':rowid,
										'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
										},
									type: 'POST' ,
									ContentType: 'application/json',
									success: function (json) {
									if(json!=true){
										notify("top", "right", "fa fa-comments", "danger", "animated fadeIn", "animated fadeIn", "Failed to Update Image Path! ");
									}else{
										notify("top", "right", "fa fa-comments", "success", "animated fadeIn", "animated fadeIn", "Updated Image Path! ");
										$('#data-table-command').bootgrid('reload');
									}
									}

								});
			}
			
			
			//Remove button thumb 
			$('body').on('click', '#remove-icon', function(){
				var i = Object.keys(products).length;
				while( i-- ) {
					if( products[i].product_id == row_id ) break;
				}
				var pos = i;
				remove_image(products[pos].image_path,row_id);
					//alert(products[pos].image_path);
					//alert(row_id);
				return true;
			});
			
			//Remove image
			function remove_image(image_path,rowid){
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
									//alert(image_path);
									//alert(rowid);
									
									if(isConfirm){
										$ .ajax ({
										url: "<?php echo base_url(); ?>"+"products/remove_image_path" ,
										data: {'image_path': image_path,'product_id':rowid,
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
											$('#thumb1').css("background", "none" );
											$('#data-table-command').bootgrid('reload');
					
										}		
										}		
										});
									}else{
										//Change image background
										displayImage(image_path);
									}
									
									
								
						});
				}
			}	
			
						//Display Image
			function displayImage(image_path){
				if(image_path !="" ){
					//background-size: 80px 60px;
					var width = document.getElementById('thumb1').offsetWidth;
					var height = document.getElementById('thumb1').offsetHeight;
					$('#thumb1').css("background", "url(" + "<?php echo base_url(); ?>"+image_path +")" + " no-repeat center "); 
					$('#thumb1').css("background-size", "contain" );
				}	
			}
			
			function isEmpty(str) {
				return (!str || 0 === str.length);
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
