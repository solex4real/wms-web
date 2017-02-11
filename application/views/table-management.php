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
<script src="<?= base_url();?>material/js/functions.js"></script>
<script src="<?= base_url();?>material/js/demo.js"></script>


<link href="<?= base_url();?>wms/css/jquery-ui.css" rel="stylesheet">

<script src="<?= base_url();?>wms/js/jquery-ui.js"></script>

<script src="<?= base_url();?>wms/js/jquery-ui-rotate.js"></script>

<link href="<?= base_url();?>wms/css/jquery.ui.rotatable.css" rel="stylesheet">
<link href="<?= base_url();?>wms/css/css-percentage-circle-master/css/circle.css" rel="stylesheet">
	
<script type="text/javascript">
var droppable = "";
var droppable_params = {};
var action_performed = false;
var draggable_array_id = [];
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
	$('#view-table-info').modal('show');
	table_div = $(this);
}

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
	$( "#draggable-circle-two" ).draggable(draggable_params);
	$( "#draggable-circle-three" ).draggable(draggable_params);
	$( "#draggable-circle-four" ).draggable(draggable_params);
	$( "#draggable-circle-five" ).draggable(draggable_params);
	$( "#draggable-circle-six" ).draggable(draggable_params);
	$( "#draggable-circle-eight" ).draggable(draggable_params);
	$( "#draggable-square-four" ).draggable(draggable_params);
	$( "#draggable-square-two" ).draggable(draggable_params);
	$( "#draggable-square-mid-four" ).draggable(draggable_params);
	$( "#draggable-square-eight" ).draggable(draggable_params);
	$( "#draggable-rectangle-six" ).draggable(draggable_params);
	$( "#draggable-rectangle-eight" ).draggable(draggable_params);
	$( "#draggable-rectangle-eight-large" ).draggable(draggable_params);
	$( "#draggable-rectangle-ten" ).draggable(draggable_params);
	
	current_droppable = droppable;
	currentid = 1;
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
			var sectionContainer = document.getElementById("static-table-container");
			for (i = 0; i < len; i++) {
				//Setup droppable
				if(droppable_id != json[i].section_id){
					droppable_id = json[i].section_id;
					droppable = $("#static-section-"+droppable_id).droppable();
				}
				//console.log(i);
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
				//Table info data display
				var table_data = 
				"<div class='row res-info-area' >"+
				"<div class='vmiddle'>"+
				"<a class='col-sm-12 text-center' >"+json[i].table_id+"</a>";
				if(json[i].reservation_id==undefined||json[i].reservation_id==''){
					table_data += "</div></div>";
					/*
					cloned.data('trigger','hover');
					cloned.data('toggle','po');
					*/
					cloned.data({
						'trigger':'hover','toggle':'popover','placement':'left',
						'original-title':'Table Status','content':'Table is clean',
						'is-occupied':false
					});
					var class_atrr = "";
					/*
					Change color based on status
					0 - unavailable : blue gray
					1 - available : teal
					2 - occupied : green
					3 - needs cleaning : orange 
					4 - closed : deep orange
					*/
					//Status color array
					status_color = ['bgm-bluegray','bgm-teal','bgm-green','bgm-orange','bgm-deeporange'];
					//Change background of table if empty
					cloned.removeClass('bgm-green').addClass(status_color[json[i].status]);
					cloned.children("div:first").removeClass('bgm-teal').addClass(status_color[json[i].status]);
				}else{
					var turn_data = get_turn_time_percent(json[i].arrival_time,json[i].turn_time_val);
					table_data +=
					"<div class='res-progress progress text-center' >"+
					"<div class='progress-bar progress-bar-info' role='progressbar' aria-valuenow='20' aria-valuemin='0' aria-valuemax='100' style='width: "+turn_data.ratio+"%'></div>"+
					"</div>"+
					//"<small class='c-gray col-sm-12 text-center'>3</small>"+
					"</div></div>";
					cloned.data('is-occupied',false);
					cloned.removeClass('bgm-green').addClass('bgm-green');
					cloned.children("div:first").removeClass('bgm-teal').addClass('bgm-green');
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
 timeRange = 3; //one minute interval
 i = 0;
 var resCounter = setInterval(function(){
	//console.log(i++); 
 },1000);
 
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
			for (i = 0; i < len; i++) {
				//Setup droppable
				if(droppable_id != json[i].section_id){
					droppable_id = json[i].section_id;
					/*
					//Add new droppable to div
					section_div = 
					"<div id='section-block-"+droppable_id+"' >"
					+"<div class='block-header p-t-20 p-static'>"
					+"<h2>"+json[i].section_name+"</h2></div>"
					+"<div class='card'>"
					+"<div id='droppable-"+json[i].section_id+"' class='card ui-widget-header droppable-layout custom-droppable bgm-gray'>"
					+"</div></div>"
					+"</div>";
					sectionContainer.innerHTML += section_div;
					*/
					droppable = $("#droppable-"+droppable_id).droppable(droppable_params);
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
				currentid = parseInt(json[i].table_id);
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
        editable: true,
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
			var div = "";
			for (i = 0; i < len; i++) {
				div += 
				"<a class='lv-item' >"+
				"<div class='media'>"+
				"<div class='pull-left'>"+
				"<img class='lv-img-sm' src='"+"<?php echo base_url();?>"+json[i].icon_path+"' >"+
                "</div>"+
				"<div class='pull-right'>"+
				"<div class='c100 p"+get_turn_time_percent(json[i].arrival_time,json[i].turn_time_val).ratio+" tiny'>"+
				"<span>"+get_turn_time_percent(json[i].arrival_time,json[i].turn_time_val).minutes+"M</span>"+
				"<div class='slice'>"+
				"<div class='bar'></div>"+
				"<div class='fill'></div>"+
				"</div>"+
				"</div>"+
				"</div>"+
                "<div class='media-body text-left'>"+
                "<div class='lv-title'>"+json[i].name+"</div>"+
                "<small class='lv-small'>"+"Server: "+json[i].server_name+"</small>"+
                "<small class='lv-small'> Turn Time: "+moment(json[i].turn_time_val, 'YYYY-MM-DD h:mm:ss').format('h:mm a')+"</small>"+
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
			var div = "";
			for (i = 0; i < len; i++) {
				var now  = moment().format("DD/MM/YYYY HH:mm:ss");
				var then = json[i].arrival_time;

				var ms = moment(now,'DD/MM/YYYY HH:mm:ss').diff(moment(then,'YYYY-MM-DD h:mm:ss'));
				var d = moment.duration(ms);
				var s = Math.floor(d.asHours()) + moment.utc(ms).format(":mm:ss");

				div += 
				"<a class='lv-item' >"+
				"<div class='media'>"+
				"<div class='pull-left'>"+
				"<img class='lv-img-sm' src='"+"<?php echo base_url();?>"+json[i].icon_path+"' >"+
                "</div>"+
                "<div class='media-body text-left'>"+
                "<div class='lv-title'>"+json[i].name+"</div>"+
                "<small class='lv-small'>"+"Wait Time: "+s+"</small>"+
                "<small class='lv-small'> Arrival Time: "+moment(json[i].arrival_time, 'YYYY-MM-DD h:mm:ss').format('h:mm a')+"</small>"+
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
			var div = "";
			for (i = 0; i < len; i++) {
				var now  = moment().format("DD/MM/YYYY HH:mm:ss");
				var then = json[i].reservation_time;

				var ms = moment(now,'DD/MM/YYYY HH:mm:ss').diff(moment(then,'YYYY-MM-DD h:mm:ss'));
				var d = moment.duration(ms);
				var s = Math.floor(d.asHours()) + moment.utc(ms).format(":mm:ss");

				div += 
				"<a class='lv-item' >"+
				"<div class='media'>"+
				"<div class='pull-left'>"+
				"<img class='lv-img-sm' src='"+"<?php echo base_url();?>"+json[i].icon_path+"' >"+
                "</div>"+
                "<div class='media-body text-left'>"+
                "<div class='lv-title'>"+json[i].name+"</div>"+
                "<small class='lv-small'>"+"Hold Time: "+s+"</small>"+
                "<small class='lv-small'> Reservation Time: "+moment(json[i].reservation_time, 'YYYY-MM-DD h:mm:ss').format('h:mm a')+"</small>"+
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
			for (i = 0; i < len; i++) {
				innerDiv = "";
				var user_name = json[i].user_name.split(',');
				//Add chips for each users
				for(j = 0; j < user_name.length; j++){
					user_icon_path = json[i].user_icon_path.split(','); 
					innerDiv +=
					"<div class='chip'>"+
					"<img src='"+"<?php echo base_url();?>"+user_icon_path[j]+"' alt='Person' width='20' height='20'>"+
					user_name[j]+
					"<span class='closebtn' onclick=this.parentElement.style.display='none'>&times;</span>"+
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

//Get percentage on turn time
function get_turn_time_percent(arrival_time,turn_time_val){
	//console.log("Arrival: "+arrival_time+" Turn Time: "+turn_time_val+" Current: "+moment().format('YYYY-MM-DD hh:mm:ss'));
	var current = moment().unix();
	var turn_time = moment(turn_time_val, 'YYYY-MM-DD h:mm:ss').unix();
	var arrival = moment(arrival_time, 'YYYY-MM-DD h:mm:ss').unix();
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
		console.log("Overall Time: "+diff_2);
		return {'ratio':ratio,'minutes':minutes};
	}
}
</script>


</body>
</html>