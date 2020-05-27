 @extends('layoutduo')
 @section('conta')
 <style type="text/css">
 .paymentWrap {
	padding: 50px;
}

.paymentWrap .paymentBtnGroup {
	max-width: 800px;
	margin: auto;
}

.paymentWrap .paymentBtnGroup .paymentMethod {
	padding: 40px;
	box-shadow: none;
	position: relative;
}

.paymentWrap .paymentBtnGroup .paymentMethod.active {
	outline: none !important;
}

.paymentWrap .paymentBtnGroup .paymentMethod.active .method {
	border-color: #4cd264;
	outline: none !important;
	box-shadow: 0px 3px 22px 0px #7b7b7b;
}

.paymentWrap .paymentBtnGroup .paymentMethod .method {
	position: absolute;
	right: 3px;
	top: 3px;
	bottom: 3px;
	left: 3px;
	background-size: contain;
	background-position: center;
	background-repeat: no-repeat;
	border: 2px solid transparent;
	transition: all 0.5s;
}

.paymentWrap .paymentBtnGroup .paymentMethod .method.visa {
	background-image: url("{{asset('img/001.jpg')}}");
}

.paymentWrap .paymentBtnGroup .paymentMethod .method.master-card {
	background-image: url("{{asset('img/002.png')}}");
}

.paymentWrap .paymentBtnGroup .paymentMethod .method.amex {
	background-image: url("{{asset('img/003.jpg')}}");
}

.paymentWrap .paymentBtnGroup .paymentMethod .method.vishwa {
	background-image: url("{{asset('img/004.jpg')}}");
}

.paymentWrap .paymentBtnGroup .paymentMethod .method.ez-cash {
	background-image: url("{{asset('img/004.jpg')}}");
}


.paymentWrap .paymentBtnGroup .paymentMethod .method:hover {
	border-color: #4cd264;
	outline: none !important;
}	

 </style>
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
				</div>
	</section>

<!------ Include the above in your HEAD tag ---------->

<section id="do_action">
	<div class="container">
		<div class="heading">
			<h3>What would you like to do next?</h3>
			<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
		</div>
		<div class="breadcrumbs">
			<ol class="breadcrumb">
			  <li><a href="#">Home</a></li>
			  <li class="active">Payment method</li>
			</ol>
		</div>
	<form action="{{route('payit')}}" method="POST">
		@csrf
		<div class="paymentCont col-sm-8">
					<div class="headingWrap">
							<h3 class="headingTop text-center">Select Your Payment Method</h3>	
							<p class="text-center">Created with bootsrap button and using radio button</p>
					</div>
					<div class="paymentWrap">
						<div class="btn-group paymentBtnGroup btn-group-justified" data-toggle="buttons">
				            <label class="btn paymentMethod active">
				            	<div class="method visa"></div>
				                <input type="radio" name="way" value="handcash" checked> 
				            </label>
				            <label class="btn paymentMethod">
				            	<div class="method master-card"></div>
				                <input type="radio" name="way" value="visa"> 
				            </label>
				            <label class="btn paymentMethod">
			            		<div class="method amex"></div>
				                <input type="radio" name="way" value="master">
				            </label>
				            <label class="btn paymentMethod">
			             		<div class="method vishwa"></div>
				                <input type="radio" name="way" value="bkash"> 
				            </label>

		  	         </div>        
					</div>
					<div class="footerNavWrap clearfix">
						<button type="submit" class="btn btn-success btn-lg"  > Continue </button>
					</div>
				</div>
			</form>
	</div>
</section><!--/#do_action-->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
 @endsection