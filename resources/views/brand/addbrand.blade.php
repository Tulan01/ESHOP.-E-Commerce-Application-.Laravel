@extends('admin_layout')
@section('admin_conta')

			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Brand</h2>
						<div class="box-icon">
						
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							
						</div>
					</div>
					<p class="alert-success"><?php
					$massage = Session::get('massage');
					if($massage){
					echo $massage;
					Session::put('massage',null);
				     }
					?></p>
	                <div class="box-content">
						<form class="form-horizontal" action="{{route('storebrand')}}" method="POST">
							@csrf
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="Brand name">Brand Name</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="brand_name">
							  </div>
							</div>
          
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Brand Description</label>
							  <div class="controls">
								<textarea class="cleditor" name="brand_description" rows="3"></textarea>
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="Brand status">Brand Publication Status</label>
							   <div class="controls">
							    <select class="form-control" name="brand_status">
                                 
              	                 <option value="1">Active</option>
              	                 <option value="0">Inactive</option>
               
                                 </select>
								</div>
						
							</div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Add Brands</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   
					</div>
				</div>
			</div>

@endsection