				<!-- Rate Server -->
		<div class="modal fade" id="rate-server-f" data-backdrop="static"
			data-keyboard="false">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="profile-pic col-sm-3" >
					
					</div>
					<div class="modal-header text-center">
					<img class="img-circle" id="rating-server-icon" 
					onerror="onImgError(this)" width="180" height="180"> 
						<p class="lead" id="rate-server-name"></p>
						<small class="lv-small" id="rate-server-des"></small>
					</div>
					<div class="modal-body">
						<form class="addEvent" role="form">
							<div class="form-group">
							<p class="c-black f-500 m-b-20 m-t-20">How would you rate the quality of your service offered by your Server.</p>
                            <label class="radio radio-inline m-r-20">
                                <input type="radio" name="serviceOptions-f" value="1">
                                <i class="input-helper"></i>  
                                1
                            </label>
                            
                            <label class="radio radio-inline m-r-20">
                                <input type="radio" name="serviceOptions-f" value="2">
                                <i class="input-helper"></i>  
                                2
                            </label>
                            
                            <label class="radio radio-inline m-r-20">
                                <input type="radio" name="serviceOptions" value="3">
                                <i class="input-helper"></i>  
                                3
                            </label>
							
							<label class="radio radio-inline m-r-20">
                                <input type="radio" name="serviceOptions-f" value="4">
                                <i class="input-helper"></i>  
                                4
                            </label>
							
							<label class="radio radio-inline m-r-20">
                                <input type="radio" name="serviceOptions-f" value="5">
                                <i class="input-helper"></i>  
                                5
                            </label>
							</div>
						
						<div class="form-group">
							<p class="c-black f-500 m-b-20 m-t-20">How would you rate the personality of your Server.</p>
                            <label class="radio radio-inline m-r-20">
                                <input type="radio" name="personalityOptions-f" value="1">
                                <i class="input-helper"></i>  
                                1
                            </label>
                            
                            <label class="radio radio-inline m-r-20">
                                <input type="radio" name="personalityOptions-f" value="2">
                                <i class="input-helper"></i>  
                                2
                            </label>
                            
                            <label class="radio radio-inline m-r-20">
                                <input type="radio" name="personalityOptions-f" value="3">
                                <i class="input-helper"></i>  
                                3
                            </label>
							
							<label class="radio radio-inline m-r-20">
                                <input type="radio" name="personalityOptions-f" value="4">
                                <i class="input-helper"></i>  
                                4
                            </label>
							
							<label class="radio radio-inline m-r-20">
                                <input type="radio" name="personalityOptions-f" value="5">
                                <i class="input-helper"></i>  
                                5
                            </label>
							</div>
							
							<div class="form-group">
							<p class="c-black f-500 m-b-20 m-t-20">How would you rate the aesthetic of your Server.</p>
                            <label class="radio radio-inline m-r-20">
                                <input type="radio" name="aestheticsOptions-f" value="1">
                                <i class="input-helper"></i>  
                                1
                            </label>
                            
                            <label class="radio radio-inline m-r-20">
                                <input type="radio" name="aestheticsOptions-f" value="2">
                                <i class="input-helper"></i>  
                                2
                            </label>
                            
                            <label class="radio radio-inline m-r-20">
                                <input type="radio" name="aestheticsOptions-f" value="3">
                                <i class="input-helper"></i>  
                                3
                            </label>
							
							<label class="radio radio-inline m-r-20">
                                <input type="radio" name="aestheticsOptions-f" value="4">
                                <i class="input-helper"></i>  
                                4
                            </label>
							
							<label class="radio radio-inline m-r-20">
                                <input type="radio" name="aestheticsOptions-f" value="5">
                                <i class="input-helper"></i>  
                                5
                            </label>
							</div>
							<div class="form-group">
								<label for="eventName">Comments</label>
								<div class="fg-line">
									<input type="text" class="input-sm form-control" id="comments-f"
										placeholder="eg: Great service!"/>
								</div>
								<small class="text-danger m-l-10" id="rate-warning-message" style="display: none">All feilds required!</small>
							</div>
							
						

							<input type="hidden" id="getStart" /> <input type="hidden"
								id="getEnd" />
						</form>
					</div>
					
					<div class="modal-footer">
						<button type="submit" class="btn btn-link" id="rateServer-f">Rate</button>
					</div>
				</div>
			</div>
		</div>
		<!-- Page Loader -->
        <div class="page-loader" style="visibility: hidden">
		<div class="pl-center">
            <div class="md-preloader">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" 
				height="75" width="75" viewbox="0 0 75 75">
				<circle cx="37.5" cy="37.5" r="33.5" 
				stroke-width="4"/></svg>
                <p>Please wait...</p>
            </div>
		</div>
        </div>
