@extends('admin.layouts')

@section('page')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Products Diversity In  Chosen City</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Results
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <div class="table">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Store</th>
                                        <th>Diversity</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($results as $result)
                                        <tr>
                                            <td>{{ $result->store_name }}</td>
                                            <td>{{ $result->product_diversity }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
