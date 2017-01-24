
					
					
					<div class="listview lv-bordered lv-lg" id="commentlist">
							<?php
								foreach (($rating['result']) as $row){
									echo "<div id='".$row->id."' class='lv-item media'>";
									echo "<div class='media-body'>";
									echo "<div class=''><h5>".$row->comments."</h5></div>";
									$val = explode(" ", $row->date);
									echo "<ul class='lv-attrs'>";
									echo "<li>Date Created: ".$val[0]."</li>";
									echo "<li>User: ".$row->name."</li>";
									echo "<li>Rating: ".number_format($row->rating, 1)."</li>";
									echo "</ul>";
									
									$user_data = $this->session->userdata;
									if($user_data['id']===$row->user_id && $user_data['type']==="user"){
										echo "<div class='lv-actions actions dropdown'>";
										echo "<a href='' data-toggle='dropdown' aria-expanded='true'>";
										echo "<i class='md md-more-vert'></i>";
										echo "</a>";
										echo "<ul class='dropdown-menu dropdown-menu-right'>";
										echo "<li>";
										echo "<a onclick='deleterating(".$row->id.");'>Delete</a>";
										echo "</li>";
										echo "</ul>";
										echo "</div>";
									}
									
									
									echo "</div>";
									echo "</div>";
								}
							?>
 
                    </div>  
					<div class="load-more" >
                        <a id="load-ratings" href="" onclick="return loadRatings()" style="display:none;"><i class="md md-refresh"></i> Load More...</a>
                    </div>	
        
					<br/>     
							<br/>     
							<br/>     
							<br/>  