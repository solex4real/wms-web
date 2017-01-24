<!-- Header -->
            <?php $this->load->view('header');  ?>
            
            <section id="content">
                <div class="container">
                   <div class="card">
                        <div class="card-header">
                            <h2>Customers <small>Recent customers from reservations.</small></h2>
                        </div>
                        
                        <div class="table-responsive">
                           <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
										<th data-column-id="icon" data-formatter="icon" data-sortable="false">Icon</th>
                                        <th data-column-id="name" data-order="desc">Name</th>
                                        <th data-column-id="gender">Gender</th>
                                        <th data-column-id="email" >email</th>
                                        <th data-column-id="reservation_total" >Total Reservations</th>
                                        <th data-column-id="reservation_time" >Recent Reservation</th>
                                    </tr>
                                </thead>
								
                                
                            </table>
                        </div>
                    </div>
					<!-- Add block space to aviod view bug -->
					<?php $this->load->view('block-space');  ?>
                </div>
            </section>
        </section>
        
		<?php $this->load->view('footer');?>
        
        <script src="<?= base_url();?>material/vendors/nicescroll/jquery.nicescroll.min.js"></script>
		<script src="<?= base_url();?>material/vendors/bootgrid/jquery.bootgrid.min.js"></script>
        <script src="<?= base_url();?>material/vendors/waves/waves.min.js"></script>
        <script src="<?= base_url();?>material/vendors/bootstrap-growl/bootstrap-growl.min.js"></script>
        <script src="<?= base_url();?>material/vendors/sweet-alert/sweet-alert.min.js"></script>
		
     
        <script src="<?= base_url();?>material/js/functions.js"></script>
        <script src="<?= base_url();?>material/js/demo.js"></script>
		
		
		<!-- Data Table -->
        <script type="text/javascript">
            $(document).ready(function(){
               
                
                //Selection
                $("#data-table-basic").bootgrid({
                    css: {
                        icon: 'md icon',
                        iconColumns: 'md-view-module',
                        iconDown: 'md-expand-more',
                        iconRefresh: 'md-refresh',
                        iconUp: 'md-expand-less'
                    },
					searchable: true,
                    selection: true,
                    multiSelect: true,
                    rowSelect: true,
                    keepSelection: true,
					post: function ()
					{
					return {
						 '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
						};
					},
					ajax: true,
					url: "<?php echo base_url();?>"+"Customers/get_customers",
					formatters: {
						"icon": function(column, row) {
                            return "<img class='img-circle' src='"+"<?php echo base_url();?>"+row.icon_path+"' width='30' height='30'>" ;
                        }
					}
					
                });
                
                
				
            });
        </script>

        
    </body>
  </html>