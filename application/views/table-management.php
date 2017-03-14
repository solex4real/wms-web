<!-- Header -->
<?php $this->load->view('header');  ?>

<section id="content">
	<div class="container">
		
		<div class="row">
			<div class="col-sm-4 menu-list">
				<div class="row card text-center m-10">
					<div class="card-body">
						<ul class="tab-nav tn-justified tn-icon" role="tablist">
                            <li role="presentation" class="active">
                                <a class="col-sx-4" href="#tab-1"  id="tab-view-1"  data-view-id="res-view" aria-controls="tab-1" role="tab" data-toggle="tab">
                                    <i class="md md-local-restaurant icon-tab"></i>
                                </a>
                            </li>
                            <li role="presentation">
                                <a class="col-xs-4" href="#tab-2" id="tab-view-2" data-view-id="edit-view" aria-controls="tab-2" role="tab" data-toggle="tab">
                                    <i class="md md-mode-edit icon-tab"></i>
                                </a>
                            </li>
                            <li role="presentation">
								<a class="col-xs-4" href="#tab-3" id="tab-view-3" data-view-id="info-view" aria-controls="tab-3" role="tab" data-toggle="tab">
									<i class="md md-query-builder icon-tab"></i>
								</a>
                            </li>
                        </ul>
						
						<div class="tab-content" id="draggable-container">
						
							<div role="tabpanel" class="tab-pane animated fadeIn in active" id="tab-1" >
								<?php $this->load->view('reservation-tab-management');  ?>
							</div>
							<div role="tabpane2" class="tab-pane animated fadeIn" id="tab-2">
								<div class=" listview" >
									<div class="p-20 lv-body c-overflow row-fluid table-list-panel">
										<button class="btn btn-default m-t-10" onclick="addSection()" id="add-edit-section"><i class="md md-add "></i> Add Section</button>
										<div class=" z-depth-1">
												<h2 class="lead m-r-20">Tables</h2>
											<div class="row m-p-10">
												<img class="m-r-20" src="<?= base_url();?>wms/images/icons/table-large.png" alt="logo" width="40" height="40" />
												<button class="m-l-20 btn btn-primary" type="button" data-target="#table-list" data-toggle="collapse" data-toggle="table-list" aria-expanded="true" aria-controls="table-list">Show</button>
											</div>
											<div class="collapse row" id="table-list">
												<?php $this->load->view('table-types');  ?>
											</div>
										</div>
									</div>
									
								</div>
								
							</div>
							<div role="tabpane3" class="tab-pane animated fadeIn" id="tab-3">
								<div class="listview">
									<div class="p-20 lv-body c-overflow row-fluid table-list-panel">
									</div>
								</div>
							</div>
						
						</div>
					
					</div>
					
					
					
				</div>
			</div>
			<div id="res-view" class="col-sm-8 listview" data-isShown=false>
				<div id="static-table-container" class="table-container lv-body c-overflow">
					<?php
						foreach($sections as $row){
							echo "<div id='static-block-".$row->section_id."' >";
							echo "<div class='block-header p-t-20 p-static'>";
							echo "<h2>".$row->section_name."</h2></div>";
							echo "<div class='card'>";
							echo "<div id='static-section-".$row->section_id."' data-section-id='".$row->section_id."' 
							class='card ui-widget-header droppable-layout custom-droppable bgm-gray'>";
							echo "</div></div>";
							echo "</div>";
						}
					?>
				</div>
			</div>
			<div id="edit-view" class="col-sm-8 listview"  style="display: none;" data-isShown=false>
				<div class="pull-right p-static">
					<img id="delete-table" src="<?= base_url();?>wms/images/icons/bin-icon.png" class="droppable-layout" width="40" height="40"></img>
				</div>
				<div id="section-table-container" class="table-container lv-body c-overflow">
					<?php
						foreach($sections as $row){
							echo "<div id='section-block-".$row->section_id."' >";
							echo "<div class='block-header p-t-20 p-static'>";
							echo "<h2><a class='md md-mode-edit c-gray' 
							onclick=\"editSection('".$row->id."','".$row->section_name."','".$row->section_id."')\"></a>".$row->section_name."</h2></div>";
							echo "<div class='card'>";
							echo "<div id='droppable-".$row->section_id."' data-section-id='".$row->section_id."' 
							class='card droppable-layout custom-droppable bgm-gray'>";
							echo "</div></div>";
							echo "</div>";
						}
					?>
				</div>
			</div>
			<div id="info-view" class="m-t-10 col-sm-8" style="display: none;" data-isShown=false>
				<div class="schedule-container ">
					<div id="schedule-cal"></div>
				</div>
			</div>
			<!-- Modal Views -->
			<?php $this->load->view('res-modal-views');  ?>
		</div>
	</div>

</section>
</section>


<?php $this->load->view('footer');?>

<script
	src="<?= base_url();?>material/vendors/nicescroll/jquery.nicescroll.min.js"></script>
<script 
	src="<?= base_url();?>material/vendors/auto-size/jquery.autosize.min.js"></script>
<script 
	src="<?= base_url();?>material/vendors/bootstrap-select/bootstrap-select.min.js"></script>
<script src="<?= base_url();?>material/vendors/input-mask/input-mask.min.js"></script>
<script src="<?= base_url();?>material/vendors/farbtastic/farbtastic.min.js"></script>
<script src="<?= base_url();?>material/vendors/summernote/summernote.min.js"></script>
<script
	src="<?= base_url();?>material/vendors/fullcalendar/fullcalendar.min.js"></script>
<script src="<?= base_url();?>material/vendors/waves/waves.min.js"></script>
<script src="<?= base_url();?>material/vendors/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
<script
	src="<?= base_url();?>material/vendors/bootstrap-growl/bootstrap-growl.min.js"></script>
<script
	src="<?= base_url();?>material/vendors/sweet-alert/sweet-alert.min.js"></script>
<script 
src="<?= base_url();?>material/vendors/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js"></script>
<script src="<?= base_url();?>material/js/functions.js"></script>
<script src="<?= base_url();?>material/js/demo.js"></script>


<link href="<?= base_url();?>wms/css/jquery-ui.css" rel="stylesheet">
<script src="<?= base_url();?>wms/js/jquery-ui.js"></script>

<script src="<?= base_url();?>wms/js/jquery-ui-rotate.js"></script>

<!-- Drag and drop events for tuch screen devices-->
<script src="<?= base_url();?>wms/js/jquery-ui-touch-punch-master/jquery.ui.touch-punch.js"></script>
<script src="<?= base_url();?>wms/js/jquery-ui-touch-punch-master/jquery.ui.touch-punch.min.js"></script>



<link href="<?= base_url();?>wms/css/jquery.ui.rotatable.css" rel="stylesheet">
<link href="<?= base_url();?>wms/css/css-percentage-circle-master/css/circle.css" rel="stylesheet">

	
<script type="text/javascript">
//Define Global parameters
var tables = [];
var droppable = "";
var droppable_params = {};
var action_performed = false;
var draggable_array_id = [];
var current_list_tables = []; //Id list for table progress bar
var waiting_list_customers = []; //Id list for customers on waiting list
var current_list_customers = []; //Id list for current/seated customers
var assignment_list_servers = []; //Id list of server assignment for tables and customers
var onhold_list_customers = []; //Id list for cust onhold
var currentid = 0;	//Current table id
var draggable_action = function(){
	if(!action_performed){
		var table_id = $(this).data("table-id");
		var id = $(this).data('id');
		var draggable = $(this);
		document.getElementById("edit-table-id").setAttribute('value',table_id);
		$('#change-table-id').modal('show');
		$('#edit-table-save-changes').unbind('click').bind('click', function(){
			new_id = $('#edit-table-id').val();
			if(new_id==table_id){
				$('#change-table-id').modal('hide');
			}else if(!$.trim(new_id).length){
				$('#edit-table-id').parent().addClass('has-error');
			}else if(!draggable_id_exist(new_id)){
				var data = [{'id':id,'table_id':new_id}];
				updateTable(data);
				draggable.find('a').text(new_id);
				var index = draggable_array_id.indexOf(table_id);
				draggable_array_id[index] = new_id;
				$('#change-table-id').modal('hide');
			}else{
				$('#edit-table-id').parent().addClass('has-error');
			}
		});
		//console.log($(this));
	}
}

//Show and hide section layout (preview tab)
var sec_list = document.getElementById("sec_list");
$('#sec_list').change(function() {
	var list = $(this).val();
	var list_val = [];
	for(i = 0;i < list.length; i++){
		//Show section layout
		$('#static-block-'+list[i]).show();
		list_val.push(list[i]);
	}
	for(i = 0;i < sec_list.length;i++){
		if(list_val.indexOf(sec_list[i].value) < 0){
			//Hide section layout
			$('#static-block-'+sec_list[i].value).hide();
		}
	}
});

