@extends('admin_layout')
@section('admin_conta')

			<div class="row-fluid sortable">		
				<div class="box span12">
					<p class="alert-success"><?php
					$noti = Session::get('noti');
					if($noti){
					echo $noti;
					Session::put('noti',null);
				     }
					?></p>

					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Products List</h2>
						<div class="box-icon">
				
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Product Id</th>
								  <th>Product Name</th>
								  <th>Catagory</th>
								  <th>Brand Id</th>
							
								 
								  <th>Product Price</th>
								  <th>Product Image</th>
								  <th>Product Size</th>
								  <th>Product Quantity</th>
								  <th>Product Color</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
						  	@foreach($data as $row)
							<tr>
								<td>{{$row->product_id}}</td>
								<td class="center">{{$row->product_name}}</td>
								<td class="center">{{$row->catagory_name}}</td>
								<td class="center">{{$row->brand_id}}</td>
                             
							
								<td class="center">{{$row->product_price}}</td>
								<td class="center"><img src="{{URL::to($row->product_image)}}" style="height: 100px; width: 100px;"></td>
								<td class="center">{{$row->product_size}}</td>
								<td class="center">{{$row->product_quantity}}</td>
								<td class="center">{{$row->product_color}}</td>

								<td class="center">
									<?php if ( $row->product_status==0){?>
									<span class="label label-danger" >Inactive</span>
								    <?php } else {?>
                                    <span class="label label-success" >Active</span>
								   <?php } ?>
								</td>
								<td class="center">
									<?php if ( $row->product_status==1){?>
									<a class="btn btn-success" href="{{URL::to('productinactive'.$row->product_id)}}">
										<i class="halflings-icon white thumbs-up"></i>  
									</a>
                                      <?php } else {?>
                                      	<a class="btn btn-danger" href="{{URL::to('productactive'.$row->product_id)}}">
										<i class="halflings-icon white thumbs-down"></i>  
									</a>
                                      	 <?php } ?>
									<a class="btn btn-info" href="{{URL::to('editproduct'.$row->product_id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>

									<a class="btn btn-danger" href="{{URL::to('deleteproduct'.$row->product_id)}}" id="delete" >
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
 
							
							@endforeach
						  </tbody>
					  </table>         
 
				</div><!--/span-->
			
			</div>

     </div>
    
@endsection