<footer class="text-center navbar-fixed-bottom p-static m-10" id="footer">
            Copyright &copy; WhosMyServer
</footer>
<!-- Javascript Libraries -->
<script src="<?= base_url();?>material/js/jquery-2.1.1.min.js"></script>
<script src="<?= base_url();?>material/js/bootstrap.min.js"></script>
<script src="<?= base_url();?>material/vendors/fullcalendar/lib/moment.min.js"></script>

<script type="text/javascript">
	//Setup Notification Dialogs
	id = "<?php echo $user_data['id'];?>";
	type = "<?php echo $user_data['type'];?>";
	$(document).ready(function() {
		notifcation_ids = [];
		switch(type) {
			case "user":
				//load reservation updates and changes
				$.ajax({
					url:"<?php echo base_url();?>"+"notifications/get_user_notifications",
					type: 'POST',
					ContentType: 'application/json',
					data: {'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'},
					success: function (json){
						//Parse Json data
						//console.log(json);
						json = JSON.parse(json);
						var len = json.length;
						//var dateFormat = require('dateformat');
						var data = "";
						for (i = 0; i < len; i++) {
							notifcation_ids.push({'id':json[i].id,'viewed':1});
							data += 
							"<a class='lv-item' >"+
							"<div class='media'>"+
							"<div class='pull-left'>"+
							"<img class='lv-img-sm' data-name='"+json[i].name+"' onerror='onImgError(this)' src='"+"<?php echo base_url();?>"+json[i].icon_path+"' >"+
                            "</div>"+
                            "<div class='media-body'>"+
                            "<div class='lv-title'>"+json[i].name+"</div>"+
                           "<small class='lv-small'>"+"Reservation Updated"+"</small>"+
                            "<small class='lv-small'>"+moment(json[i].reservation_time, 'YYYY-MM-DD h:mm:ss').format('MMMM Do YYYY, h:mm a')+"</small>"+
                            "</div>"+
							"</div>"+
							"</a>";
						}
						var notificationDiv = document.getElementById("notification-list");
						var notificationCountDiv = document.getElementById("notification-count");
						notificationDiv.innerHTML += data;
						notificationCountDiv.innerHTML = len;
					},
					error: function (request, ajaxOptions, thrownError) {
						console.log(request.responseText);
					}	
				});
				//load server request
				$.ajax({
					url:"<?php echo base_url();?>"+"notifications/get_server_request",
					type: 'POST',
					ContentType: 'application/json',
					data: {'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'},
					success: function (json){
						//Parse Json data
						console.log(json);
						json = JSON.parse(json);
						var len = json.length;
						//var dateFormat = require('dateformat');
						var data = "";
						for (i = 0; i < len; i++) {
							//notifcation_ids.push({'id':json[i].id,'viewed':1});
							data += 
							"<a class='lv-item' >"+
							"<div class='media'>"+
							"<div class='pull-left'>"+
							"<img class='lv-img-sm' data-name='"+json[i].name+"' onerror='onImgError(this)' src='"+"<?php echo base_url();?>"+json[i].icon_path+"' >"+
                            "</div>"+
                            "<div class='media-body'>"+
                            "<div class='lv-title'>"+json[i].name+"</div>"+
                           "<small class='lv-small'>"+"Restaurant Request"+"</small>"+
                            "<div class='btn-group btn-group-justified m-5' role='group'>"+
							"<div class='btn-group' role='group'>"+
							"<button type='button' id='accept-request' onclick='acceptRequest("+json[i].id+","+json[i].restaurant_id+")'class='btn bgm-lightgreen'>Accept</button>"+
							"</div>"+
							"<div class='btn-group' role='group'>"+
							"<button type='button' id='reject-request' onclick='rejectRequest("+json[i].id+","+json[i].restaurant_id+")'class='btn bgm-red'>Ignore</button>"+
							"</div>"+
							"</div>"+
                            "</div>"+
							"</div>"+
							"</a>";
						}
						var notificationDiv = document.getElementById("notification-list");
						var notificationCountDiv = document.getElementById("notification-count");
						notificationDiv.innerHTML += data;
						notificationCountDiv.innerHTML = notifcation_ids.length+len;
					},
					error: function (request, ajaxOptions, thrownError) {
						console.log(request.responseText);
					}	
				});
				
				//Get unrated servers on login
				$.ajax({
					url:"<?php echo base_url();?>"+"reservations/get_unrated_reservations",
					type: 'POST',
					ContentType: 'application/json',
					data: {'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'},
					success: function (json){
						//Parse Json data
						//console.log(json);
						json = JSON.parse(json);
						var len = json.length;
						
						for (i = 0; i < len; i++) {
							//Show modal dialog to rate server
							//console.log(json[i]);
							showrating(json[i]);
						}
					},
					error: function (request, ajaxOptions, thrownError) {
						console.log(request.responseText);
					}	
				});
				
				break;
			case "restaurant":
				//load new notifcations for restaurant
				var len = 0;
				$.ajax({
					url:"<?php echo base_url();?>"+"notifications/get_restaurant_notifications",
					type: 'POST',
					ContentType: 'application/json',
					data: {'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'},
					success: function (json){
						//Parse Json data
						//console.log(json);
						json = JSON.parse(json);
						len = json.length;
						//var dateFormat = require('dateformat');
						var data = "";
						for (i = 0; i < len; i++) {
							notifcation_ids.push({'id':json[i].id,'viewed':1});
							
							data += 
							"<a class='lv-item' >"+
							"<div class='media'>"+
							"<div class='pull-left'>"+
							"<img class='lv-img-sm' data-name='"+json[i].name+"' onerror='onImgError(this)' src='"+"<?php echo base_url();?>"+json[i].icon_path+"' >"+
                            "</div>"+
                            "<div class='media-body'>"+
                            "<div class='lv-title'>"+json[i].name+"</div>"+
                           "<small class='lv-small'>"+json[i].message+"</small>"+
                            "<small class='lv-small'>"+moment(json[i].reservation_time, 'YYYY-MM-DD h:mm:ss').format('MMMM Do YYYY, h:mm:ss a')+"</small>"+
                            "</div>"+
							"</div>"+
							"</a>";
						}
						//console.log(data);
						var notificationDiv = document.getElementById("notification-list");
						var notificationCountDiv = document.getElementById("notification-count");
						notificationDiv.innerHTML += data;
						notificationCountDiv.innerHTML = len;
					},
					error: function (request, ajaxOptions, thrownError) {
						console.log(request.responseText);
					}	
				});
				
				//Server request updates
				$.ajax({
					url:"<?php echo base_url();?>"+"notifications/get_update_request",
					type: 'POST',
					ContentType: 'application/json',
					data: {'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'},
					success: function (json){
						//Parse Json data
						//console.log(json);
						json = JSON.parse(json);
						var len2 = json.length;
						//var dateFormat = require('dateformat');
						var data = "";
						for (i = 0; i < len2; i++) {
							notifcation_ids.push({'id':json[i].id,'viewed':1});
							data += 
							"<a class='lv-item' >"+
							"<div class='media'>"+
							"<div class='pull-left'>"+
							"<img class='lv-img-sm' data-name='"+json[i].name+"' onerror='onImgError(this)' src='"+"<?php echo base_url();?>"+json[i].icon_path+"' >"+
                            "</div>"+
                            "<div class='media-body'>"+
                            "<div class='lv-title'>"+json[i].name+"</div>"+
                           "<small class='lv-small'>"+"Request Update"+"</small>"+
                            "<small class='lv-small'>"+json[i].message+"</small>"+
                            "</div>"+
							"</div>"+
							"</a>";
						}
						var notificationDiv = document.getElementById("notification-list");
						var notificationCountDiv = document.getElementById("notification-count");
						notificationDiv.innerHTML += data;
						notificationCountDiv.innerHTML = len+len2;
					},
					error: function (request, ajaxOptions, thrownError) {
						console.log(request.responseText);
					}	
				});
				break;
		}
		
		//Set notification to viewed onclick
		$('#notification-icon').click(function(){
			if(notifcation_ids.length>0){
			$.ajax({
				url:"<?php echo base_url();?>"+"notifications/notification_set_viewed",
				type: 'POST',
				ContentType: 'application/json',
				data: {'id':JSON.stringify(notifcation_ids),
					'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'},
				success: function(json){
					console.log(json);
				},
				error: function (request, ajaxOptions, thrownError) {
					console.log(request.responseText);
				}				
			});
			}
			return true;
		});
	});
	//Approve restaurant request
	function acceptRequest(id,restaurant_id){
		var server_id = "<?php echo $user_data['id'];?>";
		$ .ajax ({
			url: "<?php echo base_url(); ?>"+"Servers/add_server" ,
			data: {'id':id,'server_id':server_id,'restaurant_id':restaurant_id,
			'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
			},
			type: 'POST' ,
			ContentType: 'application/json',
			success: function (json) {
				if(json){
					document.getElementById('accept-request').parentNode.parentNode.parentNode.parentNode.parentNode.style.display='none';
					swal("Added!", "Restaurant has been added", "success");
				}
			},
			error: function (request, status, error) {
				console.error(request.responseText);
			}
		});
	}
	
	//Decline restaurant request
	function rejectRequest(id,restaurant_id){
		var server_id = "<?php echo $user_data['id'];?>";
		var data_val = [{'id':id,'type':"request-update",'message': "Server Request Declined"}];
		$ .ajax ({
			url: "<?php echo base_url(); ?>"+"notifications/notification_set_viewed" ,
			data: {'id':JSON.stringify(data_val),
			'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
			},
			type: 'POST' ,
			ContentType: 'application/json',
			success: function (json) {
				if(json){
					document.getElementById('reject-request').parentNode.parentNode.parentNode.parentNode.parentNode.style.display='none';
					//$(this).parent().parent().parent().parent().parent().hide();
				}else{
					console.log("Response: "+json+" Restaurant ID: "+restaurant_id);	
				}
			},
			error: function (request, status, error) {
				console.error(request.responseText);
			}
		});
	}
	
	
	//Rate server
	function showrating(json){
		$('#rate-server-f').modal('show');
		$('#rate-server-f form')[0].reset();
		$('#rate-server-name').html('Rate: '+json.server_name);
		$('#rate-server-des').html('Rate your server from '+json.restaurant_name+' on '+moment(json.reservation_time, 'YYYY-MM-DD h:mm:ss').format('MMMM Do YYYY, h:mm a'));
		$('#rating-server-icon').data('name',json.server_name);
		displayImage(json.server_icon_path);
				
		//Save button action #saveEvent
		$('#rateServer-f').unbind('click').bind('click', function(){
			var comments = $('#comments-f').val();
			var service = document.querySelector('input[name="serviceOptions-f"]:checked').value;
			var personality = document.querySelector('input[name="personalityOptions-f"]:checked').value;
			var aesthetics = document.querySelector('input[name="aestheticsOptions-f"]:checked').value;
			var rating = (service*1+personality*1+aesthetics*1)/3;
							 
		if(hasValue(service) && hasValue(personality) && hasValue(aesthetics) && hasValue(aesthetics) &&hasValue(comments)){
				$ .ajax ({
					url: "<?php echo base_url(); ?>"+"Servers/add_rating" ,
					data: {'id':json.id,'restaurant_id':json.restaurant_id,'server_id':json.server_id,
						'service':service,'personality':personality,'aesthetics':aesthetics,'comments':comments,
						'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
					},
					type: 'POST' ,
					ContentType: 'application/json',
					success: function (jsonStr) {
						// preserve newlines, etc - use valid JSON
						jsonStr = jsonStr.replace(/\\n/g, "\\n")  
							.replace(/\\'/g, "\\'")
							.replace(/\\"/g, '\\"')
							.replace(/\\&/g, "\\&")
							.replace(/\\r/g, "\\r")
							.replace(/\\t/g, "\\t")
							.replace(/\\b/g, "\\b")
							.replace(/\\f/g, "\\f");
						// remove non-printable and other non-valid JSON chars
						jsonStr = jsonStr.replace(/[\u0000-\u0019]+/g,""); 
						var json = JSON.parse(jsonStr);
						if(json.success=="1"){
							$('#rate-server-f').modal('hide');
							swal("Rated!", "Server has been rated", "success");
						}else{
							swal("Failed!", "Server has failed to be rated", "error");
							$('#rate-server-f').modal('hide');
						}
					},
					error: function (request, status, error) {
						console.error(request.responseText);
					}	
				});
					
			}else{
				//Show error input block
				$('#rate-warning-message').show();
			}
							 
		});
		return false;
	}
	
	//Display Image
	function displayImage(image_path){
		if(hasValue(image_path)){
			document.getElementById("rating-server-icon").src = "<?php echo base_url(); ?>"+image_path;
		}		
	}	
	
	//Check for empty value
	function hasValue(data) {
		if (data !== undefined && data !== null && data !== ""){
			return true;
		}
		return false;
	}
	
//On image error
function onImgError(context){
	$(context).initial(); 
}

</script>