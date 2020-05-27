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
						<h2><i class="halflings-icon user"></i><span class="break"></span>Catagories</h2>
						<div class="box-icon">
				
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Brand Id</th>
								  <th>Brand Name</th>
								  <th>Brand Description</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
						  	@foreach($data as $row)
							<tr>
								<td>{{$row->brand_id}}</td>
								<td class="center">{{$row->brand_name}}</td>
								<td class="center">{{$row->brand_description}}</td>
								<td class="center">
									<?php if ( $row->brand_status==0){?>
									<span class="label label-danger" >Inactive</span>
								    <?php } else {?>
                                    <span class="label label-success" >Active</span>
								   <?php } ?>
								</td>
								<td class="center">
									<?php if ( $row->brand_status==1){?>
									<a class="btn btn-success" href="{{URL::to('brandinactive'.$row->brand_id)}}">
										<i class="halflings-icon white thumbs-up"></i>  
									</a>
                                      <?php } else {?>
                                      	<a class="btn btn-danger" href="{{URL::to('brandactive'.$row->brand_id)}}">
										<i class="halflings-icon white thumbs-down"></i>  
									</a>
                                      	 <?php } ?>
									<a class="btn btn-info" href="{{URL::to('editbrand'.$row->brand_id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>
                                    
									 <a class="btn btn-danger"  href="{{URL::to('deletebrand'.$row->brand_id)}}" id="delete" >Delete </a>

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