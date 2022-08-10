@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div >
                    <div class=" text-success text-center">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="card-body">
                    <div class="text-center">
                        <h4>Booking Status</h4>

                    </div>

                    <table class="table table-bordered table-striped" id="datatable">
                        <thead class="thead-dark">
                            <tr>                               
                                <th>Name</th>
                                <th>State</th>
                                <th>Cylinder Quantity</th>
                                <th>Supplier Name</th>
                            </tr>
                        </thead>

                        <tbody>
                       
                        @csrf
                        @foreach($users as $value)
                            <tr>                            
                                <td>{{ $value->name}}</td>
                                <td>{{ $value->state}}</td>
                                <td>{{ $value->cylinder_qty}} Ltr</td>
                                <td>{{ $value->supplier_name}}</td>
                            
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