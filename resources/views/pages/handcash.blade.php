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
				<p> successfully order done . we will contanct you soon </p>
			</div>
		</div>

	</section> 
	<section>
		
	</section>
	
	@endsection