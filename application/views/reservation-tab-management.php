<div class="listview">
	<div class="lv-body c-overflow row-fluid table-list-panel">
		<div class="row text-left m-5 col-sm-12">
            <p class="c-black">Select Sections</p>                   
            <select class="selectpicker" id="name_list" name="name_list" data-live-search="true" multiple>
				<?php 
				foreach ($sections as $row):
					echo "<option id='sec-res-".$row->section_id."' value='".$row->section_id."' selected>".$row->section_name."</option>";
				endforeach;
				?>
            </select>
        </div>
		<div class="col-sm-12 p-10 panel panel-collapse p-static">
			<div class="panel-heading" role="tab" id="headingOne">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#current-reservations" aria-expanded="false" aria-controls="collapseOne">
						Current Reservations
					</a>
				</h4>
			</div>
			<div id="current-reservations" class="collapse" role="tabpanel" aria-labelledby="headingOne">
				<div class="panel-body">
					<div class="listview">
						<div class="lv-body" id="current-reservation-list">
						
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-12 p-10 panel panel-collapse p-static">
			<div class="panel-heading" role="tab" id="headingTwo">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#inline-customers" aria-expanded="false" aria-controls="collapseTwo">
						In-Line Customers
					</a>
				</h4>
			</div>
			<div id="inline-customers" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
				<div class="panel-body">
					Anim pariatur cliche reprehenderit, 
					enim eiusmod high life accusamus terry 
					richardson ad squid. 3 wolf moon officia aute, 
					non cupidatat skateboard dolor brunch. 
					Food truck quinoa nesciunt laborum eiusmod. 
					Brunch 3 wolf moon tempor, sunt aliqua put a 
					bird on it squid single-origin coffee nulla 
					assumenda shoreditch et. Nihil anim keffiyeh 
					helvetica, craft beer labore wes anderson cred 
					nesciunt sapiente ea proident. Ad vegan excepteur 
					butcher vice lomo. Leggings occaecat craft beer 
					farm-to-table, raw denim aesthetic synth nesciunt 
					you probably haven't heard of them accusamus 
					labore sustainable VHS.
				</div>
			</div>
		</div>
		<div class="col-sm-12 p-10 panel panel-collapse p-static">
			<div class="panel-heading" role="tab" id="headingThree">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#server-assignment" aria-expanded="false" aria-controls="collapseThree">
						Server Assignment
					</a>
				</h4>
			</div>
			<div id="server-assignment" class="collapse" role="tabpanel" aria-labelledby="headingThree">
				<div class="panel-body">
					Anim pariatur cliche reprehenderit, 
					enim eiusmod high life accusamus terry 
					richardson ad squid. 3 wolf moon officia aute, 
					non cupidatat skateboard dolor brunch. 
					Food truck quinoa nesciunt laborum eiusmod. 
					Brunch 3 wolf moon tempor, sunt aliqua put a 
					bird on it squid single-origin coffee nulla 
					assumenda shoreditch et. Nihil anim keffiyeh 
					helvetica, craft beer labore wes anderson cred 
					nesciunt sapiente ea proident. Ad vegan excepteur 
					butcher vice lomo. Leggings occaecat craft beer 
					farm-to-table, raw denim aesthetic synth nesciunt 
					you probably haven't heard of them accusamus 
					labore sustainable VHS.
				</div>
			</div>
		</div>
		<div class="col-sm-12 p-10 panel panel-collapse p-static">
			<div class="panel-heading" role="tab" id="headingFour">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#onhold-customers" aria-expanded="false" aria-controls="collapseFour">
						On Hold Customers
					</a>
				</h4>
			</div>
			<div id="onhold-customers" class="collapse" role="tabpanel" aria-labelledby="headingFour">
				<div class="panel-body">
					Anim pariatur cliche reprehenderit, 
					enim eiusmod high life accusamus terry 
					richardson ad squid. 3 wolf moon officia aute, 
					non cupidatat skateboard dolor brunch. 
					Food truck quinoa nesciunt laborum eiusmod. 
					Brunch 3 wolf moon tempor, sunt aliqua put a 
					bird on it squid single-origin coffee nulla 
					assumenda shoreditch et. Nihil anim keffiyeh 
					helvetica, craft beer labore wes anderson cred 
					nesciunt sapiente ea proident. Ad vegan excepteur 
					butcher vice lomo. Leggings occaecat craft beer 
					farm-to-table, raw denim aesthetic synth nesciunt 
					you probably haven't heard of them accusamus 
					labore sustainable VHS.
				</div>
			</div>
		</div>
	</div>
</div>