var table_info_modal = function(){
	var table_div = $(this);
	//console.log(table_div.data());
	var table_id = table_div.data('table-id');
	var section_id = table_div.data('section-id');
	var table_status = table_div.data('status');
	var table_old_status = table_div.data('status');
	document.getElementById("table-info-table-id").setAttribute('value',table_id);
	document.getElementById("table-info-section-id").setAttribute('value',section_id);
	//Show upcoming reservation times
	upcoming_reservations = table_div.data('upcoming-reservations');
	console.log(upcoming_reservations);
	$('#table-info-upcoming-res').html("<p>None</p>");
	if(upcoming_reservations != null){
		upcoming_reservations = upcoming_reservations.split(',');
		len = upcoming_reservations.length;
		div_upcoming = "";
		for(i = 0;i < len; i++){
			div_upcoming += "<div class='chip'>"+moment(new Date(upcoming_reservations[i])).format("hh:mm A, MMMM Do YYYY")+"</div>";
		}
		$('#table-info-upcoming-res').html(div_upcoming);
	}
	
	
	//Get table info
	var isOccupied = table_div.data('is-occupied');
	if(isOccupied){
		$('#table-info-reservation').show();
		//Customer info
		progressBar = table_div.children("div:first").
			children("div:first").children("div:first").children("div:first");
		var customer_name = progressBar.data('customer-name');	
		var server_name = progressBar.data('server-name');	
		var turn_time = progressBar.data('turn-time-val');
		turn_time = new Date(turn_time);
		turn_time = moment(turn_time).format('YYYY-MM-DD HH:mm a');
		//display info on modal
		document.getElementById("table-info-customer-name").setAttribute('value',customer_name);
		document.getElementById("table-info-server-name").setAttribute('value',server_name);
		document.getElementById("table-info-turn-time").setAttribute('value',turn_time);
		$("#table-info-status").val(2).change();
	}else{
		$('#table-info-reservation').hide();
		$("#table-info-status").val(table_status).change();
	}
	$('#view-table-info').modal('show');
	//on click save button
	$("#save-table-data-info").unbind('click').bind('click', function(){
		table_status = $("#table-info-status").val();
		table_div.data('status',table_status);
		//update table
		updateTable([{'id':table_div.data('id'),'status':table_status}]);
		//Status color array
		status_color = ['bgm-bluegray','bgm-teal','bgm-green','bgm-orange','bgm-deeporange'];
		//Change background of table if empty
		table_div.removeClass(status_color[parseInt(table_old_status)]).
		addClass(status_color[parseInt(table_status)]);
		if(table_div.data('is-occupied')){
			if(table_status != "2"){
				//Remove progress bar from
				table_div.children("div:first").
				children("div:first").children("div:first").remove();
				//Set is occupied to false
				table_div.data('is-occupied',false);
				//Change color of table
				table_div.removeClass('bgm-green').addClass(status_color[table_status]);
				table_div.children("div:eq(1)").removeClass('bgm-green').addClass(status_color[table_status]);
			}
		}else{
			table_div.removeClass(status_color[parseInt(table_old_status)]).addClass(status_color[table_status]);
			table_div.children("div:eq(1)").removeClass(status_color[table_old_status]).addClass(status_color[table_status]);
			/*
			table_div.children("div:first").removeClass(status_color[parseInt(table_old_status)]).
			addClass(status_color[table_status]);
			*/
			table_div.data('is-occupied',false);
		}
		$('#view-table-info').modal('hide');
	});
}

//Check if draggable table exist
function draggable_id_exist(id){
	val = $.inArray(parseInt(id), draggable_array_id);
	if(val==-1){
		//alert("Val: "+val+" id: "+id+" array: "+draggable_array_id);
		return false;
	}
	return true;
}

 $(document).ready( function() {
	//Load content based on shown tab
	$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
		currentTab = $(e.target);//.attr('id');
		prevTab = $(e.relatedTarget);//.attr('id');
		//console.log($(e.target).attr('id'));
		//console.log(e.relatedTarget.id);
		//console.log(prevTab.data('view-id'));
		var prevDiv = document.getElementById(prevTab.data('view-id'));
		var currentDiv = document.getElementById(currentTab.data('view-id'));
		var idDiv  = currentTab.data('view-id');
		prevDiv.style.display = 'none';
		currentDiv.style.display = 'block';
		isShown = ($('#'+idDiv).attr('data-isShown')=='false') ? false:true;
		//Load data if view is not loaded
		if(!isShown){
			switch(idDiv){
				case 'res-view':
					//Show static tables
					showTables();
					break;
				case 'edit-view':
					//Show Editable tables
					showEditTables();
					break;
				case 'info-view':
					//Show reservation scheduling info
					loadSchedule();
					break;
			}
			$('#'+idDiv).attr('data-isShown',true);
			//console.log($('#'+idDiv).attr('data-isShown'));
		}
	});
	//Parameters for rotation
	 var params = {
        // Callback fired on rotation start.
        start: function(event, ui) {	
			console.log("Rotating started");
        },
        // Callback fired during rotation.
        rotate: function(event, ui) {
			action_performed = true;
			console.log("Rotating");
        },
        // Callback fired on rotation end.
        stop: function(event, ui) {
			action_performed = false;
			console.log("Rotating Stopped");
        },
        // Set the rotation center at (25%, 75%).
        rotationCenterX: 50.0, 
        rotationCenterY: 50.0
    };
        //$('#target').rotatable(params);
	

	//Draggable Parameters
	var draggable_params = { 
		revert: "invalid",
		helper: 'clone',
		appendTo: 'body',
		scroll: false
	};
	//Draggable initialization
    $( "#draggable-diamond-two" ).draggable(draggable_params);
	$( "#draggable-diamond" ).draggable(draggable_params);
	$( "#draggable-circle-eight" ).draggable(draggable_params);
	$( "#draggable-circle-one" ).draggable(draggable_params);
	$( "#draggable-circle-two" ).draggable(draggable_params);
	$( "#draggable-circle-three" ).draggable(draggable_params);
	$( "#draggable-circle-four" ).draggable(draggable_params);
	$( "#draggable-circle-five" ).draggable(draggable_params);
	$( "#draggable-circle-six" ).draggable(draggable_params);
	$( "#draggable-circle-eight" ).draggable(draggable_params);
	$( "#draggable-square-four" ).draggable(draggable_params);
	$( "#draggable-square-two" ).draggable(draggable_params);
	$( "#draggable-square-one" ).draggable(draggable_params);
	$( "#draggable-square-mid-four" ).draggable(draggable_params);
	$( "#draggable-square-eight" ).draggable(draggable_params);
	$( "#draggable-rectangle-six" ).draggable(draggable_params);
	$( "#draggable-rectangle-eight" ).draggable(draggable_params);
	$( "#draggable-rectangle-eight-large" ).draggable(draggable_params);
	$( "#draggable-rectangle-ten" ).draggable(draggable_params);
	
	current_droppable = droppable;
	var rotationAngle = 0;
	droppable_params = {
		//accept: '.ui-widget-content',
		classes: {
			//"ui-droppable-active": "ui-state-active",
			//"ui-droppable-hover": "ui-state-hover"
		},
      drop: function( event, ui ) {
		$(ui.draggable).css("position", "none");
        //$( this ).find( "p" ).html( "Dropped!" );
			$.ui.ddmanager.current.cancelHelperRemoval = true;
			droppable = $(this);
			//Draggable click action
			$(ui.helper).unbind('mouseup').bind('mouseup', draggable_action);
			
			//Draggable initialization
			$(ui.helper).draggable({
				start: function(event, ui){
					action_performed = true;
				},
				//stack: "#droppable",
				revert: "invalid",
				stop: function(event,ui) {
					if($(ui.helper).data("element-dropped")!=false||$(ui.helper).data("element-dropped")!=undefined){
						
						left = ui.offset.left - droppable.offset().left;
						top = ui.offset.top - droppable.offset().top;
						var data = [{'id':$(ui.helper).data("id"),
							'top_pos':top,'left_pos':left
						}];
						//console.log("Top: "+top+" Left: "+left+" Table ID: "+(ui.helper).data("table-id"));
						updateTable(data);
						action_performed = false;
					}
				}
			});
			$(ui.helper).rotatable({
				start: function(event, ui) {
					action_performed = true;
				},
				stop: function(event, ui) {
					rotationAngle = (ui.angle.current* 180/Math.PI);
					var data = [{'id':ui.element.data("id"),
						'orientation':rotationAngle}];
					updateTable(data);
					action_performed = false;
				}
			});
			
			$(ui.helper).resizable({
				aspectRatio: true,
				resize: function(event1, ui1) {
					action_performed = true;
					$(this).css({
						'top': parseInt(ui1.position.top, 10) + ((ui1.originalSize.height - ui1.size.height)) / 2,
						'left': parseInt(ui1.position.left, 10) + ((ui1.originalSize.width - ui1.size.width)) / 2
					});
				},
				stop: function(event){
					action_performed = false;
					//height of table
					var h = $(ui.helper).height();
					var w = $(ui.helper).width();
					//Original height
					var h2 = $("#"+$(ui.helper).data("type")).height();
					var w2 = $("#"+$(ui.helper).data("type")).width();
					var size_h  = h/h2;
					var size_w  = w/w2;
					var data = [{'id':$(ui.helper).data("id"),
						'size_h':size_h.toFixed(7), 'size_w':size_w.toFixed(7)
					}];
					updateTable(data);
				}
			});
			var left = ui.offset.left - $(this).offset().left;
			var top = ui.offset.top - $(this).offset().top;
			if($(ui.helper).data("element-dropped")==false||$(ui.helper).data("element-dropped")==undefined){
				currentid++;
				//console.log(currentid);
				var result = addTable(currentid,ui.draggable.attr("id"),
				$(ui.helper).data("num-chairs"),top,left,"1",getRotationDegrees($(ui.helper)),$(this).data("section-id"));
				$(ui.helper).data("table-id",currentid);
				$(ui.helper).data("id",result.id);
				$(ui.helper).data("type",ui.draggable.attr("id"));
				$(ui.helper).data("element-dropped", true);
				//ui.draggable.attr("id","table-id-"+result.id);
				$(ui.helper).attr("id","table-id-"+result.id);
				//add draggable id to array
				draggable_array_id.push(currentid);
				//console.log("Current: "+currentid);
				//Table info data display
				var table_data = 
				"<div class='row res-info-area' >"+
				"<div class='vmiddle'>"+
				"<a class='col-sm-12 text-center' >"+currentid+"</a>"+
				"</div></div>";
				$(ui.helper).prepend(table_data);
				$(ui.helper).css({'position': 'absolute', 'top': 
				top, 'left': left});
				$(this).append($(ui.helper));
				//console.log($(ui.helper).parent());
				//$(this).append($(ui.helper));
				//$(this).append(ui.draggable);
				//droppable.append($(ui.helper));
			}
			nodeid = ui.draggable.data("noteid");
			val = "";
			type = "";
			//updateTable(nodeid,type,val,top,left);
			
      }
    }

	//Load Current Reservations
	loadReservations();
	loadInLineCustomers();
	loadServerAssignment();
	loadOnholdCustomers();
	
	$("#delete-table").droppable({
		accept: function (elm) {
			if (elm.data("element-dropped")==false||elm.data("element-dropped")==undefined)
				return false;
			return true;
		},
		classes: {
			//"ui-droppable-active": "ui-state-active",
			//"ui-droppable-hover": "ui-state-hover"
		},
		over: function(event, ui) {
			delete_table($(ui.helper).data("table-id"));
			/*
			$(ui.helper).removeAttr('class');
			var animation = 'rotateOutUpRight';
            $(ui.helper).addClass('animated '+animation);
            var animationDuration = 1200; 
			
            setTimeout(function(){
                //cardImg.removeClass(animation);
            }, animationDuration);
			*/
			ui.draggable.remove();
        }
	});
	
  } );
  
