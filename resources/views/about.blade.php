@extends('layouts.app')

@section('content')
    <div class="container-fluid main-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 mt-30 mb-30 width-100 pull-left">
                            <h3>About us <span class="text-muted small smartphone-inline-fw">some text</span>
                                <a href="#" class="x-small pull-right mt-10">see more <span class="ti-arrow-right"></span></a>
                            </h3>
                        </div>
                        <div class="col-md-12">
                            <div class="text-container">
                                <p class="h4">Woooooooo!!! Your favourite coffee are all here </p>
                            </div>
                        </div>

                        <!-- PROMO BOX LARGE -->
                        <div class="col-md-12 mt-30">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="promo-box">
                                        <img src="{{ asset('asset(assets/img/products/composition-3.jpg') }}" class="img-responsive width-100" alt="product image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection