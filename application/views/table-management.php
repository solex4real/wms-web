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
                                <a class="col-sx-4" href="#tab-1" aria-controls="tab-1" role="tab" data-toggle="tab">
                                    <i class="md md-local-restaurant icon-tab"></i>
                                </a>
                            </li>
                            <li role="presentation">
                                <a class="col-xs-4" href="#tab-2" aria-controls="tab-2" role="tab" data-toggle="tab">
                                    <i class="md md-mode-edit icon-tab"></i>
                                </a>
                            </li>
                            <li role="presentation">
								<a class="col-xs-4" href="#tab-3" aria-controls="tab-3" role="tab" data-toggle="tab">
									<i class="md md-info-outline icon-tab"></i>
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
								<!-- Add block space to aviod view bug -->
								<?php $this->load->view('block-space');  ?>
							</div>
						
						</div>
					
					</div>
					
					
					
				</div>
			</div>
			<div class="col-sm-8 listview">
				<div class="row pull-right p-relative">
					<img id="delete-table" src="<?= base_url();?>wms/images/icons/bin-icon.png" class="droppable-layout" width="40" height="40"></img>
				</div>
				<div id="section-table-container lv-body c-overflow">
					<?php
						foreach($sections as $row){
							echo "<div id='section-block-".$row->section_id."' >";
							echo "<div class='block-header p-t-20 p-static'>";
							echo "<h2>".$row->section_name."</h2></div>";
							echo "<div class='card'>";
							echo "<div id='droppable-".$row->section_id."' data-section-id='".$row->section_id."' 
							class='card ui-widget-header droppable-layout custom-droppable bgm-gray'>";
							echo "</div></div>";
							echo "</div>";
						}
					?>
				</div>
			</div>
		</div>
	</div>

</section>
</section>


<?php $this->load->view('footer');?>

<script
	src="<?= base_url();?>material/vendors/nicescroll/jquery.nicescroll.min.js"></script>
<script 
	src="<?= base_url();?>material/vendors/bootstrap-select/bootstrap-select.min.js"></script>
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
<script
	src="<?= base_url();?>material/vendors/bootstrap-growl/bootstrap-growl.min.js"></script>
<script
	src="<?= base_url();?>material/vendors/sweet-alert/sweet-alert.min.js"></script>
<script src="<?= base_url();?>material/js/functions.js"></script>
<script src="<?= base_url();?>material/js/demo.js"></script>


<script src="<?= base_url();?>wms/js/jquery-ui.js"></script>

<script src="<?= base_url();?>wms/js/jquery-ui-rotate.js"></script>

<link href="<?= base_url();?>wms/css/jquery-ui.css" 
	rel="stylesheet">
