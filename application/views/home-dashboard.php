<!-- Header -->
<?php $this->load->view('header');  ?>

<section id="content">
	<div class="container">
		<div class="block-header">
            <h2>DASHBOARD</h2>
         </div>
		
		<div class="card">
                        <div class="card-header">
							<h2>Reservations Over time <small>Click on the option menu at the right side to change range.</small></h2>
                            
							<div class="lv-actions actions dropdown">
								<a href="" data-toggle="dropdown" aria-expanded="true">
                                    <i class="md md-more-vert"></i>
                                </a>
                                
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <a onclick="updatePlotRange('Today')">Today</a>
                                    </li>
                                    <li>
                                        <a onclick="updatePlotRange('Two Weeks')">Two Weeks</a>
                                    </li>
									<li>
                                        <a onclick="updatePlotRange('6 Months')">6 Months</a>
                                    </li>
									<li>
                                        <a onclick="updatePlotRange('1 Year')">1 Year</a>
                                    </li>
									<li>
                                        <a onclick="updatePlotRange('5 Years')">5 Years</a>
                                    </li>
									<li>
                                        <a onclick="updatePlotRange('Max')">Max</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="card-body card-padding">
                                <div id="visit-over-time" class="flot-chart"></div>
                                <div class="flc-visits"></div>
                        </div>
        </div>
		
		<div class="row">
		<!-- Charts, Data Tables and Servers-->
		<div class="col-sm-12" >
		<div class="mini-charts">
                        <div class="row">
                            
                            
                            <div class="col-sm-3 ">
                                <div class="mini-charts-item bgm-orange">
                                    <div class="clearfix">
                                        <div class="chart stats-line"></div>
                                        <div class="count">
                                            <small>Today's Online Reservations</small>
                                            <h2><?php echo $reservation_total['total-today'];?></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-3 ">
                                <div class="mini-charts-item bgm-bluegray">
                                    <div class="clearfix">
                                        <div class="chart stats-line-2"></div>
                                        <div class="count">
                                            <small>Total Online Reservations</small>
                                            <h2><?php echo $reservation_total['total'];?></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
							
							<div class="col-sm-3 ">
                                <div class="mini-charts-item bgm-lightgreen">
                                    <div class="clearfix">
                                        <div class="chart stats-line"></div>
                                        <div class="count">
                                            <small>Today's Guest Reservations</small>
                                            <h2><?php echo $reservation_total_guest['total-today'];?></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-3 ">
                                <div class="mini-charts-item bgm-cyan">
                                    <div class="clearfix">
                                        <div class="chart stats-line-2"></div>
                                        <div class="count">
                                            <small>Total Guest Reservations</small>
                                            <h2><?php echo $reservation_total_guest['total'];?></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
        </div>
		</div>
		
		<div class="card col-sm-9">
                        <div class="card-header">
                            <h2>Today's Reservations <small>Preview reservations made by customers.</small></h2>
                    </div>
                        
                        
						
						<table id="data-table-command" class="table table-striped table-vmiddle" >
                            <thead>
                                <tr>
									<th data-column-id="icon" data-formatter="icon" data-sortable="false">Server Icon</th>
                                    <th data-column-id="server_name" data-sortable="true" >Server</th>
                                    <th data-column-id="user_name" data-sortable="true">Customer</th>
                                    <th data-column-id="reservation_time" data-identifier="true" data-sortable="true" data-order="desc" >Received</th>
									<th data-column-id="status" data-formatter="status" data-sortable="false">Status</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
        </div>
					
		
		
		<!-- Available Servers -->
		<div class="col-sm-3" >
		
		<div class="card">
		
        <div class="card-header">
			<div class="fg-line">
            <h2>Servers <small>Avialable servers.</small></h2>
			</div>
        </div>
                        <div class="listview">
						<div class="lv-body" id="available-server-list">
						<?php 
							//Show avialable servers
							foreach($available_servers as $row){
								echo "<a class='lv-item' href='". base_url() ."servers/openprofile/".$row->username."'>";
								echo "<div class='media'>";
								echo "<div class='pull-left p-relative'>";
								echo "<img class='lv-img-sm' src=".base_url().$row->icon_path." onerror='onImgError(this);' data-name='".$row->name."' >";
								echo "<i class='chat-status-online'></i>";
								echo "</div>";
								echo "<div class='media-body'>";
								echo "<div class='lv-title'>".$row->name."</div>";
								echo "<small class='lv-small'>Available</small>";
								echo "</div>";
								echo "</div>";
								echo "</a>";
							}
						?>
						</div>	
					</div>						
		</div>
		
		
		
		
		</div>
		</div>
		
		
		
		
		
		
		
					
					
					
					
						<!-- Edit Order -->
		<div class="modal fade" id="edit-order" data-backdrop="static"
			data-keyboard="false">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Edit Order</h4>
					</div>
					<div class="modal-body">
						<form class="addEvent" role="form">
							<div class="form-group">
								<label for="eventName1">Customer's Name</label>
								<div class="fg-line">
									<input type="text" class="input-sm form-control" id="customer-name"
										placeholder="eg: Sports day"/>
								</div>
								<label for="eventTag1" class="p-t-10">Order</label>
								<div class="fg-line ">
									<input type="text" class="input-sm form-control" id="order"
										placeholder="1-milkshake"/>
								</div>
								<label for="eventTag1" class="p-t-10">Notes</label>
								<div class="fg-line ">
									<input type="text" class="input-sm form-control" id="notes"
										placeholder="add chocolate"/>
								</div>
								<label for="staus-select" class="p-t-10">Status</label>
								<div class="fg-line"> 
                                    <select class="selectpicker" id="status-table" name="status-table">
                                        <option value="0" id="pending">Pending</option>
                                        <option value="1" id="waiting">Waiting</option>
                                        <option value="2" id="checked in">Checked In</option>
                                        <option value="3" id="completed">Completed</option>
                                    </select>
                             </div>
							</div>
							
							
							

							<input type="hidden" id="getStart" /> <input type="hidden"
								id="getEnd" />
						</form>
					</div>

					<div class="modal-footer">
						<button type="submit" class="btn btn-link" id="saveOrder">Save</button>
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
	src="<?= base_url();?>material/vendors/sparklines/jquery.sparkline.min.js"></script>
	
	


