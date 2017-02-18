<!-- Header -->
<?php $this->load->view('header');  ?>

<section id="content">
	<div class="container">
	<div class="card">
		<div class="card-header">
            <h2>Calendar <small>Select the schedule you would like to edit</small></h2>
        </div>
		<div class="card-body card-padding">
		<div class="row">
			<div class="col-sm-3 m-b-25">
                <p class="f-500 m-b-15 c-black">Search Option</p>
                                    
                <select class="selectpicker" id="name_list" name="name_list" data-live-search="true" multiple>
				<option id='<?php echo $user_id;?>' value="0" selected>My Calendar</option>
				<?php 
				foreach ($servers as $row):
				echo "<option id='".$row->user_id."' value='".$row->user_id."'>".$row->name."</option>";
				endforeach;
				?>
				
                </select>
            </div>
			
			<div class="col-sm-3 m-b-25">
                <p class="f-500 m-b-15 c-black">Name</p>
                <p class="lead" id="res_name" name="res_name"></p>                    
                
            </div>
			
			<div class="col-sm-3 m-b-25">
                <p class="f-500 m-b-15 c-black">Position</p>
                <p class="lead" id="res_position" name="res_position"></p>                    
                
            </div>
		</div>
		</div>

		</div>

		

		<div id="calendar" ></div>

		<!-- Add event -->
		<div class="modal fade" id="addNew-event" data-backdrop="static"
			data-keyboard="false">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Add an Event</h4>
					</div>
					<div class="modal-body">
						<form class="addEvent" role="form">
							<div class="form-group">
								<label for="eventName">User</label><br/>
								<select class="selectpicker" id="name_list_add" name="name_list_add" data-live-search="true">
									<option value="0" selected>My Calendar</option>
									<?php 
										foreach ($servers as $row):
											echo "<option value='".$row->user_id."'>".$row->name."</option>";
										endforeach;
									?>
				
								</select><br/><br/>
								<label for="eventName">Event Name</label>
								<div class="fg-line">
									<input type="text" class="input-sm form-control" id="eventName"
										placeholder="eg: Sports day" />
								</div>
								<label for="eventTag" class="p-t-10">Tag</label>
								<div class="fg-line ">
									<input type="text" class="input-sm form-control" id="eventTag"
										placeholder="Description"/>
								</div>
							</div>

							<div class="form-group">
								<label for="eventName">Tag Color</label>
								<div class="event-tag">
									<span data-tag="bgm-teal" class="bgm-teal selected"></span> <span
										data-tag="bgm-red" class="bgm-red"></span> <span
										data-tag="bgm-pink" class="bgm-pink"></span> <span
										data-tag="bgm-blue" class="bgm-blue"></span> <span
										data-tag="bgm-lime" class="bgm-lime"></span> <span
										data-tag="bgm-green" class="bgm-green"></span> <span
										data-tag="bgm-cyan" class="bgm-cyan"></span> <span
										data-tag="bgm-orange" class="bgm-orange"></span> <span
										data-tag="bgm-purple" class="bgm-purple"></span> <span
										data-tag="bgm-gray" class="bgm-gray"></span> <span
										data-tag="bgm-black" class="bgm-black"></span>
								</div>
							</div>

							<input type="hidden" id="getStart" /> <input type="hidden"
								id="getEnd" />
						</form>
					</div>

					<div class="modal-footer">
						<button type="submit" class="btn btn-link" id="addEvent">Add Event</button>
						<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Edit Event -->
		<div class="modal fade" id="edit-event" data-backdrop="static"
			data-keyboard="false">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Edit Event</h4>
					</div>
					<div class="modal-body">
						<form class="addEvent" role="form">
							<div class="form-group">
								<label for="eventName">User</label><br/>
								<select class="selectpicker" id="name_list_edit" name="name_list_edit" data-live-search="true" disabled>
									<option id="edit0" value="0" >My Calendar</option>
									<?php 
										foreach ($servers as $row):
											echo "<option id='"."edit".$row->user_id."' value='".$row->user_id."'>".$row->name."</option>";
										endforeach;
									?>
				
								</select><br/><br/>
								<label for="eventName1">Event Name</label>
								<div class="fg-line">
									<input type="text" class="input-sm form-control" id="eventName1"
										placeholder="eg: Sports day" />
								</div>
								<label for="eventTag1" class="p-t-10">Tag</label>
								<div class="fg-line ">
									<input type="text" class="input-sm form-control" id="eventTag1"
										placeholder="Description"/>
								</div>
							</div>

							<div class="form-group">
								<label for="eventName">Tag Color</label>
								<div class="event-tag" name="event-tag1" >
									<span data-tag="bgm-teal" id="bgm-teal" class="bgm-teal"></span> <span
										data-tag="bgm-red" id="bgm-red" class="bgm-red"></span> <span
										data-tag="bgm-pink" id="bgm-pink"class="bgm-pink"></span> <span
										data-tag="bgm-blue" id="bgm-blue"class="bgm-blue"></span> <span
										data-tag="bgm-lime" id="bgm-lime"class="bgm-lime"></span> <span
										data-tag="bgm-green" id="bgm-green"class="bgm-green"></span> <span
										data-tag="bgm-cyan" id="bgm-cyan"class="bgm-cyan"></span> <span
										data-tag="bgm-orange" id="bgm-orange"class="bgm-orange"></span> <span
										data-tag="bgm-purple" id="bgm-purple"class="bgm-purple"></span> <span
										data-tag="bgm-gray" id="bgm-gray"class="bgm-gray"></span> <span
										data-tag="bgm-black" id="bgm-black"class="bgm-black"></span>
								</div>
							</div>

							<input type="hidden" id="getStart" /> <input type="hidden"
								id="getEnd" />
						</form>
					</div>

					<div class="modal-footer">
						<button type="submit" class="btn btn-link" id="saveEvent">Save</button>
						<button type="button" class="btn btn-link" id="removeEvent">Delete</button>
						<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
					</div>
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
	src="<?= base_url();?>material/vendors/auto-size/jquery.autosize.min.js"></script>
