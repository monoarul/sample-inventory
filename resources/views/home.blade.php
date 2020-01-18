@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Auth::check() && Auth::user()->user_type == 0)
                <div class="card">
                    <div class="card-header" style="text-align: center; font-size: 24px; font-weight: 700;">Received Products From Suppliers</div>

                    <div class="card-body">
                        <table class="table table-bordered table-dark">
                            <tr>
                                <th>Product Name</th>
                                <th>Supplier Name</th>
                                <th>Received Date</th>
                            </tr>
                            @foreach($company as $data)
                                <tr>
                                    <td>{{$data->product_name}}</td>
                                    <td>{{$data->supplier_name}}</td>
                                    <td>{{$data->received_date}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            @elseif(Auth::check() && Auth::user()->user_type == 1)
                <div class="card">
                    <div class="card-header" style="text-align: center; font-size: 24px; font-weight: 700;">List of Products That Needs To Be Sent</div>

                    <div class="card-body">
                        <table class="table table-bordered table-dark">
                            <tr>
                                <th>Product Name</th>
                                <th>Company To Send</th>
                                <th></th>
                            </tr>
                            @foreach($supplier as $data)
                                <tr>
                                    <td>{{$data->product_name}}</td>
                                    <td>{{$data->company_name}}</td>
                                    <td><a href="{{url('/productID/'.$data->id)}}" class="btn btn-info">Send</a></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