<script src="<?= base_url();?>material/vendors/flot/jquery.flot.min.js"></script>
        <script src="<?= base_url();?>material/vendors/flot/jquery.flot.resize.min.js"></script>
<script src="<?= base_url();?>material/vendors/flot/plugins/curvedLines.js"></script>
        <script src="<?= base_url();?>material/vendors/sparklines/jquery.sparkline.min.js"></script>
<script
	src="<?= base_url();?>material/vendors/auto-size/jquery.autosize.min.js"></script>
<script
	src="<?= base_url();?>material/vendors/nicescroll/jquery.nicescroll.min.js"></script>
<script src="<?= base_url();?>material/vendors/waves/waves.min.js"></script>
<script
	src="<?= base_url();?>material/vendors/bootstrap-growl/bootstrap-growl.min.js"></script>
<script
	src="<?= base_url();?>material/vendors/sweet-alert/sweet-alert.min.js"></script>
	
	
	<script 
	src="<?= base_url();?>material/vendors/bootstrap-select/bootstrap-select.min.js"></script>
<script src="<?= base_url();?>material/vendors/chosen/chosen.jquery.min.js"></script>
<script src="<?= base_url();?>material/vendors/noUiSlider/jquery.nouislider.all.min.js"></script>
<script src="<?= base_url();?>material/vendors/input-mask/input-mask.min.js"></script>
<script src="<?= base_url();?>material/vendors/farbtastic/farbtastic.min.js"></script>
<script src="<?= base_url();?>material/vendors/summernote/summernote.min.js"></script>


 <script src="<?= base_url();?>material/js/flot-charts/curved-line-chart.js"></script>
 <script src="<?= base_url();?>material/js/flot-charts/line-chart.js"></script>
 <script src="<?= base_url();?>material/vendors/flot/jquery.flot.time.js"></script>
 <script src="<?= base_url();?>material/vendors/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
 
<script src="<?= base_url();?>material/vendors/bootgrid/jquery.bootgrid.min.js"></script>
	
<script src="<?= base_url();?>material/js/charts.js"></script>
<script src="<?= base_url();?>material/js/functions.js"></script>
<script src="<?= base_url();?>material/js/demo.js"></script>


<script type="text/javascript">
	options = [];
	dataset = [];
