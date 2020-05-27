@extends('admin_layout')
@section('admin_conta')
<div class="row-fluid sortable">	
				<div class="box span12">
					<div class="box-header">
						<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Order Details</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-bordered table-striped table-condensed">
							  <thead>
								  <tr>
									  <th>Product Name</th>
									  <th>Product Price</th>
									  <th>Sales Quantity </th>
									  <th>Sub Total</th>                                          
								  </tr>
							  </thead>   
							  <tbody>
							  	@foreach($data as $data)
									
								<tr>
									<td>{{$data->product_name}}</td>
									<td class="center">{{$data->product_price}}</td>
									<td class="center">{{$data->product_sales_quantity}}</td>
									<td class="center">
										<span class="">{{$data->product_price*$data->product_sales_quantity}}</span>
									</td>                                       
										    </tr>
							    @endforeach

					
							    <tr> 
							    	<td></td>
							    	<td></td>
							    	<td></td>
							    	<td><b> SubTotal = </b>{{$data->order_total}}</td>
							    </tr>
							   
								                                   
							  </tbody>
						 </table>  
						 <div class="pagination pagination-centered">
						  <ul>
							<li><a href="#">Prev</a></li>
							<li class="active">
							  <a href="#">1</a>
							</li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">Next</a></li>
						  </ul>
						</div>     
					</div>
				</div><!--/span-->
			</div><!--/row-->

<div class="row-fluid sortable">	
				<div class="box span6">
					<div class="box-header">
						<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Customer Details</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-bordered">
							  <thead>
								  <tr>
									  <th>Username</th>
									  <th>Mobile Number</th>
									                                          
								  </tr>
							  </thead> 

							  <tbody>
								<tr>
								
									<td>{{$data->cus_name}}</td>
									<td class="center">{{$data->cus_mobile}}</td>
									                                       
								</tr>
								
							
							                                   
							  </tbody>
						 </table>  
						 <div class="pagination pagination-centered">
						  <ul>
							<li><a href="#">Prev</a></li>
							<li class="active">
							  <a href="#">1</a>
							</li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">Next</a></li>
						  </ul>
						</div>     
					</div>
				</div><!--/span-->
				
				<div class="box span6">
					<div class="box-header">
						<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Shipping Details</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-condensed">
							  <thead>
								  <tr>
									  <th>Shipped To</th>
									  <th>Address</th>
									  <th>City</th>
									  <th>Mobile</th>                                          
								  </tr>
							  </thead>   
							  <tbody>
								<tr>

									<td>{{$data->ship_first_name}} {{$data->ship_last_name}}</td>
									<td class="center">{{$data->ship_address}}</td>
									<td class="center">{{$data->ship_city}}</td>
									<td class="center">
										<span class="">{{$data->ship_mobile}}</span>
									</td>                                       
								</tr>
							
							
								                                   
							  </tbody>
						 </table>  
						 <div class="pagination pagination-centered">
						  <ul>
							<li><a href="#">Prev</a></li>
							<li class="active">
							  <a href="#">1</a>
							</li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">Next</a></li>
						  </ul>
						</div>     
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
			
			

@endsection