function updateTable(data){
	data = JSON.stringify(data);
	$.ajax({
		url:"<?php echo base_url();?>"+"table_management/update_table",
		type: 'POST',
		ContentType: 'application/json',
		data: {'data':data,
			'<?php echo $this->security->get_csrf_token_name(); ?>': 
		'<?php echo $this->security->get_csrf_hash(); ?>'},
		success: function (json){
			console.log(json);
		},
		error: function (request, ajaxOptions, thrownError) {
			console.log(request.responseText);
		}
	}); 
}


 function showTables(){
	 //load restaurant tables
	$.ajax({
		url:"<?php echo base_url();?>"+"table_management/get_preview_tables",
		type: 'POST',
		ContentType: 'application/json',
		data: {'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'},
		success: function (json){
			//console.log(json);
			json = JSON.parse(json);
			var len = json.length;
			var droppable_id = "";
			var section_div = "";
			tables = json;
			var sectionContainer = document.getElementById("static-table-container");
			//Clear droppable containner
			$('#static-table-container').find('.droppable-layout').each( function(){
				$(this).html("");
			});
			for (i = 0; i < len; i++) {
				//Setup droppable
				if(droppable_id != json[i].section_id){
					droppable_id = json[i].section_id;
					droppable = $("#static-section-"+droppable_id).droppable();
				}
				//console.log(json[i]);
				rotationAngle = parseInt(json[i].orientation);
				//Original height
				var h = $("#"+json[i].type).outerHeight();
				var w = $("#"+json[i].type).outerWidth();
				var cloned = $("#"+json[i].type ).clone().css({'position': 'absolute', 'top': 
				parseInt(json[i].top_pos), 'left': parseInt(json[i].left_pos),
				'height':(h*parseFloat(json[i].size_h)),'width':(w*parseFloat(json[i].size_w)),
				'-webkit-transform'	: 'rotate('+rotationAngle+'deg)', /* Safari and Chrome */
				'-moz-transform': 'rotate('+rotationAngle+'deg)',   /* Firefox */
				'-ms-transform': 'rotate('+rotationAngle+'deg)',   /* IE 9 */
				'-o-transform': 'rotate('+rotationAngle+'deg)',   /* Opera */
				'transform': 'rotate('+rotationAngle+'deg)'
				});
				//Define table id
				var idType = (json[i].res_type == 'guest') ? "a":"";
				cloned.attr('id','res-table-id-'+json[i].table_id+idType);
				cloned.data({
					 'section-id':json[i].section_id,'id':json[i].id,'res-id':json[i].res_id,
					'table-id':json[i].table_id,'status':json[i].status,
					'arrival-time':json[i].arrival_time,'server-name':json[i].server_name,
					'customer-name':json[i].customer_name, 'reservation-id':json[i].reservation_id,
					'turn-time-val':json[i].turn_val, 'upcoming-reservations':json[i].upcoming,
					'customer-type':json[i].res_type
					
				});
				//Table info data display
				var table_data = 
				"<div class='row res-info-area' >"+
				"<div class='vmiddle'>"+
				"<a class='col-sm-12 text-center' >"+json[i].table_id+"</a>";
				if(json[i].reservation_id==undefined||json[i].reservation_id==''){
					table_data += "</div></div>";
					var class_atrr = "";
					/*
					Change color based on status
					0 - unavailable : blue gray
					1 - available : teal
					2 - occupied : green
					3 - needs cleaning/check table : orange 
					4 - closed : deep orange
					*/
					//Status color array
					status_color = ['bgm-bluegray','bgm-teal','bgm-green','bgm-orange','bgm-deeporange'];
					//Change background of table if empty
					cloned.removeClass('bgm-green').addClass(status_color[json[i].status]);
					cloned.children("div:first").removeClass('bgm-teal').addClass(status_color[json[i].status]);
					cloned.data('is-occupied',false);
				}else{
					//Add data for tables that are occupied
					var turn_data = get_turn_time_percent(json[i].arrival_time,json[i].turn_time_val);
					table_data +=
					"<div class='res-progress progress text-center' >"+
					"<div class='progress-bar progress-bar-info' role='progressbar' data-arrival-time='"+json[i].arrival_time+
					"' data-customer-name='"+json[i].customer_name+"'"+" data-server-name='"+json[i].server_name+"' "+
					" data-reservation-id='"+json[i].reservation_id+"'"+
					" data-turn-time-val='"+json[i].turn_time_val+"'"+
					"' aria-valuenow='20' aria-valuemin='0' aria-valuemax='100' style='width: "+turn_data.ratio+"%'></div>"+
					"</div>"+
					//"<small class='c-gray col-sm-12 text-center'>3</small>"+
					"</div></div>";
					cloned.data('is-occupied',true);
					cloned.removeClass('bgm-green').addClass('bgm-green');
					cloned.children("div:first").removeClass('bgm-teal').addClass('bgm-green');
					//Add table to current tables in use list
					current_list_tables.push(cloned.attr('id'));
				}
				
				//Enable clickable event for table div
				cloned.click(table_info_modal);
				//Add info data to cloned table div 
				cloned.prepend(table_data);
				//Add cloned table div to droppable table section
				droppable.append(cloned);
			}
		},
		error: function (request, ajaxOptions, thrownError) {
			console.log(request.responseText);
		}
	});	
 }
 showTables();
 
 //Update table status based on time lapse
 var refreshRate = 3; //one minute interval
 var a = 0;
 var resCounter = setInterval(function(){ 
	//Count down for tables
	len = current_list_tables.length;
	for(i = 0;i < len;i++){
		table_div = $('#'+current_list_tables[i]);
		if(table_div.data('is-occupied')){
			//Customer info
			progressBar = table_div.children("div:first").
			children("div:first").children("div:first").children("div:first");
			arrival_time = progressBar.data('arrival-time');
			turn_time = progressBar.data('turn-time-val');
			var time_data = get_turn_time_percent(arrival_time,turn_time);
			//Begin progress bar
			b = $('#'+current_list_tables[i]).children("div:first").
			children("div:first").children("div:first").children("div:first");
			b.css({'width':time_data.ratio+'%'});
			if(time_data.ratio >= 100){
				table_div.data('is-occupied',false);
				if(table_div.data('customer-type') == "reserved"){
					data =[{'id':table_div.data('res-id'),'status':3}]; 
					console.log(data);
					reservationChanged(JSON.stringify(data));
				}else{
					data =[{'id':table_div.data('res-id'),'status':3}];
					console.log(data);
					guestReservationChanged(JSON.stringify(data));
				}
				//guestReservationChanged
			}
		}else{
			//Remove progress bar from
			$('#'+current_list_tables[i]).children("div:first").
			children("div:first").children("div:first").remove();
			//Change color of table
			$('#'+current_list_tables[i]).removeClass('bgm-green').addClass('bgm-orange');
			$('#'+current_list_tables[i]).children("div:eq(1)").removeClass('bgm-green').addClass('bgm-orange');
			//Set is occupied to false
			table_div.data('is-occupied',false);
			table_div.data('status',3);
			//Remove from list
			var index = current_list_tables.indexOf(table_div.attr('id'));
			if (index > -1) {
				//update on database as completed
				switch(table_div.data('customer-type')){
					case "guest":
						data = [{'id':table_div.data('res-id'),'status':3}];
						guestReservationChanged(JSON.stringify(data));
						break;
					case "reserved":
						data = [{'id':table_div.data('res-id'),'status':3}];
						reservationChanged(JSON.stringify(data));
						break;
				}
				//Remove from current list of table ids
				current_list_tables.splice(index, 1);
			}
			//update on database on complete reservation
			
		}
	}
	
	//Count down for current customers sitted
	len = current_list_customers.length;
	//Create new list for current customers
	new_current_list_customers = current_list_customers;
	//console.log(new_current_list_customers);
	for(i = 0;i < len;i++){
		b = $('#'+current_list_customers[i]);
		arrival_time = b.data('arrival-time');
		turn_time = b.data('turn-time-val');
		var time_data = get_turn_time_percent(arrival_time,turn_time);
		//console.log({'arrival: ':arrival_time,'turn time: ':turn_time});
		b.find('span').html(time_data.minutes+"M");
		b.find('span').parent().removeClass().addClass('c100 p'+time_data.ratio+' tiny');
		//Remove customer from list if completed
		if(time_data.minutes==0){
			index = new_current_list_customers.indexOf(current_list_customers[i]);
			if(index > -1){
				new_current_list_customers.splice(index,1);
			}
			var idType = (b.data('customer-type') == 'guest') ? "a":"";
			//console.log(b.data());
			//Remove from server assignment list view
			$('#server-assignment-customer-'+b.data('user-id')+idType).remove();
			//Remove from current/seated customer list view
			b.remove();
		}
	}
	//Update current customer list
	current_list_customers = new_current_list_customers;

	//Countdown for costumers on wait list
	len = waiting_list_customers.length;
	for(i = 0;i < len; i++){
		var now  = moment().format("DD/MM/YYYY HH:mm:ss");
		var then = $('#'+waiting_list_customers[i]).data('arrival-time');

		var ms = moment(now,'DD/MM/YYYY HH:mm:ss').diff(moment(then,'YYYY-MM-DD HH:mm:ss'));
		var d = moment.duration(ms);
		var s = Math.floor(d.asHours()) + moment.utc(ms).format(":mm:ss");
		b = $('#'+waiting_list_customers[i]).children("div:first").children("div:eq(1)").children("small:first");
		b.html("Wait Time: "+s);
	}
	
	//Countdown for costumers onhold
	len = onhold_list_customers.length;
	for(i = 0;i < len; i++){
		var now  = moment().format("DD/MM/YYYY HH:mm:ss");
		var then = $('#'+onhold_list_customers[i]).data('reservation-time');

		var ms = moment(now,'DD/MM/YYYY HH:mm:ss').diff(moment(then,'YYYY-MM-DD HH:mm:ss'));
		var d = moment.duration(ms);
		var s = Math.floor(d.asHours()) + moment.utc(ms).format(":mm:ss");
		b = $('#'+onhold_list_customers[i]).children("div:first").children("div:eq(1)").children("small:first");
		b.html("Hold Time: "+s);
	}
	
 },1000*refreshRate);
 
 function showEditTables(){
	 //load restaurant tables
	$.ajax({
		url:"<?php echo base_url();?>"+"table_management/get_tables",
		type: 'POST',
		ContentType: 'application/json',
		data: {'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'},
		success: function (json){
			//console.log(json);
			json = JSON.parse(json);
			var len = json.length;
			var droppable_id = "";
			var section_div = "";
			var sectionContainer = document.getElementById("section-table-container");
			//setup droppable containner
			$('#section-table-container').find('.droppable-layout').each( function(){
				$(this).droppable(droppable_params);
			});
			for (i = 0; i < len; i++) {
				//get droppable
				if(droppable_id != json[i].section_id){
					droppable_id = json[i].section_id;
					droppable = $("#droppable-"+droppable_id);
				}
				rotationAngle = parseInt(json[i].orientation);
				//console.log("Orientation: "+rotationAngle);
				//Original height
				var h = $("#"+json[i].type).outerHeight();
				var w = $("#"+json[i].type).outerWidth();
				var cloned = $("#"+json[i].type ).clone().css({'position': 'absolute', 'top': 
				parseInt(json[i].top_pos), 'left': parseInt(json[i].left_pos),
				'height':(h*parseFloat(json[i].size_h)),'width':(w*parseFloat(json[i].size_w))
				});
				//console.log({'height':h*parseFloat(json[i].size),'width':w*parseFloat(json[i].size)});
				var draggable = cloned.draggable({
					revert: "invalid",
					aspectRatio: true,
					start: function(event, ui){
						action_performed = true;
					},
					resize: function(event1, ui1) {
						action_performed = true;
						$(this).css({
							'top': parseInt(ui1.position.top, 10) + ((ui1.originalSize.height - ui1.size.height)) / 2,
							'left': parseInt(ui1.position.left, 10) + ((ui1.originalSize.width - ui1.size.width)) / 2
						});
					},
					stop: function(event, ui){
						action_performed = false;
					}
				}).resizable({
					revert: "valid",
					aspectRatio: true,
					stop: function(event, ui){
						action_performed = false;
						//height of table
						var h = $(ui.helper).outerHeight();
						var w = $(ui.helper).outerWidth();
						//Original height
						var h2 = $("#"+$(ui.helper).data("type")).outerHeight();
						var w2 = $("#"+$(ui.helper).data("type")).outerWidth();
						var size_h  = h/h2;
						var size_w  = w/w2;
						var data = [{'id':$(ui.helper).data("id"),
							'size_h':size_h.toFixed(7), 'size_w':size_w.toFixed(7)
						}];
						updateTable(data);
					},
					resize: function(event, ui) {
					action_performed = true;
					$(this).css({
						'top': parseInt(ui.position.top, 10) + ((ui.originalSize.height - ui.size.height)) / 2,
						'left': parseInt(ui.position.left, 10) + ((ui.originalSize.width - ui.size.width)) / 2
					});
					}
				}).rotatable({
					angle: rotationAngle*Math.PI/180,
					start: function(event, ui) {
						action_performed = true;
					},
					stop: function(event, ui) {
						action_performed = false;
						rotationAngle = (ui.angle.current* 180/Math.PI);
						var data = [{'id':ui.element.data("id"),
							'orientation':rotationAngle}];
						updateTable(data);
					},
					wheelRotate: false
				});
				draggable.data("element-dropped", true);
				draggable.data("type", json[i].type);
				draggable.data("table-id", json[i].table_id);
				draggable.attr("id","table-id-"+json[i].id);
				//console.log(json[i].id);
				draggable.data("id", json[i].id);
				//Table info data display
				var table_data = 
				"<div class='row res-info-area' >"+
				"<div class='vmiddle'>"+
				"<a class='col-sm-12 text-center' >"+json[i].table_id+"</a>"+
				"</div></div>";
				draggable.prepend(table_data);
				//Clicked action for draggable
				draggable.unbind('mouseup').bind('mouseup', draggable_action);
				//add draggable to droppable
				droppable.append(draggable);
				//add draggable id to array
				draggable_array_id.push(parseInt(json[i].table_id));
				//droppable.droppable(droppable_params);
				
				if(json[i].table_id != undefined){
					currentid = parseInt(json[i].table_id);
				}
				
			}
		},
		error: function (request, ajaxOptions, thrownError) {
			console.log(request.responseText);
		}
	});	
 }
 
 function addSection(){
	 $('#add-section-name').modal('show'); 
	//Add Section on click Add
	$('#add-section-save-changes').unbind('click').bind('click', function(){
		var section_name = $('#new-section-name').val();
		$.ajax({
			async: false,
			url:"<?php echo base_url();?>"+"table_management/add_section",
			type: 'POST',
			ContentType: 'application/json',
			data: {'section_name':section_name,
				'<?php echo $this->security->get_csrf_token_name(); ?>': 
				'<?php echo $this->security->get_csrf_hash(); ?>'},
			success: function (json){
				json = JSON.parse(json);
				if(json.success){
					var div = 
						"<div id='section-block-"+json.section_id+"' >"+
						"<div class='block-header p-t-20 p-static'>"+
						"<h2><a class='md md-mode-edit c-gray' "+
						"onclick=\"editSection('"+json.id+"','"+section_name+"','"+json.section_id+"')\"></a>"+section_name+"</h2></div>"+
						"<div class='card'>"+
						"<div id='droppable-"+json.section_id+"' data-section-id='"+json.section_id+"'"+ 
						"class='card droppable-layout custom-droppable bgm-gray'>"+
						"</div></div>"+
						"</div>";
					$('#section-table-container').append(div);
				}
			},
			error: function (request, ajaxOptions, thrownError) {
				console.log(request.responseText);
			}
		});
		$('#add-section-name').modal('hide'); 
	});
 }
 
 function editSection(row_id,section_name,section_id){
	$('#change-section-name').modal('show'); 
	document.getElementById("edit-section-name").setAttribute('value',section_name);
	//console.log(row_id);
	//Edit Section Name
	$('#edit-section-save-changes').unbind('click').bind('click', function(){
		//Get new section name
		section_name = $('#edit-section-name').val();
		data = [{'id':row_id,'section_name':section_name}];
		data = JSON.stringify(data);
		$.ajax({
			async: false,
			url:"<?php echo base_url();?>"+"table_management/update_section",
			type: 'POST',
			ContentType: 'application/json',
			data: {'data':data,
				'<?php echo $this->security->get_csrf_token_name(); ?>': 
				'<?php echo $this->security->get_csrf_hash(); ?>'},
			success: function (json){
				var h2_div = "<a class='md md-mode-edit c-gray' onclick=\"editSection('"+section_id+"','"+section_name+"','"+row_id+"')\"></a>"+section_name;
				$('#section-block-'+section_id).find('h2').html(h2_div);
			},
			error: function (request, ajaxOptions, thrownError) {
				console.log(request.responseText);
			}
		});
		$('#change-section-name').modal('hide'); 
	});
	//Delete Section
	$('#edit-section-delete').unbind('click').bind('click', function(){
		//Delete Confirmation
         swal({   
            title: "Are you sure?",   
            text: "You will not be able to recover this section",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Yes, delete it!",   
            cancelButtonText: "No, cancel plx!",   
            closeOnConfirm: false,   
            closeOnCancel: false 
		}, function(isConfirm){   
            if (isConfirm) {     
				//Delete Section
				$.ajax({
					async: false,
					url:"<?php echo base_url();?>"+"table_management/delete_section",
					type: 'POST',
					ContentType: 'application/json',
					data: {'id':row_id,
						'<?php echo $this->security->get_csrf_token_name(); ?>': 
						'<?php echo $this->security->get_csrf_hash(); ?>'},
					success: function (json){
						$('#section-block-'+row_id).remove();
						swal("Deleted!", "Your section has been deleted.", "success"); 
					},
					error: function (request, ajaxOptions, thrownError) {
						console.log(request.responseText);
					}
				});
				$('#change-section-name').modal('hide'); 
            }
        });
	});
 }
 
 function loadSchedule(){
	cId = $('#schedule-cal');
	var events_data = {
		url: "<?= base_url();?>table_management/get_reservation_times",
		type: 'POST',
		data: {
			'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
			},
		success: function(json){
			//console.log(json);
		}
	};
	cId.fullCalendar({
		header: {
            right: '',
            center: 'prev, title, next',
            left: ''
		},
		 //Add Events
		eventSources: events_data,
        header: {
        right: '',
        center: 'prev, title, next',
        left: ''
        },

        theme: true, //Do not remove this as it ruin the design
        selectable: true,
        selectHelper: true,
        editable: false,
		defaultView: 'agendaDay'
	});
	cId.fullCalendar('render');
 }
 
 function addTable(table_id,type,num_chairs,top_pos,left_pos,size,orientation,section){
	/*
	 console.log("Table ID: "+table_id+" Type "+type+" Num Chairs "+num_chairs+
	 " Top Pos "+top_pos+" Left Pos "+left_pos+" Size "+size+" Section "+section);
	*/
	var result = [];
	$.ajax({
		async: false,
		url:"<?php echo base_url();?>"+"table_management/add_table",
		type: 'POST',
		ContentType: 'application/json',
		data: {'table_id':table_id,'type':type,'num_chairs':num_chairs,'orientation':orientation,
			'top_pos':top_pos,'left_pos':left_pos,'section':section,'size':size,
			'<?php echo $this->security->get_csrf_token_name(); ?>': 
		'<?php echo $this->security->get_csrf_hash(); ?>'},
		success: function (json){
			result = JSON.parse(json);
			console.log(json);
		},
		error: function (request, ajaxOptions, thrownError) {
			console.log(request.responseText);
		}
	});
	return result;
 }
 
 function delete_table(table_id){
	$.ajax({
		url:"<?php echo base_url();?>"+"table_management/delete_table",
		type: 'POST',
		ContentType: 'application/json',
		data: {'table_id':table_id,
			'<?php echo $this->security->get_csrf_token_name(); ?>': 
		'<?php echo $this->security->get_csrf_hash(); ?>'},
		success: function (json){
			//console.log(json);
		},
		error: function (request, ajaxOptions, thrownError) {
			console.log(request.responseText);
		}
	});
 }
 
 function getRotationDegrees(obj) {
  var matrix = obj.css("-webkit-transform") ||
  obj.css("-moz-transform")    ||
  obj.css("-ms-transform")     ||
  obj.css("-o-transform")      ||
  obj.css("transform");
  if(matrix !== 'none') {
    var values = matrix.split('(')[1].split(')')[0].split(',');
    var a = values[0];
    var b = values[1];
    var angle = Math.round(Math.atan2(b, a) * (180/Math.PI));
  } else { var angle = 0; }
  return (angle < 0) ? angle +=360 : angle;
}

