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