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
                            
                            <div class="pmo-block pmo-items hidden-xs">
                                <h2>Connections</h2>
                                
                                <div class="pmob-body">
                                    <div class="row">
                                        <a href="" class="col-sm-3 col-md-2">
                                            <img class="img-circle" src="<?= base_url();?>material/img/profile-pics/1.jpg" alt="">
                                        </a>
                                        <a href="" class="col-sm-3 col-md-2">
                                            <img class="img-circle" src="<?= base_url();?>material/img/profile-pics/2.jpg" alt="">
                                        </a>
                                        <a href="" class="col-sm-3 col-md-2">
                                            <img class="img-circle" src="<?= base_url();?>material/img/profile-pics/3.jpg" alt="">
                                        </a>
                                        <a href="" class="col-sm-3 col-md-2">
                                            <img class="img-circle" src="<?= base_url();?>material/img/profile-pics/4.jpg" alt="">
                                        </a>
                                        <a href="" class="col-sm-3 col-md-2">
                                            <img class="img-circle" src="<?= base_url();?>material/img/profile-pics/5.jpg" alt="">
                                        </a>
                                        <a href="" class="col-sm-3 col-md-2">
                                            <img class="img-circle" src="<?= base_url();?>material/img/profile-pics/6.jpg" alt="">
                                        </a>
                                        <a href="" class="col-sm-3 col-md-2">
                                            <img class="img-circle" src="<?= base_url();?>material/img/profile-pics/7.jpg" alt="">
                                        </a>
                                        <a href="" class="col-sm-3 col-md-2">
                                            <img class="img-circle" src="<?= base_url();?>material/img/profile-pics/8.jpg" alt="">
                                        </a>
                                        <a href="" class="col-sm-3 col-md-2">
                                            <img class="img-circle" src="<?= base_url();?>material/img/profile-pics/1.jpg" alt="">
                                        </a>
                                        <a href="" class="col-sm-3 col-md-2">
                                            <img class="img-circle" src="<?= base_url();?>material/img/profile-pics/2.jpg" alt="">
                                        </a>
                                        <a href="" class="col-sm-3 col-md-2">
                                            <img class="img-circle" src="<?= base_url();?>material/img/profile-pics/3.jpg" alt="">
                                        </a>
                                        <a href="" class="col-sm-3 col-md-2">
                                            <img class="img-circle" src="<?= base_url();?>material/img/profile-pics/4.jpg" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                       <div class="pm-body clearfix">
                            <ul class="tab-nav tn-justified">
                                <li class="waves-effect"><a href="<?= base_url();?>profile/about">About</a></li>
                                <li class="waves-effect"><a href="<?= base_url();?>profile/storyline">Storyline</a></li>
                                <li class="active waves-effect"><a href="<?= base_url();?>profile/photos">Photos</a></li>
                            </ul>
                            
                            <div class="pmb-block clearfix photos">
                                <div class="p-header">
                                    <ul class="p-menu">
                                        <li class="active"><a href=""><i class="md md-insert-photo"></i> Photos</a></li>
                                        <li><a href=""><i class="md md-video-collection"></i> Videos</a></li>
                                        <li><a href=""><i class="md md-album"></i> Albums</a></li>
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
                                
                                <button class="btn btn-float btn-danger"><i class="md md-add"></i></button>
                                    
                                
                                <div class="lightbox row">
                                    <div data-src="<?= base_url();?>material/media/gallery/1.jpg" class="col-md-3 col-sm-4 col-xs-6">
                                        <div class="lightbox-item p-item">
                                            <img src="<?= base_url();?>material/media/gallery/thumbs/1.jpg" alt="" />
                                        </div>
                                    </div>
                                    
                                    <div data-src="<?= base_url();?>material/media/gallery/2.jpg" class="col-md-3 col-sm-4 col-xs-6">
                                        <div class="lightbox-item p-item">
                                            <img src="<?= base_url();?>material/media/gallery/thumbs/2.jpg" alt="" />
                                        </div>
                                    </div>
                                    
                                    <div data-src="<?= base_url();?>material/media/gallery/3.jpg" class="col-md-3 col-sm-4 col-xs-6">
                                        <div class="lightbox-item p-item">
                                            <img src="<?= base_url();?>material/media/gallery/thumbs/3.jpg" alt="" />
                                        </div>
                                    </div>
                                    
                                    <div data-src="<?= base_url();?>material/media/gallery/4.jpg" class="col-md-3 col-sm-4 col-xs-6">
                                        <div class="lightbox-item p-item">
                                            <img src="<?= base_url();?>material/media/gallery/thumbs/4.jpg" alt="" />
                                        </div>
                                    </div>
                                    
                                    <div data-src="<?= base_url();?>material/media/gallery/5.jpg" class="col-md-3 col-sm-4 col-xs-6">
                                        <div class="lightbox-item p-item">
                                            <img src="<?= base_url();?>material/media/gallery/thumbs/5.jpg" alt="" />
                                        </div>
                                    </div>
                                    <div data-src="<?= base_url();?>material/media/gallery/6.jpg" class="col-md-3 col-sm-4 col-xs-6">
                                        <div class="lightbox-item p-item">
                                            <img src="<?= base_url();?>material/media/gallery/thumbs/6.jpg" alt="" />
                                        </div>
                                    </div>
                                    <div data-src="<?= base_url();?>material/media/gallery/7.jpg" class="col-md-3 col-sm-4 col-xs-6">
                                        <div class="lightbox-item p-item">
                                            <img src="<?= base_url();?>material/media/gallery/thumbs/7.jpg" alt="" />
                                        </div>
                                    </div>
                                    <div data-src="<?= base_url();?>material/media/gallery/8.jpg" class="col-md-3 col-sm-4 col-xs-6">
                                        <div class="lightbox-item p-item">
                                            <img src="<?= base_url();?>material/media/gallery/thumbs/8.jpg" alt="" />
                                        </div>
                                    </div>
                                    <div data-src="<?= base_url();?>material/media/gallery/9.jpg" class="col-md-3 col-sm-4 col-xs-6">
                                        <div class="lightbox-item p-item">
                                            <img src="<?= base_url();?>material/media/gallery/thumbs/9.jpg" alt="" />
                                        </div>
                                    </div>
                                    <div data-src="<?= base_url();?>material/media/gallery/10.jpg" class="col-md-3 col-sm-4 col-xs-6">
                                        <div class="lightbox-item p-item">
                                            <img src="<?= base_url();?>material/media/gallery/thumbs/10.jpg" alt="" />
                                        </div>
                                    </div>
                                    <div data-src="<?= base_url();?>material/media/gallery/11.jpg" class="col-md-3 col-sm-4 col-xs-6">
                                        <div class="lightbox-item p-item">
                                            <img src="<?= base_url();?>material/media/gallery/thumbs/11.jpg" alt="" />
                                        </div>
                                    </div>
                                    <div data-src="<?= base_url();?>material/media/gallery/12.jpg" class="col-md-3 col-sm-4 col-xs-6">
                                        <div class="lightbox-item p-item">
                                            <img src="<?= base_url();?>material/media/gallery/thumbs/12.jpg" alt="" />
                                        </div>
                                    </div>
                                    <div data-src="media/gallery/13.jpg" class="col-md-3 col-sm-4 col-xs-6">
                                        <div class="lightbox-item p-item">
                                            <img src="media/gallery/thumbs/13.jpg" alt="" />
                                        </div>
                                    </div>
                                    <div data-src="<?= base_url();?>material/media/gallery/14.jpg" class="col-md-3 col-sm-4 col-xs-6">
                                        <div class="lightbox-item p-item">
                                            <img src="<?= base_url();?>material/media/gallery/thumbs/14.jpg" alt="" />
                                        </div>
                                    </div>
                                    <div data-src="<?= base_url();?>material/media/gallery/15.jpg" class="col-md-3 col-sm-4 col-xs-6">
                                        <div class="lightbox-item p-item">
                                            <img src="<?= base_url();?>material/media/gallery/thumbs/15.jpg" alt="" />
                                        </div>
                                    </div>
                                    <div data-src="<?= base_url();?>material/media/gallery/16.jpg" class="col-md-3 col-sm-4 col-xs-6">
                                        <div class="lightbox-item p-item">
                                            <img src="<?= base_url();?>material/media/gallery/thumbs/16.jpg" alt="" />
                                        </div>
                                    </div>
                                    <div data-src="<?= base_url();?>material/media/gallery/17.jpg" class="col-md-3 col-sm-4 col-xs-6">
                                        <div class="lightbox-item p-item">
                                            <img src="<?= base_url();?>material/media/gallery/thumbs/7.jpg" alt="" />
                                        </div>
                                    </div>
                                    <div data-src="<?= base_url();?>material/media/gallery/18.jpg" class="col-md-3 col-sm-4 col-xs-6">
                                        <div class="lightbox-item p-item">
                                            <img src="<?= base_url();?>material/media/gallery/thumbs/18.jpg" alt="" />
                                        </div>
                                    </div>
                                    <div data-src="<?= base_url();?>material/media/gallery/19.jpg" class="col-md-3 col-sm-4 col-xs-6">
                                        <div class="lightbox-item p-item">
                                            <img src="<?= base_url();?>material/media/gallery/thumbs/19.jpg" alt="" />
                                        </div>
                                    </div>
                                    <div data-src="<?= base_url();?>material/media/gallery/20.jpg" class="col-md-3 col-sm-4 col-xs-6">
                                        <div class="lightbox-item p-item">
                                            <img src="<?= base_url();?>material/media/gallery/thumbs/20.jpg" alt="" />
                                        </div>
                                    </div>
                                    <div data-src="<?= base_url();?>material/media/gallery/21.jpg" class="col-md-3 col-sm-4 col-xs-6">
                                        <div class="lightbox-item p-item">
                                            <img src="<?= base_url();?>material/media/gallery/thumbs/21.jpg" alt="" />
                                        </div>
                                    </div>
                                    <div data-src="<?= base_url();?>material/media/gallery/22.jpg" class="col-md-3 col-sm-4 col-xs-6">
                                        <div class="lightbox-item p-item">
                                            <img src="<?= base_url();?>material/media/gallery/thumbs/22.jpg" alt="" />
                                        </div>
                                    </div>
                                    <div data-src="<?= base_url();?>material/media/gallery/23.jpg" class="col-md-3 col-sm-4 col-xs-6">
                                        <div class="lightbox-item p-item">
                                            <img src="<?= base_url();?>material/media/gallery/thumbs/23.jpg" alt="" />
                                        </div>
                                    </div>
                                    <div data-src="<?= base_url();?>material/media/gallery/24.jpg" class="col-md-3 col-sm-4 col-xs-6">
                                        <div class="lightbox-item p-item">
                                            <img src="<?= base_url();?>material/media/gallery/thumbs/24.jpg" alt="" />
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

        
    </body>
  </html>