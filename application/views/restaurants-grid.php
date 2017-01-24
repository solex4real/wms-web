<!-- Header -->
<?php $this->load->view('header');  ?>

<section id="content">
	<div class="container">
		<div class="block-header">
			<h2>RESTAURANTS</h2>

			<ul class="actions">
				<li><a href=""> <i class="md md-trending-up"></i>
				</a></li>
				<li><a href=""> <i class="md md-done-all"></i>
				</a></li>
				<li class="dropdown"><a href="" data-toggle="dropdown"> <i
						class="md md-more-vert"></i>
				</a>

					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="">Refresh</a></li>
						<li><a href="">Manage Widgets</a></li>
						<li><a href="">Widgets Settings</a></li>
					</ul></li>
			</ul>

		</div>
		
		
		<div class="card-body card-padding">

		<?php
		foreach ( $data as $row ) {
		echo "<div class='col-sm-4'>";
		echo "<div class='thumbnail'>";
		echo "<img src=".base_url()."wms/images/restaurants/banner/".$row->id.".jpg"." alt="."".">";
		echo "<div class='caption'>";
			echo "<h4>".$row->name."</h4>";
			echo "<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam.";
			echo "Donec id elit non mi porta gravida at eget metus. Nullam id dolor";
			echo "id nibh ultricies vehicula ut id elit.</p>";
		
		echo "<div class='m-b-5'>";
		echo "<a href='#' class='btn btn-sm btn-primary waves-button m-r-5' role='button'>Reserve</a>";
						echo "<a href='#' class='btn btn-sm btn-default' role='button'>Read more</a>";
						
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



<!-- Older IE warning message -->
<!--[if lt IE 9]>
            <div class="ie-warning">
                <h1 class="c-white">IE SUCKS!</h1>
                <p>You are using an outdated version of Internet Explorer, upgrade to any of the following web browser <br/>in order to access the maximum functionality of this website. </p>
                <ul class="iew-download">
                    <li>
                        <a href="http://www.google.com/chrome/">
                            <img src="img/browsers/chrome.png" alt="">
                            <div>Chrome</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.mozilla.org/en-US/firefox/new/">
                            <img src="img/browsers/firefox.png" alt="">
                            <div>Firefox</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://www.opera.com">
                            <img src="img/browsers/opera.png" alt="">
                            <div>Opera</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.apple.com/safari/">
                            <img src="img/browsers/safari.png" alt="">
                            <div>Safari</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                            <img src="img/browsers/ie.png" alt="">
                            <div>IE (New)</div>
                        </a>
                    </li>
                </ul>
                <p>Upgrade your browser for a Safer and Faster web experience. <br/>Thank you for your patience...</p>
            </div>   
        <![endif]-->

<!-- Javascript Libraries -->
<script src="<?= base_url();?>material/js/jquery-2.1.1.min.js"></script>
<script src="<?= base_url();?>material/js/bootstrap.min.js"></script>

<script src="<?= base_url();?>material/vendors/flot/jquery.flot.min.js"></script>
<script
	src="<?= base_url();?>material/vendors/flot/jquery.flot.resize.min.js"></script>
<script
	src="<?= base_url();?>material/vendors/flot/plugins/curvedLines.js"></script>
<script
	src="<?= base_url();?>material/vendors/sparklines/jquery.sparkline.min.js"></script>
<script
	src="<?= base_url();?>material/vendors/easypiechart/jquery.easypiechart.min.js"></script>

<script
	src="<?= base_url();?>material/vendors/fullcalendar/lib/moment.min.js"></script>
<script
	src="<?= base_url();?>material/vendors/fullcalendar/fullcalendar.min.js"></script>
<script
	src="<?= base_url();?>material/vendors/simpleWeather/jquery.simpleWeather.min.js"></script>
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
	src="<?= base_url();?>material/js/flot-charts/curved-line-chart.js"></script>
<script src="<?= base_url();?>material/js/flot-charts/line-chart.js"></script>
<script src="<?= base_url();?>material/js/charts.js"></script>

<script src="<?= base_url();?>material/js/charts.js"></script>
<script src="<?= base_url();?>material/js/functions.js"></script>
<script src="<?= base_url();?>material/js/demo.js"></script>


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

</body>
</html>