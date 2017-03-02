<!-- Header -->
            <?php $this->load->view('header');  ?>

<section id="content">

                <div class="container">

                    <div class="block-header">
                        <h2>Servers Contacts<small>Manage your servers information</small></h2>
                
                        <ul class="actions m-t-20 hidden-xs">
                          
                        </ul>
                    </div>
                    
                    <!-- Add button -->
                    <button class="btn btn-float btn-danger m-btn"><i class="zmdi zmdi-plus"></i></button>
                
                    
                    <div class="card">
                        <div class="lv-header-alt clearfix m-b-5">
                            <h2 class="lvh-label hidden-xs">Records</h2>
                            
                            <div class="lvh-search">
                                <input type="text" id="server-search" name="server-search" placeholder="Start typing..." class="lvhs-input" onkeyup="ajaxSearchServer();">
                                
                                <i class="lvh-search-close">&times;</i>
								<div id="suggestions-server" class="row">
									<div id="autoSuggestionsList-server" class=" col-lg-18  col-md-offset-0 m-r-10 m-l-10"></div>
								</div>
                            </div>
                            
                            <ul class="lv-actions actions">
                                <li>
                                    <a href="" class="lvh-search-trigger">
                                        <i class="zmdi zmdi-search"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="zmdi zmdi-time"></i>
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a href="" data-toggle="dropdown"="" aria-expanded="false" aria-haspopup="true">
                                        <i class="zmdi zmdi-sort"></i>
                                    </a>
                
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li>
                                            <a href="">Last Modified</a>
                                        </li>
                                        <li>
                                            <a href="">Last Edited</a>
                                        </li>
                                        <li>
                                            <a href="">Name</a>
                                        </li>
                                        <li>
                                            <a href="">Date</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="zmdi zmdi-info"></i>
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a href="" data-toggle="dropdown"="" aria-expanded="false" aria-haspopup="true">
                                        <i class="zmdi zmdi-more-vert"></i>
                                    </a>
                
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li>
                                            <a id="Contact" >Current</a>
                                        </li>
                                        <li>
                                            <a id="other-servers">Others</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        
                        
                        <div class="card-body card-padding">
                            
                            <div class="contacts clearfix row">
							<?php
								foreach ( $data as $row ) {
									echo "<div class='col-md-2 col-sm-4 col-xs-6'>";
									echo "<div class='c-item'>";
									echo "<a href='' class='ci-avatar'>";
									echo "<img class='server-icon' onerror='onImgError(this);' data-name='".$row->name."' src=".base_url().$row->icon_path." alt="."".">";
									echo "</a>";
									echo "<div class='c-info'>";
									echo "<strong>".$row->name."</strong>";
									echo "<strong>".$row->email."</strong>";
									echo "</div>";
									echo "<div class='c-footer'>";
									echo "<button class='waves-effect' onclick=openprofile('".$row->username."'); return false;>
									<a class='zmdi zmdi-person-add' href='". base_url() ."/servers/openprofile/".$row->username."'>
									</a> Select</button>";
						
									echo "</div>";
									echo "</div>";
									echo "</div>";
								}
							?>
							
							
                               
                
                                
                                <br/>
                                <br/>
                                <br/>
                                <br/>
                                <br/>
                                <br/>
                
                            </div>
                
                           
                        </div>
                    </div>
					
					<!-- Add block space to aviod view bug -->
					<?php $this->load->view('block-space');  ?>
                </div>  

            </section>
        </section>
        
        
        <!-- Older IE warning message -->
        <!--[if lt IE 9]>
            <div class="ie-warning">
                <h1 class="c-white">Warning!!</h1>
                <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
                <div class="iew-container">
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
                </div>
                <p>Sorry for the inconvenience!</p>
            </div>   
        <![endif]-->
    
		<?php $this->load->view('footer');?>
        
        <script src="<?= base_url();?>material/vendors/moment/moment.min.js"></script>
        <script src="<?= base_url();?>material/vendors/nicescroll/jquery.nicescroll.min.js"></script>
        <script src="<?= base_url();?>material/vendors/waves/waves.min.js"></script>
        <script src="<?= base_url();?>material/vendors/bootstrap-growl/bootstrap-growl.min.js"></script>
        <script src="<?= base_url();?>material/vendors/sweet-alert/sweet-alert.min.js"></script>
        <script src="<?= base_url();?>material/vendors/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js"></script>
        
        <script src="<?= base_url();?>material/js/functions.js"></script>
        <script src="<?= base_url();?>material/js/demo.js"></script>
        
		
		<script type="text/javascript">
		//Strech image of server to fit div container
		$(function() {
			var width = $('img.server-icon').css('width');
			$('img.server-icon').css({'height':width});
			$(window).on('resize', function(){
				var width = $('img.server-icon').css('width');
				$('img.server-icon').css({'height':width});
			});
		});
		
		
        function ajaxSearchServer() {
            var input_data = $('#server-search').val();
            if (input_data.length === 0) {
                $('#suggestions-server').hide();
            } else {

                var post_data = {
                    'search_data': input_data,
                   '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
                };

                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>servers/autocomplete/",
                    data: post_data,
                    success: function(json) {
						//console.log(json);
						div = "";
						len = 0;
                        // parse json
						json = JSON.parse(json);
						if(json != null){
							len = json.length;
							for(i = 0;i < len;i++){
								div += "<div><a href='"+'<?= base_url();?>'+"servers/openprofile/" +json[i].username+" ' class='list-group-item'>"+json[i].name+"</a></div>";
							}
						}
                        if (len > 0) {
                            $('#suggestions-server').show();
                            $('#autoSuggestionsList-server').addClass('auto-list');
                            $('#autoSuggestionsList-server').html(div);
                        }
                    }
                });

            }
        }
		
        function openprofile(username) {
            window.location.href = "<?php echo base_url(); ?>servers/openprofile/"+username;           
        }
		
</script>
		
		
        <!-- Placeholder for IE9 -->
        <!--[if IE 9 ]>
            <script src="vendors/bower_components/jquery-placeholder/jquery.placeholder.min.js"></script>
        <![endif]-->
    
    </body>
</html>