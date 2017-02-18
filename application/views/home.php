<!-- Header -->
<?php 
if($user_data['is_logged_in']){
	$this->load->view('header');
}else{
	$this->load->view('header-pub');
}
?>

<section id="content">
	<div class="container">
		
		<div class="card">
                        <div class="card-header">
                            <h2>Welcome <small>Choose and rate your favourite servers.</small></h2>
                        </div>
                        
                        <div class="card-body card-padding">
                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                  <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                  <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                </ol>
                              
                                <!-- Wrapper for slides -->
                                <div class="carousel-inner" role="listbox">
                                    <div class="item active">
                                        <img src="<?= base_url();?>/wms/images/images/c-1.jpg" alt="">
                                        <div class="carousel-caption">
                                            <h3>Welcome to WhosMyServer</h3>
                                            <p>Reserve and Pick your Own Server!</p>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <img src="<?= base_url();?>/wms/images/images/c-2.jpg" alt="">
                                    </div>
                                    <div class="item">
                                        <img src="<?= base_url();?>/wms/images/images/c-3.jpg" alt="">
                                    </div>
                                </div>
                              
                                <!-- Controls -->
                                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                    <span class="zmdi zmdi-chevron-left" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                    <span class="zmdi zmdi-chevron-right" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>

	
                        <div class="card-body card-padding">
                            <div class="jumbotron">
                                <h2>IOS and Android App coming soon!</h2>
                                <p>We are currently developing our mobile app platform for better user experience.</p>
                                <p><a class="btn btn-primary btn-lg" href="<?= base_url();?>main/about" role="button">Learn more</a></p>
                            </div>
                        
                        </div>
						
						<div class="block-header">
							<h2>Top Restaurants Nearby</h2>
                        
                        
						</div>


	<div class="row-fluid">

		<?php
		foreach ( $data as $row ) {
		echo "<div class='col-sm-4'>";
		echo "<div class='thumbnail' height='400' width='700'>";
		
		$banner_path = $row->banner_path;
		if(empty($row->banner_path)){
			$banner_path = "wms/images/icons/meal-2.png";
		}
		echo "<img src=".base_url().$banner_path." alt=".""." style='height: 100%; width: 100%; object-fit: contain' >";
		echo "<div class='caption'>";
			echo "<h4>".$row->name."</h4>";
			echo "<p>".$row->description."</p>";
		
		
		echo "<div class='m-b-5'>";
		echo "<a href='".base_url()."restaurant/profile/".$row->restaurant_username."' class='btn btn-sm btn-primary waves-button m-r-5' role='button'>Select</a>";
						//echo "<a href='#' class='btn btn-sm btn-default' role='button'>Read more</a>";
						
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
		}
		?>
		
		
		</div>
		
	</div>
</section>
</section>



<!-- Footer -->
<?php 
if($user_data['is_logged_in']){
	$this->load->view('footer');
}else{
	$this->load->view('footer-pub');
}
?>
	
<!-- Vendor CSS -->
<link href="<?= base_url();?>material/vendors/animate-css/animate.min.css" rel="stylesheet">
<link href="<?= base_url();?>material/vendors/noUiSlider/jquery.nouislider.min.css" rel="stylesheet">
<link href="<?= base_url();?>material/vendors/farbtastic/farbtastic.css" rel="stylesheet">
<link href="<?= base_url();?>material/vendors/summernote/summernote.css" rel="stylesheet">
<link href="<?= base_url();?>material/vendors/sweet-alert/sweet-alert.min.css" rel="stylesheet">
<link href="<?= base_url();?>material/vendors/material-icons/material-design-iconic-font.min.css" rel="stylesheet">
<link href="<?= base_url();?>material/vendors/socicon/socicon.min.css" rel="stylesheet">

<script src="<?= base_url();?>material/vendors/sparklines/jquery.sparkline.min.js"></script>
<script
	src="<?= base_url();?>material/vendors/fullcalendar/fullcalendar.min.js"></script>
<script
	src="<?= base_url();?>material/vendors/auto-size/jquery.autosize.min.js"></script>
<script
	src="<?= base_url();?>material/vendors/nicescroll/jquery.nicescroll.min.js"></script>
<script src="<?= base_url();?>material/vendors/waves/waves.min.js"></script>
<script
	src="<?= base_url();?>material/vendors/bootstrap-growl/bootstrap-growl.min.js"></script>
<script
	src="<?= base_url();?>material/vendors/sweet-alert/sweet-alert.min.js"></script>


<script src="<?= base_url();?>material/js/charts.js"></script>
<script src="<?= base_url();?>material/js/functions.js"></script>
<script src="<?= base_url();?>material/js/demo.js"></script>




</body>
</html>