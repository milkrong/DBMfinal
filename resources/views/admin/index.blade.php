@extends('admin.layouts')

@section('page')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-shopping-cart fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $order_number }}</div>
                            <div>Orders!</div>
                        </div>
                    </div>
                </div>
                <a href="{{ url('admin/order') }}">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-comments fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $customer_number }}</div>
                            <div>Customers!</div>
                        </div>
                    </div>
                </div>
                <a href="{{ url('admin/customers') }}">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    History Sale Value
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div id="tea-sale-chart"></div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('admin/vendor/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/morrisjs/morris.min.js') }}"></script>
    <script>
        var $sales = {!! json_encode($tea_sales) !!};
        $sales.forEach(function($sale){$sale.year=$sale.year+"";});
        console.log($sales);
        $(function(){
            Morris.Line({
                // ID of the element in which to draw the chart.
                element: 'tea-sale-chart',
                // Chart data records -- each entry in this array corresponds to a point on
                // the chart.
                data: $sales,
                // The name of the data record attribute that contains x-values.
                xkey: 'year',
                // A list of names of data record attributes that contain y-values.
                ykeys: ['sales'],
                // Labels for the ykeys -- will be displayed when you hover over the
                // chart.
                labels: ['Sale Value'],
                xLabels: "year",
            });
        });
    </script>
@endsection
