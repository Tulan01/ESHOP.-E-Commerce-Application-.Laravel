 @extends('layout')
 @section('conta')
    
	        <?php
             $new=Session::get('new');

	          ?>

		
			
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
				 <?php 
                      if($new){ 
                      	Session::put('new',null)
                      	?>

                          <h2 class="title text-center">COULD NOT FIND ANY RESULT</h2>

				 <?php 
                      
                     } else{
                      	     
				 ?>

					 @foreach($data as $row)
				
					 <div class="tablenor" >
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src= "{{URL::to($row->product_image)}}" style="height: 250px; width: 200">
	                                            <h2>{{$row->product_price}} Taka</h2>
	                                            <p>{{$row->product_name}}</p>
	                                         
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>{{$row->product_price}} Taka</h2>
	                                                <p>{{$row->product_name}}</p>
												<a href="{{url('details_view'.$row->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
										</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="{{url('details_view'.$row->product_id)}}"><i class="fa fa-plus-square"></i>View Product</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
		 	  
		 	   			     @endforeach

		 	   			 <?php } ?>
                        
						   
					</div>
			
                    

              

				
						
						

@endsection