
			
			
			
		<div class="card">
		<div class="card-header">
            <h2>Manage Reservation <small>Manage server limit and table size</small></h2>
        </div>
		<div class="card-body card-padding">
		<div class="row">
			<div class="col-sm-3 m-b-25">
                <p class="f-500 m-b-15 c-black">Servers</p>
                                    
                <select class="selectpicker" id="server_list" name="server_list" data-live-search="true">
				<?php 
				foreach ($servers as $row):
				echo "<option id='".$row->user_id."' value='".$row->user_id."'>".$row->name."</option>";
				endforeach;
				?>
                </select>
			</div>
			
			<div class="col-sm-3 m-b-25">
                <p class="f-500 m-b-15 c-black">Availablity</p>
                <select class="selectpicker" id="server-status" name="server-status" data-live-search="true">
					<option value="0">Unavailable</option>
					<option value="1">Available</option>
				<select>                   
            </div>
			
			<div class="col-sm-3 m-b-25">
                <p class="f-500 m-b-15 c-black">Table Limit</p>
                <input type="number" class="form-control" id="server-limit" placeholder="Enter Table Limit" value="<?php echo "4";?>">         
            </div>
			
		</div>
		<div class="row">
			
			
			<div class="col-sm-9 m-t-20">
				<button class="btn btn-primary btn-sm m-t-5" type="button" id="save-res-table">Update</button>
			</div>
		</div>
		</div>
		</div>
		
	
		<div class="card">
                        <div class="card-header">
                            <h2>Manage Restaurant Tables<small>Add and edit tables available by your restaurant.</small></h2>
                        </div>
						<button class="btn btn-default pull-right m-10" id="add-table"><i class="md md-add "></i> Add</button>
						
						<table id="data-table-command" class="table table-striped table-vmiddle">
                            <thead>
                                <tr>
                                    <th data-column-id="table_id" data-identifier="true" data-order="desc" data-type="numeric">ID</th>
                                    <th data-column-id="location">Location</th>
                                    <th data-column-id="size">Size</th>
                                    <th data-column-id="quantity">Quantity</th>
                                    <th data-column-id="commands" data-formatter="commands" data-sortable="false">Commands</th>
                                </tr>
                            </thead>
                            <tbody>
							
								
								
                            </tbody>
                        </table>
					
			</div>
	
		
		
									<!-- Edit Table -->
		<div class="modal fade" id="edit-table" data-backdrop="static"
			data-keyboard="false">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Table Info</h4>
					</div>
					<div class="modal-body">
						<form class="addEvent" role="form">
							<div class="form-group" id="table-input-block">
								<label for="eventName1">Table Size</label>
								<div class="fg-line">
									<input type="number" class="input-sm form-control" id="tab-res-size" />
								</div>
								<label for="eventTag1" class="p-t-10">Table Quantity</label>
								<div class="fg-line ">
									<input type="number" class="input-sm form-control" id="tab-res-quantity" />
								</div>
								<label for="eventTag1" class="p-t-10">Location</label>
								<div class="fg-line ">
									<input type="text" class="input-sm form-control" id="table-location"
										placeholder="Table located outside"/>
								</div>
								<label for="eventTag1" class="p-t-10">Description</label>
								<div class="fg-line ">
									<input type="text" class="input-sm form-control" id="table-des"
										placeholder="Wooden chairs"/>
								</div>
								
							</div>
							<small id="table-error-message"></small>
							<input type="hidden" id="getStart" /> <input type="hidden"
								id="getEnd" />
						</form>
					</div>
					
					<div class="modal-footer">
						<button type="submit" class="btn btn-link" id="save-table">Save</button>
						<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
					
					
					
					