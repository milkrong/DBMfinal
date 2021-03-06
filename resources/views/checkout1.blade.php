@extends('layouts.app')

@section('content')
p
	<div class="container-fluid main-wrapper">
		<div class="row">
			<div class="col-md-12">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12 mt-30 mb-30 width-100 pull-left">
							<h3>Order <span class="text-muted small smartphone-inline-fw">step 1</span>
							</h3>		
						</div>
						<div class="col-md-12">
							<p>Please Confirm your personal information and choose a store to pick up your order</p>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-8 col-md-push-2">
				<div class="checkout-container">
					<ul class="checkout-step">
						<li class="active">
							<span class="ti-check icon"></span>
							<span class="checkout-label">personal data</span> 
						</li>
						<li>
							<span class="ti-check icon"></span>
							<span class="checkout-label">store to pickup</span>
						</li> 
						<li>
							<span class="ti-check icon"></span>
							<span class="checkout-label">shipping & payment </span> 
						</li>
						<li>
							<span class="ti-check icon"></span>
							<span class="checkout-label">confirmation</span> 
						</li> 
					</ul>

					<form class="form-horizontal" action="{{ url('bill/update') }}" method="POST">
                        {{ csrf_field() }}
						<div class="row">
							<fieldset class="col-md-6">
								<legend>Personal data</legend>
								<div class="form-group">
									<div class="col-lg-12">
										<input class="form-control" id="firstName" name="firstname" placeholder="{{ $users->firstname }}" type="text">
									</div>
								</div>
								<div class="form-group">
									<div class="col-lg-12">
										<input class="form-control" id="lastName" name="lastname" placeholder="{{ $users->lastname }}" type="text">
									</div>
								</div>
								<div class="form-group">
									<div class="col-lg-12">
										<input class="form-control" id="email" name="email" placeholder="{{ $users->email }}" type="text">
									</div>
								</div>
							</fieldset>
							<fieldset class="col-md-6">
								<legend>Pick up address</legend>
								<div class="form-group">
									<div class="col-lg-12">
                                        <input class="form-control" id="zipcode" name="zip" placeholder="Zip" type="text">
									</div>
								</div>
							</fieldset>
						</div>


                        <div class="">
                            <div class="checkout-buttons">
                                <a class="btn btn-default pull-left" href="{{ url('/cart') }}"><span class="ti-arrow-left icon"></span> back to cart</a>
                                <button class="btn btn-primary pull-right" type="submit" >choose store <span class="ti-arrow-right icon"></span></button>
                            </div>
                        </div>
                    </form>
				</div>
			</div>
		</div>
	</div>

@endsection