@extends('layouts.app')

@section('content')

    <div class="container-fluid main-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 mt-30 mb-30 width-100 pull-left">
                            <h3>Your order <span class="text-muted small smartphone-inline-fw"> </span>
                            </h3>
                        </div>
                        <div class="col-md-12">
                            <p>Thanks For Your Purchase</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                @foreach($orders as $order)
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Order ID: {{ $order->id }}</h5>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($order->product as $product)
                                    <tr>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->pivot->amount }}</td>
                                        <td>{{ $order->order_date }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                @endforeach
                </div>
            </div>
            <div class="width-100">
                <div class="widget-pagination pull-left pl-15">
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            {{$orders->links()}}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

@endsection