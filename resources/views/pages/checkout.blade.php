@extends('layoutduo')
 @section('conta')


<section id="cart_items">
		<div class="container col-md-12">
		

			<div class="register-req">
				<p>Please Give your Check out inforformation</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-12 clearfix">
						<div class="bill-to">
							<p>Bill To</p>
							<div class="form-one">
								<form action="{{url('saveship')}}" method="POSt">
									@csrf
									<input type="text" name="ship_email" placeholder="Email*">
									<input type="text" name="ship_first_name" placeholder="First Name *">
									<input type="text" name="ship_last_name" placeholder="Last Name *">
									<input type="text" name="ship_mobile" placeholder="mobile number">
									<input type="text" name="ship_address" placeholder="Address"> <br>
									<select name="ship_city" placeholder="city">
										<option>-- City --</option>
										<option>Dhaka</option>
										<option>Chattogram</option>
										<option>Sylhet</option>
										<option>Rajshahi</option>
										<option>Khulna</option>
										<option>Barishal</option>
									</select>
									


									<button type="submit" class="btn btn-default check_out" >Submit </button>
								</form>
							</div>
							
						</div>
					</div>				
				</div>
			</div>
			<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>

		
		</div>
	</section> <!--/#cart_items-->

  @endsection


