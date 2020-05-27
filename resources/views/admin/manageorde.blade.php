@extends('admin_layout')
@section('admin_conta')

		<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
						<div class="box-icon">
						
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
					
						</div>
					</div>
					<div class="box-content">
						<p class="alert-success"><?php
					$noti = Session::get('noti');
					if($noti){
					echo $noti;
					Session::put('noti',null);
				     }
					?></p>

						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
                                  <th>Order Id</th>
								  <th>Customer Name</th>
			
								  <th>Total Order</th>
								  <th>order Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						   <tbody>
					       @foreach($data as $row)
							<tr>
								<td>{{$row->order_id}}</td>
								<td class="center">{{$row->cus_name}}</td>
								<td class="center">{{$row->order_total}}</td>
							
								
								<td class="center">
								<?php if($row->order_status==0){ ?>
									<span class="label label-danger" >pending</span>
								<?php } else { ?>
								 
                                    <span class="label label-success" >Order Done</span>
                                <?php }?>
							
								</td>
								<td class="center">
								  
								<?php if ( $row->order_status==1){?>
									<a class="btn btn-success" href="{{url('xyzor'.$row->order_id)}}">
										<i class="halflings-icon white thumbs-up"></i>  
									</a>
                                      <?php } else {?>
                                      	<a class="btn btn-danger" href="{{url('xyz'.$row->order_id)}}">
										<i class="halflings-icon white thumbs-down"></i>  
									</a>
                                      	 <?php } ?>
									<a class="btn btn-info" href="{{url('orderdetails'.$row->order_id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>

									<a class="btn btn-danger" href="" id="delete">
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
				

 



@endsection


