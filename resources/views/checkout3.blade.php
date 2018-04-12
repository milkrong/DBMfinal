@extends('layouts.app')

@section('content')

    <div class="container-fluid main-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 mt-30 mb-30 width-100 pull-left">
                            <h3>Order <span class="text-muted small smartphone-inline-fw">step 2</span>
                            </h3>
                        </div>
                        <div class="col-md-12">
                            <p>Choose a store you want ot pickup your order</p>
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
                            <span class="checkout-label">pick up</span>
                        </li>
                        <li class="active">
                            <span class="ti-check icon"></span>
                            <span class="checkout-label">shipping & payment </span>
                        </li>
                        <li>
                            <span class="ti-check icon"></span>
                            <span class="checkout-label">confirmation</span>
                        </li>
                    </ul>

                        <form class="form-horizontal" action="{{ url('payment/update') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="row">
                                <fieldset class="col-md-6 mb-30">
                                    <legend>Payment options</legend>
                                    <div class="form-group">
                                        <div class="width-100">
                                            <div class="custom-radio radio-primary">
                                                <input name="payment" id="radio-96a" type="radio" value="paypal">
                                                <label for="radio-96a">
                                                    Pay pal
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="width-100">
                                            <div class="custom-radio radio-primary">
                                                <input name="payment" id="radio-95a" type="radio" value="cash">
                                                <label for="radio-95a">
                                                    Cash
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>

                            <div class="">
                                <div class="checkout-buttons">
                                    <a class="btn btn-default pull-left" href="{{ url('order/2') }}}}"><span class="ti-arrow-left icon"></span> personal data</a>
                                    <button class="btn btn-primary pull-right" type="submit">Payment <span class="ti-arrow-right icon"></span></button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>

@endsection