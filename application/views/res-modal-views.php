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
			<div class="row">
				<div class="col-sm-6">
					<label for="staus-select" class="p-t-10">Table ID</label>
					<div class="m-t-10 fg-line">
						<input type="text" class="input-sm form-control" id="table-info-table-id"
							placeholder="101" disabled>
					</div>
				</div>
				<div class="col-sm-6">
					<label for="staus-select" class="p-t-10">Section ID</label>
					<div class="m-t-10 fg-line">
						<input type="text" class="input-sm form-control" id="table-info-section-id"
							placeholder="2" disabled>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<label for="staus-select" class="p-t-10">Upcoming Reservations</label>
					<div id="table-info-upcoming-res" class="row col-sm-12">
						<p>None</p>
					</div>
				</div>
			</div>
			<div id="table-info-reservation" class="row">
				<div class="col-sm-6">
					<label for="staus-select" class="p-t-10">Customer Name</label>
					<div class=" fg-line">
						<input type="text" class="input-sm form-control" id="table-info-customer-name"
							placeholder="John Doe" disabled>
					</div>
				</div>
				<div class="col-sm-6">
					<label for="staus-select" class="p-t-10">Server Name</label>
					<div class="fg-line">
						<input type="text" class="input-sm form-control" id="table-info-server-name"
							placeholder="John Doe" disabled>
					</div>
				</div>
				<div class="col-sm-12">
					<label for="staus-select" class="p-t-10">Turn Time</label>
					<div class=" fg-line">
						<input type="text" class="input-sm form-control" id="table-info-turn-time"
							placeholder="4:30 PM" disabled>
					</div>
				</div>
			</div>
			<label for="staus-select" class="p-t-10">Check-In Type</label>
			<div class="fg-line"> 
                <select class="selectpicker" id="table-info-status">
                    <option value="0" id="table-info-status-unavailable">Unavailable</option>
                    <option value="1" id="table-info-status-available">Available</option>
                    <option value="2" id="table-info-status-occupied">Occupied</option>
                    <option value="3" id="table-info-status-dirty">Check Table</option>
                    <option value="4" id="table-info-status-closed">Closed</option>
                </select>
			</div>
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
				<form role="form" name="checkin-form" id="checkin-form" >
					<label for="staus-select" class="p-t-10">Check-In Type</label>
					<div class="fg-line"> 
                        <select class="selectpicker" id="checkin-input-type">
							<option value="walk-ins" id="checkin-input-walk-ins">Walk Ins</option>
                            <option value="guest" id="checkin-input-guest">Local Reservation</option>
                            <option value="reserved" id="checkin-input-reserved">Online Reservation</option>
                        </select>
					</div>
					<div class="m-t-10 fg-line">
						<input type="text" class="input-sm form-control" autocomplete="off" id="checkin-input-name" onkeyup="ajaxUserSearch();"
							placeholder="John Doe" required>
					</div>
					<div id="checkin-name-suggestion" class="row p-absolute col-sm-12 z-index-10">
						<div id="autoSuggestionsList-checkin" class="col-sm-12"></div>
					</div>
					<div class="input-group m-t-10 ">
						<input type="text" class="input-sm form-control"  id="checkin-input-reservation-id"
							placeholder="ID" Disabled>
						<span class="input-group-btn">
							<button id="checkin-load-reservation-id" class="p-b-5 btn btn-secondary" type="button" disabled>Load</button>
						</span>
					</div>
					<div class="m-t-10 row">
						<div class="col-sm-6">
							<select class="selectpicker" id="checkin-server-list" data-live-search="true">
								<?php
									foreach ($servers as $row):
										$disabled = ($row->status == 0) ? "disabled":"";
										echo "<option id='checkin-server-list-".$row->user_id."' value='".$row->user_id."' ".$disabled.">".$row->name."</option>";
									endforeach;
								?>
							</select>
						</div>
						<div class="col-sm-6">
							<select class="selectpicker" id="checkin-table-list" data-live-search="true" multiple required>
								
							</select>
						</div>
					</div>
					<div class="row m-t-10">
						<div class="col-sm-6">
							<input type="number" class="input-sm form-control" id="checkin-input-customer-size"
								placeholder="Customer Size; eg 2" min="1" required>
						</div>
						<div class="col-sm-6">
                            <div class="input-group form-group">
                                <span class="input-group-addon"><i class="md md-access-time"></i></span>
                                <div class="dtp-container dropdown fg-line">
									<input type='text' id="checkin-input-turn-time" class="form-control" data-format="hh:mm:ss" data-toggle="dropdown" value="01:00:00" placeholder="Turn Time" required>
								</div>
							</div>
                        </div>
					</div>
					<label for="staus-select" class="">Notes</label>
					<div class="fg-line">
						<input type="textarea" class="input-sm form-control" id="checkin-input-notes"
							placeholder="I want a cup of coffee"/>
					</div>
					
					
					<label for="staus-select" class="p-t-10">Arrival Time</label>
					<div class="m-t-10 row">
						<div class="col-sm-6">
                            <div class="input-group form-group">
                                <span class="input-group-addon"><i class="md md-event"></i></span>
                                <div class="dtp-container dropdown fg-line">
                                <input type='text' id="checkin-input-date" class="form-control date-picker" data-date-format='YYYY-MM-DD' data-toggle="dropdown" placeholder="Select Date">
								</div>
                            </div>
                        </div>     
                        <div class="col-sm-6">
                            <div class="input-group form-group">
                                <span class="input-group-addon"><i class="md md-access-time"></i></span>
                                <div class="dtp-container dropdown fg-line">
                                <input type='text' id="checkin-input-time" class="form-control time-picker" data-toggle="dropdown" placeholder="Select Time">
                            </div>
							</div>
                        </div>
					</div>
					<div class="fg-line"> 
                        <select class="selectpicker" id="checkin-input-status">
							<option value="2" id="checkin-input-checkedin">Seated</option>
                            <option value="1" id="checkin-input-waiting">Waiting</option>
                        </select>
					</div>
					<input type="hidden" id="getReservationId" /> 
					<input type="hidden" id="getTableIds" /> 
					<input type="hidden" id="getNotes" /> 
				</form>
			</div>
			<div class="modal-footer">
				<button id="save-checkin-data" type="button" class="btn btn-link">Save changes</button>
				<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal to view to waiting/checked-in/onhold customers-->
