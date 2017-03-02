<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>WMS WEB</title>
<link rel="icon" href="<?= base_url();?>wms/images/icons/logo-small.png">




<!-- Vendor CSS -->
<link href="<?= base_url();?>material/vendors/bootgrid/jquery.bootgrid.min.css" 
	rel="stylesheet">
<link
	href="<?= base_url();?>material/vendors/animate-css/animate.min.css"
	rel="stylesheet">
<link
	href="<?= base_url();?>material/vendors/fullcalendar/fullcalendar.css"
	rel="stylesheet">
<link
	href="<?= base_url();?>material/vendors/sweet-alert/sweet-alert.min.css"
	rel="stylesheet">
<link
	href="<?= base_url();?>material/vendors/material-icons/material-design-iconic-font.min.css"
	rel="stylesheet">
<link href="<?= base_url();?>material/vendors/socicon/socicon.min.css"
	rel="stylesheet">
<!-- Vendor CSS -->
<link href="<?= base_url();?>material/vendors/noUiSlider/jquery.nouislider.min.css" rel="stylesheet">
<link href="<?= base_url();?>material/vendors/farbtastic/farbtastic.css" rel="stylesheet">
<link href="<?= base_url();?>material/vendors/summernote/summernote.css" rel="stylesheet">
<link href="<?= base_url();?>material/new-lib/CSS/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">

<!-- CSS -->
<link href="<?= base_url();?>material/css/app.min.1.css"
	rel="stylesheet">
<link href="<?= base_url();?>material/css/app.min.2.css"
	rel="stylesheet">
<!-- My CSS -->
<link href="<?= base_url();?>wms/css/style.css" 
	rel="stylesheet">
<!-- Preloader Library-->
<link href="<?= base_url();?>wms/css/md-preloader-master/md-preloader.min.css" 
	rel="stylesheet">


</head>
<body>
	<header id="header">
		<ul class="header-inner">
			<li id="menu-trigger" data-trigger="#sidebar">
				<div class="line-wrap">
					<div class="line top"></div>
					<div class="line center"></div>
					<div class="line bottom"></div>
				</div>
			</li>

			<li class="logo hidden-xs">
			
			<a href="<?= base_url();?>">
			<img src="<?= base_url();?>wms/images/icons/logo-small.png" alt="logo" />
			Who's My Server</a></li>

			<li class="pull-right">
				<ul class="top-menu">
					<li id="toggle-width">
						<div class="toggle-switch">
							<input id="tw-switch" type="checkbox" hidden="hidden"> <label
								for="tw-switch" class="ts-helper"></label>
						</div>
					</li>
					<li id="top-search"><a class="tm-search" href=""></a></li>

					<!-- message section -->

					<li class="dropdown" id="notification-icon"><a data-toggle="dropdown"
						class="tm-notification" href=""><i id="notification-count" class="tmn-counts"><?php if(!empty($notification)){
							echo count($notification);
						}else{
							echo 0;
						}
						?></i></a>
						<div class="dropdown-menu dropdown-menu-lg pull-right">
						
						<div class="listview" id="notifications">
                                <div class="lv-header">
                                    Notification
                    
                                    <ul class="actions">
                                        <li class="dropdown">
                                            <a href="" data-clear="notification">
                                                <i class="md md-done-all"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
								<div class="lv-body c-overflow" id="notification-list">
								<?php
									if(!empty($notification)){
										foreach($notification as $row){
											echo "<a class='lv-item' >";
											echo "<div class='media'>";
                                            echo "<div class='pull-left'>";
                                            echo "<img class='lv-img-sm' src=".base_url().$row->icon_path." >";
                                            echo "</div>";
                                            echo "<div class='media-body'>";
                                            echo "<div class='lv-title'>".$row->name."</div>";
                                            echo "<small class='lv-small'>".date('D, M d, Y', strtotime($row->reservation_time))."</small>";
                                            echo "</div>";
											echo "</div>";
											echo "</a>";
										}
									}
								?>
								</div>
						</div>
							
						</div></li>
					
					<li class="dropdown"><a data-toggle="dropdown" class="tm-settings"
						href=""></a>
						<ul class="dropdown-menu dm-icon pull-right">
							<li><a data-action="fullscreen" href=""><i
									class="md md-fullscreen"></i> Toggle Fullscreen</a></li>
							<li><a data-action="clear-localstorage" href=""><i
									class="md md-delete"></i> Clear Local Storage</a></li>
					
						</ul></li>
					<li ><a
						  class="pull-right p-5" href="<?= base_url();?>main/about">
						 <img  src="<?= base_url();?>wms/images/icons/info-md.png" alt="logo" />
						 </a></li>
				</ul>
			</li>
		</ul>

		<!-- Top Search Content -->
		<div id="top-search-wrap">
			<input id="search_data" name="search_data" type="text" onkeyup="ajaxSearch();"> 
			<i id="top-search-close">&times;</i>
			<div id="suggestions" class="row">
				<div id="autoSuggestionsList" class="z-depth-2 / z-depth(2) col-lg-4 col-md-offset-4 p-0"></div>
			</div>
		</div>
		</div>
	</header>
	

	
<!-- top search Javascript -->
<script type="text/javascript">

        function ajaxSearch() {
            var input_data = $('#search_data').val();
            if (input_data.length === 0) {
                $('#suggestions').hide();
            } else {

                var post_data = {
                    'search_data': input_data,
                    '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
                };

                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>home/autocomplete/",
                    data: post_data,
                    success: function(data) {
                        // return success
                        if (data.length > 0) {
                            $('#suggestions').show();
                            $('#autoSuggestionsList').addClass('auto_list');
                            $('#autoSuggestionsList').html(data);
                        }
                    }
                });

            }
        }
		
</script>

	<section id="main">
		<!-- Side Navigation -->
            <?php $this->load->view('sidebar');  ?>
            <!-- Chat Navigation -->