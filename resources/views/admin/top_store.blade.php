@extends('admin.layouts')

@section('page')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Forms</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Choose Date
                </div>
                <div class="panel-body">
                    <form action="{{ url('admin/top_store/show') }}" role="form" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="aggregation" value="top_store">
                        <div class="form-group">
                            <label>Input Month</label>
                            <input class="form-control" placeholder="Month MM" name="month">
                        </div>
                        <div class="form-group">
                            <label>Input Year</label>
                            <input class="form-control" placeholder="Year YYYY" name="year">
                        </div>
                        <button type="submit" class="btn btn-default">Submit Button</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
