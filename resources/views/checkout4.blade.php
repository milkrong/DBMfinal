@extends('layouts.app')

@section('content')

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
                        <li>
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
                        <li class="active">
                            <span class="ti-check icon"></span>
                            <span class="checkout-label">confirmation</span>
                        </li>
                    </ul>

                    <form class="form-horizontal cart row no-margin" action="{{ url('place') }}" method="POST">
                        {{ csrf_field() }}
                            <div class="col-sm-12">
                                <ul class="cart-items">
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
		                                            </span>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        <input type="hidden" name="product_id" value="{{ $item->product->id }}">
                        <input type="hidden" name="quantity" value="{{ $item->quantity }}">


                        <div class="">
                            <div class="checkout-buttons">
                                <a class="btn btn-default pull-left" href="{{ url('/order/3') }}"><span class="ti-arrow-left icon"></span> back to payment</a>
                                <button class="btn btn-primary pull-right" type="submit" >Place Order <span class="ti-arrow-right icon"></span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection