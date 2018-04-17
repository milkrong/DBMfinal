@extends('admin.layouts')

@section('page')

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Orders</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Orders
                </div>

                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Customer</th>
                                <th>Products</th>
                                <th>Payment</th>
                                <th>Comments</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->user->firstname }}</td>
                                <td>
                                    @foreach($order->product as $product)
                                        {{ $product->name.";" }}
                                    @endforeach
                                </td>
                                <td>{{ $order->pay_method }}</td>
                                <td>{{ $order->note }}</td>
                                <td>{{ $order->order_date }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('scripts')

<!-- DataTables JavaScript -->
<script src="{{ asset('admin/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/vendor/datatables-plugins/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/vendor/datatables-responsive/dataTables.responsive.js') }}"></script>

<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>
@endsection