//Load Current Reservations
function loadReservations(){
	$.ajax({
		url:"<?php echo base_url();?>"+"Reservations/get_current_reservations",
		type: 'POST',
		ContentType: 'application/json',
		data: {
			'<?php echo $this->security->get_csrf_token_name(); ?>': 
		'<?php echo $this->security->get_csrf_hash(); ?>'},
		success: function (json){
			//console.log(json);
			json = JSON.parse(json);
			len = json.length;
			//Add current reservations to list
			var listContainer = document.getElementById("current-reservation-list");
			//Clear div
			var div = "";
			listContainer.innerHTML = div;
			//Clear list
			current_list_customers = [];
			for (i = 0; i < len; i++) {
				//Define table id
				var idType = (json[i].type == 'guest') ? "a":"";
				var turn_time_data = get_turn_time_percent(json[i].arrival_time,json[i].turn_time_val);
				console.log(json[i]);
				//Define div
				div += 
				"<a id='current-reservation-"+json[i].reservation_id+idType+"' class='lv-item' data-user-id='"+json[i].user_id+"'"+
				"data-arrival-time='"+json[i].arrival_time+
				"' data-turn-time-val='"+json[i].turn_time_val+"'"+
				" data-customer-type='"+json[i].type+"'"+
				"data-customer-name='"+json[i].name+"'"+
				"data-reservation-id='"+json[i].reservation_id+"'"+
				"data-notes='"+json[i].notes+"'"+
				"data-server-id='"+json[i].server_id+"'"+
				"data-customer-size='"+json[i].customer_size+"'"+
				"data-turn-time='"+json[i].turn_time+"'"+
				"data-status='"+json[i].status+"'"+
				"data-id='"+json[i].id+"'"+
				"data-table-ids='"+json[i].table_ids+"'"+
				" onclick='changeCustomerStatus(this,\"current\")'"+
				">"+
				"<div class='media'>"+
				"<div class='pull-left'>"+
				"<img class='lv-img-sm' data-name='"+json[i].name+"' onerror='onImgError(this)' src='"+"<?php echo base_url();?>"+json[i].icon_path+"' >"+
                "</div>"+
				"<div class='pull-right'>"+
				"<div class='c100 p"+turn_time_data.ratio+" tiny'>"+
				"<span>"+turn_time_data.minutes+"M</span>"+
				"<div class='slice'>"+
				"<div class='bar'></div>"+
				"<div class='fill'></div>"+
				"</div>"+
				"</div>"+
				"</div>"+
                "<div class='media-body text-left'>"+
                "<div class='lv-title'>"+json[i].name+"</div>"+
                "<small class='lv-small'>"+"Server: "+json[i].server_name+"</small>"+
                "<small class='lv-small'> Turn Time: "+moment(json[i].turn_time_val, 'YYYY-MM-DD HH:mm:ss').format('h:mm a')+"</small>"+
                "</div>"+
				"</div>"+
				"</a>";
				//Add to current costumer list
				current_list_customers.push("current-reservation-"+json[i].reservation_id+idType);
				//console.log(get_turn_time_percent(json[i].arrival_time,json[i].turn_time_val));
			}
			listContainer.innerHTML += div;
		},
		error: function (request, ajaxOptions, thrownError) {
			console.log(request.responseText);
		}
	});
}

