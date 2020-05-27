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
			<form class="form-horizontal" action="{{URL::to('updateeproduct'.$data->product_id)}}" method="POST" enctype="multipart/form-data">
							{{ csrf_field() }}
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="catagory name">Product Name</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_name" value="{{$data->product_name}}">
							  </div>
							</div>
							<div class="control-group">
								
								<label class="control-label" for="selectError3">Catagory</label>
								<div class="controls">
									<?php   
                                 $data1=DB::table('tbl_catagory')
                                        ->where('cat_pub_st',1)
                                        ->get();
								?>
								
								  <select name="catagory_id">
								  	<option>select catagory</option>
								  	@foreach($data1 as $row1)
									<option value="{{$row1->catagory_id}}" <?php if($row1->catagory_id==$data->catagory_id) echo "selected"; ?>>{{$row1->catagory_name}}</option>
									@endforeach
								  </select>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="selectError3">Brand Select</label>
								<div class="controls">
								  <?php   
                                 $data2=DB::table('brands')
                                        ->where('brand_status',1)
                                        ->get();
								?>
								
								    <select name="brand_id">
								  	<option>select brand</option>
								  	@foreach($data2 as $row2)
									<option value="{{$row2->brand_id}}" <?php if($row2->brand_id==$data->brand_id) echo "selected"; ?> > {{$row2->brand_name}} </option>
									@endforeach
								  </select>
								</div>
							  </div>
          
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Product Short Description</label>
							  <div class="controls">
								<textarea class="cleditor" name="product_short_description" rows="3">{{$data->product_short_description}}</textarea>
							  </div>
							</div>
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Product Long Description</label>
							  <div class="controls">
								<textarea class="cleditor" name="product_long_description" rows="3">{{$data->product_long_description}}</textarea>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="Product Price">Product Price</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_price" value="{{$data->product_price}}">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="fileInput">Image</label>
							  <div class="controls">
								 <input type="file" class="form-control" name="product_image" >
								  <p class="form-control"> Old Image : </p><img src="{{URL::to($data->product_image)}}" style="height: 100px; width: 70px">
								   <input type="hidden" name="old_image" value="{{$data->product_image}}">
							  </div>
							</div>     

							<div class="control-group">
							  <label class="control-label" for="Product Size">Product Size</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_size" value="{{$data->product_size}}">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="Product Quantity">Product Quantity</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_quantity" value="{{$data->product_quantity}}">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="Product color">Product Color</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_color" value="{{$data->product_color}}">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="Product publication status">Product Publication Status</label>
							   <div class="controls">
							    <select class="form-control" name="product_status">
                                 <?php if($data->product_status==1) { ?>
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
							  <button type="submit" class="btn btn-primary">Update Product</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   
					</div>
				</div>
			</div>

@endsection