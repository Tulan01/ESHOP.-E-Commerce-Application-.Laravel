@extends('layoutduo')
 @section('conta')


	
	<section id="cart_items">
		
    <?php
     $contents=Cart::getContent();
      $subTotal = Cart::getSubTotal();
       
      ?>
	
		<div class="container col-sm-12" >
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Image</td>
							<td class="description">Item</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@foreach($contents as $content)
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{URL::to($content->attributes->image)}}" style="height: 100px; width: 100px; " alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$content->name}}</a></h4>
								<p>Web ID: 1089772</p>
							</td>
							<td class="cart_price">
							<p>{{$content->price}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" href="{{url('reduceitem'.$content->id)}}"> - </a>
									<input class="cart_quantity_input" type="text" name="quantity" value="{{$content->quantity}}" autocomplete="off" size="2">
									<a class="cart_quantity_down" href="{{url('increaseitem'.$content->id)}}"> + </a>
								</div>
							</td>
							<?php
							$p=$content->price;
							$q=$content->quantity;
							$total=$p*$q;
							?>
							<td class="cart_price">
								<p >{{$total}}</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{url('deletecartitem'.$content->id)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						<?php
						$p=0;
						$q=0;
						$total=0;
						?>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>

	</section> 
	<section>
		<div class="col-sm-12">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>{{$subTotal}}</span></li>
							<li>Eco Tax <span>$2</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>$61</span></li>
						</ul>
							<a class="btn btn-default update" href="">Update</a>
							<a class="btn btn-default check_out" href="{{route('chechout')}}">Check Out</a>
					</div>
				</div>
	</section>
	
	@endsection