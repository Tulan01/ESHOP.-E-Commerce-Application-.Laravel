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
								  <th>Catagory Id</th>
								  <th>Catgory Name</th>
								  <th>Catgory Description</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
						  	@foreach($data as $row)
							<tr>
								<td>{{$row->catagory_id}}</td>
								<td class="center">{{$row->catagory_name}}</td>
								<td class="center">{{$row->	catagory_description}}</td>
								<td class="center">
									<?php if ( $row->cat_pub_st==0){?>
									<span class="label label-danger" >Inactive</span>
								    <?php } else {?>
                                    <span class="label label-success" >Active</span>
								   <?php } ?>
								</td>
								<td class="center">
									<?php if ( $row->cat_pub_st==1){?>
									<a class="btn btn-success" href="{{URL::to('inactive'.$row->catagory_id)}}">
										<i class="halflings-icon white thumbs-up"></i>  
									</a>
                                      <?php } else {?>
                                      	<a class="btn btn-danger" href="{{URL::to('active'.$row->catagory_id)}}">
										<i class="halflings-icon white thumbs-down"></i>  
									</a>
                                      	 <?php } ?>
									<a class="btn btn-info" href="{{URL::to('editcatagory'.$row->catagory_id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>

									<a class="btn btn-danger" href="{{URL::to('deletecatagory'.$row->catagory_id)}}" id="delete">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>

							@endforeach
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			</div>
			</div>

 



@endsection