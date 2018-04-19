@extends('layouts.app')

@section('content')
    <div class="container-fluid main-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 mt-30 mb-30 width-100 pull-left">
                            <h3>About Us <span class="text-muted small smartphone-inline-fw">welcome</span>
                                <a href="#" class="x-small pull-right mt-10">see more <span class="ti-arrow-right"></span></a>
                            </h3>
                        </div>
                        <div class="col-md-12">
                            <div class="text-container">
                                <p class="h5">A café (sometimes spelt cafe) is an establishment which primarily serves hot coffee,

                                    related coffee beverages (café latte, cappuccino, espresso), tea, and other hot beverages.

                                    Some coffeehouses also serve cold beverages such as iced coffee and iced tea.

                                    Many cafés also serve some type of food, such as light snacks, muffins or pastries.
                                    
                                    Coffeehouses range from owner-operated small businesses to large multinational corporations.</p>
                            </div>
                        </div>

                        <!-- PROMO BOX LARGE -->
                        <div class="col-md-12 mt-30">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="promo-box">
                                        <img src="{{ asset('assets/img/aboutus.png') }}" class="img-responsive width-45" alt="product image">
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