//Load in-line customers
function loadInLineCustomers(){
	$.ajax({
		url:"<?php echo base_url();?>"+"Reservations/get_inline_reservations",
		type: 'POST',
		ContentType: 'application/json',
		data: {
			'<?php echo $this->security->get_csrf_token_name(); ?>': 
		'<?php echo $this->security->get_csrf_hash(); ?>'},
		success: function (json){
			//console.log(json);
			json = JSON.parse(json);
			len = json.length;
			//Add current reservations to list
			var listContainer = document.getElementById("inline-reservation-list");
			//Clear div
			var div = "";
			listContainer.innerHTML = div;
			//Clear id list
			waiting_list_customers = [];
			
			for (i = 0; i < len; i++) {
				var now  = moment().format("DD/MM/YYYY HH:mm:ss");
				var then = json[i].arrival_time;

				var ms = moment(now,'DD/MM/YYYY HH:mm:ss').diff(moment(then,'YYYY-MM-DD HH:mm:ss'));
				var d = moment.duration(ms);
				var s = Math.floor(d.asHours()) + moment.utc(ms).format(":mm:ss");
				
				//Define id type
				var idType = (json[i].type == 'guest') ? "a":"";
				div += 
				"<a id='inline-reservation-"+json[i].reservation_id+idType+"' "+
				"data-arrival-time='"+json[i].arrival_time+"'"+
				"data-customer-type='"+json[i].type+"'"+
				"data-customer-name='"+json[i].name+"'"+
				"data-reservation-id='"+json[i].reservation_id+"'"+
				"data-notes='"+json[i].notes+"'"+
				"data-server-id='"+json[i].server_id+"'"+
				"data-customer-size='"+json[i].customer_size+"'"+
				"data-turn-time='"+json[i].turn_time+"'"+
				"data-turn-time-val='"+json[i].turn_time_val+"'"+
				"data-arrival-time='"+json[i].arrival_time+"'"+
				"data-status='"+json[i].status+"'"+
				"data-id='"+json[i].id+"'"+
				"data-table-ids='"+json[i].table_ids+"'"+
				" onclick='changeCustomerStatus(this,\"waiting\")' "+
				" class='lv-item' >"+
				"<div class='media'>"+
				"<div class='pull-left'>"+
				"<img class='lv-img-sm' data-name='"+json[i].name+"' onerror='onImgError(this)' src='"+"<?php echo base_url();?>"+json[i].icon_path+"' >"+
                "</div>"+
                "<div class='media-body text-left'>"+
                "<div class='lv-title'>"+json[i].name+"</div>"+
                "<small class='lv-small'>"+"Wait Time: "+s+"</small>"+
                "<small class='lv-small'> Arrival Time: "+moment(json[i].arrival_time, 'YYYY-MM-DD HH:mm:ss').format('h:mm a')+"</small>"+
                "</div>"+
				"</div>"+
				"</a>";
				//Add Id to waiting costumer list
				waiting_list_customers.push("inline-reservation-"+json[i].reservation_id+idType);
				
				//console.log(get_turn_time_percent(json[i].arrival_time,json[i].turn_time_val));
			}
			listContainer.innerHTML += div;
		},
		error: function (request, ajaxOptions, thrownError) {
			console.log(request.responseText);
		}
	});
}