$(document).ready(function(){
	//Flow Chart
	
	//Get json data
	data = '<?php echo json_encode($reservation_dates);?>';
	data = JSON.parse(data);
	reservation_data = data.result; //Online Reservations
	reservation_data_guest = data.result_guest; //Guest Reservations
	//Parse online reservation data
	var len = Object.keys(reservation_data).length;
	data1 = [];
	for(i = 0; i < len; i++){
		
		var str_date = reservation_data[i].reservation_time;
		var str_total = reservation_data[i].reservation_total;
		var date = str_date.split(" ");
		var val_date = date[0].split("-");
		var val_year = val_date[0];
		var val_month = val_date[1];
		var val_day = val_date[2];
		//Time Value
		var val_time = date[1].split(":"); 
		var val_hour = val_time[0]; 
		var val_minute = val_time[1]; 
		data1.push([gd(val_year, val_month, val_day, val_hour, val_minute), str_total]);
		
	}
	//Parse guest reservation data
	data2 = [];
	var len = Object.keys(reservation_data_guest).length;
	for(i = 0; i < len; i++){
		
		var str_date = reservation_data_guest[i].reservation_time;
		var str_total = reservation_data_guest[i].reservation_total;
		var date = str_date.split(" ");
		var val_date = date[0].split("-");
		var val_year = val_date[0];
		var val_month = val_date[1];
		var val_day = val_date[2];
		//Time Value
		var val_time = date[1].split(":"); 
		var val_hour = val_time[0]; 
		var val_minute = val_time[1]; 
		data2.push([gd(val_year, val_month, val_day, val_hour, val_minute), str_total]);
		
	}
	
	//alert(reservation_data.result);
	/*
	 var data1 = [
        [gd(2013, 1, 2), 1690.25], [gd(2013, 1, 3), 1696.3], [gd(2013, 1, 4), 1659.65],
        [gd(2013, 1, 7), 1668.15], [gd(2013, 1, 8), 1656.1], [gd(2013, 1, 9), 1668.65],
        [gd(2013, 1, 10), 1668.15], [gd(2013, 1, 11), 1680.2], [gd(2013, 1, 14), 1676.7],
        [gd(2013, 1, 15), 1680.7], [gd(2013, 1, 16), 1689.75], [gd(2013, 1, 17), 1687.25],
        [gd(2013, 1, 18), 1698.3], [gd(2013, 1, 21), 1696.8], [gd(2013, 1, 22), 1701.3],
        [gd(2013, 1, 23), 1700.8], [gd(2013, 1, 24), 1686.75], [gd(2013, 1, 25), 1680],
        [gd(2013, 1, 28), 1668.65], [gd(2013, 1, 29), 1671.2], [gd(2013, 1, 30), 1675.7],
        [gd(2013, 1, 31), 1684.25]
    ];
	*/
	/*
    var data2 = [
        [gd(2013, 1, 2), 1674.15], [gd(2013, 1, 3), 1680.15], [gd(2013, 1, 4), 1643.8],
        [gd(2013, 1, 7), 1652.25], [gd(2013, 1, 8), 1640.3], [gd(2013, 1, 9), 1652.75],
        [gd(2013, 1, 10), 1652.25], [gd(2013, 1, 11), 1664.2], [gd(2013, 1, 14), 1660.7],
        [gd(2013, 1, 15), 1664.7], [gd(2013, 1, 16), 1673.65], [gd(2013, 1, 17), 1671.15],
        [gd(2013, 1, 18), 1682.1], [gd(2013, 1, 21), 1680.65], [gd(2013, 1, 22), 1685.1],
        [gd(2013, 1, 23), 1684.6], [gd(2013, 1, 24), 1670.65], [gd(2013, 1, 25), 1664],
        [gd(2013, 1, 28), 1652.75], [gd(2013, 1, 29), 1655.25], [gd(2013, 1, 30), 1659.7],
        [gd(2013, 1, 31), 1668.2]
    ];

	*/
	
    dataset = [
        {
            label: "Online Visits",
            data: data1,
			xaxis:2,
            color: "#26A69A",
            points: {
                fillColor: "#26A69A",
                show: true,
                radius: 2
            },
            lines: {
                show: true,
                lineWidth: 1
            }
        }
		,
        {
            label: "Guest Visits",
            data: data2,
            xaxis:2,
            color: "#FFC107",
            points: {
                fillColor: "#FFC107",
                show: true,
                radius: 2
            },
            lines: {
                show: true,
                lineWidth: 1
            }
        }
    ];

    var dayOfWeek = ["Sun", "Mon", "Tue", "Wed", "Thr", "Fri", "Sat"];

    options = {
        series: {
            shadowSize: 0
        },
        grid : {
            borderWidth: 1,
            borderColor: '#f3f3f3',
            show : true,
            clickable : true,
            hoverable: true,
            mouseActiveRadius: 20,
            labelMargin: 10
        },

        xaxes: [
            {
                color: '#f3f3f3',
                mode: "time",
                tickFormatter: function (val, axis) {
                    return dayOfWeek[new Date(val).getDay()];
                },
                position: "top",
                font :{
                    lineHeight: 13,
                    style: "normal",
                    color: "#9f9f9f"
                }
            },
            {
                color: '#f3f3f3',
                mode: "time",
                timeformat: "%l:%m %p",
				twelveHourClock: true,
                font :{
                    lineHeight: 13,
                    style: "normal",
                    color: "#9f9f9f"
                }
            }
        ],
        yaxis: {
            ticks: 2,
            color: "#f3f3f3",
            tickDecimals: 0,
            font :{
                lineHeight: 13,
                style: "normal",
                color: "#9f9f9f"
            },


        },
        legend: {
            container: '.flc-visits',
            backgroundOpacity: 0.5,
            noColumns: 0,
            font :{
                lineHeight: 13,
                style: "normal",
                color: "#9f9f9f"
            },
        }
    };

    
	
	
    if ($('#visit-over-time')[0]) {
        $.plot($("#visit-over-time"), dataset, options);
    }
	
	
});

