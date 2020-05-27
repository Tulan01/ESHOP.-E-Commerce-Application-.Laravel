@extends('admin_layout')
@section('admin_conta')
<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Catagory</h2>
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
						<form class="form-horizontal" action="{{URL::to('updatebrand'.$data->brand_id)}}" method="POST">
							@csrf
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="brand name">Brand Name</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="brand_name" value="{{$data->brand_name}}">
							  </div>
							</div>
          
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Brand Description</label>
							  <div class="controls">
								<textarea class="cleditor" class="input-xlarge" name="brand_description" rows="3">{{$data->brand_description}}</textarea>
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="catagory publication status">Brand Publication Status</label>
							   <div class="controls">
							    <select class="form-control" class="input-xlarge" name="brand_status">
							    <?php if($data->brand_status==1) { ?>
              	                 <option value="1">Active</option>
              	                 <option value="0">Inactive</option>
              	                <?php } else { ?>
              	                 <option value="0">Inactive</option>
              	                  <option value="1">Active</option>
              	                 <?php } ?>
               
                                 </select>
								</div>
						
							</div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Update</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   
					</div>
				</div>
			</div>

			
@endsection