<div class="modal fade" id="view-status-user" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Customer Info</h4>
			</div>
			<div class="modal-body">
				<form role="form" name="status-form" id="status-form" action="#" method="post" enctype="multipart/form-data">
					<label for="staus-select" class="p-t-10">Check-In Type</label>
					<div class="fg-line"> 
                        <select class="selectpicker" id="status-input-type" disabled>
                            <option value="guest" id="status-input-guest">Local Reservation</option>
                            <option value="reserved" id="status-input-reserved">Online Reservation</option>
                        </select>
					</div>
					<div class="m-t-10 fg-line">
						<input type="text" class="input-sm form-control" id="status-input-name" 
							placeholder="John Doe" disabled required>
					</div>
					<div class="m-t-10 fg-line">
						<input type="text" class="input-sm form-control" id="status-input-reservation-id"
							placeholder="ID" Disabled>
					</div>
					<div class="m-t-10 row">
						<div class="col-sm-6">
							<select class="selectpicker" id="status-server-list" data-live-search="true">
								<?php
									foreach ($servers as $row):
										$disabled = ($row->status == 0) ? "disabled":"";
										echo "<option id='status-server-list-".$row->user_id."' value='".$row->user_id."' ".$disabled.">".$row->name."</option>";
									endforeach;
								?>
							</select>
						</div>
						<div class="col-sm-6">
							<select class="selectpicker" id="status-table-list" data-live-search="true" multiple required>
								
							</select>
						</div>
					</div>
					<div class="row m-t-10">
						<div class="col-sm-6">
							<input type="number" class="input-sm form-control" id="status-input-customer-size"
								placeholder="Customer Size; eg 2" min="1"/>
						</div>
						<div class="col-sm-6">
                            <div class="input-group form-group">
                                <span class="input-group-addon"><i class="md md-access-time"></i></span>
                                <div class="dtp-container dropdown fg-line">
									<input type='text' id="status-input-turn-time" class="form-control" data-format="hh:mm:ss" data-toggle="dropdown" value="01:00:00" placeholder="Turn Time">
								</div>
							</div>
                        </div>
					</div>
					<label for="staus-select" class="">Notes</label>
					<div class="fg-line">
						<input type="textarea" class="input-sm form-control" id="status-input-notes"
							placeholder="I want a cup of coffee"/>
					</div>
					
					
					<label for="staus-select" class="p-t-10">Arrival Time</label>
					<div class="m-t-10 row">
						<div class="col-sm-6">
                            <div class="input-group form-group">
                                <span class="input-group-addon"><i class="md md-event"></i></span>
                                <div class="dtp-container dropdown fg-line">
                                <input type='text' id="status-input-date" class="form-control date-picker" value="<?php echo date("Y-m-d");?>" data-date-format='YYYY-MM-DD' data-toggle="dropdown" placeholder="Select Date">
								</div>
                            </div>
                        </div>     
                        <div class="col-sm-6">
                            <div class="input-group form-group">
                                <span class="input-group-addon"><i class="md md-access-time"></i></span>
                                <div class="dtp-container dropdown fg-line">
                                <input type='text' id="status-input-time" class="form-control time-picker" value="<?php echo date("h:i A");?>" data-toggle="dropdown" placeholder="Select Time">
                            </div>
							</div>
                        </div>
					</div>
					<label for="staus-select" class="p-t-10">Update Status</label>
					<div class="fg-line"> 
                        <select class="selectpicker" id="status-input-status">
							<option value="2" id="status-input-checkedin">Seated</option>
							<option value="3" id="status-input-completed">Completed</option>
                            <option value="1" id="status-input-waiting">Waiting</option>
                            <option value="0" id="status-input-onhold">On Hold</option>
                        </select>
					</div>
					<input type="hidden" id="status-getReservationId" /> 
					<input type="hidden" id="status-getTableIds" /> 
					<input type="hidden" id="status-getNotes" /> 
				</form>
			</div>
			<div class="modal-footer">
				<button id="save-status-data" type="button" class="btn btn-link">Save changes</button>
				<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>