//Load onhold customers
function loadOnholdCustomers(){
	$.ajax({
		url:"<?php echo base_url();?>"+"Reservations/get_onhold_customers",
		type: 'POST',
		ContentType: 'application/json',
		data: {
			'<?php echo $this->security->get_csrf_token_name(); ?>': 
		'<?php echo $this->security->get_csrf_hash(); ?>'},
		success: function (json){
			//console.log(json);
			json = JSON.parse(json);
			len = json.length;
			//Add onhold customers to list
			var listContainer = document.getElementById("onhold-customers-list");
			// Clear div
			var div = "";
			listContainer.innerHTML = div;
			//clear list of ids
			onhold_list_customers = [];
			
			for (i = 0; i < len; i++) {
				var now  = moment().format("DD/MM/YYYY HH:mm:ss");
				var then = json[i].reservation_time;

				var ms = moment(now,'DD/MM/YYYY HH:mm:ss').diff(moment(then,'YYYY-MM-DD HH:mm:ss'));
				var d = moment.duration(ms);
				var s = Math.floor(d.asHours()) + moment.utc(ms).format(":mm:ss");
				
				div += 
				"<div id='onhold-customer-"+json[i].reservation_id+
				"' data-reservation-time='"+json[i].reservation_time+"'"+
				"data-customer-type='"+json[i].type+"'"+
				"data-customer-name='"+json[i].name+"'"+
				"data-reservation-id='"+json[i].reservation_id+"'"+
				"data-notes='"+json[i].notes+"'"+
				"data-server-id='"+json[i].server_id+"'"+
				"data-customer-size='"+json[i].customer_size+"'"+
				"data-turn-time='"+json[i].turn_time+"'"+
				"data-turn-time-val='"+json[i].turn_time_val+"'"+
				"data-arrival-time='"+json[i].arrival_time+"'"+
				"data-status='"+json[i].status+"'"+
				"data-id='"+json[i].id+"'"+
				"data-table-ids='"+json[i].table_ids+"'"+
				" onclick='changeCustomerStatus(this,\"onhold\")' "+
				" class='lv-item' >"+
				"<div class='media'>"+
				"<div class='pull-left'>"+
				"<img data-name='"+json[i].name+"' onerror='onImgError(this)' class='lv-img-sm' src='"+"<?php echo base_url();?>"+json[i].icon_path+"' >"+
                "</div>"+
                "<div class='media-body text-left'>"+
                "<div class='lv-title'>"+json[i].name+"</div>"+
                "<small class='lv-small'>"+"Hold Time: "+s+"</small>"+
                "<small class='lv-small'> Reservation Time: "+moment(json[i].reservation_time, 'YYYY-MM-DD HH:mm:ss').format('h:mm a')+"</small>"+
                "</div>"+
				"</div>"+
				"</div>";
				//Add onhold costumers to onhold list
				onhold_list_customers.push("onhold-customer-"+json[i].reservation_id);
				
				//console.log(get_turn_time_percent(json[i].arrival_time,json[i].turn_time_val));
			}
			listContainer.innerHTML += div;
		},
		error: function (request, ajaxOptions, thrownError) {
			console.log(request.responseText);
		}
	});
}

//Load Server assignment
function loadServerAssignment(){
	$.ajax({
		url:"<?php echo base_url();?>"+"Reservations/get_server_assignment",
		type: 'POST',
		ContentType: 'application/json',
		data: {
			'<?php echo $this->security->get_csrf_token_name(); ?>': 
		'<?php echo $this->security->get_csrf_hash(); ?>'},
		success: function (json){
			//console.log(json);
			json = JSON.parse(json);
			len = json.length;
			//Add current reservations to list
			var listContainer = document.getElementById("server-assignment-list");
			var div = "";
			//clear div
			listContainer.innerHTML = div;
			for (i = 0; i < len; i++) {
				innerDiv = "";
				var user_name = json[i].user_name.split(',');
				var user_icon_path = json[i].user_icon_path.split(','); 
				var user_type = json[i].type.split(',');
				var user_id = json[i].user_id.split(',');
				var table_ids1 = json[i].table_id.split(',');
				//Add chips for each users
				for(j = 0; j < user_name.length; j++){
					//Define id type
					var idType = (user_type[j] == 'guest') ? "a":"";
					table_id = table_ids1[j].split('-');
					//Change string in table id to None if zero
					for(k = 0;k < table_id.length;k++){
						table_id[k] = (table_id[k] == '0') ? 'None':table_id[k];
					}
					innerDiv +=
					"<div id='server-assignment-customer-"+user_id[j]+idType+"' data-customer-type='"+idType+"' class='chip'>"+
					"<img data-name='"+json[i].user_name+"' onerror='onImgError(this)' src='"+"<?php echo base_url();?>"+user_icon_path[j]+"' alt='Person' width='20' height='20'>"+
					user_name[j]+"<span class='c-gray'>: "+table_id+"</span>"+
					//"<span class='closebtn' onclick=this.parentElement.style.display='none'>&times;</span>"+
					"</div>";
				}
				
				div += 
				"<a class='lv-item' >"+
				"<div class='media'>"+
				"<div class='pull-left'>"+
				"<img class='lv-img-sm' src='"+"<?php echo base_url();?>"+json[i].server_icon_path+"' >"+
                "</div>"+
                "<div class='media-body text-left'>"+
                "<div class='lv-title'>"+json[i].server_name+"</div>"+
                "<small class='lv-small'>"+"Current Customers: </small>"+
                "</div>"+
				innerDiv+
				"<div class='pull-left p-10'>"+
				
				"</div>"+
				
				"</div>"+
				"</a>";
				//console.log(get_turn_time_percent(json[i].arrival_time,json[i].turn_time_val));
			}
			listContainer.innerHTML += div;
		},
		error: function (request, ajaxOptions, thrownError) {
			console.log(request.responseText);
		}
	});
}

