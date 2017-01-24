<!-- Header -->
            <?php $this->load->view('header');  ?>
            
            <section id="content">
                <div class="container">
                    <div class="block-header">
                        <h2>Malinda Hollaway <small>Web/UI Developer, Dubai, United Arab Emirates</small></h2>
                        
                        <ul class="actions m-t-20 hidden-xs">
                            <li class="dropdown">
                                <a href="" data-toggle="dropdown">
                                    <i class="md md-more-vert"></i>
                                </a>
                    
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <a href="">Privacy Settings</a>
                                    </li>
                                    <li>
                                        <a href="">Account Settings</a>
                                    </li>
                                    <li>
                                        <a href="">Other Settings</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="card" id="profile-main">
                        <div class="pm-overview c-overflow">
                            <div class="pmo-pic">
                                <div class="p-relative">
                                    <a href="">
                                        <img src="<?= base_url();?>material/img/profile-pics/profile-pic-2.jpg" alt=""> 
                                    </a>
                                    
                                    <div class="dropdown pmop-message">
                                        <a data-toggle="dropdown" href="" class="btn bgm-white btn-float z-depth-1">
                                            <i class="md md-message"></i>
                                        </a>
                                        
                                        <div class="dropdown-menu">
                                            <textarea placeholder="Write something..."></textarea>
                                            
                                            <button class="btn bgm-green btn-icon"><i class="md md-send"></i></button>
                                        </div>
                                    </div>
                                    
                                    <a href="" class="pmop-edit">
                                        <i class="md md-camera-alt"></i> <span class="hidden-xs">Update Profile Picture</span>
                                    </a>
                                </div>
                                
                                
                                <div class="pmo-stat">
                                    <h2 class="m-0 c-white">1562</h2>
                                    Total Connections
                                </div>
                            </div>
                            
                            <div class="pmo-block pmo-contact hidden-xs">
                                <h2>Contact</h2>
                                
                                <ul>
                                    <li><i class="md md-phone"></i> 00971 12345678 9</li>
                                    <li><i class="md md-email"></i> malinda-h@gmail.com</li>
                                    <li><i class="socicon socicon-skype"></i> malinda.hollaway</li>
                                    <li><i class="socicon socicon-twitter"></i> @malinda (twitter.com/malinda)</li>
                                    <li>
                                        <i class="md md-location-on"></i>
                                        <address class="m-b-0">
                                            10098 ABC Towers, <br/>
                                            Dubai Silicon Oasis, Dubai, <br/>
                                            United Arab Emirates
                                        </address>
                                    </li>
                                </ul>
                            </div>
                            
                         
                        </div>
                        
                       <div class="pm-body clearfix">
                            <ul class="tab-nav tn-justified">
                                <li class="active waves-effect"><a href="<?= base_url();?>restaurant_order">Menu</a></li>
								<li class="waves-effect"><a href="<?= base_url();?>restaurant_order/about">About</a></li>
                            </ul>
                            <div class="pmb-block clearfix photos">
                                <div class="p-header">
                                    <ul class="p-menu">
                                       
                                    </ul>
                            
							<ul class="actions m-t-20 hidden-xs">
                                        <li class="dropdown">
                                            <a href="" data-toggle="dropdown">
                                                <i class="md md-more-vert"></i>
                                            </a>
                                
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li>
                                                    <a href="">Refresh</a>
                                                </li>
                                                <li>
                                                    <a href="">Settings</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                
                                <button class="btn btn-float btn-danger" id="sa-success"><i class="md md-add"></i></button>
                                    
                                
                                <div class="lightbox row">
                                    <div data-src="<?= base_url();?>wms/images/restaurants/menu/1.jpg" class="col-md-3 col-sm-4 col-xs-6">
                                        <div class="lightbox-item p-item">
                                            <img src="<?= base_url();?>wms/images/restaurants/menu/1.jpg" alt="" />
                                        </div>
                                    </div>
                                    
                                    <div data-src="<?= base_url();?>wms/images/restaurants/menu/2.jpg" class="col-md-3 col-sm-4 col-xs-6">
                                        <div class="lightbox-item p-item">
                                            <img src="<?= base_url();?>wms/images/restaurants/menu/2.jpg" alt="" />
                                        </div>
                                    </div>
                                    
                                    <div data-src="<?= base_url();?>wms/images/restaurants/menu/3.jpg" class="col-md-3 col-sm-4 col-xs-6">
                                        <div class="lightbox-item p-item">
                                            <img src="<?= base_url();?>wms/images/restaurants/menu/3.jpg" alt="" />
                                        </div>
                                    </div>
                                    
                                    <div data-src="<?= base_url();?>wms/images/restaurants/menu/4.jpg" class="col-md-3 col-sm-4 col-xs-6">
                                        <div class="lightbox-item p-item">
                                            <img src="<?= base_url();?>wms/images/restaurants/menu/4.jpg" alt="" />
                                        </div>
                                    </div>
                                    
                                    <div data-src="<?= base_url();?>wms/images/restaurants/menu/5.jpg" class="col-md-3 col-sm-4 col-xs-6">
                                        <div class="lightbox-item p-item">
                                            <img src="<?= base_url();?>wms/images/restaurants/menu/5.jpg" alt="" />
                                        </div>
                                    </div>
                                    <div data-src="<?= base_url();?>wms/images/restaurants/menu/6.jpg" class="col-md-3 col-sm-4 col-xs-6">
                                        <div class="lightbox-item p-item">
                                            <img src="<?= base_url();?>wms/images/restaurants/menu/6.jpg" alt="" />
                                        </div>
                                    </div>
                                    <div data-src="<?= base_url();?>wms/images/restaurants/menu/7.jpg" class="col-md-3 col-sm-4 col-xs-6">
                                        <div class="lightbox-item p-item">
                                            <img src="<?= base_url();?>wms/images/restaurants/menu/7.jpg" alt="" />
                                        </div>
                                    </div>
                                    <div data-src="<?= base_url();?>wms/images/restaurants/menu/8.jpg" class="col-md-3 col-sm-4 col-xs-6">
                                        <div class="lightbox-item p-item">
                                            <img src="<?= base_url();?>wms/images/restaurants/menu/8.jpg" alt="" />
                                        </div>
                                    </div>
                                    <div data-src="<?= base_url();?>wms/images/restaurants/menu/9.jpg" class="col-md-3 col-sm-4 col-xs-6">
                                        <div class="lightbox-item p-item">
                                            <img src="<?= base_url();?>wms/images/restaurants/menu/9.jpg" alt="" />
                                        </div>
                                    </div>
                                    <div data-src="<?= base_url();?>wms/images/restaurants/menu/1.jpg" class="col-md-3 col-sm-4 col-xs-6">
                                        <div class="lightbox-item p-item">
                                            <img src="<?= base_url();?>wms/images/restaurants/menu/1.jpg" alt="" />
                                        </div>
                                    </div>
                                    
                                    <div data-src="<?= base_url();?>wms/images/restaurants/menu/2.jpg" class="col-md-3 col-sm-4 col-xs-6">
                                        <div class="lightbox-item p-item">
                                            <img src="<?= base_url();?>wms/images/restaurants/menu/2.jpg" alt="" />
                                        </div>
                                    </div>
                                    
                                    <div data-src="<?= base_url();?>wms/images/restaurants/menu/3.jpg" class="col-md-3 col-sm-4 col-xs-6">
                                        <div class="lightbox-item p-item">
                                            <img src="<?= base_url();?>wms/images/restaurants/menu/3.jpg" alt="" />
                                        </div>
                                    </div>
                                    
                                    <div data-src="<?= base_url();?>wms/images/restaurants/menu/4.jpg" class="col-md-3 col-sm-4 col-xs-6">
                                        <div class="lightbox-item p-item">
                                            <img src="<?= base_url();?>wms/images/restaurants/menu/4.jpg" alt="" />
                                        </div>
                                    </div>
                                    
                                    <div data-src="<?= base_url();?>wms/images/restaurants/menu/5.jpg" class="col-md-3 col-sm-4 col-xs-6">
                                        <div class="lightbox-item p-item">
                                            <img src="<?= base_url();?>wms/images/restaurants/menu/5.jpg" alt="" />
                                        </div>
                                    </div>
                                    <div data-src="<?= base_url();?>wms/images/restaurants/menu/6.jpg" class="col-md-3 col-sm-4 col-xs-6">
                                        <div class="lightbox-item p-item">
                                            <img src="<?= base_url();?>wms/images/restaurants/menu/6.jpg" alt="" />
                                        </div>
                                    </div>
                                    <div data-src="<?= base_url();?>wms/images/restaurants/menu/7.jpg" class="col-md-3 col-sm-4 col-xs-6">
                                        <div class="lightbox-item p-item">
                                            <img src="<?= base_url();?>wms/images/restaurants/menu/7.jpg" alt="" />
                                        </div>
                                    </div>
                                    <div data-src="<?= base_url();?>wms/images/restaurants/menu/8.jpg" class="col-md-3 col-sm-4 col-xs-6">
                                        <div class="lightbox-item p-item">
                                            <img src="<?= base_url();?>wms/images/restaurants/menu/8.jpg" alt="" />
                                        </div>
                                    </div>
                                    <div data-src="<?= base_url();?>wms/images/restaurants/menu/9.jpg" class="col-md-3 col-sm-4 col-xs-6">
                                        <div class="lightbox-item p-item">
                                            <img src="<?= base_url();?>wms/images/restaurants/menu/9.jpg" alt="" />
                                        </div>
                                    </div>
                                    <div data-src="<?= base_url();?>wms/images/restaurants/menu/7.jpg" class="col-md-3 col-sm-4 col-xs-6">
                                        <div class="lightbox-item p-item">
                                            <img src="<?= base_url();?>wms/images/restaurants/menu/7.jpg" alt="" />
                                        </div>
                                    </div>
                                    <div data-src="<?= base_url();?>wms/images/restaurants/menu/8.jpg" class="col-md-3 col-sm-4 col-xs-6">
                                        <div class="lightbox-item p-item">
                                            <img src="<?= base_url();?>wms/images/restaurants/menu/8.jpg" alt="" />
                                        </div>
                                    </div>
                                    <div data-src="<?= base_url();?>wms/images/restaurants/menu/9.jpg" class="col-md-3 col-sm-4 col-xs-6">
                                        <div class="lightbox-item p-item">
                                            <img src="<?= base_url();?>wms/images/restaurants/menu/9.jpg" alt="" />
                                        </div>
                                    </div>
                                    <div data-src="<?= base_url();?>wms/images/restaurants/menu/1.jpg" class="col-md-3 col-sm-4 col-xs-6">
                                        <div class="lightbox-item p-item">
                                            <img src="<?= base_url();?>wms/images/restaurants/menu/1.jpg" alt="" />
                                        </div>
                                    </div>
                                    
                                    <div data-src="<?= base_url();?>wms/images/restaurants/menu/2.jpg" class="col-md-3 col-sm-4 col-xs-6">
                                        <div class="lightbox-item p-item">
                                            <img src="<?= base_url();?>wms/images/restaurants/menu/2.jpg" alt="" />
                                        </div>
                                    </div>
                                    
                                    <div data-src="<?= base_url();?>wms/images/restaurants/menu/3.jpg" class="col-md-3 col-sm-4 col-xs-6">
                                        <div class="lightbox-item p-item">
                                            <img src="<?= base_url();?>wms/images/restaurants/menu/3.jpg" alt="" />
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="clearfix"></div>
                                
                                <div class="load-more m-t-30">
                                    <a href=""><i class="md md-refresh"></i> Load More...</a>
                                </div>
							
							
                        </div>
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
        <script src="<?= base_url();?>material/vendors/flot/jquery.flot.resize.min.js"></script>
        <script src="<?= base_url();?>material/vendors/flot/plugins/curvedLines.js"></script>
        <script src="<?= base_url();?>material/vendors/sparklines/jquery.sparkline.min.js"></script>
        <script src="<?= base_url();?>material/vendors/easypiechart/jquery.easypiechart.min.js"></script>
        
        <script src="<?= base_url();?>material/vendors/fullcalendar/lib/moment.min.js"></script>
        <script src="<?= base_url();?>material/vendors/fullcalendar/fullcalendar.min.js"></script>
        <script src="<?= base_url();?>material/vendors/simpleWeather/jquery.simpleWeather.min.js"></script>
        <script src="<?= base_url();?>material/vendors/auto-size/jquery.autosize.min.js"></script>
        <script src="<?= base_url();?>material/vendors/nicescroll/jquery.nicescroll.min.js"></script>
        <script src="<?= base_url();?>material/vendors/waves/waves.min.js"></script>
        <script src="<?= base_url();?>material/vendors/bootstrap-growl/bootstrap-growl.min.js"></script>
        <script src="<?= base_url();?>material/vendors/sweet-alert/sweet-alert.min.js"></script>
        
        <script src="<?= base_url();?>material/js/flot-charts/curved-line-chart.js"></script>
        <script src="<?= base_url();?>material/js/flot-charts/line-chart.js"></script>
        <script src="<?= base_url();?>material/js/charts.js"></script>
        
        <script src="<?= base_url();?>material/js/charts.js"></script>
        <script src="<?= base_url();?>material/js/functions.js"></script>
        <script src="<?= base_url();?>material/js/demo.js"></script>
		
		
		<script type="text/javascript">
            /*
             * Notifications
             */
            function notify(from, align, icon, type, animIn, animOut){
                $.growl({
                    icon: icon,
                    title: ' Bootstrap Growl ',
                    message: 'Turning standard Bootstrap alerts into awesome notifications',
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
            
            $('.notifications > div > .btn').click(function(e){
                e.preventDefault();
                var nFrom = $(this).attr('data-from');
                var nAlign = $(this).attr('data-align');
                var nIcons = $(this).attr('data-icon');
                var nType = $(this).attr('data-type');
                var nAnimIn = $(this).attr('data-animation-in');
                var nAnimOut = $(this).attr('data-animation-out');
                
                notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut);
            });


            /*
             * Dialogs
             */

            //Basic
            $('#sa-basic').click(function(){
                swal("Here's a message!");
            });

            //A title with a text under
            $('#sa-title').click(function(){
                swal("Here's a message!", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat, tincidunt vitae ipsum et, pellentesque maximus enim. Mauris eleifend ex semper, lobortis purus sed, pharetra felis")
            });

            //Success Message
            $('#sa-success').click(function(){
                swal("Reservation Successful!", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat, tincidunt vitae ipsum et, pellentesque maximus enim. Mauris eleifend ex semper, lobortis purus sed, pharetra felis", "success")
            });

            //Warning Message
            $('#sa-warning').click(function(){
                swal({   
                    title: "Are you sure?",   
                    text: "You will not be able to recover this imaginary file!",   
                    type: "warning",   
                    showCancelButton: true,   
                    confirmButtonColor: "#DD6B55",   
                    confirmButtonText: "Yes, delete it!",   
                    closeOnConfirm: false 
                }, function(){   
                    swal("Deleted!", "Your imaginary file has been deleted.", "success"); 
                });
            });
            
            //Parameter
            $('#sa-params').click(function(){
                swal({   
                    title: "Are you sure?",   
                    text: "You will not be able to recover this imaginary file!",   
                    type: "warning",   
                    showCancelButton: true,   
                    confirmButtonColor: "#DD6B55",   
                    confirmButtonText: "Yes, delete it!",   
                    cancelButtonText: "No, cancel plx!",   
                    closeOnConfirm: false,   
                    closeOnCancel: false 
                }, function(isConfirm){   
                    if (isConfirm) {     
                        swal("Deleted!", "Your imaginary file has been deleted.", "success");   
                    } else {     
                        swal("Cancelled", "Your imaginary file is safe :)", "error");   
                    } 
                });
            });

            //Custom Image
            $('#sa-image').click(function(){
                swal({   
                    title: "Sweet!",   
                    text: "Here's a custom image.",   
                    imageUrl: "img/thumbs-up.png" 
                });
            });

            //Auto Close Timer
            $('#sa-close').click(function(){
                 swal({   
                    title: "Auto close alert!",   
                    text: "I will close in 2 seconds.",   
                    timer: 2000,   
                    showConfirmButton: false 
                });
            });

        </script>

        
    </body>
  </html>