<link href="<?= base_url();?>wms/css/jquery.ui.rotatable.css" rel="stylesheet">
<link href="<?= base_url();?>wms/css/css-percentage-circle-master/css/circle.css" rel="stylesheet">

	
<script type="text/javascript">
var droppable = "";
var droppable_params = {};
 $(document).ready( function() {
	 //Append new draggable example (Don't Remove)
	//var cloned = $( "#draggable-diamond-two" ).clone().css({'position': 'absolute', 'top': '50', 'left': '50'});
	//$( "#droppable" ).append(cloned.draggable({revert: "invalid"}).resizable());
	//var droppable = $( "#droppable" );
	
	

	$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
		//$('#table-list').fullCalendar('render');
	});
	//Parameters for rotation
	 var params = {
        // Callback fired on rotation start.
        start: function(event, ui) {
			console.log("Rotating started");
        },
        // Callback fired during rotation.
        rotate: function(event, ui) {
			console.log("Rotating");
        },
        // Callback fired on rotation end.
        stop: function(event, ui) {
			console.log("Rotating Stopped");
        },
        // Set the rotation center at (25%, 75%).
        rotationCenterX: 50.0, 
        rotationCenterY: 50.0
    };
        //$('#target').rotatable(params);
	

	 
    ///$( "#draggable" ).draggable({ revert: "valid" });
    $( "#draggable-diamond-two" ).draggable({ 
		revert: "invalid",
		helper: 'clone',
		appendTo: 'body'
	});
	$( "#draggable-diamond" ).draggable({ 
		revert: "invalid",
		helper: 'clone',
		appendTo: 'body'
	});
	$( "#draggable-circle-eight" ).draggable({ 
		revert: "invalid",
		helper: 'clone',
		appendTo: 'body'
	});
	$( "#draggable-circle-two" ).draggable({ 
		revert: "invalid",
		helper: 'clone',
		appendTo: 'body'
	});
	$( "#draggable-circle-three" ).draggable({ 
		revert: "invalid",
		helper: 'clone',
		appendTo: 'body'
	});
	$( "#draggable-circle-four" ).draggable({ 
		revert: "invalid",
		helper: 'clone',
		appendTo: 'body'
	});
	$( "#draggable-circle-five" ).draggable({ 
		revert: "invalid",
		helper: 'clone',
		appendTo: 'body'
	});
	$( "#draggable-circle-six" ).draggable({ 
		revert: "invalid",
		helper: 'clone',
		appendTo: 'body'
	});
	$( "#draggable-circle-eight" ).draggable({ 
		revert: "invalid",
		helper: 'clone',
		appendTo: 'body'
	});
	$( "#draggable-square-four" ).draggable({ 
		revert: "invalid",
		helper: 'clone',
		appendTo: 'body'
	});
	$( "#draggable-square-two" ).draggable({ 
		revert: "invalid",
		helper: 'clone',
		appendTo: 'body'
	});
	$( "#draggable-square-mid-four" ).draggable({ 
		revert: "invalid",
		helper: 'clone',
		appendTo: 'body'
	});
	$( "#draggable-square-eight" ).draggable({ 
		revert: "invalid",
		helper: 'clone',
		appendTo: 'body'
	});
	$( "#draggable-rectangle-six" ).draggable({ 
		revert: "invalid",
		helper: 'clone',
		appendTo: 'body'
	});
	$( "#draggable-rectangle-eight" ).draggable({ 
		revert: "invalid",
		helper: 'clone',
		appendTo: 'body'
	});
	$( "#draggable-rectangle-eight-large" ).draggable({ 
		revert: "invalid",
		helper: 'clone',
		appendTo: 'body'
	});
	$( "#draggable-rectangle-ten" ).draggable({ 
		revert: "invalid",
		helper: 'clone',
		appendTo: 'body'
	});
	
	current_droppable = droppable;
	currentid = 1;
	var rotationAngle = 0;
	droppable_params = {
		classes: {
			//"ui-droppable-active": "ui-state-active",
			//"ui-droppable-hover": "ui-state-hover"
		},
      drop: function( event, ui ) {
		$(ui.helper).css("position", "none");
        //$( this ).find( "p" ).html( "Dropped!" );
			$.ui.ddmanager.current.cancelHelperRemoval = true;
			//$(this).append($("ui.draggable").clone());
			//$(ui.helper).attr('id',currentid++);
			
			droppable = $(this);
			//$(this).append(ui.draggable);
			//$(ui.element).css({'z-index': 1000});
			$(ui.helper).draggable({
				//stack: "#droppable",
				revert: "invalid",
				stop: function(event,ui) {
					if($(ui.helper).data("element-dropped")!=false||$(ui.helper).data("element-dropped")!=undefined){
						
						left = ui.offset.left - droppable.offset().left;
						top = ui.offset.top - droppable.offset().top;
						var data = [{'table_id':$(ui.helper).data("table-id"),
							'top_pos':top,'left_pos':left
						}];
						//console.log("Top: "+top+" Left: "+left+" Table ID: "+(ui.helper).data("table-id"));
						updateTable(data);
					}
				}
			});
			$(ui.helper).rotatable({
				start: function(event, ui) {
				},
				stop: function(event, ui) {
					rotationAngle = (ui.angle.current* 180/Math.PI);
					var data = [{'table_id':ui.element.data("table-id"),
						'orientation':rotationAngle}];
					updateTable(data);
				}
			});
			
			$(ui.helper).resizable({
				aspectRatio: true,
				resize: function(event1, ui1) {
					$(this).css({
						'top': parseInt(ui1.position.top, 10) + ((ui1.originalSize.height - ui1.size.height)) / 2,
						'left': parseInt(ui1.position.left, 10) + ((ui1.originalSize.width - ui1.size.width)) / 2
					});
				},
				stop: function(event){
					/*
					//height of table
					h = $(ui.helper).height();
					w = $(ui.helper).width();
					//Original height
					h2 = $("#"+$(ui.helper).data("type")).height();
					w2 = $("#"+$(ui.helper).data("type")).width();
					*/
					//height of table
					var h = $(ui.helper).height();
					var w = $(ui.helper).width();
					//Original height
					var h2 = $("#"+$(ui.helper).data("type")).height();
					var w2 = $("#"+$(ui.helper).data("type")).width();
					var size_h  = h/h2;
					var size_w  = w/w2;
					var data = [{'table_id':$(ui.helper).data("table-id"),
						'size_h':size_h.toFixed(7), 'size_w':size_w.toFixed(7)
					}];
					updateTable(data);
				}
			});
			var left = ui.offset.left - $(this).offset().left;
			var top = ui.offset.top - $(this).offset().top;
			if($(ui.helper).data("element-dropped")==false||$(ui.helper).data("element-dropped")==undefined){
				currentid++;
				addTable(currentid,ui.draggable.attr("id"),
				$(ui.helper).data("num-chairs"),top,left,"1",getRotationDegrees($(ui.helper)),$(this).data("section-id"));
				$(ui.helper).data("table-id",currentid);
				$(ui.helper).data("type",ui.draggable.attr("id"));
				$(ui.helper).data("element-dropped", true);
				ui.draggable.attr("id","");
			}
			nodeid = ui.draggable.data("noteid");
			val = "";
			type = "";
			//updateTable(nodeid,type,val,top,left);
			
      }
    }
	//Show Editable tables
	showTables();
	
	//Load Current Reservations
	loadReservations()
	
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
					aspectRatio: true,
					resize: function(event1, ui1) {
					$(this).css({
						'top': parseInt(ui1.position.top, 10) + ((ui1.originalSize.height - ui1.size.height)) / 2,
						'left': parseInt(ui1.position.left, 10) + ((ui1.originalSize.width - ui1.size.width)) / 2
					});
					}
				}).resizable({
					revert: "valid",
					aspectRatio: true,
					stop: function(event, ui){
						//height of table
						var h = $(ui.helper).outerHeight();
						var w = $(ui.helper).outerWidth();
						//Original height
						var h2 = $("#"+$(ui.helper).data("type")).outerHeight();
						var w2 = $("#"+$(ui.helper).data("type")).outerWidth();
						var size_h  = h/h2;
						var size_w  = w/w2;
						var data = [{'table_id':$(ui.helper).data("table-id"),
							'size_h':size_h.toFixed(7), 'size_w':size_w.toFixed(7)
						}];
						updateTable(data);
					},
					resize: function(event, ui) {
					$(this).css({
						'top': parseInt(ui.position.top, 10) + ((ui.originalSize.height - ui.size.height)) / 2,
						'left': parseInt(ui.position.left, 10) + ((ui.originalSize.width - ui.size.width)) / 2
					});
					}
				}).rotatable({
					angle: rotationAngle*Math.PI/180,
					start: function(event, ui) {
					},
					stop: function(event, ui) {
						rotationAngle = (ui.angle.current* 180/Math.PI);
						var data = [{'table_id':ui.element.data("table-id"),
							'orientation':rotationAngle}];
						updateTable(data);
					}
				});
				draggable.data("element-dropped", true);
				draggable.data("type", json[i].type);
				draggable.data("table-id", json[i].table_id);
				droppable.append(draggable);
				//droppable.droppable(droppable_params);
				currentid = parseInt(json[i].table_id);
			}
		},
		error: function (request, ajaxOptions, thrownError) {
			console.log(request.responseText);
		}
	});	
 }
 
 function addTable(table_id,type,num_chairs,top_pos,left_pos,size,orientation,section){
	/*
	 console.log("Table ID: "+table_id+" Type "+type+" Num Chairs "+num_chairs+
	 " Top Pos "+top_pos+" Left Pos "+left_pos+" Size "+size+" Section "+section);
	*/
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
			console.log(json);
		},
		error: function (request, ajaxOptions, thrownError) {
			console.log(request.responseText);
		}
	});
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
	
}

//Load Server assignment
function loadServerAssignment(){
	
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