//Check in user action
function checkinUser(){
	//Clear form
	$('#checkin-form')[0].reset();
	//Add tables to option list
	table_list = $('#checkin-table-list');
	len = tables.length;
	div = "";
	for(i = 0;i < len;i++){
		//Check table type
		tType = (tables[i].res_type=="guest") ? "a":"";
		//Disable table if it is currently occupied
		disabledTable = ($('#res-table-id-'+tables[i].table_id+tType).data('is-occupied')) ? "disabled":"";
		//add tables to list
		table_list.append("<option value='"+tables[i].table_id+"' "+disabledTable+">"+tables[i].table_id+"<span>:"+tables[i].num_chairs+" </span></option>");
	}
	//Refresh selectable list
	table_list.selectpicker("refresh");
	//Change format of turn time
	$('#checkin-input-turn-time').mask("00:00:00");
	//Clear form
	$('#view-checkin-user').find('form')[0].reset();
	//Set current time and date
	$('#checkin-input-time').val(moment().format('hh:mm A'));
	$('#checkin-input-date').val(moment().format('YYYY-MM-DD'));
	//Show form
	$('#view-checkin-user').modal('show');
	//On click save button
	$('#save-checkin-data').unbind('click').bind('click', function(){
		var checkinForm = $("#checkin-form");
		checkinForm.validate();
		/*
		Check for form validation for inputs and list
		*/
		var isValid = ($('#checkin-table-list').val()!=null && checkinForm.valid());
		if(isValid){
			//Get data from form
			var customer_name = $('#checkin-input-name').val();
			var id = $('#getReservationId').val();
			var tableIds = $('#getTableIds').val();
			var notes = document.getElementById('checkin-input-notes').value;//$('#getNotes').val();
			tableIds = tableIds.split(',');
			var reservation_id = $('#checkin-input-reservation-id').val();
			var server_id = $('#checkin-server-list').val();
			var customer_size = document.getElementById('checkin-input-customer-size').value;//$('checkin-input-customer-size').val();
			var turn_time = $('#checkin-input-turn-time').val();
			var table_data = [];
			//Get selected chairs
			var table_list = $('#checkin-table-list').val();
			len = (table_list==null) ? 0:table_list.length;
			tablesChanged = false;
			for(i = 0;i < len;i++){
				table_data.push({'table_id':table_list[i]});
				if(tableIds.indexOf(table_list[i]) < 0){
					tablesChanged = true;
				}
			}
			table_data = JSON.stringify(table_data);
			var checkin_date = document.getElementById('checkin-input-date').value;//$('#checkin-input-date').val();
			var checkin_time = document.getElementById('checkin-input-time').value;//$('#checkin-input-time').val();
			//var arrival_time = new Date(checkin_date+" "+checkin_time);
			var arrival_time = checkin_date+" "+checkin_time;
			arrival_time = moment(arrival_time, 'YYYY-MM-DD HH:mm A').format('YYYY-MM-DD HH:mm:ss');
			console.log(arrival_time);
			var status = $('#checkin-input-status').val();
			var restaurant_id = '<?php echo $user_data['id'];?>';
			var urlStr = "";
			//Check user type
			//isReserved
			if($("#checkin-input-type").val()=='reserved'){
				urlStr = "reservations/reservation_update_batch";
				data = [{'id':id,'arrival_time':arrival_time,'status':status,'server_id':server_id,'customer_size':customer_size}];
				reservationTablesChanged(reservation_id,table_data);
			}else if($("#checkin-input-type").val()=='guest'){
				urlStr = "reservation_guest/update_reservation";
				data = [{'id':id,'notes':notes,'customer_size':customer_size,'arrival_time':arrival_time,'turn_time':turn_time,
					'server_id':server_id,'status':status}];
				//Change reservation chairs
				guestReservationTablesChanged(reservation_id,table_data);
			}else{
				urlStr = "reservation_guest/add_reservation";
				data = {'restaurant_id':restaurant_id,'server_id':server_id,'guest_name':customer_name,
				'notes':notes,'customer_size':customer_size,'arrival_time':arrival_time,'turn_time':turn_time,
				'status':status};
			}
			//console.log(table_data);
			data = JSON.stringify(data);
			$('.page-loader').show();
			//Make request
			$.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>"+urlStr,
				data: {'data':data,'tables':table_data,
				'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'},
				success: function(json) {
					// return success
					console.log(json);
					//Show form
					$('#view-checkin-user').modal('hide');
					//Reload table view, current customers and waiting customers
					showTables();
					loadInLineCustomers();
					loadReservations();
					loadServerAssignment();
					$('.page-loader').hide();
				},
				error: function (request, ajaxOptions, thrownError) {
					console.log(request.responseText);
					$('.page-loader').hide();
				}
			});
		}
		
	});
}

//Change for reserved customers
function reservationChanged(data){
	//Make request
	$.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>"+"reservations/reservation_update_batch",
        data: {'data':data,
		'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'},
        success: function(json) {
			console.log(json);
		},
		error: function (request, ajaxOptions, thrownError) {
			console.log(request.responseText);
			
		}
	});
}

//Change for guest customers
function guestReservationChanged(data){
	//Make request
	$.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>"+"reservation_guest/update_reservation",
        data: {'data':data,
		'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'},
        success: function(json) {
			console.log(json);
		},
		error: function (request, ajaxOptions, thrownError) {
			console.log(request.responseText);
			
		}
	});
}

function reservationTablesChanged(reservation_id,table_data){
	//Make request
	$.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>"+"reservations/change_tables",
        data: {'reservation_id':reservation_id,'tables':table_data,
		'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'},
        success: function(json) {
			console.log(json);
		},
		error: function (request, ajaxOptions, thrownError) {
			console.log(request.responseText);
			
		}
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

//Edit customer status
function changeCustomerStatus(context,type){
	//Clear form
	$('#status-form')[0].reset();
	//Add tables to option list
	table_list = $('#status-table-list');
	len = tables.length;
	div = "";
	for(i = 0;i < len;i++){
		table_list.append("<option value='"+tables[i].table_id+"' >"+tables[i].table_id+"<span>:"+tables[i].num_chairs+" </span></option>");
	}
	//Refresh selectable list
	table_list.selectpicker("refresh");
	//Change format of turn time
	$('#status-input-turn-time').mask("00:00:00");
	//Clear form
	//$('#view-status-user').find('form')[0].reset();
	//Show form
	$('#view-status-user').modal('show');
	//Get current div
	var tab_div = $(context);
	var customer_type = tab_div.data('customer-type'); 
	var customer_name = tab_div.data('customer-name');
	var customer_size = tab_div.data('customer-size');
	var reservation_id = tab_div.data('reservation-id');
	var notes = tab_div.data('notes');
	var server_id = tab_div.data('server-id');
	var turn_time = tab_div.data('turn-time');
	var turn_time_val = tab_div.data('turn-time-val');
	var arrival_time = tab_div.data('arrival-time');
	var status = tab_div.data('status');
	//console.log(tab_div.data());
	
	//Set data on modal
	$("#status-input-name").val(customer_name);
	$('#status-input-turn-time').val(turn_time);
	//document.getElementById("status-input-turn-time").setAttribute('value',turn_time);
	document.getElementById("status-input-reservation-id").setAttribute('value',reservation_id);
	document.getElementById("status-input-customer-size").setAttribute('value',parseInt(customer_size));
	document.getElementById("status-input-notes").setAttribute('value',notes);
	//Select server
	try{
		$('#status-server-list option:selected').removeAttr('selected');
		$('#status-server-list').val(server_id).change();
	}catch(exp){
		console.log(exp);
	}
	//Select table
	user_table = tab_div.data('table-ids');
	user_table = String(user_table);
	user_table = user_table.split(",");
	table_list = $('#status-table-list');
	table_list.html("");
	len = tables.length;
	for(i = 0;i < len;i++){
		if(user_table.indexOf(tables[i].table_id) > -1){
				table_list.append("<option value='"+tables[i].table_id+"' selected>"+
				tables[i].table_id+"<span>:"+tables[i].num_chairs+" </span></option>");
		}else{
			table_list.append("<option value='"+tables[i].table_id+"' >"+
			tables[i].table_id+"<span>:"+tables[i].num_chairs+" </span></option>");
		}
	}
	//Change arrival time
	var arrival_time_array  = arrival_time.split(" ");
	time_val = moment(arrival_time,'YYYY-MM-DD HH:mm:ss').format("h:mm A");
	$("#status-input-date").val(arrival_time_array[0]);
	$("#status-input-time").val(time_val);
	
	
	
	//Refresh selectable list
	table_list.selectpicker("refresh");
	switch(type){
		case 'waiting': //Customers on waiting list
			$("#status-input-type").val(customer_type).change();
			$("#status-input-status").val(1).change();
			break;
		case 'current':
			$("#status-input-type").val(customer_type).change();
			$("#status-input-status").val(2).change();
			break;
		case 'onhold':
			$("#status-input-type").val(customer_type).change();
			$("#status-input-status").val(0).change();
			break;
	}
	
	//On click save button
	$('#save-status-data').unbind('click').bind('click', function(){
		form = $('#status-form');
		if(form.valid()){
		$('.page-loader').show();
		//Get data info
		var customer_name = $('#status-input-name').val();
		var id = tab_div.data('id');
		var tableIds = String(tab_div.data('table-ids'));
		var notes = document.getElementById('status-input-notes').value;//$('#getNotes').val();
		tableIds = tableIds.split(',');
		var reservation_id = $('#status-input-reservation-id').val();
		var server_id = $('#status-server-list').val();
		var customer_size = document.getElementById('status-input-customer-size').value;//$('checkin-input-customer-size').val();
		var turn_time = document.getElementById('status-input-turn-time').value;
		//new arrival time
		var date1 = $("#status-input-date").val();
		var time1 = $("#status-input-time").val();
		var arrival_time = moment(date1+" "+time1, 'YYYY-MM-DD h:mm A').format('YYYY-MM-DD HH:mm:ss');
		var table_data = [];
		var table_list = $('#status-table-list').val();
		//console.log(table_list);
		len = (table_list==null) ? 0:table_list.length;
		var tablesChanged = false;
		for(i = 0;i < len;i++){
			table_data.push({'table_id':table_list[i]});
			if(tableIds.indexOf(table_list[i]) < 0){
				tablesChanged = true;
			}
		}
		table_data = JSON.stringify(table_data);
		var status = $('#status-input-status').val();
		var restaurant_id = '<?php echo $user_data['id'];?>';
		var urlStr = "";
		var isReserved = (customer_type == "reserved") ? true:false;
		//Check user type
		if(isReserved){
			urlStr = "reservations/reservation_update_batch";
			data = [{'id':id,'arrival_time':arrival_time,'status':status,'server_id':server_id,'customer_size':customer_size}];
			//Change reservation chairs
			reservationTablesChanged(reservation_id,table_data);
		}else{
			urlStr = "reservation_guest/update_reservation";
			data = [{'id':id,'notes':notes,'customer_size':customer_size,'arrival_time':arrival_time,'turn_time':turn_time,
			'server_id':server_id,'status':status}];
			//Change reservation chairs
			guestReservationTablesChanged(reservation_id,table_data);
		}
		data = JSON.stringify(data);
		console.log("ID: "+id);
		console.log(data);
		//Make request
		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>"+urlStr,
			data: {'data':data,'tables':table_data,
			'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'},
			success: function(json) {
				console.log(json);
				$('#view-status-user').modal('hide');
				showTables();
				loadInLineCustomers();
				loadReservations();
				loadServerAssignment();
				loadOnholdCustomers();
				$('.page-loader').hide();
			},
			error: function (request, ajaxOptions, thrownError) {
				console.log(request.responseText);
				$('.page-loader').hide();
			}
		});
		}
	});
	
}

