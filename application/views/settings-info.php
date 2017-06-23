			<div class="card">
                        <div class="card-header">						
                            <h2>Account Settings</h2>
                        </div>
						
                        <div class="card-body card-padding">
                            <div class="row">
							
                                <div class="col-sm-12">                       
                                    
                                    <form class="row" role="form">
                                <div class="col-sm-3">
                                    <div class="form-group fg-line">
                                        <label class="sr-only" for="old-password">Old Password</label>
                                        <input type="password" class="form-control input-sm" id="old-password" placeholder="Old Password">
                                    </div>
                                </div>
                                
                                <div class="col-sm-3">
                                    <div class="form-group fg-line">
                                        <label class="sr-only" for="new-password">New Password</label>
                                        <input type="password" class="form-control input-sm" id="new-password" placeholder="New Password">
                                    </div>
                                </div>
                                
                                <div class="col-sm-3">
                                    <div class="form-group fg-line">
                                        <label class="sr-only" for="re-password">Password</label>
                                        <input type="password" class="form-control input-sm" id="re-password" placeholder="Re-Password">
                                    </div>
                                </div>
                                
                                <div class="col-sm-3">
                                    <button class="btn btn-primary btn-sm m-t-5" id="change-account" type="button">Change</button>
                                </div>
                            </form>
                                    
                                   
                                    
                                    
									
                                </div>                                   
                            </div>                                                    
                        </div>           
                        <br/>
                    </div>


			




			<div class="card">
			
                        <div class="card-header">						
                            <h2>Restaurant Settings </h2>
                        </div>
						
                        <div class="card-body card-padding">
                            <div class="row">
							
							
							
                                <div class="col-sm-12">                       
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="md md-home"></i></span>
                                        <div class="fg-line">
                                                <input type="text" class="form-control" id="res-name" placeholder="Restaurant Name" value="<?php echo $page_data->name;?>">
                                        </div>
                                    </div>
                                    
                                    <br/>
                                    
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="md md-local-phone"></i></span>
                                        <div class="fg-line">
                                            <input type="text" class="form-control" id="res-contact" placeholder="Contact Number" value="<?php echo $page_data->contact;?>">
                                        </div>
                                    </div>
                                    
                                    <br/>
                                    
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="md md-email"></i></span>
                                        <div class="fg-line">
                                            <input type="email" class="form-control" id="res-email" placeholder="Email Address" value="<?php echo $page_data->email;?>">
                                        </div>
                                    </div>
                                    
                                    <br/>
                                    
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="md md-location-on"></i></span>
										<div class="col-sm-4">
											<div class="fg-line">    
												<input type="text" class="form-control" id="res-address" placeholder="Address" value="<?php echo $page_data->address;?>">
											</div>
										</div>
                                        							
										<div class="col-sm-3">
												<select class="selectpicker" id="res-state" data-placeholder="Choose a State..." >
													<option value="Alabama">Alabama</option>
													<option value="California">California</option>
													<option value="Florida">Florida</option>
													<option value="Georgia">Georgia</option>
													<option value="Massachusetts">Massachusetts</option>
													<option value="Montana">Montana</option>
													<option value="New Jersey">New Jersey</option>
													<option value="New York">New York</option>
													<option value="North Carolina">North Carolina</option>
													<option value="South Carolina">South Carolina</option>
													<option value="Tennessee">Tennessee</option>
													<option value="Texas">Texas</option>
													<option value="Utah">Utah</option>
													<option value="Washington">Washington</option>
													<option value="West Virginia">West Virginia</option>
												</select>
										</div>
										<div class="col-sm-3">
											<div class="fg-line">    
												<input type="text" class="form-control" id="res-county" placeholder="County" value="<?php echo $page_data->county;?>">
											</div>
										</div>
										<div class="col-sm-2">
											<div class="fg-line">    
												<input type="number" class="form-control" id="res-zip" placeholder="Zip" value="<?php echo $page_data->zip;?>">
											</div>
										</div>
										
										
                                    </div>
									
									<br/>
								
									
								<div class="input-group">
									<span class="input-group-addon"><i class="md md-query-builder"></i></span>
									<!-- Start Period -->
									<div class="col-sm-2">
                                            <div class="dtp-container dropdown fg-line">
                                            <input type='text' id="start-time" class="form-control time-picker" 
											value="<?php echo date('h:i A', strtotime($page_data->start_time));?>" data-toggle="dropdown" placeholder="Select Time">
                                        </div>   
									</div>
									<div class="col-sm-3">
												<select class="selectpicker" id="res-start-day" data-placeholder="Choose Start Day" >
													<option value="Sunday">Sunday</option>
													<option value="Monday">Monday</option>
													<option value="Tuesday">Tuesday</option>
													<option value="Wednesday">Wednesday</option>
													<option value="Thursday">Thursday</option>
													<option value="Friday">Friday</option>
													<option value="Saturday">Saturday</option>
												</select>
									</div>
									<!-- End Period -->
									<div class="col-sm-2">
                                            <div class="dtp-container dropdown fg-line">
                                            <input type='text' id="end-time" class="form-control time-picker" 
											value="<?php 
											echo date('h:i A', strtotime($page_data->end_time));										 
											?>" 
											data-toggle="dropdown" placeholder="Select Time">
                                        </div>
									</div>
									<div class="col-sm-3">
												<select class="selectpicker" id="res-end-day" data-placeholder="Choose End Day" >
													<option value="Sunday">Sunday</option>
													<option value="Monday">Monday</option>
													<option value="Tuesday">Tuesday</option>
													<option value="Wednesday">Wednesday</option>
													<option value="Thursday">Thursday</option>
													<option value="Friday">Friday</option>
													<option value="Saturday">Saturday</option>
												</select>
									</div>
									<div class="col-sm-2">
										<button class="btn btn-default btn-sm" id="add-schedule" onclick="add_schedule()"><i class='md md-add'>Add</i></button>
									</div>
                                </div>
								
								<div class="input-group m-t-5 m-l-20" id="schedule-list">
									<?php
										foreach($schedule as $row){
											$start_day = strtoupper($row->start_day);
											$end_day = strtoupper($row->end_day);
											$start_time = date("g:i a", strtotime($row->start_time));
											$end_time = date("g:i a", strtotime($row->end_time));
											echo "<div class='chip'>"
														.$start_day." - ".$end_day." ".$start_time." - ".$end_time.
														//MONDAY - FRIDAY 10AM-6PM
														"<span class='closebtn' onclick='remove_schedule(this,".$row->id.")'>&times;</span>".
													"</div>";
										}
									?>
								</div>
								
									<br/>
									
									<div class="input-group">
                                        <span class="input-group-addon"><i class="md md-language"></i></span>
                                        <div class="fg-line">
                                                <input type="text" class="form-control" id="res-url" placeholder="Restaurant URL" value="<?php echo $page_data->url;?>">
                                        </div>
                                    </div>
									
									<br/>
									
									<div class="input-group">
                                        <span class="input-group-addon"><i class="md md-description"></i></span>
                                        <div class="fg-line">
                                                <textarea type="text" class="form-control" id="res-des" placeholder="Restaurant Description" 
												><?php echo $page_data->description;?></textarea>
                                        </div>
                                    </div>
									
                                </div> 
								<div class="col-sm-9">
           
                                </div>
								<div class="col-sm-9 m-t-20">
                                    <button class="btn btn-primary btn-sm m-t-5" id="change-res">Update</button>
                                </div>
								
										
                            </div>                                                    
                        </div>           
                        <br/>
                    </div>
					
					
					
					<div class="card">
                        <div class="card-header">						
                            <h2>Manager Information</h2>
                        </div>
						
                        <div class="card-body card-padding">
                            <div class="row">
							
                                <div class="col-sm-12">                       
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="md md-person"></i></span>
                                        <div class="col-sm-6">
                                    <div class="fg-line">    
                                        <input type="text" class="form-control" id="owner-first-name" placeholder="First Name" value="<?php echo $page_data->owner_first_name;?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="fg-line">    
                                        <input type="text" class="form-control"  id="owner-last-name"placeholder="Last Name" value="<?php echo $page_data->owner_last_name;?>">
                                    </div>
                                </div>
                                    </div>
                                    
                                    <br/>
                                    
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="md md-local-phone"></i></span>
                                        <div class="fg-line">
                                            <input type="text" class="form-control" id="owner-contact" placeholder="Contact Number" value="<?php echo $page_data->owner_contact;?>">
                                        </div>
                                    </div>
                                    
                                    <br/>
                                    
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="md md-email"></i></span>
                                        <div class="fg-line">
                                            <input type="text" class="form-control" id="owner-email" placeholder="Email Address" value="<?php echo $page_data->owner_email;?>">
                                        </div>
                                    </div> 
									
                                </div>   


								<div class="col-sm-9">
           
                                </div>
								<div class="col-sm-9 m-t-20">
                                    <button class="btn btn-primary btn-sm m-t-5" type="button" id="change-owner">Update</button>
                                </div>
                            </div>                                                    
                        </div>           
                        <br/>
                    </div>
			
			
			
			
					
					
					
					