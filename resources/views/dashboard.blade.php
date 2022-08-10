@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 text-success text-center">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif   
        </div>
    </div>
    <div class="row justify-content-between">
        <div class="col-md-6">
            <div class="card bg-light">
                <div class="card-body">
                    <div class="text-center">
                        <h4>Oxygen Cylinder Stock</h4>
                        <p>Available Stock</p> 
                    </div>

                    <table class="table table-bordered table-striped" id="datatable">
                        <thead class="thead-dark">
                            <tr>                               
                                <th>5 Ltr</th>
                                <th>10 Ltr</th>
                                <th>15 Ltr</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                       
                        @csrf
                        @foreach($stocks as $value)
                            <tr>                            
                                <td>{{ $value->cyl_qty_5}}</td>
                                <td>{{ $value->cyl_qty_10}}</td>
                                <td>{{ $value->cyl_qty_15}}</td>
                                <td>
                                <a href="{{ route('edit')}}"><button type="submit" name="action" value="update" class="btn btn-primary"> {{ __('Edit') }}</button></a>  
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                    
                </div>       
            </div>
        </div>


        <div class="col-md-12 pt-5">
            <div class="card bg-light">
                <div class="card-body">
                    <div class="text-center">
                        <h4>Bookings</h4>
                        <p>Data of bookings</p>
                    </div>

                    <table class="table table-bordered table-striped" id="datatable">
                        <thead class="thead-dark">
                            <tr>                               
                                <th>Name</th>
                                <th>Age</th>
                                <th>State</th>
                                <th>City</th>
                                <th>Covid-19 Report</th>
                                <th>Date of covid-19 Positive</th>
                                <th>Cylinder Quantity</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                       
                        @csrf
                        @foreach($bookings as $value)
                            <tr>                            
                                <td>{{ $value->name}}</td>
                                <td>{{$value->age}}</td>
                                <td>{{ $value->state}}</td>
                                <td>{{ $value->city}}</td>
                                <td>{{ $value->report}}</td>
                                <td>{{ $value->date}}</td>
                                <td>{{ $value->cylinder_qty}} Ltr</td>
                                <td>
                                <a href=""><button type="submit" id="process" name="action" value="" class="btn btn-success"> {{ __('Process') }}</button></a>  
                                <a href=""><button type="submit" id="cancel" name="action" value="" class="btn btn-danger"> {{ __('Cancel') }}</button></a>    
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                    
                </div>       
            </div>
        </div>

    </div>
</div>

<script>
    $(document).ready(function () {
        $('#process').click(function(){
            alert("The Booking is confirmed.");
        });
        
        $('#cancel').click(function(){
            alert("The Booking is canceled."); 
        });
    });
</script>
@endsection