var isReserved = false;
//On click option for checkin menu
$('select[id="checkin-input-type"]').change(function() {
    var clickedOption = $(this).find('option:selected');
	var clickedOptionId = clickedOption.attr('id');
	//console.log(clickedOption.attr('id'));
	switch(clickedOptionId){
		case "checkin-input-guest":
			$("#checkin-input-reservation-id").prop('disabled', false);
			$("#checkin-load-reservation-id").prop('disabled', false);
			isReserved = false;
			//console.log(clickedOptionId);
			break;
		case "checkin-input-reserved":
			$("#checkin-input-reservation-id").prop('disabled', false);
			$("#checkin-load-reservation-id").prop('disabled', false);
			isReserved = true;
			//console.log(clickedOptionId);
			break;	
		case "checkin-input-walk-ins":
			$("#checkin-input-reservation-id").prop('disabled', true);
			$("#checkin-load-reservation-id").prop('disabled', true);
			isReserved = false;
			//console.log(clickedOptionId);
			break;	
	}
});

//Search results for checkin view
function ajaxUserSearch() {
	var checkinType = $('#checkin-input-type').val();
	//console.log(checkinType);
    var input_data = $('#checkin-input-name').val();
	//console.log(input_data.length);
    if (input_data.length < 1 || checkinType == 'walk-ins') {
        $('#checkin-name-suggestion').hide();
		console.log("Invalid")
    } else {
		urlVal = (checkinType=='reserved') ? 'reservations/name_autocomplete':'reservation_guest/name_autocomplete';
		console.log("Type: "+checkinType+" Url: "+urlVal);
        var post_data = {
            'search_data': input_data,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>"+urlVal,
            data: post_data,
            success: function(data) {
				//console.log(data);
				// return success
				if (data.length > 0) {
					$('#checkin-name-suggestion').show();
					$('#autoSuggestionsList-checkin').addClass('auto-list');
					$('#autoSuggestionsList-checkin').html(data);
				}
			},
			error: function (request, ajaxOptions, thrownError) {
				console.log(request.responseText);
			}
		});
	}
}

//On input name focus out
$("#checkin-input-name").focusout(function () {
     $('#checkin-name-suggestion').delay(300).hide(0);
});

//On load reservation id
$('#checkin-load-reservation-id').click(function(){
	listType = $('#checkin-input-type').val();
	reservation_id = $('#checkin-input-reservation-id').val();
	//Load checkin data
	checkinLoad(listType,reservation_id);
});

//autocomplete name clicked function
function checkinLoad(listType,reservation_id){
	//list = $(context);
	//listType = list.data('type'); 
	console.log("Type: "+listType+" Reservation ID: "+reservation_id);
	if(listType=='reserved'){
		var urlVal = "reservations/get_reservation";
	}else{
		var urlVal = "reservation_guest/get_guest";
	}
	//make ajax request
	$.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>"+urlVal,
        data: {'reservation_id':reservation_id,
			'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'},
        success: function(json) {
			// Parse JSON
			json  = JSON.parse(json);
			console.log(json);
			if(json != null && json.length >= 0){
				
			
			//Load content to modal view
			name  = (listType=='reserved') ? json[0].name:json[0].guest_name;
			$("#checkin-input-name").val(name);
			document.getElementById("checkin-input-turn-time").setAttribute('value',json[0].turn_time);
			document.getElementById("checkin-input-reservation-id").setAttribute('value',reservation_id);
			document.getElementById("checkin-input-customer-size").setAttribute('value',parseInt(json[0].customer_size));
			document.getElementById("getReservationId").setAttribute('value',json[0].id);
			document.getElementById("getTableIds").setAttribute('value',json[0].table_ids);
			document.getElementById("getNotes").setAttribute('value',json[0].notes);
			//Select server
			try{
				$('#checkin-server-list option:selected').removeAttr('selected');
				$('#checkin-server-list').val(json[0].server_id).change();
			}catch(exp){
				console.log(exp);
			}
			//Select table
			user_table = json[0].table_ids;
			user_table = String(user_table);
			console.log(user_table);
			user_table = user_table.split(",");
			table_list = $('#checkin-table-list');
			table_list.html("");
			len = tables.length;
			for(i = 0;i < len;i++){
				if(user_table.indexOf(tables[i].table_id) > -1){
					table_list.append("<option value='"+tables[i].table_id+"' selected>"+
					tables[i].table_id+"<span>:"+tables[i].num_chairs+" </span></option>");
				}else{
					table_list.append("<option value='"+tables[i].table_id+"' >"+
					tables[i].table_id+"<span>:"+tables[i].num_chairs+" </span></option>");
				}
			}
			//Refresh selectable list
			table_list.selectpicker("refresh");
			}
			
		},
		error: function (request, ajaxOptions, thrownError) {
			console.log(request.responseText);
		}
	});
	
	//console.log(list);
	return false;
	
	
}


//Get percentage on turn time
function get_turn_time_percent(arrival_time,turn_time_val){
	//console.log("Arrival: "+arrival_time+" Turn Time: "+turn_time_val+" Current: "+moment().format('YYYY-MM-DD HH:mm:ss'));
	var current = moment().unix();
	var turn_time = moment(turn_time_val, 'YYYY-MM-DD HH:mm:ss').unix();
	var arrival = moment(arrival_time, 'YYYY-MM-DD HH:mm:ss').unix();
	var diff_1 =  current - arrival; //Time left in reservation
	var diff_2 =  turn_time - arrival; //Overall time
	if(diff_2>diff_1&&diff_1>0){
		var ratio = Math.round(diff_1*100/diff_2);
		var minutes = Math.round((diff_2-diff_1)/60);
		return {'ratio':ratio,'minutes':minutes};
	}else if(diff_1>diff_2){
		var ratio = 100;
		var minutes = 0;
		return {'ratio':ratio,'minutes':minutes};
	}else{
		var ratio = 0;
		var minutes = Math.round(diff_2/60);
		//console.log("Overall Time: "+diff_2);
		return {'ratio':ratio,'minutes':minutes};
	}
	
}
</script>


</body>
</html>