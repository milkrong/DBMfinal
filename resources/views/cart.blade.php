@extends('layouts.app')

@section('content')

	<div class="container-fluid main-wrapper">
		<div class="row">
			<div class="col-md-12">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12 mt-30 mb-30 width-100 pull-left">
							<h3>Your cart <span class="text-muted small smartphone-inline-fw"> </span>
							</h3>		
						</div>
						<div class="col-md-12">
							<p>Thanks For Your Purchase</p>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-8">
				<div class="checkout-container">
					<ul class="cart-items width-100 pull-left pl-30 pr-0 pb-0 pt-0 container-fluid">
		                <li class="cart-items-labels visible-lg-block visible-md-block row"> 
		                    <span class="col-md-6 text-muted small">product</span>
		                    <span class="col-md-2 text-muted small text-center">quantity</span> 
		                    <span class="col-md-4 text-muted small text-right">size</span>
		                </li>
		                @foreach($items as $item)
		                <li class="row">
		                    <div class="cart-item-right col-md-10">
		                    	<div class="row">
		                            <span class="cart-description col-xs-12 col-md-5">
		                                <a class="h5" href="{{ url('product_detail', $item->product->id) }}">{{ $item->product->name }}</a>
		                                @switch($item->size)

			                                @case('small')				   
			                                	<span class="cart-item-price h5 text-muted">$ {{ $item->product->product_detail[2]->price }}</span>
			                                	@break
			                                @case('medium')				   
			                                	<span class="cart-item-price h5 text-muted">$ {{ $item->product->product_detail[1]->price }}</span>
			                                	@break
			                                @case('large')				   
			                                	<span class="cart-item-price h5 text-muted">$ {{ $item->product->product_detail[0]->price }}</span>
			                                	@break
			                                @default				   
			                                	<span class="cart-item-price h5 text-muted">$ {{ $item->product->product_detail[0]->price }}</span>
			                            @endswitch
		                            </span>

									<span class="col-md-2 col-sm-12">
										{{ $item->quantity }}
									</span>

		                            <span class="col-md-5 col-sm-12 text-right">
		                                {{ $item->size }} 
		                                <a class="cart-remove" href="{{ url('/cart/remove',$item->id) }}">
		                                <span class="ti-trash icon pull-right mt-5 ml-10"></span>
		                            </span>
		                        </div>
		                    </div>
		                </li>
		                @endforeach
		            </ul>
				</div>
			</div>
			<div class="col-md-3">
                <div class="cart-right">
                    <ul class="cart-summary">
                        <li>Total <span>${{ $total }}</span> </li>
                        <li>Shipping <span>Free</span> </li>
                        <li>Total tax <span>${{$tax}}</span> </li>
                        <li>Total <span>${{$total_taxed}}</span> </li>
                    </ul>

                    <a class="btn btn-margin btn-primary width-100" href="{{ url('order') }}">
                        Order now <span class="ti-arrow-right"></span>
                    </a>
                </div>
            </div>
		</div>
	</div>

@endsection