<script 
	src="<?= base_url();?>material/vendors/bootstrap-select/bootstrap-select.min.js"></script>
<script src="<?= base_url();?>material/vendors/chosen/chosen.jquery.min.js"></script>
<script src="<?= base_url();?>material/vendors/noUiSlider/jquery.nouislider.all.min.js"></script>
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
<script
	src="<?= base_url();?>/material/vendors/fullcalendar/lib/moment.min.js"></script>
<script src="<?= base_url();?>material/js/functions.js"></script>
<script src="<?= base_url();?>material/js/demo.js"></script>

<!-- Drag and drop events for tuch screen devices-->
<script src="<?= base_url();?>wms/js/jquery-ui-touch-punch-master/jquery.ui.touch-punch.js"></script>
<script src="<?= base_url();?>wms/js/jquery-ui-touch-punch-master/jquery.ui.touch-punch.min.js"></script>



<script type="text/javascript">
				var token = '<?php echo $this->security->get_csrf_token_name(); ?>';
				var hash = '<?php echo $this->security->get_csrf_hash(); ?>';
            $(document).ready(function() {
				//Enable copy function on shift keydown
				var copyKey = false;
				$(document).keydown(function (e) {
					copyKey = e.shiftKey;
				}).keyup(function () {
					copyKey = false;
				});
				
                var date = new Date();
                var d = date.getDate();
                var m = date.getMonth();
                var y = date.getFullYear();
				var user_list = document.getElementById("name_list");
				var events_data = {};
				id = "";
				user_id_edit = "";
				restaurant_id_edit = "";
				for (i = 0; i < user_list.length; i++) {
					var user_name = user_list[i].value;
					if(i===0){
						var type = "restaurant";
						id = "<?php echo $user_id;?>";
						//Add Events data to events_data array
						events_data["0"] = {
							url: "<?= base_url();?>calendar/get_events",
							type: 'POST',
							data: {
							'id': id,
							'type': type,
							 '<?php echo $this->security->get_csrf_token_name(); ?>': hash
							}
						}
					}else{
						var type = "user";
						id = user_list[i].id;
						//Add Events data to events_data array
						events_data[user_list[i].id] = {
							url: "<?= base_url();?>calendar/get_events",
							type: 'POST',
							data: {
							'id': id,
							'type': type,
							 '<?php echo $this->security->get_csrf_token_name(); ?>': hash
							}
						}
					}
					
					
					
				}
				
				
				
				//var events_data = "<?= base_url();?>calendar/event_list";
				//$('#calendar').fullCalendar( 'addEventSource', events_data); 
				var cId = $('#calendar'); //Change the name if you want. I'm also using thsi add button for more actions
				var user_id = "0";
				var restaurant_id = "<?php echo $user_id;?>";
                //Generate the Calendar
                cId.fullCalendar({
                    header: {
                        right: '',
                        center: 'prev, title, next',
                        left: ''
                    },

                    theme: true, //Do not remove this as it ruin the design
                    selectable: true,
                    selectHelper: true,
                    editable: true,

                    //Add Events
					eventSources: events_data[0],
					/*
					eventSources: [
						events_data,
						],
						*/
						
                   //events: events_data,
                    //On Day Select
                    select: function(start, end, allDay) {
                        $('#addNew-event').modal('show');   
                        $('#addNew-event input:text').val('');
                        $('#getStart').val(start);
                        $('#getEnd').val(end);
                    },

                    //Update Events
                    
   					eventDrop: 	function(event, delta) {
 					start = moment(event.start).format('YYYY-MM-DD HH:mm:ss');
 					end = moment(event.end).format('YYYY-MM-DD HH:mm:ss');
					//Check for invalid end date and reformat
					if (end==="Invalid date"){
						arr = start.split(" ");
						arr_1 = arr[1].split(":");
						val_1 = Number(arr_1[0])+1;
						end = arr[0]+" "+val_1+":"+arr_1[1]+":"+arr_1[2];
					}
					id = event.id;
					title = event.title;
					className = event.className;
					allDay = event.allDay;
					//alert(className[0]);
					if(allDay==false){
						allDay = "";
					}
 					$ .ajax ({
           				url: "<?php echo base_url(); ?>"+"Calendar/events_update" ,
           				data: {'title': title,'start':start,'end':end,
               				'tag':event.tag,'id':id,'allDay':allDay,'className':className[0],
							'<?php echo $this->security->get_csrf_token_name(); ?>': hash
							},
               				type: 'POST' ,
                       	 ContentType: 'application/json',
           				success: function (json) {
           	 			if(json!="1"){
								notify("top", "right", "fa fa-comments", "danger", "animated fadeIn", "animated fadeIn", "Failed to update! ");
							}
           				},
						
						error: function (request, status, error) {
							console.log(request.responseText);
						}
						
           			});
          			
            		},
                   
                    eventResize: function (event) {
                    start = moment(event.start).format('YYYY-MM-DD HH:mm:ss');
 					end = moment(event.end).format('YYYY-MM-DD HH:mm:ss');
					id = event.id;
					title = event.title;
					className = event.className;
					allDay = event.allDay;
					if(allDay==false){
						allDay = "";
					}
 					$ .ajax ({
           				url: "<?php echo base_url(); ?>"+"Calendar/events_update" ,
           				data: {'title': title,'start':start,'end':end,
               				'tag':event.tag,'id':id,'allDay':allDay,'className':className[0],
							'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
							},
               				type: 'POST' ,
                       	 ContentType: 'application/json',
           				success: function (json) {
							if(json!="1"){
								notify("top", "right", "fa fa-comments", "danger", "animated fadeIn", "animated fadeIn", "Failed to update! ");
							}
           	 			
           				}
           			});
              		
            		},
					
					//Onclick Event, modify event
					eventClick: function(event) {
						//Clear tag color
						 Tagcolor = ["bgm-teal","bgm-red","bgm-pink","bgm-blue","bgm-lime","bgm-green","bgm-cyan","bgm-orange","bgm-purple","bgm-gray","bgm-black"];
						 var x;
						 for(x in Tagcolor){
							 document.getElementById(Tagcolor[x]).className = Tagcolor[x];
						 }
						 
						 $('#edit-event').modal('show');
						 $('#edit-event form')[0].reset();
						 set_edit_option_selected(event.server_id);
						 document.getElementById("eventName1").setAttribute('value',event.title);
						 document.getElementById("eventTag1").setAttribute('value',event.tag);
						 document.getElementById(event.className).className = event.className+" selected";
						 //Save button action #saveEvent
						 $('#saveEvent').unbind('click').bind('click', function(){
							 title = $('#eventName1').val();
							 tag = $('#eventTag1').val();
							 start = moment(event.start).format('YYYY-MM-DD HH:mm:ss');
							 end = moment(event.end).format('YYYY-MM-DD HH:mm:ss');
							 allDay = event.allDay;
							 //alert("Start: "+start+" End: "+end);
							 //var className = $('.event-tag > span.selected').attr('id');
							 tag = $('#eventTag1').val();
							 if(typeof $('.event-tag > span.selected').attr('id') === 'undefined'){
								 className = String(event.className);
							 }else{
								 className = $('.event-tag > span.selected').attr('id');
							 }
							$ .ajax ({
								
								url: "<?php echo base_url(); ?>"+"Calendar/events_update" ,
								data: {'title': title,'allDay':allDay,'server_id':user_id_edit,'restaurant_id':restaurant_id_edit,
								'tag':tag,'id':event.id,'className':className,'tag':tag,'start':start,'end':end,
								'<?php echo $this->security->get_csrf_token_name(); ?>': hash
								},
								type: 'POST' ,
								ContentType: 'application/json',
								success: function (json) {
								if(json!=true){
									$('#edit-event form')[0].reset();
									$('#edit-event').modal('hide');
									e.preventDefault();
									notify("top", "right", "fa fa-comments", "danger", "animated fadeIn", "animated fadeIn", "Failed to save! ");
								}else{
									event.title = title;
									event.className = className;
									event.tag = tag;
									cId.fullCalendar('updateEvent', event);
									$('#edit-event form')[0].reset();
									$('#edit-event').modal('hide');
							
								}
								
							}
							});
						
					 
						 });
						 //Delete button action
						 $('body').on('click', '#removeEvent', function(){
							 $('#edit-event form')[0].reset()
							$('#edit-event').modal('hide');
							 swal({   
								title: "Are you sure?",   
								text: "You will not be able to recover this event!",   
								type: "warning",   
								showCancelButton: true,   
								confirmButtonColor: "#DD6B55",   
								confirmButtonText: "Yes, delete it!",   
								closeOnConfirm: false 
								}, function(){ 
								$ .ajax ({
								
								url: "<?php echo base_url(); ?>"+"Calendar/event_delete" ,
								data: {'id':event.id,
								'<?php echo $this->security->get_csrf_token_name(); ?>': hash
								},
								type: 'POST' ,
								ContentType: 'application/json',
								success: function (json) {
								if(json!="1"){
									notify("top", "right", "fa fa-comments", "danger", "animated fadeIn", "animated fadeIn", "Failed to delete! ");
								}else{
								$('#calendar').fullCalendar('removeEvents',event.id);								
								swal("Deleted!", "Your event has been deleted.", "success"); 	
							
								}
							}
							});
								
								
									
								});
						 });
                        //$('#edit-event').modal('hide');
					//alert('Event: ' + event.tag);
					// change the border color just for fun
					//$(this).css('border-color', 'red');
					},
					
					eventDragStart: function (event, jsEvent, ui, view) {
						//$restaurant_id,$server_id,$title,$start,$end,$allDay,$className,$tag
						if (copyKey){ 
							className = event.className
							start = moment(event.start).format('YYYY-MM-DD HH:mm:ss');
							end = moment(event.end).format('YYYY-MM-DD HH:mm:ss');
							restaurant_id_1 = event.restaurant_id;
							server_id_1 = event.server_id;
							title = event.title;
							className = event.className;
							allDay = event.allDay;
							if(allDay==false){
									allDay = "";
							}
							tag = event.tag;
							//add event to database
							$.ajax({
								url:  "<?php echo base_url(); ?>"+"Calendar/event_add" ,
								data:{'title':title,'className':className[0],'start':start,
								'end':end,'tag':tag,'restaurant_id':restaurant_id_1,'allDay':allDay,
								'server_id':server_id_1,'id':"1",
								'<?php echo $this->security->get_csrf_token_name(); ?>': hash
								},
								type: 'POST' ,
								ContentType: 'application/json',
								success: function (json) {
								if(json!='0'){
								//Render Event
								$('#calendar').fullCalendar('renderEvent',{
									id: json,
									restaurant_id: event.restaurant_id,
									server_id: event.server_id,
									title: event.title,
									start: event.start,
									end: event.end,
									allDay: event.allDay,
									className: className[0],
									tag: event.tag}
                                 ,false ); //Stick the event
								}else{
									notify("top", "right", "fa fa-comments", "danger", "animated fadeIn", "animated fadeIn", "Failed to add!");
								}
								}
							});
						}
						
					}
					
                    
                });

                //Create and ddd Action button with dropdown in Calendar header. 
                var actionMenu = '<ul class="actions actions-alt" id="fc-actions">' +
                                    '<li class="dropdown">' +
                                        '<a href="" data-toggle="dropdown"><i class="md md-more-vert"></i></a>' +
                                        '<ul class="dropdown-menu dropdown-menu-right">' +
                                            '<li class="active">' +
                                                '<a data-view="month" href="">Month View</a>' +
                                            '</li>' +
                                            '<li>' +
                                                '<a data-view="basicWeek" href="">Week View</a>' +
                                            '</li>' +
                                            '<li>' +
                                                '<a data-view="agendaWeek" href="">Agenda Week View</a>' +
                                            '</li>' +
                                            '<li>' +
                                                '<a data-view="basicDay" href="">Day View</a>' +
                                            '</li>' +
                                            '<li>' +
                                                '<a data-view="agendaDay" href="">Agenda Day View</a>' +
                                            '</li>' +
                                        '</ul>' +
                                    '</div>' +
                                '</li>';


                cId.find('.fc-toolbar').append(actionMenu);
                
                //Event Tag Selector
                (function(){
                    $('body').on('click', '.event-tag > span', function(){
                        $('.event-tag > span').removeClass('selected');
                        $(this).addClass('selected');
                    });
                })();
            
                //Add new Event
                $('body').on('click', '#addEvent', function(){
					//alert( moment($('#getStart').val()).local().format('YYYY-MM-DD HH:mm:ss'));
                    var eventName = $('#eventName').val();
					var eventTag = $('#eventTag').val();
                    var tagColor = $('.event-tag > span.selected').attr('data-tag');				
                    if (eventName != '') {
                    	 start =formatDate($('#getStart').val());
                    	 end = formatDate($('#getEnd').val());
                    	 $.ajax({
                    	 url:  "<?php echo base_url(); ?>"+"Calendar/event_add" ,
                    	 data: {'title':eventName,'className':tagColor,'start':start,
                        	 'end':end,'tag':eventTag,'restaurant_id':restaurant_id,'allDay':"1",
                        	 'server_id':user_id,'id':"1",
							 '<?php echo $this->security->get_csrf_token_name(); ?>': hash
							 },
                    	 type: 'POST' ,
                    	 ContentType: 'application/json',
                    	 success: function (json) {
                    	 if(json!='0'){
                    		//Render Event
                             $('#calendar').fullCalendar('renderEvent',{
								 id: json,
								 server_id: user_id,
								 restaurant_id: restaurant_id,
                                 title: eventName,
                                 start: $('#getStart').val(),
                                 end:  $('#getEnd').val(),
								 tag: eventTag,
                                 allDay: true,
                                 className: tagColor
                                 },false ); //Stick the event
                    	 }else{
                        	 notify("top", "right", "fa fa-comments", "danger", "animated fadeIn", "animated fadeIn", "Failed to add!");
                    	 }
                    	
                             
                    	 }
                    	 });
                    	 
                        $('#addNew-event form')[0].reset();
                        $('#addNew-event').modal('hide');
                    }
                    
                    else {
                        $('#eventName').closest('.form-group').addClass('has-error');
                    }
                });
				
				//Format Date Function for Calendar
				function formatDate(date_val){
					var date_array = date_val.split(" ");
					var month_str = date_array[1];
					var day_str = date_array[2];
					var year_str = date_array[3];
					var time_str = date_array[4];
					//Cahnge Month Format
					switch(month_str) {
						case "Jan":
							month_str = "01";
							break;
						case "Feb":
							month_str = "02";
							break;
						case "Mar":
							month_str = "03";
							break;
						case "Apr":
							month_str = "04";
							break;
						case "May":
							month_str = "05";
							break;
						case "Jun":
							month_str = "06";
							break;
						case "Jul":
							month_str = "07";
							break;
						case "Aug":
							month_str = "08";
							break;
						case "Sep":
							month_str = "09";
							break;
						case "Oct":
							month_str = "10";
							break;
						case "Nov":
							month_str = "11";
							break;
						case "Dec":
							month_str = "12";
							break;
					}
					var date_str = year_str+"-"+month_str+"-"+day_str+" "+time_str;//YYYY-MM-DD HH:mm:ss
					return date_str;
				}

				
				//Calendar views
                $('body').on('click', '#fc-actions [data-view]', function(e){
                    e.preventDefault();
                    var dataView = $(this).attr('data-view');
                    
                    $('#fc-actions li').removeClass('active');
                    $(this).parent().addClass('active');
                    cId.fullCalendar('changeView', dataView);  
                });
				
				//Change Id based on selected option
				$('select[name="name_list_add"]').change(function() {
					user_id = $(this).find('option:selected').attr('value');
					//alert(user_id);
					if(user_id==="0"){
						user_id = "0";
						restaurant_id = "<?php echo $user_id;?>";
					}else{
						restaurant_id = "0";
					}
				});
				
				//Change Id based on selected option
				$('select[name="name_list_edit"]').change(function() {
					user_id = $(this).find('option:selected').attr('value');
					//alert(user_id);
					if(user_id==="0"){
						user_id = "0";
						restaurant_id = "<?php echo $user_id;?>";
					}else{
						restaurant_id = "0";
					}
				});
				
				//New Option Menu
				$('#name_list').change(function() {
					var user_list = document.getElementById("name_list");
					var isSelected = user_list.selectedIndex;
					add_remove_events($(this).val());
				});
				
				//Set edit list option selected
				function set_edit_option_selected(userid){
					if(userid==="0"){
						//$("#name_list_edit").val('0');
						
						document.getElementById("edit0").isSelected = true;
						//document.getElementById("edit0").className = "edit0 selected";
						$('#name_list_edit').val("0").change();
						restaurant_id_edit = "<?php echo $user_id;?>";
						user_id_edit = "0";
					}else{
						//$("#name_list_edit").val(userid);
						document.getElementById("edit"+userid).isSelected  = true;
						$('#name_list_edit').val(userid).change();
						
						restaurant_id_edit = "0";
						user_id_edit = userid;
					}
				}
				
				//add and remove event data
				function add_remove_events(array_list){
					var user_list = document.getElementById("name_list");
					//Remove all events
					for (i = 0; i < user_list.length; i++) {
						var list_id = user_list[i].value;
						$('#calendar').fullCalendar( 'removeEventSource',events_data[list_id]);
					}
					//Add all events that are selected
					for (i = 0; i < array_list.length; i++) {
						events_data[array_list[i]].token = hash;
						$('#calendar').fullCalendar( 'addEventSource', events_data[array_list[i]]); 
					}
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
				
            }); 

			
        </script>
</body>
</html>