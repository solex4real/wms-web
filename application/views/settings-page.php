    
					
				<div class="card">
				
					<div class="card-header">
                            <h2>Image Upload </h2>
                        </div>
                        
                        <div class="card-body card-padding">
				
				
								<div class="col-lg-4 ">
									<p><em>Recommended banner size 1920x570.</em></p>
	                        <form name="frm1" id="frm1" action="#" method="post" enctype="multipart/form-data">
                            <div class="fileinput fileinput-new" data-provides="fileinput"> 
                                <div class="fileinput-preview thumbnail" data-trigger="fileinput" id="thumb1"></div>
                                <div>
                                    <span class="btn btn-info btn-file">
                                        <span class="fileinput-new">Select image</span>
                                        <span class="fileinput-exists">Change</span>
                                        <?php echo "<input type='file' name='userfile' size='20' />"; ?>
                                    </span>
                                    <a href="#" id="remove-1" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
									<button type="submit" class="btn btn-success fileinput-exists" id="save-banner1" >Save</button>
                                </div>
                            </div>
							<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            </form>  
                                </div>
								
								<div class="col-lg-4 ">
								<p><em>Recommended Image size 700x400.</em></p>
								<form name="frm2" id="frm2" action="#" method="post" enctype="multipart/form-data">
                            <div class="fileinput fileinput-new" data-provides="fileinput"> 
                                <div class="fileinput-preview thumbnail" data-trigger="fileinput" id="thumb2"></div>
                                <div>
                                    <span class="btn btn-info btn-file">
                                        <span class="fileinput-new">Select image</span>
                                        <span class="fileinput-exists">Change</span>
                                        <?php echo "<input type='file' name='userfile' size='20' />"; ?>
                                    </span>
                                    <a href="#" id="remove-2" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
									<button type="submit" class="btn btn-success fileinput-exists" id="save-banner2" >Save</button>
                                </div>
                            </div>
							<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            </form>
                                    
                                </div>
								
								<div class="col-lg-4 ">
								<p><em>Recommended Icon size 128x128.</em></p>
								<form name="frm3" id="frm3" action="#" method="post" enctype="multipart/form-data">
                            <div class="fileinput fileinput-new" data-provides="fileinput"> 
                                <div class="fileinput-preview thumbnail" data-trigger="fileinput" id="thumb3"></div>
                                <div>
                                    <span class="btn btn-info btn-file">
                                        <span class="fileinput-new">Select image</span>
                                        <span class="fileinput-exists">Change</span>
                                        <?php echo "<input type='file' name='userfile' size='20' />"; ?>
                                    </span>
                                    <a href="#" id="remove-3" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
									<button type="submit" class="btn btn-success fileinput-exists" id="save-banner3" >Save</button>
                                </div>
                            </div>
							<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            </form>
                                    
                                </div>
				
						</div>
						<br/>
                                    <br/>
                                    <br/>
                                    <br/>
                                    <br/>
                                    <br/>
                                    <br/>
                                    <br/>
                                    <br/>
                                    <br/>
                                    <br/>
                                    <br/>
				</div>




				<div class="card">
                        <div class="card-header">
                            <h2>HTML Editor </h2>
                        </div>
                        
                        <div class="card-body card-padding">
                         
                            <p class="f-500 c-black m-b-5">Click to edit</p>
                            <small>You can edit content on the fly</small>
                            
                            <br/>
                            <br/>
                            
                            <div class="m-b-10">
                                <button class="btn btn-primary btn-sm hec-button">Click here to edit the following content</button>
                                <button class="btn btn-success btn-sm hec-save" style="display:none;">Save</button>
                            </div>
                            <div class="html-editor-click" >
                               <?php echo $page_data->data_text;?>
                            </div>
                            
                            
                            
                            
                        </div>
                    </div>