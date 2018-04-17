@extends('layouts.app')

@section('content')
    <div class="container main-wrapper">
        <div class="row">
            <div class="container-fluid">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Zip</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($stores as $store)
                        <tr>
                            <td>{{ $store->store_name }}</td>
                            <td>{{ $store->street." ".$store->city }}</td>
                            <td>{{ $store->zip }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- PAGINATION -->
            <div class="width-100">
                <div class="widget-pagination pull-left pl-15">
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            {{$stores->links()}}
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- / PAGINATION -->
        </div>
    </div>

@endsection