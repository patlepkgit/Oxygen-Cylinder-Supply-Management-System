@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class=" text-success text-center">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in!
                    </div>
                </div>

                <div class="card-body">
                    <div class="text-center">
                        <h4>Oxygen Cylinder Stock</h4>
                        <p>Update Your Stock</p>
                    </div>
                    <table class="table table-bordered table-striped" id="datatable" >
                        <thead class="thead-dark">
                            <tr>  
                            
                            <th>5 Ltr</th>
                            <th>10 Ltr</th>
                            <th>15 Ltr</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <form method="POST" action="{{ route('update')}}">
                        @csrf
                            <tr>
                                
                                <td>
                                    <input type="text" name="cyl_qty_5" id="cyl_qty_5" class="form-control @error('cyl_qty_5') is-invalid @enderror"  value="{{ old('cyl_qty_5') }}" required autocomplete="cyl_qty_5" autofocus>
                                    @error('cyl_qty_5')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror 
                                </td>
                                <td>
                                    <input type="text" name="cyl_qty_10" id="cyl_qty_10" class="form-control @error('cyl_qty_10') is-invalid @enderror"  value="{{ old('cyl_qty_10') }}" required autocomplete="cyl_qty_10" autofocus> 
                                    @error('cyl_qty_10')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror                        
                                </td>
                                <td>
                                    <input type="text" name="cyl_qty_15" id="cyl_qty_15" class="form-control @error('cyl_qty_15') is-invalid @enderror"  value="{{ old('cyl_qty_15') }}" required autocomplete="cyl_qty_15" autofocus>
                                    @error('cyl_qty_15')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror                         
                                </td>
                                <td>                    
                                    <button type="submit" name="action" value="update" class="btn btn-primary"> {{ __('UPDATE') }}</button>                            
                                </td>
                            </tr>
                        </form>
                        </tbody>
                    </table>
                </div>       
            </div>
        </div>
    </div>
</div>
@endsection