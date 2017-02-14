<!-- Modal to change table ID -->	
<div class="modal fade" id="change-table-id" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Change Table ID</h4>
			</div>
			<div class="modal-body">
				<div class="fg-line">
					<input type="number" class="input-sm form-control" id="edit-table-id"
						placeholder="ID Number"/>
				</div>
			</div>
			<div class="modal-footer">
				<button id="edit-table-save-changes" type="button" class="btn btn-link">Save changes</button>
				<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal to change Section Name -->	
<div class="modal fade" id="change-section-name" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Edit Section Name</h4>
			</div>
			<div class="modal-body">
				<div class="fg-line">
					<input type="text" class="input-sm form-control" id="edit-section-name"
						placeholder="Section 1"/>
				</div>
				<input type="hidden" id="edit-section-id">
			</div>
			<div class="modal-footer">
				<button id="edit-section-save-changes" type="button" class="btn btn-link">Save changes</button>
				<button id="edit-section-delete" type="button" class="btn btn-link">Delete</button>
				<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal to add Section Name -->	
<div class="modal fade" id="add-section-name" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Section Name</h4>
			</div>
			<div class="modal-body">
				<div class="fg-line">
					<input type="text" class="input-sm form-control" id="new-section-name"
						placeholder="Section 1"/>
				</div>
			</div>
			<div class="modal-footer">
				<button id="add-section-save-changes" type="button" class="btn btn-link">Save changes</button>
				<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal to view and change table data-->
<div class="modal fade" id="view-table-info" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Table Info</h4>
			</div>
			<div class="modal-body">
				
			</div>
			<div class="modal-footer">
				<button id="save-table-data-info" type="button" class="btn btn-link">Save changes</button>
				<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal to view to checkin user or guest-->
<div class="modal fade" id="view-checkin-user" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Check-In Customer</h4>
			</div>
			<div class="modal-body">
				<form role="form" name="checkin-form" id="checkin-form" action="#" method="post" enctype="multipart/form-data">
					<label for="staus-select" class="p-t-10">Check-In Type</label>
					<div class="fg-line"> 
                        <select class="selectpicker" id="checkin-input-type">
                            <option value="guest" id="checkin-input-guest">Guest</option>
                            <option value="reserved" id="checkin-input-reserved">Reserved</option>
                        </select>
					</div>
					<div class="m-t-10 fg-line">
						<input type="text" class="input-sm form-control" id="checkin-input-name" onkeyup="ajaxUserSearch();"
							placeholder="John Doe"/>
					</div>
					<div id="checkin-name-suggestion" class="row p-absolute col-sm-12">
						<div id="autoSuggestionsList-checkin" class="col-sm-12"></div>
					</div>
					<div class="m-t-10 fg-line">
						<input type="text" class="input-sm form-control" id="checkin-input-reservation-id"
							placeholder="ID" Disabled>
					</div>
					<div class="m-t-10 row">
						<div class="col-sm-6">
							<select class="selectpicker" id="checkin-server-list" data-live-search="true">
								<?php
									foreach ($servers as $row):
										echo "<option id='checkin-server-list-".$row->user_id."' value='".$row->user_id."'>".$row->name."</option>";
									endforeach;
								?>
							</select>
						</div>
						<div class="col-sm-6">
							<select class="selectpicker" id="checkin-table-list" data-live-search="true" multiple>
								
							</select>
						</div>
					</div>
					<div class="row m-t-10">
						<div class="col-sm-6">
							<input type="number" class="input-sm form-control" id="checkin-input-customer-size"
								placeholder="Customer Size; eg 2" />
						</div>
						<div class="col-sm-6">
                            <div class="input-group form-group">
                                <span class="input-group-addon"><i class="md md-access-time"></i></span>
                                <div class="dtp-container dropdown fg-line">
									<input type='text' id="checkin-input-turn-time" class="form-control" data-format="hh:mm:ss" data-toggle="dropdown" value="01:00:00" placeholder="Turn Time">
								</div>
							</div>
                        </div>
					</div>
					<label for="staus-select" class="p-t-10">Check In Time</label>
					<div class="m-t-10 row">
						<div class="col-sm-6">
                            <div class="input-group form-group">
                                <span class="input-group-addon"><i class="md md-event"></i></span>
                                <div class="dtp-container dropdown fg-line">
                                <input type='text' id="checkin-input-date" class="form-control date-picker" value="<?php echo date("d/m/Y");?>" data-toggle="dropdown" placeholder="Select Date">
								</div>
                            </div>
                        </div>     
                        <div class="col-sm-6">
                            <div class="input-group form-group">
                                <span class="input-group-addon"><i class="md md-access-time"></i></span>
                                <div class="dtp-container dropdown fg-line">
                                <input type='text' id="checkin-input-time" class="form-control time-picker" value="<?php echo date("h:i A");?>" data-toggle="dropdown" placeholder="Select Time">
                            </div>
							</div>
                        </div>
					</div>
					<div class="fg-line"> 
                        <select class="selectpicker" id="checkin-input-status">
							<option value="2" id="checkin-input-checkedin">Checked In</option>
                            <option value="1" id="checkin-input-waiting">Waiting</option>
                        </select>
					</div>
				<form>
			</div>
			<div class="modal-footer">
				<button id="save-checkin-data" type="button" class="btn btn-link">Save changes</button>
				<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>