function gd(year, month, day, hour=0, minute=0) {
    return new Date(year, month - 1, day, hour, minute).getTime();
}

//Change plot range on graph
function updatePlotRange(range){
	
	$.ajax({
		url:"<?php echo base_url();?>"+"reservations/get_reservation_dates",
		type: 'POST',
		ContentType: 'application/json',
		data: {'range':range,
			'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'},
		success: function (json){
			//Parse Json data
			//console.log(json);
			json = JSON.parse(json);
			reservation_data = json.result;
			reservation_data_guest = json.result_guest;
			var len = Object.keys(reservation_data).length;
			data1 = [];
			for(i = 0; i < len; i++){
				var str_date = reservation_data[i].reservation_time;
				var str_total = reservation_data[i].reservation_total;
				var date = str_date.split(" ");
				var val_date = date[0].split("-");
				var val_year = val_date[0];
				var val_month = val_date[1];
				var val_day = val_date[2];
				//Time Value
				var val_time = date[1].split(":"); 
				var val_hour = val_time[0]; 
				var val_minute = val_time[1]; 
				data1.push([gd(val_year, val_month, val_day, val_hour, val_minute), str_total]);
			}
			data2 = [];
			var len = Object.keys(reservation_data_guest).length;
			for(i = 0; i < len; i++){
				var str_date = reservation_data_guest[i].reservation_time;
				var str_total = reservation_data_guest[i].reservation_total;
				var date = str_date.split(" ");
				var val_date = date[0].split("-");
				var val_year = val_date[0];
				var val_month = val_date[1];
				var val_day = val_date[2];
				//Time Value
				var val_time = date[1].split(":"); 
				var val_hour = val_time[0]; 
				var val_minute = val_time[1]; 
				data2.push([gd(val_year, val_month, val_day, val_hour, val_minute), str_total]);
			}
			//Modify Data set
			dataset[0].data = data1;
			dataset[1].data = data2;
			switch(range){
				case 'Today':
					options.xaxes[1].timeformat = "%l:%m %p";
					break;
				case 'Two Weeks':
					options.xaxes[1].timeformat = "%b/%d";
					break;
				case '6 Months':
					options.xaxes[1].timeformat = "%b";
					break;
				case '1 Year':
					options.xaxes[1].timeformat = "%b, %Y";
					break;
				case '5 Years':
					options.xaxes[1].timeformat = "%Y";
					break;
				case 'Max':
					options.xaxes[1].timeformat = "%Y";
					break;
			}
			//options.xaxes[1].timeformat = "%m/%d/%y";
			$.plot($("#visit-over-time"), dataset, options);
		},
		error: function (request, ajaxOptions, thrownError) {
			console.log(request.responseText);
		}	
	});
	
	return false;
}
				
</script>

<script type="text/javascript">
$(document).ready(function(){
	
	//Data Tables
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
						reservations = response['rows'];
					return response; },
					
					post: function ()
					{
					return {
						restaurant_id: "<?php echo $user_data['id'];?>",
						'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
						};
					},
					url: "<?php echo base_url();?>"+"Reservations/get_today_reservations",
				formatters: {
                        
						"status": function(column, row) {
							var status_text = ["pending","waiting","checked in","completed"];
							var status_color = ["bgm-red","bgm-yellow","bgm-bluegray","bgm-green"];
                            return "<button type=\"button\" class=\"btn "+status_color[row.status]+" col-lg-8\" data-row-id=\"" + row.reservation_id + "\">"+status_text[row.status]+"</button>" ;
                        },
						"icon": function(column, row) {
                            return "<img class='img-circle' onerror='onImgError(this);' data-name='"+row.user_name+"' src='"+"<?php echo base_url();?>"+row.icon_path+"' width='30' height='30'>" ;
                        }
                }
				}).on("loaded.rs.jquery.bootgrid", function(e, rows)
					
					
				{
				/* Executes after data is loaded and rendered */
				
				});
	
				
});

</script>		



</body>
</html>