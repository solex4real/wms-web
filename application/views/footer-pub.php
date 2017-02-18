
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
//On image error
function onImgError(context){
	$(context).initial(); 
}
</script>