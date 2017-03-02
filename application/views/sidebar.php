<aside id="sidebar">
	<div class="sidebar-inner">
		<div class="si-inner">
			<div class="profile-menu">
				<a href="">
					<div class="profile-pic">
						<img
							src="<?php 
							$image_path = base_url().$icon_path;
							if($icon_path===""){
								$image_path = base_url()."wms/images/icons/dinner-2.png";
							} 
							echo $image_path;
							?>"
							alt="" onerror="<?php echo base_url().'wms/images/restaurants/icon/9.jpg';?>" >
					</div>

					<div class="profile-info">
						<!-- User Name -->
                                    <?php echo $name;?>
                                    <i class="md md-arrow-drop-down"></i>
					</div>
				</a>

				<ul class="main-menu">
					<li><a href="<?php
					if($user_data['type']==='user'){
						echo base_url()."users/settings";
					}elseif($user_data['type']==='restaurant'){
						echo base_url()."settings";
					}
					?>"><i class="md md-settings"></i>
							Settings</a></li>
					<?php
					if($user_data['type']==='user'){
						if($user_data['server']==1){
							//Open Profile
							echo "<li><a href=".base_url()."servers/openprofile/".$user_data['username'].">";
							echo "<i class='"."md md-person"."'>";
							echo "</i>My Profile</a></li>";
						}
					}
					?>		
							
					<li><a href="<?= base_url();?>main/logout"><i class="md md-history"></i>
							Logout</a></li>
				</ul>
			</div>

			<ul class="main-menu">
				<?php 
					//users
					$view_name = array("Home","Reservations","Settings");
					$view_ref = array("home","reservations","users/settings");
					$view_icon = array('md md-home','md md-format-underline','md md-settings');
					
					//Servers
					$view_name_ser = array("Home","Reservations","Calendar","Settings");
					$view_ref_ser = array("home","reservations","servers/calendar","users/settings");
					$view_icon_ser = array('md md-home','md md-format-underline','d md-today','md md-settings');
										
					//$view_name_res = array("Home","Orders","Reservations","Products","Servers","Customers","Calendar","Settings");
					$view_name_res = array("Dashboard","Reservations","Table Management","Servers","Customers","Calendar","Settings");
					//$view_ref_res = array("home","orders","reservations","products","servers","customers","calendar","settings");
					$view_ref_res = array("home","reservations","table_management","servers","customers","calendar","settings");
					//$view_icon_res = array('md md-home','md md-format-underline','md md-local-restaurant',
					//'md md-loyalty','md md-person','md md-people','md md-today','md md-settings');
					$view_icon_res = array('md md-dashboard','md md-local-restaurant','md md-format-underline',
					'md md-person','md md-people','md md-today','md md-settings');
					
					if($user_data['type']==='user'){
						if($user_data['server']==1){
							for($i=0; $i<count($view_name_ser); $i++){
								if($view_name_ser[$i]==="Reservations"){
									echo "<li class='sub-menu'>";
									echo "<a ><i class='md md-format-underline'></i>Reservations</a>";
									echo "<ul>";
                                    echo "<li><a href='".base_url()."reservations"."'>Personal</a></li>";
                                    echo "<li><a href='".base_url()."servers/get_reservation"."'>Customer</a></li>";
									echo "</ul>";
									echo "</li>";	
								}else{
									echo "<li class='".check_active($view_name_ser[$i],$view)."' >";
									echo "<a href='".base_url().$view_ref_ser[$i]."'>";
									echo "<i class='".$view_icon_ser[$i]."'>";
									echo "</i>".$view_name_ser[$i]."</a></li>";
								}
							}
						}else{
							for($i=0; $i<count($view_name); $i++){
								echo "<li class='".check_active($view_name[$i],$view)."' >";
								echo "<a href='".base_url().$view_ref[$i]."'>";
								echo "<i class='".$view_icon[$i]."'>";
								echo "</i>".$view_name[$i]."</a></li>";
							}
						}
						
					}elseif($user_data['type']==='restaurant') {
						for($i=0; $i<count($view_name_res); $i++){
							if($view_name_res[$i]==="Reservations"){
								echo "<li class='sub-menu ".check_active($view_name_res[$i],$view)."'>";
								echo "<a ><i class='md md-local-restaurant'></i>Reservations</a>";
								echo "<ul>";
                                echo "<li ><a href='".base_url()."reservations"."'>Online</a></li>";
                                echo "<li class='active'><a href='".base_url()."reservation_guest"."'>Guest</a></li>";
								echo "</ul>";
								echo "</li>";	
							}else{
								echo "<li class='".check_active($view_name_res[$i],$view)."' >";
								echo "<a href='".base_url().$view_ref_res[$i]."'>";
								echo "<i class='".$view_icon_res[$i]."'>";
								echo "</i>".$view_name_res[$i]."</a></li>";
							}
						}
					}
					
					
					function check_active($current_view,$view){
						if($current_view===$view){
							return "active";
						}else{
							return "";
						}
					}
				
				?>
			
			</ul>
		</div>
	</div>
</aside>