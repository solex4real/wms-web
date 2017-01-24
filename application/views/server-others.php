<!-- Header -->
            <?php $this->load->view('header');  ?>

<section id="content">

                <div class="container">

                    <div class="block-header">
                        <h2>Contacts<small>Manage your contact information</small></h2>
                
                        <ul class="actions m-t-20 hidden-xs">
                          
                        </ul>
                    </div>
                    
                    <!-- Add button -->
                    <button class="btn btn-float btn-danger m-btn"><i class="zmdi zmdi-plus"></i></button>
                
                    
                    <div class="card">
                        <div class="lv-header-alt clearfix m-b-5">
                            <h2 class="lvh-label hidden-xs">19,453 Records</h2>
                            
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
                                            <a id="current-servers" >Current</a>
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
                                <div class="col-md-2 col-sm-4 col-xs-6">
                                    <div class="c-item">
                                        <a href="" class="ci-avatar">
                                            <img src="img/contacts/1.jpg" alt="">
                                        </a>
                
                                        <div class="c-info">
                                            <strong>Cathy Shelton</strong>
                                            <small>cathy.shelton31@example.com</small>
                                        </div>
                
                                        <div class="c-footer">
                                            <button class="waves-effect"><i class="zmdi zmdi-person-add"></i> Add</button>
                                        </div>
                                    </div>
                                </div>
                
                                <div class="col-md-2 col-sm-4 col-xs-6">
                                    <div class="c-item">
                                        <a href="" class="ci-avatar">
                                            <img src="img/contacts/2.jpg" alt="">
                                        </a>
                
                                        <div class="c-info">
                                            <strong>Stella Flores</strong>
                                            <small>stella@example.com</small>
                                        </div>
                
                                        <div class="c-footer">
                                            <button class="waves-effect"><i class="zmdi zmdi-person-add"></i> Add</button>
                                        </div>
                                    </div>
                                </div>
                
                                <div class="col-md-2 col-sm-4 col-xs-6">
                                    <div class="c-item">
                                        <a href="" class="ci-avatar">
                                            <img src="img/contacts/3.jpg" alt="">
                                        </a>
                
                                        <div class="c-info">
                                            <strong>Marilyn Thomas</strong>
                                            <small>marilyn@example.com</small>
                                        </div>
                
                                        <div class="c-footer">
                                            <button class="waves-effect"><i class="zmdi zmdi-person-add"></i> Add</button>
                                        </div>
                                    </div>
                                </div>
                
                                <div class="col-md-2 col-sm-4 col-xs-6">
                                    <div class="c-item">
                                        <a href="" class="ci-avatar">
                                            <img src="img/contacts/4.jpg" alt="">
                                        </a>
                
                                        <div class="c-info">
                                            <strong>Dwight Gilbert</strong>
                                            <small>dwight@example.com</small>
                                        </div>
                
                                        <div class="c-footer">
                                            <button class="waves-effect"><i class="zmdi zmdi-person-add"></i> Add</button>
                                        </div>
                                    </div>
                                </div>
                
                                <div class="col-md-2 col-sm-4 col-xs-6">
                                    <div class="c-item">
                                        <a href="" class="ci-avatar">
                                            <img src="img/contacts/5.jpg" alt="">
                                        </a>
                
                                        <div class="c-info">
                                            <strong>Cody Moreno</strong>
                                            <small>moreno@example.com</small>
                                        </div>
                
                                        <div class="c-footer">
                                            <button class="waves-effect"><i class="zmdi zmdi-person-add"></i> Add</button>
                                        </div>
                                    </div>
                                </div>
                
                                <div class="col-md-2 col-sm-4 col-xs-6">
                                    <div class="c-item">
                                        <a href="" class="ci-avatar">
                                            <img src="img/contacts/6.jpg" alt="">
                                        </a>
                
                                        <div class="c-info">
                                            <strong>Jamie Freeman</strong>
                                            <small>freeman@example.com</small>
                                        </div>
                
                                        <div class="c-footer">
                                            <button class="waves-effect"><i class="zmdi zmdi-person-add"></i> Add</button>
                                        </div>
                                    </div>
                                </div>
                
                                <div class="col-md-2 col-sm-4 col-xs-6">
                                    <div class="c-item">
                                        <a href="" class="ci-avatar">
                                            <img src="img/contacts/7.jpg" alt="">
                                        </a>
                
                                        <div class="c-info">
                                            <strong>Charles Spencer</strong>
                                            <small>charles@example.com</small>
                                        </div>
                
                                        <div class="c-footer">
                                            <button class="waves-effect"><i class="zmdi zmdi-person-add"></i> Add</button>
                                        </div>
                                    </div>
                                </div>
                
                                <div class="col-md-2 col-sm-4 col-xs-6">
                                    <div class="c-item">
                                        <a href="" class="ci-avatar">
                                            <img src="img/contacts/8.jpg" alt="">
                                        </a>
                
                                        <div class="c-info">
                                            <strong>Vickie Reed</strong>
                                            <small>reed@example.com</small>
                                        </div>
                
                                        <div class="c-footer">
                                            <button class="waves-effect"><i class="zmdi zmdi-person-add"></i> Add</button>
                                        </div>
                                    </div>
                                </div>
                
                                <div class="col-md-2 col-sm-4 col-xs-6">
                                    <div class="c-item">
                                        <a href="" class="ci-avatar">
                                            <img src="img/contacts/9.jpg" alt="">
                                        </a>
                
                                        <div class="c-info">
                                            <strong>Lauren Ruiz</strong>
                                            <small>ruiz@example.com</small>
                                        </div>
                
                                        <div class="c-footer">
                                            <button class="waves-effect"><i class="zmdi zmdi-person-add"></i> Add</button>
                                        </div>
                                    </div>
                                </div>
                
                                <div class="col-md-2 col-sm-4 col-xs-6">
                                    <div class="c-item">
                                        <a href="" class="ci-avatar">
                                            <img src="img/contacts/10.jpg" alt="">
                                        </a>
                
                                        <div class="c-info">
                                            <strong>Marlene Vasquez</strong>
                                            <small>vasquez@example.com</small>
                                        </div>
                
                                        <div class="c-footer">
                                            <button class="waves-effect"><i class="zmdi zmdi-person-add"></i> Add</button>
                                        </div>
                                    </div>
                                </div>
                
                                <div class="col-md-2 col-sm-4 col-xs-6">
                                    <div class="c-item">
                                        <a href="" class="ci-avatar">
                                            <img src="img/contacts/11.jpg" alt="">
                                        </a>
                
                                        <div class="c-info">
                                            <strong>Loretta Morrisonz</strong>
                                            <small>morrisonz@example.com</small>
                                        </div>
                
                                        <div class="c-footer">
                                            <button class="waves-effect"><i class="zmdi zmdi-person-add"></i> Add</button>
                                        </div>
                                    </div>
                                </div>
                
                                <div class="col-md-2 col-sm-4 col-xs-6">
                                    <div class="c-item">
                                        <a href="" class="ci-avatar">
                                            <img src="img/contacts/12.jpg" alt="">
                                        </a>
                
                                        <div class="c-info">
                                            <strong>Yvonne Wood</strong>
                                            <small>wood@example.com</small>
                                        </div>
                
                                        <div class="c-footer">
                                            <button class="waves-effect"><i class="zmdi zmdi-person-add"></i> Add</button>
                                        </div>
                                    </div>
                                </div>
                
                                <div class="col-md-2 col-sm-4 col-xs-6">
                                    <div class="c-item">
                                        <a href="" class="ci-avatar">
                                            <img src="img/contacts/13.jpg" alt="">
                                        </a>
                
                                        <div class="c-info">
                                            <strong>Denise Franklin</strong>
                                            <small>franklin@example.com</small>
                                        </div>
                
                                        <div class="c-footer">
                                            <button class="waves-effect"><i class="zmdi zmdi-person-add"></i> Add</button>
                                        </div>
                                    </div>
                                </div>
                
                                <div class="col-md-2 col-sm-4 col-xs-6">
                                    <div class="c-item">
                                        <a href="" class="ci-avatar">
                                            <img src="img/contacts/14.jpg" alt="">
                                        </a>
                
                                        <div class="c-info">
                                            <strong>Joseph Gonzalez</strong>
                                            <small>gonzalez@example.com</small>
                                        </div>
                
                                        <div class="c-footer">
                                            <button class="waves-effect"><i class="zmdi zmdi-person-add"></i> Add</button>
                                        </div>
                                    </div>
                                </div>
                
                                <div class="col-md-2 col-sm-4 col-xs-6">
                                    <div class="c-item">
                                        <a href="" class="ci-avatar">
                                            <img src="img/contacts/15.jpg" alt="">
                                        </a>
                
                                        <div class="c-info">
                                            <strong>Rick Graham</strong>
                                            <small>graham@example.com</small>
                                        </div>
                
                                        <div class="c-footer">
                                            <button class="waves-effect"><i class="zmdi zmdi-person-add"></i> Add</button>
                                        </div>
                                    </div>
                                </div>
                
                                <div class="col-md-2 col-sm-4 col-xs-6">
                                    <div class="c-item">
                                        <a href="" class="ci-avatar">
                                            <img src="img/contacts/16.jpg" alt="">
                                        </a>
                
                                        <div class="c-info">
                                            <strong>Alexander Bailey</strong>
                                            <small>bailey@example.com</small>
                                        </div>
                
                                        <div class="c-footer">
                                            <button class="waves-effect"><i class="zmdi zmdi-person-add"></i> Add</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-4 col-xs-6">
                                    <div class="c-item">
                                        <a href="" class="ci-avatar">
                                            <img src="img/contacts/1.jpg" alt="">
                                        </a>
                
                                        <div class="c-info">
                                            <strong>Cathy Shelton</strong>
                                            <small>cathy.shelton31@example.com</small>
                                        </div>
                
                                        <div class="c-footer">
                                            <button class="waves-effect"><i class="zmdi zmdi-person-add"></i> Add</button>
                                        </div>
                                    </div>
                                </div>
                
                                <div class="col-md-2 col-sm-4 col-xs-6">
                                    <div class="c-item">
                                        <a href="" class="ci-avatar">
                                            <img src="img/contacts/2.jpg" alt="">
                                        </a>
                
                                        <div class="c-info">
                                            <strong>Stella Flores</strong>
                                            <small>stella@example.com</small>
                                        </div>
                
                                        <div class="c-footer">
                                            <button class="waves-effect"><i class="zmdi zmdi-person-add"></i> Add</button>
                                        </div>
                                    </div>
                                </div>
                
                                <div class="col-md-2 col-sm-4 col-xs-6">
                                    <div class="c-item">
                                        <a href="" class="ci-avatar">
                                            <img src="img/contacts/3.jpg" alt="">
                                        </a>
                
                                        <div class="c-info">
                                            <strong>Marilyn Thomas</strong>
                                            <small>marilyn@example.com</small>
                                        </div>
                
                                        <div class="c-footer">
                                            <button class="waves-effect"><i class="zmdi zmdi-person-add"></i> Add</button>
                                        </div>
                                    </div>
                                </div>
                
                                <div class="col-md-2 col-sm-4 col-xs-6">
                                    <div class="c-item">
                                        <a href="" class="ci-avatar">
                                            <img src="img/contacts/4.jpg" alt="">
                                        </a>
                
                                        <div class="c-info">
                                            <strong>Dwight Gilbert</strong>
                                            <small>dwight@example.com</small>
                                        </div>
                
                                        <div class="c-footer">
                                            <button class="waves-effect"><i class="zmdi zmdi-person-add"></i> Add</button>
                                        </div>
                                    </div>
                                </div>
                
                                <div class="col-md-2 col-sm-4 col-xs-6">
                                    <div class="c-item">
                                        <a href="" class="ci-avatar">
                                            <img src="img/contacts/5.jpg" alt="">
                                        </a>
                
                                        <div class="c-info">
                                            <strong>Cody Moreno</strong>
                                            <small>moreno@example.com</small>
                                        </div>
                
                                        <div class="c-footer">
                                            <button class="waves-effect"><i class="zmdi zmdi-person-add"></i> Add</button>
                                        </div>
                                    </div>
                                </div>
                
                                <div class="col-md-2 col-sm-4 col-xs-6">
                                    <div class="c-item">
                                        <a href="" class="ci-avatar">
                                            <img src="img/contacts/6.jpg" alt="">
                                        </a>
                
                                        <div class="c-info">
                                            <strong>Jamie Freeman</strong>
                                            <small>freeman@example.com</small>
                                        </div>
                
                                        <div class="c-footer">
                                            <button class="waves-effect"><i class="zmdi zmdi-person-add"></i> Add</button>
                                        </div>
                                    </div>
                                </div>
                
                                <div class="col-md-2 col-sm-4 col-xs-6">
                                    <div class="c-item">
                                        <a href="" class="ci-avatar">
                                            <img src="img/contacts/7.jpg" alt="">
                                        </a>
                
                                        <div class="c-info">
                                            <strong>Charles Spencer</strong>
                                            <small>charles@example.com</small>
                                        </div>
                
                                        <div class="c-footer">
                                            <button class="waves-effect"><i class="zmdi zmdi-person-add"></i> Add</button>
                                        </div>
                                    </div>
                                </div>
                
                                <div class="col-md-2 col-sm-4 col-xs-6">
                                    <div class="c-item">
                                        <a href="" class="ci-avatar">
                                            <img src="img/contacts/8.jpg" alt="">
                                        </a>
                
                                        <div class="c-info">
                                            <strong>Vickie Reed</strong>
                                            <small>reed@example.com</small>
                                        </div>
                
                                        <div class="c-footer">
                                            <button class="waves-effect"><i class="zmdi zmdi-person-add"></i> Add</button>
                                        </div>
                                    </div>
                                </div>
                
                                <div class="col-md-2 col-sm-4 col-xs-6">
                                    <div class="c-item">
                                        <a href="" class="ci-avatar">
                                            <img src="img/contacts/9.jpg" alt="">
                                        </a>
                
                                        <div class="c-info">
                                            <strong>Lauren Ruiz</strong>
                                            <small>ruiz@example.com</small>
                                        </div>
                
                                        <div class="c-footer">
                                            <button class="waves-effect"><i class="zmdi zmdi-person-add"></i> Add</button>
                                        </div>
                                    </div>
                                </div>
                
                                <div class="col-md-2 col-sm-4 col-xs-6">
                                    <div class="c-item">
                                        <a href="" class="ci-avatar">
                                            <img src="img/contacts/10.jpg" alt="">
                                        </a>
                
                                        <div class="c-info">
                                            <strong>Marlene Vasquez</strong>
                                            <small>vasquez@example.com</small>
                                        </div>
                
                                        <div class="c-footer">
                                            <button class="waves-effect"><i class="zmdi zmdi-person-add"></i> Add</button>
                                        </div>
                                    </div>
                                </div>
                
                                <div class="col-md-2 col-sm-4 col-xs-6">
                                    <div class="c-item">
                                        <a href="" class="ci-avatar">
                                            <img src="img/contacts/11.jpg" alt="">
                                        </a>
                
                                        <div class="c-info">
                                            <strong>Loretta Morrisonz</strong>
                                            <small>morrisonz@example.com</small>
                                        </div>
                
                                        <div class="c-footer">
                                            <button class="waves-effect"><i class="zmdi zmdi-person-add"></i> Add</button>
                                        </div>
                                    </div>
                                </div>
                
                                <div class="col-md-2 col-sm-4 col-xs-6">
                                    <div class="c-item">
                                        <a href="" class="ci-avatar">
                                            <img src="img/contacts/12.jpg" alt="">
                                        </a>
                
                                        <div class="c-info">
                                            <strong>Yvonne Wood</strong>
                                            <small>wood@example.com</small>
                                        </div>
                
                                        <div class="c-footer">
                                            <button class="waves-effect"><i class="zmdi zmdi-person-add"></i> Add</button>
                                        </div>
                                    </div>
                                </div>
                
                                <div class="col-md-2 col-sm-4 col-xs-6">
                                    <div class="c-item">
                                        <a href="" class="ci-avatar">
                                            <img src="img/contacts/13.jpg" alt="">
                                        </a>
                
                                        <div class="c-info">
                                            <strong>Denise Franklin</strong>
                                            <small>franklin@example.com</small>
                                        </div>
                
                                        <div class="c-footer">
                                            <button class="waves-effect"><i class="zmdi zmdi-person-add"></i> Add</button>
                                        </div>
                                    </div>
                                </div>
                
                                <div class="col-md-2 col-sm-4 col-xs-6">
                                    <div class="c-item">
                                        <a href="" class="ci-avatar">
                                            <img src="img/contacts/14.jpg" alt="">
                                        </a>
                
                                        <div class="c-info">
                                            <strong>Joseph Gonzalez</strong>
                                            <small>gonzalez@example.com</small>
                                        </div>
                
                                        <div class="c-footer">
                                            <button class="waves-effect"><i class="zmdi zmdi-person-add"></i> Add</button>
                                        </div>
                                    </div>
                                </div>
                
                            </div>
                
                            <div class="load-more">
                                <a href=""><i class="zmdi zmdi-refresh-alt"></i> Load More...</a>
                            </div>
                        </div>
                    </div>
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
    
		
		<!-- Javascript Libraries -->
        <script src="<?= base_url();?>material/js/jquery-2.1.1.min.js"></script>
        <script src="<?= base_url();?>material/js/bootstrap.min.js"></script>
        
        <script src="<?= base_url();?>material/vendors/moment/moment.min.js"></script>
        <script src="<?= base_url();?>material/vendors/nicescroll/jquery.nicescroll.min.js"></script>
        <script src="<?= base_url();?>material/vendors/waves/waves.min.js"></script>
        <script src="<?= base_url();?>material/vendors/bootstrap-growl/bootstrap-growl.min.js"></script>
        <script src="<?= base_url();?>material/vendors/sweet-alert/sweet-alert.min.js"></script>
        <script src="<?= base_url();?>material/vendors/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js"></script>
        
        <script src="<?= base_url();?>material/js/functions.js"></script>
        <script src="<?= base_url();?>material/js/demo.js"></script>
        
		
		<script type="text/javascript">
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
                    success: function(data) {
                        // return success
                        if (data.length > 0) {
                            $('#suggestions-server').show();
                            $('#autoSuggestionsList-server').addClass('auto-list');
                            $('#autoSuggestionsList-server').html(data);
                        }
                    }
                });

            }
			
			//Change server search
				$('body').on('click', '#other-servers', function(){	
			
			
					alert('test');
			
			
			});
			
			
			
        }
</script>
		
		
        <!-- Placeholder for IE9 -->
        <!--[if IE 9 ]>
            <script src="vendors/bower_components/jquery-placeholder/jquery.placeholder.min.js"></script>
        <![endif]-->
    
    </body>
</html>