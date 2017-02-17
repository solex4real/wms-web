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
			

			<li class="logo hidden-xs">
			
			<a href="<?= base_url();?>">
			<img src="<?= base_url();?>wms/images/icons/logo-small.png" alt="logo" />
			Who's My Server</a></li>

			<li class="pull-right">
				<ul class="top-menu">
					
					<li id="top-search"><a class="tm-search" href=""></a></li>
					<li ><a class="pull-right f-700 p-10" href="<?= base_url()?>/main/login">SIGN IN</a></li>

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
		