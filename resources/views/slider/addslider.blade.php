@extends('admin_layout')
@section('admin_conta')

			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Slider</h2>
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
						<form class="form-horizontal" action="{{route('storeslider')}}" method="POST" enctype="multipart/form-data">
							@csrf
						  <fieldset>
						
          
							<div class="control-group">
							  <label class="control-label" for="fileInput">Image</label>
							  <div class="controls">
								 <input type="file" class="form-control" name="slider_image">
							  </div>
							</div>   

							<div class="control-group">
							  <label class="control-label" for="catagory publication status">Slider Status</label>
							   <div class="controls">
							    <select class="form-control" name="slider_status">
                                 
              	                 <option value="1">Active</option>
              	                 <option value="0">Inactive</option>
               
                                 </select>
								</div>
						
							</div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Add Slider</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   
					</div>
				</div>
			</div>

@endsection